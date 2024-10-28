<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2 class="page-header text-primary">
                    <center>Paralelos</center>
                </h2>
                <div class="col-md-8 col-md-offset-1">
                    <strong>
                        <h4 class="text text-success"><em>Nuevo Paralelo</em></h4>
                    </strong>
                </div>
                <div class="col-md-3 col-md-offset-">
                    <a href="<?= base_url(); ?>index.php/modulo">Ir a Modulo-Asignaturas</a>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form action="http://localhost:80/diplomado/index.php/paralelo/crearParalelo" method="POST" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="panel panel-default">
                                    <div class="panel-body ">
                                        <div class="row ">
                                            <div class="col-md-10 col-md-offset-1">
                                                <label for=""><small>Seleccione Modulo</small></label>
                                                <select name="selectModulo" id="" class="form-control input-sm">
                                                    <?php foreach ($modulo as $fila) : ?>
                                                        <option value="<?= $fila['numeroM'] ?>">( <?= convertirANumerosRomanos($fila['nivelM']) . " ) " . $fila['nombreM']; ?><?= $fila['asignaturaNombreM']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <?= form_error('selectModulo', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                            </div>

                                        </div>
                                        <div class="row ">
                                            <div class="col-md-6 col-md-offset-1">
                                                <label for=""><small>Nombre de Paralelo</small></label>
                                                <input type="text" name="txtNombreParalelo" class="form-control input-sm" placeholder="Ej. A,B,C.. ó 1,2,3..etc..." value="<?= set_value('txtNombreParalelo'); ?>">
                                                <?= form_error('txtNombreParalelo', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <label for=""><small>Cant. Dip.</small></label>
                                                <input type="number" name="txtCantidad" class="form-control input-sm" value="<?= set_value('txtCantidad'); ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="row">
                                                    <div class="col-md-6 col-md-offset-6">
                                                        <br><input class="btn btn-primary btn-sm active" type="submit" value="Crear Paralelo" onClick="">
                                                        <button class="btn btn-default btn-sm " type="reset">Borrar Todo</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-7" id="msjEditar">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-md-offset-">
                        <!-- <div class="panel panel-default">
                            <div class="panel-body "> -->
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1" id="listaparalelo">
                                <strong>
                                    <h4 class="page-header text-success"><em>Lista de Paralelos</em></h4>
                                </strong>
                                <div class="table-responsive ">
                                    <table class="table table-hover " style="table-layout:; width:880px">
                                        <thead style="display: block;">
                                            <th style="width:50px;word-break:break-word " class="info"><small>#</small></th>
                                            <th style="width:100px;word-break:break-word " class="info"><small>No.Modulo</small></th>
                                            <th style="width:150px;word-break:break-word " class="info"><small>Modulo</small></th>
                                            <th class="info hidden">idmod</th>
                                            <th style="width:130px;word-break:break-word " class="info"><small>Paralelo</small></th>
                                            <th style="width:70px;word-break:break-word " class="info"><small>Cant.</small></th>
                                            <th style="width:200px;word-break:break-word " class="info"><small>Docente</small></th>
                                            <th style="width:180px;word-break:break-word " class="info"><small>Operaciones</small></th>
                                        </thead>
                                        <tbody style="display: block; height: 200px; overflow-y: auto; overflow-x: hidden; ">
                                            <?php $i = 0; ?>
                                            <?php foreach ($paralelo as $fila) : ?>
                                                <tr>
                                                    <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                                    <td style="width:100px; word-break:break-word"><?= $fila['numeroM']; ?></td>
                                                    <td style="width:150px; word-break:break-word"><?= $fila['nombreM']; ?></td>
                                                    <td class="active hidden"><?= $fila['idParalelo']; ?></td>
                                                    <td style="width:130px; word-break:break-word"><?= $fila['nombre_paralelo']; ?></td>
                                                    <td style="width:70px; word-break:break-word"><?= $fila['cantidad']; ?></td>
                                                    <td style="width:200px; word-break:break-word"><?= $fila['idDocencia'] == '' ? 'sin Docente' : $fila['idDocencia'];  ?></td>
                                                    <td style="width:180px; word-break:break-word">
                                                        <a href="<?= base_url(); ?>index.php/docencia" type="" class="btn btn-info btn-group btn-xs">
                                                            <span class="glyphicon glyphicon-check"></span> Docencia</a>
                                                        <!-- Button modal -->
                                                        <b href="" type="" class="btn btn-success btn-group btn-xs">
                                                            <span class="glyphicon glyphicon-cog"></span></b>

                                                        <a href="<?= base_url(); ?>index.php/paralelo/eliminarParalelo?modulo=<?= $fila['numeroM']; ?> && paralelo=<?= $fila['nombre_paralelo']; ?>" class="btn btn-danger btn-group btn-xs" onclick="return confirm('Desea Realmente Eliminar el Paralelo?');">
                                                            <span class="glyphicon glyphicon-remove"></span> </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar pARALELO-->
<div class="modal fade" id="modalEditarParalelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ver Detalles del Paralelo</h4>
            </div>
            <!-- <form action="http://localhost:80/diplomado/index.php/paralelo/editarParalelo" method="POST" role="form"> -->
            <div class="modal-body list-group">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <input type="hidden" id="txtnumeromod" name="txtnumeromod" class="form-control input-sm">
                    </div>
                    <div class="col-md-4">
                        <input type="hidden" id="txtidparalelo" name="txtidparalelo" class="form-control input-sm">
                    </div>
                </div></br>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <input type="text" id="txtnombremod" name="txtnombremod" class="form-control input-sm" disabled></br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label for="">Paralelo a editar</label>
                        <input type="text" id="txtparalelosele" name="txtparalelosele" class="form-control input-sm"></br>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <label for="">Cantidad de Participantes Permitidos</label>
                        <input type="number" id="txtcantidadsele" name="txtcantidadsele" class="form-control input-sm"></br>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-8 col-md-offset-2" id="mnsjErrorEdicion"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <!-- <input type="submit" class="btn btn-primary" id="" value="Actualizar" > -->
                <button type="button" class="btn btn-primary" onclick="editaParalelo();">Actualizar</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>