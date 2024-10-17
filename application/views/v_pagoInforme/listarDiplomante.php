<div class="container">
    <h1 class="text-center">Buscar Transacciones por Persona</h1>

    <div class="row">
        <!-- Formulario de búsqueda -->
        <form action="<?php echo site_url('pagoInforme/listar'); ?>" method="get" class="form-inline text-center">
            <div class="form-group">
                <label for="search" class="sr-only">Buscar:</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="CI, nombre, apellidos..."
                    value="<?php echo $this->input->get('search'); ?>"> <!-- Mantiene el valor de búsqueda -->
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    <!-- Espacio entre formularios -->
    <div class="row text-center" style="margin-top: 20px;">
        <!-- Formulario para descargar CSV -->
        <form action="<?php echo site_url('pagoInforme/descargar_csv'); ?>" method="post">
            <!-- Campo oculto para pasar el valor de búsqueda -->
            <input type="hidden" id="search" name="search" value="<?php echo $this->input->get('search'); ?>">
            <button type="submit" class="btn btn-success">Descargar CSV</button>
        </form>
    </div>
    <!-- Formulario de búsqueda -->

    <!-- Mostrar los resultados -->
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