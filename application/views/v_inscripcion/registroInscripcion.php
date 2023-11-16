<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header text-primary">
                <h4>INSCRIPCIONES - <small> Registro de Inscritos en la <?= $nombre ?></small></h4>
            </div>
            <form action="<?= base_url()?>index.php/inscripcion" method="post" class="form">
                <div class="row">
                    <div class="col-md-7 col-md-offset-1 form-inline">
                        <!-- <input class="form-control input-sm" type="text" id="" name="txtbuscarci" size="60" placeholder="Buscar por CI, Nombre, Profesion o Sexo">
                        <input class="btn btn-primary btn-md active" type="submit" id="" value="Buscar"> -->
                    </div>
                    <div class="col-md-3" >
                        <small><em>Total Inscritos: </em><p id="alert" class="alert alert-success"><?= $numeroInscritos."  Participantes Inscritos";?></p></small> 
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12 col-md-offset-">
                    <div class="table-responsive" id="">
                        <table class="table table-hover" style="table-layout:; width:1000px">
                            <thead style="display: block;">
                                <th style="width:50px;word-break:break-word " class="info">#</th>
                                <th style="width:100px;word-break:break-word " class="info">Registro</th>
                                <th style="width:200px;word-break:break-word " class="info">Nombre Completo</th>
                                <th style="width:100px;word-break:break-word " class="info">CI</th>
                                <th style="width:150px;word-break:break-word " class="info">Direccion</th>
                                <th style="width:100px;word-break:break-word " class="info">Celular</th>
                                <th style="width:200px;word-break:break-word " class="info">Profesion</th>
                                <th style="width:100px;word-break:break-word " class="info">Operacion</th>
                            </thead>
                            <tbody style="display: block; height: 370px; overflow-y: auto; overflow-x: hidden;">

                                <?php $i=0;  ?><!--contador de la lista-->
                               <?php foreach($inscripcion as $fila):?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i=$i+1;  ?></strong></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><?= $fila->numeroI;?></td>
                                        <td style="width:200px; word-break:break-word" id="tbcii"><a class="" href="<?= base_url('index.php/diplomante/detalleDiplomante_completo/'.$fila->ciD) ;?>"><?= $fila->nombreD ." ". $fila->apellidoPaternoD." ". $fila->apellidoMaternoD;?></a></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><small><?= $fila->ciD;?></small></td>
                                        <td style="width:150px; word-break:break-word" id="tbnumi"><small><?= $fila->direccionI;?></small></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><small><?= $fila->celularI;?></small></td>
                                        <td style="width:200px; word-break:break-word" id="tbnumi"><small><?= $fila->nombreP;?></small></td>
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