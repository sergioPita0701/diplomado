<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Lista de Defensas de Monografia en la <?= $nombre ?></h3>
                <hr>
                <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        <a href="http://localhost:8080/diplomado/index.php/version_cerrada/lista_mono_imprimir/?nombrev=<?= $nombre ?>"><span class="glyphicon glyphicon-download-alt"></span> Imprimir</a>
                    </div>

                </div>
                <hr>

                <div class="col-md-12" id="">
                    <div class="table-responsive ">
                        <table class="table  table-hover table-bordered" style="table-layout:; width:1000px">
                            <thead class="">
                                <th class="active">#</th>
                                <th class="active">CI</th>
                                <th class="active">Nombre</th>
                                <th class="active">Titulo</th>
                                <th class="active">Fecha Inicio</th>
                                <th class="active">Fecha Final</th>
                                <th class="active">Objetivos</th>
                            </thead>
                            <tbody>
                                <?php $i = 0;  ?>
                                <?php foreach ($listamonos as $fila) : ?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['ciD']; ?></td>
                                        <td style="width:150px; word-break:break-word"><?= $fila['nombreD'] . ' ' . $fila['apellidoPaternoD'] . ' ' . $fila['apellidoMaternoD']; ?></td>
                                        <td style="width:100px; word-break:break-word"><?= $fila['tituloMonografia']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['fecha_inicioMo']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['fecha_finalMo']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['descripcionMo']; ?></td>
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