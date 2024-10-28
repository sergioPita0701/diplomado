<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="page-header">
                    <h3>Tutoría <small>Lista de Tutorias</small></h3>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-6">
                        <form action="http://localhost:80/diplomado/index.php/tutoria/lista_tutoria" method="post">
                            <div class="">
                                <div class="input-group">
                                    <input type="text" id="" name="txtBuscarTutor" class="form-control" placeholder="Buscar Tutor por CI de Tutor.." value="<?= set_value('txtBuscarTutor'); ?>">
                                    <span class="input-group-btn">
                                        <input class="btn btn-default active" type="submit" value="Buscar">
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div></br>
                <div class="col-md-12" id="listaTutorias">
                    <div class="table-responsive ">
                        <table class="table  table-hover " style="table-layout:; width:1150px">
                            <thead class="">
                                <th class="active">No.</th>
                                <th style="display:none">.</th>
                                <th class="active">Tutor</th>
                                <th class="active">CI Tutor</th>
                                <th class="active">Participante</th>
                                <th class="active">Ci Participante</th>
                                <th class="active">Titulo Monografia</th>
                                <th class="active">Operaciones</th>
                            </thead>
                            <tbody>
                                <?php $i = 0;  ?>
                                <?php foreach ($tutomono as $fila) : ?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="display:none"><?= $fila['idRealizaMono']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['nombreA']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['ciA']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['nombreD'] . " " . $fila['apellidoPaternoD'] . " " . $fila['apellidoMaternoD']; ?></td>
                                        <td style="width:100px; word-break:break-word"><?= $fila['ciD']; ?></td>
                                        <td style="width:300px; word-break:break-word"><?= $fila['tituloMonografia']; ?></td>
                                        <td style="width:100px; word-break:break-word">
                                            <b class="btn btn-info btn-group btn-sm" data-toggle="modal" data-target="#modalMostrarTutoria" data-backdrop="static" data-keyboard="false">
                                                <span class="glyphicon glyphicon-list-alt"></span>
                                            </b>
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
                <h4 class="modal-title" id="myModalLabel">Tutoria <small> Informacion de Tutoria</small></h4>
            </div>
            <div class="modal-body" id="bodyDetaTutoria">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 form-inline">
                                <center><strong>Monografia</strong></center>
                                <div class="form-group">
                                    <p type="text" name="diplomanteTuto" id="diplomanteTuto"></p>
                                    <p type="text" name="monografiaTuto" id="monografiaTuto"></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-md-8 col-md-offset-2">
                                <center><strong>Tutoria</strong></center>
                                <input type="hidden" name="academicov" id="academicov">
                                <strong>CI Tutor: </strong><span name="ciatuto" id="ciatuto"></span></br>
                                <strong>Nombre Tutor: </strong><span name="nombredTuto" id="nombredTuto"></span>
                            </div>
                        </div></br>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-2">
                                <strong>Fecha Inicio: </strong><span name="fechaiTuto" id="fechaiTuto"></span></br></br>
                                <strong>Carta: </strong><span name="cartaTuto" id="cartaTuto"></span></br></br>
                                <strong>Cancelado: </strong><span name="cancelacionTuto" id="cancelacionTuto"></span></br></br>
                            </div>
                            <div class="col-md-6">
                                <strong>Fecha Final: </strong><span name="fechafTuto" id="fechafTuto"></span></br></br>
                                <strong>Fecha Emision Carta: </strong><span name="fEmiCartaTuto" id="fEmiCartaTuto"></span></br></br>
                                <strong>Resultado: </strong><span name="resultadoTuto" id="resultadoTuto"></span></br></br>
                            </div>
                        </div>
                        <div class="row">
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