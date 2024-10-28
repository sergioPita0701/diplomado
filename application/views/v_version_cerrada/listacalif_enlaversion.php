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
                                <!-- <th class="active">Modulo</th>
                        <th class="active">Paralelo</th> -->
                                <th class="active">Aprobados</th>
                                <th class="active">Reprobados</th>
                                <th class="active">Aprob(%)</th>
                                <th class="active">Reprob(%)</th>
                            </thead>
                            <tbody>
                                <?php $i = 0;  ?>
                                <?php foreach ($listacalif as $fila) : ?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <!-- <td style="width:150px; word-break:break-word"><small><?= $fila['calif']['nombreM']; ?></small></td>
                            <td style="width:100px; word-break:break-word"><small><?= $fila['calif']['nombre_paralelo']; ?></small></td> -->
                                        <td style="width:150px; word-break:break-word"><small><?= $fila['aprobados']; ?></small></td>
                                        <td style="width:150px; word-break:break-word"><small><?= $fila['reprobados']; ?></small></td>
                                        <td style="width:150px; word-break:break-word"><small><?= $fila['aprobados']; ?></small></td>
                                        <td style="width:150px; word-break:break-word"><small><?= $fila['reprobados']; ?></small></td>
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