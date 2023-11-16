<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="page-header">
                    <h3>Defensa <small>Lista de Monografias</small></h3>
                </div>
                <!-- <div class="row">
                <div class="col-md-5 col-md-offset-6" >
                    <form action="http://localhost:8080/diplomado/index.php/tutorias/lista_seleccionados" method="post">
                        <div class="">
                            <div class="input-group">
                                    <input type="text" id="" name="txtBuscarS" class="form-control" placeholder="Buscar Monografia por CI de Diplomante " value="<?= set_value('txtBuscar'); ?>">
                                <span class="input-group-btn">
                                    <input class="btn btn-default active" type="submit" value="Buscar">
                                </span>
                            </div>
                        </div>
                    </form>  
                </div>
                
            </div> -->
                <hr>

                <div class="col-md-12" id="listaMonografia">
                    <div class="table-responsive ">
                        <table class="table  table-hover " style="table-layout:; width:1150px">
                            <thead class="">
                                <th class="active">No.</th>
                                <th style="display:none"></th>
                                <th class="active">Participante</th>
                                <th class="active">Ci</th>
                                <th class="active">Titulo Monografia</th>
                                <th class="active">Inicio</th>
                                <th class="active">Hasta</th>
                                <th class="active">Descripcion</th>
                            </thead>
                            <tbody>
                                <?php $i = 0;  ?>
                                <?php foreach ($monografia as $fila) : ?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="display:none"><?= $fila['idMonografia']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['nombreD'] . " " . $fila['apellidoPaternoD'] . " " . $fila['apellidoMaternoD']; ?></td>
                                        <td style="width:100px; word-break:break-word"><?= $fila['ciD']; ?></td>
                                        <td style="width:350px; word-break:break-word"><?= $fila['tituloMonografia']; ?></td>
                                        <td style="width:125px; word-break:break-word"><?= $fila['fecha_inicioMo']; ?></td>
                                        <td style="width:125px; word-break:break-word"><?= $fila['fecha_finalMo']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['descripcionMo']; ?></td>
                                        <!-- <td style="width:200px; word-break:break-word" >
                                        <a class="btn btn-success btn-group btn-sm" href="">
                                        <span class="glyphicon glyphicon-education"></span>Defenza
                                        </a>
                                    </td> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- EDITAR MONOGRAFIA -->