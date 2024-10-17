<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Lista de Academicos en la <?= $nombre ?></h3>
                <hr>
                <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        <a href="http://10.4.25.3:8080/diplomado/index.php/version_cerrada/lista_academico_imprimir/?nombrev=<?= $nombre ?>"><span class="glyphicon glyphicon-download-alt"></span> Imprimir</a>
                    </div>
                </div>
                <hr>
                <div class="col-md-12" id="">
                    <div class="table-responsive ">
                        <table class="table table-hover" style="table-layout:; width:1050px">
                            <thead style="display: block;">
                                <th style="width:50px;word-break:break-word" class="active">No.</th>
                                <th style="width:100px;word-break:break-word" class="active">Ci</th>
                                <th style="width:230px;word-break:break-word" class="active">Nombre Completo</th>
                                <th style="width:120px;word-break:break-word" class="active">Ciudad</th>
                                <th style="width:80px;word-break:break-word" class="active">Telefono</th>
                                <th style="width:70px;word-break:break-word" class="active">Carpeta</th>
                                <th style="width:200px;word-break:break-word" class="active">Direccion</th>
                                <th style="width:200px;word-break:break-word" class="active">Descripcion</th>
                                <th style="width:50px;word-break:break-word" class="active"></th>
                            </thead>
                            <tbody style="display: block; height: 400px; overflow-y: auto; overflow-x: hidden; ">
                                <?php $i = 0;  ?>
                                <?php foreach ($academicoseleccionado as $fila) : ?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="width:100px; word-break:break-word"><small><?= $fila['ciA']; ?></small></td>
                                        <td style="width:230px; word-break:break-word"><small><?= $fila['nombreA']; ?></small></td>
                                        <td style="width:120px; word-break:break-word"><small><?= $fila['ciudadA']; ?></small></td>
                                        <td style="width:80px; word-break:break-word"><small><?= $fila['telefonoA']; ?></small></td>
                                        <td style="width:70px; word-break:break-word"><small><?= $fila['numFolioA']; ?></small></td>
                                        <td style="width:200px; word-break:break-word"><small><?= $fila['direccionA']; ?></small></td>
                                        <td style="width:200px; word-break:break-word"><small><?= $fila['descripcionA']; ?></small></td>
                                        <td style="width:50px; word-break:break-word"><a class="btn btn-primary btn-xs" href="<?= base_url('index.php/version_cerrada/academico_detalles_imprimir/' . $fila['ciA']); ?>"><span class="glyphicon glyphicon-print"></span></a></td>
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