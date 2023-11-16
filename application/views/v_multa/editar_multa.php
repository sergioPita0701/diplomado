<div class="modal fade" id="modalEditarMulta" tabindex="-1" role="dialog" aria-labelledby="modalEditarMultaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarMultaLabel">Editar Multa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para editar la multa -->
                <form action="<?= base_url(); ?>index.php/multa/editarMulta" method="POST" role="form">
                    <!-- Campos del formulario para la edición de la multa -->
                    <div class="form-group">
                        <label for="txtNombreMEditar">Nombre</label>
                        <input type="text" class="form-control" id="txtNombreMEditar" name="txtNombreMEditar" placeholder="Nombre de la multa" value="<?= set_value('txtNombreMEditar'); ?>">
                        <?= form_error('txtNombreMEditar', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="descripcionMulta">Descripción</label>
                        <textarea class="form-control" id="txtDescripcionMEditar" name="txtDescripcionMEditar" placeholder="Descripción de la multa"><?= set_value('txtDescripcionMEditar'); ?></textarea>
                        <?= form_error('txtDescripcionMEditar', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="txtMontoMEditar">Monto</label>
                        <input type="number" step="0.01" class="form-control" id="txtMontoMEditar" name="txtMontoMEditar" placeholder="Monto de la multa" value="<?= set_value('montoMEditar'); ?>">
                        <?= form_error('txtMontoMEditar', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="txtMonedaMEditar">Moneda</label>
                        <select class="form-control" id="txtMonedaMEditar" name="txtMonedaMEditar">
                            <option value="BS" <?= set_select('txtMonedaMEditar', 'BS'); ?>>BS</option>
                            <option value="USD" <?= set_select('txtMonedaMEditar', 'USD'); ?>>USD</option>
                        </select>
                        <?= form_error('txtMonedaMEditar', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="estadoMulta">Estado</label>
                        <select class="form-control" id="txtEstadoMEditar" name="txtEstadoMEditar">
                            <option value="1" <?= set_select('txtEstadoMEditar', '1'); ?>>Activo</option>
                            <option value="2" <?= set_select('txtEstadoMEditar', '2'); ?>>Inactivo</option>
                        </select>
                        <?= form_error('txtEstadoMEditar', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <input type="hidden" id="txtIdMultaEditar" name="txtIdMultaEditar">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>