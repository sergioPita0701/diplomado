<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="header text-primary">
                    <h3>Lista de Defensas - <small>PRIMERA DEFENSA</small></h3>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5 col-md-offset-6">
                        <form action="http://10.4.25.3:8080/diplomado/index.php/defensa/lista_defensas" method="post">
                            <div class="">
                                <div class="input-group">
                                    <input type="text" id="" name="buscaciD" class="form-control input-sm" placeholder="Buscar Defensa por CI de Participante " value="<?= set_value('txtBuscar'); ?>">
                                    <span class="input-group-btn">
                                        <input class="btn btn-default btn-sm active" type="submit" value="Buscar">
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <br>

                <div class="col-md-12" id="listaDefensa">
                    <div class="table-responsive ">
                        <table id="defensas" class="table  table-hover display nowrap" cellspacing="0" width="100%" style="table-layout:; width:1100px">
                            <thead style="display: block;" style="table-layout:; width:1030px">
                                <th style="width:50px;word-break:break-word" class="success">No.</th>
                                <th class="success" style="display:none">fecha Defensa</th>
                                <th style="width:130px;word-break:break-word" class="success">fecha Defensa</th>
                                <th style="width:150px;word-break:break-word" class="success">Tipo Defensa</th>
                                <th style="width:100px;word-break:break-word" class="success">Ci</th>
                                <th style="width:200px;word-break:break-word" class="success">Participante</th>
                                <th style="width:220px;word-break:break-word" class="success">Titulo Monografia</th>
                                <th style="width:200px;word-break:break-word" class="success">Operaciones</th>
                            </thead>
                            <tbody style="display: block; height: 340px; overflow-y: auto; overflow-x: hidden; ">
                                <?php $i = 0;  ?>
                                <?php foreach ($defensa as $fila) : ?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><small><?= $i = $i + 1;  ?></small></strong></td>
                                        <td style="display:none"><?= $fila['idDefensa']; ?></td>
                                        <td style="width:130px; word-break:break-word"><small><?= $fila['fechaDef']; ?></small></td>
                                        <td style="width:150px; word-break:break-word"><small><?= $fila['nombreDef'] == '1' ? 'Pimera Defensa' : 'Segunda Defensa'; ?></small></td>
                                        <td style="width:100px; word-break:break-word"><small><?= $fila['ciD']; ?></small></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['nombreD'] . " " . $fila['apellidoPaternoD'] . " " . $fila['apellidoMaternoD']; ?></td>
                                        <td style="width:220px; word-break:break-word"><small><?= $fila['tituloMonografia']; ?></small></td>
                                        <td style="width:200px; word-break:break-word">
                                            <d class="btn btn-success btn-group btn-sm" data-toggle="modal" data-target="#detalleDef" data-keyboard="false">
                                                <span class="glyphicon glyphicon-list-alt"></span>
                                            </d>
                                            <b class="btn btn-info btn-group btn-sm" data-toggle="modal" data-target="#modalTribunal" data-backdrop="static" data-keyboard="false">
                                                <span class="glyphicon glyphicon-user"></span>
                                            </b>
                                            <c class="btn btn-warning btn-group btn-sm" data-toggle="modal" data-target="#resuldatoDefensa" data-backdrop="static" data-keyboard="false">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </c>
                                            <!-- <button type="button" class="btn btn-danger btn-group btn-sm" data-toggle="modal" data-target=".bs-eliminarDefensa-modal-sm">
                                        <span class="glyphicon glyphicon-remove"></span></button> -->
                                            <a href="<?= base_url('index.php/defensa/eliminarDefensa/?tipoD=' . $fila['nombreDef'] . '&& defensa=' . $fila['idDefensa']); ?>" class="btn btn-danger btn-group btn-sm" onclick="return confirm('Desea Realmente Eliminar la Defensa, se eliminaran sus Tribunales?');">
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
<!-- MODAL DETALLE DE DEFENSA PARA IMPRIMIR -->
<div class="modal fade bs-detalleDef-modal-lg" id="detalleDef" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-primary" id="myModalLabel">DEFENSA<small> - Informacion de Defensa</small></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel panel-body" id="bodydetalleDef">
                                <div class="row">
                                    <center>
                                        <h4 class="text-primary">Diplomado de Docencia para Educación Superior <small>Modalidad Virtual <?= $nombre ?></small></h4>
                                        <h5 class="text-success">Facultad de Humanidades y Ciencias de la Educacion U.M.R.P.S.F.X.CH.</h5>
                                    </center>
                                </div></br>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1 form-inline">
                                        <div class="row">
                                            <div class="col-md-5 ">
                                                <em>No. Inscripción :</em> <strong><span class="text-danger" name="detInscrDef" id="detInscrDef"></span></strong>
                                            </div>
                                            <div class="col-md-5 col-md-offset-1">
                                                <em>CI :</em> <strong><span class="text-danger" name="detciDef" id="detciDef"></span></strong>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-10 ">
                                                <em>Nombre Participante: </em> <strong><span class="" name="detnombreDef" id="detnombreDef"></span></strong>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <em>Titulo Proyecto:</em>
                                                <center>
                                                    <p class="text-info" name="detTituloMonoDef" id="detTituloMonoDef"></p>
                                                </center>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-5 ">
                                                <em>Tipo de Defensa :</em> <strong><span class="label label-success" name="dettipoDef" id="dettipoDef"></span></strong><br>
                                            </div>
                                            <div class="col-md-6 col-md-offset-1">
                                                <em>Fecha de Defensa :</em> <strong><span class="label label-success" name="detfechaDef" id="detfechaDef"></span></strong><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <em class="label label-default">Tipo de Tribunal</em><br>
                                                <span class="text-info" name="dettipoTribp" id="dettipoTribp">Presidente</span>
                                            </div>
                                            <div class="col-md-3">
                                                <em class="label label-default">CI Tribunal </em> <br>
                                                <span class="text-info" name="detciTribp" id="detciTribp"></span>
                                            </div>
                                            <div class="col-md-5">
                                                <em class="label label-default">Nombre Tribunal </em><br>
                                                <span class="text-info" name="detnombreTribp" id="detnombreTribp"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <!-- <em>Tipo de Tribunal</em><br> -->
                                                <span class="text-success" name="dettipoTribs" id="dettipoTribs">Secretario</span>
                                            </div>
                                            <div class="col-md-3">
                                                <!-- <em>CI Tribunal </em> <br> -->
                                                <span class="text-success" name="detciTribs" id="detciTribs"></span>
                                            </div>
                                            <div class="col-md-5">
                                                <!-- <em>Nombre Tribunal </em><br> -->
                                                <span class="text-success" name="detnombreTribs" id="detnombreTribs"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <center class="text-muted"><strong>RESULTADOS</strong></center>
                                    <div class="col-md-5 col-md-offset-1">
                                        <em>Nota Defensa: </em><strong><span class="text-primary" name="detnotaDef" id="detnotaDef"></span></strong>
                                    </div>
                                    <div class="col-md-5 col-md-offset-">
                                        <em>Resultado : </em><strong><span class="text-danger" name="detaproboDef" id="detaproboDef"></span></strong>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <em>Obesrvaiones de Defensa : </em><strong><span class="text-default" name="detobservDef" id="detobservDef"></span></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-7">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary " id="printDetalleDef"><span class="glyphicon glyphicon-print"></span> Imprimir</button>
                    </div>
                </div>
            </div>

            <!-- <div class="modal-footer">
                
            </div>    -->
        </div>
    </div>
</div>
<!-- Modal REGISTRO TRIBUNALES -->
<div class="modal fade bs-modalTribunal-modal-lg" id="modalTribunal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-primary" id="myModalLabel">
                    <center>DEFENSA <small> - Edicion de Tribunales de Defensa</small></center>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-2 form-inline">
                                <div class="form-group">
                                    <em>Nombre :</em>
                                    <p class="text-info" type="text" name="nombreD" id="nombreD" value=""></p>
                                    <em>Titulo :</em>
                                    <p class="text-info" type="text" name="tituloMono" id="tituloMono" value=""></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" id="mensaje">
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <input type="hidden" name="tribunaP" id="tribunaP">
                                <li name="tipoTribP" id="tipoTribP" class="list-group-item disabled"></li>
                                <li name="ciPresidente" id="ciPresidente" class="list-group-item"></li>
                                <li name="cartaP" id="cartaP" class="list-group-item"></li>
                                <li name="nombrePresidente" id="nombrePresidente" class="list-group-item"></li>
                            </div>
                            <div class="col-md-5 col-md-offset-">
                                <input type="hidden" name="tribunaS" id="tribunaS">
                                <li name="tipoTribS" id="tipoTribS" class="list-group-item disabled"></li>
                                <li name="ciSecretario" id="ciSecretario" class="list-group-item"></li>
                                <li name="cartaS" id="cartaS" class="list-group-item"></li>
                                <li name="nombreSecretario" id="nombreSecretario" class="list-group-item"></li>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-2">
                                <button type="button" class="btn btn-info btn-sm" id="btnEditarP" data-toggle="modal" data-target="#editarTribunal" data-backdrop="static" data-keyboard="false" onclick="editarPresi();">Editar Trib. Presidente</button>
                            </div>
                            <div class="col-md-3 col-md-offset-2">
                                <button type="button" class="btn btn-info btn-sm" id="btnEditarS" data-toggle="modal" data-target="#editarTribunal" data-backdrop="static" data-keyboard="false" onclick="editarSecre();">Editar Trib. Secretario</button>
                            </div>
                        </div><br>


                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- EDITAR TRIBUNAL -->
<div class="modal fade" id="editarTribunal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-primary" id="myModalLabel">Editar Tribunal</h4>
            </div>
            <!-- <form class="form" role="form" action="" id="formProfesion" method="post"> -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="panel "> -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-9 col-md-offset-1">
                                    <label for="">Nombre:</label>
                                    <input type="hidden" name="tribunal" id="tribunal">
                                    <p type="text" name="diplomante" id="diplomante"></p>
                                    </br>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-md-offset-1">
                                    <label for="">Seleccionar Tribunal</label>
                                    <select class="form-control input-sm" name="academicosSele" id="academicosSele">
                                        <option value="">-Seleccione nuevo Tribunal-</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5 col-md-offset-">
                                    <label for="">Se entredo carta de Inv.?</label>
                                    <select class="form-control input-sm" name="editCarta" id="editCarta">
                                        <option value="">--Seleccione--</option>
                                        <option value="1">SI</option>
                                        <option value="0">NO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mnsjeditribunal"></div>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                <button onclick="editarTribunal();" class="btn btn-info btn-md active" type="" value="">Editar Tribunal</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<!-- Modal COLOCAR NOTA Y CAMBIARFECHA -->
<div class="modal fade bs-resuldatoDefensa-modal-lg" id="resuldatoDefensa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-primary" id="myModalLabel">Defensa - <small> Asignar Resulatdo de Tribunal</small></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-4 form-inline">
                                <div class="form-group">
                                    <input type="hidden" name="defensa" id="defensa">
                                    <center><strong>
                                            <p class="modal-title text-success" name="nombreDiplo" id="nombreDiplo" value=""></p>
                                        </strong>
                                        <center>
                                            <center><strong>
                                                    <p class="modal-title text-info" name="titulo" id="titulo" value=""></p>
                                                </strong>
                                                <center>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-9 col-md-offset-3 ">
                                <div class="row">
                                    <div class="col-md-4 form-inline">
                                        <li name="fechaDef" id="fechaDef" class="list-group-item list-group-item-info input-sm "></li>
                                    </div>
                                    <div class="col-md-4 form-inline checkbox">
                                        <input type="checkbox" id="checkapareceFecha">Cambiar Fecha
                                    </div>
                                </div>
                                <div class="form-inline cambiar-fecha" hidden>
                                    <input type="datetime-local" name="fechaEditDef" id="fechaEditDef" class="form-control input-sm"></input>
                                    <button type="button" class="btn btn-info btn-xs" id="" onclick="cambiarFechaDef();">Cambiar Fecha</button>
                                </div>
                            </div>
                        </div>
                        <div class="row " id="mnsjeditfecha">
                        </div>
                        <hr>
                        <div class="row">
                            <input class="text-warning" type="checkbox" id="checkHabilitarNota"> Asignar Nota
                        </div></br>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <label for=""><small> Nota Defensa</small></label>
                                <input type="number" min="0" class="form-control input-sm" name="notaDef" id="notaDef" readonly>
                            </div>
                            <div class="col-md-5 col-md-offset-">
                                <label for=""><small> Respuesta Tribunal</small></label>
                                <select name="AprobacionDef" id="AprobacionDef" class="form-control input-sm" disabled>
                                    <option value="">-Seleccionar-</option>
                                    <option value="1">-Aprobado-</option>
                                    <option value="2">-Reprobado-</option>
                                    <option value="3">-Aun no Asignado-</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <label for=""><small> Obesrvaiones de Defensa</small></label>
                                <textarea wrap="hard" rows="3" cols="" class="form-control input-sm" name="observDef" id="observDef" readonly></textarea>
                            </div>
                        </div><br>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default active btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success btn-sm" onclick="asignarNotaDef();"><span class="glyphicon glyphicon-floppy-saved"></span> Asignar Resultado de Defensa</button>
            </div>
        </div>
    </div>
</div>
<!-- ELIMINAR FEFENSA -->
<!-- <div class="modal fade bs-eliminarDefensa-modal-sm" id="eliminarDefensa" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <form  action="http://10.4.25.3:8080/diplomado/index.php/usuario/eliminarUsuario" method="POST" class="form" role="form">
            
            <div class="modal-body">
                <p><small><strong>Desea Eliminar Realmente la Defensa, Se eliminaran todas sus relaciones?</strong></small></p>
                <input type="hidden" name="cielim" class="form-control input-sm" id="cielim"  >
                <input type="text" name="cieliminar" class="form-control input-sm" id="cieliminar"  >
                <div id="mnsjEliminar"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary btn-sm" onclick="eliminarUsuario();">Eliminar Usuario</button>
            </div>
        </form>  
    </div>
  </div>
</div> -->