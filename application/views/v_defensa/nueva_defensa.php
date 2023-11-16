<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <form class="form-horizontal" id="formdefensa" action="http://localhost:8080/diplomado/index.php/defensa/crear_defensa" method="post"><!-- -->
            <div class="row">
                <div class="col-md-8 col-md-offset-">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="header text-primary text-uppercase">
                                        <h4>
                                            <center>REGISTRAR DEFENSA de monografia</center>
                                        </h4>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-10 col-md-offset-1 ">
                                                <input type="hidden" name="realizamono" id="realizamono" class="form-control input-sm" value="<?= set_value('realizamono'); ?>" readonly>
                                                <p class="text-muted"><em>Titulo de Monografía :</em></p>
                                                <center><small>
                                                        <p class="text-uppercase text-danger" name="titulomono" id="titulomono"></p>
                                                    </small></center>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-md-offset-1 ">
                                            <p class="text-muted"><em>Diplomante : </em></p>
                                        </div>
                                        <div class="form-group ">
                                            <div class="col-md-4 col-md-offset-2 ">
                                                <center>
                                                    <p><small>CI: </small></p>
                                                </center>
                                                <input type="text" name="ciDiplo" id="ciDiplo" class="form-control input-sm" size="10" value="<?= set_value('ciDiplo'); ?>" readonly>
                                                <?= form_error('ciDiplo', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <center>
                                                    <p><small>Nombre: </small></p>
                                                </center>
                                                <input type="text" name="nombreParticipante" id="nombreParticipante" class="form-control input-sm" size="10" value="<?= set_value('nombreParticipante'); ?>" readonly>
                                                <?= form_error('nombreParticipante', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1 ">
                                            <p class="text-muted"><em>Programacion de Defensa :</em></p>
                                        </div></br>
                                        <div class="col-md-10 col-md-offset-1 " id="mnsjprogdefens"></div>
                                        <div class="col-md-4 col-md-offset-2 " id="tipdef">
                                            <center>
                                                <p><small>Tipo de Defensa </small></p>
                                            </center>
                                            <select name="nombreDef" id="nombreDef" class="form-control input-sm" readonly>
                                                <!-- <option value="" >--Seleccione--</option>
                                            <option value="1" <?= set_select('nombreDef', '1'); ?>>Pimera Defensa</option>
                                            <option value="2" <?= set_select('nombreDef', '2'); ?>>Segunda Defensa</option> -->
                                            </select>
                                            <?= form_error('nombreDef', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                        </div>
                                        <div class="col-md-4 " id="fechdef">
                                            <center>
                                                <p><small>Fecha de Defensa </small></p>
                                            </center>
                                            <input type="datetime-local" name="fechaDef" id="fechaDef" class="form-control" size="10" value="<?= set_value('fechaDef'); ?>" disabled="disabled">
                                            <?= form_error('fechaDef', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row has-success">
                                        <!-- <h5 class="text-muted"><strong><em><center>Tribunales</center></em></strong></h5> -->
                                        <div class="col-md-10 col-md-offset-1 ">
                                            <p class="text-muted text-uppercase"><em>Tribunales :</em></p>
                                        </div>
                                        <div class="form-group ">
                                            <div class="col-md-5 col-md-offset-1 ">
                                                <input type="hidden" name="tipoTribunal[]" id="tipoTribunal[]" value="Presidente">
                                                <center>
                                                    <p class="text-primary">Presidente</p>
                                                </center>
                                                <p><em>Sugerencia :</em><span id="presialeatorio" style="background:#5499C7;"></span> </p>
                                                <div class="row" hidden>
                                                    <div class="col-md-10  ">
                                                        <select class="form-control input-sm" name="tribunal[]" id="tribunal[]">
                                                            <!-- <option>--Seleccione Tribunal Presidente--</option> -->
                                                            <option id="presialeatorioo">--Seleccione Tribunal Presidente--</option>
                                                            <?php foreach ($academicoseleccionados as $seleccionado) : ?>
                                                                <option value="<?= $seleccionado['idRegistroAV']; ?>"><?= $seleccionado['nombreA']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <!-- <?= form_error('tribunal[]', '<div class="alert alert-warning"><small>', '</small></div>'); ?>  -->
                                                    </div>
                                                </div></br>
                                                <div class="row">
                                                    <div class="col-md-8 col-md-offset-">
                                                        <p><em>Se envió Carta de Inv.?</em></p>
                                                        <div class="form-group input-sm">
                                                            <div class="col-md-10 col-md-offset-">
                                                                <select class="form-control input-sm" name="invitacioncarta[]" id="invitacioncarta[]">
                                                                    <option value="">--Seleccione--</option>
                                                                    <option value="1">SI</option>
                                                                    <option value="0">NO</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-md-offset-1">
                                                <input type="hidden" name="tipoTribunal[]" id="tipoTribunal[]" value="Secretario">
                                                <center>
                                                    <p class="text-primary">Secretario </p>
                                                </center>
                                                <p><em>Sugerencia :</em><span id="secrealeatorio" style="background:#F4D03F;"></span> </p>
                                                <div class="row" hidden>
                                                    <div class="col-md-10 ">
                                                        <select class="form-control input-sm" name="tribunal[]" id="tribunal[]">
                                                            <!-- <option>--Seleccione Tribunal Secretario--</option> -->
                                                            <option id="secrealeatorioo">--Seleccione Tribunal Secretario--</option>
                                                            <?php foreach ($academicoseleccionados as $seleccionado) : ?>
                                                                <option value="<?= $seleccionado['idRegistroAV']; ?>"><?= $seleccionado['nombreA']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <!-- <?= form_error('tribunal', '<div class="alert alert-warning"><small>', '</small></div>'); ?>  -->
                                                    </div>
                                                </div></br>
                                                <div class="row">
                                                    <div class="col-md-8 col-md-offset-">
                                                        <p><em>Se envió Carta de Inv.?</em></p>
                                                        <div class="form-group input-sm">
                                                            <div class="col-md-10 col-md-offset-">
                                                                <select class="form-control input-sm" name="invitacioncarta[]" id="invitacioncarta[]">
                                                                    <option value="">--Seleccione--</option>
                                                                    <option value="1">SI</option>
                                                                    <option value="0">NO</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-11 col-md-offset-1">
                                    </br>
                                    <center>
                                        <h5 class="text-success">SELECCIONAR PARTICIPANTE </h5>
                                    </center>
                                    <div class="">
                                        </br><button class="btn btn-default btn-sm active" type="button" value="" onClick="getselecDiplopDefensa();">Seleccionar Participante</button><!-- getseleccionarDiplo(),,se cambio por q la misma funcion llama ra tutor d nueva mono se arruina -->
                                    </div></br>
                                    <div class="input-group">
                                        <select multiple style="width:290px;" size="6" class="form-control input-sm" name="txtBuscardiplo" id="txtBuscardiplo">
                                            <?php foreach ($diplomantesconmono as $fila) : ?>
                                                <option value="<?= $fila['idRealizaMono']; ?>"><?= $fila['nombreD'] . ' ' . $fila['apellidoPaternoD'] . ' ' . $fila['apellidoMaternoD'] . '--' . $fila['tituloMonografia']; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-11 col-md-offset-1">
                                    <div class="form-group form-sm">
                                        <div class="col-md-9 col-md-offset-1">
                                            <center>
                                                <input type="submit" class="btn btn-primary btn-sm active" id='botonForm' value="Registrar Defensa"></br>
                                                </br>
                                                <input type="button" class="btn btn-success btn-sm active" value="Seleccion Automatica de Tribunales" id="aleatorio"></br>
                                                </br>
                                                <b href="" type="button" class="btn btn-info btn-group btn-xs" data-toggle="modal" data-target="#modalSelectTribunal">
                                                    <span class="glyphicon glyphicon-ok"></span> Seleccionar Tribunal </b>
                                                </br></br>
                                                <input class="btn btn-default btn-sm " type="reset" value="Borrar Texto"></br>
                                                </br>
                                                <!-- <a href="" class="" type="">Nueva Monografia</a> -->
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-11 col-md-offset-1" id="msjdefensa"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- modal para mostrar la lista de Academicos para seleccionar tribunal -->
<div class="modal fade bs-example-modal-lg" id="modalSelectTribunal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titulolabel">Seleccionar Tribunal</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <center>
                        <p>
                            <span style="background-color: #5499C7;"><canvas style="width:18px;height:12px;border:1px black solid;"></canvas></span> Presidente ...
                            <span style="background-color: #F4D03F;"><canvas style="width:18px;height:12px;border:1px black solid;"></canvas></span> Secretario
                        </p>
                    </center>
                </div>
                <div class="row">
                    <div class="col-md-3 col-md-offset-9">
                        <input class="btn btn-danger btn-xs active" type="button" onclick="borrarTribunal();" value="Borrar seleccion"></br>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group input-sm">
                        <div class="col-md-12" id="listaAcademicosmodal">
                            <div class="table-responsive " id="div1">
                                <table class="table  table-hover " style=" width:840px; ">
                                    <thead style="display: block; ">
                                        <th style="width:50px; word-break:break-word" class="active">No.</th>
                                        <th style="width:220px; word-break:break-word" class="active">Nombre Completo</th>
                                        <th style="width:100px; word-break:break-word" class="active">Ci</th>
                                        <th style="width:80px; word-break:break-word" class="active">Telefono</th>
                                        <th style="width:110px; word-break:break-word" class="active">Ciudad</th>
                                        <th style="width:150px; word-break:break-word" class="active">Profecion</th>
                                        <th style="width:130px; word-break:break-word" class="active">Opciones</th>
                                    </thead>
                                    <tbody style="display: block; height: 500px; overflow-y: auto; overflow-x: hidden; ">
                                        <?php $i = 0;  ?>
                                        <?php foreach ($academicoProf as $fila) : ?>
                                            <tr>
                                                <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                                <td style="width:220px; word-break:break-word"><?= $fila['nombreA']; ?></td>
                                                <td style="width:100px; word-break:break-word"><?= $fila['ciA']; ?></td>
                                                <td style="width:80px; word-break:break-word"><?= $fila['telefonoA']; ?></td>
                                                <td style="width:110px; word-break:break-word"><?= $fila['ciudadA']; ?></td>
                                                <td style="width:150px; word-break:break-word"><?= $fila['numFolioA']; ?></td>
                                                <td style="width:130px; word-break:break-word">
                                                    <!-- <a href="<?= base_url('index.php/academico/detalleAcademico/' . $fila['ciA']); ?>" type="button" class="btn btn-info btn-group btn-xs" onClick="">
                                                <span class="glyphicon glyphicon-cog"></span></a> -->
                                                    <!-- Button modal -->
                                                    <!-- <a href="<?= base_url('index.php/academicoseleccionado/registrarAcadSeleccionado/' . $fila['ciA']); ?>" type="button" class="btn btn-success btn-group btn-xs" onClick=" return confirm('Desea Asignar a este Academico en la version actual?')">
                                                <span class="glyphicon glyphicon-ok"></span></a> -->

                                                    <!-- Button modal -->
                                                    <c href="" type="button" class="btn btn-info btn-group btn-xs" data-toggle="modal" data-target="#modalDetalleAcademico" data-backdrop="static">
                                                        <span class="glyphicon glyphicon-align-justify"></span> <small>Detalles</small>
                                                    </c>
                                                    <b href="" type="button" class="btn btn-success btn-group btn-xs" data-toggle="modal" data-target="#modalTipoTribunal" data-backdrop="static">
                                                        <span class="glyphicon glyphicon-ok"></span> </b>

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
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>

                <!-- <button type="button" class="btn btn-default" data-dismiss="modal" >Contratar</button> -->
            </div>

        </div>
    </div>
</div>
<!-- modal detalle de academico -->
<div class="modal fade" id="modalDetalleAcademico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">Información del Académico con CI: <strong><span id="ciacadtitulo"></span></strong> </h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="" method="post">
                    <!-- <img src="..." alt="..." class="img-thumbnail"> -->
                    <div class="header">
                        <h4 class="text-primary">
                            <center>Diplomado de Docencia en Educacion Superior</center>
                        </h4>
                        <h5 class="text-primary">
                            <center>Facultad de Pedagogia de la U.M.R.P.S.F.X.CH.</center>
                        </h5>
                    </div><br>
                    <div class="row">
                        <div class="form-group form-sm">
                            <div class="col-md-1">
                                <!-- <label class=" control-label">foto : </label>  -->
                            </div>
                            <div class="col-md-4">
                                <small><label class=" control-label">CI : </label> <span id="ciacademico"></span> </small></br>
                                <small><label class=" control-label">Nombre: </label> <span id="nombreacademico"></span></small></br>
                                <small><label class=" control-label">Ciudad: </label> <span id="ciudadacademico"></span></small></br>
                                <small><label class=" control-label">Direccion: </label> <span id="direccionacademico"></span></small>
                            </div>
                            <div class="col-md-5">
                                <small><label class=" control-label">Telefono: </label> <span id="telefonoacademico"></span> </small></br>
                                <small><label class=" control-label">No. Archivo : </label> <span id="noarchivoacademico"></span> </small></br>
                                <small><label class=" control-label">Descripcion/Observaciones : </label><span id="observacionacademico" style="width:450px;word-break:break-word"></span></small>
                            </div>
                        </div>
                    </div>

                    <!-- <hr> -->

                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <h5 class="text-info"><strong>Profesion/Carrera</strong></h5>
                            <div class="list-group">
                                <div>
                                    <ul id="profesionAcademico">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <center>
                                <h5 class="text-info"><strong>Estudios de Posgrado e Investigacion</strong></h5>
                            </center>
                            <div class="panel-body">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="table-responsive">
                                        <table class="table-sm  table-condensed ">
                                            <thead class="">

                                                <th class=""><small>Profesion/Carrera</small></th>
                                                <th class=""><small>Especialidades</small></th>
                                            </thead>
                                            <tbody id="academicoCompleto">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <!-- <input type="submit" class="btn btn-success" value="Seleccionar Tribunal" > -->
                </div>

            </div>
        </div>
    </div>
</div>
<!-- MODAL SELECCIONAR TRIBUNAL -->
<div class="modal fade bs-example-modal-sm" id="modalTipoTribunal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="titulolabel"> Seleccione Tipo de Tribunal</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group ">
                        <div class="col-md-5">
                            <label for="">CI:</label>
                            <p id="cia" class="label label-primary"></p>
                        </div>
                        <div class="col-md-7">
                            <small>
                                <p id="nombretrib"></p>
                            </small>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group input-sm">
                        <div class="col-md-10 col-md-offset-2">
                            <label class="radio-inline">
                                <input type="radio" name="radiotipotrib" id="radios" value="Presidente"> Presidente
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="radiotipotrib" id="radios" value="Secretario"> Secretario
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-sm btn-active" data-dismiss="modal" onClick="selecTribunal()">Seleccionar</button>
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal" >Contratar</button> -->
            </div>
        </div>
    </div>
</div>