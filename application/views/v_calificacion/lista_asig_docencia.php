<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3><span id="nummodulo" hidden><?= $moduloseleccionado; ?></span><span><?= empty($calificacion) ? '' : $calificacion[0]['nombreM']; ?></span> - <span id="paralelo"><?= $paraleloseleccionado; ?></span><small> - Registro de Calificaciones</small></h3>
                    </div>
                    <div class="col-md-3 col-md-offset-3 ">
                        <h3 class="text text-info text-right"><?= date('d-m-Y') ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <!-- <?= empty($calificacion[0]['nombreM']) ? '<li class="list-group-item list-group-item-danger">No hay Modulo, ni Paralelo!!!</li>' : '<li class="list-group-item list-group-item-success"><strong>Modulo : </strong>' . $calificacion[0]["nombreM"] . '<strong> Paralelo : </strong> ' . $calificacion[0]["nombre_paralelo"] . '</li>'; ?> -->
                        <?= empty($calificacion[0]['nombreM']) ? '<li class="list-group-item list-group-item-danger">El Paralelo no tiene Docente ó nó hay Alumnos Registrados en el Paralelo, por lo tanto no se presentan calificaciones para este Paralelo!!!</li>' : '<li class="list-group-item list-group-item-success"><strong>Docente : </strong>' . $calificacion[0]["nombreA"] . '</li>'; ?>
                    </div></br>
                    <div class="row">
                        <div class="col-md-1 col-md-offset-">
                            <!-- <a type="button" class="btn btn-primary btn-sm " id="imprimir" ><span class="glyphicon glyphicon-print"></span></a> -->
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                            <span id="mostrarocultar" hidden><button class="form-control input-sm btn-danger " id="obtenernota">Registrar Nota</button></span>
                            <span hidden="hidden"><input class="form-control input-sm" type="date" id="fechanota" name="fechanota" size="25" autocomplete="on" value="<?= date('Y-m-d') ?>"><span>
                        </div>
                        <div class="">
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <form class="form-inline" method="post" enctype="multipart/form-data" action="http://10.4.25.3:8080/diplomado/index.php/cargarcalificacionpdf/subirNotas"><!--id="formSubirCalificacion"-->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <!-- <input type="text" name="titArchivo" id="titArchivo" class="form-control input-sm" placeholder="Titulo del Archivo" > -->
                                            <input type="file" name="filenotas" class="btn btn-default btn-xs active" id="filenotas" size="10">
                                            <input type="hidden" name="numMod" id="numMod" value="<?= $calificacion[0]['numeroM'] ?>">
                                            <input type="hidden" name="idparalelo" id="idparalelo" value="<?= $calificacion[0]['idParalelo'] ?>">
                                            <input type="hidden" name="nomParalelo" id="nomParalelo" value="<?= $calificacion[0]['nombre_paralelo'] ?>">
                                        </div>
                                        <div class="col-md-1 col-md-offset-8">
                                            <input type="submit" value="Cargar" class="btn btn-primary btn-sm ">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-exclamation-sign">
                                </span><small><small><strong> Al cargar el archivo, culminará la edicion/eliminación de calificaciones</strong>( Se mostrará otra ventana solo de lectura). Aseguresé la correcta inserción de Calificaciones Finales</small></small></div>
                        </div>
                    </div>

                    <div id=""></div>
                    <div><?= empty($errorArch) ? "" : $errorArch; ?></div>
                    <div><?= empty($estado) ? "" : $estado; ?></div>
                    <?php
                    if (!empty($pdfcalificaciones)) {
                    ?> <a href="<?= base_url(); ?>index.php/cargarcalificacionpdf/downloadpdf/<?= $pdfcalificaciones[0]['ruta']; ?>">Descargar <?= $pdfcalificaciones[0]['ruta']; ?></a>
                    <?php } ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-md-offset-6 " id="msjnota">
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-2 col-md-offset-7">
                    <span id="mostrarocultar" hidden><button class="form-control input-sm btn-danger " id="obtenernota" >Registrar Nota</button></span>
                </div>
                <div class="col-md-2 col-md-offset-" >
                    
                </div>
                
            </div><br> -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1" id="">
                    <div class="table-responsive">
                        <table class="table table-hover" style="table-layout:; width:1000px" id="tabla">
                            <thead style="display: block;">
                                <th style="width:50px;word-break:break-word" class="active">
                                    <center>#</center>
                                </th>
                                <th style="width:100px;word-break:break-word" class="active">
                                    <center>CI</center>
                                </th>
                                <th style="width:200px;word-break:break-word" class="active">
                                    <center>Nombre Completo</center>
                                </th>
                                <th style="width:100px;word-break:break-word" class="active">
                                    <center>Nota</br><label><input type="checkbox" id="checkednota"></label></center>
                                </th>
                                <th style="width:100px;word-break:break-word" class="active">
                                    <center>Establece</center>
                                </th>
                                <th class="active" style="display:none">
                                    <center>Fecha</center>
                                </th>
                                <th style="width:100px;word-break:break-word" class="active">
                                    <center>Modulo</center>
                                </th>
                                <th style="width:100px;word-break:break-word" class="active">
                                    <center>Paralelo</center>
                                </th>
                                <th style="width:150px;word-break:break-word" class="active">
                                    <center>Docente</center>
                                </th>
                                <th style="width:100px;word-break:break-word" class="active">Kardex</th>
                            </thead>
                            <tbody style="display: block; height: 300px; overflow-y: auto; overflow-x: hidden;">

                                <?php $i = 0;  ?><!--contador de la lista-->
                                <?php foreach ($calificacion as $fila) : ?>

                                    <tr>

                                        <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="width:100px; word-break:break-word"><small><?= $fila['ciD']; ?></small></td>
                                        <td style="width:200px; word-break:break-word"><a class="" href="<?= base_url('index.php/diplomante/detalleDiplomante_completo/' . $fila['ciD']); ?>"><?= $fila['nombreD'] . " " . $fila['apellidoPaternoD'] . " " . $fila['apellidoMaternoD']; ?></a></td>
                                        <td style="width:100px; word-break:break-word"><input type="number" class="form-control input-sm" readonly="readonly" id="nota" value=<?= $fila['nota']; ?>></td>
                                        <td style=" <?= ($fila['establece_nota'] == 'Reprobado') ? "background-color: #f08080;" : "background-color: #adff2f;"; ?>  width:100px; word-break:break-word"><?= $fila['establece_nota']; ?></td>
                                        <td style="display:none"><?= $fila['fecha_nota']; ?></td>
                                        <td style="width:100px; word-break:break-word"><small><?= $fila['nombreM']; ?></small></td>
                                        <td style="width:100px; word-break:break-word"><?= $fila['nombre_paralelo']; ?></td>
                                        <td style="width:150px; word-break:break-word"><small><?= $fila['nombreA']; ?></small></td>
                                        <!-- <td style="width:100px; word-break:break-word" id="tbnumi"><?= $fila['nota']; ?></td> -->

                                        <td style="width:100px; word-break:break-word">

                                            <b type="button" class="btn btn-success btn-group btn-xs" data-toggle="modal" data-target="#modalKardex">
                                                <span class="glyphicon glyphicon-file"></span> </b>
                                        </td>
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
<!-- MODAL KARDEX -->
<div class="modal fade bs-modalKardex-modal-lg" id="modalKardex" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <?php include_once('kardex.php'); ?>
</div>