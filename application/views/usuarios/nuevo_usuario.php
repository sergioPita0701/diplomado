<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h3 class="page-header">Usuario</h3>
                    </center>
                </div>

            </div>

            <div class="row">
                <form class="form" role="form" action="http://localhost:80/diplomado/index.php/usuario/crearUsuario" method="post">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-9 col-md-offset-2">
                                <div class="row">
                                    <div class=" col-md-12">
                                        <small><label for="">CI Usuario </label></small>
                                        <input type="text" class="form-control input-sm" id="ciusu" name="ciusu" value="<?= set_value('ciusu'); ?>">
                                        <?= form_error('ciusu', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div></br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <small><label for="">Nombre(s) </label></small>
                                        <input type="text" class="form-control input-sm" id="nombreusu" name="nombreusu" value="<?= set_value('nombreusu'); ?>">
                                        <?= form_error('nombreusu', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div></br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <small><label for="">Apellidos </label></small>
                                        <input type="text" class="form-control input-sm" id="apellidousu" name="apellidousu" value="<?= set_value('apellidousu'); ?>">
                                        <?= form_error('apellidousu', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>

                                </div></br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <small><label for="">Cargo </label></small>
                                        <input type="text" class="form-control input-sm" id="cargousu" name="cargousu" value="<?= set_value('cargousu'); ?>">
                                        <?= form_error('cargousu', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>

                                </div></br>
                                <div class="row">
                                    <div class=" col-md-7">
                                        <small><label for="">E-mail </label></small>
                                        <input type="text" class="form-control input-sm" id="emailusu" name="emailusu" value="<?= set_value('emailusu'); ?>">

                                    </div>
                                    <div class=" col-md-5">
                                        <small><label for="">Telefono </label></small>
                                        <input type="text" class="form-control input-sm" id="telefonousu" name="telefonousu" value="<?= set_value('telefonousu'); ?>">
                                        <?= form_error('telefonousu', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <small><label for="">Direccion </label></small>
                                        <input type="text" class="form-control input-sm" id="direccionusu" name="direccionusu" value="<?= set_value('direccionusu'); ?>">
                                        <?= form_error('direccionusu', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">

                        <div class="row">
                            <div class="col-md-11">

                                <div class="row form-group ">
                                    <div class=" col-md-6">
                                        <small><label for="">Estado </label></small>
                                        <select type="text" class="form-control input-sm" id="estadousu" name="estadousu">
                                            <option value="">--Seleccione Estado--</option>
                                            <option value="1" <?= set_select('estadousu', '1'); ?>>Activo</option>
                                            <option value="0" <?= set_select('estadousu', '0'); ?>>Desactivo</option>
                                        </select>
                                        <?= form_error('estadousu', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for=""><small>Tipo de Usuario</small></label>
                                        <select type="text" class="form-control input-sm" id="tipousu" name="tipousu">
                                            <option value="">--Seleccione Tipo--</option>
                                            <option value="Administrador" <?= set_select('tipousu', 'Administrador'); ?>>Administrador</option>
                                            <option value="Coordinador" <?= set_select('tipousu', 'Coordinador'); ?>>Coordinador</option>
                                            <option value="Secretario" <?= set_select('tipousu', 'Secretario'); ?>>Secretario</option>
                                        </select>
                                        <?= form_error('tipousu', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div><br>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12  ">
                                        <label for=""><small>Login :</small></label>
                                        <input type="text" class="form-control input-sm" id="loginusu" name="loginusu" value="<?= set_value('loginusu'); ?>" readonly>
                                        <?= form_error('loginusu', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                </div></br>
                                <div class="row ">
                                    <div class="col-md-8">
                                        <label for=""><small>Contrasena:</small></label>
                                        <input type="password" class="form-control input-sm" id="contrasenausu" name="contrasenausu" value="<?= set_value('contrasenausu'); ?>" readonly>
                                        <?= form_error('contrasenausu', '<div class="alert alert-warning"><small>', '</small></div>'); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <label><br>
                                                <input type="checkbox" id="vercontrasena" name="vercontrasena">
                                            </label>
                                        </div>
                                    </div>
                                </div><br>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <small><label for="">Observaciones/Descripcion </label></small>
                                        <textarea wrap="hard" class="form-control input-sm" rows="4" id="descripcionusu" name="descripcionusu" value="<?= set_value('descripcionusu'); ?>" placeholder="Insertar descripcion u Observaciones del usuario"></textarea>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class=" row ">
                            <div class="col-md-8 col-md-offset-1">
                                <hr>
                                <input type="submit" class="btn btn-primary btn-" value="Registrar Usuario">
                                <hr>
                                <button type="button" class="btn btn-info" onclick="generarLogin();">Generar Login</button>
                                <hr>
                                <button type="reset" class="btn btn-default btn-">Borrar Texto</button>
                                <hr>
                                <a href="<?= base_url(); ?>index.php/usuario/registroUsuario">Ir a Registro de Usuarios</a>
                                <hr>

                            </div>
                        </div>
                    </div>
                </form>
                <div id="mensaje">
                </div>
            </div><br>
        </div>
    </div>
</div>