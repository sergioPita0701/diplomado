<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Lista de Docentes en la <?= $nombre ?></h3>
                <hr>
                <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        <a href="http://localhost:8080/diplomado/index.php/version_cerrada/lista_docencia_imprimir/?nombrev=<?= $nombre ?>"><span class="glyphicon glyphicon-download-alt"></span> Imprimir</a>
                    </div>

                </div>
                <hr>

                <div class="col-md-12" id="">
                    <div class="table-responsive ">
                        <table class="table  table-hover table-bordered" style="table-layout:; width:1000px">
                            <thead class="">
                                <th class="active">#</th>
                                <th class="active">Modulo</th>
                                <th class="active">Paralelo</th>
                                <th class="active">Nombre Completo</th>
                                <th class="active">Estado</th>
                                <th class="active">Desde</th>
                                <th class="active">Hasta</th>
                                <th class="active">Operacion</th>
                            </thead>
                            <tbody>
                                <?php $i = 0;  ?>
                                <?php foreach ($registroDocencias as $fila) : ?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="width:150px; word-break:break-word" id="tbcii"><small><?= $fila['nombreM']; ?></small></td>
                                        <td style="width:100px; word-break:break-word" id="tbcii"><small><?= $fila['nombre_paralelo']; ?></small></td>
                                        <td style="width:250px; word-break:break-word" id="tbcii"><small><?= $fila['nombreA']; ?></small></td>
                                        <td style="width:150px; word-break:break-word" id="tbnumi"><small><?= $fila['estadoDoc']; ?></small></td>
                                        <td style="width:150px; word-break:break-word" id="tbnumi"><small><?= $fila['fechaInicioDoc']; ?></small></td>
                                        <td style="width:150px; word-break:break-word" id="tbnumi"><small><?= $fila['fechaFinalDoc']; ?></small></td>
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