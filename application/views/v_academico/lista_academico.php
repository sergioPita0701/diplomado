<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="panel panel-default">
            <!-- <div class="panel-heading">
                <div class="panel-title">Lista de Academicos</div>
            </div> -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5 col-md-offset-6">
                        <form action="http://10.4.25.3:8080/diplomado/index.php/academicoprofesion/getAcademicoProfesional" method="post">
                            <div class="">
                                <div class="input-group">
                                    <input type="text" id="" name="txtBuscar" class="form-control input-sm" placeholder="Buscar Academico por Nombre, CI, Profesion, Grado.. " value="<?= set_value('txtBuscar'); ?>">
                                    <span class="input-group-btn">
                                        <input class="btn btn-default btn-sm active" type="submit" value="Buscar">
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="col-md-12" id="listaAcademicos">
                    <div class="table-responsive ">
                        <table class="table  table-hover " style="table-layout:; width:1038px">
                            <thead style="display: block;">
                                <th style="width:38px;word-break:break-word " class="success"><small>No.</small></th>
                                <th style="width:250px;word-break:break-word " class="success"><small>Nombre Completo</small></th>
                                <th style="width:100px;word-break:break-word " class="success"><small>Ci</small></th>
                                <th style="width:100px;word-break:break-word " class="success"><small>Telefono</small></th>
                                <th style="width:100px;word-break:break-word " class="success"><small>No. Folio</small></th>
                                <th style="width:100px;word-break:break-word " class="success"><small>Ciudad</small></th>
                                <th style="width:100px;word-break:break-word " class="success"><small>Grado</small></th>
                                <th style="width:150px;word-break:break-word " class="success"><small>Profecion</small></th>
                                <th style="width:100px;word-break:break-word " class="success"><small>Seleccionar</small></th>
                            </thead>
                            <tbody style="display: block; height: 400px; overflow-y: auto; overflow-x: hidden; ">
                                <?php $i = 0;  ?>
                                <?php foreach ($academicoProf as $fila) : ?>
                                    <tr>
                                        <td style="width:38px;word-break:break-word "><strong><small><?= $i = $i + 1;  ?></small></strong></td>
                                        <td style="width:250px;word-break:break-word "><a class="" href="<?= base_url('index.php/academico/academico_seleccionado/' . $fila['ciA']); ?>"><?= $fila['nombreA']; ?></a></td>
                                        <td style="width:100px;word-break:break-word "><small><?= $fila['ciA']; ?></small></td>
                                        <td style="width:100px;word-break:break-word "><small><?= $fila['telefonoA']; ?></small></td>
                                        <td style="width:100px;word-break:break-word "><small><?= $fila['numFolioA']; ?></small></td>
                                        <td style="width:100px;word-break:break-word "><small><?= $fila['ciudadA']; ?></small></td>
                                        <td style="width:100px;word-break:break-word "><small><?= $fila['gradoAcademicoP']; ?></small></td>
                                        <td style="width:150px;word-break:break-word "><small><?= $fila['nombreP']; ?></small></td>
                                        <td style="width:100px;word-break:break-word ">
                                            <!-- <a href="<?= base_url('index.php/academico/detalleAcademico/' . $fila['ciA']); ?>" type="button" class="btn btn-info btn-group btn-xs" onClick="">
                                    <span class="glyphicon glyphicon-cog"></span></a> -->
                                            <!-- Button modal -->
                                            <!-- <a href="<?= base_url('index.php/academicoseleccionado/registrarAcadSeleccionado/' . $fila['ciA']); ?>" type="button" class="btn btn-success btn-group btn-xs" onClick=" return confirm('Desea Asignar a este Academico en la version actual?')">
                                    <span class="glyphicon glyphicon-ok"></span></a> -->

                                            <!-- Button modal -->
                                            <b href="" type="button" class="btn btn-success btn-group btn-xs" data-toggle="modal" data-target="#modalAcadSelect" data-backdrop="static">
                                                <span class="glyphicon glyphicon-ok"></span> </b>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal SELECCIONAR ROL -->
<div class="modal fade bs-example-modal-sm" id="modalAcadSelect" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <!-- <?php include_once('modal_selec_rol.php'); ?>  -->
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titulolabel"></h4>
            </div>
            <form action="http://10.4.25.3:8080/diplomado/index.php/academicoseleccionado/registrarAcadSeleccionado" method="POST" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group input-sm">
                            <div class="col-md-4">
                                <label for="txtnombre">CI</label>
                                <input type="text" id="cia" name="txtcia" class="form-control input-sm" value="" readonly>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="txtnombre">Nombre</label>
                                    <input type="text" id="nombrea" name="txtnombrea" class="form-control input-sm" readonly>
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
                                <!-- <label class="radio-inline">
                                <input type="radio" name="radiotipocontrato" id="radiotipocontrato3" value="Defenza"> Defenza
                            </label> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-primary btn-sm" value="Seleccionar">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal" >Contratar</button> -->
                </div>
            </form>
        </div>
    </div>
</div>