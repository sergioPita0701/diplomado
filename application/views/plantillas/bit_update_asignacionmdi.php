<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <h3> Bitacora de Acciones - <small>Actualizaciones de Calificacion</small></h3>

            </div>
            <div class="row">
                <div class="col-md-5 col-md-offset-6 " id="msjeditasigancion">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <center>
                        <p>
                            <span style="background-color: #DB7093;"><canvas style="width:18px;height:12px;border:1px black solid;"></canvas></span> Datos Anteriores
                            <span style="background-color: #FFC0CB;"><canvas style="width:18px;height:12px;border:1px black solid;"></canvas></span> Datos Modificados
                        </p>
                    </center>
                </div>
                <div class="col-md-4">
                    <form action="http://localhost:8080/diplomado/index.php/bitacora/getBit_actualizar_asignacioMDI" method="POST" role="form">
                        <div class="col-md-10 col-md-offset-2 form-inline">
                            <input class="form-control input-sm" type="date" id="fechaupdatecalif" name="fechaupdatecalif" size="25" autocomplete="on" value="">
                            <input type="submit" class="btn btn-primary btn-sm" value="Seleccionar">
                        </div>
                        <div class="col-md-2 col-md-offset-3">
                        </div>
                    </form>
                </div>
            </div></br>
            <div class="row">
                <div class="col-md-12 col-md-offset-">
                    <div class="table-responsive" id="">
                        <table class="table table-hover table-bordered" style="table-layout:; width:1050px" id="participantes">
                            <thead style="display: block;  "><!-- -->
                                <th style="width:50px;word-break:break-word " class="active"><small>#</small></th>
                                <th style="width:100px;word-break:break-word " class="active"><small>Tabla</small></th>
                                <th style="width:150px;word-break:break-word " class="active"><small>Diplomante</small></th>
                                <th style="width:80px;word-break:break-word " class="active"><small>CI</small></th>
                                <th style="width:50px;word-break:break-word " class="active"><small>Insc.</small></th>
                                <th style="width:100px;word-break:break-word " class="active"><small>Modulo</small></th>
                                <!-- <th class="width:50px; word-break:break-word active"><small>Anterior Paralelo</small></th>
                                <th class="width:50px; word-break:break-word active"><small>Nuevo Paralelo</small></th> -->
                                <th style="width:70px;word-break:break-word " class="active"><small>Nota Anterior</small></th>
                                <th style="width:100px;word-break:break-word" class=" active"><small>Establece Anterior</small></th>
                                <th style="width:60px;word-break:break-word" class=" active"><small>Nota Nueva</small></th>
                                <th style="width:100px;word-break:break-word" class=" active"><small>Establece Nueva</small></th>
                                <th style="width:90px;word-break:break-word" class=" active"><small>Usuario</small></th>
                                <th style="width:120px;word-break:break-word" class=" active"><small>Fecha Modificacion</small></th>
                            </thead>
                            <tbody style="display: block; height: 350px; overflow-y: auto; overflow-x: hidden; "><!--  -->
                                <?php $i = 0;  ?>
                                <?php foreach ($bitupdate_asignacionmdi as $fila) : ?>
                                    <tr class="form-group">
                                        <td style="width:50px; word-break:break-word"><strong><small><?= $i = $i + 1;  ?></small></strong></td>
                                        <td style="width:100px; word-break:break-word"><small>Calificaciones</td>
                                        <td style="width:150px; word-break:break-word"><small><?= $fila['nombreD'] . " " . $fila['apellidoPaternoD'] . " " . $fila['apellidoMaternoD']; ?></small></td>
                                        <td style="width:80px; word-break:break-word"><small><?= $fila['ciD']; ?></small></td>
                                        <td style="width:50px; word-break:break-word"><small><?= $fila['numeroI']; ?></small></td>
                                        <td style="width:100px; word-break:break-word"><small><?= $fila['nombreM']; ?></small></td>
                                        <!-- <td style="width:50px; word-break:break-word" ><small><?= $fila['anterior_paralelo']; ?></small></td> no puedo colocar los nombres de los paralelos corresp.
                                        <td style="width:50px; word-break:break-word" ><small><?= $fila['nuevo_paralelo']; ?></small></td> -->
                                        <td style="<?= ($fila['anterior_establecen'] == 'Reprobado') ? "background-color: #f08080;" : "background-color: #adff2f;"; ?>background-color: #DB7093; width:70px; word-break:break-word "><small><?= $fila['anterior_nota']; ?></small></td>
                                        <td style="background-color: #DB7093; width:100px; word-break:break-word"><small><?= $fila['anterior_establecen']; ?></small></td>
                                        <td style="<?= ($fila['nueva_establecen'] == 'Reprobado') ? "background-color: #f08080;" : "background-color: #adff2f;"; ?>background-color: #FFC0CB; width:60px; word-break:break-word "><small><?= $fila['nueva_nota']; ?></small></td>
                                        <td style="background-color: #FFC0CB; width:100px; word-break:break-word"><small><?= $fila['nueva_establecen']; ?></small></td>
                                        <td style="width:90px; word-break:break-word"><small><?= $fila['usuario']; ?></small></td>
                                        <td style="width:100px; word-break:break-word"><small><?= $fila['fecha_modif']; ?></small></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div></br>

        </div>
    </div>
</div>