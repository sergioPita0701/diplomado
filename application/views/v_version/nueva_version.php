<div class="col-md-12 col-md-offset- main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <h3>
                    <center> Registrar Nueva Versión</center>
                </h3>
            </div>
            <div class="row">
                <divFecha de Inicio class="col-sm-9 col-sm-offset-3 col-md-2 ">
                    <a href="<?= base_url(); ?>index.php/version/registroV" class="" role="">
                        <span class="glyphicon glyphicon-list-alt"></span> Ir a Lista de Versiones
                    </a>

                </divFecha>
            </div></br>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form class="form" role="form" action="http://localhost:80/diplomado/index.php/version/registrarVersion" method="post">
                        <div class="panel panel-info">
                            <!-- <div class="panel-heading">
                                <div class="panel-title">Registrar Nueva Version</div>
                            </div> -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">Nombre</label>
                                        <input type="text" class="form-control input-sm" name="txtNombreV" placeholder="Introdusca Nombre de la Version" value="<?= set_value('txtNombreV'); ?>">
                                        <?= form_error('txtNombreV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Lugar</label>
                                        <input type="text" class="form-control input-sm" name="txtLugarV" placeholder="Introdusca Direccion o Lugar" value="<?= set_value('txtLugarV'); ?>">
                                        <?= form_error('txtLugarV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtTipoCursoV">Tipo de Curso </label>
                                        <input type="hidden" name="txtTipoCursoV" id="txtTipoCursoV" value="<?= set_value('txtTipoCursoV'); ?>">
                                        <select class="form-control" id="txtTipoCursoV" name="txtTipoCursoV">
                                            <option value="Diplomado">Diplomado</option>
                                            <option value="Maestría">Maestría</option>
                                            <option value="Especialidad">Especialidad</option>
                                        </select>
                                        <?= form_error('txtTipoCursoV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="form-group col-md-3 ">
                                        <label for="">Fecha de Inicio</label>
                                        <input type="date" class="form-control input-sm" name="txtFechaV" placeholder="Seleccionar Fecha de Inicio de la Version" value="<?= set_value('txtFechaV'); ?>">
                                        <?= form_error('txtFechaV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3 ">
                                        <label for="txtCantidadModulosV">Cantidad De Módulo </label>
                                        <input type="number" class="form-control input-sm" name="txtCantidadModulosV" id="txtCantidadModulosV" placeholder=" (1 => I, 2 => II , 3=> III ...)" value="<?= set_value('txtCantidadModulosV'); ?>">
                                        <?= form_error('txtCantidadModulosV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3 ">
                                        <label for="txtCantidadModulosV">estado De la Versión</label>
                                        <input type="hidden" name="txtEstadoV" id="txtEstadoV" value="<?= set_value('txtEstadoV'); ?>">
                                        <select class="form-control" id="txtEstadoV" name="txtEstadoV">
                                            <option value="0">Inactivo</option>
                                            <option value="1">Activo</option>
                                        </select>
                                        <?= form_error('txtEstadoV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div><br>
                                <hr>
                                <div class="row">

                                    <div class="form-group col-md-3">
                                        <label for="txtTiempoV">Tiempo (Meses)</label>
                                        <input type="number" min="1" class="form-control input-sm" name="txtTiempoV" id="txtTiempoV" placeholder="# de meses" value="<?= set_value('txtTiempoV'); ?>">
                                        <?= form_error('txtTiempoV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtNumPagosV">N° Pagos (Cuotas) (#meses -1)</label>
                                        <input type="number" min="1" class="form-control input-sm" name="txtNumPagosV" id="txtNumPagosV" placeholder="# de pagos" value="<?= set_value('txtNumPagosV'); ?>">
                                        <?= form_error('txtNumPagosV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="form-group col-md-3 ">
                                        <label for="txtCostoV">Costo Total (Bs.)</label>
                                        <input type="number" step="any" class="form-control input-sm" name="txtCostoV" id="txtCostoV" placeholder="Costo de la Versión" value="<?= set_value('txtCostoV'); ?>">
                                        <?= form_error('txtCostoV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtCostoMatriculaV">Costo Matrícula (bs) (10%)</label>
                                        <input type="number" min="1"  step="any" class="form-control input-sm" name="txtCostoMatriculaV" id="txtCostoMatriculaV" placeholder="Costo de la matrícula" value="<?= set_value('txtCostoMatriculaV'); ?>">
                                        <?= form_error('txtCostoMatriculaV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtCostoModulosV">Costo Módulos (bs) (90%)</label>
                                        <input type="number" min="1"  step="any" class="form-control input-sm" name="txtCostoModulosV" id="txtCostoModulosV" placeholder="Costo de los módulos" value="<?= set_value('txtCostoModulosV'); ?>">
                                        <?= form_error('txtCostoModulosV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 ">
                                        <label for="txtMontoMinPrimerPagoV">Monto Minimo Primer Pago (Bs) </label>
                                        <label for="txtMontoMinPrimerPagoV">(Matricula+Costo Módulos/N° Pagos)</label>
                                        <input type="number" step="any" class="form-control input-sm" name="txtMontoMinPrimerPagoV" id="txtMontoMinPrimerPagoV" placeholder="Monto Minimo Primer Pago " value="<?= set_value('txtMontoMinPrimerPagoV'); ?>">
                                        <?= form_error('txtMontoMinPrimerPagoV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <label for="txtDescripcionV">Descripcion</label>
                                        <textarea wrap="hard" class="form-control input-sm" name="txtDescripcionV" rows="3" placeholder="Insertar descripción u Observaciones"><?= set_value('txtDescripcionV'); ?></textarea>
                                        <?= form_error('txtDescripcionV', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>

                                </div><br>
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <div style="text-align:right">
                                            <input class="btn btn-default btn-md active" type="reset" value="Borrar Todo">
                                            <input class="btn btn-info btn-md active" type="submit" value="Registrar Version" onClick="return confirm('Desea crear la siguiente version, verifique detalladamente sus datos. Desea Continuar?')">
                                        </div>
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