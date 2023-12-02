@extends('/layouts/plantilla')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/almacen.css') }}">
<script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
@endsection

@section('contenido')

    <h1 class="titulo">Almacen</h1>

    @if (session()->has('confirmacion'))
    <script>
        const confirmacion = @json(session('confirmacion'));
        Swal.fire({
            icon: 'success',
            title: confirmacion,
        });
    </script>
    {{ session()->forget('confirmacion') }}
    @endif

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

    <div class="buscar-imprimir ">
        <div class="col-sm-8 me-3">
            <form method="POST" action="{{ route('almacen.filtro') }}" class="d-flex" role="search">
                @csrf
                <input class="form-control me-2" name="Filtro" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
        <div class="col-sm-4 d-grid gap-2">
            <div class="">
                <button id="imprimirPDF" class="btn btn-primary" onclick="imprimirListaProductos()"><i class="bi bi-printer-fill"></i> Imprimir lista de productos</button>
                <a href="{{ route('almacen.create') }}" class="btn btn-primary boton-especial"><i class="bi bi-plus-circle"></i> Agregar producto</a>
            </div>
        </div>
    </div>
    
    <div class="tarjetas mt-5">
        @foreach ($consultaProductos as $producto)
            <div class="card" style="width: 18rem;">
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
                            <strong>Stock: </strong>{{$producto->cantidad}}
                        </div>
                        <div class="col-sm-12 marca card-text">
                            <strong>Numero de serie: </strong>{{$producto->no_serie}}
                        </div>
                        <div class="col-sm-12 marca card-text">
                            <strong>Fecha de registro: </strong>{{$producto->fecha_ingreso}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{ route('almacen.edit', $producto->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</button>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#confirmarEliminarModal{{ $producto->id }}"><i class="bi bi-trash"></i> Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        
            {{-- ------------------------------------------------- Modal ----------------------------------------------------- --}}
            <div class="modal fade" id="confirmarEliminarModal{{$producto->id}}" tabindex="-1" aria-labelledby="confirmarEliminarModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmarEliminarModalLabel">Confirmar Eliminación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro de que deseas eliminar este producto?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form id="eliminarForm" method="POST" action="{{ route('almacen.destroy', $producto->id) }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <script>
        function imprimirListaProductos() {
            // Realizar una solicitud AJAX a la ruta de impresión
            fetch("{{ route('imprimir.lista.productos') }}")
                .then(response => response.blob())
                .then(blob => {
                    // Crear un objeto URL del blob y crear un enlace para descargar el PDF
                    var url = window.URL.createObjectURL(blob);
                    var a = document.createElement('a');
                    a.href = url;
                    a.download = 'lista_productos.pdf';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                })
                .catch(error => console.error('Error al imprimir lista de productos:', error));
        }
    </script>
    

@endsection