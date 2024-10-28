<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="page-header text-primary">
                    <h4>ACADEMICOS - <small> Registro de Academicos Seleccionados</small></h4>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-6">
                        <form action="http://localhost:80/diplomado/index.php/academicoseleccionado/lista_seleccionados" method="post">
                            <div class="">
                                <div class="input-group">
                                    <input type="text" id="" name="txtBuscarS" class="form-control input-sm" placeholder="Buscar Academico por Nombre, CI, Profesion, Grado.. " value="<?= set_value('txtBuscar'); ?>">
                                    <span class="input-group-btn">
                                        <input class="btn btn-default btn-sm active" type="submit" value="Buscar">
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="col-md-10 col-md-offset-1" id="listaAcademicos">
                    <div class="table-responsive ">
                        <table class="table  table-hover ">
                            <thead style="display: block;" style="table-layout:; width:100px">
                                <th style="width:100px;word-break:break-word" class="active">No.</th>
                                <th style="width:400px;word-break:break-word" class="active">Nombre Completo</th>
                                <th style="width:200px;word-break:break-word" class="active">Ci</th>
                                <th style="width:250px;word-break:break-word" class="active">Ciudad</th>
                                <th style="width:100px;word-break:break-word" class="active">Op.</th>
                            </thead>
                            <tbody style="display: block; height: 400px; overflow-y: auto; overflow-x: hidden; ">
                                <?php $i = 0;  ?>
                                <?php foreach ($academicoseleccionados as $fila) : ?>
                                    <tr>
                                        <td style="width:100px;word-break:break-word "><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="width:400px;word-break:break-word "><a class="" href="<?= base_url('index.php/academico/academico_seleccionado/' . $fila['ciA']); ?>"><?= $fila['nombreA']; ?></a></td>
                                        <td style="width:200px;word-break:break-word "><?= $fila['ciA']; ?></td>
                                        <td style="width:250px;word-break:break-word "><?= $fila['ciudadA']; ?></td>
                                        <td style="width:100px;word-break:break-word ">
                                            <a href="<?= base_url('index.php/academico/detalleAcademico/' . $fila['ciA']); ?>" type="button" class="btn btn-info btn-group btn-xs" onClick="">
                                                <span class="glyphicon glyphicon-cog"></span></a>
                                            <!-- Button modal -->
                                            <!-- <b href="" type="button" class="btn btn-success btn-group btn-xs" data-toggle="modal" data-target="#modalAcadSelect" data-backdrop="static">
                                <span class="glyphicon glyphicon-ok"></span>Asignar Rol</b> -->
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
    <?php include_once('modal_selec_rol.php'); ?>
</div>