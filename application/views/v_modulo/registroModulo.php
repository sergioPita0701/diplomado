<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main">
    <h4>Modulo-Asignaturas Registrados</h4>
    <div class="table-bordered">
        <table class="table">
            <thead>
                <th class="">Num.</th>
                <th class="">Nombre</th>
                <th class="">Descripcion</th>
                <th class="">Version</th>
                <th class="">Operacion</th>
            </thead>
            <tbody>
                <?php foreach ($modulo as $fila) : ?>
                    <tr>
                        <!--<td></td>-->
                        <td><?= $fila['numeroM']; ?></td>
                        <td><?= $fila['nombreM']; ?></td>
                        <td><?= $fila['descripcionM']; ?></td>
                        <td><?= $fila['idVersion']; ?></td>
                        <td>
                            <!-- Button modal -->
                            <a href="<?= base_url('index.php/modulo/detallarM/' . $fila['numeroM']); ?>" type="reset" class="btn btn-success btn-group btn-xs">
                                <span class="glyphicon glyphicon-edit"></span></a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Ver Detalles</h4>
                                        </div>
                                        <form action="http://localhost:8080/diplomado//index.php/modulo/editaMod" method="POST" role="form">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <li id="numsele" class=" lu-sm" name=""></li>
                                                        <input type="hidden" id="txtnumsele" name="txtnumsele" class="form-control input-sm">
                                                    </div>
                                                    <div class="col-md-3 col-md-offset-4">
                                                        <input type="button" class="btn btn-xs" value="Editar" onclick="habilitaredicionmod()"><br>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <li id="nombresele" class=" lu-sm"></li>
                                                        <input type="hidden" id="txtnombresele" name="txtnombresele" class="form-control input-sm">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <li id="descripcionsele" class=" lu-sm"></li>
                                                        <input type="hidden" id="txtdescripcionsele" name="txtdescripcionsele" class="form-control input-sm">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <li id="versionsele" class=" lu-sm"></li>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                <input type="submit" class="btn btn-primary" value="Actualizar">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <b type="" class="btn btn-danger btn-group btn-xs">
                                <span class="glyphicon glyphicon-remove"></span></b>

                            <!--prueba,nofunciona,envia al controlador su nueroM supuestamnt, hacer para q salga el mensaje "se elimino!"-->
                            <c href="<?= base_url('index.php/modulo/deleteModotro/' . $fila['numeroM']); ?>" type="reset" class="btn btn-danger btn-group btn-xs">
                                <span class="glyphicon glyphicon-remove"></span>
                            </c>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>