<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <span <?= empty($defensa[0]['nombreDef']) ? "hidden" : ""; ?>>
                    <h3>Defensas <small> Lista de Defensas <strong><?= $defensa[0]['nombreDef'] == '1' ? 'Pimera Defensa' : 'Segunda Defensa'; ?></strong></small> </h3>
                </span>
                <hr>
                <div class="row">
                    <div class="col-md-5 col-md-offset-6">
                        <form action="http://localhost:8080/diplomado/index.php/defensa/lista_defensas" method="post">
                            <div class="">
                                <div class="input-group">
                                    <input type="text" id="" name="buscaciD" class="form-control" placeholder="Buscar Defensa por CI de Participante " value="<?= set_value('txtBuscar'); ?>">
                                    <span class="input-group-btn">
                                        <input class="btn btn-default active" type="submit" value="Buscar">
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <hr>

                <div class="col-md-12" id="listaDefensa">
                    <div class="table-responsive ">
                        <table id="defensas" class="table  table-hover display nowrap" cellspacing="0" width="100%" style="table-layout:; width:1150px">
                            <thead class="">
                                <th class="active">No.</th>
                                <th class="active" style="display:none">fecha Defensa</th>
                                <th class="active">fecha Defensa</th>
                                <th class="active">Tipo Defensa</th>
                                <th class="active">Ci</th>
                                <th class="active">Participante</th>
                                <th class="active">Titulo Monografia</th>
                                <th class="active">Detalle</th>
                            </thead>
                            <tbody>
                                <?php $i = 0;  ?>
                                <?php foreach ($defensa as $fila) : ?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="display:none"><?= $fila['idDefensa']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['fechaDef']; ?></td>
                                        <td style="width:150px; word-break:break-word"><?= $fila['nombreDef'] == '1' ? 'Pimera Defensa' : 'Segunda Defensa'; ?></td>
                                        <td style="width:150px; word-break:break-word"><?= $fila['ciD']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['nombreD'] . " " . $fila['apellidoPaternoD'] . " " . $fila['apellidoMaternoD']; ?></td>
                                        <td style="width:300px; word-break:break-word"><?= $fila['tituloMonografia']; ?></td>
                                        <td style="width:100px; word-break:break-word">
                                            <d class="btn btn-success btn-group btn-sm" data-toggle="modal" data-target="#detalleDef" data-backdrop="static" data-keyboard="false">
                                                <span class="glyphicon glyphicon-list-alt"></span>
                                            </d>
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
<!-- MODAL DETALLE DE DEFENSA PARA IMPRIMIR -->
<div class="modal fade bs-detalleDef-modal-lg" id="detalleDef" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Defensa<small> Informacion de Defensa</small></h4>
            </div>
            <div class="modal-body" id="bodydetalleDef">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <center>
                                <h4 class=""><strong>Diplomado en Docencia para Educación Superior</strong></h4>
                                <h4 class="">Modalidad Virtual <?= $nombre ?></h4>
                                <h4 class="">Facultad Pedagogía U.M.R.P.S.F.X.CH.</h4>
                                <h4 class="">Información de Defensa</h4>
                            </center>
                        </div></br>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 form-inline">
                                <div class="row">
                                    <div class="col-md-5 ">
                                        <strong>No. Inscripción :</strong> <span name="detInscrDef" id="detInscrDef"></span>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <strong>CI :</strong> <span name="detciDef" id="detciDef"></span>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-10 ">
                                        <strong>Nombre Participante: </strong> <span name="detnombreDef" id="detnombreDef"></span>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-10">
                                        <strong>Titulo Proyecto: </strong>
                                        <p name="detTituloMonoDef" id="detTituloMonoDef"></p>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-5 ">
                                        <strong>Tipo de Defensa :</strong> <span name="dettipoDef" id="dettipoDef"></span><br>
                                    </div>
                                    <div class="col-md-6 col-md-offset-1">
                                        <strong>Fecha de Defensa :</strong> <span name="detfechaDef" id="detfechaDef"></span><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 col-md-offset-">
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <strong>Tipo de Tribunal</strong><br>
                                        <span name="dettipoTribp" id="dettipoTribp">Presidente</span>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>CI Tribunal </strong> <br>
                                        <span name="detciTribp" id="detciTribp"></span>
                                    </div>
                                    <div class="col-md-5">
                                        <strong>Nombre Tribunal </strong><br>
                                        <span name="detnombreTribp" id="detnombreTribp"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <strong>Tipo de Tribunal</strong><br>
                                        <span name="dettipoTribs" id="dettipoTribs">Secretario</span>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>CI Tribunal </strong> <br>
                                        <span name="detciTribs" id="detciTribs"></span>
                                    </div>
                                    <div class="col-md-5">
                                        <strong>Nombre Tribunal </strong><br>
                                        <span name="detnombreTribs" id="detnombreTribs"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <label for="">Nota Defensa: </label><span name="detnotaDef" id="detnotaDef"></span>
                            </div>
                            <div class="col-md-5 col-md-offset-">
                                <label for="">Resultado : </label><span name="detaproboDef" id="detaproboDef"></span>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <label for="">Obesrvaiones de Defensa : </label><span name="detobservDef" id="detobservDef"></span>
                            </div>
                        </div><br>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-5">

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary " id="printDetalleDef"><span class="glyphicon glyphicon-print"></span> Imprimir</button>
            </div>
        </div>
    </div>
</div>