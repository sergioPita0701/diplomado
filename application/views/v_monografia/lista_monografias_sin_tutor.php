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
                <br>
                <div class="col-md-12" id="listaMonografia">
                    <div class="table-responsive ">
                        <table class="table  table-hover " style="table-layout:; width:1030px">
                            <thead style="display: block;">
                                <th style="width:50px;word-break:break-word" class="active">No.</th>
                                <th style="display:none"></th>
                                <th style="width:200px;word-break:break-word" class="active">Participante</th>
                                <th style="width:100px;word-break:break-word" class="active">Ci</th>
                                <th style="width:330px;word-break:break-word" class="active">Titulo Monografia</th>
                                <th style="width:100px;word-break:break-word" class="active">Inicio</th>
                                <th style="width:100px;word-break:break-word" class="active">Hasta</th>
                                <th style="width:150px;word-break:break-word" class="active">Operaciones</th>
                            </thead>
                            <tbody style="display: block; height: 400px; overflow-y: auto; overflow-x: hidden; ">
                                <?php $i = 0;  ?>
                                <?php foreach ($monografia as $fila) : ?>
                                    <tr>
                                        <td style="width:50px; word-break:break-word"><strong><?= $i = $i + 1;  ?></strong></td>
                                        <td style="display:none"><?= $fila['idMonografia']; ?></td>
                                        <td style="width:200px; word-break:break-word"><?= $fila['nombreD'] . " " . $fila['apellidoPaternoD'] . " " . $fila['apellidoMaternoD']; ?></td>
                                        <td style="width:100px; word-break:break-word"><?= $fila['ciD']; ?></td>
                                        <td style="width:330px; word-break:break-word"><?= $fila['tituloMonografia']; ?></td>
                                        <td style="width:100px; word-break:break-word"><?= $fila['fecha_inicioMo']; ?></td>
                                        <td style="width:100px; word-break:break-word"><?= $fila['fecha_finalMo']; ?></td>
                                        <td style="width:150px; word-break:break-word">
                                            <!-- <a class="btn btn-success btn-group btn-xs" href="<?= base_url('index.php/defensa/'); ?>">
                                        <span class="glyphicon glyphicon-education"></span>Defenza   HACER QUE VAYA A LA DEFENZA CON SU NOMBRE Y QUE COLOQUE YA SU NAME
                                        </a> -->
                                            <d class="btn btn-warning btn-group btn-xs">
                                                <span class="glyphicon glyphicon-duplicate"></span>
                                            </d>

                                            <c class="btn btn-primary btn-group btn-xs">
                                                <span class="glyphicon glyphicon-open-file"></span>
                                            </c>

                                            <b class="btn btn-info btn-group btn-xs" data-toggle="modal" data-target="#modaleditarMono" data-backdrop="static" data-keyboard="false">
                                                <span class="glyphicon glyphicon-cog"></span>
                                            </b>

                                            <a href="<?= base_url('index.php/monografia/eliminarMonografia/?mono=' . $fila['idMonografia']); ?>" class="btn btn-danger btn-group btn-xs" onclick="return confirm('Desea Realmente Eliminar la Monografia del Diplomante?');">
                                                <span class="glyphicon glyphicon-remove"></span> </a>
                                        </td>
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
<div class="modal fade" id="modaleditarMono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Monografia <small> Editar Datos de Monografia</small></h4>
            </div>
            <!-- <form class="form" role="form" action="" id="formProfesion" method="post"> -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="panel "> -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-10 col-md-offset-1">
                                    <input type="hidden" name="editmonografia" id="editmonografia">
                                    <label for=""><small>Titulo Monografia</small></label>
                                    <input type="text" class="form-control input-sm" name="editTituloMono" id="editTituloMono">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5 col-md-offset-1">
                                    <label for=""><small>Inicia</small></label>
                                    <input type="date" class="form-control input-sm" name="editIniciaMo" id="editIniciaMo">
                                </div>
                                <div class="form-group col-md-5 col-md-offset-">
                                    <label for=""><small>Hasta</small></label>
                                    <input type="date" class="form-control input-sm" name="editFinalMo" id="editFinalMo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-10 col-md-offset-1">
                                    <label for=""><small>Objetivo de Monografia</small></label>
                                    <textarea wrap="hard" rows="3" cols="" class="form-control input-sm" name="editObservMo" id="editObservMo"></textarea>

                                </div>
                            </div>
                            <div id="mnsjeditMono"></div>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                <button onclick="editarMonografia();" class="btn btn-primary btn-md active" type="" value="">Editar Monografia</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<!-- DOCUMENTO PDF CARGAR/DOWNLOAD/ELIMINAR -->
<div class="modal fade" id="modaldocumentopdfMono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Monografia <small> Documento Monografia</small></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default ">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <input type="hidden" name="pdfmonografia" id="pdfmonografia">
                                        <form id="formMonografiapdf" hidden="hidden">
                                            <div class="row">
                                                <p class="text text-danger"><strong>Subir Archivo de Monografia</strong></p>
                                                <div class="form-group col-md-8">

                                                    <input type="file" class="btn btn-default btn-xs active " name="filemonografia" id="filemonografia">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <button type="submit" value="" class="btn btn-info active btn-sm">Cargar Monografia</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="idcargado" hidden="hidden">
                                            <p class="text text-danger"><strong>Archivo de Monografia Cargado</strong></p>
                                            <!-- <a href="<?= base_url(); ?>index.php/monografia/downloadmonografiapdf/<span id='rutamono'></span>"><strong>Descargar</strong></a> -->
                                            <a id="descargarmono">Descargar Documento Monografia </a>
                                            <button onclick="eliminarmonopdf();" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="mnsjpdfMono"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- COMPARACION CON OTROS DOCUMENTOS PDFS -->
<div class="modal fade-lg" id="comparacionpdfmono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Monografia <small> AUTENTICIDAD DE DOCUMENTACION</small></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default ">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <center>
                                            <h4 class="text text-danger">Grafica Porcentaje de Autenticidad segun el <em>"Titulo"</em> y <em>"Objetivos"</em> de Monografia</h4>
                                        </center>
                                        <!-- <hr> -->
                                        <!-- <div id="myfirstchart" style="height: 150px; width: 500px;"></div> -->
                                        <center>
                                            <div id="graph" style="height: 250px; width: 500px; "></div>
                                        </center>
                                        <pre id="code" class="prettyprint linenums"><center> Nivel de Autenticidad del Titulo de Monografia comparado al 100%</center></pre>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="mnsjcompararmono"></div>
            </div>
        </div>
    </div>
</div>