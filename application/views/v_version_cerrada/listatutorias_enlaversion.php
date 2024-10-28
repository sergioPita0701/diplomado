<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Lista de Tutorias en la <?= $nombre ?></h3>
                <hr>
                <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        <a href="http://10.4.25.3:8080/diplomado/index.php/version_cerrada/lista_tutoria_imprimir/?nombrev=<?= $nombre ?>"><span class="glyphicon glyphicon-download-alt"></span> Imprimir</a>
                    </div>

                </div>
                <hr>

                <div class="col-md-12" id="">
                    <div class="table-responsive ">
                        <table class="table  table-hover table-bordered" style="table-layout:; width:1000px">
                            <thead class="">
                                <th class="active">
                                    <center>No.</center>
                                </th>
                                <th class="active">
                                    <center>Tutor</center>
                                </th>
                                <th class="active">
                                    <center>CI Tutor</center>
                                </th>
                                <th class="active">
                                    <center>Participante</center>
                                </th>
                                <th class="active">
                                    <center>Ci Participante</center>
                                </th>
                                <th class="active">
                                    <center>Titulo Monografia</center>
                                </th>
                                <th class="active">
                                    <center>Operaciones</center>
                                </th </thead>
                            <tbody>
                                <?php $i = 0;  ?>
                                <?php foreach ($tutomono as $fila) : ?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="width:200px; word-break:break-word"><small><?= $fila['nombreA']; ?></small></td>
                                        <td style="width:200px; word-break:break-word"><small><?= $fila['ciA']; ?></small></td>
                                        <td style="width:200px; word-break:break-word"><small><?= $fila['nombreD'] . " " . $fila['apellidoPaternoD'] . " " . $fila['apellidoMaternoD']; ?></small></td>
                                        <td style="width:100px; word-break:break-word"><small><?= $fila['ciD']; ?></small></td>
                                        <td style="width:300px; word-break:break-word"><small><?= $fila['tituloMonografia']; ?></small></td>
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