@extends('/layouts/plantilla')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/ordenes.css') }}">
    <style>
        .d-flex {
            align-items: center;
        }

        .productos-container label {
            text-align: center;
        }

        .botones-container {
            display: flex;
            justify-content: space-evenly;
        }
    </style>
@endsection

@section('contenido')
    <h3 class="titulo">Generar Orden de Compra</h3>
    <div class="mt-1 card mb-5 form-group">
        <form action="{{ route('compras.store') }}" method="POST">
            @csrf

            <div class="mb-2 mt-4">
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

            <div class="botones-container mt-4">
                <button type="submit" class="btn btn-primary bord">Guardar Orden de Compra</button>
                <button type="submit" class="btn btn-primary bord" name="guardar_enviar_correo">Guardar y Enviar Correo</button>
                <button type="submit" class="btn btn-primary bord" name="guardar_imprimir_pdf">Guardar e Imprimir PDF</button>
            </div>
        </form>
    </div>

    <script>
        // Script para generar dinámicamente los campos de productos según la selección del usuario
        document.addEventListener('DOMContentLoaded', function() {
            const numeroProductosInput = document.querySelector('input[name="numero_productos"]');
            const productosContainer = document.querySelector('.productos-container');

            numeroProductosInput.addEventListener('input', function() {
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
    </script>
@endsection
