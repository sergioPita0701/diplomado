<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row panel panel-default">
        <div class="resultado"></div>
        <div class="col-md-10 col-md-offset-1 main">
            <div class="row">
                <div class="form-inline col-md-3">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalCrearMulta" data-backdrop="static" data-keyboard="false">Insertar Multa</a>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1" id="listaMultas">
            <div class="table-responsive">
                <table class="table table-hover" id="multasTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Monto</th>
                            <th>MoneDA</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($multas as $multa) : ?>
                            <tr>
                                <td><?= $multa['idMulta']; ?></td>
                                <td><?= $multa['nombreM']; ?></td>
                                <td><?= $multa['descripcionM']; ?></td>
                                <td><?= $multa['montoM']; ?></td>
                                <td><?= $multa['monedaM']; ?></td>

                                <td><?= ($multa['estadoM'] == 1) ? 'Activo' : 'Inactivo'; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success editar-multa" data-multa-id="<?= $multa['idMulta']; ?>">Editar</button>
                                    <a href="<?= base_url(); ?>index.php/multa/eliminarMulta?idMulta=<?= $multa['idMulta']; ?>" onclick="return confirm('¿Desea eliminar esta multa?')" class="btn btn-danger">Eliminar</a>
                                 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('crear_multa.php'); ?>
<?php include_once('editar_multa.php'); ?>