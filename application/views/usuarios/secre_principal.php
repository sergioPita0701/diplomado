<div class="container">
    <!-- <div class="col-md-6 col-md-offset-2">
    <select class="form-control">
    
    <?php foreach($version as $fila):?>
        <option><?=$fila['nombreV']; ?></option>
    <?php endforeach;?>
    </select>
    </div> -->
    <div class="row" style="padding:30px; ">

        <div class="col-md-6 col-md-offset-2">
            <a type="button" id="inscripciones" class="btn" href="<?php echo base_url().'index.php/version/ingresarv'?>">
                <img src="<?php echo base_url();?>assets/img/modulo1.png" alt="alumnos.png" class="img-responsive img-circle img-sm " 
                style="width: 150px; height:150px; background-color:#eee;">
                <p class="text-center">Version Actual</p> 
            </a>
        </div>
        <div class="col-md-4">
            <a class="btn" href="<?php echo base_url().'index.php/version/registroV'?>">
                <img src="<?php echo base_url();?>assets/img/afiche2.jpg" alt="afiche.png" class="img-responsive img-circle" 
                style="width: 150px; height:150px; background-color:#eee;">
                <p class="text-center">Informes/Gestiones</p>
            </a>
        </div>
    </div>
</div>