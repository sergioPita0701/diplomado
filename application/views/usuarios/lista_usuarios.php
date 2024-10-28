<div class="col-sm-9 col-sm-offset-3 col-md-12 col-md-offset-0 main">
    <div class="page-header">
        <center>
            <h3>Usuarios Registrados</span></h3>
        </center>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-md-5 col-md-offset-6 " id="msjusuario">
                </div>
            </div>
            <div class="row">
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-7">
                </div>
                <div class="col-md-2 col-md-offset-">
                </div>

            </div><br>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="table-responsive" id="listaUsuarios">
                        <table class="table table-hover" style="table-layout:; width:1500px" id="tabla">
                            <thead style="display: block;  ">
                                <th style="width:100px; word-break:break-word" class="active">
                                    <center>#</center>
                                </th>
                                <th style="width:200px; word-break:break-word" class="active">
                                    <center><small>CI</small></center>
                                </th>
                                <th style="width:300px; word-break:break-word" class="active">
                                    <center><small>Nombre Completo</small></center>
                                </th>
                                <th style="width:200px; word-break:break-word" class="active">
                                    <center><small>Cargo</small></center>
                                </th>
                                <th style="width:150px; word-break:break-word" class="active">
                                    <center><small>Estado</small></center>
                                </th>
                                <th style="width:150px; word-break:break-word" class="active">
                                    <center><small>Tipo Usuario</small></center>
                                </th>
                                <th style="width:250px; word-break:break-word" class="active">
                                    <center><small>Login</small></center>
                                </th>
                                <th style="width:150px; word-break:break-word" class="active">
                                    <center><small>Contrasena</small></center>
                                </th>
                                <th style="width:220px; word-break:break-word" class="active">
                                    <center><small>Operacion</small></center>
                                </th>
                            </thead>
                            <tbody style="display: block; height: 400px; overflow-y: auto; overflow-x: hidden; ">
                                <?php $i = 0;  ?><!--contador de la lista-->
                                <?php foreach ($usuario as $fila) : ?>

                                    <tr>
                                        <!-- <?= ($fila['estadoU'] == 0) ? "background-color: #f08080;" : "background-color: #adff2f;"; ?> -->
                                        <td style="width:100px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['ciU']; ?></td>
                                        <td style="width:300px; word-break:break-word"><?= $fila['nombreU'] . " " . $fila['apellidosU']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['cargoU']; ?></td>
                                        <td style="<?= ($fila['estadoU'] == 0) ? "background-color: #f08080;" : "background-color: #adff2f;"; ?> width:150px; word-break:break-word"><?= $fila['estadoU'] == 0 ? 'Desactivado' : 'Activado'; ?>
                                            <!-- <a href="<?= base_url('index.php/bitacora/cierra_sesion_usuario/' . $fila['idUsuario']); ?>" style="<?= ($fila['estadoU'] == '1') ? "background-color: #7cfc00;" : "background-color: #ff0000;"; ?>" id="" class="btn btn-group btn-xs <?= ($this->session->userdata('tipo') == 'Secretario') ? 'disabled' : '' ?>" 
                                                name="estadov"  ><?= ($fila['estadoU'] == '1') ? "Deshabilitar" : "Habilitar"; ?></a> -->
                                        </td>
                                        <td style="width:150px; word-break:break-word"><?= $fila['tipoU']; ?></td>
                                        <td style="width:250px; word-break:break-word"><?= $fila['loginU']; ?></td>
                                        <td style="width:150px; word-break:break-word"><?= $fila['contrasenaU']; ?></td>
                                        <td style="width:220px; word-break:break-word">
                                            <c class="btn btn-success btn-group btn" data-toggle="modal" data-target="#modalInforUsuario" data-backdrop="static" data-keyboard="false">
                                                <span class="glyphicon glyphicon-file"></span>
                                            </c>

                                            <b class="btn btn-warning btn-group btn" data-toggle="modal" data-target="#modalEditUsuario" data-backdrop="static" data-keyboard="false">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </b>

                                            <d type="button" class="btn btn-danger btn-group btn" data-toggle="modal" data-target=".bs-eliminarUsuario-modal-sm">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </d>
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

<!-- Eliminar Usuario -->

<div class="modal fade bs-eliminarUsuario-modal-sm" id="eliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <!-- <form  action="http://localhost:80/diplomado/index.php/usuario/eliminarUsuario" method="POST" class="form" role="form"> -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> <small>Desea realmente Eliminar al Usuario?</small> </h4>
            </div>
            <div class="modal-body">
                <p><small><strong>Para Eliminar debe Introducir el CI del Usuario!</strong></small></p>
                <input type="hidden" name="cielim" class="form-control input-sm" id="cielim">
                <input type="text" name="cieliminar" class="form-control input-sm" id="cieliminar">
                <div id="mnsjEliminar"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="eliminarUsuario();">Eliminar Usuario</button>
            </div>
            <!-- </form>   -->
        </div>
    </div>
</div>

<!-- modal EDITAR USUARIO -->
<div class="modal fade bs-example-modal-lg" id="modalEditUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="http://localhost:80/diplomado/index.php/usuario/editarUsuario" method="POST" class="form" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        <center>Editar Usuario con CI: <strong><span id="ciU"></span></strong> </center>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">


                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="ciusu" class="form-control input-sm" id="ciusu">
                                    <label for="">Nombre(s)</label>
                                    <input type="text" name="nombreusu" class="form-control input-sm" id="nombreusu">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Apellido(s)</label>
                                    <input type="text" name="apellidousu" class="form-control input-sm" id="apellidousu">

                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Cargo</label>
                                    <input type="text" name="cargoU" class="form-control input-sm" id="cargoU">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Direccion</label>
                                    <input type="text" name="direccionU" class="form-control input-sm" id="direccionU">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Telefono</label>
                                    <input type="text" name="telefonoU" class="form-control input-sm" id="telefonoU">
                                </div>
                                <div class="col-md-6">
                                    <label for="">E-mail</label>
                                    <input type="text" name="emailU" class="form-control input-sm" id="emailU">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Estado</label>
                                    <select name="estadoU" id="estadoU" class="form-control input-sm">
                                        <option value="">--Seleccione Estado--</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Desactivo</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tipo de Usuario</label>
                                    <select name="tipoU" id="tipoU" class="form-control input-sm">
                                        <option value="">--Seleccione Tipo--</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Coordinador">Coordinador</option>
                                        <option value="Secretario">Secretario</option>
                                    </select>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-">
                                    <label for="">Login</label>
                                    <input type="text" name="loginusu" class="form-control input-sm" id="loginusu">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Contrasena</label>
                                    <input type="password" name="contrasenausu" class="form-control input-sm" id="contrasenausu">
                                </div>
                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label><br>
                                            <input type="checkbox" id="vercontrasena" name="vercontrasena">
                                            <button type="button" class="btn btn-info btn-sm" onclick="generarLogin();">Generar Login</button>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>


                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Observaciones/Descripcion </label>
                                    <textarea wrap="hard" class="form-control input-sm" rows="3" id="obsevacionU" name="obsevacionU"></textarea>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-11 form-inline">


                                </div>
                            </div>


                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="" onclick="">Actualizar Datos</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- INFORMACION USUARIO -->
<div class="modal fade bs-example-modal-lg" id="modalInforUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <?php include_once('informacion_usuario.php'); ?>

</div>