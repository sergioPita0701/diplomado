<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <h3><span id="nummodulo" hidden><?= $moduloseleccionado ; ?></span><span><?= empty($calificacion)? '':$calificacion[0]['nombreM']  ; ?></span> - <span id="paralelo"><?= $paraleloseleccionado ; ?></span><small> - Registro de Calificaciones</small></h3>
                
            </div>
            <div class="row">
                <div class="col-md-5 col-md-offset-6 " id="msjnota">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?=  empty($calificacion[0]['nombreM']) ? '<li class="list-group-item list-group-item-danger">Modulo Deshabilitado!!!</li>' : '<li class="list-group-item list-group-item-success"><strong>Modulo : </strong>'.$calificacion[0]["nombreM"].'<strong> Paralelo : </strong> '.$calificacion[0]["nombre_paralelo"].'</li>' ;?>
                    <?=  empty($calificacion[0]['nombreM']) ? '<li class="list-group-item list-group-item-danger">El Paralelo no tiene Alumnos ó Docente, por lo tanto no se presentan calificaciones para este Paralelo!!!</li>' : '<li class="list-group-item list-group-item-success"><strong>Docente : </strong>'.$calificacion[0]["nombreA"].'</li>' ;?>
                    
                </div>
                <div class="col-md-2 col-md-offset-">
                    <a type="button" class="btn btn-primary btn-lg " href="<?= base_url() ;?>index.php/calificacion/imprimir_calificacion_paralelo/?modulo=<?= $moduloseleccionado;?>&paralelo=<?= $paraleloseleccionado;?>"><span class="glyphicon glyphicon-print"></span></a>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <?php
                        if (!empty($pdfcalificaciones)) {
                    ?>      <a href="<?= base_url() ;?>index.php/cargarcalificacionpdf/downloadpdf/<?= $pdfcalificaciones[0]['ruta'];?>">Descargar <?= $pdfcalificaciones[0]['nombreArchivo'];?></a>
                            <button onclick="eliminardowload(<?= $pdfcalificaciones[0]['idArchivo'];?>);" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                    <?php } ?>
                    
                    <div id="mnsjeliminopdf"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-7">
                    <span id="mostrarocultar" hidden><button class="form-control input-sm btn-danger " id="obtenernota" >Registrar Nota</button></span>
                </div>
                <div class="col-md-2 col-md-offset-" >
                    
                </div>
                
            </div><br>
            <div class="row">
                <div class="col-md-11 col-md-offset-1" id="">
                    <div class="table-responsive" >
                        <table class="table table-hover table-bordered" style="table-layout:; width:900px" id="tabla">
                            <thead style="display: block;">
                                <th style="width:50px;word-break:break-word" class="info"><center>#</center></th>
                                <th style="width:100px;word-break:break-word " class="info"><center>CI</center></th>
                                <th style="width:200px;word-break:break-word " class="info"><center>Nombre Completo</center></th>
                                <th style="width:150px;word-break:break-word " class="info"><center>Nota</br></center></th>
                                <th style="width:150px;word-break:break-word " class="info"><center>Establece</center></th>
                                <th style="width:150px;word-break:break-word " class="info"><center>Fecha</center></th>
                                <th style="width:100px;word-break:break-word " class="info"><center></center></th>
                            </thead>
                            <tbody style="display: block; height: 350px; overflow-y: auto; overflow-x: hidden;">
                                <?php $i=0;  ?><!--contador de la lista-->
                               <?php foreach($calificacion as $fila):?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i=$i+1;  ?></strong></td>
                                        <td style="width:100px; word-break:break-word" ><center><small><?= $fila['ciD'];?></small></center></td>
                                        <td style="width:200px; word-break:break-word" ><a class="" href="<?= base_url('index.php/diplomante/detalleDiplomante_completo/'.$fila['ciD']) ;?>"><?= $fila['nombreD'] ." ". $fila['apellidoPaternoD']." ". $fila['apellidoMaternoD'];?></a></td>
                                        <td style="width:150px; word-break:break-word" ><center><?= $fila['nota'];?></center></td>
                                        <td style=" <?=($fila['establece_nota']=='Reprobado')?"background-color: #f08080;":"background-color: #adff2f;"; ?>  width:150px; word-break:break-word"><?=  $fila['establece_nota'];?></td>
                                        <td style="width:150px; word-break:break-word" ><center><?= $fila['fecha_nota'];?></center></td>
                                        
                                        <td style="width:100px; word-break:break-word" >
                                            <!-- <center> -->
                                            
                                            <b class="btn btn-success btn-group btn-xs" data-toggle="modal" data-target="#modalKardex">
                                            <span class="glyphicon glyphicon-file"></span> </b>
                                            <!-- </center> -->
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
<!-- MODAL KARDEX -->
<div class="modal fade bs-modalKardex-modal-lg" id="modalKardex" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <?php include_once('kardex.php');?> 
</div>