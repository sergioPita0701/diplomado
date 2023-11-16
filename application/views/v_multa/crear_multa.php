<div class="modal fade" id="modalCrearMulta" tabindex="-1" role="dialog" aria-labelledby="modalCrearMultaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCrearMultaLabel">Crear Multa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para crear la multa -->
                <form action="<?= base_url(); ?>index.php/multa/crearMulta" method="POST" role="form">

                    <div class="form-group">
                        <label for="nombreMulta">Nombre</label>
                        <input type="text" class="form-control" id="txtNombreM" name="txtNombreM" placeholder="Nombre de la multa" value="<?= set_value('txtNombreM'); ?>">
                        <?= form_error('txtNombreM', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="descripcionMulta">Descripción</label>
                        <textarea class="form-control" id="txtDescripcionM" name="txtDescripcionM" placeholder="Descripción de la multa"><?= set_value('txtDescripcionM'); ?></textarea>
                        <?= form_error('txtDescripcionM', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="txtMontoM">Monto</label>
                        <input type="number" step="0.01" class="form-control" id="txtMontoM" name="txtMontoM" placeholder="Monto de la multa" value="<?= set_value('txtMontoM'); ?>">
                        <?= form_error('txtMontoM', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="txtMonedaM">Moneda</label>
                        <select class="form-control" id="txtMonedaM" name="txtMonedaM">
                            <option value="BS" <?= set_select('txtMonedaM', 'BS'); ?>>BS</option>
                            <option value="USD" <?= set_select('txtMonedaM', 'USD'); ?>>USD</option>
                        </select>
                        <?= form_error('txtMonedaM', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="estadoMulta">Estado</label>
                        <select class="form-control" id="txtEstadoM" name="txtEstadoM">
                            <option value="1" <?= set_select('txtEstadoM', '1'); ?>>Activo</option>
                            <option value="2" <?= set_select('txtEstadoM', '2'); ?>>Inactivo</option>
                        </select>
                        <?= form_error('txtEstadoM', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Multa</button>
                </form>
            </div>
        </div>
    </div>
</div>