<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">  
    <div class="row">
        <div class="col-md-11">
           <h2>Modulo-Asignaturas:</h2>
        </div>    
    </div>   
    <div class="row">
        <div class="col-md-11" id="">
            <div class="">
            <ul class="list-group">
                <?php foreach($modulo as $fila):?>
                <div class="col-md-8">
                    <a href="<?= base_url('index.php/modulodiplomante/registroModuloDiplomante/'.$fila['nombreM']) ;?>"><h4><?=$fila['numeroM']; ?>:  <?=$fila['nombreM']; ?></h4></a>
                </div>
                <div class="col-md-4">
                    <h4><?=$nombre; ?></h4>
                </div>
                
                <?php endforeach;?>
            </ul>
            </div>
        </div>
        
    </div>
</div>