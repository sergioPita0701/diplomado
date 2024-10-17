<div class="container">
    <h2 class="text-center">Importar</h2>

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
        class="form-horizontal">
        <div class="form-group">
            <label for="version" class="col-sm-2 control-label">Seleccionar Versión:</label>
            <div class="col-sm-10">
                <select name="version" id="version" class="form-control">

                    <?php foreach ($versiones as $versionSelect):?>
                    <option value="<?= $versionSelect['idVersion'] ?>"
                        <?= ($version == $versionSelect['idVersion']) ? 'selected' : '' ?>>
                        <?= $versionSelect['nombreV'] . '-' . $versionSelect['tipoCursoV'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">

                <button type="submit" class="btn btn-primary">Cargar Transacciones</button>
            </div>
        </div>
    </form>
    <form action="<?= site_url('csv/procesar_exportacion') ?>" method="post" enctype="multipart/form-data"
        class="form-horizontal">

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="hidden" name="version" value="<?= $version ?>">
                <button type="submit" class="btn btn-success">Expotar scv</button>
            </div>
        </div>
    </form>
    <?php if (!empty($transacciones)): ?>
    <table class="table table-striped table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>ID Transacción</th>
                <th>CI</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Porcentaje Descuento (Bs)</th>
                <th>Monto Original (Bs)</th>
                <th>Monto Descuento (Bs)</th>

                <th>Versión</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transacciones as $transaccion): ?>
            <tr>
                <td><?php echo $transaccion['idTransaccion']; ?></td>
                <td><?php echo $transaccion['ciI']; ?></td>
                <td><?php echo $transaccion['nombreDiplomante']; ?></td>
                <td><?php echo $transaccion['apellidoPaternoD']; ?></td>
                <td><?php echo $transaccion['apellidoMaternoD']; ?></td>
                <td><?php echo number_format($transaccion['sumaPagos'], 2) ; ?></td>
                <td><?php echo number_format($transaccion['montoDescuentoT'], 2); ?></td>
                <td><?php
                    if ($transaccion['nombreD'] == "Ninguno" ) {
                        echo 'Sin descuento';
                    } else {
                        echo $transaccion['nombreD'] . '%';
                    }
                ?></td>
                <td><?php echo $transaccion['nombreV']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="alert alert-warning text-center" role="alert">
        No se encontraron transacciones.
    </div>
    <?php endif; ?>
</div>