<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-11 col-md-offset-">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="header">
                        <h4>
                            <center>Asignacion de Docencia</center>
                        </h4>
                    </div></br>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <form action="http://localhost:80/diplomado/index.php/docencia/registroDocencia" method="post">
                                <div class="input-group">
                                    <h4><em>Seleccione un Academico candidato a Docencia de la siguiente lista, si no existe el academico que quiere, dirijase a la pestaña de Academicos>Nuevo Academico( Para registrar uno nuevo) ó Lista de Academícos>Todos>marcar bien (para seleccionar un academico como Docente o Tutor): </em></h4>
                                    <select multiple class="form-control input-sm" name="txtbuscarD">
                                        <?php foreach ($academicoseleccionados as $seleccionado) : ?>
                                            <option value="<?= $seleccionado['ciA']; ?>"><?= $seleccionado['nombreA']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="input-group-btn">
                                        <input class="btn btn-info btn-sm active" type="submit" value="Seleccionar Docente">
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-5" id="msjdocencia">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-" id="msjErr">
                                </div>
                                <div class="form-group form-sm">
                                    <div class="col-md-4">
                                        <small><label class=" control-label">CI : </label> <strong>
                                                <p class="text text-danger" name="ciAcadDoc" id="ciAcadDoc"><?= empty($academico[0]['ciA']) ? 'Debe Registrar Academico y/o Seleccionar Docente!!' : $academico[0]['ciA']; ?>
                                            </strong></small></p>
                                    </div>
                                    <div class="col-md-8 col-md-offset-">
                                        <small><label class=" control-label">Nombre: </label> <strong>
                                                <p class="text text-danger" id="nombreD"><?= empty($academico[0]['nombreA']) ? 'Debe Registrar Academico y/o Seleccionar Docente!!' : $academico[0]['nombreA']; ?>
                                            </strong></small></p>
                                    </div>
                                </div>
                            </div>
                            <!-- <hr> -->
                            <div class="row">
                                <div class="col-md-11">
                                    <h6><em>Profesion/Carrera</em></h6>
                                    <div class="list-group">
                                        <ul>
                                            <?php foreach ($academicoProf as $filita) : ?>
                                                <li type="" class="text text-success"><small><?= $filita['nombreP']; ?><span class="label label-success"> <?= empty($filita['gradoAcademicoP']) ? 'Debe Registrar Academico y/o Seleccionar Docente!!' : $filita['gradoAcademicoP']; ?></span></small></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6><em>Estudios de Posgrado e Investigacion</em></h6>
                                    <!-- <div class="panel-body"> -->
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table-sm  table-condensed ">
                                                <thead>
                                                    <th><small>Profesion/Carrera</small></th>
                                                    <th><small>Especialidades</small></th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($academicocompleto as $fila) : ?>
                                                        <tr>
                                                            <td class="text text-success"><small><?= $fila['nombreP'] . "--" . $fila['gradoAcademicoP']; ?></small></td>
                                                            <td class="text text-success"><small><?= $fila['nombreE']; ?></small></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div></br>
                            <div class="row">
                                <div class="col-md-10" id="registrodocencia">
                                    <label for="txtnombre"><small><em>Docencias</em></small></label>
                                    <?php foreach ($registroDocencias as $doc) : ?>
                                        <small>
                                            <li class="list-group-item list-group-item-info" value=""><?= $doc['nombreM'] . " Paralelo: " . $doc['nombre_paralelo'] . " Se asigno el :" . $doc['fechaInicioDoc']; ?><strong><?= " ---" . $doc['estadoDoc']; ?></strong></li>
                                        </small>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form class="form-horizontal" id="formasigdoc" method="post"> <!--action="http://localhost:80/diplomado/index.php/docencia/crearDocencia_paralelo"-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="ciAcadDoc" id="ciAcadDoc" class="form-control input-sm" value="<?= $academico[0]['ciA']; ?>" readonly>
                                        <label for=""><small>Modulo </small></label>
                                        <select type="text" class="form-control input-sm " id="modulosele" name="modulosele">
                                            <option value="">--Seleccione un Modulo--</option>
                                            <?php foreach ($modulo as $modulito) : ?>
                                                <option value="<?= $modulito['numeroM']; ?>">
                                                    <?= " ( " .  convertirANumerosRomanos($modulito['nivelM']) . " - " . $modulito['nombreM'] . " ) " ?><br><?= $modulito['asignaturaNombreM']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-5 ">
                                        <label for="txtnombreparalelo"><small>Nombre Paralelo</small></label>
                                        <select type="text" class="form-control input-sm" id="paralelosele" name="paralelosele">
                                            <!-- <option value="wq">ds</option> -->
                                        </select>
                                    </div>
                                </div></br>
                                <div class="row" hidden>
                                    <div class="col-md-9">
                                        <select type="text" class="form-control input-sm" id="estadodoc" name="estadodoc">
                                            <option value="">--Seleccione Estado--</option>
                                            <option value="Activo">Titular</option>
                                            <option value="Remplazo">Remplazo</option>
                                            <option value="Ausente">Ausente</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <small><label for="">Contrato (o No.)</label></small>
                                        <input type="text" class="form-control input-sm" id="contratodoc" name="contratodoc">
                                    </div>
                                    <div class="col-md-5">
                                        <small><label for="">Fecha de Contrato Docencia</label></small>
                                        <input type="date" class="form-control input-sm" id="fechacontratodoc" name="fechacontratodoc">
                                    </div>
                                </div></br>
                                <div class="row">
                                    <div class="col-md-5">
                                        <small><label for="">Inicia Docencia Desde:</label></small>
                                        <input type="date" class="form-control input-sm" id="fechainiciodoc" name="fechainiciodoc">
                                    </div>
                                    <div class="col-md-5">
                                        <small><label for="">Hasta:</label></small>
                                        <input type="date" class="form-control input-sm" id="fechafindoc" name="fechafindoc">
                                    </div>
                                </div></br>
                                <div class="row">
                                    <div class="col-md-10">
                                        <small><label for="">Observaciones </label></small>
                                        <textarea wrap="hard" class="form-control input-sm" name="observacionDoc" id="observacionDoc" rows="2" placeholder="Ej. Alguna Observacion con respecto a la Asignacion de Docente"></textarea>
                                    </div>
                                </div></br>
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-7" id="">
                                        <input type="submit" class="btn btn-primary btn-sm " value="Designar Docencia">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-6">
                                <!-- <button href="" type="reset" class="btn btn-default active  btn-sm" onClick="">Imprimir</button> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>