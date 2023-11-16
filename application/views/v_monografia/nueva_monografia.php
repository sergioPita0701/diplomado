<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="panel panel-default">

            <div class="panel-body">
                <!-- <hr> -->
                <div class="row">
                    <div class="col-md-8 col-md-offset-1">

                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="header">
                                    <h4>
                                        <center>Registrar Monografia</center>
                                    </h4>
                                    <!-- <h5><center>Facultad de Pedagogia de la U.M.R.P.S.F.X.CH.</center></h5> -->
                                </div></br>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-">
                                        <form class="form-horizontal" action="" id="formMonografia" method="post"><!-- http://localhost:8080/diplomado/index.php/monografia/crearMonografia_de_Diplomante -->
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-3" id="msjDiploamteMo">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group form-sm">
                                                    <!-- $diplomante[0]['nombreD']?> -->
                                                    <div class="col-md-5 col-md-offset-3">
                                                        <input type="hidden" name="txtcidiplomante" id="diplo" class="form-control input-sm" value=" <?= empty($diploinscritos[0]->ciD) ? '' : $diploinscritos[0]->ciD; ?>">
                                                        <small><label class=" control-label">CI : </label>
                                                            <p name="pciDiplo" id="pciDiplo"><?= empty($diploinscritos[0]->ciD) ? '' : $diploinscritos[0]->ciD; ?>
                                                        </small></p>
                                                        <input type="hidden" name="txtprofesiondiplomante" id="prof" class="form-control input-sm" value="<?= empty($diploinscritos[0]->nombreP) ? '' : $diploinscritos[0]->nombreP; ?>">
                                                        <small><label class=" control-label">Profesion: </label>
                                                            <p id="profesionDiplo"><?= empty($diploinscritos[0]->nombreP) ? '' : $diploinscritos[0]->nombreP; ?>
                                                        </small></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="txtnombrediplomante" class="form-control input-sm" value="">
                                                        <small><label class=" control-label">Nombre: </label>
                                                            <p id="nombreD"><?= empty($diploinscritos[0]->nombreD) ? '' : $diploinscritos[0]->nombreD . ' ' . $diploinscritos[0]->apellidoPaternoD . ' ' . $diploinscritos[0]->apellidoMaternoD; ?>
                                                        </small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-10 col-md-offset-2">

                                                            <label for="txtnombre"><small>Titulo Monografia</small></label>
                                                            <input type="text" name="txttituloMono" id="txttituloMono" class="form-control input-sm" value="<?= set_value('txttituloMono'); ?>">
                                                            <?= form_error('txttituloMono', '<div class="alert alert-danger"><small>', '</small></div>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5 col-md-offset-2">
                                                            </br><small><label class=" control-label">Inicio de la Monografia </label></small>
                                                            <input type="date" class="form-control input-sm" name="finicioMono" id="finicioMono" value="<?= set_value('finicioMono'); ?>">
                                                            <?= form_error('finicioMono', '<div class="alert alert-danger"><small>', '</small></div>'); ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                            </br><small><label class=" control-label">Culminación de la Monografia </label></small>
                                                            <input type="date" class="form-control input-sm" name="ffinalMono" id="ffinalMono" value="<?= set_value('ffinalMono'); ?>">
                                                            <?= form_error('ffinalMono', '<div class="alert alert-danger"><small>', '</small></div>'); ?>
                                                        </div>
                                                    </div></br>
                                                    <div class="row">
                                                        <div class="col-md-10 col-md-offset-2 ">
                                                            <label for="txtnombreparalelo"><small>Descripcion del Proyecto</small></label>
                                                            <textarea wrap="hard" class="form-control input-sm" rows="3" name="txtdescripcionMono" id="txtdescripcionMono" value="<?= set_value('txtdescripcionMono'); ?>" placeholder="Insertar Descripcion u Observaciones"></textarea>
                                                        </div>
                                                    </div></br>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-12 col-md-offset-" id="">
                                                            <hr>
                                                            <input class="btn btn-primary btn-sm active" type="submit" value="Registar Monografia">
                                                            <hr>
                                                            <input class="btn btn-default btn-md active" type="reset" value="Borrar Texto">
                                                            <hr>
                                                            <a href="<?= base_url(); ?>index.php/academico/listaAcademico/6">Registrar Turor</a>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-6" id="msjMonografia"></div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <!-- <div class="panel panel-default"> -->
                        <!-- <div class="panel-body"> -->
                        <div class="row">
                            <div class="col-md-11 col-md-offset-1">
                                <form action="http://localhost:8080/diplomado/index.php/monografia/registroMonografia" method="post">
                                    <div class="">
                                        </br></br><input class="btn btn-default btn-sm active" type="submit" value="Seleccionar Participante">
                                    </div></br>
                                    <div class="input-group">
                                        <select multiple class="form-control input-sm" name="txtbuscarD">
                                            <?php foreach ($inscritos as $fila) : ?>
                                                <option value="<?= $fila->ciD; ?>"><?= $fila->nombreD . ' ' . $fila->apellidoPaternoD . ' ' . $fila->apellidoMaternoD; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>