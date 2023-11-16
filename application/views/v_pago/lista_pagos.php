<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 main">
            <h1>Lista de Pagos</h1>
            <div class="form-inline mb-3">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalCrearDescuento">Insertar pago</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Porcentaje de Descuento %</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Itera a través de los descuentos y muestra los datos -->
                        <?php foreach ($pagos as $fila) : ?>
                            <tr>
                                <td><?= $fila['idPago']; ?></td>
                                <td><?= $fila['idPago']; ?></td>
                                <td><?= $fila['idPago']; ?></td>
                                <td><?= $fila['idPago']; ?></td>
                                <td>
                                    <?php
                                    if ($descuento['estadoD'] == 1) {
                                        echo '<span class="badge badge-success">Vigente</span>';
                                    } else {
                                        echo '<span class="badge badge-danger">No Vigente</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <button class="btn btn-success editar-descuento" data-id="<?= $descuento['idDescuento']; ?>" data-nombre="<?= $descuento['nombreD']; ?>" data-descripcion="<?= $descuento['descripcionD']; ?>" data-porcentaje="<?= $descuento['porcentajeD']; ?>" data-estado="<?= $descuento['estadoD']; ?>">
                                        Editar
                                    </button>
                                    <a href="<?= base_url('descuento/eliminarDescuento?idDescuento=' . $descuento['idDescuento']); ?>" class="btn btn-danger" onclick="return confirm('¿Desea eliminar el descuento?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>