<!-- MODAL SELECCIONAR ROL -->
<!-- <div class="modal fade bs-example-modal-sm" id="modalAcadSelect" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"> -->
<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="titulolabel"></h4>
        </div>
        <form action="http://localhost:8080/diplomado/index.php/academicoseleccionado/asignar_rol" method="POST" role="form">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group input-sm">
                        <div class="col-md-6">
                            <!-- <label for="txtnombre">CI</label> -->
                            <input type="hidden" id="cia" name="txtcia" class="form-control input-sm" value="" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="txtnombre">Nombre Version</label> -->
                                <input type="hidden" id="nombrev" name="txtnombrev" class="form-control input-sm" value="<?= $nombre; ?>" readonly>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group input-sm">
                        <div class="col-md-12 col-md-offset-">

                            <label class="radio-inline">
                                <input type="radio" name="radiotipocontrato" id="radiotipocontrato1" value="Docencia" checked="true"> Docencia
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="radiotipocontrato" id="radiotipocontrato2" value="Tutoria"> Tutoria
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="radiotipocontrato" id="radiotipocontrato3" value="Defenza"> Defenza
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary btn-sm" value="Contratar">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal" >Contratar</button> -->
            </div>
        </form>
    </div>
</div>
<!-- </div> -->