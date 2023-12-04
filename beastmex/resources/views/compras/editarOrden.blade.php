<!-- Modal para editar -->
<div class="modal fade" id="editarModal{{ $orden->id }}" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Orden de Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de edición -->
                <form action="{{ route('compras.update', $orden->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <!-- Campos de edición -->
                    <label for="proveedor">Proveedor:</label>
                    <select name="proveedor" id="proveedor" class="form-control">
                        <!-- Opciones del proveedor -->
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}" {{ $proveedor->id == $orden->id_proveedor ? 'selected' : '' }}>
                                {{ $proveedor->nombre_proveedor	 }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Más campos de edición según sea necesario -->
                    <!-- ... -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
