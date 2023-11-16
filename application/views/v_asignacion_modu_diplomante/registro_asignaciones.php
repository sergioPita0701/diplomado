<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9">
                    <!-- <h3><center> Participantes Inscritos en la <?= $asignaciones[0]['nombreM']; ?></center></h3> -->
                    <h3> <span id="nummodulo" hidden><?= $moduloseleccionado ; ?></span><span><?= empty($asignaciones)? '':$asignaciones[0]['nombreM']  ; ?></span> - <span id=""><strong><?= $paraleloseleccionado ; ?></strong></span> - <small>Registro de Participantes</small></h3>
                    <!-- $(this).css("background-color", "#ECF8E0"); -->
                </div>
                <div class="col-md-3">
                    <h3 class="text text-right text-primary"><?= date('Y-m-d')?></h3>
                </div>
            </div><hr>
            <div class="row">
                <div class="col-md-7 col-md-offset-4" id="msjeditasigancion">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-3" >
                    <input class="form-control input-sm" type="hidden" id="fechacambparalelo" name="fechacambparalelo" size="25" autocomplete="on" value="<?= date('Y-m-d')?>">
                </div>
            </div></br>
            <div class="row">
                <div class="col-md-6">
                    <div id="selectMenosUno" class="col-md-4" hidden="hidden">
                        <select class="form-control input-sm " id="paraleloMenosUno" name="" >
                            <?php foreach($paralelomenosuno as $fila):?>
                                <option value="<?= $fila['idParalelo'];?>"><?= $fila['nombre_paralelo'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <span  id="cambiarPar" hidden="hidden"><button type="button" class="btn btn-danger btn-sm" id="cambiarparalelo"  >Cambiar Paralelo</button></span>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-12 col-md-offset-">
                    <div class="table-responsive" id="">
                        <table class="table table-hover" style="table-layout:; width:1000px" id="participantes">
                            <thead style="display: block;">
                                <th style="width:50px;word-break:break-word " class="success">#</th>
                                <th style="width:100px;word-break:break-word " class="success" ><small><center>Reprogramar</br><label><input type="checkbox" id="checkedreprogramar"></label></center></small></th>
                                <th style="width:100px;word-break:break-word " class="success">Registro</th>
                                <th style="width:250px;word-break:break-word " class="success">Nombre Completo</th>
                                <th style="width:100px;word-break:break-word " class="success">CI</th>
                                <th style="width:200px;word-break:break-word " class="success">Direccion</th>
                                <th style="width:100px;word-break:break-word " class="success">Celular</th>
                                <th style="width:100px;word-break:break-word " class="success">Operacion</th>
                            </thead>
                            <tbody style="display: block; height: 350px; overflow-y: auto; overflow-x: hidden;">
                                <?php $i=0;  ?>
                               <?php foreach($asignaciones as $fila):?>
                                    <tr class="form-group">
                                        
                                        <td style="width:50px; word-break:break-word"><strong><?= $i=$i+1;  ?></strong></td>
                                        <td style="width:100px; word-break:break-word"  id="marcador" ><label><input type="checkbox" id="reprogramar" hidden></label></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><?= $fila['numeroI'];?></td>
                                        <td style="width:250px; word-break:break-word" id="tbcii"><a class="" href="<?= base_url('index.php/diplomante/detalleDiplomante_completo/'.$fila['ciD']) ;?>"><?= $fila['nombreD'] ." ". $fila['apellidoPaternoD']." ". $fila['apellidoMaternoD'];?></a></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><?= $fila['ciD'];?></td>
                                        <td style="width:200px; word-break:break-word" id="tbnumi"><?= $fila['direccionI'];?></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><?= $fila['celularI'];?></td>
                                        <td style="width:100px; word-break:break-word" >
                                            <span <?= ($this->session->userdata('tipo')=='Secretario')? "":""?> >
                                                <a href="<?= base_url('index.php/modulodiplomante/eliminarModuloDiplomante/?asignacion='.$fila['idAsignacionMDI'].'&& modulo='.$fila['numeroM'].'&& inscripcion='.$fila['idInscripcion'].'&& paralelo='.$fila['nombre_paralelo']) ;?>" type="" class="btn btn-danger btn-group btn-xs" onclick="return confirm('Desea realmente eliminar al Participante del Paralelo ?');">
                                                <span class="glyphicon glyphicon-remove"></span> </a> 
                                            </span>
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