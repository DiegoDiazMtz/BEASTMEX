@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/consulta.css') }}">
@endsection

@section('contenido')
<h1 class="titulo">Compras</h1>
<div class="consultar"> 
    <h3> Consultar productos disponibles</h3>
</div>  

<div class="buscar-imprimir">
    <div class="col-sm-8 me-3">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Productos disponibles" aria-label="Search">
            <button class="btn btn-outline-secondary me-2" type="submit"">Buscar</button>
            <button class="btn btn-outline-danger" type="submit">Filtrar</button>
        </form>
    </div>
    <div class="col-sm-4 d-grid gap-2">
        <div class="">
            <a href="{{ route('compras.createOrden') }}" class="btn btn-primary">Generar Orden de Compra</a>
            <a href="{{ route('compras.create') }}" class="btn btn-primary boton-especial"> Registrar Compras</a>
        </div>
    </div>
</div>

<div class="tarjetas">
    @for ($i = 0; $i < 10; $i++)
    <div class="card">
        <div class="card-header">
            <h2>Producto</h2>
        </div>
        <div class="card-body">
            <p class="card-text">
                Descripcion del producto
            </p>
            <a href="/editarAlmacen" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</a>
            <a href="#" class="btn btn-warning"><i class="bi bi-trash"></i> Eliminar</a>
        </div>
    </div>
    @endfor
</div> 

@endsection