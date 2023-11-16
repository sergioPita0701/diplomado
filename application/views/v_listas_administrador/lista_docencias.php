<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <!-- <h3><center> Registro de Inscritos en la <?= $nombre ?></center></h3> -->
                <h3>Docencia <small> Registro de Docentes en Modulo</small> </h3>
            </div><br>
            <form action="<?= base_url()?>index.php/inscripcion" method="post" class="form">
                <div class="row">
                    <!-- <div class="col-md-4 col-md-offset-8 form-inline">
                        <input class="form-control input-sm" type="text" id="" name="txtbuscarci" size="30" placeholder="Buscar por CI, Nombre, Profesion o Sexo">
                        <input class="btn btn-primary btn-sm active" type="submit" id="" value="Buscar">
                    </div> -->
                    
                </div>
            </form><br>
            <div class="row">
                <div class="col-md-12 col-md-offset-">
                    <div class="table-responsive" id="listaDocencia">
                        <table class="table table-hover" style="table-layout:; width:1000px">
                            <thead>
                                <th class="active">#</th>
                                <th style="display:none" ></th>
                                <th class="active">Modulo</th>
                                <th class="active">Paralelo</th>
                                <th class="active">Nombre Completo</th>
                                <th class="active">Estado</th>
                                <th class="active">Desde</th>
                                <th class="active">Hasta</th>
                            </thead>
                            <tbody>

                                <?php $i=0;  ?><!--contador de la lista-->
                               <?php foreach($registroDocencias as $fila):?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i=$i+1;  ?></strong></td>
                                        <td style="display:none" ><?= $fila['idDocencia'];?></td>
                                        <td style="width:150px; word-break:break-word" id="tbcii"><?= $fila['nombreM'];?></td>
                                        <td style="width:100px; word-break:break-word" id="tbcii"><?= $fila['nombre_paralelo'];?></td>
                                        <td style="width:250px; word-break:break-word" id="tbcii"><?= $fila['nombreA'];?></td>
                                        <td style="width:100px; word-break:break-word" id="tbnumi"><?= $fila['estadoDoc'];?></td>
                                        <td style="width:150px; word-break:break-word" id="tbnumi"><?= $fila['fechaInicioDoc'];?></td>
                                        <td style="width:150px; word-break:break-word" id="tbnumi"><?= $fila['fechaFinalDoc'];?></td>
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
<!-- EDITAR Docencia -->
<div class="modal fade" id="modalEditDetContrato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Docencia<small> Editar Informacion de Contrato</small></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="hidden" name="editDetdocencia" id="editDetdocencia">
                                <label><small>CI Docente: </small></label><p name="editdetciDoc" id="editdetciDoc"></p></br>
                            </div>
                            <div class="col-md-7">
                                <input type="hidden" name="editacademicov" id="editacademicov">
                                <label><small>Nombre Docente: </small></label><p name="editdetnombreDoc" id="editdetnombreDoc" ></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="msjEditDetDoc"></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fecha Inicio: </label><input type="date" class="form-control input-sm" name="eDetfechaiDoc" id="eDetfechaiDoc"></br></br>
                                <label>Carta: </label><input type="text" class="form-control input-sm" name="eDetcartaDoc" id="eDetcartaDoc"></br></br>
                                <label>Estado de Docencia: </label>
                                <select type="text" class="form-control input-sm" name="eDetEstadoDoc" id="eDetEstadoDoc">
                                    <option value="">--Seleccione Estado--</option>
                                    <option value="Activo">Activo --Encargado de Asignar Calificacion--</option>
                                    <option value="Remplazo">Remplazo</option>
                                    <option value="Ausente">Ausente</option>
                                </select></br></br>
                            </div>
                            <div class="col-md-6">
                                <label>Fecha Final: </label><input type="date" class="form-control input-sm" name="eDetfechafinDoc" id="eDetfechafinDoc"></br></br>
                                <label>Fecha Emision Carta: </label><input type="text" autocomplete="on" class="form-control input-sm" name="eDetEmisionDoc" id="eDetEmisionDoc"></br></br>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Observaciones: </label><textarea wrap="hard" class="form-control input-sm" name="eDetovservDoc" id="eDetovservDoc"></textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-2">
                            </div>
                            <div class="col-md-3 col-md-offset-2">
                                
                            </div>
                        </div><br>
                </div>
                     
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="cambiarDetDocencia();" ><span class="glyphicon glyphicon-config"></span> Editar Datos de Docencia</button>
            
        </div>   
    </div>
</div>
</div>