<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Lista de Inscritos en la <?= $nombre ?></h3>
                <hr>
                <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        <a href="http://localhost:80/diplomado/index.php/version_cerrada/lista_inscritos_imprimir/?nombrev=<?= $nombre ?>"><span class="glyphicon glyphicon-download-alt"></span> Imprimir</a>
                    </div>

                </div>
                <hr>

                <div class="col-md-12" id="">
                    <div class="table-responsive ">
                        <table class="table  table-hover table-bordered" style="table-layout:; width:1000px">
                            <thead class="">
                                <th class="active">#</th>
                                <th class="active">CI</th>
                                <th class="active">Nombres</th>
                                <th class="active">Apellidos</th>
                                <th class="active">Profesion</th>
                                <th class="active">Ciudad</th>
                                <th class="active">Direccion</th>
                                <th class="active">Telefono</th>
                                <th class="active">E-mail</th>
                            </thead>
                            <tbody>
                                <?php $i = 0;  ?>
                                <?php foreach ($listainscritos as $fila) : ?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="width:150px; word-break:break-word"><small><?= $fila->ciD; ?></small></td>
                                        <td style="width:100px; word-break:break-word"><small><?= $fila->nombreD; ?></small></td>
                                        <td style="width:250px; word-break:break-word"><small><?= $fila->apellidoPaternoD . ' ' . $fila->apellidoMaternoD; ?></small></td>
                                        <td style="width:150px; word-break:break-word"><small><?= $fila->nombreP; ?></small></td>
                                        <td style="width:150px; word-break:break-word"><small><?= $fila->departamentonacI; ?></small></td>
                                        <td style="width:150px; word-break:break-word"><small><?= $fila->direccionI; ?></small></td>
                                        <td style="width:150px; word-break:break-word"><small><?= $fila->telefonoI; ?></small></td>
                                        <td style="width:150px; word-break:break-word"><small><?= $fila->emailI; ?></small></td>
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