<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//manejo de base de datos
use Carbon\Carbon;//manejo de horas y fechas
use PDF;
use App\HTTP\Requests\validadorAlmacen;
use App\HTTP\Requests\almacenUpdate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;



class almacenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultaProductos = DB::table('productos')->get()->where('estatus', '=', 1);
        
        return view('almacen/almacen', compact('consultaProductos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('almacen/agregar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validadorAlmacen $request)
    {

        $foto = null; // Inicializa $foto con un valor predeterminado

        if ($request->hasFile('foto')) {
            $file=$request->file('foto');
            $destinationPath = 'img/productos';
            $filename = time() . '_' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename);
            $foto = "$destinationPath/$filename";
        }

        DB::table('productos')->insert([
            'nombre_producto' => $request->input('nombreProd'),
            'no_serie' => $request->input('numeroSerie'),
            'marca' => $request->input('marca'),
            'cantidad' => $request->input('cantidad'),
            'costo_compra' => $request->input('costoCompra'),
            'precio_venta' => $request->input('costoCompra') * 1.55,
            'fecha_ingreso' => Carbon::now(),
            'foto' => $foto, // Asigna la ruta relativa de la imagen
            'estatus' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        

        return redirect("/almacen")->with('confirmacion', 'Datos almacenados correctamente');
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
    // En el controlador almacenController.php
    public function edit($id)
    {
        $producto = DB::table('productos')->where('id', $id)->first();
        return view('almacen/editar', compact('producto'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(almacenUpdate $request, $id)
    {
       // Obtener el nombre anterior del registro
        $registroAnterior = DB::table('productos')->where('id', $id)->first();
        $nombreAnterior = $registroAnterior->foto;

        $foto = $nombreAnterior; // Mantener el valor actual por defecto

        if ($request->hasFile('foto')) {
            
            if (File::exists($foto)) {
                // Borra la imagen anterior
                File::delete($foto);
            }
            
            $file=$request->file('foto');
            $destinationPath = 'img/productos';
            $filename = time() . '_' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename);
            $foto = "$destinationPath/$filename";
        }

        // Realiza la actualización en la base de datos
        DB::table('productos')->where('id', $id)->update([
            'nombre_producto' => $request->input('nombreProd'),
            'no_serie' => $request->input('numeroSerie'),
            'marca' => $request->input('marca'),
            'cantidad' => $request->input('cantidad'),
            'costo_compra' => $request->input('costoCompra'),
            'precio_venta' => $request->input('costoCompra') * 1.55,
            'fecha_ingreso' => $request->input('fechaIngreso'),
            'foto' => $foto,
            'updated_at' => now(),
        ]);

        return redirect("/almacen")->with('confirmacion', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Obtén la ruta de la imagen antes de borrar el producto
/*         $rutaImagen = DB::table('productos')->where('id', $id)->value('foto'); */

        // Borra el producto de la base de datos
        DB::table('productos')->where('id', $id)->update([
            'estatus'=> 0
        ]);

        // Borra la imagen de la carpeta "images" si existe
        /* if ($rutaImagen && file_exists($rutaImagen)) {
            unlink($rutaImagen);
        } */

        return redirect('/almacen')->with('confirmacion', 'Producto eliminado correctamente');
    }


    

    public function imprimirListaProductos()
    {
        $consultaProductos = DB::table('productos')->get()->where('estatus', '=', 1);
        $pdf = PDF::loadView('pdf.lista_productos', compact('consultaProductos'));
        return $pdf->download('lista_productos.pdf');
    }





    public function filtro(Request $request)
    {
        $filtro = $request->input('Filtro');
        if ($filtro == null) {
            return redirect()->route('almacen.index')->with('fallo', 'No se encontró ningún producto con ese nombre o número de serie.');
        }

        $consultaProductos = DB::table('productos')
        ->where('estatus', '=', 1)
        ->where(function ($query) use ($filtro) {
            $query->where('nombre_producto', 'like', '%' . $filtro . '%')
                ->orWhere('no_serie', 'like', '%' . $filtro . '%');
        })
        ->get();


        if ($consultaProductos->isEmpty()) {
            return redirect()->route('almacen.index')->with('fallo', 'No se encontró ningún producto con ese nombre o número de serie.');
        }

        return view('almacen/almacen', compact('consultaProductos'));
    }


}
