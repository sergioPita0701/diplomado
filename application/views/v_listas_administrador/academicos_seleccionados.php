<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <hr>
                <div class="row">
                    <div class="col-md-5 col-md-offset-6">
                        <form action="http://localhost:80/diplomado/index.php/academicoseleccionado/lista_seleccionados" method="post">
                            <div class="">
                                <div class="input-group">
                                    <input type="text" id="" name="txtBuscarS" class="form-control" placeholder="Buscar Academico por Nombre, CI, Profesion, Grado.. " value="<?= set_value('txtBuscar'); ?>">
                                    <span class="input-group-btn">
                                        <input class="btn btn-default active" type="submit" value="Buscar">
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <hr>

                <div class="col-md-12" id="listaAcademicos">
                    <div class="table-responsive ">
                        <table class="table  table-hover ">
                            <thead class="">
                                <th class="active">No.</th>
                                <th class="active">Nombre Completo</th>
                                <th class="active">Ci</th>
                                <th class="active">Telefono</th>
                                <th class="active">Ciudad</th>
                                <th class="active">Direccion</th>
                                <th class="active">Folio</th>
                                <th class="active">Op.</th>
                            </thead>
                            <tbody>
                                <?php $i = 0;  ?>
                                <?php foreach ($academicoseleccionados as $fila) : ?>
                                    <tr>
                                        <td><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td><a class="" href="<?= base_url('index.php/academico/academico_seleccionado/' . $fila['ciA']); ?>"><?= $fila['nombreA']; ?></a></td>
                                        <td><?= $fila['ciA']; ?></td>
                                        <td><?= $fila['telefonoA']; ?></td>
                                        <td><?= $fila['ciudadA']; ?></td>
                                        <td><?= $fila['direccionA']; ?></td>
                                        <td><?= $fila['numFolioA']; ?></td>
                                        <td>
                                            <a href="<?= base_url('index.php/academico/detalleAcademico/' . $fila['ciA']); ?>" type="button" class="btn btn-info btn-group btn-xs" onClick="">
                                                <span class="glyphicon glyphicon-cog"></span></a>
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