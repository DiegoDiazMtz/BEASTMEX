@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/consulta.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
@endsection

@section('contenido')

    @if (session()->has('fallo'))
    <script>
        const confirmacion = @json(session('fallo'));
        Swal.fire({
            icon: 'error',
            title: confirmacion,
        });
    </script>
    {{ session()->forget('fallo') }}
    @endif

    <h1 class="titulo">Compras</h1>
    <div class="consultar" style="display: flex; align-items: center; justify-content: start;"> 
        <a href="{{ route('compras.index') }}" class="subtitulo"> 
            <i class="bi bi-arrow-left-circle-fill flecha"></i>
        </a>
        <h3 class="subtitulo"> Consultar productos disponibles</h3>
    </div>  

    <div class="buscar-imprimir">
        <div class="col-sm-10">
            <form class="d-flex" action="{{ route('compras.filtrar') }}" method="POST">
                @csrf
                <input class="form-control me-2" name="filtro" placeholder="Productos disponibles" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </form>
        </div>
        <div class="col-sm-2">
            <div class="d-flex">
                <a href="{{ route('compras.create') }}" class="btn btn-primary w-100 ms-2" style="margin-right: 10px">Generar Orden de Compra</a>
            </div>
        </div>
    </div>
    
    
    <div class="tarjetas mt-5">
        @foreach ($consultaProductos as $producto)
            @if($producto->cantidad < 2)
                <div class="card menosde2">
            @elseif($producto->cantidad < 100)
                <div class="card menosde100">
            @else
                <div class="card">  
            @endif
                <div class="card-img-top align-content-center" style="height: 250px; overflow: hidden;">
                    <img src="{{ asset($producto->foto) }}" alt="imagen-del-producto" style="object-fit: cover; max-height: 100%;">
                </div>
                
                <div class="card-body">
                    <h5 class="card-title bold"><strong>{{$producto->nombre_producto}}</strong></h5>
                    <div class="row mb-4">
                        <div class="col-sm-12 marca">
                            <strong>Marca: </strong>{{$producto->marca}}
                        </div>
                        <div class="col-sm-6 marca card-text">
                            <strong>Precio: </strong>{{$producto->precio_venta}}
                        </div>
                        <div class="col-sm-6 marca card-text">
                            @if($producto->cantidad < 2)
                                <strong class="resaltado">Stock: {{$producto->cantidad}}</strong>
                            @elseif($producto->cantidad < 100)
                            <strong class="resaltado2">Stock: {{$producto->cantidad}}</strong>
                            @else
                                <strong>Stock: </strong>{{$producto->cantidad}}
                            @endif
                        </div>
                        <div class="col-sm-12 marca card-text">
                            <strong>Numero de serie: </strong>{{$producto->no_serie}}
                        </div>
                        <div class="col-sm-12 marca card-text">
                            <strong>Fecha de registro: </strong>{{$producto->fecha_ingreso}}
                        </div>
                    </div>
                </div>
            </div>
        
        @endforeach
    </div>
    
    
@endsection