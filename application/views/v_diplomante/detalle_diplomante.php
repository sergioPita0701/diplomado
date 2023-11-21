<div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-2 main">  
    <div class="panel panel-default">
        <div class="panel-body" id="bodyDetalleDiplo">
            <div class="row">
                <div class="row">
                    <div class="col-md-12 text text-primary" >
                        <h4 ><center>Información de Alumno - <?= $nombre?></center></h4>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col-md-2 col-md-offset-1" >
                        <small><label for="">No. Inscripcion:</label></small> <span class="label label-default"><?= $retVal = empty($diplomanteinscrito[0]->numeroI) ? "" :$diplomanteinscrito[0]->numeroI  ;?></span>
                    </div>
                    <div class="col-md-2 col-md-offset-" >
                        <small><label for="">CI:</label></small> <h4><span id="cidiplo" class="label label-danger"><?=empty($diplomanteinscrito[0]->ciD) ? "" : $diplomanteinscrito[0]->ciD;?></span></h4>
                    </div>
                    <div class=" col-md-4 col-md-offset-">
                        <small><label for="">Nombre Completo:</label></small><h4><span class="label label-danger"> <?= empty($diplomanteinscrito[0]->nombreD) ? "" : $diplomanteinscrito[0]->nombreD."  ".$diplomanteinscrito[0]->apellidoPaternoD."  ".$diplomanteinscrito[0]->apellidoMaternoD;?></span></h4>
                    </div>
                    <div class=" col-md-3 col-md-offset-">
                        <small><label for="">Fecha de Inscripción:</label></small> <span class="label label-default"><?= empty($diplomanteinscrito[0]->fechaInscripcionI) ? "" : $diplomanteinscrito[0]->fechaInscripcionI ;?></span>
                    </div>
                </div>
                <!-- <hr> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row col-md-12">
                            <button type="button" id="ocultar" onClick="ocultardetalle();" class="close" data-dismiss="" ><span class="glyphicon glyphicon-menu-up btn-xs"></span></button>
                            <button type="button" id="mostrar" onClick="mostrardetalle();" class="close" data-dismiss="" hidden="hidden"><span class="glyphicon glyphicon-menu-down btn-xs" ></span></button>
                        </div>
                        <div class="row" id="detalle2" >
                            <div class="col-md-4 col-md-offset-1" >
                            <div class="form-group  ">
                                <small><label for="">Ciudad Actual:</label> <?= $diplomanteinscrito[0]->ciudadD;?></small></br>
                                <small><label for="">Direccion:</label> <?= $diplomanteinscrito[0]->direccionI;?></small>

                            </div>
                            </div>
                            <div class="form-group col-md-4">
                                <small><label for="">E-mail:</label> <?= $diplomanteinscrito[0]->emailI;?></small></br>
                                <small><label for="">Telefono:</label> <?= $diplomanteinscrito[0]->telefonoI;?></small>
                            </div>
                            <div class="col-md-3">
                                <small><label for="">Sexo:</label> <?= $diplomanteinscrito[0]->sexoI;?></small></br>
                                <small><label for="">Celular:</label> <?= $diplomanteinscrito[0]->celularI;?></small>
                            </div>
                        </div>
                        <div class="row" id="detalle3" >
                            <div class="col-md-4 col-md-offset-1" >
                            <div class="form-group  ">
                                <small><label for="">Pais de Nac.:</label> <?= $diplomanteinscrito[0]->paisnacI;?></small></br>
                                <small><label for="">Fecha de Nac.:</label> <?= $diplomanteinscrito[0]->fechanacI;?></small>
                            </div>
                            </div>
                            <div class="form-group col-md-7">
                                <small><label for="">Departamento de Nac.:</label> <?= $diplomanteinscrito[0]->departamentonacI;?></small></br>
                                <small><label for="">Estado Civil:</label> <?= $diplomanteinscrito[0]->estadoCivilI;?></small></br>
                            </div>

                        </div>

                    </div>   
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <center><h5 class="text-primary"><em>Estado Academico</em></h5></center>
                    <div class="table-responsive ">
                        <table class="table  table-striped ">
                            <thead class="" >
                                <th class="active"><small>#</small></th>
                                <th class="active"><small>Inscripcion</small></th>
                                <th class="active"><small>Version</small></th>
                                <th class="active"><small>Módulo</small></th>
                                <th class="active"><small>Calificación</small></th>
                                <th class="active"><small>Establece</small></th>
                                <th class="active"><small>F.Asignacion</small></th>
                            </thead>
                            <tbody>
                                <?php $i=0;  ?>
                                <?php foreach($moduloDiplomante as $fila):?>
                                <tr>
                                    <td><strong><?= $i=$i+1;  ?></strong></td>
                                    <td><small><?=$fila->numeroI; ?></small></td>
                                    <td style="<?= ($fila->estadoV==0)? "background-color: #f08080;":"background-color: #adff2f;"; ?>"><strong><small><?=$fila->nombreV; ?></small></strong></td>
                                    <td><small><?=$fila->nombreM; ?></small></td>
                                    <td><small><strong><?=($fila->nota==null && $fila->estadoV==0)? "Abandono":$fila->nota; ?></strong></small></td>
                                    <td style="<?= ($fila->establece_nota=="Bueno" || $fila->establece_nota=="Aprobado" || $fila->establece_nota=="Muy Bueno" ||($fila->vigenteMo==1 && $fila->estadoV==1))? "background-color: #add8e6;":"background-color: #cd5c5c;"; ?>"><small><?=($fila->vigenteMo==1 && $fila->estadoV==1)? "<strong>En Curso </strong>":$fila->establece_nota; ?></small></td>
                                    <td><small><?=$fila->fecha_nota; ?></small></td>
                                    <!-- <td style="<?= ($fila->estadoV==0)? "background-color: #f08080;":"background-color: #adff2f;"; ?>"><small><?=($fila->estadoV==0)? "V. Terminada":"V. en Curso" ; ?></small></td> -->
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>

                </div>
                
            </div>
            
        </div>
        <div class="row" id="irasignarodulo" >
            <div class="col-md-3 col-md-offset-1 form-inline">
                <button  class="btn btn-primary btn-group btn-sm" id="imprimirDetalleDiplo">
                    <span class="glyphicon glyphicon-print"></span> Imprimir
                </button>   
            </div>
            <span <?= ($this->session->userdata('tipo')=='Administrador')? "hidden":""?>>
            <div class="col-md-2 col-md-offset-4 form-inline">
               <a href="<?= base_url('index.php/modulodiplomante/incripcion_diplomate_modulo/?inscripcion='.$diplomanteinscrito[0]->numeroI.'&ciD='.$diplomanteinscrito[0]->ciD) ;?>">Añadir Modulo</a>    
            </div>
            </span>
            <!-- <div class="col-md-2 form-inline">
               <a href="<?= $_SERVER['HTTP_REFERER'] ;?>">Volver</a>    
            </div> -->
        </div></br></br>
    </div>
</div>
<div class="col-md-2 main">  
        <div class="panel-body" id="">
            <div class="row"><!--  <?= ($this->session->userdata('tipo')=='Secretario')? "":"hidden"?> -->
                <div class="row">
                    <div class=" header">
                        <center><h4 class="text text-primary">Operaciones</h4></center>
                    </div>
                </div>
                <hr>
                <div class="row" >
                    
                    <span id="btnAsignarModulo" hidden="hidden"><small><button class="btn btn-primary btn-sm active" onclick="AsignarModulo();" class="button"  data-backdrop="static" data-keyboard="false" ><!--  hidden="hidden" -->
                    Asignar Modulo/Monografia</button> </small></span><br><br>
                    <!-- <small><a for=""> opciones que le faltan al estudiante, colocar segun su estado academico, (calculo de notras y eso hacer una funcion que calc en que estado se encuentra y d acuerdo a eso que presente sus 
                    sus opciones a realizar):</a> </small> -->
                    <span id="btnAsignarMono" hidden="hidden" ><small><button class="btn btn-primary btn-sm "  onclick="AsignarMonografia();" class="button"  data-backdrop="static" data-keyboard="false" ><!-- AsignarModulo -->
                    Asignar Modulo/Monografia</button> </small></span><br>
                </div>

            </div>
            
        </div>
</div>

<!-- MODALES Inscripcion de modulos-->
<div class="modal fade bs-modalOpcionesSA-modal-lg" id="modalOpcionesSA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form method="post" id="formasigmodulo">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Seguimiento Academico <small><?= $diplomanteinscrito[0]->nombreD;?> <?= $diplomanteinscrito[0]->apellidoPaternoD;?> <?= $diplomanteinscrito[0]->apellidoMaternoD;?> <strong>CI :</strong><span id="ciDiplomante"><?= $diplomanteinscrito[0]->ciD;?></span> <strong>Inscripcion :</strong><span id="numInscripcion"><?= $diplomanteinscrito[0]->numeroI;?></span> </small></h4>
            </div>
            <div class="modal-body" id="">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-10" id="modulotoca">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 col-md-offset-7">
                                <input type="date" class="form-control input-sm " id="fechaAsignacion" name="fechaAsignacion" value="<?= date('Y-m-d');?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <small>MODULO :</small></br>
                                <input type="hidden" class="form-control input-sm" name="modulosele" id="modulosele" cols="30" rows="10" >
                                <input type="text" class="form-control input-sm" name="modulocorresponde" id="modulocorresponde" cols="30" rows="10" readonly >
                            </div>
                            <div class="col-md-4">
                                <small>Paralelos :</small></br>
                                <select type="text" class="form-control input-sm" id="paralelosele" name="paralelosele" >
                                </select>
                            </div>
                        </div><br>
                        <div id="mensaje"></div>
                    </div>  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-success btn-sm" value="Inscribir al Modulo">           
            </div>  
        </form> 
    </div>
</div>
</div>

<!-- MODALES Inscripcion de Monografia-->
<div class="modal fade bs-modalOpcionesMono-modal-lg" id="modalOpcionesMono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form method="post" id="formMonografia">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Seguimiento Academico - Monografia <small><?= $diplomanteinscrito[0]->nombreD;?> <?= $diplomanteinscrito[0]->apellidoPaternoD;?> <?= $diplomanteinscrito[0]->apellidoMaternoD;?> <strong>CI :</strong><span id="pciDiplo"><?= $diplomanteinscrito[0]->ciD;?></span> <strong>Inscripcion :</strong><span id="numInscripcion"><?= $diplomanteinscrito[0]->numeroI;?></span> </small></h4>
            </div>
            <div class="modal-body" id="">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="form-group form-sm">
                            <!-- $diplomante[0]['nombreD']?> -->
                                <div class="col-md-5 col-md-offset-3">
                                    <input type="hidden" name="txtcidiplomante" id="diplo" class="form-control input-sm" value="<?= empty($diplomanteinscrito[0]->ciD) ? '' : $diplomanteinscrito[0]->ciD;?>" readonly>
                                    <input type="hidden" name="txtprofesiondiplomante" id="prof" class="form-control input-sm" value="" readonly>
                                </div>
                                <div class="col-md-4">
                                    <input type="hidden" name="txtnombrediplomante" class="form-control input-sm" value="<?= empty($diplomanteinscrito[0]->nombreD) ? '' : $diplomanteinscrito[0]->nombreD.' '.$diplomanteinscrito[0]->apellidoPaternoD.' '.$diplomanteinscrito[0]->apellidoMaternoD ; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-2">

                                            <label for="txtnombre"><small>Titulo Monografia</small></label>
                                            <input type="text" name="txttituloMono" id="txttituloMono" class="form-control input-sm" value="<?= set_value('txttituloMono');?>">
                                            <?= form_error('txttituloMono','<div class="alert alert-danger"><small>','</small></div>');?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-md-offset-2">
                                            </br><small><label class=" control-label">Inicio de la Monografia </label></small>
                                            <input type="date" class="form-control input-sm" name="finicioMono" id="finicioMono" value="<?= set_value('finicioMono');?>">
                                            <?= form_error('finicioMono','<div class="alert alert-danger"><small>','</small></div>');?>
                                        </div>
                                        <div class="col-md-5">
                                            </br><small><label class=" control-label">Culminación de la Monografia </label></small>
                                            <input type="date" class="form-control input-sm" name="ffinalMono" id="ffinalMono" value="<?= set_value('ffinalMono');?>">
                                            <?= form_error('ffinalMono','<div class="alert alert-danger"><small>','</small></div>');?>
                                        </div>
                                    </div></br>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-2 ">
                                            <label for="txtnombreparalelo"><small>Descripcion del Proyecto</small></label>
                                            <textarea wrap="hard" class="form-control input-sm" rows="3" name="txtdescripcionMono"  id="txtdescripcionMono"  value="<?= set_value('txtdescripcionMono');?>" placeholder="Insertar Descripcion u Observaciones"  ></textarea>
                                        </div>
                                    </div></br>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-" id="">
                                        <hr>
                                        <input class="btn btn-default btn-md active" type="reset" value="Borrar Texto">
                                        <hr>
                                        <a href="<?= base_url();?>index.php/academico/listaAcademico/6">Registrar Turor</a>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"><br>
                            <div class="col-md-6 col-md-offset-6" id="msjMonografia"></div>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input class="btn btn-primary btn-sm active" type="submit" value="Registar Monografia">         
            </div>  
        </form> 
    </div>
</div>
</div>
<!-- MODALES Inscripcion de DEFENSA-->
<div class="modal fade bs-modalOpcionesDefenza-modal-lg" id="modalOpcionesDefenza" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form method="post" id="formModalDefenza">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Seguimiento Academico - Defenza <small><?= $diplomanteinscrito[0]->nombreD;?> <?= $diplomanteinscrito[0]->apellidoPaternoD;?> <?= $diplomanteinscrito[0]->apellidoMaternoD;?> <strong>CI :</strong><span id="pciDiplo"><?= $diplomanteinscrito[0]->ciD;?></span> <strong>Inscripcion :</strong><span id="numInscripcion"><?= $diplomanteinscrito[0]->numeroI;?></span> </small></h4>
            </div>
            <div class="modal-body" id="">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row" id="tituloMono">
                        </div>
                        <div id="mensajedefensa"></div>
                        <div class="row">
                            <div class="col-md-12" >
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-">
                                        <!-- <div class="panel panel-default"> -->
                                            <div class="panel-body">
                                                    <div class="row">
                                                        <h5 class="text-danger"><center>Detalles de Defenza</center></h5><br>
                                                        <div class="form-group ">
                                                            <div class="col-md-10 col-md-offset-1 ">
                                                                <div class="row">
                                                                    <div class="col-md-5 ">
                                                                        <strong>Tipo de Defensa :</strong> <span  name="dettipoDef"  id ="dettipoDef"></span><br>
                                                                    </div>
                                                                    <div class="col-md-6 col-md-offset-1">
                                                                        <strong>Fecha de Defensa :</strong> <span  name="detfechaDef"  id ="detfechaDef"></span><br>
                                                                    </div>
                                                                </div></br>
                                                                <div class="row">   
                                                                    <div class="col-md-12 col-md-offset-">
                                                                        <!-- <div class="row">
                                                                            <div class="col-md-4 ">
                                                                                <strong>Tipo de Tribunal</strong><br>
                                                                                <span  name="dettipoTribp"  id ="dettipoTribp">Presidente</span>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <strong>CI Tribunal </strong> <br>
                                                                                <span  name="detciTribp"  id ="detciTribp"></span>
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <strong>Nombre Tribunal </strong><br>
                                                                                <span  name="detnombreTribp"  id ="detnombreTribp"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4 ">
                                                                                <strong>Tipo de Tribunal</strong><br>
                                                                                <span  name="dettipoTribs"  id ="dettipoTribs">Secretario</span>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <strong>CI Tribunal </strong> <br>
                                                                                <span  name="detciTribs"  id ="detciTribs"></span>
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <strong>Nombre Tribunal </strong><br>
                                                                                <span  name="detnombreTribs"  id ="detnombreTribs"></span>
                                                                            </div>
                                                                        </div> -->
                                                                        <div class="row">
                                                                            <div class="col-md-5 col-md-offset-1">
                                                                                <label for="">Nota Defensa: </label><span name="detnotaDef"  id ="detnotaDef"></span>
                                                                            </div>
                                                                            <div class="col-md-5 col-md-offset-">
                                                                                <label for="">Resultado : </label><span name="detaproboDef"  id ="detaproboDef"></span>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="row">
                                                                            <div class="col-md-10 col-md-offset-1">
                                                                                <label for="">Obesrvaiones de Defensa : </label><span name="detobservDef"  id ="detobservDef"></span>
                                                                            </div>
                                                                        </div><br>
                                                                    </div>                     
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary btn-sm active" value="Registrar Defensa"></br>    
            </div>  
        </form> 
    </div>
</div>
</div>