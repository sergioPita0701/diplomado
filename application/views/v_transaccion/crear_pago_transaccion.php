<div class="modal fade" id="modalCrearPago" tabindex="-1" role="dialog" aria-labelledby="modalCrearPagoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCrearPagoLabel">Crear Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para crear el pago -->
                <form action="<?= base_url(); ?>index.php/transaccion/crearPagoTransaccion" method="POST" role="form">


                    <div class=" form-grouPCrear">
                        <label for="txtFechaDepositoPCrear">Fecha de Depósito</label>
                        <input type="date" class="form-control" id="txtFechaDepositoPCrear" name="txtFechaDepositoPCrear" placeholder="Fecha de Depósito" value="<?= set_value('txtFechaDepositoPCrear'); ?>">
                        <?= form_error('txtFechaDepositoPCrear', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-grouPCrear">
                        <label for="txtNumeroDepositoPCrear">Número de Depósito</label>
                        <input type="number" class="form-control" id="txtNumeroDepositoPCrear" name="txtNumeroDepositoPCrear" placeholder="Número de Depósito" value="<?= set_value('txtNumeroDepositoPCrear'); ?>">
                        <?= form_error('txtNumeroDepositoPCrear', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>

                    <div class="form-grouPCrear">
                        <label for="txtMonedaPCrear">Moneda</label>
                        <select class="form-control" id="txtMonedaPCrear" name="txtMonedaPCrear">
                            <option value="BS" <?= set_select('txtMonedaPCrear', 'BS'); ?>>BS</option>
                            <option value="USD" <?= set_select('txtMonedaPCrear', 'USD'); ?>>USD</option>
                        </select>
                        <?= form_error('txtMonedaPCrear', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-grouPCrear">
                        <label for="txtTasaCambioPCrear">Tasa Cambio</label>
                        <input type="number" step="0.01" class="form-control" id="txtTasaCambioPCrear" name="txtTasaCambioPCrear" placeholder="Tasa Cambio" value="<?= set_value('txtTasaCambioPCrear'); ?>">
                        <?= form_error('txtTasaCambioPCrear', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-grouPCrear">
                        <label for="txtMontoPCrear">Monto</label>
                        <input type="number" step="0.01" class="form-control" id="txtMontoPCrear" name="txtMontoPCrear" placeholder="Monto" value="<?= set_value('txtMontoPCrear'); ?>">
                        <?= form_error('txtMontoPCrear', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-grouPCrear">
                        <label for="txtMontoTotalBsPCrear">Monto Total Bs</label>
                        <input type="number" step="0.01" class="form-control" id="txtMontoTotalBsPCrear" name="txtMontoTotalBsPCrear" placeholder="Monto Total" value="<?= set_value('txtMontoTotalBsPCrear'); ?> " readonly>
                        <?= form_error('txtMontoTotalBsPCrear', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <!-- Campo oculto para enviar el idTransaccion por POST -->
                    <input type="hidden" id="txtIdTransaccion" name="txtIdTransaccion" value="<?= $transaccion->idTransaccion; ?>">

                    <button type="submit" class="btn btn-primary">Crear Pago</button>
                </form>
            </div>
        </div>
    </div>
</div>