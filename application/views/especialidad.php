</br>
<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 ">
    <div class="row">
        <div class="col-md-10">
            <form class="form" role="form" action="http://localhost:8080/diplomado/index.php/especialidad/crearEspecialidad" method="post">
                <div class="panel panel-primary">
                    <div class="panel-heading" data-toggle="collapse" href="#collapseEspecialidad">
                        <div class="panel-title text-primary"><small>Categoria de Postgrado / Est. Superior / Especialidad</small></div>
                    </div>
                    <div class="panel-body panel-collapse collapse" id="collapseEspecialidad">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><small>Nombre de Categoria de Estudio Superior:</small></label>
                                <input type="text" class="form-control input-sm" name="txtNombreEs" placeholder="Ej.Doctorado, Maestria, etc." /></br>

                                <div style="text-align:right">
                                    <input class="btn btn-default btn-sm active" type="reset" value="Borrar Texto">
                                    <input class="btn btn-info btn-sm active" type="submit" value="Agregar" onClick="">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><small>Descripcion: </small></label>
                                <textarea wrap="hard" class="form-control input-sm" name="txtDescripcionEs" id="" rows="4" placeholder="Ej. El programa consiste en el estudio..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row panel panel-default">
        <div class="col-md-10 col-md-offset-1 main">
            <!-- </br><h4>Buscar Profesion por: </h4> -->
            <div class="">
                <div class="form-inline col-md-12" style="text-align:right">
                    <form action="http://localhost:8080/diplomado/index.php/especialidad/buscarEspecialidad" method="post">
                        <input type="submit" class="btn btn-primary btn-sm" value="Buscar">
                        <input type="text" class="form-control input-sm" name="txtBuscarEs" placeholder="Ej.Doctorado, Maestria, etc." /></br>
                    </form>
                </div>
            </div>
        </div>
        <!-- style="table-layout:fixed " -->
        <div class="col-md-12" id="listaespecialidad">
            <div class="table-responsive">
                <table class="table table-hover" style="table-layout:; width:1060px">
                    <thead style="display: block;">
                        <th style="width:80px;word-break:break-word" class="active">
                            <center><small>Num.</small></center>
                        </th>
                        <th style="width:80px;word-break:break-word" class="active">
                            <center><small>ID</small></center>
                        </th>
                        <th style="width:200px;word-break:break-word" class="active">
                            <center><small>Nombre de Especialidad</small></center>
                        </th>
                        <th style="width:600px;word-break:break-word" class="active">
                            <center><small>Descripcion</small></center>
                        </th>
                        <th style="width:100px;word-break:break-word" class="active">
                            <center><small>Accion</small></center>
                        </th>
                    </thead>
                    <tbody style="display: block; height: 280px; overflow-y: auto; overflow-x: hidden;">
                        <?php $i = 0;  ?>
                        <?php foreach ($especialidad as $fila) : ?>
                            <tr>
                                <td style="width:80px; word-break:break-word"><?= "E" . $i = $i + 1;  ?></td>
                                <td style="width:80px; word-break:break-word"><?= $fila['idEspecialidad']; ?></td>
                                <td style="width:200px;word-break:break-word"><?= $fila['nombreE']; ?></td>
                                <td style="width:600px; word-break:break-word"><?= $fila['descripcionE']; ?></td>
                                <td style="width:100px; word-break:break-word">
                                    <!-- Button modal -->
                                    <b href="<?= base_url(); ?>index.php/especialidad/obtenerId?nombre=<?= $fila['nombreE']; ?>" type="button" class="btn btn-success btn-group btn-xs">
                                        <span class="glyphicon glyphicon-cog"></span> </b>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalEspecialidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Ver Especialidad</h4>
                                                </div>
                                                <form action="http://localhost:8080/diplomado/index.php/especialidad/editarEspecialidad" method="POST" role="form">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-10 col-md-offset-1">
                                                                <input type="hidden" id="idespecialidadEdi" name="txtidespecialidadEdi" class="form-control input-sm">
                                                                <label for="txtnombre">Nombre de Especialidad:</label>
                                                                <input type="text" id="nombreedit" name="txtnombreedit" class="form-control">
                                                            </div>

                                                        </div></br>
                                                        <div class="row">
                                                            <div class="col-md-10 col-md-offset-1">
                                                                <label for="">Descripcion: </label>
                                                                <textarea class="form-control input-sm" id="descripcionEedit" name="txtDescripcionEedit" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <input type="submit" class="btn btn-primary" value="Editar">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="<?= base_url(); ?>index.php/especialidad/eliminarEspecialidad?nombre=<?= $fila['nombreE']; ?>" onclick="return confirm('Desea Eliminar Especialidad?')" class="btn btn-danger btn-group btn-xs">
                                        <span class="glyphicon glyphicon-remove"></span> </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </br>
            </div>
        </div>
    </div>
</div>