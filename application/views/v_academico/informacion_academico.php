<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body" id="bodyinformAcad">
                        <form class="form-horizontal" action="" method="post">
                            <div class="header">
                                <h4 class="text-primary">
                                    <center>Diplomado de Docencia en Educacion Superior</center>
                                </h4>
                                <h5 class="text-primary">
                                    <center>Facultad de Pedagogia de la U.M.R.P.S.F.X.CH.</center>
                                </h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group form-sm">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-4">
                                        <small><label class=" control-label">CI : </label> <?= empty($academico[0]['ciA']) ? 'No definido' : $academico[0]['ciA']; ?></small></br>
                                        <small><label class=" control-label">Nombre: </label> <?= empty($academico[0]['nombreA']) ? 'No definido' : $academico[0]['nombreA']; ?></small></br>
                                        <small><label class=" control-label">Ciudad: </label> <?= empty($academico[0]['ciudadA']) ? 'No definido' : $academico[0]['ciudadA']; ?></small></br>
                                        <small><label class=" control-label">Direccion: </label> <?= empty($academico[0]['direccionA']) ? 'No definido' : $academico[0]['direccionA']; ?></small>
                                    </div>
                                    <div class="col-md-5">
                                        <small><label class=" control-label">Telefono: </label> <?= empty($academico[0]['telefonoA']) ? 'No definido' : $academico[0]['telefonoA']; ?></small></br>
                                        <small><label class=" control-label">No. Archivo : </label> <?= empty($academico[0]['numFolioA']) ? 'No definido' : $academico[0]['numFolioA']; ?></small></br>
                                        <small><label class=" control-label">Descripcion/Observaciones : </label>
                                            <p class="form-control-static" style="width:450px;word-break:break-word" id="pdescrip"><?= empty($academico[0]['descripcionA']) ? 'No definido' : $academico[0]['descripcionA']; ?></p>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <h5 class="text-info"><strong><em>Profesion/Carrera</em></strong></h5>
                                    <div class="list-group">
                                        <ul>
                                            <?php foreach ($academicoProf as $filita) : ?>
                                                <li type="button" class=""><small><?= $filita['nombreP']; ?><span class="label label-default"> <?= $filita['gradoAcademicoP']; ?></span></small></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <center>
                                        <h5 class="text-info"><strong><em>Estudios de Posgrado e Investigacion</em></strong></h5>
                                    </center>
                                    <div class="panel-body">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="table-responsive">
                                                <table class="table-sm  table-condensed ">
                                                    <thead class="">
                                                        <th class=""><small>Profesion/Carrera</small></th>
                                                        <th class=""><small>Especialidades</small></th>
                                                    </thead>
                                                    <tbody>

                                                        <?php foreach ($academicocompleto as $fila) : ?>
                                                            <tr>
                                                                <td><small><?= $fila['nombreP'] . "--" . $fila['gradoAcademicoP'];  ?></small></td>
                                                                <td><small><?= $fila['nombreE']; ?></small></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                    <div class="panel-footer">
                        <div class="">
                            <div class="row ">
                                <div class="col-md-4 col-md-offset-8">
                                    <button href="" type="button" class="btn btn-danger active  btn-sm" id="imprimInformacionAcad"><span class="glyphicon glyphicon-print"></span> Imprimir</button>
                                    <span <?= ($this->session->userdata('tipo') == 'Administrador') ? "hidden" : "" ?>>
                                        <button id="" type="button" class="btn btn-success btn-group btn-sm" data-toggle="modal" data-target="#modalAcadSelect" data-backdrop="static">Seleccionar</button>
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Modal SELECCIONAR ROL -->
<div class="modal fade bs-example-modal-sm" id="modalAcadSelect" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <!-- <?php include_once('modal_selec_rol.php'); ?> Tiene que ser su copia -->
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titulolabel"><small>Seleccionar a <strong><?= $academico[0]['nombreA']; ?></strong> para asignarle un Rol</small></h4>
            </div>
            <form action="http://localhost:8080/diplomado/index.php/academicoseleccionado/registrarAcadSeleccionado" method="POST" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group input-sm">
                            <div class="col-md-6">
                                <!-- <label for="txtnombre">CI</label> -->
                                <input type="text" id="cia" name="txtcia" class="form-control input-sm" value="<?= $academico[0]['ciA']; ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- <label for="txtnombre">Nombre Version</label> -->
                                    <input type="text" id="nombrea" name="txtnombrea" class="form-control input-sm" value="<?= $academico[0]['nombreA']; ?>" readonly>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group input-sm">
                            <div class="col-md-12 col-md-offset-">

                                <label class="radio-inline">
                                    <input type="radio" name="radiotipocontrato" id="radiotipocontrato1" value="Docencia" checked="true"> Docencia
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="radiotipocontrato" id="radiotipocontrato2" value="Tutoria"> Tutoria
                                </label>
                                <label class="radio-inline">
                                    <!-- <input type="radio" name="radiotipocontrato" id="radiotipocontrato3" value="Defenza"> Defenza -->
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-primary btn-sm" value="Contratar">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal" >Contratar</button> -->
                </div>
            </form>
        </div>
    </div>
</div>