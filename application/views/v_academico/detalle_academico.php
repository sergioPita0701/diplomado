<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title"><small>Detalle de Academico</small></div>
                            </div>
                            <div class="panel-body" id="bodyDetalleAcad">
                                <form class="form-horizontal" action="" method="post">
                                    <div class="header">
                                        <h4>
                                            <center>Diplomado de Docencia eddddn Educacion Superior</center>
                                        </h4>
                                        <h5>
                                            <center>Facultad de Pedagogia de la U.M.R.P.S.F.X.CH.</center>
                                        </h5>
                                    </div><br>
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-1">
                                            <label class=" control-label">CI : </label>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="form-control-static" id="pci"><?= $academico[0]['ciA']; ?></p>
                                            <!-- <p class="form-control-static" id="ci"  >dsad</p> -->
                                        </div>
                                        <div class="col-md-1">
                                            <label class=" control-label">Nombre: </label>
                                        </div>
                                        <div class="col-md-5">
                                            <p class="form-control-static" id="pnombre"><?= $academico[0]['nombreA']; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-1">
                                            <label class=" control-label">Telefono: </label>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="form-control-static" id="ptelefono"><?= $academico[0]['telefonoA']; ?></p>
                                        </div>

                                        <div class="col-md-2">
                                            <label class=" control-label">No. Archivo : </label>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="form-control-static" id="pfolio"><?= $academico[0]['numFolioA']; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-1">
                                            <label class=" control-label">Ciudad: </label>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="form-control-static" id="pciudad"><?= $academico[0]['ciudadA']; ?></p>
                                        </div>

                                        <div class="col-md-1">
                                            <label class=" control-label">Direccion: </label>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="form-control-static" id="pdirecc"><?= $academico[0]['direccionA']; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3 col-md-offset-1">
                                            <label class=" control-label">Descripcion/Observaciones : </label>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="form-control-static" style="width:450px;word-break:break-word" id="pdescrip"><?= $academico[0]['descripcionA']; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3 col-md-offset-10 ">
                                            <button href="" type="button" class="btn btn-primary  btn-sm" onClick="editarAcademico()"><span class="glyphicon glyphicon-cog"></span> Editar Academico</button>
                                        </div>
                                    </div>

                                </form>
                                <hr>
                                <center>
                                    <h5>Profesion/Carrera</h5>
                                </center>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="list-group">
                                            <ul>
                                                <?php foreach ($academicoProf as $filita) : ?>
                                                    <li type="button" class="list-group-item"><?= $filita['nombreP']; ?><span class="label label-default"> <?= $filita['gradoAcademicoP']; ?></span></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-8 ">
                                        <button href="" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminarProfesionA">Eliminar Profesion</button>
                                        <button href="" type="button" class="btn btn-success  btn-sm" onClick="insertProfesion()">Insertar Profesion</button>
                                    </div>
                                </div></br>
                                <hr>
                                <center>
                                    <h5>Estudios de Posgrado e Investigacion</h5>
                                </center>


                                <div class="col-md-12">
                                    <!-- <div class="panel panel-default"> -->
                                    <div class="panel-body">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="table-responsive">
                                                <table class="table  table-striped ">
                                                    <thead class="">
                                                        <th class=""><small>#</th>
                                                        <th class=""><small>CI:</small> </th>
                                                        <th class=""><small>G. Academico</small></th>
                                                        <th class=""><small>Profesion/Carrera</small></th>
                                                        <th class=""><small>Especialidades</small></th>
                                                        <th class=""><small>Operaciones</small></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0;  ?>
                                                        <?php foreach ($academicocompleto as $fila) : ?>
                                                            <tr>
                                                                <td><strong><?= $i = $i + 1;  ?></strong></td>
                                                                <td><?= $fila['ciA']; ?></td>
                                                                <td><?= $fila['gradoAcademicoP']; ?></td>
                                                                <td><?= $fila['nombreP'];  ?></td>
                                                                <td><?= $fila['nombreE']; ?></td>
                                                                <td>
                                                                    <a href="<?= base_url(); ?>index.php/academicoespecialidad/EliminarAcademicoEspecialidad?ciacad=<?= $fila['ciA']; ?> && profesion=<?= $fila['idProfesion']; ?> && especialidad=<?= $fila['nombreE']; ?> " onclick="return confirm('Desea Eliminar Especialidad?')" class="btn btn-danger btn-group btn-xs">
                                                                        <span class="glyphicon glyphicon-remove"></span></a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="pull-right ">
                                                <div class="row form-group">
                                                    <button href="" type="button" class="btn btn-info  btn-sm" onClick="insertPosgrado()">Insertar Posgrado</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- </div> -->
                                </div>

                            </div>
                            <div class="panel-footer">
                                <div class="pull-right ">
                                    <div class="row form-group">
                                        <!-- // Imprime pero los botones tb los saca y no da porq sale cn error  -->
                                        <button href="" type="button" class="btn btn-primary active  btn-sm" id="imprimDetalleAcad"><span class="glyphicon glyphicon-print"></span> Imprimir Detalle</button>
                                        <span <?= ($this->session->userdata('tipo') == 'Administrador') ? "hidden" : "" ?>>
                                            <a href="<?= base_url(); ?>index.php/academico/eliminarAcademico?ciacad=<?= $academico[0]['ciA']; ?> && nombreAcad=<?= $academico[0]['nombreA']; ?> " type="button" class="btn btn-danger  btn-sm" onClick="return confirm('Está seguro de Eliminar al Academico, se borraran todos sus datos relacionados a esta persona')">Eliminar Academico</a>
                                        </span>
                                    </div>
                                </div></br></br>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- modal Editar Academico-->

<div class="modal fade bs-example-modal-lg" id="modalEditarA" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="pciA"> </h5>
            </div>
            <div class="modal-body">
                <form class="form" role="form" action="http://10.4.25.3:8080/diplomado/index.php/academico/editarAcademico" method="post">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="textoCiA" name="textoCiA" value="" readonly>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>Nombre Completo:</small></label>
                                        <input type="text" class="form-control input-sm" id="textoNombreA" name="textoNombreA" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>No. de Archivo:</small></label>
                                        <input type="text" class="form-control input-sm" id="textoArchivoA" name="textoArchivoA" value="">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>Telefono:</small></label>
                                        <input type="text" class="form-control input-sm" id="textoTelefonoA" name="textoTelefonoA" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>Ciudad Actual:</small></label>
                                        <input type="text" class="form-control input-sm" id="textoCiudadA" name="textoCiudadA" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>Direccion Actual:</small></label>
                                        <input type="text" class="form-control input-sm" id="textoDireccionA" name="textoDireccionA" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>Descripcion/Observacion:</small></label>
                                        <textarea wrap="hard" class="form-control input-sm" rows="3" id="textoDescripcionA" name="textoDescripcionA"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-md-offset-2">
                            <ul class="" id="editProfesion" name="">
                                <!-- <li id="editProfesion" name="txtprofesion" ></li> -->
                            </ul>
                        </div>
                        <div id="botonEliminar">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-primary" value="Actualizar Informacion ">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- modal Eliminar Porfesion de Academico-->
<div class="modal fade" id="modalEliminarProfesionA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">Eliminar Profesion/Carrera de <?= $academico[0]['nombreA']; ?> </h5>
            </div>
            <div class="modal-body">
                <form class="form" role="form" action="http://10.4.25.3:8080/diplomado/index.php/academicoprofesion/eliminarProfesionAcad" method="post">
                    <div class="row">
                        <div class="col-md-10 ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="textoCi" name="txtci" value="<?= $academico[0]['ciA']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>Profesion/Carrera:</small></label>
                                        <ul id="textoCarrera" name="txtcarrera" class="">
                                            <li><?= $academico[0]['nombreA']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label"><small>Grado Academico:</small></label>

                                        <select class="form-control input-sm" id="" name="profesionA">
                                            <!-- <option value="">Seleccione Profesion que eliminará</option> -->
                                            <?php foreach ($academicoProf as $filita) : ?>
                                                <option value="<?= $filita['idProfesion']; ?> "><?= $filita['nombreP'] . " " . $filita['gradoAcademicoP']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-danger" value="Eliminar Profesion">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal Insertar Profesion-->
<div class="modal fade" id="modalProfesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><small>Asignar Estudios de Superiores de <strong><?= $academico[0]['nombreA']; ?></strong></small></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="form" role="form" action="http://10.4.25.3:8080/diplomado/index.php/academicoprofesion/crearAcademicoProfesion" method="post">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="textoCi" name="txtCiA" value="<?= $academico[0]['ciA']; ?>" readonly>
                                    <li class="list-group-item"><?= $academico[0]['nombreA']; ?></li>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 col-md-offset-2">


                                <div class="btn-group">
                                    <input type="button" class="btn btn-primary" id="todos" href="" value="Todos" onclick="selectgrado('')">
                                    <input type="button" class="btn btn-primary" id="inge" href="" value="Ing." onclick="selectgrado('ingenieria')">
                                    <input type="button" class="btn btn-primary" id="licen" href="" value="Lic." onclick="selectgrado('licenciatura')">
                                    <input type="button" class="btn btn-primary" id="tecSup" href="" value="Tec. Sup." onclick="selectgrado('tecSup')">
                                    <input type="button" class="btn btn-primary" id="tecMed" href="" value="Tec. Med." onclick="selectgrado('tecMed')">
                                    <input type="button" class="btn btn-primary" id="otro" href="" value="Otro" onclick="selectgrado('otro')">
                                </div>
                                <div class="row col-md-9 col-md-offset-1" id="profesion">
                                    </br>
                                    <select class="form-control input-sm" id="profA" name="ProfecionA">
                                        <?php foreach ($profesion as $fila) : ?>

                                            <option value="<?= $fila['idProfesion']; ?>"><?= $fila['nombreP']; ?></option>

                                        <?php endforeach; ?>
                                    </select>
                                    </br>
                                    <!-- <a href="<?= base_url(); ?>index.php/profesion"><h6>Insertar Profesion</h6></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                            <input type="submit" class="btn btn-danger btn-sm" id="insertPA" value="Insertar Profesion">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- modal Insertar Posgrado-->
<div class="modal fade" id="modalPosgrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><small>Asignar Estudios de Posgrado e Investigacion de <strong><?= $academico[0]['nombreA']; ?></strong></small></h4>
            </div>
            <div class="modal-body">
                <form class="form" role="form" action="http://10.4.25.3:8080/diplomado/index.php/academicoespecialidad/crearAcademicoEspecialidad" method="post">
                    <div class="row">
                        <div class="ccol-md-8 col-md-offset-2">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="textoCi" name="txtCiA" value="<?= $academico[0]['ciA']; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><small>Seleccionar Profesion/Carrera</small></label>
                                <select class="form-control input-sm" id="selectModal" name="selectProfA">
                                </select>
                            </div>

                        </div>
                        <div class="col-md-7">
                            <label for="recipient-name" class="control-label"><small>Pinchar Estudios realizados referentes a la Carrera</small></label>
                            <div class="form-group col-md-9 col-md-offset-3">
                                <div class="checkbox" id="checkModal">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-primary btn-sm" id="" value="Guardar Datos Realizado">

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>