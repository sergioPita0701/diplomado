<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="page-header text-primary">
                    <h4>Transacciones - <small>Buscar Transacciones por Persona</small></h4>
                </div>
                <!-- Formulario de búsqueda -->
                <div class="row">
                    <div class="col-md-5 col-md-offset-6">
                        <form action="<?php echo site_url('pagoInforme/listar'); ?>" method="get">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control input-sm"
                                    placeholder="CI, nombre, apellidos..."
                                    value="<?php echo $this->input->get('search'); ?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-sm active" type="submit">Buscar</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Botón de descarga CSV -->
                <div class="row text-center" style="margin-top: 20px;">
                    <form action="<?php echo site_url('pagoInforme/descargar_csv'); ?>" method="post">
                        <input type="hidden" name="search" value="<?php echo $this->input->get('search'); ?>">
                        <button type="submit" class="btn btn-success">Descargar CSV</button>
                    </form>
                </div>

                <!-- Resultados de la búsqueda en tabla -->
                <div class="col-md-10 col-md-offset-1" id="listaTransacciones">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="display: block;">
                                <tr>
                                    <th style="width:150px;">ID Transacción</th>
                                    <th style="width:100px;">CI</th>
                                    <th style="width:150px;">Nombre</th>
                                    <th style="width:150px;">Apellido Paterno</th>
                                    <th style="width:150px;">Apellido Materno</th>
                                    <th style="width:150px;">Porcentaje Descuento (Bs)</th>
                                    <th style="width:150px;">Monto Original (Bs)</th>
                                    <th style="width:150px;">Monto Descuento (Bs)</th>
                                    <th style="width:150px;">Versión</th>
                                </tr>
                            </thead>
                            <tbody style="display: block; height: 400px; overflow-y: auto;">
                                <?php if (!empty($transacciones)): ?>
                                <?php foreach ($transacciones as $transaccion): ?>
                                <tr>
                                    <td style="width:150px;"><?php echo $transaccion['idTransaccion']; ?></td>
                                    <td style="width:100px;"><?php echo $transaccion['ciI']; ?></td>
                                    <td style="width:150px;"><?php echo $transaccion['nombreDiplomante']; ?></td>
                                    <td style="width:150px;"><?php echo $transaccion['apellidoPaternoD']; ?></td>
                                    <td style="width:150px;"><?php echo $transaccion['apellidoMaternoD']; ?></td>
                                    <td style="width:150px;"><?php echo number_format($transaccion['sumaPagos'], 2); ?>
                                    </td>
                                    <td style="width:150px;">
                                        <?php echo number_format($transaccion['montoDescuentoT'], 2); ?></td>
                                    <td style="width:150px;">
                                        <?php echo ($transaccion['nombreD'] == "Ninguno") ? 'Sin descuento' : $transaccion['nombreD'] . '%'; ?>
                                    </td>
                                    <td style="width:150px;"><?php echo $transaccion['nombreV']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="9" class="text-center">No se encontraron transacciones.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>