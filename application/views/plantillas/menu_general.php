<div class="container-fluid">
  <div class="row">
      <div class="col-xs-3 col-md-2 sidebar">
        
        <ul class="nav nav-sidebar">
            <li class=""><a class="" href="<?= base_url();?>index.php/principal">.
            <img alt="" src="<?php echo base_url();?>assets/img/modulo1.png" class="img-thumbnail" style="width: 110px; height:100px;"></a></li>
        </ul>
        <ul class="nav nav-sidebar">
          <li class="active"><a href="<?= base_url();?>index.php/modulo">Version Diplomado<span class="sr-only">(current)</span></a>
          <ul >
            <li>Versiones Habilitadas
              <?php foreach($version as $fila):?>
                <ul><a href="<?= base_url();?>index.php/version/ingresarv?nombre=<?=$fila['nombreV'];?>&estado=<?= '1';?>"><?=$fila['nombreV']; ?></a></ul>
              <?php endforeach;?>
            </li>
            <li><a href="<?= base_url();?>index.php/version/registroV">Registro de Versiones</a></li>
            <li><a href="<?= base_url();?>index.php/version">Nueva Version</a></li>
          </ul>
          <li class="active"><a href="">Academicos<span class="sr-only">(current)</span></a>
            <ul>
            
              <li><a href="<?= base_url();?>index.php/academico">Nuevo Academico</a></li>
              <li><a href="<?= base_url();?>index.php/academico/listaAcademico">Lista de Academicos</a></li>
              <li><a href="#">Designacion de Cargo</a></li>
              <li><a href="<?= base_url();?>index.php/profesion">Profesiones</a></li>
              <li><a href="<?= base_url();?>index.php/especialidad">Estudios de Posgrado</a></li>
            </ul>
          </li>  
          <li class="active"><a href="<?= base_url();?>index.php/gestion/gestion_modulo">Configuraciones <span class="sr-only">(current)</span></a>
            <ul class="">
              
            </ul>
            <ul class="">
              
            </ul>
          </li>
            
            
          </ul>
          </li>
          treview php buscar
        </ul>
      </div>
        
  </div>
</div>
    