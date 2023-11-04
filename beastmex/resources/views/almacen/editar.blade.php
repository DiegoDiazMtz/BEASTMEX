@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/almacen.css') }}">
@endsection

@section('contenido')

    <form action="#">
        <h1 class="titulo">Editar producto</h1>

        <div class="form-group card">
            <label for="nombre">Nuevo nombre del producto</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">

            <label for="nombre">Nuevo numero de serie</label>
            <input type="text" class="form-control" id="nombre" placeholder="Numero de serie">
            
            <label for="nombre">Nueva marca</label>
            <input type="text" class="form-control" id="nombre" placeholder="Marca">
            
            <label for="nombre">Nueva cantidad</label>
            <input type="text" class="form-control" id="nombre" placeholder="Cantidad">
            
            <label for="nombre">Nuevo costo compra</label>
            <input type="text" class="form-control" id="nombre" placeholder="Costo compra">
            
            <label for="nombre">Nuevo precio de venta</label>
            <input type="text" class="form-control" id="nombre" placeholder="Precio de venta">
            
            <label for="nombre">Nueva cantidad</label>
            <input type="text" class="form-control" id="nombre" placeholder="Cantidad">
            
            <label for="nombre">Nueva fecha ingreso</label>
            <input type="text" class="form-control" id="nombre" placeholder="Fecha ingreso">
            
            <label for="nombre">Nueva foto</label>
            <input type="text" class="form-control" id="nombre" placeholder="Foto">

            <input type="button" class="boton btn btn-primary" value="Enviar">
        </div>

    </form>

@endsection