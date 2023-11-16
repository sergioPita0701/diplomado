<!-- MODAL CREAR PROFESION -->
<!-- <div class="modal fade" id="modalcrearProfesion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> -->
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Registrar Nueva Profesion</h4>
    </div>
    <!-- <form class="form" role="form" action="" id="formProfesion" method="post"> -->
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="panel "> -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-9 col-md-offset-1">
                                    <label for="">Profecion:</label>
                                    <input type="text" class="form-control" name="txtNombreP" id="nombreP" placeholder="Insertar Profesion"><button type="reset" class="close"><span aria-hidden="true"></span></button></input>
                                    </br>
                                </div>
                                
                            </div>
                            
                            <div class="row">  
                                <div class="form-group col-md-12 col-md-offset-">
                                    <label for="">Grado Académico</label>
                                    <div class="form-group col-md-12" id="radios">
                                        <label class="radio-inline">
                                            <input type="radio" name="radioProfesion" id="rIngenieria" value="ingenieria" checked="true"> Ingenieria
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="radioProfesion" id="rLicenciatura" value="licenciatura"> Licenciatura
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="radioProfesion" id="rTecSup" value="tecSup"> Tec. Sup.
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="radioProfesion" id="rTecMed" value="tecMed"> Tec. Med.
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="radioProfesion" id="rOtro" value="otro" > Otro
                                        </label>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="resultado-registro"></div>
                        </div>        
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a type="button" class="btn btn-default" data-dismiss="modal">Cerrar</a>
            <!-- <button id="crearProfesion" class="btn btn-info btn-md active" type="submit" value="" >Incluir Profesion</button> -->
            <button onclick="crearProfesion();" class="btn btn-info btn-md active" type="" value="" >Incluir Profesion</button>
        </div>
    <!-- </form> -->
  </div>
</div>
<!-- </div> -->
<!-- <h1>hola mundo</h1> -->