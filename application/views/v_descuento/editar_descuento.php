<div class="modal fade" id="modalEditarDescuento" tabindex="-1" role="dialog" aria-labelledby="modalEditarDescuentoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarDescuentoLabel">Editar Descuento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para editar el descuento -->

                <form action="<?= base_url(); ?>index.php/descuento/editarDescuento" method="POST" role="form">
                    <div class="form-group">
                        <label for="nombreDescuentoEditar">Nombre</label>
                        <input type="text" class="form-control" id="nombreDescuentoEditar" name="txtNombreD" placeholder="Nombre del descuento" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcionDescuentoEditar">Descripción</label>
                        <textarea class="form-control" id="descripcionDescuentoEditar" name="txtDescripcionD" placeholder="Descripción del descuento" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="porcentajeDescuentoEditar">Procentaje</label>
                        <input type="number" class="form-control" id="porcentajeDescuentoEditar" name="txtPorcentajeD" placeholder="Valor del descuento" required>
                    </div>
                    <div class="form-group">
                        <label for="estadoDescuentoEditar">Estado</label>
                        <select class="form-control" id="estadoDescuentoEditar" name="txtEstadoD" required>
                            <option value="1">Vigente</option>
                            <option value="2">No Vigente</option>
                        </select>
                    </div>
                    <input type="hidden" id="descuentoIdEditar" name="txtIdD">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>