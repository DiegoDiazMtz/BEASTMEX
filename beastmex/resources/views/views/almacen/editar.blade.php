@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/almacen.css') }}">
@endsection

@section('contenido')

    <form action="#">
        <h1 class="titulo">Editar producto</h1>

        <div class="form-group card">
            <label for="nombre">Nombre del producto</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">
            <label for="nombre">Descripcion del producto</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">
            <label for="nombre">No</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">
            <label for="nombre">Nombre del producto</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto">
        </div>

    </form>

@endsection