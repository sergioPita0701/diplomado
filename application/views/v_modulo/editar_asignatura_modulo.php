<!-- Modal Editar Modulo-->
<div class="modal fade" id="modalEditarModuloAsignatura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Modulo<small> Módulo - Asignatura <span id="numseleEditar" name=""></span></small></h4>
            </div>
            <form action="<?= base_url(); ?>/index.php/modulo/editarModulo" method="POST" class="form-horizontal" role="form">
                <div class="modal-body list-group">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <label for=""><small>Número Cambiar con otro de la lista</small></label>

                            <!-- <input type="number" name="txtNumM" id="nummod" value="<?= $ultimo; ?>" class="form-control input-sm" placeholder="Insertar Nivel" readonly> -->
                            <select id="txtNumMEditar" name="txtNumMEditar"class="form-control">
                                <?php for ($i = 1; $i <= $ultimo; $i++) : ?>
                                    <option value="<?= $i; ?>" <?= set_select('nummodEditar'); ?>>
                                        <?= $i; ?>
                                    </option>
                                <?php endfor; ?>
                            </select>

                            <?= form_error('txtNumM', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                        </div>
                        <div class="col-md-5">
                            <label for="selectNivelMEditar">N° Módulo</label>
                            <select id="selectNivelMEditar" name="selectNivelMEditar" class="form-control">
                                <?php for ($i = 1; $i <= $version->cantidadModulosV; $i++) : ?>
                                    <option value="<?= $i; ?>" <?= set_select('selectNivelMEditar', $i); ?>>
                                        <?= convertirANumerosRomanos($i); ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                            <?= form_error('selectNivelMEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <label for="txtNombreModuloEditar">Nombre Módulo</label>
                            <input type="text" name="txtNombreModuloEditar" id="txtNombreModuloEditar" class="form-control input-sm" placeholder="Insertar Nombre del Módulo" value="<?= set_value('txtNombreModuloEditar'); ?>">
                            <?= form_error('txtNombreModuloEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <label for="txtAsignaturaNombreMEditar"><small>Nombre asignatura</small></label>
                            <textarea name="txtAsignaturaNombreMEditar" id="txtAsignaturaNombreMEditar" class="form-control input-sm" rows="3" placeholder="Insertar Nombre de la Asignatura"><?= set_value('txtAsignaturaNombreMEditar'); ?></textarea>
                            <?= form_error('txtAsignaturaNombreMEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <label for="txtFechaInicioMoEditar"><small>Fecha de Inicio</small></label>
                            <input type="date" name="txtFechaInicioMoEditar" id="txtFechaInicioMoEditar" class="form-control input-sm" value="<?= set_value('txtFechaInicioMoEditar'); ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="txtFechaFinalMoEditar"><small>Fecha de Culminación</small></label>
                            <input type="date" name="txtFechaFinalMoEditar" id="txtFechaFinalMoEditar" class="form-control input-sm" value="<?= set_value('txtFechaFinalMoEditar'); ?>">
                        </div>
                        <div class="col-md-3">
                            Falta :<small>
                                <div id="restafechasMOEditar" class=""></div>
                            </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <label for="vigentemoEditar"><small>Activado</small></label>
                            <select class="form-control input-sm" id="vigentemoEditar" name="vigentemoEditar">
                                <option value="1" <?= set_select('vigentemoEditar', '1'); ?>>SI</option>
                                <option value="0" <?= set_select('vigentemoEditar', '0'); ?>>NO</option>
                            </select>
                            <?= form_error('vigentemoEditar', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                        </div>
                    </div>
                    <input type="hidden" name="txtIdVersionEditar" value="<?= $version->idVersion; ?>">
                    <input type="hidden" name="txtIdModuloEditar" id="txtIdModuloEditar">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-primary" id="btnActualizar" value="Actualizar">
                </div>
            </form>
        </div>
    </div>
</div>