<div class="row">
    <div class="col-md-9 col-md-offset-1">
        <legend>
            <h1>Editar Registro de Diplomante</h1>
        </legend>
    </div>

</div>
<div class="row">
    <div class="col-md-9 col-md-offset-1">
        <form action="http://localhost:8080/diplomado/index.php/inscripcion/editarInscripcion" method="POST" class="form" role="form">

            <div class="row form-group">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="numa">No. de Inscripcion:</label>
                        <input type="text" name="txtnuma" class="form-control input-sm" id="numa" value="<?= $inscripcion[0]->idInscripcion ?>">

                    </div>
                </div>
                <div class="col-md-3">
                    <label for="cia">CI:</label>
                    <input type="text" name="txtcia" class="form-control input-sm" id="cia" value="<?= $inscripcion[0]->ciI ?>">
                </div>
            </div><br>

            <div class="row form-group">
                <div class="form-group col-md-3">
                    <div class="form-inline">
                        <label for="">Sexo:</label><br>
                        <div class="radio">
                            <label>
                                <input type="radio" name="radiosexoa" id="optionsRadios1" value="Femenino" checked>
                                Femenino.......
                            </label>
                        </div>
                        <div class="radio ">
                            <label>
                                <input type="radio" name="radiosexoa" id="optionsRadios2" value="Masculino">
                                Masculino
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <label for="paisnaca">Pais de Nacimiento:</label>
                    <input type="text" name="txtpaisnaca" class="form-control input-sm" id="paisnaca" placeholder="Introdusca pais de Nac." value="<?= $inscripcion[0]->paisnacI ?>">
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <label for="departamentonaca">Departamento de Nacimiento:</label>
                    <input type="text" name="txtdepartamentonaca" class="form-control input-sm" id="departamentonaca" placeholder="Introdusca departamento de Nac." value="<?= $inscripcion[0]->departamentonacI ?>">
                </div>

            </div><br>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="fechanaca">Fecha de Nacimiento:</label>
                    <input type="date" name="txtfechanaca" class="form-control input-sm" id="fechanaca" placeholder="Insertar Fecha de Nac." value="<?= $inscripcion[0]->fechanacI ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="estadoCivila">Estado Civil:</label>
                    <select class="form-control input-sm" id="estadoCivila" name="estadoCivila">
                        <option>------</option>
                        <option>Soltero</option>
                        <option>Casado</option>
                        <option>Divorciado</option>
                        <option>Concuvinato</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="direcciona">Direccion:</label>
                    <input type="text" name="txtdirecciona" class="form-control input-sm" id="direcciona" placeholder="Introdusca direccion" value="<?= $inscripcion[0]->direccionI ?>">
                </div>
                <div class="col-md-3">
                    <label for="emaila">E-mail:</label>
                    <input type="text" name="txtemaila" class="form-control input-sm" id="emaila" placeholder="Introdusca email" value="<?= $inscripcion[0]->emailI ?>">
                </div>

            </div><br>
            <div class="row form-group">
                <div class="col-md-3 ">
                    <label for="telefonoa">Telefono:</label>
                    <input type="text" name="txttelefonoa" class="form-control input-sm" id="telefonoa" placeholder="Introdusca telefono" value="<?= $inscripcion[0]->telefonoI ?>">
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <label for="celulara">Celular:</label>
                    <input type="text" name="txtcelulara" class="form-control input-sm" id="celulara" placeholder="Insertar celular" value="<?= $inscripcion[0]->celularI ?>">
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <label for="fechainsca">Fecha de Inscripcion:</label>
                    <input type="date" name="txtfechainsca" class="form-control input-sm" id="fechainsca" value="<?= $inscripcion[0]->fechaInscripcionI ?>">
                </div>
            </div> <br>

            

            <button type="button" class="btn btn-success" data-dismiss="modal" id="btncancelar">Cancelar</button>
            <input type="submit" class="btn btn-primary" id="btneditar" value="Actualizar">

        </form>
    </div>

</div>