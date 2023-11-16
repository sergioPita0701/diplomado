<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="page-header">
                    <center> Información de la Versión</center>
                </h1>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Od:</dt>
                            <dd><?= $version->idVersion; ?></dd>
                            <dt>Nombre:</dt>
                            <dd><?= $version->nombreV; ?></dd>

                            <dt>Descripción:</dt>
                            <dd><?= $version->descripcionV; ?></dd>

                            <dt>Estado:</dt>
                            <dd><?= ($version->estadoV == '1') ? '<span class="label label-success">Activo</span>' : '<span class="label label-danger">Inactivo</span>'; ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        </h1><br>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <!-- <strong><h4 class="page-header">Módulo(Asignaturas) Registrados</h4></strong>    -->
                <!-- <div class="panel panel-default"> -->
                <!-- <div class="panel-body "> -->
                <div class="row">

                </div>
                <div class="col-md-12 col-md-offset- " id="listamodulos">


                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Lista de Módulos - Asignaturas</h2>
                        </div>
                        <div class="col-md-3 col-md-offset-3">
                            <a id="btnAbrirModal" class="btn btn-primary btn-block" href="#" data-toggle="modal" data-target="#modalCrearModuloAsignatura">
                                <span class="glyphicon glyphicon-plus"></span> Crear Asignatura
                            </a>
                        </div>
                    </div>
                    <div class="row">


                        <div class="table-responsive" id="espacio" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-hover" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; word-break: break-word;">#</th>
                                        <th style="width: 15%; word-break: break-word;">No. Módulos</th>
                                        <th style="width: 15%; word-break: break-word;">Nombre Módulo</th>
                                        <th style="width: 15%; word-break: break-word;">Nombre Asignatura</th>
                                        <th style="width: 10%; word-break: break-word;">Estado</th>
                                        <th style="width: 10%; word-break: break-word;">Desde</th>
                                        <th style="width: 10%; word-break: break-word;">Hasta</th>
                                        <th style="width: 20%; word-break: break-word;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($modulo as $fila) : ?>
                                        <tr>
                                            <td><strong><small><?= $fila['numeroM'];  ?></small></strong></td>
                                            <td><small><?= convertirANumerosRomanos($fila['nivelM']); ?></small></td>
                                            <td><small><?= $fila['nombreM']; ?></small></td>
                                            <td><small><?= $fila['asignaturaNombreM']; ?></small></td>
                                            <td>
                                                <div style="display: inline-block; background-color: <?= ($fila['vigenteMo'] == 1) ? 'green' : 'red'; ?>; color: white; padding: 5px; text-align: center;">
                                                    <small><?= $fila['vigenteMo'] == 1 ? 'Activo' : 'No Activo'; ?></small>
                                                </div>
                                            </td>
                                            <td><small><?= $fila['fecha_inicioMo']; ?></small></td>
                                            <td><small><?= $fila['fecha_finalMo']; ?></small></td>
                                            <td>
                                                <div class="btn-group">

                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Acciones <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="editar-modulo-btn" data-id="<?= $fila['idModulo'] ?>" data-toggle="modal" data-target="#modalEditarModuloAsignatura">
                                                                <span class="glyphicon glyphicon-pencil"></span> Editar
                                                            </a>
                                                        </li>
                                                        <li role="separator" class="divider"></li>
                                                        <li>
                                                            <a class="editar-modulo-btn" href="<?= base_url('index.php/modulo/listaDiplomantes_porModulo_imprimir/' . $fila['numeroM']); ?>">
                                                                <span class="glyphicon glyphicon-print"></span> Imprimir
                                                            </a>
                                                        </li>
                                                        <li role="separator" class="divider"></li>
                                                        <li>
                                                            <a class="editar-modulo-btn" href="<?= base_url('index.php/modulo/eliminarModulo/' . $fila['idModulo'] . '/' . $version->idVersion); ?>" onclick="return confirm('Desea realmente eliminar Modulo?');">
                                                                <span class="glyphicon glyphicon-trash"></span> Eliminar
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>


    </div>
</div>
</div>
</div>
<?php include_once('crear_asignatura_modulo.php'); ?>
<?php include_once('editar_asignatura_modulo.php'); ?>