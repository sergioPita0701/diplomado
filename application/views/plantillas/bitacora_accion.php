<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <h3> Bitacora de Acciones - <small>Usuarios</small></h3>

            </div>
            <div class="row">
                <div class="col-md-5 col-md-offset-6 " id="msjeditasigancion">
                </div>
            </div>
            <div class="row">
                <form action="http://localhost:8080/diplomado/index.php/bitacora/getBitacora" method="POST" role="form">
                    <div class="col-md-4 col-md-offset-8 form-inline">
                        <input class="form-control input-sm" type="date" id="fechabitacoracc" name="fechabitacoracc" size="25" autocomplete="on" value="">
                        <input type="submit" class="btn btn-primary btn-sm" value="Seleccionar">
                    </div>
                    <div class="col-md-2 col-md-offset-3">
                    </div>
                    <!-- <div class="col-md-3 col-md-offset-">
                        <a href="http://">Ver Todos</a>
                    </div> -->
                </form>
            </div></br>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="table-responsive" id="">
                        <table class="table table-hover" style="table-layout:; width:750px" id="participantes">
                            <thead style="display: block;">
                                <th style="width:50px;word-break:break-word " class="info">
                                    <center>#</center>
                                </th>
                                <th style="width:150px;word-break:break-word " class="info">
                                    <center>Host</center>
                                </th>
                                <!--style="width:50px;word-break:break-word "  <th class="info">Usuario</th> -->
                                <th style="width:150px;word-break:break-word " class="info">
                                    <center>Tabla</center>
                                </th>
                                <th style="width:200px;word-break:break-word " class="info">
                                    <center>Accion</center>
                                </th>
                                <th style="width:200px;word-break:break-word " class="info">
                                    <center>Fecha</center>
                                </th>
                            </thead>
                            <tbody style="display: block; height: 380px; overflow-y: auto; overflow-x: hidden; ">

                                <?php $i = 0;  ?><!--contador de la lista-->
                                <?php foreach ($bitacora_acciones as $fila) : ?>
                                    <tr class="form-group">
                                        <td style="width:50px; word-break:break-word"><strong>
                                                <center><?= $i = $i + 1;  ?></center>
                                            </strong></td>
                                        <td style="width:150px; word-break:break-word" id="tbnumi">
                                            <center><?= $fila['ip']; ?></center>
                                        </td>
                                        <!-- <td style="width:300px; word-break:break-word" id="tbcii"><?= $fila['usuario']; ?></td> -->
                                        <td style="width:200px; word-break:break-word" id="tbnumi">
                                            <center><?= $fila['nombreTabla']; ?></center>
                                        </td>
                                        <td style="width:200px; word-break:break-word" id="tbnumi"><?= $fila['operacion']; ?></td>
                                        <td style="width:200px; word-break:break-word" id="tbnumi"><?= $fila['fecha']; ?></td>
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