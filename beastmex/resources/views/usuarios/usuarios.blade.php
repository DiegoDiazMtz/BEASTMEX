@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/usuarios.css') }}">
@endsection

@section('contenido')

    <h1 class="titulo">Usuarios</h1>

    <div class="buscar-imprimir">
        <div class="col-sm-10">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
  
        <div class="col-sm-2 ms-2">
            <div class="">
                <a href="/editarAlmacen" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i></i> Agregar usuario</a>
            </div>
        </div>
    </div>

    <div class="tarjetas">
        @for ($i = 0; $i < 10; $i++)
        <div class="card">  
            <div class="card-header">
                <h2>Usuario</h2>
            </div>
            <div class="card-body">
                <p class="card-text">
                    Nombre Completo del Usuario
                </p>
                <p class="card-text">
                    Correo del Usuario
                </p>
                <p class="card-text">
                    Puesto del Usuario
                </p>
                <p class="card-text">
                    Contraseña del Usuario
                </p>
                <a href="/editarAlmacen" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</a>
                <a href="#" class="btn btn-warning"><i class="bi bi-trash"></i> Eliminar</a>
            </div>
        </div>
        @endfor
    </div>


@endsection