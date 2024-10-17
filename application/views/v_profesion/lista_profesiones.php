<!-- <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 ">
    <div class="row">
    <div class="col-md-10">
        <form class="form" role="form" action="http://10.4.25.3:8080/diplomado/index.php/profesion/crearProfesion" method="post">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Registrar Profesion</div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label for="">Profecion:</label>
                            <input type="text" class="form-control" name="txtNombreP" placeholder="Insertar Profesion" /></br>
                            
                            <div style="text-align:right">
                                <input class="btn btn-default btn-md active" type="reset" value="Borrar Texto">
                                <input class="btn btn-info btn-md active" type="submit" value="Incluir Profesion" onClick="">
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                        <center><label for="">Grado Académico</label></center>
                            <div class="row">  
                                <div class="form-group col-md-5 col-md-offset-1">
                                    <label class="radio-inline">
                                    <input type="radio" name="radioProfesion" id="rIngenieria" value="ingenieria" checked="true"> Ingenieria
                                    </label></br>
                                    <label class="radio-inline">
                                     <input type="radio" name="radioProfesion" id="rLicenciatura" value="licenciatura"> Licenciatura
                                    </label></br>
                                    <label class="radio-inline">
                                    <input type="radio" name="radioProfesion" id="rTecSup" value="tecSup"> Tec. Sup.
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    
                                    <label class="radio-inline">
                                      <input type="radio" name="radioProfesion" id="rTecMed" value="tecMed"> Tec. Med.
                                    </label></br>
                                    <label class="radio-inline">
                                      <input type="radio" name="radioProfesion" id="rOtro" value="otro" > Otro
                                    </label>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>        
            </div>

        </form>
    </div>
    </div>    
</div> -->

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row panel panel-default">
        <div class="col-md-10 col-md-offset-1 main">

            <div class="row">
                <div class="form-inline col-md-3">
                    <!-- <button >Large modal</button> -->
                    <a href="" type="" class="" data-toggle="modal" data-target="#modalcrearProfesion" data-backdrop="static" data-keyboard="false">Insertar Profesion</a>

                </div>
                <div class="form-inline col-md-8" style="text-align:right">
                    <form action="http://10.4.25.3:8080/diplomado/index.php/profesion/buscarProfesion" method="post">
                        <select class="form-control input-sm" id="selectProf" name="selectProfesion">
                            <option value="">---Seleccionar---</option>
                            <option value="">Todos</option>
                            <option value="ingenieria">Ingenierias</option>
                            <option value="licenciatura">Licenciaturas</option>
                            <option value="tecSup">Tec. Superior</option>
                            <option value="tecMed">Tec. Medio</option>
                            <option value="otro">Otro</option>
                        </select>
                        <input type="submit" class="btn btn-primary btn-sm" value="Buscar">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1" id="listaprofesion">
            <div class="table-responsive">
                <table class="table table-hover" id="profesion" style="table-layout:; width:850px">
                    <thead style="display: block;">
                        <th style="width:100px;word-break:break-word" class="success">Num.</th>
                        <th style="display:none">ID</th>
                        <th style="width:400px;word-break:break-word" class="success">Nombre de Carrera</th>
                        <th style="width:200px;word-break:break-word" class="success">Grado Académico</th>
                        <th style="width:150px;word-break:break-word" class="success">Accion</th>
                    </thead>
                    <tbody style="display: block; height: 400px; overflow-y: auto; overflow-x: hidden;">
                        <?php $i = 0;  ?>
                        <?php foreach ($profesion as $fila) : ?>
                            <tr>
                                <td style="width:100px;word-break:break-word"><?= "P" . $i = $i + 1;  ?></td>
                                <td style="display:none"><?= $fila['idProfesion']; ?></td>
                                <td style="width:400px;word-break:break-word"><?= $fila['nombreP']; ?></td>
                                <td style="width:200px;word-break:break-word"><?= $fila['gradoAcademicoP']; ?></td>
                                <td style="width:150px;word-break:break-word">
                                    <!-- Button modal -->
                                    <b href="" type="button" class="btn btn-success btn-group btn-xs">
                                        <span class="glyphicon glyphicon-cog"></span> </b>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalProfesion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-primary" id="myModalLabel">Ver Profesion</h4>
                                                </div>
                                                <form action="http://10.4.25.3:8080/diplomado/index.php/profesion/editarProfesion" method="POST" role="form">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <input type="hidden" id="idprofesion" name="txtidprofesion" class="form-control input-sm">
                                                                <label for="txtnombre">Nombre de Profesion:</label>
                                                                <input type="text" id="nombreeditado" name="txtnombreeditado" class="form-control">
                                                            </div>

                                                        </div></br>
                                                        <div class="row">
                                                            <div class="col-md-12 col-md-offset-">
                                                                <label for="txtnombre">Verificar Grado Academico:</label></br>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="radioProfEditado" id="raIngenieria" value="ingenieria"> Ingenieria
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="radioProfEditado" id="raLicenciatura" value="licenciatura"> Licenciatura
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="radioProfEditado" id="raTecSup" value="tecSup"> Tec. Sup.
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="radioProfEditado" id="raTecMed" value="tecMed"> Tec. Med.
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="radioProfEditado" id="raOtro" value="otro"> Otro
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <input type="submit" class="btn btn-primary" value="Editar Profesion">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="<?= base_url(); ?>index.php/profesion/eliminarProfesion?nombre=<?= $fila['nombreP']; ?>" onclick="return confirm('Desea Eliminar Profesion?')" class="btn btn-danger btn-group btn-xs">
                                        <span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div></br>
        </div>
    </div>
</div>

<div class="modal fade" id="modalcrearProfesion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <?php include_once('nueva_profesion.php'); ?>
</div>