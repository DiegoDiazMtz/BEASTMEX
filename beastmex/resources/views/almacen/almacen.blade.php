@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/almacen.css') }}">
@endsection

@section('contenido')

    <h1 class="titulo">Almacen</h1>

    <div class="buscar-imprimir">
        <div class="col-sm-8 me-3">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
        <div class="col-sm-4 d-grid gap-2">
            <div class="">
                <a href="#" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Imprimir lista de productos</a>
                <a href="/agregarProducto" class="btn btn-primary boton-especial"><i class="bi bi-plus-circle"></i> Agregar producto</a>
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