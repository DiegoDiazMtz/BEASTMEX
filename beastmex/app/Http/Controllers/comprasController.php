<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//manejo de base de datos
use PDF;
use Illuminate\Support\Facades\Mail;

use App\Models\compras;

class comprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*  */
    public function index()
    {
        $ordenesCompra = DB::table('ordenes_compra')->get();

        // Obtener los proveedores
        $proveedores = DB::table('proveedores')->get();

        // Obtener los productos
        $productos = DB::table('productos')->get();

        foreach ($ordenesCompra as $orden) {
            $orden->productos = DB::table('detalle_orden')
                ->join('productos', 'detalle_orden.id_producto', '=', 'productos.id')
                ->where('detalle_orden.id_orden', $orden->id)
                ->select('productos.*', 'detalle_orden.cantidad as cantidad_producto')
                ->get();
        }

        return view('compras.compras', compact('ordenesCompra', 'proveedores', 'productos'));
    }




    public function indexProductos()
    {
        $consultaProductos = DB::table('productos')->orderBy('cantidad', 'asc')->get()->where('estatus', '=', 1);
        
        return view('compras.consultaProductos', compact('consultaProductos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores = DB::table('proveedores')->get();
        $productos = DB::table('productos')->get();

        return view('compras.agregarOrden', compact('proveedores', 'productos'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validaciones...
        $request->validate([
            'proveedor' => 'required|exists:proveedores,id', // Asegura que el proveedor exista en la tabla de proveedores
            'nombre_empresa' => 'required|string|max:255',
            'numero_productos' => 'required|integer|min:1',
            'productos' => 'required|array', // Asegura que la entrada 'productos' sea un arreglo
    
            // Validaciones para cada producto en la orden
            'productos.*.producto' => 'required|exists:productos,id', // Asegura que cada producto exista en la tabla de productos
            'productos.*.cantidad' => 'required|integer|min:1',
        ]);
        // Crear una nueva orden de compra
        $ordenCompra = DB::table('ordenes_compra')->insertGetId([
            'id_proveedor' => $request->input('proveedor'),
            'fecha_orden' => now(),
            'total' => 0, // Inicializamos en 0
            'enviado' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $totalOrden = 0; // Inicializamos en 0

        // Agregar el detalle de la orden de compra y calcular el total
        foreach ($request->input('productos') as $detalle) {
            $producto = DB::table('productos')->find($detalle['producto']);

            $subtotal = $producto->costo_compra * $detalle['cantidad'];
            $totalOrden += $subtotal;

            DB::table('detalle_orden')->insert([
                'id_orden' => $ordenCompra,
                'id_producto' => $detalle['producto'],
                'cantidad' => $detalle['cantidad'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Actualizar el total de la orden de compra
        DB::table('ordenes_compra')->where('id', $ordenCompra)->update(['total' => $totalOrden]);

        // Lógica para verificar qué botón fue presionado
        if ($request->has('guardar_imprimir_pdf')) {
            // Lógica para guardar e imprimir un PDF
            
        
            // Redirecciona a la página de compras
            return $this->imprimirOrdenCompra($ordenCompra);
        }elseif ($request->has('guardar_enviar_correo')) {
            // Lógica para guardar y enviar un correo
            $this->enviarCorreoProveedor($ordenCompra);
        
            // Redirecciona a la página de compras
            return redirect()->route('compras.index')->with('success', 'Orden de compra creada y correo enviado exitosamente.');
        }
        

        return redirect()->route('compras.index')->with('success', 'Orden de compra creada exitosamente.');
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $orden = DB::table('ordenes_compra')->find($id);
        $proveedores = DB::table('proveedores')->get();
        $productos = DB::table('productos')->get();

        // Obtener los productos de la orden
        $orden->productos = DB::table('detalle_orden')
            ->join('productos', 'detalle_orden.id_producto', '=', 'productos.id')
            ->where('detalle_orden.id_orden', $orden->id)
            ->select('productos.*', 'detalle_orden.cantidad as cantidad_producto')
            ->get();

        return view('compras.editarOrden', compact('orden', 'proveedores', 'productos'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validaciones...
        $request->validate([
            'proveedor' => 'required|exists:proveedores,id',
            'nombre_empresa' => 'required|string|max:255',
            'numero_productos' => 'required|integer|min:1',
            'productos' => 'required|array',
            /* 'productos.*.producto' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1', */
        ]);

        // Actualizar la orden de compra
        DB::table('ordenes_compra')->where('id', $id)->update([
            'id_proveedor' => $request->input('proveedor'),
            'updated_at' => now(),
        ]);

        // Eliminar el detalle de la orden de compra existente
        DB::table('detalle_orden')->where('id_orden', $id)->delete();

        $totalOrden = 0;

        // Agregar el nuevo detalle de la orden de compra y calcular el total
        foreach ($request->input('productos') as $detalle) {
            $producto = DB::table('productos')->find($detalle['producto']);

            $subtotal = $producto->costo_compra * $detalle['cantidad'];
            $totalOrden += $subtotal;

            DB::table('detalle_orden')->insert([
                'id_orden' => $id,
                'id_producto' => $detalle['producto'],
                'cantidad' => $detalle['cantidad'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Actualizar el total de la orden de compra
        DB::table('ordenes_compra')->where('id', $id)->update(['total' => $totalOrden]);

        return redirect()->route('compras.index')->with('success', 'Orden de compra actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar el detalle de la orden de compra
        DB::table('detalle_orden')->where('id_orden', $id)->delete();

        // Eliminar la orden de compra
        DB::table('ordenes_compra')->where('id', $id)->delete();

        return redirect()->route('compras.index')->with('success', 'Orden de compra eliminada exitosamente.');
    }

    public function filtrar(Request $request)
    {
        $filtro = $request->input('filtro');
        if ($filtro == null) {
            return redirect()->route('compras.index')->with('fallo', 'No se encontró ningún producto con ese nombre o número de serie.');
        }

        $consultaProductos = DB::table('productos')
        ->where('estatus', '=', 1)
        ->where(function ($query) use ($filtro) {
            $query->where('nombre_producto', 'like', '%' . $filtro . '%')
                ->orWhere('no_serie', 'like', '%' . $filtro . '%');
        })
        ->get();


        if ($consultaProductos->isEmpty()) {
            return redirect()->route('compras.index')->with('fallo', 'No se encontró ningún producto con ese nombre o número de serie.');
        }

        return view('compras.consultaProductos', compact('consultaProductos'));
    }





    public function imprimirOrdenCompra($id)
    {
        // Obtén la orden de compra de la base de datos
        $ordenCompra = DB::table('ordenes_compra')->where('id', $id)->first();

        // Obtén los productos para la orden de compra
        $ordenCompra->productos = DB::table('detalle_orden')
            ->join('productos', 'detalle_orden.id_producto', '=', 'productos.id')
            ->where('detalle_orden.id_orden', $ordenCompra->id)
            ->select('productos.*', 'detalle_orden.cantidad as cantidad_producto')
            ->get();

        // Carga la vista 'pdf.orden_compra', pasando la orden de compra
        $pdf = PDF::loadView('pdf.ordenes_compra', compact('ordenCompra'));

        // Descarga el PDF
        return $pdf->download('orden_compra_'.$id.'.pdf');
    }

    public function enviarCorreoProveedor($id)
    {
        // Obtén la orden de compra de la base de datos
        $ordenCompra = DB::table('ordenes_compra')->where('id', $id)->first();

        // Obtén los productos para la orden de compra
        $ordenCompra->productos = DB::table('detalle_orden')
            ->join('productos', 'detalle_orden.id_producto', '=', 'productos.id')
            ->where('detalle_orden.id_orden', $ordenCompra->id)
            ->select('productos.*', 'detalle_orden.cantidad as cantidad_producto')
            ->get();

        // Crea el PDF
        $pdf = PDF::loadView('pdf.ordenes_compra', compact('ordenCompra'));

        // Guarda el PDF en el almacenamiento temporal
        $pdfPath = storage_path('app/temp/orden_compra_'.$id.'.pdf');
        $pdf->save($pdfPath);

        // Envía el correo electrónico al proveedor
        $proveedor = DB::table('proveedores')->where('id', $ordenCompra->id_proveedor)->first();

        Mail::send('correos.orden_compra', ['ordenCompra' => $ordenCompra], function ($message) use ($proveedor, $pdfPath) {
            $message->to($proveedor->correo, $proveedor->nombre_proveedor)
                    ->subject('Orden de Compra')
                    ->attach($pdfPath);
        });

        // Elimina el PDF del almacenamiento temporal después de enviarlo
        unlink($pdfPath);

        return redirect()->route('compras.index')->with('success', 'Correo con PDF enviado exitosamente al proveedor.');
    }


}
