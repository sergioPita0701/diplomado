<!-- Modal Crear Modulo-->
<div class="modal fade" id="modalCrearModuloAsignatura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Version(<?= $version->idVersion; ?>)Crear Asignatura<small> Módulo - Asignatura <span id="numsele" name=""></span></small></h4>
            </div>
            <form action="<?= base_url(); ?>/index.php/modulo/crearModulo" method="POST" class="from-horizontal" role="form">
                <div class="modal-body list-group">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <label for=""><small>Número </small></label>

                            <!-- <input type="number" name="txtNumM" id="nummod" value="<?= $ultimo + 1; ?>" class="form-control input-sm" placeholder="Insertar Nivel" readonly> -->
                            <select id="txtNumM" name="txtNumM" id="nummod" class="form-control">
                                <?php for ($i = 1; $i <= $ultimo + 1; $i++) : ?>
                                    <option value="<?= $i; ?>" <?= set_select('txtNumM', $i, ($i == $ultimo + 1)); ?>>
                                        <?= $i; ?>
                                    </option>
                                <?php endfor; ?>
                            </select>

                            <?= form_error('txtNumM', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <label for="selectNivelM">N° Módulo</label>
                            <select id="selectNivelM" name="selectNivelM" class="form-control">

                                <?php for ($i = 1; $i <= $version->cantidadModulosV; $i++) : ?>
                                    <option value="<?= $i; ?>" <?= set_select('selectNivelM', $i); ?>>
                                        <?= convertirANumerosRomanos($i); ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                            <?= form_error('selectNivelM', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                        </div>
                        <div class="col-md-5  ">
                            <label for="txtNombreModulo">Nombre Módulo</label>
                            <input type="text" name="txtNombreModulo" id="txtNombreModulo" class="form-control input-sm" placeholder="Insertar Nombre del Módulo" value="<?= set_value('txtNombreModulo'); ?>">
                            <?= form_error('txtNombreModulo', '<div class="alert alert-warning"><small>', '</small></div>'); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10  col-md-offset-1">
                            <label for="txtAsignaturaNombreM"><small>Nombre asignatura</small></label>
                            <textarea name="txtAsignaturaNombreM" id="txtAsignaturaNombreM" class="form-control input-sm" rows="3" placeholder="Insertar Nombre de la Asignatura"><?= set_value('txtAsignaturaNombreM'); ?></textarea>
                            <?= form_error('txtAsignaturaNombreM', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <label for=""><small>Fecha de Inicio</small></label>
                            <input type="date" name="txtFechaInicioMo" id="txtFechaInicioMo" class="form-control input-sm" value="<?= set_value('txtFechaInicioMo'); ?>">
                        </div>
                        <div class="col-md-4 ">
                            <label for=""><small>Fecha de Culminación</small></label>
                            <input type="date" name="txtFechaFinalMo" id="txtFechaFinalMo" class="form-control input-sm" value="<?= set_value('txtFechaFinalMo'); ?>">
                        </div>
                        <div class="col-md-3 ">
                            Falta :<small>
                                <div id="restafechasMO" class=""></div>
                            </small>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <label for=""><small>Activado</small></label>
                            <select class="form-control input-sm" id="vigentemo" name="vigentemo">
                                <option> </option>
                                <option value="1" <?= set_select('vigentemo', '1'); ?>>SI</option>
                                <option value="0" <?= set_select('vigentemo', '0'); ?>>NO</option>
                            </select>
                            <?= form_error('vigentemo', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                        </div>

                    </div>
                    <input type="hidden" name="txtIdVersion" value="<?= $version->idVersion; ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-primary" id="btnActualizar" value="Crear">
                </div>
            </form>

        </div>
    </div>
</div>