<div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-body" id="bodyDetalleDiplo">
            <div class="row">
                <div class="row">
                    <div class="col-md-12 text text-primary">
                        <h4>
                            <center>Informacion de Diplomante - <?= $nombre ?></center>

                        </h4>
                    </div>
                </div>
                <hr>
                <div class="row">

                    <div class="col-md-2 col-md-offset-1">
                        <small><label for="">No. Inscripcion:</label></small> <span class="label label-default"><?= $retVal = empty($transaccion->numeroI) ? "" : $transaccion->numeroI; ?></span>
                    </div>
                    <div class="col-md-2 col-md-offset-">
                        <small><label for="">CI:</label></small>
                        <h4><span id="cidiplo" class="label label-danger"><?= empty($transaccion->ciD) ? "" : $transaccion->ciD; ?></span></h4>
                    </div>
                    <div class=" col-md-4 col-md-offset-">
                        <small><label for="">Nombre Completo:</label></small>
                        <h4><span class="label label-danger"> <?= $transaccion->nombreD . "  " . $transaccion->apellidoPaternoD . "  " . $transaccion->apellidoMaternoD; ?></span></h4>
                    </div>
                    <div class=" col-md-3 col-md-offset-">
                        <small><label for="">Fecha de Inscripcion:</label></small> <span class="label label-default"><?= empty($transaccion->fechaInscripcionI) ? "" : $transaccion->fechaInscripcionI; ?></span>
                    </div>
                </div>
                <!-- <hr> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row col-md-12">
                            <button type="button" id="ocultar" onClick="ocultardetalle();" class="close" data-dismiss=""><span class="glyphicon glyphicon-menu-up btn-xs"></span></button>
                            <button type="button" id="mostrar" onClick="mostrardetalle();" class="close" data-dismiss="" hidden="hidden"><span class="glyphicon glyphicon-menu-down btn-xs"></span></button>
                        </div>
                        <div class="row" id="detalle2">
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group  ">
                                    <small><label for="">Ciudad Actual:</label> <?= $transaccion->ciudadD; ?></small></br>
                                    <small><label for="">Direccion:</label> <?= $transaccion->direccionI; ?></small>

                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <small><label for="">E-mail:</label> <?= $transaccion->emailI; ?></small></br>
                                <small><label for="">Telefono:</label> <?= $transaccion->telefonoI; ?></small>
                            </div>
                            <div class="col-md-3">
                                <small><label for="">Sexo:</label> <?= $transaccion->sexoI; ?></small></br>
                                <small><label for="">Celular:</label> <?= $transaccion->celularI; ?></small>
                            </div>
                        </div>
                        <div class="row" id="detalle3">
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group  ">
                                    <small><label for="">Pais de Nac.:</label> <?= $transaccion->paisnacI; ?></small></br>
                                    <small><label for="">Fecha de Nac.:</label> <?= $transaccion->fechanacI; ?></small>
                                </div>
                            </div>
                            <div class="form-group col-md-7">
                                <small><label for="">Departamento de Nac.:</label> <?= $transaccion->departamentonacI; ?></small></br>
                                <small><label for="">Estado Civil:</label> <?= $transaccion->estadoCivilI; ?></small></br>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <hr>
            <div class="row">

                <span <?= ($this->session->userdata('tipo') == 'Administrador') ? "hidden" : "" ?>>
                    <div class="col-md-4 col-md-offset-8">
                        <a href="<?= base_url(); ?>index.php/pago/formCrearpago/<?= $transaccion->idTransaccion; ?>" data-toggle="modal" data-target="#modalCrearPago" data-backdrop="static" data-keyboard="false">Crear Nuevo Pago</a>
                    </div>
                </span>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <center>
                        <h5 class="text-primary"><em>Estado De pagos</em></h5>
                    </center>
                    <div class="table-responsive ">

                        <table class="table  table-striped ">
                            <thead class="">
                                <th class="active"><small>#</small></th>
                                <th class="active"><small>Fecha De Depósito</small></th>
                                <th class="active"><small>Num. Depósito</small></th>
                                <th class="active"><small>Tasa Cambio</small></th>
                                <th class="active"><small>Monto $us</small></th>
                                <th class="active"><small>monto Bs</small></th>
                                <th class="active"><small>Operaciones</small></th>
                                <!-- <th class="active">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </th> -->
                            </thead>
                            <tbody>
                                <?php $i = 0;  ?>
                                <?php foreach ($pagos as $fila) : ?>
                                    <tr>
                                        <td><strong><?= $i = $i + 1;  ?></strong></td>
                                        <!--  <td><small><?= $fila['idPago']; ?></small></td> -->
                                        <td><small><?= $fila['fechaDepositoP']; ?></small></td>
                                        <td><small><?= $fila['numeroDepositoP']; ?></small></td>
                                        <td><small><?= $fila['tasaCambioP']; ?></small></td>

                                        <?php if ($fila['monedaP'] === 'USD') : ?>
                                            <td><small><?= $fila['montoP']; ?></small></td>
                                            <td><small><?= $fila['montoTotalBsP']; ?></small></td>
                                        <?php endif; ?>
                                        <?php if ($fila['monedaP'] === 'BS') : ?>
                                            <td></td>
                                            <td><small><?= $fila['montoTotalBsP']; ?></small></td>
                                        <?php endif; ?>
                                        <td>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-sm"> <!-- Agregamos la clase dropdown-menu-sm para reducir el tamaño -->
                                                    <li>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-xs editar-transaccion-pago" data-pago-id="<?= $fila['idPago']; ?>">
                                                                <span class="glyphicon glyphicon-cog glyphicon-sm"></span> Editar&nbsp&nbsp&nbsp&nbsp;
                                                            </button>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('index.php/transaccion/eliminarPagoTransaccion/' . $fila['idPago'] . '/' . $fila['idTransaccion']); ?>" class="btn btn-danger btn-xs" style="color: white;" onclick="return confirm('Desea Realmente Eliminar El pago?');">
                                                                <span class="glyphicon glyphicon-remove-circle glyphicon-sm"></span> Eliminar
                                                            </a>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="row mb" id="detalle2">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group  ">
                                <small><label for="">Costo Total del Programa:</label> </small>
                            </div>
                        </div>

                        <div class="col-md-3 col-md-offset-4">
                            <div class="form-group  ">
                                <small><?= $version->costoV; ?> BS.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group  ">
                                <small><label for="">Matricula :</label> </small>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-4">
                            <div class="form-group  ">
                                <small><?= $version->costoMatriculaV; ?> BS.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group  ">
                                <small><label for="">Módulos</label> </small>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group  ">
                                <small><label for="">Cursado</label> </small>
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class="form-group  ">
                                <small><label for="">Total</label> </small>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group  ">

                            </div>
                        </div>
                    </div>
                    <div class="row mb">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group  ">
                                <small><label for="">Colegiatura</label> </small>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group  ">
                                <small><label for=""><?= $asignacionesCount; ?></label> </small>
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class="form-group  ">
                                <small><label for=""><?= $modulosCount; ?></label> </small>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group  ">
                                <small> <?= $version->costoModulosV; ?> Bs.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group  ">
                                <small><label for="">Descuento</label> </small>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group  ">
                                <?php if ($transaccion->porcentajeD == 0) : ?>
                                    <small><label for="">0 %</label></small>
                                <?php endif; ?>

                                <?php if ($transaccion->porcentajeD > 0) : ?>
                                    <small><label for=""><?= $transaccion->porcentajeD; ?> %</label></small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class="form-group  ">


                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group  ">
                                <small> <?= $transaccion->montoOriginalT - $transaccion->montoDescuentoT; ?> Bs.</small>

                            </div>

                        </div>

                    </div>
                    <hr>
                    <div class="row mb">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group  ">
                                <small><label for="">Total a Cancelar</label> </small>
                            </div>
                        </div>

                        <div class="col-md-3 col-md-offset-4">
                            <div class="form-group  ">
                                <small> <?= $transaccion->montoDescuentoT; ?> Bs.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group  ">
                                <small><label for="">Depositado</label> </small>
                            </div>
                        </div>

                        <div class="col-md-3 col-md-offset-4" style="color: #336699;">
                            <div class="form-group monto-resaltado">
                                <small><?= $transaccion->sumaPagos; ?> Bs.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group  ">
                                <small><label for="">Saldo por pagar</label> </small>
                            </div>
                        </div>

                        <div class="col-md-3 col-md-offset-4">
                            <div class="form-group monto-resaltado">
                                <?php if ($transaccion->montoDescuentoT - $transaccion->sumaPagos > 0) : ?>
                                    <small style="color: #FF5733;"><?= $transaccion->montoDescuentoT - $transaccion->sumaPagos; ?> Bs.</small>

                                <?php endif; ?>
                                <?php if ($transaccion->montoDescuentoT - $transaccion->sumaPagos <= 0) : ?>
                                    <small>0 Bs.</small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group  ">
                                <small><label for="">Saldo a Favor</label> </small>
                            </div>
                        </div>

                        <div class="col-md-3 col-md-offset-4">
                            <div class="form-group monto-resaltado">
                                <?php if ($transaccion->montoDescuentoT - $transaccion->sumaPagos < 0) : ?>
                                    <small style="color: green;"><?= $transaccion->montoDescuentoT - $transaccion->sumaPagos; ?> Bs.</small>

                                <?php endif; ?>
                                <?php if ($transaccion->montoDescuentoT - $transaccion->sumaPagos >= 0) : ?>
                                    <small>0 Bs.</small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="irasignarodulo">
            <div class="col-md-3 col-md-offset-1 form-inline">
                <a href="<?= base_url('transaccion/listaPagoTransaccionesImprimir/' . $version->idVersion . '/' . $transaccion->idTransaccion); ?>" class="btn btn-primary btn-group btn-sm">
                    <span class="glyphicon glyphicon-print"></span> Imprimir
                </a>
            </div>

            <!-- <div class="col-md-2 form-inline">
               <a href="<?= $_SERVER['HTTP_REFERER']; ?>">Volver</a>    
            </div> -->
        </div></br></br>
    </div>
</div>

<!-- <?php include_once(__DIR__ . '/../v_pago/crear_pago.php'); ?> -->
<?php include_once('crear_pago_transaccion.php'); ?>
<?php include_once('editar_pago_transaccion.php'); ?>