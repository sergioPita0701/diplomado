<div class="col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <!-- Button trigger modal -->
                <center>
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalDiplomante" data-backdrop="static" data-keyboard="false" onclick="diplomante();">
                        Nueva Inscripción
                    </button>
                </center>

                <hr>
                <!-- Modal -->
                <!-- <?php include_once('diplomante.php'); ?> -->
            </div>
            <!-- hidden="true" -->
            <div class="row">
                <div class="col-md-9 col-md-offset-" id="ventinscripcion"><!-- hidden="true" -->
                    <form class="form" role="form" action="<?= base_url() ?>index.php/inscripcion/insertarInscripcion" method="post">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row" style="background-color:#2d2d2;">
                                    <div class="col-md-4 col-md-push-8">
                                        <div class="form-group  form-inline">
                                            <label for="">No.:</label>
                                            <input type="text" class="form-control input-sm" name="txtNumI" id="numi" value="<?= $ultinscrito + 1; ?>" readonly><!-- <?= set_value('txtNumI'); ?> -->
                                            <div class="row col-md-10">
                                                <?= form_error('txtNumI', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">

                                        <input type="text" class="form-control input-sm" name="txtCiI" id="cii" value="<?= $diplomante[0]['ciD']; ?>" readonly="readonly">
                                        <p style="text-align:center"><strong><small>Carnet de Identidad</small></strong></p>
                                    </div>
                                    <div class="form-group col-md-3 col-md-push-2">
                                        <?= form_error('radioSexoI', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                        <div class="form-inline">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="radioSexoI" id="optionsRadios1" value="Femenino" <?= set_radio('radioSexoI', 'Femenino'); ?>>
                                                    Femenino...
                                                </label>
                                            </div>
                                            <div class="radio ">
                                                <label>
                                                    <input type="radio" name="radioSexoI" id="optionsRadios2" value="Masculino" <?= set_radio('radioSexoI', 'Masculino'); ?>>
                                                    Masculino
                                                </label>
                                            </div>
                                        </div>
                                        <!-- <p style="text-align:center"><strong><small>Sexo</small></strong></p> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">

                                        <input type="text" class="form-control input-sm" name="txtNombreI" id="nombrei" value="<?= $diplomante[0]['nombreD'] ?>" readonly="readonly">
                                        <p class="text-center"><strong><small>Nombre</small></strong></p>
                                    </div>
                                    <div class="form-group col-md-4">

                                        <input type="text" class="form-control input-sm" name="txtApePaternoI" id="apepaternoi" placeholder="" value="<?= $diplomante[0]['apellidoPaternoD'] ?>" readonly="readonly">
                                        <p class="text-center"><strong><small>Apellido Paterno</small></strong></p>
                                    </div>
                                    <div class="form-group col-md-4">

                                        <input type="text" class="form-control input-sm" name="txtApeMaternoI" id="apematernoi" placeholder="" value="<?= $diplomante[0]['apellidoMaternoD'] ?>" readonly="readonly">
                                        <p class="text-center"><strong><small>Apellido Materno</small></strong></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control input-sm" name="txtPaisNacI" value="<?= set_value('txtPaisNacI'); ?>" require>
                                        <p class="text-center"><strong><small>Pais de Nacimiento</small></strong></p>
                                        <?= form_error('txtPaisNacI', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">

                                        <input type="text" class="form-control input-sm" name="txtDepNacI" value="<?= set_value('txtDepNacI'); ?>">
                                        <p class="text-center"><strong><small>Departamento de Nacimiento</small></strong></p>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="date" class="form-control input-sm" name="txtfechaNacI" value="<?= set_value('txtfechaNacI'); ?>" require>
                                        <p class="text-center"><strong><small>Fecha de Nacimiento</small></strong></p>
                                        <?= form_error('txtfechaNacI', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <select class="form-control input-sm" id="sel1" name="estadoCivil">
                                            <option> </option>
                                            <option value="Soltero" <?= set_select('estadoCivil', 'Soltero'); ?>>Soltero/a</option>
                                            <option value="Comprometido" <?= set_select('estadoCivil', 'Comprometido'); ?>>Comprometido/a</option>
                                            <option value="Casado" <?= set_select('estadoCivil', 'Casado'); ?>>Casado/a</option>
                                            <option value="Divorciado" <?= set_select('estadoCivil', 'Divorciado'); ?>>Divorciado/a</option>
                                            <option value="Viudo" <?= set_select('estadoCivil', 'Viudo'); ?>>Viudo/a</option>
                                        </select>
                                        <p for="sel1" class="text-center"><strong><small>Estado Civil</small></strong></p>
                                        <?= form_error('estadoCivil', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">

                                        <input type="text" class="form-control input-sm" name="txtDireccionI" value="<?= set_value('txtDireccionI'); ?>">
                                        <p class="text-center"><strong><small>Direccion</small></strong></p>
                                    </div>
                                    <div class="form-group col-md-3">

                                        <input type="text" class="form-control input-sm" name="txtTelefonoI" value="<?= set_value('txtTelefonoI'); ?>">
                                        <p class="text-center"><strong><small>Telefono</small></strong></p>
                                    </div>
                                    <div class="form-group col-md-3">

                                        <input type="text" class="form-control input-sm" name="txtCelularI" value="<?= set_value('txtCelularI'); ?>">
                                        <p class="text-center"><strong><small>Celular</small></strong></p>
                                    </div>
                                    <div class="form-group col-md-3">

                                        <input type="text" class="form-control input-sm" name="txtEmailI" value="<?= set_value('txtEmailI'); ?>">
                                        <p class="text-center"><strong><small>E-mail</small></strong></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">

                                        <input type="datetime-local" class="form-control input-sm" autocomplete="on" name="txtFechaInscI" id="fechaactuali" value="<?= set_value('txtFechaInscI', date('Y-m-d\TH:i')); ?>" required>
                                        <p class="text-center"><strong><small>Fecha de Inscripción</small></strong></p>
                                        <?= form_error('txtFechaInscI', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>

                                    <!-- <div class="form-group col-md-4">

                                        <select class="form-control input-sm" id="modulo" name="txtmodulo" placeholder="">
                                        <option >--Seleccione Modulo--</option>
                                            <?php foreach ($modulo as $fila) : ?>
                                                <option class=""><?= $fila['nombreM']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <p class="text-center"><strong><small>Modulo</small></strong></p>
                                    </div>    -->
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <center>
                                            <hr>
                                            <h3>
                                                Formulario De Descuento (Esta Inscripción)
                                            </h3>
                                        </center>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">


                                        <div class="form-group col-md-12">
                                            <select name="SelectDescuentos" id="SelectDescuentos" class="form-control input-sm">
                                                <option class="" value="0" <?= set_select('SelectDescuentos', '0', true); ?>>Ninguno</option>
                                                <?php foreach ($descuentos as $fila) : ?>
                                                    <option class="" value="<?= $fila['porcentajeD']; ?>" <?= set_select('SelectDescuentos', $fila['porcentajeD']); ?> data-idDescuentoselect="<?= $fila['idDescuento']; ?>">
                                                        <?= $fila['nombreD'] . ' ( ' . $fila['porcentajeD']; ?> ) %
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <input type="hidden" id="idDescuentoSeleccionado" name="idDescuentoSeleccionado" value="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">


                                            <div class="form-group col-md-5 ">
                                                <div class="form-group">
                                                    <label for="">
                                                        <span id="">
                                                            Costo de la Matrícula
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 ">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <span id=" ">
                                                            <?= $version->costoMatriculaV; ?> Bs.
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3 ">
                                                <label for="descuento">
                                                    Costo Colegiatura
                                                </label>
                                            </div>
                                            <div class="form-group col-md-5 ">
                                                <div class="form-group">
                                                    <label for="descuento">
                                                        <span style=" color: #ffffff;background-color: #3498db; padding: 5px 10px; border-radius: 5px; ">
                                                            <?= $version->nombreV; ?>
                                                        </span>
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label for="descuento"><?= $version->costoModulosV; ?> Bs.</label>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3 ">
                                                <label for="descuento">
                                                    Descuento

                                                </label>
                                            </div>
                                            <div class="form-group col-md-5 ">
                                                <div class="form-group">
                                                    <label for="descuento" style=" color: #ffffff;background-color: #00cc44; padding: 5px 10px; border-radius: 5px; ">
                                                        <span id="descuentoCalculado">
                                                            0
                                                        </span>
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label for="resultadoDescuentoCalculado">
                                                        <span id="resultadoDescuentoCalculado">
                                                            0
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <hr>
                                            <div class="form-group col-md-3 ">
                                            </div>
                                            <div class="form-group col-md-5 ">
                                                <div class="form-group">
                                                    <label for="">
                                                        <span id="">
                                                            TOTAL Descuento
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label for="totalCostoFinalColegiatura">
                                                        <span id="totalCostoFinalColegiatura">
                                                            <?= $version->costoV; ?> Bs.
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <hr>
                                            <div class="form-group col-md-3 ">
                                            </div>
                                            <div class="form-group col-md-5 ">
                                                <div class="form-group">
                                                    <label for="">
                                                        <span id="">
                                                            Costo Total Del Curso
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label for="totalCostoFinal">
                                                        <span id="totalCostoFinal">
                                                            <?= $version->costoV; ?> Bs.
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <center>
                                            <hr>
                                            <h3>
                                                Deposito (Esta Inscripción)
                                            </h3>
                                        </center>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-3">

                                        <label for="txtFechaDepositoP">Fecha de Depósito</label>
                                        <input type="date" class="form-control" id="txtFechaDepositoP" name="txtFechaDepositoP" placeholder="Fecha de Depósito" value="<?= set_value('txtFechaDepositoP'); ?>">
                                        <?= form_error('txtFechaDepositoP', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtNumeroDepositoP">Número de Depósito</label>
                                        <input type="number" class="form-control" id="txtNumeroDepositoP" name="txtNumeroDepositoP" placeholder="Número de Depósito" value="<?= set_value('txtNumeroDepositoP'); ?>">
                                        <?= form_error('txtNumeroDepositoP', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="form-group col-md-3">

                                        <label for="txtMonedaP">Moneda</label>
                                        <select class="form-control" id="txtMonedaP" name="txtMonedaP">
                                            <option value="BS" <?= set_select('txtMonedaP', 'BS'); ?>>BS</option>
                                            <option value="USD" <?= set_select('txtMonedaP', 'USD'); ?>>USD</option>
                                        </select>
                                        <?= form_error('txtMonedaP', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtTasaCambioP">Tasa Cambio</label>
                                        <input type="number" step="0.01" class="form-control" id="txtTasaCambioP" name="txtTasaCambioP" placeholder="Tasa Cambio" value="<?= set_value('txtTasaCambioP'); ?>">
                                        <?= form_error('txtTasaCambioP', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtMontoP">Monto</label>
                                        <input type="number" step="0.01" class="form-control" id="txtMontoP" name="txtMontoP" placeholder="Monto" value="<?= set_value('txtMontoP'); ?>">
                                        <?= form_error('txtMontoP', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtMontoTotalBsP">Monto Total Bs</label>
                                        <input type="number" step="0.01" class="form-control" id="txtMontoTotalBsP" name="txtMontoTotalBsP" placeholder="Monto Total" value="0" readonly>
                                        <?= form_error('txtMontoTotalBsP', '<br><div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-8 ">
                                                <label for="descuento">
                                                    Total a Cancelar:
                                                </label>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label for="totalCostoFinal2">
                                                        <span id="totalCostoFinal2">
                                                            <?= $version->costoV; ?> Bs.
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-8 ">
                                                <label for="deposito">
                                                    Monto del Depósito :
                                                </label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label for="montoDepostio">
                                                        <span id="montoDepostio">
                                                            0 Bs.
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <hr>
                                            <div class="form-group col-md-3 ">
                                            </div>
                                            <div class="form-group col-md-5 ">
                                                <div class="form-group">
                                                    <label for="">
                                                        <span id="">
                                                            Saldo
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label for="resultadoDepostioCalculado">
                                                        <span id="resultadoDepostioCalculado">
                                                            0 Bs.
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" name="txtIdVersion" value="<?= $version->idVersion ?>">
                                    <input type="hidden" name="txtMontoDescuentoT" id="txtMontoDescuentoT" value="<?= $version->costoV ?>">



                                </div>
                                <div class="row">
                                    <div class="form-group col-md-5 col-md-offset-7">
                                        <div style="text-align:right">
                                            <input class="btn btn-default btn-md active" type="reset" value="Borrar Texto" onclick="">
                                            <input class="btn btn-info btn-md active" type="submit" value="Registrar Inscripcion" onclick="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3" id="">
                    <h5>Participantes Registrados</h5>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php foreach ($inscritos as $fila) : ?>
                                <li class=""><small><?= $fila->nombreD . " " . $fila->apellidoPaternoD . " " . $fila->apellidoMaternoD; ?></small></li>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- modal diplomante -->
<div class="modal fade bs-example-modal-lg" id="modalDiplomante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <center>Registrar Nuevo Diplomante</center>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <!-- <form  action="http://localhost:8080/diplomado/index.php/diplomante/crearDiplomante" method="POST" class="form" role="form"> -->
                        <div class="row">
                            <div class="col-md-11 col-md-offset-3 form-inline">
                                <div class="form-group">
                                    <input type="text" name="txtci" class="form-control input-sm" id="ci" placeholder="Introdusca numero de CI" value="">
                                    <button type="button" class="btn btn-primary btn-sm" value="" id="buscarCi" onclick="buscarci()">Buscar Diplomante</button>
                                </div>

                            </div>

                        </div>
                        <hr>
                        <div class="row" id="mensaje">
                        </div>
                        <!-- <hr> -->
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="txtNombreD" class="form-control input-sm" id="nombred" placeholder="Introdusca Nombre">
                                <div class="row col-md-12" id="vacionombre">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="txtApellidoPaternoD" class="form-control input-sm" id="apepaternod" placeholder="Introdusca Apellido Paterno">
                                <div class="row col-md-12" id="vacioapepaterno">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="txtApellidoMaternoD" class="form-control input-sm" id="apematernod" placeholder="Introdusca Apellido Materno">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="txtCiudadD" class="form-control input-sm" id="ciudadd" placeholder="Insertar Ciudad">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-11 form-inline">
                                <select name="txtProfesionD" id="profesiones" class="form-control input-sm">
                                    <?php foreach ($profesion as $fila) : ?>
                                        <option class="" value="<?= $fila['idProfesion']; ?>"><?= $fila['nombreP'] . '--' . $fila['gradoAcademicoP']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button id="selecProf" class="form-control btn-sm" onclick="selectProfesion();"><span class="glyphicon glyphicon-refresh"></span></button>
                                <a id="abrirCrearPrf" data-toggle="modal" data-target="#modalcrearProfesion" data-backdrop="static" data-keyboard="false" onclick="abrirProfesion('','modalcrearProfesion','nueva_profesion');"> Insertar Profesion</a>

                                <div class="row col-md-12" id="vacioprofesion">
                                </div>
                            </div>
                        </div>

                        <!-- </form> -->
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" data-dismiss="modal" id="btninscripcion" onclick="botoninscripcion();" disabled>Inscribir Participante Reincorporado</button>
                <button type="submit" class="btn btn-primary" id="btnregistrar" onclick="crearDiplomante();" disabled>Inscribir Participante Nuevo</button>
            </div>
        </div>
    </div>
</div>

<!-- <?php include_once('nueva_profesion.php'); ?>  -->
<div class="modal fade" id="modalcrearProfesion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

</div>