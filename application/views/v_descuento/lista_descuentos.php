<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row panel panel-default">
        <div class="resultado"></div>
        <div class="col-md-10 col-md-offset-1 main">

            <div class="row">
                <div class="form-inline col-md-3">
                    <!-- <button >Large modal</button> -->
                    <a href="" type="" class="" data-toggle="modal" data-target="#modalCrearDescuento" data-backdrop="static" data-keyboard="false">Insertar Descuento</a>

                </div>

            </div>
        </div>
        <div class="col-md-10 col-md-offset-1" id="listaprofesion">
            <div class="table-responsive">
                <table class="table table-hover" id="profesion" style="width:850px">

                    <thead style="display: block;">
                        <th style="width:100px;word-break:break-word" class="success">ID</th>

                        <th style="width:200px;word-break:break-word" class="success">Nombre </th>
                        <th style="width:200px;word-break:break-word" class="success">Descripción </th>
                        <th style="width:400px;word-break:break-word" class="success">Porcentaje de Descuento %</th>
                        <th style="width:200px;word-break:break-word" class="success">Estado</th>
                        <th style="width:150px;word-break:break-word" class="success"></th>
                    </thead>
                    <tbody style="display: block; height: 400px; overflow-y: auto; overflow-x: hidden;">
                        <?php $i = 0;  ?>
                        <?php foreach ($descuentos as $fila) : ?>
                            <tr>
                                <td style="width:100px;word-break:break-word"><?= $fila['idDescuento']; ?></td>
                                <td style="width:200px;word-break:break-word"><?= $fila['nombreD']; ?></td>
                                <td style="width:200px;word-break:break-word"><?= $fila['descripcionD']; ?></td>
                                <td style="width:400px;word-break:break-word"><?= $fila['porcentajeD']; ?> </td>
                                <td class="px-3 py-2" style="word-break: break-word; width: 150px;">
                                    <?php echo ($fila['estadoD'] == 1) ? '<span class="badge badge-success" style="background-color: #5cb85c; color: white;">Vigente</span>' : '<span class="badge badge-danger" style="background-color: #d9534f; color: white;">No Vigente</span>'; ?>
                                </td>


                                <td style="width:150px;word-break:break-word">

                                    <button type=" button" class="btn btn-success editar-descuento" data-descuento-id="<?= $fila['idDescuento']; ?>" data-nombre="<?= $fila['nombreD']; ?>" data-descripcion="<?= $fila['descripcionD']; ?>" data-porcentaje="<?= $fila['porcentajeD']; ?>" data-estado="<?= $fila['estadoD']; ?>">
                                        <span class="glyphicon glyphicon-cog"></span>

                                    </button>

                                    <!-- <button type="button" 
                                    class="btn btn-success editar-descuento" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#detalleDescuentoModal" 
                                    data-descuento-id="<?= $fila['idDescuento']; ?>"
                                     data-nombre="<?= $fila['nombreD']; ?>" 
                                     data-descripcion="<?= $fila['descripcionD']; ?>" 
                                     data-valor="<?= $fila['valorD']; ?>" 
                                     data-tipo="<?= $fila['tipoDescuento']; ?>">
                                        Ver Detalles
                                    </button> -->
                                    <a href="<?= base_url(); ?>index.php/descuento/eliminarDescuento?idDescuento=<?= $fila['idDescuento']; ?>" onclick="return confirm('Desea Eliminar Descuento?')" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div></br>
        </div>
    </div>
</div>
<?php include_once('crear_descuento.php'); ?>
<?php include_once('editar_descuento.php'); ?>