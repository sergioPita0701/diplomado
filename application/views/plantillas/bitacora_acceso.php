<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <h3> Bitacora de Acceso al Sistema - <small>Usuarios</small></h3>

            </div>
            <div class="row">
                <div class="col-md-5 col-md-offset-6 " id="msjeditasigancion">
                </div>
            </div>
            <div class="row">
                <form action="http://localhost:8080/diplomado/index.php/bitacora/getBitacora_acceso" method="POST" role="form">
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
                <div class="col-md-12 col-md-offset-">
                    <div class="table-responsive" id="">
                        <table class="table table-hover" style="table-layout:; width:1030px" id="">
                            <thead style="display: block;">
                                <th style="width:50px;word-break:break-word " class="success">
                                    <center>#</center>
                                </th>
                                <th style="width:120px;word-break:break-word " class="success">
                                    <center>CI</center>
                                </th>
                                <th style="width:100px;word-break:break-word " class="success">
                                    <center>Login</center>
                                </th>
                                <th style="width:200px;word-break:break-word " class="success">
                                    <center>Cargo</center>
                                </th>
                                <th style="width:150px;word-break:break-word " class="success">
                                    <center>Fecha Entrada</center>
                                </th>
                                <th style="width:100px;word-break:break-word " class="success">
                                    <center>Hr. Entrada</center>
                                </th>
                                <th style="width:150px;word-break:break-word " class="success">
                                    <center>Fecha Salida</center>
                                </th>
                                <th style="width:100px;word-break:break-word " class="success">
                                    <center>Hr. Salida</center>
                                </th>
                                <th style="width:150px;word-break:break-word " class="success">
                                    <center>Estado</center>
                                </th>
                                <!-- <th class="active">Accion</th> -->
                            </thead>
                            <tbody style="display: block; height: 380px; overflow-y: auto; overflow-x: hidden; ">

                                <?php $i = 0;  ?><!--contador de la lista-->
                                <?php foreach ($bitacora_acceso as $fila) : ?>
                                    <tr class="form-group">
                                        <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="width:120px; word-break:break-word" id="tbnumi"><?= $fila['ciU']; ?></td>
                                        <td style="width:100px; word-break:break-word" id="tbcii"><?= $fila['loginU']; ?></td>
                                        <td style="width:200px; word-break:break-word" id="tbnumi"><?= $fila['cargoU']; ?></td>
                                        <td style="width:150px; word-break:break-word" id="tbnumi"><?= $fila['fecha_entrada']; ?></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><?= $fila['hora_entrada']; ?></td>
                                        <td style="width:150px; word-break:break-word" id="tbnumi"><?= $fila['fecha_salida']; ?></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><?= $fila['hora_salida']; ?></td>
                                        <td style="<?= ($fila['estado'] == 1) ? "background-color: #adff2f;" : "background-color: #f08080;"; ?> width:150px; word-break:break-word" id="tbnumi"><?= $fila['estado'] == 1 ? 'En Linea' : 'Finalizo Session'; ?></td>
                                        <!-- <td style="width:50px; word-break:break-word" >
                                            <a href="<?= base_url('index.php/bitacora/cierra_sesion_usuario/' . $fila['idAccesoU_bitacora']); ?>" style="<?= ($fila['estado'] == '1') ? "background-color: #7cfc00;" : "background-color: #ff0000;"; ?>" id="" class="btn btn-group btn-xs <?= ($this->session->userdata('tipo') == 'Secretario') ? 'disabled' : '' ?>" 
                                                name="estadov"  ><?= ($fila['estado'] == '1') ? "Deshabilitar" : "Habilitar"; ?></a>
                                        </td> -->
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