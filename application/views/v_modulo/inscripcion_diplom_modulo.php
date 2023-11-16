<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">  
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <center><h3 class="page-header">Asignacion de Modulo</h3></center>
                </div>

            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <form method="post" id="formasigmodulo">
                            <div class="row">
                                <div class=" form-inline col-md-3 col-md-offset-1 ">
                                    <small><label for="">Inscripcion: </label><p type="" class="" value="" name="numInscripcion" id="numInscripcion"><?= $diplomanteinscrito[0]['numeroI'];?></p></small>
                                    
                                </div>
                                <div class=" form-inline col-md-3">
                                    
                                    <small><label for="">CI: </label><p type="" class="" value="" name="ciDiplomante" id="ciDiplomante"><?= $diplomanteinscrito[0]['ciD'];?></p></small>
                                </div>
                                <div class=" form-inline col-md-5 ">
                                    <small><label for="">Nombre: </label></br><?= $diplomanteinscrito[0]['nombreD'];?> <?= $diplomanteinscrito[0]['apellidoPaternoD'];?> <?= $diplomanteinscrito[0]['apellidoMaternoD'];?></small>
                                    
                                </div>
                                <div class=" form-inline col-md-10 col-md-offset-1 " id="msjError">
                                </div>
                                
                            </div>
                            <hr>
                            <div class="row">
                                <div class=" form-group col-md-7 col-md-offset-3 ">
                                    
                                    <label for="">Seleccione Modulo:</label>
                                    <select type="text" class="form-control " id="modulosele" name="modulosele" >
                                        <option value="">--Seleccione un Modulo--</option>
                                        <?php foreach($modulo as $modulito):?>
                                            <option value="<?= $modulito['numeroM']; ?>"><?= $modulito['nombreM']; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-7 col-md-offset-3 ">
                                    <label for="">Paralelo:</label>
                                    <select type="text" class="form-control " id="paralelosele" name="paralelosele" >
                                        
                                    </select>
                                </div>
                            </div></br>
                            <div class="row">
                                <div class="form-group col-md-7 col-md-offset-3">
                                    <label for="">Fecha de Asignacion:</label>
                                    <input type="date" class="form-control " id="fechaAsignacion" name="fechaAsignacion">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-6">
                                    <div class="form-group ">
                                        <input type="submit" class="btn btn-success btn-sm" value="Inscribir al Modulo">

                                    </div>
                                </div>
                            </div>
                            <div id="mensaje">
                            </div>
                    </form>
                </div> 
                
                <div class="col-md-6 ">  
                    
                    <div class="row">
                        <div class="col-md-11 col-md-offset-1" > 
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <center><h5 class="page-header">Participantes sin Modulo</h5></center>
                                    <div class="table-responsive ">
                                        <table class="table  table-hover ">
                                            <thead class="" >
                                                <th class="active"><small>No.</small></th>
                                                <th class="active"><small>Nombre Completo</small></th>
                                                <th class="active"><small>Ci</small></th>
                                                <th class="active"><small>Profecion</small></th>
                                                <th class="active"><small></small></th>
                                            </thead>
                                            <tbody>
                                                <?php $i=0;  ?>
                                                <?php foreach($inscripcion as $fila):?>
                                                <tr>
                                                    <td><strong><small><?= $i=$i+1;  ?></small></strong></td>
                                                    <td><small><?=$fila->nombreD." ".$fila->apellidoPaternoD." ".$fila->apellidoMaternoD; ?></small></td>
                                                    <td><small><?=$fila->ciD; ?></small></td>
                                                    <td><small><?=$fila->nombreP; ?></small></td>
                                                    <td><small>
                                                        <a type="button" class="btn btn-success btn-group btn-xs" href="<?= base_url('index.php/modulodiplomante/incripcion_diplomate_modulo/?inscripcion='.$fila->numeroI.'&ciD='.$fila->ciD) ;?>">
                                                        <span class="glyphicon glyphicon-transfer"> </span> </a></small>
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
            </div>
        </div>
    </div>
</div>