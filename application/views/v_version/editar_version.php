<div class="col-md-12 col-md-offset- main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <h3>
                    <center> Editar Versión</center>
                </h3>
            </div>
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3 col-md-2">
                    <a href="<?= base_url(); ?>index.php/version/registroV" class="" role="">
                        <span class="glyphicon glyphicon-list-alt"></span> Ir a Lista de Versiones
                    </a>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <!-- Formulario para editar la versión -->
                    <form class="form" role="form" action="<?= base_url(); ?>index.php/version/editarVersion" method="post">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="txtNombreVEditar">Nombre</label>
                                        <input type="text" class="form-control input-sm" name="txtNombreVEditar" placeholder="Introduzca Nombre de la Versión" value="<?= set_value('txtNombreVEditar', $version['nombreV']); ?>">
                                        <?= form_error('txtNombreVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtLugarVEditar">Lugar</label>
                                        <input type="text" class="form-control input-sm" name="txtLugarVEditar" placeholder="Introduzca Dirección o Lugar" value="<?= set_value('txtLugarVEditar', $version['lugarV']); ?>">
                                        <?= form_error('txtLugarVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtTipoCursoVEditar">Tipo de Curso </label>
                                        <input type="hidden" name="txtTipoCursoVEditar" id="txtTipoCursoVEditar" value="<?= set_value('txtTipoCursoVEditar', $version['tipoCursoV']); ?>">
                                        <select class="form-control" id="txtTipoCursoVEditar" name="txtTipoCursoVEditar">
                                            <option value="Diplomado" <?= ($version['tipoCursoV'] == 'Diplomado') ? 'selected' : ''; ?>>Diplomado</option>
                                            <option value="Maestría" <?= ($version['tipoCursoV'] == 'Maestría') ? 'selected' : ''; ?>>Maestría</option>
                                            <option value="Especialidad" <?= ($version['tipoCursoV'] == 'Especialidad') ? 'selected' : ''; ?>>Especialidad</option>
                                        </select>
                                        <?= form_error('txtTipoCursoVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="txtFechaVEditar">Fecha de Inicio</label>
                                        <input type="date" class="form-control input-sm" name="txtFechaVEditar" placeholder="Seleccionar Fecha de Inicio de la Versión" value="<?= set_value('txtFechaVEditar', $version['fechaV']); ?>">
                                        <?= form_error('txtFechaVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtCantidadModulosVEditar">Cantidad De Módulo </label>
                                        <input type="number" min="1" class="form-control input-sm" name="txtCantidadModulosVEditar" id="txtCantidadModulosVEditar" placeholder="(1 => I, 2 => II , 3=> III ...)" value="<?= set_value('txtCantidadModulosVEditar', $version['cantidadModulosV']); ?>">
                                        <?= form_error('txtCantidadModulosVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtEstadoVEditar">Estado De la Versión</label>
                                        <input type="hidden" name="txtEstadoVEditar" id="txtEstadoVEditar" value="<?= set_value('txtEstadoVEditar', $version['estadoV']); ?>">
                                        <select class="form-control" id="txtEstadoVEditar" name="txtEstadoVEditar">
                                            <option value="0" <?= ($version['estadoV'] == 0) ? 'selected' : ''; ?>>Inactivo</option>
                                            <option value="1" <?= ($version['estadoV'] == 1) ? 'selected' : ''; ?>>Activo</option>
                                        </select>
                                        <?= form_error('txtEstadoVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div><br>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="txtTiempoVEditar">Tiempo (Meses)</label>
                                        <input type="number" min="1" class="form-control input-sm" name="txtTiempoVEditar" id="txtTiempoV" placeholder="# de meses" value="<?= set_value('txtTiempoVEditar', $version['tiempoV']); ?>">
                                        <?= form_error('txtTiempoVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtNumPagosVEditar">N° Pagos (Cuotas) (#meses -1)</label>
                                        <input type="number" min="1" class="form-control input-sm" name="txtNumPagosVEditar" id="txtNumPagosV" placeholder="# de pagos" value="<?= set_value('txtNumPagosVEditar', $version['numPagosV']); ?>">
                                        <?= form_error('txtNumPagosVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="txtCostoVEditar">Costo Total (Bs.)</label>
                                        <input type="number" step="any" class="form-control input-sm" name="txtCostoVEditar" id="txtCostoV" placeholder="Costo de la Versión" value="<?= set_value('txtCostoVEditar', $version['costoV']); ?>">
                                        <?= form_error('txtCostoVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtCostoMatriculaVEditar">Costo Matrícula (bs) (10%)</label>
                                        <input type="number" min="1"  step="any" class="form-control input-sm" name="txtCostoMatriculaVEditar" id="txtCostoMatriculaV" placeholder="Costo de la matrícula" value="<?= set_value('txtCostoMatriculaVEditar', $version['costoMatriculaV']); ?>">
                                        <?= form_error('txtCostoMatriculaVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="txtCostoModulosVEditar">Costo Módulos (bs) (90%)</label>
                                        <input type="number" min="1"  step="any" class="form-control input-sm" name="txtCostoModulosVEditar" id="txtCostoModulosV" placeholder="Costo de los módulos" value="<?= set_value('txtCostoModulosVEditar', $version['costoModulosV']); ?>">
                                        <?= form_error('txtCostoModulosVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="txtMontoMinPrimerPagoVEditar">Monto Mínimo Primer Pago (Bs) </label>
                                        <label for="txtMontoMinPrimerPagoVEditar">(Matrícula + Costo Módulos / N° Pagos)</label>
                                        <input type="number" step="any" class="form-control input-sm" name="txtMontoMinPrimerPagoVEditar" id="txtMontoMinPrimerPagoV" placeholder="Monto Mínimo Primer Pago " value="<?= set_value('txtMontoMinPrimerPagoVEditar', $version['montoMinPrimerPagoV']); ?>">
                                        <?= form_error('txtMontoMinPrimerPagoVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <label for="txtDescripcionVEditar">Descripción</label>
                                        <textarea wrap="hard" class="form-control input-sm" name="txtDescripcionVEditar" rows="3"><?= set_value('txtDescripcionVEditar', $version['descripcionV']); ?></textarea>
                                        <?= form_error('txtDescripcionVEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div><br>
                                <input type="hidden" id="txtIdVersionEditar" name="txtIdVersionEditar" value="<?= set_value('txtIdVersionEditar', $version['idVersion']); ?>">
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <div style="text-align:right">
                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Fin del formulario para editar la versión -->
                </div>
            </div>
        </div>
    </div>
</div>
