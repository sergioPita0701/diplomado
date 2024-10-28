<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <!-- <hr> -->
                <div class="row">
                    <div class="col-md-12 col-md-offset-">
                        <form class="form-horizontal" action="" method="">
                            <div class="header text text-success">
                                <h4>
                                    <center>INFORMACIÓN DE ALUMNO</center>
                                </h4>
                            </div>
                            <hr>
                            <div class="col-md-5 col-md-offset-1">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="panel-title"><small>
                                                <center>Datos Personales</center>
                                            </small></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-2">
                                                    <label class=" control-label"><small>CI : </small></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <small>
                                                        <p class="form-control-static" id="dpci"><?= $diplomante[0]['ciD']; ?></p>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-1">
                                                    <label class=" control-label"><small>Nombre Completo: </small></label>
                                                </div>
                                                <div class="col-md-7">
                                                    <small>
                                                        <p class="form-control-static" id="dpnombrecompleto"><?= $diplomante[0]['nombreD'] . " " . $diplomante[0]['apellidoPaternoD'] . " " . $diplomante[0]['apellidoMaternoD']; ?></p>
                                                    </small>
                                                    <small>
                                                        <p class="hidden" class="form-control-static" id="dpnombre"><?= $diplomante[0]['nombreD']; ?></p>
                                                    </small>
                                                    <small>
                                                        <p class="hidden" class="form-control-static" id="dpapepaterno"><?= $diplomante[0]['apellidoPaternoD']; ?></p>
                                                    </small>
                                                    <small>
                                                        <p class="hidden" class="form-control-static" id="dpapematerno"><?= $diplomante[0]['apellidoMaternoD']; ?></p>
                                                    </small>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-1">
                                                    <label class=" control-label"><small>Ciudad de Residencia: </small></label>
                                                </div>
                                                <div class="col-md-7">
                                                    <small>
                                                        <p class="form-control-static" id="dpciudad"><?= $diplomante[0]['ciudadD']; ?></p>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-md-offset-2">
                                                    <label class=" control-label"><small>Profesion: </small></label>
                                                </div>
                                                <div class="col-md-7">
                                                    <small>
                                                        <p class="form-control-static" id="dpprofesion"><?= $diplomante[0]['nombreP'] . "---" . $diplomante[0]['gradoAcademicoP']; ?></p>
                                                    </small>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-5">
                                                    <button href="" type="button" class="btn btn-warning btn-sm active " data-toggle="modal" data-target=".bs-modalEditDP-modal-lg ">Editar Datos Personales</button>
                                                    <!-- <button type="button" class="btn btn-default btn-sm " onclick="pasardatosamodal();" >Editar Datos Personales</button>  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="msjnotificacion">
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="panel-title"><small>
                                                <center>Datos de Inscripcion</center>
                                            </small></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-md-4 col-md-offset-1">
                                                <label class=" control-label"><small>No. Inscripcion: </small></label>
                                                <small>
                                                    <p class="form-control-static" id="numDI"><?= empty($diplomanteinscrito[0]->numeroI) ? 'No se Inscribio al Modulo' : $diplomanteinscrito[0]->numeroI; ?></p>
                                                </small>
                                            </div>
                                            <div class="col-md-5 col-md-offset-1">
                                                <label class=" control-label"><small>Pais de Nacimiento: </small></label>
                                                <small>
                                                    <p class="form-control-static" id="paisnacDI"><?= empty($diplomanteinscrito[0]->paisnacI) ? 'No se inscribio a la Version Actual' : $diplomanteinscrito[0]->paisnacI; ?></p>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-1">
                                                <label class=" control-label"><small>Dpto. de Nacimiento: </small></label>
                                                <small>
                                                    <p class="form-control-static" id="deparnacDI"><?= empty($diplomanteinscrito[0]->departamentonacI) ? 'No se inscribio a la Version Actual' : $diplomanteinscrito[0]->departamentonacI; ?></p>
                                                </small>
                                            </div>
                                            <div class="col-md-5 col-md-offset-1">
                                                <label class=" control-label"><small>Fecha de Nacimiento :</small></label>
                                                <small>
                                                    <p class="form-control-static" id="fechanacDI"><?= empty($diplomanteinscrito[0]->fechanacI) ? 'No se inscribio a la Version Actual' : $diplomanteinscrito[0]->fechanacI; ?></p>
                                                </small>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-1">
                                                <label class=" control-label"><small>Estado Civil:</small></label>
                                                <small>
                                                    <p class="form-control-static" id="estadocivilDI"><?= empty($diplomanteinscrito[0]->estadoCivilI) ? 'No se inscribio a la Version Actual' : $diplomanteinscrito[0]->estadoCivilI; ?></p>
                                                </small>

                                            </div>
                                            <div class="col-md-5 col-md-offset-1">
                                                <label class=" control-label"><small>Direccion: </small></label>
                                                <small>
                                                    <p class="form-control-static" id="direccionDI"><?= empty($diplomanteinscrito[0]->direccionI) ? 'No se inscribio a la Version Actual' : $diplomanteinscrito[0]->direccionI; ?></p>
                                                </small>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label class=" control-label"><small>Sexo: </small></label>
                                                <small>
                                                    <p class="form-control-static" id="sexoDI"><?= empty($diplomanteinscrito[0]->sexoI) ? 'No se inscribio a la Version Actual' : $diplomanteinscrito[0]->sexoI; ?></p>
                                                </small>

                                            </div>
                                            <div class="col-md-4">
                                                <label class=" control-label"><small>Telf.: </small></label>
                                                <small>
                                                    <p class="form-control-static" id="telefonoDI"><?= empty($diplomanteinscrito[0]->telefonoI) ? 'No se inscribio a la Version Actual' : $diplomanteinscrito[0]->telefonoI; ?></p>
                                                </small>

                                            </div>
                                            <div class="col-md-4">
                                                <label class=" control-label"><small>Cel.: </small></label>
                                                <small>
                                                    <p class="form-control-static" id="celularDI"><?= empty($diplomanteinscrito[0]->celularI) ? 'No se inscribio a la Version Actual' : $diplomanteinscrito[0]->celularI; ?></p>
                                                </small>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-1">
                                                <label class=" control-label"><small>E-mail: </small></label>
                                                <small>
                                                    <p class="form-control-static" id="emailDI"><?= empty($diplomanteinscrito[0]->emailI) ? 'No se inscribio a la Version Actual' : $diplomanteinscrito[0]->emailI; ?></p>
                                                </small>

                                            </div>
                                            <div class="col-md-5 col-md-offset-1">
                                                <label class=" control-label"><small>Fecha de Inscripcion: </small></label>
                                                <small>
                                                    <p class="form-control-static" id="fechaiDI"><?= empty($diplomanteinscrito[0]->fechaInscripcionI) ? '' : $diplomanteinscrito[0]->fechaInscripcionI; ?></p>
                                                </small>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-4">
                                                <!-- Button Modal Editar datos de Inscripcion-->
                                                <button type="button" class="btn btn-warning btn-sm active" data-toggle="modal" data-target="#modalDatosInscripcion">
                                                    Editar Informacion de Inscripcion
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-2">
                                <!-- <button href="" type="button" class="btn btn-default  btn-sm" onClick="">Imprimir</button> -->
                                <button href="" type="button" class="btn btn-danger btn-sm active" data-toggle="modal" data-target="#eliminarInscripcion">Eliminar Alumno de la Version</button>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA ELIMINAR INSCRIPCION-->
<div class="modal fade" id="eliminarInscripcion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form" role="form" action="http://localhost:80/diplomado/index.php/inscripcion/eliminarInscripcion" method="post">
                    <div id=" row mensajeEliminar">
                        <small>
                            <p class="alert alert-warning"><span class="glyphicon glyphicon-alert"></span><?= " Dese Eliminar Inscripcion numero: " . $diplomanteinscrito[0]->numeroI . " del Alumno con CI: " . $diplomante[0]['ciD']; ?>
                            <p>
                        </small>
                        <input type="hidden" name="ciDiplomante" value="<?= $diplomante[0]['ciD']; ?>">
                        <input type="hidden" name="numInscripcion" value="<?= $diplomanteinscrito[0]->numeroI; ?>">
                    </div>
                    <div class=" row col-md-6 col-md-offset-7">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-danger  btn-sm" value="Eliminar Inscripcion">
                    </div>
                </form>
            </div></br></br>

        </div>
    </div>
</div>

<!-- modal Editar Diplomante Datos Personales-->
<div class="modal fade bs-modalEditDP-modal-lg" id="modalEditDP" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form" id="formEditar">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title text text-primary" id="">Editar Datos Personales del Alumno</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="textoCiDi" name="textoCiDi" value="<?= $diplomante[0]['ciD']; ?>" readonly><!--  -->
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>Nombre:</small></label>
                                        <input type="text" class="form-control input-sm" id="textoNombreDi" name="textoNombreDi" value="<?= $diplomante[0]['nombreD']; ?>"><!-- <?= $diplomante[0]['nombreD']; ?> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>Apellido Paterno:</small></label>
                                        <input type="text" class="form-control input-sm" id="textoApePaternoDi" name="textoApePaternoDi" value="<?= $diplomante[0]['apellidoPaternoD']; ?>"><!-- <?= $diplomante[0]['apellidoPaternoD']; ?><?= $diplomante[0]['apellidoPaternoD']; ?> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>Apellido Materno:</small></label>
                                        <input type="text" class="form-control input-sm" id="textoApeMaternoDi" name="textoApeMaternoDi" value="<?= $diplomante[0]['apellidoMaternoD']; ?>"><!-- <?= $diplomante[0]['apellidoMaternoD']; ?> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>Ciudad Residensia:</small></label>
                                        <input type="text" class="form-control input-sm" id="textociudadDi" name="textociudadDi" value="<?= $diplomante[0]['ciudadD']; ?>"><!-- <?= $diplomante[0]['ciudadD']; ?> -->
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>Profesion:</small></label>
                                        <select class="form-control input-sm" name="profesionDi" id="profesionDi">
                                            <option value="<?= $diplomante[0]['idProfesion']; ?>"><?= $diplomante[0]['nombreP'] . " (" . $diplomante[0]['gradoAcademicoP'] . ")"; ?></option>
                                            <?php foreach ($profesion as $fila) : ?>
                                                <option value="<?= $fila['idProfesion']; ?>"><?= $fila['nombreP'] . " (" . $fila['gradoAcademicoP'] . ")"; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-sm" id="btneditarDiplomante" onclick="editardiplomante();" disabled>Actualizar Datos Personales de Alumno</button>
                <!-- <input type="submit" class="btn btn-primary" value="Actualizar Informacion " > -->
            </div>


        </div>
    </div>
</div>

<!-- modal Editar Diplomante Datos Inscripcion-->
<div class="modal fade" id="modalDatosInscripcion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <form class="form" role="form" action="http://localhost:80/diplomado/index.php/diplomante/editarDiplomante" method="post"> -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title text text-primary" id="">Editar Datos de Inscripcion del Alumno</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-">
                                <div class="form-group">
                                    <label for="" class="control-label"><small>No. Inscripcion:</small></label>
                                    <input type="text" class="form-control input-sm" id="numI" name="textoNumI" value="<?= $diplomanteinscrito[0]->numeroI; ?>">
                                </div>

                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <input type="hidden" class="form-control input-sm" id="ciDI" name="textociDI" value="<?= $diplomante[0]['ciD']; ?>" readonly>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><small>Pais de Nacimiento:</small></label>
                                    <input type="text" class="form-control input-sm " id="paisnacI" name="textoPaisnacI" value="<?= $diplomanteinscrito[0]->paisnacI; ?>" autofocus="autofocus" />
                                </div>
                            </div>
                            <div class="col-md-5 col-md-offset-1">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><small>Departamento Nacimiento:</small></label>
                                    <input type="text" class="form-control input-sm" id="depanacI" name="textoDepanacI" value="<?= $diplomanteinscrito[0]->departamentonacI; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-">
                                <div class="form-inline">
                                    <label for="recipient-name" class="control-label"><small>Sexo :</small></label>
                                    <div class="radio">

                                        <input type="radio" name="radioESexoI" id="optionsRadios1" value="Femenino" <?= $diplomanteinscrito[0]->sexoI == 'Femenino' ? 'checked' : ''; ?>>
                                        Femenino..
                                        <input type="radio" name="radioESexoI" id="optionsRadios2" value="Masculino" <?= $diplomanteinscrito[0]->sexoI == 'Masculino' ? 'checked' : ''; ?>>
                                        Masculino

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-md-offset-1">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><small>Estado Civil:</small></label>
                                    <!-- <input type="text" class="form-control input-sm" id="textociudadDi" name="textociudadDi" > -->
                                    <select class="form-control input-sm" id="estadoCivil" name="selectestadoCivil">
                                        <option value="Soltero" <?= $diplomanteinscrito[0]->estadoCivilI == 'Soltero' ? 'selected' : ''; ?>> Soltero/a</option>
                                        <option value="Comprometido" <?= $diplomanteinscrito[0]->estadoCivilI == 'Comprometido' ? 'selected' : ''; ?>>Comprometido/a</option>
                                        <option value="Casado" <?= $diplomanteinscrito[0]->estadoCivilI == 'Casado' ? 'selected' : ''; ?>>Casado/a</option>
                                        <option value="Divorciado" <?= $diplomanteinscrito[0]->estadoCivilI == 'Divorciado' ? 'selected' : ''; ?>>Divorciado/a</option>
                                        <option value="Viudo" <?= $diplomanteinscrito[0]->estadoCivilI == 'Viudo' ? 'selected' : ''; ?>>Viudo/a</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><small>Fecha de Nacimiento:</small></label>
                                    <input type="date" class="form-control input-sm" id="fechanacI" name="textoFechanacI" value="<?= $diplomanteinscrito[0]->fechanacI; ?>">
                                </div>
                            </div>
                            <div class="col-md-5 col-md-offset-1">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><small>Direccion:</small></label>
                                    <input type="text" class="form-control input-sm" id="direccionI" name="textoDireccionI" value="<?= empty($diplomanteinscrito[0]->direccionI) ? '' : $diplomanteinscrito[0]->direccionI; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><small>Telefono :</small></label>
                                    <input type="text" class="form-control input-sm" id="telefonoI" name="textoTelefonoI" value="<?= empty($diplomanteinscrito[0]->telefonoI) ? '' : $diplomanteinscrito[0]->telefonoI; ?>">
                                </div>
                            </div>
                            <div class="col-md-5 col-md-offset-1">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><small>Celular :</small></label>
                                    <input type="text" class="form-control input-sm" id="celularI" name="textoCelularI" value="<?= empty($diplomanteinscrito[0]->celularI) ? '' : $diplomanteinscrito[0]->celularI; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><small>E-mail :</small></label>
                                    <input type="text" class="form-control input-sm" id="emailI" name="textoEmailI" value="<?= empty($diplomanteinscrito[0]->emailI) ? '' : $diplomanteinscrito[0]->emailI; ?>">
                                </div>
                            </div>
                            <div class="col-md-5 col-md-offset-1">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><small>Fecha de Inscripcion:</small></label>
                                    <input type="" class="form-control input-sm" autocomplete="on" id="fechaI" name="textoFechaI" value="<?php $date = date_create(empty($diplomanteinscrito[0]->fechaInscripcionI) ? null : $diplomanteinscrito[0]->fechaInscripcionI);
                                                                                                                                            echo date_format($date, "Y-m-d h:i"); ?>">
                                    <!-- <input type="datetime-local" class="form-control input-sm" autocomplete="on" id="fechaI" name="textoFechaI" value="<?= $diplomanteinscrito[0]->fechaInscripcionI; ?> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="editardinscripcion();">Actualizar Datos de Inscripcion</button>
                <!-- <input type="submit" class="btn btn-primary" value="Actualizar Informacion " > -->
            </div>
            <!-- </form> -->

        </div>
    </div>
</div>