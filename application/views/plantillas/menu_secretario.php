<div class="container-fluid">
  <div class="row">
    <div class="col-xs-3 col-md-2 sidebar" style="background-color: #2d2d2d;width: 210px;height: 100%;position:absolute;">
      <div></div>
      <ul class="nav nav-sidebar">
        <div class="col-md-10  ">
          <a class="thumbnail text-center" href="<?= base_url(); ?>index.php/gestion"><?= $nombre ?></a>
        </div>

      </ul>
      <ul class="nav nav-sidebar nav-pills nav-stacked">
        <li class=""><a data-toggle="collapse" data-parent="#accordion" href="#collInscripciones"><img src="<?php echo base_url(); ?>assets/img/inscripcion.png" alt="as.png" style="width: 25px;height:25px;">Inscripciones<span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collInscripciones">
            <?php
            date_default_timezone_set('America/Caracas');
            $fechaActual = date("Y-m-d");

            if ($this->session->userdata('fechainscripciones') >= $fechaActual || $this->session->userdata('fechainscripciones') == NULL) {
            ?>
              <li><a href="<?= base_url(); ?>index.php/inscripcion/inscripciones">Nueva Inscripcion</a></li>
            <?php  } else {
            ?>
              <li><a href="<?= base_url(); ?>index.php/inscripcion/inscripciones">Nueva Inscripcion borrar</a></li>

              <li><a class="text text-danger"><small> Inscripciones Cerradas</small></a></li>
              <li><a class="text text-danger"><small> Fecha Cierre <?php $this->session->userdata('fechainscripciones') ?></small></a></li>
            <?php  }

            ?>
            <li><a href="<?= base_url(); ?>index.php/inscripcion/registroInscripciones">Participantes Matriculados</a></li>


          </ul>
        </li>
        <li class=""><a data-toggle="collapse" data-parent="#accordion" href="#collModulos"><img src="<?php echo base_url(); ?>assets/img/modulos2.png" alt="as.png" style="width: 25px;height:25px;">Modulo-Asignaturas <span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collModulos">
            <li><a href="<?= base_url(); ?>index.php/modulodiplomante/incripcion_diplomate_modulo">Asignar Modulo a Diplomantes</a></li>
            <li><a href="">Participantes Programados</a>
              <?php foreach ($modulo as $fila) : ?>

                <ul class=""><a>( <?= convertirANumerosRomanos($fila['nivelM']) . " ) " . $fila['nombreM'];; ?><br><?= $fila['asignaturaNombreM']; ?></a>

                  <?php $mod = $fila['idModulo']; ?>
                  <?php foreach ($paralelo as $fila) : ?>
                    <!-- <li> -->
                    <small>
                      <ul>
                        <a href="<?= base_url('index.php/modulodiplomante/registro_asignaciones/?modulo=' . $fila['numeroM'] . '&paralelo=' . $fila['nombre_paralelo']); ?>">
                          <?= $mod == $fila['idModulo'] ? $fila['nombre_paralelo'] : ''; ?>
                        </a>
                      </ul>
                    </small>
                    <!-- </li> -->

                  <?php endforeach; ?>
                  <!-- <small><ul><a href="<?= base_url('index.php/modulodiplomante/registro_todas_asignaciones/' . $fila['numeroM']); ?>"><?= $fila['nombreM']; ?>Todos</a></ul></small>  -->
                </ul>

              <?php endforeach; ?>

            </li>
          </ul>
        </li>
        <!-- <li class=""><a data-toggle="collapse" data-parent="#accordion" href="#collCalificaciones"><img src="<?php echo base_url(); ?>assets/img/calificacion3.png" alt="as.png" style="width: 25px;height:25px;">Calificaciones <span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collCalificaciones">
            <li><a href="<?= base_url(); ?>index.php/docencia/ListaDocencia">Registro de Docentes</a></li>
            <li><a href="">Modulos de la Versión</a>
              <?php foreach ($modulo as $fila) : ?>
                 <ul class=""><a>( <?= convertirANumerosRomanos($fila['nivelM']) . " ) " . $fila['nombreM'];; ?><br><?= $fila['asignaturaNombreM']; ?></a>

                  <?php $mod = $fila['idModulo']; ?>
                  <?php foreach ($paralelo as $fila) : ?>
                    <small>
                      <ul>
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
        </li> -->
        <li class=""><a data-toggle="collapse" data-parent="#accordion" href="#collAcademicos"><img src="<?php echo base_url(); ?>assets/img/academicos2.png" alt="as.png" style="width: 25px;height:25px;">Academicos<span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collAcademicos">
            <li><a href="<?= base_url(); ?>index.php/docencia/ListaDocencia">Registro de Docentes</a></li>
          </ul>
        </li>
        <li class=""><a data-toggle="collapse" data-parent="#accordion" href="#collPagos"><img src="<?php echo base_url(); ?>assets/img/pago.png" alt="as.png" style="width: 25px;height:25px;">Pagos<span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collPagos">
            <!-- <li><a href="<?= base_url(); ?>index.php/pago">Registro de Pagos</a></li> -->
            <!-- <li><a href="<?= base_url(); ?>index.php/pago/detallePagoDiplomante/">Pagos Realizados</a></li> -->
            <li><a href="<?= base_url(); ?>index.php/transaccion/">Transacciones</a></li>
          </ul>
        </li>
      </ul>
    </div>

  </div>
</div>