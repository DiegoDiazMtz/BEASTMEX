@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/almacen.css') }}">
@endsection

@section('contenido')

    <form action="{{ route('almacen.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h1 class="titulo">Editar producto</h1>

        <div class="form-group card">
            <h2>ID del producto: {{ $producto->id }}</h2>

            <label for="nombre">Nuevo nombre del producto</label>
            <input type="text" class="form-control" name="nombreProd" placeholder="Nombre del producto" value="{{ $producto->nombre_producto }}">
            <strong style="color: red">{{ $errors->has('nombreProd') ? $errors->first('nombreProd') : '' }}</strong>
            
            <label for="numeroSerie">Nuevo número de serie</label>
            <input type="text" class="form-control" name="numeroSerie" placeholder="Número de serie" value="{{ $producto->no_serie }}">
            <strong style="color: red">{{ $errors->has('numeroSerie') ? $errors->first('numeroSerie') : '' }}</strong>

            <label for="marca">Nueva marca</label>
            <input type="text" class="form-control" name="marca" placeholder="Marca" value="{{ $producto->marca }}">
            <strong style="color: red">{{ $errors->has('marca') ? $errors->first('marca') : '' }}</strong>
            
            <label for="cantidad">Nueva cantidad</label>
            <input type="text" class="form-control" name="cantidad" placeholder="Cantidad" value="{{ $producto->cantidad }}">
            <strong style="color: red">{{ $errors->has('cantidad') ? $errors->first('cantidad') : '' }}</strong>

            <label for="costoCompra">Nuevo costo de compra</label>
            <input type="text" class="form-control" name="costoCompra" placeholder="Costo de compra" value="{{ $producto->costo_compra }}">
            <strong style="color: red">{{ $errors->has('costoCompra') ? $errors->first('costoCompra') : '' }}</strong>

            <label for="fechaIngreso">Nueva fecha de ingreso</label>
            <input type="text" class="form-control" name="fechaIngreso" placeholder="Fecha de ingreso" value="{{ $producto->fecha_ingreso }}">
            <strong style="color: red">{{ $errors->has('fechaIngreso') ? $errors->first('fechaIngreso') : '' }}</strong>

            <label for="foto">Nueva foto</label>
            {{-- <input type="file" class="form-control" name="foto" value="{{ $producto->foto }}"> --}}
            <strong style="color: red">{{ $errors->has('foto') ? $errors->first('foto') : '' }}</strong>

            <input type="submit" class="boton btn btn-primary" value="Actualizar">
        </div>
    </form>

@endsection