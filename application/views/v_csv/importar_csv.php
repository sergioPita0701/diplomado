<div class="container">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="page-header text-primary">
                        <h2 class="text-center">Importar</h2>

                        <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success') ?>
                        </div>
                        <?php elseif($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error') ?>
                        </div>
                        <?php endif; ?>

                        <form action="<?= site_url('csv/procesar_importacion') ?>" method="post"
                            enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <label for="version" class="col-sm-2 control-label">Seleccionar Versión:</label>
                                <div class="col-sm-10">
                                    <select name="version" id="version" class="form-control">
                                        <?php foreach ($versiones as $version): ?>
                                        <option value="<?= $version['idVersion'] ?>">
                                            <?= $version['nombreV'] . '-' . $version['tipoCursoV'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="csv_file" class="col-sm-2 control-label">Subir archivo CSV:</label>
                                <div class="col-sm-10">
                                    <input type="file" name="csv_file" id="csv_file" accept=".csv" class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Importar Alumnos</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <h2>Importación de Diplomantes desde CSV</h2>
                    <div class="col-md-10 col-md-offset-1" id="listaTransacciones">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Campo - Campo que debe tener la columna del CSV</th>
                                        <th>Descripción</th>
                                        <th>Ejemplo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ciD</td>
                                        <td>Cédula de identidad del diplomante</td>
                                        <td>8510550</td>
                                    </tr>
                                    <tr>
                                        <td>nombreD</td>
                                        <td>Nombre del diplomante</td>
                                        <td>Juan Daniel</td>
                                    </tr>
                                    <tr>
                                        <td>apellidoPaternoD</td>
                                        <td>Apellido paterno del diplomante</td>
                                        <td>Pérez</td>
                                    </tr>
                                    <tr>
                                        <td>apellidoMaternoD</td>
                                        <td>Apellido materno del diplomante</td>
                                        <td>González</td>
                                    </tr>
                                    <tr>
                                        <td>porcentajeD</td>
                                        <td>Porcentaje de descuento</td>
                                        <td>20.00</td>
                                    </tr>
                                    <tr>
                                        <td>montoOriginalT</td>
                                        <td>Monto original del curso</td>
                                        <td>3400.00</td>
                                    </tr>
                                    <tr>
                                        <td>montoDescuentoT</td>
                                        <td>Monto con descuento</td>
                                        <td>2788.00</td>
                                    </tr>
                                    <tr>
                                        <td>totalPagos</td>
                                        <td>Monto total de pagos realizados</td>
                                        <td>1105.00</td>
                                    </tr>
                                    <!-- Agrega más filas según los campos necesarios -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- Cierre de .container adicional -->
            </div>
        </div>
    </div>
</div>