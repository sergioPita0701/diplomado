<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar" style="background-color: #2d2d2d;width: 210px;height: 100%;position:absolute;"><!--  -->
      <div></div>
      <ul class="nav nav-sidebar">
        <div class="col-md-10  ">
          <a class="thumbnail text-center" href="<?= base_url(); ?>index.php/gestion"><?= $nombre ?></a>
        </div>

      </ul>
      <ul class="nav nav-sidebar nav-pills nav-stacked" id="accordion">
        <li class=""><a data-toggle="collapse" data-parent="#accordion" href="#collReg"><img src="<?php echo base_url(); ?>assets/img/Test.png" alt="as.png" style="width: 25px;height:25px;"> Registros<span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collReg">
            <li><a href="<?= base_url(); ?>index.php/academicoseleccionado/lista_seleccionados">Lista de Academicos</a></li>
            <li><a href="<?= base_url(); ?>index.php/docencia/ListaDocencia">Registro de Docentes</a></li>
            <li><a href="<?= base_url(); ?>index.php/monografia/lista_monografia">Lista de Monografias</a></li>
            <li><a href="<?= base_url(); ?>index.php/tutoria/lista_tutoria">Lista de Tutorias</a></li>
            <li><a href="">Lista de Defensas</a>
              <ul><a href="<?= base_url(); ?>index.php/defensa/lista_defensas/1">Primera Defensa</a></ul>
              <ul><a href="<?= base_url(); ?>index.php/defensa/lista_defensas/2">Recuperatorio</a></ul>
            </li>
          </ul>
        </li>
        <li class=""><a data-toggle="collapse" data-parent="#accordion" href="#collCalif"><img src="<?php echo base_url(); ?>assets/img/calificacion3.png" alt="as.png" style="width: 25px;height:25px;"> Calificaciones <span class="sr-only">(current)</span></a>
          <ul class="nav nav-sidebar collapse" id="collCalif">
            <li><a href="">Modulos-Asignaturas de la Versión</a>
              <?php foreach ($modulo as $fila) : ?>

                <ul class=""><a>( <?= convertirANumerosRomanos($fila['nivelM']) . " ) " . $fila['nombreM'];; ?><br><?= $fila['asignaturaNombreM']; ?></a>

                  <?php $mod = $fila['idModulo']; ?>
                  <?php foreach ($paralelo as $fila) : ?>
                    <small>
                      <ul><a href="<?= base_url('index.php/calificacion/calificacion_paralelo/?modulo=' . $fila['numeroM'] . '&paralelo=' . $fila['nombre_paralelo']); ?>"><?= $mod == $fila['idModulo'] ? $fila['nombre_paralelo'] : ''; ?></a></ul>
                    </small>


                  <?php endforeach; ?>
                </ul>

              <?php endforeach; ?>

            </li>
          </ul>
        </li>

      </ul>
    </div>

  </div>
</div>
