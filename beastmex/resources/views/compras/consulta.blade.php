@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/consulta.css') }}">
@endsection

@section('contenido')
<h1 class="titulo">Compras</h1>

<div class="consultar"> 
    <h3> Consultar productos disponibles</h3>
</div>

<div class="buscar-producto">
    <div class="col-sm-8 me-3">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Productos disponibles" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit"">Buscar</button>
            <button class="btn btn-outline-danger" type="submit">Filtrar</button>
        </form>
    </div>

@endsection