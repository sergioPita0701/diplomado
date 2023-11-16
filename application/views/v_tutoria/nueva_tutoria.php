<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="row">
            <div class="col-md-8 col-md-offset-">
                <div class="row">
                    <div class="col-md-12 col-md-offset-">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="header">
                                    <h4 class="text-primary text-uppercase">
                                        <center>Asignacion de Tutor</center>
                                    </h4>
                                    <!-- <h5><center>Facultad de Pedagogia de la U.M.R.P.S.F.X.CH.</center></h5> -->
                                </div>
                                <form class="form-horizontal" id="formasignartutoria" method="post"><!--  http://localhost:8080/diplomado/index.php/tutoria/crearTutoriaMonografia -->
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-1" id="msjtutordiplo"></div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-sm">
                                            <div class="col-md-5 col-md-offset-1 has-success">
                                                <center>
                                                    <h5><em>Datos de Participante</em></h5>
                                                </center>
                                                <input type="hidden" name="realizamono" id="realizamono" class="form-control input-sm" size="10" value="" readonly>
                                                <!-- <label class=" control-label">CI : </label> -->
                                                <input type="text" name="ciDiplo" id="ciDiplo" placeholder="CI Diplomante (Seleccione Participante)" class="form-control input-sm" size="10" value="" readonly><br>
                                                <!-- <small> <p name="ciParticipante" id="ciParticipante"></p></small> -->
                                                <!-- <label class=" control-label">Nombre: </label> -->
                                                <input type="text" name="nombreParticipante" id="nombreParticipante" placeholder="Nombre Diplomante.." class="form-control input-sm" size="10" value="" readonly>
                                                <!-- <small> <p id="nombreParticipante"></p></small> -->
                                                <label class=" control-label"><small>Titulo de Monografia: </small></label>
                                                <p id="titulomono"></p>
                                            </div>
                                            <div class="col-md-5 has-success">
                                                <center>
                                                    <h5><em>Datos de Tutor</em></h5>
                                                </center>
                                                <!-- <label class=" control-label">CI Tutor </label> -->
                                                <input type="text" name="pciTutor" id="pciTutor" placeholder="CI Tutor" class="form-control input-sm" size="10" value="<?= $academico[0]['ciA']; ?>" readonly><br>
                                                <!-- <small> <p name="pciA" value="<?= $academico[0]['ciA']; ?>">value="<?= $academico[0]['nombreA']; ?>"</p></small> -->
                                                <!-- <label class=" control-label">Nombre Tutor </label>  -->
                                                <input type="text" name="nombreA" id="nombreA" placeholder="Nombre Tutor.." class="form-control input-sm" size="10" value="<?= $academico[0]['nombreA']; ?>" readonly>
                                                <label class=" control-label"><small>Tutor Asignado</small></label>
                                                <small>
                                                    <p id="tienetutor"></p>
                                                </small>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <small>
                                            <div class="col-md-8 col-md-offset-3" id="msjtutoria"></div>
                                        </small>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-">
                                            <!-- <h5><center>Tutoría</center></h5> -->
                                            <div class="row">
                                                <div class="col-md-11 col-md-offset-1">
                                                    <div class="form-group form-sm">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <small><label class=" control-label">No. de Contrato</label> </small>
                                                                <input type="text" class="form-control input-sm" name="numContrato" id="numContrato" value="">
                                                            </div>
                                                            <div class="col-md-4 col-md-offset-">
                                                                <small><label class=" control-label">Cancelado </label></small>
                                                                <div class="form-group input-sm">
                                                                    <div class="col-md-12 col-md-offset-">
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="radiocancelacion" id="radiocancelacion1" value="1"> SI
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="radiocancelacion" id="radiocancelacion2" value="0"> NO
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 ">
                                                                <small><label class=" control-label">Emision de la carta de Invitacion </label></small>
                                                                <input type="datetime-local" autocomplete="on" class="form-control input-sm" name="fechaCarta" id="fechaCarta" value="">
                                                            </div>
                                                            <!-- <div class="col-md-4">
                                                                    <small><label class=" control-label">Hora de Emision </label></small>
                                                                    <input type="time" class="form-control input-sm" name="fechaCarta" id="fechaCarta" value="">
                                                                </div> -->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                </br><small><label class=" control-label">Inicio de Tutoría </label></small>
                                                                <input type="date" class="form-control input-sm" name="fechaInicio" id="fechaInicio" value="">
                                                            </div>
                                                            <div class="col-md-5">
                                                                </br><small><label class=" control-label">Final de Tutoría</label></small>
                                                                <input type="date" class="form-control input-sm" name="fechaFinal" id="fechaFinal" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <div class="form-group form-sm">
                                                                    <div class="col-md-12">
                                                                        <small><label class=" control-label">Observaciones </label></small>
                                                                        <textarea wrap="hard" class="form-control input-sm" rows="2" name="observaciontutoria" id="observaciontutoria" value="" placeholder="Insertar Observaciones"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-sm">
                                                <div class="col-md-9 col-md-offset-1">
                                                    <hr>
                                                    <!-- <input class="btn btn-primary btn-sm active" type="submit" value="Asignar Tutor"> -->
                                                    <input type="submit" class="btn btn-primary btn-sm active" value="Asignar Tutor">
                                                    <hr>
                                                    <input class="btn btn-default btn-md active" type="reset" value="Borrar Texto">
                                                    <hr>
                                                    <!-- <a href="" class="" type="">Nueva Monografia</a>
                                                    <hr>
                                                        <a href="" class="" type="">Ver Registro de Tutorias</a>
                                                    <hr> -->
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </form>
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
                                    </br><button class="btn btn-success btn-sm " type="button" value="" onClick="getseleccionarDiplo();">Seleccionar Participante</button>
                                </div></br>
                                <div class="input-group">
                                    <select multiple style="width:280px;" class="form-control input-sm" size="10" name="txtBuscardiplo" id="txtBuscardiplo">
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
                                </br><label class=" control-label text-danger">
                                    <center>Seleccionar Tutor de la lista de Academicos </center>
                                </label>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>