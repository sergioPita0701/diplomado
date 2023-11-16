<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <h3> Bitacora de Acciones - <small>Actualizaciones de Diplomantes Inscritos</small></h3>

            </div>
            <div class="row">
                <div class="col-md-5 col-md-offset-6 " id="msjeditasigancion">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <center>
                        <p>
                            <span style="background-color: #8FBC8B;"><canvas style="width:18px;height:12px;border:1px black solid;"></canvas></span> Datos Anteriores ...
                            <span style="background-color: #00FA9A;"><canvas style="width:18px;height:12px;border:1px black solid;"></canvas></span> Datos Modificados
                        </p>
                    </center>
                </div>
                <div class="col-md-4">
                    <form action="http://localhost:8080/diplomado/index.php/bitacora/getBit_actualizar_inscripcion" method="POST" role="form">
                        <div class="col-md-10 col-md-offset-2 form-inline">
                            <input class="form-control input-sm" type="date" id="fechaupdateinsc" name="fechaupdateinsc" size="25" autocomplete="on" value="">
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
                        <table class="table table-hover table-bordered" style="table-layout:; width:1610px" id="participantes">
                            <thead style="display: block;  ">
                                <th style="width:40px;word-break:break-word " class="active"><small>
                                        <center>#</center>
                                    </small></th>
                                <th style="width:90px;word-break:break-word " class="active"><small>
                                        <center>CI</center>
                                    </small></th>
                                <th style="width:130px;word-break:break-word " class="active"><small>
                                        <center>Diplomante</center>
                                    </small></th>
                                <th style="width:100px;word-break:break-word " class="active"><small>
                                        <center>Num. Insc.</center>
                                    </small></th>
                                <th style="width:60px;word-break:break-word " class="active"><small>
                                        <center>Sexo</center>
                                    </small></th>
                                <th style="width:140px;word-break:break-word " class="active"><small>
                                        <center>Pais</center>
                                    </small></th>
                                <th style="width:140px;word-break:break-word " class="active"><small>
                                        <center>Departamento</center>
                                    </small></th>
                                <th style="width:140px;word-break:break-word " class="active"><small>
                                        <center>Fecha Nac.</center>
                                    </small></th>
                                <th style="width:140px;word-break:break-word " class="active"><small>
                                        <center>Estado Civil</center>
                                    </small></th>
                                <th style="width:140px;word-break:break-word " class="active"><small>
                                        <center>Direcc.</center>
                                    </small></th>
                                <th style="width:120px;word-break:break-word " class="active"><small>
                                        <center>Telef.</center>
                                    </small></th>
                                <th style="width:140px;word-break:break-word " class="active"><small>
                                        <center>E-mail</center>
                                    </small></th>
                                <th style="width:100px;word-break:break-word " class="active"><small>
                                        <center>Usuario</center>
                                    </small></th>
                                <th style="width:130px;word-break:break-word " class="active"><small>
                                        <center>Fecha Modificacion</center>
                                    </small></th>
                            </thead>
                            <tbody style="display: block; height: 330px; overflow-y: auto; overflow-x: hidden; ">
                                <?php $i = 0;  ?>
                                <?php foreach ($bitupdate_inscripcion as $fila) : ?>
                                    <tr class="form-group">
                                        <td style="width:40px; word-break:break-word"><strong><small><?= $i = $i + 1;  ?></small></strong></td>
                                        <td style="width:90px; word-break:break-word"><small><?= $fila['ciD']; ?></small></td>
                                        <td style="width:130px; word-break:break-word"><small><?= $fila['nombreD'] . " " . $fila['apellidoPaternoD'] . " " . $fila['apellidoMaternoD']; ?></small></td>
                                        <td style="background-color: #8FBC8B; width:50px; word-break:break-word "><small><?= $fila['ant_numI']; ?></small></td>
                                        <td style="background-color: #00FA9A; width:50px; word-break:break-word "><small><?= $fila['nuev_numI']; ?></small></td>
                                        <td style="background-color: #8FBC8B; width:30px; word-break:break-word"><small><?= ($fila['ant_sexo'] == 'Masculino') ? 'M' : 'F'; ?></small></td>
                                        <td style="background-color: #00FA9A; width:30px; word-break:break-word"><small><?= ($fila['nuev_sexo'] == 'Masculino') ? 'M' : 'F'; ?></small></td>
                                        <td style="background-color: #8FBC8B; width:70px; word-break:break-word "><small><?= $fila['ant_pais']; ?></small></td>
                                        <td style="background-color: #00FA9A; width:70px; word-break:break-word "><small><?= $fila['nuev_pais']; ?></small></td>
                                        <td style="background-color: #8FBC8B; width:70px; word-break:break-word"><small><?= $fila['ant_departamento']; ?></small></td>
                                        <td style="background-color: #00FA9A; width:70px; word-break:break-word"><small><?= $fila['nuev_departamento']; ?></small></td>
                                        <td style="background-color: #8FBC8B; width:70px; word-break:break-word "><small><?= $fila['ant_fechanac']; ?></small></td>
                                        <td style="background-color: #00FA9A; width:70px; word-break:break-word "><small><?= $fila['nuev_fechanac']; ?></small></td>
                                        <td style="background-color: #8FBC8B; width:70px; word-break:break-word"><small><?= $fila['ant_estadocivil']; ?></small></td>
                                        <td style="background-color: #00FA9A; width:70px; word-break:break-word"><small><?= $fila['nuev_estadocivil']; ?></small></td>
                                        <td style="background-color: #8FBC8B; width:70px; word-break:break-word "><small><?= $fila['ant_direccion']; ?></small></td>
                                        <td style="background-color: #00FA9A; width:70px; word-break:break-word "><small><?= $fila['nuev_direccion']; ?></small></td>
                                        <td style="background-color: #8FBC8B; width:60px; word-break:break-word"><small><?= $fila['ant_telefono']; ?></small></td>
                                        <td style="background-color: #00FA9A; width:60px; word-break:break-word"><small><?= $fila['nuev_telefono']; ?></small></td>
                                        <td style="background-color: #8FBC8B; width:70px; word-break:break-word "><small><?= $fila['ant_email']; ?></small></td>
                                        <td style="background-color: #00FA9A; width:70px; word-break:break-word "><small><?= $fila['nuev_email']; ?></small></td>
                                        <td style="width:100px; word-break:break-word"><small><?= $fila['usuario']; ?></small></td>
                                        <td style="width:130px; word-break:break-word"><small><?= $fila['fecha_modI']; ?></small></td>
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