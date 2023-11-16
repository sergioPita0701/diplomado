<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main ">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <h3 class="text text-primary">
                    <center> Registro de Versiones </center>
                </h3>
            </div>
            <!-- <hr> -->
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3 col-md-3 col-md-offset-9">
                    <span <?= ($this->session->userdata('tipo') == 'Administrador') ? "" : "hidden='hidden'" ?>>
                        <a href="<?php echo base_url() . 'index.php/version' ?>" class="" role="">
                            <span class="glyphicon glyphicon-new-window"></span> Crear Nueva Versión
                        </a>
                    </span>
                    <!-- <form class="form" role="form" action="http://localhost:8080/diplomado/index.php/version/imprimirtcpdf" method="post">
                        <div class="panel-body">
                            
                        </div>    
                         <div class="modal-footer">
                            
                            <input class="btn btn-primary btn-md" type="submit" value="Imprimir">
                        </div>    
                    </form> -->
                </div>
            </div></br>
            <!-- <hr> -->
            <div class="row">
                <div id="listaversiones" class=" col-md-12  main">
                    <!-- <div class="table-responsive" id="espacio" style="max-height: 400px; overflow-y: auto;"> -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="position: sticky; top: 0; background-color: #fff; z-index: 1;">
                                <tr class="info text-center">
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 15%;">Nombre</th>
                                    <th style="width: 10%;">Tipo de Curso</th>
                                    <th style="width: 10%;">Fecha</th>
                                    <th style="width: 10%;">Tiempo (mes)</th>
                                    <th style="width: 10%;">N° Pagos(Cuotas)</th>
                                    <th style="width: 10%;">Costo Total(Bs.)</th>
                                    <th style="width: 10%;">Costo matricula(Bs.)</th>
                                    <th style="width: 10%;">Costo Módulos(Bs.)</th>
                                    <th style="width: 10%;">Pago Mínimo Inicial(Bs.)</th>
                                    <th style="width: 10%;">Lugar</th>
                                    <th style="width: 5%;">Estado</th>
                                    <th style="width: 10%;">Descripción</th>

                                    <th style="width: 20%;">
                                        Operaciones
                                    </th>
                                    <th style="width: 20%;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody style=" width: 100%;">
                                <?php $i = 0; ?>
                                <?php foreach ($version as $fila) : ?>
                                    <tr class="text-center">
                                        <td><?= ++$i; ?></td>
                                        <td><?= $fila['nombreV']; ?></td>
                                        <td><?= $fila['tipoCursoV']; ?></td>
                                        <td><?= $fila['fechaV']; ?></td>
                                        <td><?= $fila['tiempoV']; ?></td>
                                        <td><?= $fila['numPagosV']; ?></td>
                                        <td><?= $fila['costoV']; ?> Bs.</td>
                                        <td><?= $fila['costoMatriculaV']; ?> Bs.</td>
                                        <td><?= $fila['costoModulosV']; ?> Bs.</td>
                                        <td><?= $fila['montoMinPrimerPagoV']; ?> Bs.</td>
                                        <td><?= $fila['lugarV']; ?></td>
                                        <td>
                                            <button type="button" class="btn <?= ($fila['estadoV'] == '1') ? 'btn-success' : 'btn-danger'; ?> btn-xs <?= ($this->session->userdata('tipo') == 'Administrador') ? '' : 'disabled'; ?>">
                                                <?= ($fila['estadoV'] == '1') ? 'Habilitado' : 'Inhabilitado'; ?>
                                            </button>

                                            <!--boton Estado habilitado/inhabilitado 0 o 1 -->
                                            <!-- <a href="<?= base_url('index.php/version/iniciarApagarVersion/' . $fila['idVersion']); ?>" style="<?= ($fila['estadoV'] == '1') ? "background-color: #7cfc00;" : "background-color: #ff0000;"; ?>" id="estadov" 
                                                class="btn btn-group btn-xs <?= ($this->session->userdata('tipo') == 'Administrador') ? '' : 'disabled' ?>" name="estadov"  ><?= ($fila['estadoV'] == '1') ? "Habilitado" : "Inhabilitado"; ?></a> -->

                                        </td>
                                        <td><?= $fila['descripcionV']; ?></td>
                                        <!-- <td>
                                            <a href="http://localhost:8080/diplomado/index.php/version/ingresarv?nombre=<?= $fila['nombreV']; ?>&estado=<?= $fila['estadoV']; ?>" id="ingresarv" class="btn btn-success btn-xs">
                                                <span class="glyphicon glyphicon-eye-open glyphicon-sm"></span>
                                            </a>
                                            <c id="lista" class="btn btn-info btn-xs <?= ($this->session->userdata('tipo') == 'Administrador') ? "" : "hidden" ?>">
                                                <span class="glyphicon glyphicon-list glyphicon-sm"></span>
                                            </c>
                                            <a href="<?= base_url(); ?>index.php/modulo/index/<?= $fila['idVersion'] ?>" class="btn btn-info btn-xs <?= ($this->session->userdata('tipo') == 'Administrador') ? "" : "hidden" ?>" title="Ver los módulos de la versión: <?= $fila['nombreV'] ?>">
                                                <span class="glyphicon glyphicon-pencil glyphicon-sm"></span>
                                            </a>
                                            <p></p>
                                            <b type="button" class="btn btn-primary btn-xs <?= ($this->session->userdata('tipo') == 'Administrador') ? "" : "hidden" ?>">
                                                <span class="glyphicon glyphicon-cog glyphicon-sm"></span>
                                            </b>
                                            <span <?= ($this->session->userdata('tipo') == 'Administrador') ? "" : "hidden='hidden'" ?>>
                                                <a href="<?= base_url('index.php/version/eliminarVersion/' . $fila['nombreV']); ?>" type="reset" class="btn btn-danger btn-xs" onclick="return confirm('Desea Realmente Eliminar la Version?');">
                                                    <span n class="glyphicon glyphicon-remove-circle glyphicon-sm"></span>
                                                </a>
                                            </span>
                                        </td> -->
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-sm"> <!-- Agregamos la clase dropdown-menu-sm para reducir el tamaño -->

                                                    <li>
                                                        <a href="http://localhost:8080/diplomado/index.php/version/ingresarv?nombre=<?= $fila['nombreV']; ?>&estado=<?= $fila['estadoV']; ?>" class="btn btn-success btn-xs" style="color: white;">
                                                            <span class="glyphicon glyphicon-eye-open glyphicon-sm"></span> Ingresar
                                                        </a>
                                                    </li>
                                                    <li class="<?= ($this->session->userdata('tipo') == 'Administrador') ? "" : "hidden" ?>">
                                                        <a href="<?= base_url(); ?>index.php/modulo/index/<?= $fila['idVersion'] ?>" class="btn btn-info btn-xs" style="color: white;>
                                                            <span class=" glyphicon glyphicon-pencil glyphicon-sm"></span> Ver Módulos
                                                        </a>
                                                    </li>
                                                    <li class="<?= ($this->session->userdata('tipo') == 'Administrador') ? "" : "hidden" ?>">
                                                        <a href="<?= base_url('index.php/version/editarFormVersion/' . $fila['idVersion']); ?>" class="btn btn-default btn-xs">
                                                            <span class="glyphicon glyphicon-cog glyphicon-sm"></span> Editar
                                                        </a>
                                                    </li>
                                                    <li class="<?= ($this->session->userdata('tipo') == 'Administrador') ? "" : "hidden" ?>">
                                                        <a href="<?= base_url('index.php/version/eliminarVersion/' . $fila['nombreV']); ?>" class="btn btn-danger btn-xs" style="color: white;" onclick="return confirm('Desea Realmente Eliminar la Versión?');">
                                                            <span class="glyphicon glyphicon-remove-circle glyphicon-sm"></span> Eliminar
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>

                                        <td></td>

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


<!-- Modal editar Verion -->

<!-- Modal Mostrar Lista de Eventos de Version -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalRegistroEventosVersion">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title text text-primary" id="myModalLabel">Eventos de la <span id="nameV"></span></p>
                </h5>
            </div>
            <div class="modal-body">
                <!-- <form class="form" role="form" action="http://localhost:8080/diplomado/index.php/version/imprimepdfeventoversion" method="post"> -->
                <div class="panel-body">
                    <div class="row">
                        <div id="" class=" col-md-12 ">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-1" id="mnsjImprimeEveImpresion">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <center><label>No.</label>
                                        <div class="" id="numv"></div>
                                    </center>
                                </div>
                                <div class="col-md-2">
                                    <center><label>Nombre</label>
                                        <div class="" id="nombrev"></div>
                                    </center>
                                </div>
                                <div class="col-md-1">
                                    <center><label>Acción</label>
                                        <div class="" id="accionv"></div>
                                    </center>
                                </div>
                                <div class="col-md-4">
                                    <center><label>Razon</label>
                                        <div class="" id="razonv"></div>
                                    </center>
                                </div>
                                <div class="col-md-2">
                                    <center><label>Fecha</label>
                                        <div class="" id="fechav"></div>
                                    </center>
                                </div>
                                <div class="col-md-1">
                                    <center><label>Hora</label>
                                        <div class="" id="horav"></div>
                                    </center>
                                </div>
                                <div class="col-md-1">
                                    <center><label>Imprimir</label>
                                        <div class="" id="imprimirv"></div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input class="btn btn-primary btn-md" type="submit" value="Imprimir">
                </div>
                <!-- </form> -->
            </div>

        </div>
    </div>
</div>

<!-- Modal MOSTRAR MENSAJE PARA HABILITAR O DESABILITAR VERSION-->
<div class="modal fade bs-iniciarVersion-modal-sm" id="iniciarVersion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <!-- <form  action="http://localhost:8080/diplomado/index.php/usuario/terminarVersion" method="POST" class="form" role="form"> -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> <small class="text text-danger text-uppercase">Reinicio de Version </small> </h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                    <span class="glyphicon glyphicon-warning-sign"></span>
                    <small>Desde este momento volverá a <strong>Reiniciar</strong> la Versión que indíca y se cerraran TODAS las demas Versiones!!!.
                        Debe sentirse seguro de hacer cambios en una Version ya <strong>Finalizada</strong>, esto puede <strong>Alterar</strong> datos de futuras versiones!.</small>
                </div>
                <p><small><strong>Para Reiniciar la Versión debe Introducir su CI para comprobar si puede realizar esta acción.</strong></small></p>
                <input type="hidden" name="" class="form-control input-sm" id="idversionrei" value="">
                <input type="text" name="" class="form-control input-sm" id="ciusuariorei">
                <div id="mnsjReiniciarVersion"></div>
                <textarea name="" id="razonVersionrei" cols="30" class="form-control" rows="1" value="">porq.</textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="reiniciarVersion();">Reiniciar Version</button>
            </div>
            <!-- </form>   -->
        </div>
    </div>
</div>