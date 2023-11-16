<!-- <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">  
    
    <div class="row">
        <div class="panel panel-default">
            
        <div class="panel-body">
            <div class="row">
                <div class="col-md-10 col-md-offset-1" >
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" action="" method="post">
                                <div class="header">
                                    <h4><center>Diplomado de Docencia en Educacion Superior</center></h4>
                                    <h5><center>Facultad de Pedagogia de la U.M.R.P.S.F.X.CH.</center></h5>
                                </div><br>
                                <div class="row">
                                    <div class="form-group form-sm">
                                        <div class="col-md-3">
                                            <label class=" control-label">foto : </label> 
                                        </div>
                                        <div class="col-md-4">
                                            <small><label class=" control-label">CI : </label> <?= $academico[0]['ciA']; ?></small></br>
                                            <small><label class=" control-label">Nombre: </label> <?= $academico[0]['nombreA']; ?></small></br>
                                            <small><label class=" control-label">Ciudad: </label> <?= $academico[0]['ciudadA']; ?></small></br>
                                            <small><label class=" control-label">Direccion: </label> <?= $academico[0]['direccionA']; ?></small>
                                        </div>
                                        <div class="col-md-5">
                                            <small><label class=" control-label">Telefono: </label> <?= $academico[0]['telefonoA']; ?></small></br>
                                            <small><label class=" control-label">No. Archivo : </label> <?= $academico[0]['numFolioA']; ?></small></br>
                                            <small><label class=" control-label">Descripcion/Observaciones : </label><p class="form-control-static" style="width:450px;word-break:break-word" id="pdescrip"><?= $academico[0]['descripcionA']; ?></p></small>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-1">
                                    <h5>Profesion/Carrera</h5>
                                        <div class="list-group">
                                            <ul>
                                                <?php foreach ($academicoProf as $filita) : ?> 
                                                    <li type="button" class=""><small><?= $filita['nombreP']; ?><span class="label label-default" > <?= $filita['gradoAcademicoP']; ?></span></small></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                    <center><h5>Estudios de Posgrado e Investigacion</h5></center>
                                        <div class="panel-body">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="table-responsive">
                                                    <table class="table-sm  table-condensed ">
                                                        <thead class="" >
                                                            
                                                            <th class=""><small>Profesion/Carrera</small></th>
                                                            <th class=""><small>Especialidades</small></th>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <?php foreach ($academicocompleto as $fila) : ?>
                                                            <tr>
                                                                <td><small><?= $fila['nombreP'] . "--" . $fila['gradoAcademicoP'];  ?></small></td>
                                                                <td><small><?= $fila['nombreE']; ?></small></td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                            
                        </div>
                        <div class="panel-footer">
                            <div class="pull-lefth ">
                                <div class="row form-group"> 
                                    <button href="" type="button" class="btn btn-default active  btn-sm" onClick="">Imprimir</button>
                                    <button href="" type="button" class="btn btn-info  btn-sm" data-toggle="modal" data-target="#modalContrato">Seleccionar</button>
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
        </div>
    </div>
</div>
 Contrato-->

<!-- <div class="modal fade bs-example-modal-sm" id="modalContrato" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><small>Seleccionar para Contrato a <strong><?= $academico[0]['nombreA']; ?></strong></small></h4>
            </div>
            <form action="http://localhost:8080/diplomado/index.php/academicoseleccionado/asignar_rol" method="POST" role="form">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group input-sm">
                        <div class="col-md-6">
                                <input type="hidden" id="cia" name="txtcia" class="form-control input-sm" value="<?= $academico[0]['ciA']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" id="nombrea" name="txtnombrea" class="form-control input-sm" value="<?= $nombre ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="mensajeerror">
                </div>
                <div class="row">
                    <div class="form-group input-sm">
                        <div class="col-md-12 col-md-offset-">
                        <?= form_error('radiotipocontrato', '<div class="alert alert-danger"><small>', '</small></div>'); ?>
                            <label class="radio-inline">
                            <input type="radio" name="radiotipocontrato" id="radiotipocontrato1" value="Docencia" > Docencia
                            </label>
                            <label class="radio-inline">
                             <input type="radio" name="radiotipocontrato" id="radiotipocontrato2" value="Tutoria"> Tutoria
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="radiotipocontrato" id="radiotipocontrato3" value="Defenza"> Defenza
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group input-sm">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary btn-sm" value="Asignar Rol">
            </div>
            </form>
            
        </div>
    </div>
</div>  -->