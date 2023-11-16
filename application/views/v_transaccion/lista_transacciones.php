    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="row panel panel-default">
            <div class="resultado"></div>
            <div class="col-md-10 col-md-offset-1 main">

                <div class="page-header">
                    <h3>Transacciones <small>Lista de Transacciones</small></h3>
                </div>
                <div class="row">
                    <!-- <div class="row">
                        <div class="form-inline col-md-3">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalCrearMulta" data-backdrop="static" data-keyboard="false">Insertar Multa</a>
                        </div>
                    </div> -->
                    <div class="col-md-5 col-md-offset-6">
                        <form action="<?= base_url('transaccion/index'); ?>" method="get">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Buscar Participante por CI del Inscrito.." value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Buscar</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div></br>
            </div>
            <div class="row">
                <div class="col-md-3 col-md-offset-1 form-inline">
                    <a href="<?= base_url('transaccion/listaTransaccionesImprimir/' . $version->idVersion); ?>" class="btn btn-primary btn-group btn-sm">
                        <span class="glyphicon glyphicon-print"></span> Imprimir
                    </a>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1" id="listaMultas">
                <div class="table-responsive">
                    <table class="table table-hover" id="transaccionesTable">
                        <thead>
                            <tr>
                                </td>
                                <th>ID</th>
                                <th>Participante</th>
                                <th>Carnet</th>

                                <th>Costo - Descuento</th>
                                <th>Monto Pagado</th>
                                <th>Estado</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transacciones as $fila) : ?>
                                <tr>
                                    <td><?= $fila['idTransaccion']; ?></td>
                                    <td>
                                        <?= $fila['apellidoPaternoD']
                                            . ' ' . $fila['apellidoMaternoD']
                                            . ' ' . $fila['nombreD']; ?>
                                    </td>
                                    <td><?= $fila['ciI']; ?></td>

                                    <td><?= $fila['montoDescuentoT']; ?> Bs.</td>
                                    <td><?= $fila['sumaPagos']; ?> Bs.</td>
                                    <td><?= $fila['estadoT']; ?></td>

                                    <td>
                                        <a href=" <?= base_url(); ?>index.php/transaccion/detalle/<?= $fila['idTransaccion']; ?>" class="btn btn-info">Agregar Pago</a>


                                        <!-- <a href=" <?= base_url(); ?>index.php/multa/eliminarMulta?idMulta=<?= $fila['idTransaccion']; ?>" onclick="return confirm('¿Desea eliminar esta transaccion?')" class="btn btn-danger">Eliminar</a> -->
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>



                    </table>
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <ul class="pagination justify-content-center">
                                <li class="page-item <?php echo ($pagina_actual <= 1) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="<?= base_url(); ?>index.php/transaccion/index/<?= ($pagina_actual - 1); ?>" aria-label="Anterior">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
                                    <li class="page-item <?php echo ($pagina_actual == $i) ? 'active' : ''; ?>">
                                        <a class="page-link" href="<?= base_url(); ?>index.php/transaccion/index/<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?php echo ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="<?= base_url(); ?>index.php/transaccion/index/<?= ($pagina_actual + 1); ?>" aria-label="Siguiente">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </div>