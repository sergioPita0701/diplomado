    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= base_url();?>index.php/version/registroV">Registro de Versiones</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="visible-xs"><a href="">Modulo</a></li>
            <?php foreach($modulo as $fila):?>
              <ul class="visible-xs"><a href="<?= base_url();?>index.php/"><?=$fila['nombreM']; ?></a></ul>
            <?php endforeach;?>

            <li class="visible-xs"><a href="">Alumnos</a></li>
            
            <li><a href="">Version</a></li>
            <li><a href="<?= base_url();?>index.php/version/cerrar_sesion">Cerrar Version</a></li>
          </ul>

        </div>
      </div>
    </nav>



