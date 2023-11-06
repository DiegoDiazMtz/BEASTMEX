@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/almacen.css') }}">
@endsection

@section('contenido')

    <form action="#">
        <h1 class="titulo">Agregar producto</h1>

        <div class="form-group card text-">
            <label for="nombre">Nombre del producto</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">

            <label for="nombre">Numero de serie</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">
            
            <label for="nombre">Marca</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">
            
            <label for="nombre">Cantidad</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">
            
            <label for="nombre">Costo compra</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">
            
            <label for="nombre">Precio de venta</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">
            
            <label for="nombre">Cantidad</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">
            
            <label for="nombre">Fecha ingreso</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">
            
            <label for="nombre">Foto</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">

            <input type="button" class="boton btn btn-primary" value="Enviar">
        </div>

    </form>

@endsection