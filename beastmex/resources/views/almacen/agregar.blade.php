@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/almacen.css') }}">
@endsection

@section('contenido')

    <form method="POST" action="{{ route('almacen.store')}}" enctype="multipart/form-data">
        @csrf
        <h1 class="titulo">Agregar producto</h1>

        <div class="form-group card">
            <label >Nombre del producto</label>
            <input type="text" class="form-control" name="nombreProd" value="{{old('nombreProd')}}">
            <strong style="color: red">{{ $errors->has('numeroSerie') ? $errors->first('numeroSerie') : '' }}</strong>

            <label >Numero de serie</label>
            <input type="text" class="form-control" name="numeroSerie" value="{{old('numeroSerie')}}">
            <strong style="color: red">{{ $errors->has('marca') ? $errors->first('marca') : '' }}</strong>
            
            <label >Marca</label>
            <input type="text" class="form-control" name="marca" value="{{old('marca')}}">
            <strong style="color: red">{{ $errors->has('cantidad') ? $errors->first('cantidad') : '' }}</strong>
            
            <label >Cantidad</label>
            <input type="text" class="form-control" name="cantidad" value="{{old('cantidad')}}">
            <strong style="color: red">{{ $errors->has('costoCompra') ? $errors->first('costoCompra') : '' }}</strong>
            
            <label >Costo compra</label>
            <input type="text" class="form-control" name="costoCompra" value="{{old('costoCompra')}}">
            <strong style="color: red">{{ $errors->has('precioVenta') ? $errors->first('precioVenta') : '' }}</strong>
            
            <label >Foto</label>
            <input type="file" class="form-control" name="foto" value="{{old('foto')}}">
            <strong style="color: red">{{ $errors->has('foto') ? $errors->first('foto') : '' }}</strong>

            <input type="submit" class="boton btn btn-primary" value="Enviar">
        </div>

    </form>

@endsection