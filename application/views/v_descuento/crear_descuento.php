<div class="modal fade" id="modalCrearDescuento" tabindex="-1" role="dialog" aria-labelledby="modalCrearDescuentoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCrearDescuentoLabel">Crear Descuento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para crear el descuento -->

                <form action="<?= base_url(); ?>index.php/descuento/crearDescuento" method="POST" role="form">

                    <div class="form-group">
                        <label for="nombreDescuento">Nombre</label>
                        <input type="text" class="form-control" id="txtNombreD" name="txtNombreD" placeholder="Nombre del descuento" required>

                    </div>
                    <div class="form-group">
                        <label for="descripcionDescuento">Descripción</label>
                        <textarea class="form-control" id="txtDescripcionD" name="txtDescripcionD" placeholder="Descripción del descuento" required></textarea>

                    </div>
                    <div class="form-group">
                        <label for="valorDescuentoEditar">Procentaje</label>
                        <input type="number" class="form-control" id="txtProcentajeD" name="txtProcentajeD" placeholder="Valor del descuento" required>
                    </div>
                    <div class="form-group">
                        <label for="tipoDescuentoEditar">Estado</label>
                        <select class="form-control" id="txtEstadoD" name="txtEstadoD" required>
                            <option value="1">Vigente</option>
                            <option value="2">No Vigente</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Descuento</button>
                </form>
            </div>
        </div>
    </div>
</div>