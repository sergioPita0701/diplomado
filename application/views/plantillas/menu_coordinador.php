<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar" style="background-color: #2d2d2d;width: 230px;height: 100%;position:absolute;"><!--  -->
      <div></div>
      <ul class="nav nav-sidebar">
        <div class="col-md-10  ">
          <a class="thumbnail text-center" href="<?= base_url(); ?>index.php/gestion"><?= $nombre ?></a>
        </div>

      </ul>
      <ul class="nav nav-sidebar nav-pills nav-stacked" id="accordion"><!--  menu-->
        <li class="titulo"><a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><img src="<?php echo base_url(); ?>assets/img/calificacion3.png" alt="as.png" style="width: 25px;height:25px;"> Calificaciones <span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collapse1">
            <li><a>Modulo-Asignaturas de la Versión</a>
              <?php foreach ($modulo as $fila) : ?>
                <ul class="">
                  ( <?= convertirANumerosRomanos($fila['nivelM']) . " - "  . $fila['nombreM'] . " ) " ?><br><?= $fila['asignaturaNombreM']; ?>

                  <?php $mod = $fila['idModulo']; ?>
                  <?php foreach ($paralelo as $fila) : ?>
                    <small>
                      <ul class="">
                        <a href="<?= base_url('index.php/calificacion/calificacion_paralelo/?modulo=' . $fila['numeroM'] . '&paralelo=' . $fila['nombre_paralelo']); ?>">
                          <?= $mod == $fila['idModulo'] ? $fila['nombre_paralelo'] : ''; ?>
                        </a>
                          
                      </ul>
                    </small>

                  <?php endforeach; ?>
                </ul>

              <?php endforeach; ?>

            </li>
          </ul>
        </li>
        <li class="titulo"><a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><img src="<?php echo base_url(); ?>assets/img/monografias.png" alt="as.png" style="width: 25px;height:25px;">Monografia<span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collapse2">
            <li><a href="<?= base_url(); ?>index.php/monografia/lista_monografia">Lista de Monografias</a></li>
            <li><a href="<?= base_url(); ?>index.php/academico/listaAcademico/6">Designacion de Tutor</a></li>
            <li><a href="<?= base_url(); ?>index.php/tutoria/lista_tutoria">Lista de Tutorias</a></li>
            <li><a href="<?= base_url(); ?>index.php/defensa">Registrar Defensa</a></li>
            <li><a href="">Lista de Defensas</a>
              <ul><a href="<?= base_url(); ?>index.php/defensa/lista_defensas/1">Primera Defensa</a></ul>
              <ul><a href="<?= base_url(); ?>index.php/defensa/lista_defensas/2">Recuperatorio</a></ul>
            </li>
          </ul>
        </li>
        <li class="titulo"><a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><img src="<?php echo base_url(); ?>assets/img/academicos3.png" alt="as.png" style="width: 25px;height:25px;"> Academicos<span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collapse3">

            <li><a href="<?= base_url(); ?>index.php/academico">Nuevo Academico</a></li>
            <li><a>Lista de Academicos</a>
              <ul><a href="<?= base_url(); ?>index.php/academicoseleccionado/lista_seleccionados">Academicos de la version</a></ul>
              <ul><a href="<?= base_url(); ?>index.php/academico/listaAcademico">Todos</a></ul>
            </li>
          </ul>
        </li>
        <li class="titulo"><a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><img src="<?php echo base_url(); ?>assets/img/docente2.png" alt="as.png" style="width: 25px;height:25px;"> Docencia<span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collapse4">
            <li><a href="<?= base_url(); ?>index.php/docencia">Asignar Docente a Modulo</a></li>
            <li><a href="<?= base_url(); ?>index.php/docencia/ListaDocencia">Registro de Docentes</a></li>
          </ul>
        </li>
        <li class="titulo"><a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><img src="<?php echo base_url(); ?>assets/img/Test.png" alt="as.png" style="width: 25px;height:25px;"> Registros <span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collapse5">
            <!-- <li><a href="<?= base_url(); ?>index.php/diplomante">Alumnos</a></li> -->
            <li><a href="<?= base_url(); ?>index.php/inscripcion/registroInscripciones">Alumnos</a></li>
            <li><a href="">Modulo-Asignaturas</a>
              <ul><a href="<?= base_url(); ?>index.php/modulo/">Modulo-Asignaturas</a></ul>
              <ul><a href="<?= base_url(); ?>index.php/paralelo/">Paralelos</a></ul>
            </li>
            <li><a href="<?= base_url(); ?>index.php/profesion">Profeciones</a></li>
            <li><a href="<?= base_url(); ?>index.php/especialidad">Estudios Superiores/Especialid</a></li>

          </ul>
        </li>
        <li class="titulo"><a data-toggle="collapse" data-parent="#accordion" href="#collapse6"><img src="<?php echo base_url(); ?>assets/img/pagoMulta.png" alt="as.png" style="width: 25px;height:25px;"> Pagos <span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collapse6">
            <li><a href="<?= base_url(); ?>index.php/descuento">Descuentos</a></li>
            <li><a href="<?= base_url(); ?>index.php/multa">Multas</a></li>
          </ul>
        </li>
      </ul>
    </div>

  </div>
</div>