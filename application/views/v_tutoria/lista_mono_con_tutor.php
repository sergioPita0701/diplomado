<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="page-header">
                    <h3>Tutoría <small>Lista de Tutorias</small></h3>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-6">
                        <form action="http://10.4.25.3:8080/diplomado/index.php/tutoria/lista_tutoria" method="post">
                            <div class="">
                                <div class="input-group">
                                    <input type="text" id="" name="txtBuscarTutor" class="form-control input-sm" placeholder="Buscar Tutor por CI de Tutor.." value="<?= set_value('txtBuscarTutor'); ?>">
                                    <span class="input-group-btn">
                                        <input class="btn btn-default btn-sm active" type="submit" value="Buscar">
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div></br>
                <div class="col-md-12" id="listaTutorias">
                    <div class="table-responsive ">
                        <table class="table  table-hover " style="table-layout:; width:1050px">
                            <thead style="display: block;">
                                <th style="width:50px;word-break:break-word " class="active"><small>No.</small></th>
                                <th style="display:none">.</th>
                                <th style="width:200px;word-break:break-word " class="active">Tutor</th>
                                <th style="width:100px;word-break:break-word " class="active">CI Tutor</th>
                                <th style="width:200px;word-break:break-word " class="active">Participante</th>
                                <th style="width:100px;word-break:break-word " class="active">Ci Part.</th>
                                <th style="width:250px;word-break:break-word " class="active">Titulo Monografia</th>
                                <th style="width:150px;word-break:break-word " class="active">Operaciones</th>
                            </thead>
                            <tbody style="display: block; height: 380px; overflow-y: auto; overflow-x: hidden; ">
                                <?php $i = 0;  ?>
                                <?php foreach ($tutomono as $fila) : ?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><small><?= $i = $i + 1;  ?></small></strong></td>
                                        <td style="display:none"><?= $fila['idRealizaMono']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['nombreA']; ?></td>
                                        <td style="width:100px; word-break:break-word"><?= $fila['ciA']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['nombreD'] . " " . $fila['apellidoPaternoD'] . " " . $fila['apellidoMaternoD']; ?></td>
                                        <td style="width:100px; word-break:break-word"><?= $fila['ciD']; ?></td>
                                        <td style="width:300px; word-break:break-word"><?= $fila['tituloMonografia']; ?></td>
                                        <td style="width:150px; word-break:break-word">
                                            <b class="btn btn-info btn-group btn-sm" data-toggle="modal" data-target="#modalMostrarTutoria" data-backdrop="static" data-keyboard="false">
                                                <span class="glyphicon glyphicon-list-alt"></span>
                                            </b>
                                            <c class="btn btn-warning btn-group btn-sm" data-toggle="modal" data-target="#modalEditTutoria" data-backdrop="static" data-keyboard="false">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </c>
                                            <a href="<?= base_url('index.php/tutoria/eliminarTutoriaMono/?mono=' . $fila['idRealizaMono'] . '&& inscripcion=' . $fila['idInscripcion']); ?>" class="btn btn-danger btn-group btn-sm" onclick="return confirm('Desea Realmente Eliminar la Tutoria de esta Monografia?');">
                                                <span class="glyphicon glyphicon-remove"></span> </a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mostrar Tutoria -->
<div class="modal fade bs-modalMostrarTutoria-modal-lg" id="modalMostrarTutoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-primary" id="myModalLabel">Tutoria <small> Informacion de Tutoria</small></h4>
            </div>
            <div class="modal-body" id="bodyDetaTutoria">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h4>
                            <center><strong><em>Monografia</em></strong></center>
                        </h4>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3 form-inline">
                                <div class="form-group">
                                    Nombre : <p class="text-info" type="text" name="diplomanteTuto" id="diplomanteTuto"></p>
                                    Titulo : <p class="text-success" type="text" name="monografiaTuto" id="monografiaTuto"></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="row">
                            <center><strong><em>Tutoria</em></strong></center>
                        </h4>
                        <div class="row text-info">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="hidden" name="academicov" id="academicov">
                                <strong>CI Tutor: </strong><span name="ciatuto" id="ciatuto"></span></br></br>
                                <strong>Nombre Tutor: </strong><span name="nombredTuto" id="nombredTuto"></span>
                            </div>
                        </div></br>
                        <div class="row text-success">
                            <div class="col-md-4 col-md-offset-2">
                                <strong>Fecha Inicio: </strong><span name="fechaiTuto" id="fechaiTuto"></span></br></br>
                                <strong>Carta: </strong><span name="cartaTuto" id="cartaTuto"></span></br></br>
                                <strong>Cancelado: </strong><span name="cancelacionTuto" id="cancelacionTuto"></span></br></br>
                            </div>
                            <div class="col-md-6">
                                <strong>Fecha Final: </strong><span name="fechafTuto" id="fechafTuto"></span></br></br>
                                <strong>Fecha Emision Carta: </strong><span name="fEmiCartaTuto" id="fEmiCartaTuto"></span></br></br>
                                <strong>Resultado: </strong><span class="text-danger" name="resultadoTuto" id="resultadoTuto"></span></br></br>
                            </div>
                        </div>
                        <div class="row text-success">
                            <div class="col-md-8 col-md-offset-2">
                                <strong>Observaciones: </strong><span name="observacionTuto" id="observacionTuto"></span>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-2">
                            </div>
                            <div class="col-md-3 col-md-offset-2">

                            </div>
                        </div><br>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="imprimirDetTutoria"><span class="glyphicon glyphicon-print"></span> Imprimir</button>
            </div>
        </div>
    </div>
</div>
<!-- EDITAR TUTORIA -->
<div class="modal fade" id="modalEditTutoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-primary" id="myModalLabel">Tutoria<small> Editar Tutoria</small></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="hidden" name="editrealizamono" id="editrealizamono">
                                <label><small>CI Tutor: </small></label>
                                <p class="text-danger" name="editciatuto" id="editciatuto"></p></br>
                            </div>
                            <div class="col-md-7">
                                <input type="hidden" name="editacademicov" id="editacademicov">
                                <label><small>Nombre Tutor: </small></label>
                                <p class="text-danger" name="editnombredTuto" id="editnombredTuto"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="checkbox" id="checkCambTutor" value="">Cambiar Tutor
                            </div>
                            <div class="col-md-4" id="otroAcademicoAV">
                                <select type="text" class="form-control input-sm" name="academicoAV" id="academicoAV" disabled>
                                </select>
                            </div>
                            <div class="col-md-4 ">
                                <button type="button" class="btn btn-success btn-sm" id="btncambTut" onclick="cambiatidTutor();" disabled>Cambiar Tutor</button>
                            </div>
                        </div></br>
                        <div class="row">
                            <div class="col-md-12" id="msjEditTuto"></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fecha Inicio: </label><input type="date" class="form-control input-sm" name="editfechaiTuto" id="editfechaiTuto"></br>
                                <label>Carta: </label><input type="text" class="form-control input-sm" name="editcartaTuto" id="editcartaTuto"></br>
                                <label>Cancelado: </label>
                                <select type="text" class="form-control input-sm" name="editcancelacionTuto" id="editcancelacionTuto">
                                    <option value="1">Se Canceló</option>
                                    <option value="0">No Cancelado</option>
                                </select></br>
                            </div>
                            <div class="col-md-6">
                                <label>Fecha Final: </label><input type="date" class="form-control input-sm" name="editfechafTuto" id="editfechafTuto"></br>
                                <label>Fecha Emision Carta: </label><input type="datetime-local" autocomplete="on" class="form-control input-sm" name="editfEmiCartaTuto" id="editfEmiCartaTuto"></br>
                                <label>Resultado: </label>
                                <select type="text" class="form-control input-sm" name="editresultadoTuto" id="editresultadoTuto">
                                    <option value="1">Aprobado</option>
                                    <option value="0">Reprobado</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Observaciones: </label><textarea class="form-control input-sm" name="editobservacionTuto" id="editobservacionTuto"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-2">
                            </div>
                            <div class="col-md-3 col-md-offset-2">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default active" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary active" onclick="cambiarTtutoria();"><span class="glyphicon glyphicon-config"></span> Editar Tutoria</button>

            </div>
        </div>
    </div>
</div>