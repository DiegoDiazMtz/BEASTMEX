@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/consulta.css') }}">
<script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
@endsection

@section('contenido')
    <h1 class="titulo">Compras</h1>
    <div class="consultar"> 
        <h3 class="subtitulo"> Consultar productos disponibles</h3>
    </div>  

    <div class="buscar-imprimir">
        <div class="col-sm-8 me-3">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Productos disponibles" aria-label="Search">
                <button class="btn btn-outline-secondary me-2" type="submit"">Buscar</button>
            </form>
        </div>
        <div class="col-sm-4 d-grid gap-2">
            <div class="d-flex">
                <a href="{{ route('compras.createOrden') }}" class="btn btn-primary">Generar Orden de Compra</a>
                <a href="{{ route('compras.create') }}" class="btn btn-primary boton-especial"> Registrar Compras</a>
            </div>
        </div>
    </div>
    
    <div class="tarjetas mt-5">
        @foreach ($consultaProductos as $producto)
            @if($producto->cantidad < 2)
                <div class="card menosde2">
            @else
                <div class="card">  
            @endif
                <div class="card-img-top align-content-center" style="height: 250px; overflow: hidden;">
                    <img src="{{ $producto->foto }}" alt="imagen-del-producto" style="object-fit: cover; max-height: 100%;">
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