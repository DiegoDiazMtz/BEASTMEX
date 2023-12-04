@extends('layouts.plantilla')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/compras.css') }}">
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

    @if (session()->has('success'))
    <script>
        const confirmacion = @json(session('success'));
        Swal.fire({
            icon: 'success',
            title: confirmacion,
        });
    </script>
    {{ session()->forget('success') }}
    @endif

    <div style="display: flex; align-items: center; justify-content: center;">
        <h1 class="titulo" >Compras </h1>
        <div class="btn-group" >
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="transform: translateY(+35%); margin-left: 20px">
                <span>Acciones...</span>
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('comprasProductos.index')}}">Consultar productos</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{route('compras.create')}}">Generar orden de compra</a></li>
            </ul>
        </div>
    </div>
    
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    <div class="margen">
        @foreach ($ordenesCompra as $orden)
            <div class="ticket">
                <h2 class="subtitulo">Detalles de la Compra</h2>
                <p class="subtitulo"><strong>Fecha de Compra:</strong> {{ $orden->fecha_orden }}</p>
                <p class="subtitulo"><strong>Estado:</strong>
                    @if($orden->enviado)
                        Enviado
                    @else
                        No enviado
                    @endif
                </p>
                <h3 class="subtitulo">Productos Comprados</h3>
                @foreach ($orden->productos as $producto)
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="subtitulo"><strong>Nombre del Producto:</strong> {{ $producto->nombre_producto }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="subtitulo"><strong>Cantidad:</strong> {{ $producto->cantidad_producto }}</p>
                        </div>
                    </div>
                @endforeach
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <a type="submit" class="btn btn-primary ms-5" data-bs-toggle="modal" data-bs-target="#editarModal{{ $orden->id }}"><i class="bi bi-pencil-square"></i> Editar</a>
                        <a type="submit" class="btn btn-warning ms-5" data-bs-toggle="modal" data-bs-target="#eliminarModal{{ $orden->id }}"><i class="bi bi-trash"></i> Eliminar</a>
                        <a type="submit" class="btn btn-primary ms-5" href="{{route('compras.imprimirOrdenCompra', $orden->id )}}"><i class="bi bi-printer-fill"></i> imprimir</a>
                    </div>
                    <div class="me-5">
                        <p class="total"><strong>Total:</strong> {{ $orden->total }}</p>
                    </div>
                </div>
                
            </div>
            
            <!-- Modal de Confirmación de Eliminación -->
            <div class="modal fade" id="eliminarModal{{ $orden->id }}" tabindex="-1" aria-labelledby="eliminarRecuerdoModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eliminarModalLabel">Confirmar Eliminación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>¿Estás seguro de que deseas eliminar esta orden?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form method="POST" action="{{route('compras.destroy', $orden->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para editar -->
            <div class="modal fade editar-modal" id="editarModal{{ $orden->id }}" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarModalLabel">Editar Orden de Compra</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('compras.update', $orden->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Aquí va el mismo contenido del formulario que tienes en tu vista -->
                                <style>
                                    .d-flex {
                                        align-items: center;
                                    }
                            
                                    .productos-container label {
                                        text-align: center;
                                    }
                                </style>
                                <div class="mt-1 card mb-5 form-group p-3">
                            
                                        <div class="mb-2 ">
                                            <label for="proveedor" class="form-label mt-4">Proveedor</label>
                                            <select class="form-control mt-1" name="proveedor" required>
                                                @foreach ($proveedores as $proveedor)
                                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre_proveedor }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                            
                                        <div class="mb-1 mt-2">
                                            <label for="nombre_empresa" class="form-label mt-4">Nombre de la Empresa</label>
                                            <input type="text" name="nombre_empresa" class="form-control" required>
                                        </div>
                            
                                        <div class="mb-4 mt-1">
                                            <label for="numero_productos" class="form-label mt-4">Número de Productos a Agregar</label>
                                            <input type="number" name="numero_productos" class="form-control" min="1" required>
                                        </div>
                            
                                        <div class="productos-container row">
                                            <!-- Aquí se generarán dinámicamente los campos de productos según la selección del usuario -->
                                        </div>
                                </div>
                            
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const modals = document.querySelectorAll('.editar-modal'); // Assuming you add this class to your edit modals
                                
                                        modals.forEach(function (modal) {
                                            const numeroProductosInput = modal.querySelector('input[name="numero_productos"]');
                                            const productosContainer = modal.querySelector('.productos-container');
                                
                                            numeroProductosInput.addEventListener('input', function () {
                                                const numeroProductos = parseInt(this.value);
                                                productosContainer.innerHTML = ''; // Limpiar contenedor
                                
                                                for (let i = 1; i <= numeroProductos; i++) {
                                                    productosContainer.innerHTML += `
                                                        <div class="mb-4" style="display:flex; justify-content: space-evenly;">
                                                            <div class="col-sm-6 me-2">
                                                                <label for="producto_${i}" class="form-label">Producto ${i}</label>
                                                                <select class="form-control" name="productos[${i}][producto]" required>
                                                                    @foreach ($productos as $producto)
                                                                        <option value="{{ $producto->id }}">{{ $producto->nombre_producto }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6 ms-2">
                                                                <label for="cantidad_${i}" class="form-label">Cantidad</label>
                                                                <input type="number" name="productos[${i}][cantidad]" class="form-control" min="1" required>
                                                            </div>
                                                        </div>
                                                    `;

                                                }
                                            });
                                        });
                                    });
                                    
                                </script>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            
        @endforeach
    </div>

    

@endsection
