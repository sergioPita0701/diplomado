<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <!-- <h3><center> Registro de Inscritos en la <?= $nombre ?></center></h3> -->
                <h3>Registro de Inscritos en la <?= $nombre ?></h3>
            </div><br>
            <form action="<?= base_url()?>index.php/inscripcion" method="post" class="form">
                <div class="row">
                    <div class="col-md-8 col-md-offset-1 form-inline">
                        <input class="form-control input-sm" type="text" id="" name="txtbuscarci" size="60" placeholder="Buscar por CI, Nombre, Profesion o Sexo">
                        <input class="btn btn-primary btn-md active" type="submit" id="" value="Buscar">
                        <!--<input class="btn btn-default btn-md active" type="button" id="btnactualizari" onclick="actualizarI()" value="Actualizar">-->
                    </div>
                    <!-- <div class="col-md-2" >
                        Total Inscritos: <small><p id="alert" class="alert alert-success"><?= $numeroInscritos."  Participantes Inscritos";?></p></small> 
                    </div> -->
                </div>
            </form><br>
            <div class="row">
                <div class="col-md-12 col-md-offset-">
                    <div class="table-responsive" id="">
                        <table class="table table-hover" style="table-layout:; width:1100px">
                            <thead>
                                <th class="active">#</th>
                                <th class="active">Nombre Completo</th>
                                <th class="active">CI</th>
                                <th class="active">Modulo</th>
                                <th class="active">Docente</th>
                                <th class="active">Nota</th>
                                <th class="active">Fecha</th>
                                <th class="active">Operacion</th>
                            </thead>
                            <tbody>

                                <?php $i=0;  ?><!--contador de la lista-->
                               <?php foreach($noprogramados as $fila):?>
                                    <tr>
                                        <td style="width:30px; word-break:break-word"><strong><?= $i=$i+1;  ?></strong></td>
                                        <td style="width:300px; word-break:break-word" id="tbcii"><a class="" href="<?= base_url('index.php/diplomante/detalleDiplomante_completo/'.$fila['ciD']) ;?>"><?= $fila['nombreD'] ." ". $fila['apellidoPaternoD']." ". $fila['apellidoMaternoD'];?></a></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><?= $fila['ciD'];?></td>
                                        <td style="width:150px; word-break:break-word" id="tbnumi"><?= $fila['nombreM'];?></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><?= $fila['nombre_paralelo'];?></td>
                                        <td style="width:200px; word-break:break-word" id="tbnumi"><?= $fila['nombreA'];?></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><?= $fila['numeroI'];?></td>
                                        <td style="width:100px; word-break:break-word" >
                                            <a  href="<?= base_url('index.php/inscripcion/detalleDiplomante_inscrito/'.$fila->ciD) ;?>" class="btn btn-success btn-group btn-xs" >
                                            <span class="glyphicon glyphicon-cog"></span>
                                            </a>

                                            <a href="<?= base_url('index.php/inscripcion/detalleDiplomante_inscrito/'.$fila->ciD) ;?>" type="" class="btn btn-danger btn-group btn-xs" onclick="return confirm('Desea realmente eliminar Modulo?');">
                                            <span class="glyphicon glyphicon-remove"></span></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>