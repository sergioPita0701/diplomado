    <header>
        <div class="container">
                <div class="row">
                    <div class="head">    
                        <div class="col-md-9 col-md-offset-2">
                            <div class="panel-panel-default "><!-- pa -->
                                <center>
                                    <h3><p class="text-center text-primary">DIPLOMADO EN DOCENCIA PARA EDUCACION SUPERIOR </p></h3>
                                    <h4><p class="text-center text-primary">FACULTAD DE HUMANIDADES Y CIENCIAS DE LA EDUCACION DE LA U.M.R.P.S.F.X.CH.</p></h4>
                                    <!-- <h4><p class="text-center text-primary">MODALIDAD VIRTUAL</p></h4> -->
                                </center>
                            </div> 
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                </div> 
        </div>
    </header></br>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form role="form" class="form" action="<?php echo base_url();?>index.php/autenticacion/iniciar_sesion_post" method="post">
                <div class="panel panel-default">    
                
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Autenticación</h3>
                    </div>
                    <div class="panel-body">
                            <!-- <div class="row"> -->
                                <input type="text" class="form-control" name="txtUsuario" placeholder="Usuario" value="<?= set_value('txtUsuario');?>">
                                <?= form_error('txtUsuario','<div class="alert alert-danger"><small>','</small></div>');?></br>
                                <input type="password" class="form-control" name="txtContraseña" placeholder="Contraseña">
                                <?= form_error('txtContraseña','<div class="alert alert-danger"><small>','</small></div>');?></br>
                            <!-- </div> -->
                            
                            <div class="row">
                              <div ><?= $mensaje?></div>   
                            </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row ">
                            <div class="col-md-4 col-md-offset-8">
                                <input type="submit" class="btn btn-default btn-sm" value="Ingresar"></input>
                            </div>
                        </div>
                    </div> 
                </div>      
            </form> 
        </div>
    </div>
    
</div>




