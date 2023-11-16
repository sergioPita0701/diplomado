<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-2 main">
    <div class="row">

        <div class="panel panel-default">
            <!-- <div class="panel-heading">
            <div class="panel-title">Registrar Academico</div>
        </div> -->
            <div class="panel-body">
                <h4 class="page-header text-primary">
                    <center>Registrar Academico</center>
                </h4>
                <form class="form" role="form" action="http://localhost:8080/diplomado/index.php/academico/crearAcademico" method="post">
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="col-md-7 ">
                                <h5><em>Datos Personales</em></h5>
                                <div class="row">
                                    <div class="form-inline col-md-7 col-md-offset-1">
                                        <label for=""><small>CI</small></label>
                                        <input type="text" class="form-control input-sm" id="ciAcad" name="txtCiA" value="<?= set_value('txtCiA'); ?>" placeholder="Inserte CI.." />
                                        <a type="button" class="btn btn-primary btn-sm" value="Buscar" id="buscarCi" onclick="buscarciAcademico()">Buscar CI</a>
                                        <?= form_error('txtCiA', '<div class="alert alert-danger"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-inline col-md-2" id="verAcad" hidden="hidden">
                                        <a type="button" class="btn btn-success btn-sm" value="Ver" id="btnverAcad" href="<?= base_url(); ?>index.php/academico/listaAcademico">Ver Academico</a>
                                    </div>

                                </div>
                                <div class="row col-md-9 col-md-offset-1" id="mensajeAcademico">
                                </div></br>

                                <div class="row">
                                    <div class="form-group col-md-11">
                                        <label for=""><small>Nombre Completo</small></label>
                                        <input type="text" class="form-control input-sm" id="nombreA" name="txtNombreCompletoA" value="<?= set_value('txtNombreCompletoA'); ?>" placeholder="Inserte Nombre Completo">
                                        <?= form_error('txtNombreCompletoA', '<div class="alert alert-danger"><small>', '</small></div>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=""><small>Telefono</small></label>
                                        <input type="text" class="form-control input-sm" id="telefonoA" name="txtTelefonoA" value="<?= set_value('txtTelefonoA'); ?>" placeholder="Insertar Telefono">

                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for=""><small>No. Archivador Fisico</small></label>
                                        <input type="text" class="form-control input-sm" id="folioA" name="txtFolioA" value="<?= set_value('txtFolioA'); ?>" placeholder="No. de Folio">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for=""><small>Ciudad Actual</small></label>
                                        <input type="text" class="form-control input-sm" id="ciudadA" name="txtCiudadActualA" value="<?= set_value('txtCiudadActualA'); ?>" placeholder="Ciudad de Residencia Actual">

                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for=""><small>Direccion</small></label>
                                        <input type="text" class="form-control input-sm" id="direccionA" name="txtDireccionA" value="<?= set_value('txtDireccionA'); ?>" placeholder="Insertar Direccion de Vivienda">
                                    </div>

                                </div>
                                <div class="row">


                                </div>

                                <div class="row">
                                    <div class="form-group col-md-11 ">
                                        <label for="txtDescripcionA"><small>Descripcion</small></label>
                                        <textarea wrap="hard" class="form-control input-sm" rows="3" name="txtDescripcionA" id="txtDescripcionA" value="<?= set_value('txtDescripcionA'); ?>" placeholder="Insertar descripcion u Observaciones"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-5 col-md-offset-">
                                <h5><em>Estudios Superiores</em></h5>
                                <div class="row">
                                    <div class="form-group col-md-12 ">

                                        <label for="profA"><small>Profesion</small></label></br>

                                        <?= form_error('ProfecionA', '<div class="alert alert-danger"><small>', '</small></div>'); ?>

                                        <div class="btn-group">
                                            <input type="button" class="btn btn-default btn-sm active" id="todos" href="" value="Todos" onclick="selectgrado('')">
                                            <input type="button" class="btn btn-danger btn-sm" id="inge" href="" value="Ing." onclick="selectgrado('ingenieria')">
                                            <input type="button" class="btn btn-success btn-sm" id="licen" href="" value="Lic." onclick="selectgrado('licenciatura')">
                                            <input type="button" class="btn btn-primary btn-sm" id="tecSup" href="" value="Tec. Sup." onclick="selectgrado('tecSup')">
                                            <input type="button" class="btn btn-info btn-sm" id="tecMed" href="" value="Tec. Med." onclick="selectgrado('tecMed')">
                                            <input type="button" class="btn btn-warning btn-sm" id="otro" href="" value="Otro" onclick="selectgrado('otro')">
                                        </div>

                                        <div class="row col-md-9 col-md-offset-1" id="profesion">
                                            </br>
                                            <select class="form-control input-sm" id="profA" name="ProfecionA">
                                                <option value="">Seleccione una Profesion</option>
                                                <?php foreach ($profesion as $fila) : ?>

                                                    <option value="<?= $fila['idProfesion']; ?>"><?= $fila['nombreP']; ?></option>

                                                <?php endforeach; ?>
                                            </select>

                                            <a href="<?= base_url(); ?>index.php/profesion">
                                                <h6>Insertar Profesion</h6>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <label for="checkbox[]"><small>Posgrado/Especialidades/Estudio de Excelecia</small></label>
                                    <div class="form-group col-md-10 col-md-offset-2">
                                        <?= form_error('checkbox[]', '<div class="alert alert-danger"><small>', '</small></div>'); ?>
                                        <?php foreach ($especialidad as $fila) : ?>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkOpcion1" name="checkbox[]" value="<?= $fila['idEspecialidad']; ?>"> <?= $fila['nombreE']; ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="row">
                            <div style="text-align:right">
                                <input class="btn btn-default btn-md active" type="reset" value="Borrar Texto">
                                <input class="btn btn-info btn-md active" type="submit" id="btnRegistrarA" name="btnRegistrarA" value="Registrar Academico">
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

</div>