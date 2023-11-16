    <nav class="" style="background-color: #2d2d2d;width: 230px;height: 100%;position:absolute;">
    <!-- <div class="contenedor-menu" style="background-color: #2d2d2d;width: 210px;height: 100%;position:absolute;"> -->
        <ul class="nav nav-sidebar">
            <div class="col-md-10 col-md-offset-1 ">
              </br>
              <a class="thumbnail text-center"><?= $nombre?></a>
            </div>
        </ul>
        <ul class="nav nav-pills nav-stacked"><!-- id="accordion" -->
            <li ><!-- role="dropdown presentation" -->
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseAcad">Academico<b class="caret"></b></a><!--  data-toggle="dropdown" class="dropdown-toggle" href="#" -->
                    <ul class="collapse" id="collapseAcad"><!-- role="menu"dropdown-menu -->
                        <li><a href="<?= base_url();?>index.php/version_cerrada/lista_academicos_version/?nombrev=<?= $nombre?>">Academicos</a></li>
                        <li><a href="<?= base_url();?>index.php/version_cerrada/lista_docencia/?nombrev=<?= $nombre?>">Docencia</a></li>
                        <li><a href="<?= base_url();?>index.php/version_cerrada/lista_tutoria/?nombrev=<?= $nombre?>">Tutorias</a></li>
                    </ul>
            </li>
            <li><!--  role="dropdown " class="" -->
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseParticipantes">Participantes<b class="caret"></b></a><!--  data-toggle="dropdown" class="dropdown-toggle" href="#" -->
                    <ul class="collapse" id="collapseParticipantes"><!--role="menu" dropdown-menu -->
                        <li><a href="<?= base_url();?>index.php/version_cerrada/lista_inscritos/?nombrev=<?= $nombre?>">Inscritos</a></li>
                        <li><a href="<?= base_url();?>index.php/version_cerrada/lista_monografias/?nombrev=<?= $nombre?>">Monografias</a></li>
                        <li><a href="<?= base_url();?>index.php/version_cerrada/lista_tribunal/?nombrev=<?= $nombre?>">Defensas</a></li>
                    </ul>
            </li>
        </ul>
    <!-- </div> -->
    </nav> 
        <!-- <script src="<?php echo base_url();?>assets/js/jquery-3.2.0.min.js" type="text/javascript"></script>   
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        $('.dropdown-toggle').dropdown()
        </script> -->