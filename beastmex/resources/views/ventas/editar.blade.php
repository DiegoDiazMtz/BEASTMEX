@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/almacen.css') }}">
@endsection

@section('contenido')

    <form action="#">
        <h1 class="titulo">Editar Ticket</h1>

        <div class="form-group card text-">
            <label for="nombre">Fecha</label>
            <input type="text" class="form-control" id="nombre" placeholder="Fecha">

            <label for="nombre">Datos del Cliente</label>
            <input type="text" class="form-control" id="nombre" placeholder="Datos del Cliente">
            
            <label for="nombre">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del Producto">
            
            <label for="nombre">Marca</label>
            <input type="text" class="form-control" id="nombre" placeholder="Marca">
            
            <label for="nombre">Cantidad</label>
            <input type="text" class="form-control" id="nombre" placeholder="Cantidad">
            
            <label for="nombre">Precio</label>
            <input type="text" class="form-control" id="nombre" placeholder="Precio">
            
            <label for="nombre">Total de Compra</label>
            <input type="text" class="form-control" id="nombre" placeholder="Total de Compra">
            
            <input type="button" class="boton btn btn-primary" value="Enviar">
        </div>

    </form>

@endsection