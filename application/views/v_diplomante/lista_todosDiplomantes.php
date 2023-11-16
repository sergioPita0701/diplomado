<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <h3>Registro de Inscritos en la <?= $nombre ?></h3>
            </div>
            <form action="<?= base_url()?>index.php/diplomante" method="post" class="form">
                <div class="row">
                    <div class="col-md-8 col-md-offset-1 form-inline">
                        <input class="form-control input-sm" type="text" id="" name="txtbuscar" size="30" placeholder="Buscar por CI">
                        <input class="btn btn-primary btn-sm active" type="submit" id="" value="Buscar">
                    </div>
                    <div class="col-md-3" >
                        <small><p id="alert" class="alert alert-success"><?= "<strong>Total Inscritos:</strong>". $numinscritos."  Diplomantes";?></p></small> 
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12 col-md-offset-">
                    <div class="table-responsive" id="">
                        <table class="table table-hover" style="table-layout:; width:1100px">
                            <thead>
                                <th class="active">#</th>
                                <th class="active">CI</th>
                                <th class="active">Nombre Completo</th>
                                <th class="active">Ciudad</th>
                                <th class="active">Profesion</th>
                                <th class="active">Operacion</th>
                            </thead>
                            <tbody>

                                <?php $i=0;  ?><!--contador de la lista-->
                               <?php foreach($diplomante as $fila):?>
                                    <tr>
                                        <td style="width:30px; word-break:break-word"><strong><?= $i=$i+1;  ?></strong></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><small><?= $fila['ciD'];?></small></td>
                                        <td style="width:300px; word-break:break-word" id="tbcii"><small><?= $fila['nombreD'] ." ". $fila['apellidoPaternoD']." ". $fila['apellidoMaternoD'];?></small></td>
                                        <td style="width:150px; word-break:break-word" id="tbnumi"><small><?= $fila['ciudadD'];?></small></td>
                                        <td style="width:200px; word-break:break-word" id="tbnumi"><small><?= $fila['nombreP'];?></small></td>
                                        <td style="width:100px; word-break:break-word" >
                                            <a  href="<?= base_url('index.php/inscripcion/detalleDiplomante_inscrito/'.$fila['ciD']) ;?>" class="btn btn-success btn-group btn-xs" >
                                            <span class="glyphicon glyphicon-cog"></span>
                                            </a>

                                            <a href="<?= base_url('index.php/inscripcion/detalleDiplomante_inscrito/'.$fila['ciD']) ;?>" type="" class="btn btn-danger btn-group btn-xs" onclick="return confirm('Desea realmente eliminar Modulo?');">
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