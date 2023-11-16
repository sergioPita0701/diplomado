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
                        <small><label for="">No. Inscripcion:</label></small> <span class="label label-default"><?= $retVal = empty($diplomanteinscrito[0]->numeroI) ? "" : $diplomanteinscrito[0]->numeroI; ?></span>
                    </div>
                    <div class="col-md-2 col-md-offset-">
                        <small><label for="">CI:</label></small>
                        <h4><span id="cidiplo" class="label label-danger"><?= empty($diplomanteinscrito[0]->ciD) ? "" : $diplomanteinscrito[0]->ciD; ?></span></h4>
                    </div>
                    <div class=" col-md-4 col-md-offset-">
                        <small><label for="">Nombre Completo:</label></small>
                        <h4><span class="label label-danger"> <?= empty($diplomanteinscrito[0]->nombreD) ? "" : $diplomanteinscrito[0]->nombreD . "  " . $diplomanteinscrito[0]->apellidoPaternoD . "  " . $diplomanteinscrito[0]->apellidoMaternoD; ?></span></h4>
                    </div>
                    <div class=" col-md-3 col-md-offset-">
                        <small><label for="">Fecha de Inscripcion:</label></small> <span class="label label-default"><?= empty($diplomanteinscrito[0]->fechaInscripcionI) ? "" : $diplomanteinscrito[0]->fechaInscripcionI; ?></span>
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
                                    <small><label for="">Ciudad Actual:</label> <?= $diplomanteinscrito[0]->ciudadD; ?></small></br>
                                    <small><label for="">Direccion:</label> <?= $diplomanteinscrito[0]->direccionI; ?></small>

                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <small><label for="">E-mail:</label> <?= $diplomanteinscrito[0]->emailI; ?></small></br>
                                <small><label for="">Telefono:</label> <?= $diplomanteinscrito[0]->telefonoI; ?></small>
                            </div>
                            <div class="col-md-3">
                                <small><label for="">Sexo:</label> <?= $diplomanteinscrito[0]->sexoI; ?></small></br>
                                <small><label for="">Celular:</label> <?= $diplomanteinscrito[0]->celularI; ?></small>
                            </div>
                        </div>
                        <div class="row" id="detalle3">
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group  ">
                                    <small><label for="">Pais de Nac.:</label> <?= $diplomanteinscrito[0]->paisnacI; ?></small></br>
                                    <small><label for="">Fecha de Nac.:</label> <?= $diplomanteinscrito[0]->fechanacI; ?></small>
                                </div>
                            </div>
                            <div class="form-group col-md-7">
                                <small><label for="">Departamento de Nac.:</label> <?= $diplomanteinscrito[0]->departamentonacI; ?></small></br>
                                <small><label for="">Estado Civil:</label> <?= $diplomanteinscrito[0]->estadoCivilI; ?></small></br>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <center>
                        <h5 class="text-primary"><em>Estado De pagos</em></h5>
                    </center>
                    <div class="table-responsive ">
                        <table class="table  table-striped ">
                            <thead class="">
                                <th class="active"><small>#</small></th>
                                <th class="active"><small>Inscripcion</small></th>
                                <th class="active"><small>Version</small></th>
                                <th class="active"><small>Módulo</small></th>
                                <th class="active"><small>Calificación</small></th>
                                <th class="active"><small>Establece</small></th>
                                <th class="active"><small>F.Asignacion</small></th>
                            </thead>
                            <tbody>
                                <?php $i = 0;  ?>
                                <?php foreach ($pagos as $fila) : ?>
                                    <tr>
                                        <td><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td><small><?= $fila->idPago; ?></small></td>
                                        <td style="<?= ($fila->idPago == 0) ? "background-color: #f08080;" : "background-color: #adff2f;"; ?>"><strong><small><?= $fila->idPago; ?></small></strong></td>
                                        <td><small><?= $fila->idPago; ?></small></td>
                                        <td><small><strong><?= ($fila->idPago == null && $fila->idPago == 0) ? "Abandono" : $fila->idPago; ?></strong></small></td>
                                        <td style="<?= ($fila->idPago == "Bueno" || $fila->idPago == "Aprobado" || $fila->idPago == "Muy Bueno" || ($fila->idPago == 1 && $fila->idPago == 1)) ? "background-color: #add8e6;" : "background-color: #cd5c5c;"; ?>"><small><?= ($fila->idPago == 1 && $fila->estadoV == 1) ? "<strong>En Curso </strong>" : $fila->idPago; ?></small></td>
                                        <td><small><?= $fila->idPago; ?></small></td>
                                        <!-- <td style="<?= ($fila->idPago == 0) ? "background-color: #f08080;" : "background-color: #adff2f;"; ?>"><small><?= ($fila->idPago == 0) ? "V. Terminada" : "V. en Curso"; ?></small></td> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>
        <div class="row" id="irasignarodulo">
            <div class="col-md-3 col-md-offset-1 form-inline">
                <button class="btn btn-primary btn-group btn-sm" id="imprimirDetalleDiplo">
                    <span class="glyphicon glyphicon-print"></span> Imprimir
                </button>
            </div>
            <span <?= ($this->session->userdata('tipo') == 'Administrador') ? "hidden" : "" ?>>
                <div class="col-md-2 col-md-offset-4 form-inline">
                    <a id="#abrirModalInscripcion" href="<?= base_url('index.php/pago/formCrearpago/' . $diplomanteinscrito[0]->idInscripcion . '/' . $diplomanteinscrito[0]->ciD); ?>">
                        Añadir Pago
                    </a>
                </div>
            </span>
            <!-- <div class="col-md-2 form-inline">
               <a href="<?= $_SERVER['HTTP_REFERER']; ?>">Volver</a>    
            </div> -->
        </div></br></br>
    </div>
</div>