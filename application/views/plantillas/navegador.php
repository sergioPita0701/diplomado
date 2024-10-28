<?php require_once(__DIR__ . '/../funciones/convertirRomanos.php');
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class=" navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class=" navbar-brand" href="<?= base_url(); ?>index.php/version/ingresarv"><strong>Seguimiento Academico</strong> <small><?= "> Login : *" . $this->session->userdata('login') . " *"; ?></small></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown <?= ($this->session->userdata('tipo') == 'Administrador') ? "" : "hidden" ?>">

          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo base_url(); ?>assets/img/usuario.png" alt="as.png" style="width: 25px;height:25px;"> Usuario <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url(); ?>index.php/usuario">Nuevo Usuario</a></li>
            <li><a href="<?= base_url(); ?>index.php/usuario/registroUsuario">Registro de Usuarios</a></li>
            <!-- <li role="separator" class="divider"></li>
                <li><a href="#">Informacion</a></li> -->
            <li role="separator" class="divider"></li>
            <!-- <li><a href="#">dd</a></li> -->
          </ul>
        </li>
        <li class="dropdown <?= ($this->session->userdata('tipo') == 'Secretario') ? "hidden" : "" ?>">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo base_url(); ?>assets/img/modulos.png" alt="as.png" style="width: 25px;height:25px;">Seguridad<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url(); ?>index.php/bitacora/getBitacora_acceso">Bitacora de Acceso</a></li>
            <li><a>Bitácoras de Acciones</a>
              <ul><a href="<?= base_url(); ?>index.php/bitacora"><small>Insersión y Eliminación</small></a></ul>
              <ul><a href="<?= base_url(); ?>index.php/bitacora/getBit_actualizar_asignacioMDI"><small>Actualización de Notas</small></a></ul>
              <ul><a href="<?= base_url(); ?>index.php/bitacora/getBit_actualizar_inscripcion"><small>Actualización Diplom.</small></a></ul>
            </li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= base_url(); ?>index.php/backup">Copia de Seguridad</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url(); ?>index.php/version/registroV">Versiones</a></li>
            <?php
            if ($this->session->userdata('ingresado')) {
            ?>
              <li <?= ($this->session->userdata('tipo') == 'Secretario') ? "hidden" : "" ?>><a href="<?= base_url(); ?>index.php/modulo/">Modulo-Asignaturas</a></li>
              <li <?= ($this->session->userdata('tipo') == 'Coordinador') ? "" : "hidden" ?>><a href="<?= base_url(); ?>index.php/paralelo/">Paralelos</a></li>
              <li <?= ($this->session->userdata('tipo') == 'Administrador') ? "" : "hidden" ?> data-toggle="modal" data-target=".bs-fechaInscripciones-modal-sm"><a>Inscripciones</a></li>
            <?php  } ?>

            <li role="separator" class="divider" <?= ($this->session->userdata('tipo') == 'Administrador') ? "" : "hidden" ?>></li>

            <li id="botonTerminarV" <?= ($this->session->userdata('tipo') == 'Administrador') ? "" : "hidden" ?>><a><button type="button" class="btn btn-danger btn btn-xs" data-toggle="modal" data-target=".bs-eliminarVersion-modal-sm">TERMINAR VERSION</button></a></li>

            <li role="separator" class="divider"></li>
            <li><a href="<?= base_url(); ?>index.php/version/informacion_version"> Informacion</a></li>

            <li><a href="<?= base_url(); ?>index.php/autenticacion/cerrar_sesion">Salir</a></li>
          </ul>
        </li>

      </ul>

    </div>
  </div>
</nav>

<!-- MODAL PARA PREGUNTAR SI DESEA ELIMINAR LA VERSION O NO -->
<div class="modal fade bs-eliminarVersion-modal-sm" id="eliminarVersion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <!-- <form  action="http://10.4.25.3:8080/diplomado/index.php/usuario/terminarVersion" method="POST" class="form" role="form"> -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <small class="text text-danger text-uppercase">Desea realmente Finalizar la Versión?</small> </h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning" role="alert">
          <span class="glyphicon glyphicon-warning-sign"></span>
          <small>Desde este momento Finalizará la <strong>Versión actual</strong> y <span class="label label-default">NO</span>
            podra realizar más operaciones(registrar,eliminar, editar) en la misma. Solo se le proporcionará reportes y vistas!.</small>
        </div>
        <p><small><strong>Para Finalizar la Versión debe Introducir su CI para comprobar si puede realizar esta acción.</strong></small></p>
        <input type="hidden" name="" class="form-control input-sm" id="idversion" value="<?= $this->session->userdata('idVersion') ?>">
        <input type="text" name="" class="form-control input-sm" id="ciusuario">
        <div id="mnsjEliminarVersion"></div>
        <textarea name="" id="razonVersion" cols="30" class="form-control" rows="1" value="">Termino de Version.</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-sm" onclick="terminarVersion();">Finalizar Version</button>
      </div>
      <!-- </form>   -->
    </div>
  </div>
</div>
<!-- MODAL QUE DEFINE HASTA CUANDO SON LAS INSCRIPCIONES -->
<div class="modal fade bs-fechaInscripciones-modal-sm" id="fechaInscripciones" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <!-- <form  action="http://10.4.25.3:8080/diplomado/index.php/usuario/terminarVersion" method="POST" class="form" role="form"> -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <small class="text text-primary text-uppercase">Definir Fecha de Inscripciones</small> </h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info" role="alert">
          <h4><small>Determine la fecha de Culminacion de Inscripciones tarea realizada por el Usuario <em>Secretario.</em></small></h4>
        </div>
        <p><small><strong>Fecha de Culminacion de Inscripciones.</strong></small></p>
        <input type="hidden" name="" class="form-control input-sm" id="idversion" value="<?= $this->session->userdata('idVersion') ?>">
        <input type="date" size="10" class="form-control input-sm" id="fechainscripciones" value="<?= date('Y-m-d'); ?>">
        <div id="mnsjFechaInsc"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-sm" onclick="terminarfInscripciones();">Guardar Cambios</button>
      </div>
      <!-- </form>   -->
    </div>
  </div>
</div>
<!-- MODAL PARA ---ACERCA DE..---JEJE -->
<div class="modal fade" id="acercaDe" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <small class="text text-primary text-uppercase">Acerca de..</small> </h4>
      </div>
      <div class="modal-body">
        <!-- <div class="panel panel-default"> -->

        <hr>

        <!-- </div> -->
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>