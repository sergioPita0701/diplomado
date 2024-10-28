<div class="container">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="page-header text-primary">
                        <h2 class="text-center">Exportar</h2>

                        <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success') ?>
                        </div>
                        <?php elseif($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error') ?>
                        </div>
                        <?php endif; ?>

                        <form action="<?= site_url('csv/exportar_csv') ?>" method="get" enctype="multipart/form-data"
                            class="form-horizontal" id="csvVersionFormSelect">
                            <div class="form-group">
                                <label for="version" class="col-sm-2 control-label">Seleccionar Versión:</label>
                                <div class="col-sm-10">
                                    <select name="version" id="versionSelectCSV" class="form-control">
                                        <?php foreach ($versiones as $versionSelect): ?>
                                        <option value="<?= $versionSelect['idVersion'] ?>"
                                            <?= ($version == $versionSelect['idVersion']) ? 'selected' : '' ?>>
                                            <?= $versionSelect['nombreV'] . '-' . $versionSelect['tipoCursoV'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </form>

                        <form action="<?= site_url('csv/procesar_exportacion') ?>" method="post"
                            enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="hidden" name="version" value="<?= $version ?>">
                                    <button type="submit" class="btn btn-success">Exportar CSV</button>
                                </div>
                            </div>
                        </form>

                        <?php if (!empty($transacciones)): ?>
                        <div class="col-md-10 col-md-offset-1" id="listaTransacciones">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Transacción</th>
                                            <th>CI</th>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Porcentaje Descuento (%)</th>
                                            <th>Monto Original (Bs)</th>
                                            <th>Monto Descuento (Bs)</th>
                                            <th>Versión</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $co =0; foreach ($transacciones as $transaccion): ?>
                                        <tr>
                                            <td><?= $co+=1; ?></td>
                                            <td><?= $transaccion['idTransaccion']; ?></td>
                                            <td><?= $transaccion['ciI']; ?></td>
                                            <td><?= $transaccion['nombreDiplomante']; ?></td>
                                            <td><?= $transaccion['apellidoPaternoD']; ?></td>
                                            <td><?= $transaccion['apellidoMaternoD']; ?></td>

                                            <td><?= number_format($transaccion['sumaPagos'], 2); ?></td>

                                            <td><?= number_format($transaccion['montoOriginalT'], 2); ?></td>
                                            <td><?= $transaccion['porcentajeD'] ?> %</td>
                                            <td><?= $transaccion['nombreV']; ?></td>


                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="alert alert-warning text-center" role="alert">
                            No se encontraron transacciones.
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#versionSelectCSV').on('change', function() {
        alert('hola');
        // Si una versión válida está seleccionada, envía el formulario

    });
});
</script>