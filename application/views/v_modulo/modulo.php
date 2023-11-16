<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="page-header">
                    <center>Modulo-Asignaturas</center>
                </h1><br>
                <div class="row">
                    <div class="col-md-9 col-md-offset-2">
                        <form action="http://localhost:8080/diplomado/index.php/modulo/crearModulo" method="POST" class="from-horizontal" role="form">
                            <div class="row">
                                <div class="panel-body ">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <label for=""><small>Numero</small></label>
                                                    <input type="number" name="txtNumM" id="nummod" value="<?= $ultimo + 1; ?>" class="form-control input-sm" placeholder="Insertar Nivel" readonly><!---->
                                                    <?= form_error('txtNumM', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for=""><small>Nombre</small></label>
                                                    <input type="text" name="txtNombreM" class="form-control input-sm" placeholder="Ej. Modulo I.." value="<?= set_value('txtNombreM'); ?>">
                                                    <?= form_error('txtNombreM', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for=""><small>Activado</small></label>
                                                    <select class="form-control input-sm" id="vigentemo" name="vigentemo">
                                                        <option> </option>
                                                        <option value="1" <?= set_select('vigentemo', '1'); ?>>SI</option>
                                                        <option value="0" <?= set_select('vigentemo', '0'); ?>>NO</option>
                                                    </select>
                                                    <?= form_error('vigentemo', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                                </div>
                                                <div class="col-md-8">
                                                    <center><label for=""><small>Título del Módulo</small></label></center>
                                                    <input type="text" name="txtDescripcionM" class="form-control input-sm" placeholder="Insertar Título del Módulo o descripción " value="<?= set_value('txtDescripcionM'); ?>">
                                                    <?= form_error('txtDescripcionM', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                                </div>

                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label for=""><small>Fecha de Inicio</small></label>
                                                    <input type="date" name="txtFechaInicioMo" class="form-control input-sm" value="<?= set_value('txtFechaInicioMo'); ?>">
                                                </div>
                                                <div class="col-md-5">
                                                    <label for=""><small>Fecha de Culminacion</small></label>
                                                    <input type="date" name="txtFechaFinalMo" class="form-control input-sm" value="<?= set_value('txtFechaFinalMo'); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-1">
                                            <div class="row">
                                                </br></br>
                                                <input class="btn btn-primary btn-sm " type="submit" value="Registrar Modulo" onClick="">
                                                <hr>
                                                <button class="btn btn-default btn-sm active" type="reset">Borrar Todo</button>
                                                <hr>
                                                <a href="<?= base_url(); ?>index.php/paralelo">Crear/Editar Paralelos</a>
                                            </div>

                                        </div>
                                    </div>



                                </div>


                                <!-- </div> -->
                            </div>
                        </form>
                    </div>

                </div></br>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <strong>
                            <h4 class="page-header">Modulo-Asignaturas Registrados </h4>
                        </strong>
                        <!-- <div class="panel panel-default"> -->
                        <!-- <div class="panel-body "> -->
                        <div class="row">
                            <div class="col-md-12 col-md-offset- " id="listamodulos">

                                <div class="table-responsive ">
                                    <table class="table table-hover " style="table-layout:; width:900px">
                                        <thead>
                                            <th class="active">
                                                <center>#</center>
                                            </th>
                                            <th class="active">
                                                <center>No.</center>
                                            </th>
                                            <th class="active">
                                                <center>Nombre</center>
                                            </th>
                                            <th class="active">
                                                <center>Titulo</center>
                                            </th>
                                            <th class="active">
                                                <center>Estado</center>
                                            </th>
                                            <th class="active">
                                                <center>Desde</center>
                                            </th>
                                            <th class="active">
                                                <center>Hasta</center>
                                            </th>
                                            <th class="active">
                                                <center>Operacion</center>
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            <?php foreach ($modulo as $fila) : ?>
                                                <tr>
                                                    <td style="width:50px; word-break:break-word"><strong><small>
                                                                <center><?= $i = $i + 1;  ?></center>
                                                            </small></strong></td>
                                                    <td style="width:70px; word-break:break-word"><small>
                                                            <center><?= $fila['numeroM']; ?></center>
                                                        </small></td>
                                                    <td style="width:150px; word-break:break-word"><small>
                                                            <center><?= $fila['nombreM']; ?></center>
                                                        </small></td>
                                                    <td style="width:200px; word-break:break-word"><small>
                                                            <center><?= $fila['descripcionM']; ?></center>
                                                        </small></td>
                                                    <td style="width:100px; word-break:break-word"><small>
                                                            <center><?= $fila['vigenteMo'] == 1 ? 'Activo' : 'No Activo'; ?></center>
                                                        </small></td>
                                                    <td style="width:100px; word-break:break-word"><small>
                                                            <center><?= $fila['fecha_inicioMo']; ?></center>
                                                        </small></td>
                                                    <td style="width:100px; word-break:break-word"><small>
                                                            <center><?= $fila['fecha_finalMo']; ?></center>
                                                        </small></td>

                                                    <td style="width:80px; word-break:break-word">

                                                        <!-- Button modal -->
                                                        <b href="" type="" class="btn btn-success btn-group btn-xs">
                                                            <span class="glyphicon glyphicon-cog"></span> </b>

                                                        <!-- <a href="<?= base_url('index.php/modulo/deleteModulo/' . $fila['idModulo']); ?>" type="" class="btn btn-danger btn-group btn-xs" onclick="return confirm('Desea Realmente Eliminar el Modulo?');">
                                                                <span class="glyphicon glyphicon-remove"></span> </a> -->

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

<!-- Modal Editar Modulo-->
<div class="modal fade" id="modalEditarModulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edicion -<small> Modulo Numero <span id="numsele" name=""></span></small></h4>
            </div>
            <form action="http://localhost:8080/diplomado/index.php/modulo/editaMod" method="POST" role="form">
                <div class="modal-body list-group">
                    <!-- <div class="row">
                        <div class="col-md-5 col-md-offset-4">
                            <input type="button" class="btn btn-success" value="Editar Datos" onclick="habilitaredicionmod()">
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            <input type="hidden" id="txtnumsele" name="txtnumsele" class="form-control input-sm">
                        </div>

                    </div></br>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            Nombre : <ul id="nombresele" class="list-group-item-success"></ul>
                            <input type="text" id="txtnombresele" name="txtnombresele" class="form-control input-sm" readonly></br>
                            <!-- <p id="txtnombresele" name="txtnombresele"></p> -->
                        </div>
                        <div class="col-md-4 col-md-offset-">
                            Estado : <ul id="vigencia" class="list-group-item-success"></ul>
                            <div id="vigen"><!-- hidden="hidden" -->
                                <select class="form-control input-sm" id="vigenteedit" name="vigenteedit">
                                    <!-- <option>           </option> -->
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </div>
                        </div>

                    </div></br>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <!-- Titulo : <textarea  wrap="hard" rows="1" id="descripcionsele" name="txtdescripcionsele" class="form-control input-sm" disabled></textarea> -->
                            <input type="text" id="txtdescripcionsele" name="txtdescripcionsele" class="form-control input-sm"></br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            Fecha de Inicio :<ul id="fechainicio" class="list-group-item-success"></ul>
                            <span id="fechai"><input type="date" id="txtfechainicio" name="txtfechainicio" class="form-control input-sm"></span></br>
                        </div>
                        <div class="col-md-4 col-md-offset-">
                            Fecha de Culminación :<ul id="fechafinal" class="list-group-item-success"></ul>
                            <span id="fechaf"><input type="date" id="txtfechafinal" name="txtfechafinal" class="form-control input-sm"></span></br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-primary" id="btnActualizar" value="Actualizar">
                </div>
            </form>
        </div>
    </div>
</div>