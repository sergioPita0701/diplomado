<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<!--<form action="<?= base_url()?>index.php/inscripcion" method="post" class="form">-->
    <legend><h3><?= $nombreM;?> </h3></legend>
    
    <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>No.</th>
                        <th>Nombre Completo</th>
                        <th>Carnet Identidad</th>
                        <th>Nota</th>
                        <th>Modulo</th>
                    </thead>
                    <tbody>
                        
                        <?php $i=0;  ?><!--contador de la lista-->
                       <?php foreach($modulodiplomante as $fila):?>
                            <tr>
                                <td><?= $i=$i+1;  ?></td><!--contador de la lista-->
                                <td><?= $fila->nombreD." ".$fila->apellidoPaternoD." ".$fila->apellidoMaternoD;?></td>
                                <td><?= $fila->ciD;?></td>
                                <td><?= $fila->nota ;?></td>
                                <td><?= $fila->nombreM;?></td>
                                <td>
                                    <a  href="" class="btn btn-success btn-group btn-xs" >
                                    <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    
                                    <a href="" type="reset" class="btn btn-danger btn-group btn-xs" onclick="return confirm('Desea realmente eliminar Modulo?');">
                                    <span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<!--</form>-->
</div>