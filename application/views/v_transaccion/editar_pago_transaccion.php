<div class="modal fade" id="modalEditarPago" tabindex="-1" role="dialog" aria-labelledby="modalEditarPagoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarPagoLabel">Editar Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para Editar el pago -->
                <form action="<?= base_url(); ?>index.php/transaccion/EditarPagoTransaccion" method="POST" role="form">


                    <div class=" form-grouPEditar">
                        <label for="txtFechaDepositoPEditar">Fecha de Depósito</label>
                        <input type="date" class="form-control" id="txtFechaDepositoPEditar" name="txtFechaDepositoPEditar" placeholder="Fecha de Depósito" value="<?= set_value('txtFechaDepositoPEditar'); ?>">
                        <?= form_error('txtFechaDepositoPEditar', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-grouPEditar">
                        <label for="txtNumeroDepositoPEditar">Número de Depósito</label>
                        <input type="number" class="form-control" id="txtNumeroDepositoPEditar" name="txtNumeroDepositoPEditar" placeholder="Número de Depósito" value="<?= set_value('txtNumeroDepositoPEditar'); ?>">
                        <?= form_error('txtNumeroDepositoPEditar', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>

                    <div class="form-grouPEditar">
                        <label for="txtMonedaPEditar">Moneda</label>
                        <select class="form-control" id="txtMonedaPEditar" name="txtMonedaPEditar">
                            <option value="BS" <?= set_select('txtMonedaPEditar', 'BS'); ?>>BS</option>
                            <option value="USD" <?= set_select('txtMonedaPEditar', 'USD'); ?>>USD</option>
                        </select>
                        <?= form_error('txtMonedaPEditar', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-grouPEditar">
                        <label for="txtTasaCambioPEditar">Tasa Cambio</label>
                        <input type="number" step="0.01" class="form-control" id="txtTasaCambioPEditar" name="txtTasaCambioPEditar" placeholder="Tasa Cambio" value="<?= set_value('txtTasaCambioPEditar'); ?>">
                        <?= form_error('txtTasaCambioPEditar', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-grouPEditar">
                        <label for="txtMontoPEditar">Monto</label>
                        <input type="number" step="0.01" class="form-control" id="txtMontoPEditar" name="txtMontoPEditar" placeholder="Monto" value="<?= set_value('txtMontoPEditar'); ?>">
                        <?= form_error('txtMontoPEditar', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <div class="form-grouPEditar">
                        <label for="txtMontoTotalBsPEditar">Monto Total Bs</label>
                        <input type="number" step="0.01" class="form-control" id="txtMontoTotalBsPEditar" name="txtMontoTotalBsPEditar" placeholder="Monto Total" value="<?= set_value('txtMontoTotalBsPEditar'); ?> " readonly>
                        <?= form_error('txtMontoTotalBsPEditar', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                    </div>
                    <!-- Campo oculto para enviar el idTransaccion por POST -->
                    <input type="hidden" id="txtIdTransaccionEditar" name="txtIdTransaccion" value="<?= $transaccion->idTransaccion; ?>">
                    <input type="hidden" id="txtIdPagoEditar" name="txtIdPagoEditar" value="0">

                    <button type="submit" class="btn btn-primary">Editar Pago</button>
                </form>
            </div>
        </div>
    </div>
</div>