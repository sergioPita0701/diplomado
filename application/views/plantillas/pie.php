<!-- JQuery  -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.0.min.js" type="text/javascript"></script>aqui hacer datetimepicker para los relojes!! -->
<script>
// window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
</script>

<!-- IMPRIMIR DETALLES -->
<script src="<?php echo base_url(); ?>assets/jquery-print/jquery.print.js" type="text/javascript"></script>
<!-- IMPRIMIR TABLAS -->
<!-- <script src="<?php echo base_url(); ?>assets/datatables-export/js/dataTables.buttons.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/datatables-export/js/buttons.flash.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables-export/js/vfs_fonts.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/datatables-export/js/buttons.html5.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/datatables-export/js/buttons.print.min.js"></script> -->

<!-- GRAFICAS LIBRERIA MORRIS -->
<script src="<?php echo base_url(); ?>assets/grafics/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/grafics/morris.min.js" charset="utf-8" type="text/javascript"></script>

<!-- Bootstrap Core CSS -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- MENU SLIDER -->
<script>
// $(document).ready(function() {
//   $('.menu li:has(ul)').click(function(e) {
//     e.preventDefault();
//     if ($(this).hasClass('active')) {
//         $(this).removeClass('active');
//         $(this).children('ul').slideUp();
//     } else {
//         $('.menu li ul').slideUp();
//         $('.menu li').removeClass('active');
//         $(this).addClass('active');
//         $(this).children('ul').slideDown();
//     }
//   });
// });
</script>
<!-- DIPLOMANTE -->
<script type="text/javascript">
//iprimir Detalle Diplomante
$(document).on("click", "#imprimirDetalleDiplo", function() {
    $("#bodyDetalleDiplo").print({
        title: "Detalle de Participante"
    });

})
//iprimir Informacion Acadeic
$(document).on("click", "#imprimInformacionAcad", function() {
    $("#bodyinformAcad").print({
        title: "Informacion Academico"
    });

})
//iprimir Detalle Acadeic ,Imprime pero los botones saca cn error
$(document).on("click", "#imprimDetalleAcad", function() {
    $("#bodyDetalleAcad").print({
        title: "Detalle Academico"
    });
})
//iprimir Detalle Detalle de tutoria
$(document).on("click", "#imprimirDetTutoria", function() {
    $("#bodyDetaTutoria").print({
        title: "Detalle de Tutoria"
    });

})
//imprimir kardex
$(document).on("click", "#printKardex", function() {
    $("#bodyKardex").print({
        title: "Kardex"
    });

})

function abrirProfesion(id, div, url) {
    $.post(
        url, {
            id: id
        },
        function(resp) {
            $("#" + div + "").html(resp);
        }
    );

}


function diplomante() //haceeeeeeeeeeeeeeeeer (revisar las validaciones segun los botones
{
    $("#mensaje").html('');
    $('#ci').val('');

    $("#nombred").val('');
    $("#apepaternod").val('');
    $("#apematernod").val('');
    $("#ciudadd").val('');
    $("#profesiones").val('');

    $("#nombred").attr('disabled', 'disabled');
    $("#apepaternod").attr('disabled', 'disabled');
    $("#apematernod").attr('disabled', 'disabled');
    $("#ciudadd").attr('disabled', 'disabled');
    $("#profesiones").attr('disabled', 'disabled');

    $("#selecProf").attr('disabled', 'disabled');
    $("#abrirCrearPrf").attr('hidden', 'true');

    $("#btnregistrar").attr('disabled', 'disabled');
    $("#btninscripcion").attr('disabled', 'disabled');

    // $("#modalDiplomante").remove();

}
// funcion javascript para pasar buscar ci
function buscarci() {
    var ci = $('#ci').val();
    if (ci.length > 0) {
        $.ajax({
            type: 'post',
            url: "http://10.4.25.3:8080/diplomado/index.php/diplomante/buscarDiplomante",
            data: {
                txtci: ci,
            },
            success: function(data) {
                data = JSON.parse(data);

                if (data.length == 0) //dats.leng y mas buscar...
                {
                    //VENTANA DE DIPLOMANTE-MODAL
                    $("#mensaje").html(
                        '<p class="alert alert-warning">Alumno nuevo, Ingrese datos del Alumno y verifique detalladamente.</p>'
                    );

                    $("#nombred").val('');
                    $("#apepaternod").val('');
                    $("#apematernod").val('');
                    $("#ciudadd").val('');
                    $("#profesiones").val('');

                    $("#nombred").removeAttr('disabled').focus();
                    $("#apepaternod").removeAttr('disabled');
                    $("#apematernod").removeAttr('disabled');
                    $("#ciudadd").removeAttr('disabled');
                    $("#profesiones").removeAttr('disabled');

                    //botones Profesion(actualizar,insertar)
                    $("#selecProf").removeAttr('disabled');
                    $("#abrirCrearPrf").removeAttr('hidden', 'true');

                    //activar boton de registrar diplomante
                    $("#btnregistrar").removeAttr('disabled');

                    $("#btninscripcion").attr('disabled', 'disabled');


                } else {

                    //VENTANA DE DIPLOMANTE-MODAL
                    $("#mensaje").html('');

                    $("#nombred").val(data[0]['nombreD']); //data[0]['ciA']
                    $("#apepaternod").val(data[0]['apellidoPaternoD']);
                    $("#apematernod").val(data[0]['apellidoMaternoD']);
                    $("#ciudadd").val(data[0]['ciudadD']);
                    $("#profesiones").val(data[0]['idProfesion']);


                    //activar boton de registrar diplomante
                    $("#btninscripcion").removeAttr('disabled');
                    //desactivar boton de registrar diplomante
                    $("#btnregistrar").attr('disabled', 'disabled');

                    //$("#ci").attr('readonly','readonly');

                    $("#nombred").attr('disabled', 'disabled');
                    $("#apepaternod").attr('disabled', 'disabled');
                    $("#apematernod").attr('disabled', 'disabled');
                    $("#ciudadd").attr('disabled', 'disabled');
                    $("#profesiones").attr('disabled', 'disabled');

                    //botones Profesion(actualizar,insertar)
                    $("#selecProf").attr('disabled', 'disabled');
                    $("#abrirCrearPrf").attr('hidden', 'true');

                    //VENTANA DE INSCRIPCION

                    $("#cii").val(data[0]['ciD']);
                    $("#nombrei").val(data[0]['nombreD']);
                    $("#apepaternoi").val(data[0]['apellidoPaternoD']);
                    $("#apematernoi").val(data[0]['apellidoMaternoD']);

                    // $("#ventinscripcion").removeAttr('hidden','false');
                }
            }
        })
    } else {
        diplomante();
        $("#mensaje").html('<p class="alert alert-danger">Espere!!, Ingrese CI del Alumno.</p>');

    }

}

function crearDiplomante() {
    $("#vacionombre").html('');
    $("#vacioapepaterno").html('');
    $("#vacioprofesion").html('');

    var ci = $('#ci').val();
    nombre = $("#nombred").val();
    apepaterno = $("#apepaternod").val();
    apematerno = $("#apematernod").val();
    ciudad = $("#ciudadd").val();
    profesional = $("#profesiones").val();
    if (nombre.length == 0 && apepaterno.length == 0 && profesional == null) {
        $("#vacionombre").html(
            '<p class="alert alert-danger"><small>Espere!!, El campo nombre es requerido.</small></p>');
        $("#vacioapepaterno").html(
            '<p class="alert alert-danger"><small>Espere!!, El campo Apellido Paterno es requerido.</small></p>');
        $("#vacioprofesion").html(
            '<p class="alert alert-danger"><small>Espere!!, El campo Profesion es requerido.</small></p>');
    } else {
        if (nombre.length != 0 && apepaterno.length == 0 && profesional == null) {
            $("#vacioapepaterno").html(
                '<p class="alert alert-danger"><small>Espere!!, El campo Apellido Paterno es requerido.</small></p>'
            );
            $("#vacioprofesion").html(
                '<p class="alert alert-danger"><small>Espere!!, El campo Profesion es requerido.</small></p>');
        } else {
            if (nombre.length != 0 && apepaterno.length != 0 && profesional == null) {
                $("#vacioprofesion").html(
                    '<p class="alert alert-danger"><small>Espere!!, El campo Profesion es requerido.</small></p>');
            } else {
                if (nombre.length != 0 && apepaterno.length == 0 && profesional != null) {
                    $("#vacioapepaterno").html(
                        '<p class="alert alert-danger"><small>Espere!!, El campo Apellido Paterno es requerido.</small></p>'
                    );
                } else {
                    if (nombre.length == 0 && apepaterno.length != 0 && profesional == null) {
                        $("#vacionombre").html(
                            '<p class="alert alert-danger"><small>Espere!!, El campo nombre es requerido.</small></p>'
                        );
                        $("#vacioprofesion").html(
                            '<p class="alert alert-danger"><small>Espere!!, El campo Profesion es requerido.</small></p>'
                        );
                    } else {
                        if (nombre.length == 0 && apepaterno.length == 0 && profesional != null) {
                            $("#vacionombre").html(
                                '<p class="alert alert-danger"><small>Espere!!, El campo nombre es requerido.</small></p>'
                            );
                            $("#vacioapepaterno").html(
                                '<p class="alert alert-danger"><small>Espere!!, El campo Apellido Paterno es requerido.</small></p>'
                            );
                        } else {
                            if (nombre.length == 0 && apepaterno.length != 0 && profesional != null) {
                                $("#vacionombre").html(
                                    '<p class="alert alert-danger"><small>Espere!!, El campo nombre es requerido.</small></p>'
                                );
                            } else {
                                $.ajax({
                                    type: 'post',
                                    url: "http://10.4.25.3:8080/diplomado/index.php/diplomante/crearDiplomante",
                                    data: {
                                        txtci: ci,
                                        txtNombreD: nombre,
                                        txtApellidoPaternoD: apepaterno,
                                        txtApellidoMaternoD: apematerno,
                                        txtCiudadD: ciudad,
                                        txtProfesionD: profesional
                                    },
                                    success: function(data) {
                                        data = JSON.parse(data);
                                        console.log(data);
                                        // console.log(data.length)
                                        if (data == "false") {
                                            $("#mensaje").html(
                                                '<p class="alert alert-danger">No es posible registar al Participante, revise sus datos.</p>'
                                            );
                                        } else {

                                            $("#cii").val(data[0]['ciD']);
                                            $("#nombrei").val(data[0]['nombreD']);
                                            $("#apepaternoi").val(data[0]['apellidoPaternoD']);
                                            $("#apematernoi").val(data[0]['apellidoMaternoD']);

                                            $("#ventinscripcion").removeAttr('hidden', 'false');

                                            $("#modalDiplomante").modal('hide');
                                        }

                                    }
                                });
                            }
                        }
                    }

                }
            }
        }
    }
}
// function pasardatosamodal() {
//       var cid=$("#dpci").text();
//       nombred=$("#dpnombre").text();
//       apepaternod=$("#dpapepaterno").text();
//       apematernod=$("#dpapematerno").text();
//       ciudadd=$("#dpciudad").text();
//       // profesiond=$("#dpprofesion").text();

//       $('#modalEditDP').modal('toggle');

//       $("#textoCiDi").val(cid);
//       $("#textoNombreDi").val(nombred);
//       $("#textoApePaternoDi").val(apepaternod);
//       $("#textoApeMaternoDi").val(apematernod);
//       $("#textociudadDi").val(ciudadd);
//       // $("#profesionDi").val(profesiond);
// }
$("#formEditar").on('change', function() {
    $("#btneditarDiplomante").removeAttr('disabled').focus();
}); //haceer buscar como editar en jquery

// $("#formEditar").on('change',function() { 
function editardiplomante() {
    var cid = $("#textoCiDi").val();
    nombred = $("#textoNombreDi").val();
    apepaternod = $("#textoApePaternoDi").val();
    apematernod = $("#textoApeMaternoDi").val();
    ciudadd = $("#textociudadDi").val();
    profesiond = $("#profesionDi").val();
    // alert(apepaternod);
    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/diplomante/editarDiplomante",
        data: {
            textoCiDi: cid,
            textoNombreDi: nombred,
            textoApePaternoDi: apepaternod,
            textoApeMaternoDi: apematernod,
            textociudadDi: ciudadd,
            profesionDi: profesiond
        },
        success: function(data) {
            data = JSON.parse(data); //data=="false"
            if (data == "false") {
                $("#mensaje").html('<p class="alert alert-danger"></p>');
                $(".msjnotificacion").html(
                    '<p class="alert alert-success">No es posible Editar datos del Participante, revise sus datos.<p>'
                ).fadeIn();
            } else {
                $("#modalEditDP .close").click();
                $("#dpci").text(data[0]['ciD']);
                $("#dpnombrecompleto").text(data[0]['nombreD'] + " " + data[0]['apellidoPaternoD'] + " " +
                    data[0]['apellidoMaternoD']);
                $("#dpciudad").text(data[0]['ciudadD']);
                $("#dpprofesion").text(data[0]['nombreP'] + "(" + data[0]['gradoAcademicoP'] + ")");
                $(".msjnotificacion").html(
                    '<p class="alert alert-success">Se Edito datos del Participante.<p>').fadeIn();
                $("#btneditarDiplomante").attr('disabled', 'disabled');
            }
        },
        complete: function() {
            setTimeout(function() {
                $(".msjnotificacion").fadeOut();
            }, 5000);
        }
        // $('#modalNotificaciones').modal('toggle');
        // window.location.load('http://10.4.25.3:8080/diplomado/index.php/inscripcion/detalleDiplomante_inscrito/'+data);
        // window.location;
        // $("#datospersonal").reload(true);
        // $("#datospersonal").load();
        // $("#datospersonal").location.reload();
        // top.location.reload(true);
    });
    return false;
}
// });  
</script>
<!-- INSCRIPCION -->
<script>
//para quitar el hide del boton nueva inscripcion
function botoninscripcion() {
    $("#ventinscripcion").removeAttr('hidden', 'false');
}

function editardinscripcion() {
    var numi = $("#numI").val();
    cid = $("#ciDI").val();
    paisnaci = $("#paisnacI").val();
    departamentonaci = $("#depanacI").val();
    fechanaci = $("#fechanacI").val();
    sexoi = $(".radio input[name='radioESexoI']:checked").val()
    estadocivili = $("#estadoCivil").val();
    direccioni = $("#direccionI").val();
    telefonoi = $("#telefonoI").val();
    celulari = $("#celularI").val();
    emaili = $("#emailI").val();
    fechai = $("#fechaI").val();
    // alert(sexoi);

    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/inscripcion/editarInscripcion",
        data: {
            textociDI: cid,
            textoNumI: numi,
            textoPaisnacI: paisnaci,
            textoDepanacI: departamentonaci,
            textoFechanacI: fechanaci,
            radioESexoI: sexoi,
            selectestadoCivil: estadocivili,
            textoDireccionI: direccioni,
            textoTelefonoI: telefonoi,
            textoCelularI: celulari,
            textoEmailI: emaili,
            textoFechaI: fechai
        },
        success: function(data) {
            // alert(data);
            data = JSON.parse(data);
            // datatype:'html';
            if (data == "false") {

                $("#modalDatosInscripcion .close").click();
                $(".msjnotificacion").html(
                    '<p class="alert alert-danger">No es posible Editar datos de Inscripcion del Participante, revise sus datos.<p>'
                ).fadeIn();
            } else {
                $("#modalDatosInscripcion .close").click();

                $("#numDI").text(data[0].numeroI);
                $("#paisnacDI").text(data[0].paisnacI);
                $("#deparnacDI").text(data[0].departamentonacI);
                $("#fechanacDI").text(data[0].fechanacI);
                $("#sexoDI").text(data[0].sexoI);
                $("#estadocivilDI").text(data[0].estadoCivilI);
                $("#direccionDI").text(data[0].direccionI);
                $("#telefonoDI").text(data[0].telefonoI);
                $("#celularDI").text(data[0].celularI);
                $("#emailDI").text(data[0].emailI);
                $("#fechaiDI").text(data[0].fechaInscripcionI);

                $(".msjnotificacion").html(
                        '<p class="alert alert-success">Se Edito datos de Inscripcion del Participante.<p>')
                    .fadeIn();
            }
        },
        complete: function() {
            setTimeout(function() {
                $(".msjnotificacion").fadeOut();
            }, 5000);
        }
    });
    return false;
}
</script>

<!--SECRETARIA!-->
<script type="text/javascript">
//boton inscripcion-secre para que todos campos de imput sten vacios revisar!
// function actualizarI()
// {

//      var fechaai=$('#fechaactuali').val();

//   console.log( fechaai);

//   $.ajax(
//     {
//       type:'post',
//       url:"http://10.4.25.3:8080/diplomado/index.php/inscripcion/fechaActual",
//       data:{
//           txtFechaInscI:fechaai,
//       },
//       success:function(data){
//         data=JSON.parse(data);
//         console.log(data);
//         console.log(data.length)
//         //$('#contenidoregistro').html(data);
//         var i=0;
//         for(var i=0;i<data.length;i++)
//         {
//           y=$('#tbcii').html(data[i].ciI);
//           console.log(y);
//         }

//       }
//     }
//   );
// }
</script>


<!-- MODULO-INSCRIPCION(DIPLOMANTE) -->
<script>
// INGRESAR FECHA LIMITE DE INSCRIPCIONES (DIRECTOR)
function terminarfInscripciones() {
    var fechainsc = $('#fechainscripciones').val();
    // $("#mnsjFechaInsc").html('');
    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/inscripcion/habilitar_inscripcion",
        data: {
            fechainscripcion: fechainsc
        },
        success: function(data) {
            if (data == true) {
                $("#mnsjFechaInsc").html(
                    '<p class="alert alert-success"><span class="glyphicon glyphicon-edit" ></span><small> Se guardó fecha satisfactoriamente </small><span class="glyphicon glyphicon-thumbs-up" ></span></p>'
                ).fadeIn();

            } else {
                $("#mnsjFechaInsc").html(
                    '<p class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><small> No se pudo realizar Cambios!! </small><span class="glyphicon glyphicon-thumbs-down" ></span></p>'
                ).fadeIn();
            }
        },
        complete: function() {
            setTimeout(function() {
                $("#mnsjFechaInsc").fadeOut();
            }, 4000);
        }
    });
}
//FUNCION PARA SELECCIONAR MODULO Y APARESCA EL PARALELO
$(document).ready(function() {
    $("select[name=modulosele]").change(function(params) {
        $('#paralelosele').html('');
        nummodulo = $('select[name=modulosele]').val();
        if (nummodulo == '') {
            $('#paralelosele').html('');
        } else {
            $.ajax({
                type: 'post',
                url: "http://10.4.25.3:8080/diplomado/index.php/paralelo/get_paralelosde_modulo",
                data: {
                    modulo: nummodulo
                },
                success: function(data) {
                    data = JSON.parse(data);
                    $.each(data, function(key, registro) {

                        $('#paralelosele').append('<option value=' + registro
                            .idParalelo + '>' + registro.nombre_paralelo +
                            '</option>');
                    });
                }
            });
        }
    });
})

//ASIGNAR MODULO AL DIPLOMANTE

$(document).ready(function() {

    var insc = $("#numInscripcion").text();
    diplo = $("#ciDiplomante").text();

    if (insc == '' && diplo == '') {
        $("#msjError").html(
            '<p class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><small> Debe seleccionar un Alumno de la lista de " Participantes sin Modulo " </small><span class="glyphicon glyphicon-hand-right" ></span></p>'
        );
    } else {
        $("#mensaje").hide();

        $("#formasigmodulo").validate({
            rules: {
                // numInscripcion:{require:true},
                modulosele: {
                    required: true
                },
                paralelosele: {
                    required: true
                },
                fechaAsignacion: {
                    required: true,
                    date: true
                }
            },
            messages: {
                // numInscripcion:"<br><p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> camporequerid.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
                modulosele: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar un Modulo.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
                paralelosele: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar un Paralelo, Primero debe escoger un Modulo.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
                fechaAsignacion: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar Fecha de Asigancion al modulo.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
            },
            submitHandler: function(form) {
                // var dataString = 'numInscripcion='+$('#numInscripcion').text()+'&ciDiplomante='+$('#ciDiplomante').text()+'&modulosele='+$('#modulosele').val()+'&paralelosele='+$('#paralelosele').val()+'&fechaAsignacion='+$('#fechaAsignacion').val();
                var numInscripcion = $("#numInscripcion").text();
                ciDiplomante = $("#ciDiplomante").text();
                modulosele = $("#modulosele").val();
                paralelosele = $("#paralelosele").val();
                fechaAsignacion = $("#fechaAsignacion").val();
                $.ajax({
                    type: "POST",
                    url: "http://10.4.25.3:8080/diplomado/index.php/modulodiplomante/asignarModuloaDiplo",
                    // data: dataString,
                    data: {
                        numInscripcion: numInscripcion,
                        ciDiplomante: ciDiplomante,
                        modulosele: modulosele,
                        paralelosele: paralelosele,
                        fechaAsignacion: fechaAsignacion
                    },
                    success: function(data) {
                        // data=JSON.parse(data);
                        // console.log(data);
                        if (data == 'noinsert') {
                            $("#mensaje").html(
                                '<p class="alert alert-danger"><span class="glyphicon glyphicon-floppy-remove" ></span><small> El Alumno ya se registro al Modulo en la Version Actual, puede que solo le falte asignarsele una Calificacion de Aprobacion, revise sus listas. </small><span class="glyphicon glyphicon-thumbs-down" ></span></p>'
                            ).fadeIn();

                        } else {

                            $("#mensaje").html(
                                '<p class="alert alert-info"><span class="glyphicon glyphicon-ok" ></span><small> Alumno Registrado al Modulo Exitosamente!!! </small><span class="glyphicon glyphicon-thumbs-up" ></span></p>'
                            ).fadeIn();
                            $("#mensaje").show();
                        }

                    },
                    complete: function() {
                        setTimeout(function() {
                            $("#mensaje").fadeOut();
                            top.location.reload(true);
                        }, 2000);
                    }
                });
            }
        });
    }


});
//Aparescan los botones de inscripcion al modulo y mono
$(document).ready(function() {
    var ci = $("#cidiplo").text();
    // diplo=$("#ciDiplomante").text();
    console.log(ci);
    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/diplomante/inscribirModulo",
        data: {
            txtci: ci,
        },
        success: function(data) {
            console.log(data);
            if (data == 0 || data == 'nohayasignamd') {
                // $("#btnAsignarMono").attr('hidden','hidden');
                $("#btnAsignarModulo").removeAttr('hidden', 'hidden');
            } else {
                if (data == "aprobomodulos") {
                    $("#btnAsignarModulo").removeAttr('hidden', 'hidden');
                } else {
                    $.ajax({
                        type: 'post',
                        url: "http://10.4.25.3:8080/diplomado/index.php/diplomante/inscribirMonografia",
                        data: {
                            txtci: ci,
                        },
                        success: function(data) {
                            console.log(data);
                            if (data == "notienemono") {
                                $("#btnAsignarModulo").removeAttr('hidden', 'hidden');
                            } else {
                                $("#btnAsignarMono").removeAttr('hidden', 'hidden');
                            }
                        }
                    });
                    // $("#btnAsignarModulo").removeAttr('hidden','hidden');
                }
            }
        }
    });
});
//ASIGNAR MODULO AL DIPLOMANTE CON MODAL DESDE INFOR.DEL DIPLOMANTE
function AsignarModulo() {
    $('#paralelosele').html('');
    // $('#selectModal').html('');
    var ci = $('#cidiplo').text();
    console.log(ci);
    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/diplomante/inscribirModulo",
        data: {
            txtci: ci,
        },
        success: function(data) {
            // data=JSON.parse(data);
            console.log(data);
            if (data == 0 || data == 'nohayasignamd') {
                $.getJSON('http://10.4.25.3:8080/diplomado/index.php/diplomante/get_primer_modulo', function(
                    data) {
                    // data=JSON.parse(data);
                    numeroMod = data[0]['numeroM'];
                    nombreMod = data[0]['nombreM'];
                    console.log(nombreMod);
                    console.log(numeroMod);
                    $("#modulotoca").html(
                        '<p class="alert alert-success"><small>El diplomante es Nuevo, le toca cursar el Primer Modulo:' +
                        data[0]['nombreM'] + '</small></p>');
                    $("#modulocorresponde").val(data[0]['nombreM']);
                    $("#modulosele").val(data[0]['numeroM']);
                    $.ajax({
                        type: 'post',
                        url: "http://10.4.25.3:8080/diplomado/index.php/paralelo/get_paralelosde_modulo",
                        data: {
                            modulo: numeroMod
                        },
                        success: function(data) {
                            data = JSON.parse(data);
                            $.each(data, function(key, registro) {
                                $('#paralelosele').append('<option value=' +
                                    registro.idParalelo + '>' + registro
                                    .nombre_paralelo + '</option>');
                            });
                        }
                    });
                    $('#modalOpcionesSA').modal('toggle');
                });
            } else {
                if (data == "aprobomodulos") {
                    // $("#txttituloMono").html('');
                    // $("#finicioMono").html('');
                    // $("#ffinalMono").html('');    
                    // $("#txtdescripcionMono").html('');
                    $('#modalOpcionesMono').modal('toggle');
                } else //ESTA FUNCIONANDO
                {
                    datos = JSON.parse(data);
                    console.log('esssssssss=' + datos);
                    numeroMod = datos[0]['numeroM'];
                    nombreMod = datos[0]['nombreM'];
                    console.log('nombrem=' + nombreMod);
                    console.log('numerom=' + numeroMod);
                    $("#modulotoca").html(
                        '<p class="alert alert-success"><small>Al diplomante le toca cursar el : (' +
                        convertirANumerosRomanosJS(datos[0]['numeroM']) + ' - ' + datos[0]['nombreM'] +
                        ') ' + datos[0]['asignaturaNombreM'] + '</small></p>');
                    $("#modulocorresponde").val(datos[0]['nombreM']);
                    $("#modulosele").val(datos[0]['numeroM']);
                    $.ajax({
                        type: 'post',
                        url: "http://10.4.25.3:8080/diplomado/index.php/paralelo/get_paralelosde_modulo",
                        data: {
                            modulo: numeroMod
                        },
                        success: function(data) {
                            data = JSON.parse(data);
                            $.each(data, function(key, registro) {
                                $('#paralelosele').append('<option value=' + registro
                                    .idParalelo + '>' + registro.nombre_paralelo +
                                    '</option>');
                            });
                        }
                    });
                    $('#modalOpcionesSA').modal('toggle');
                }
            }
        }
    });
}

function convertirANumerosRomanosJS(cadenaNumero) {

    var numero = parseInt(cadenaNumero);
    if (typeof numero !== 'number' || numero < 1 || numero > 3999) {
        return "Número inválido";
    }

    var romanNumeral = "";
    var valoresRomanos = [{
            valor: 1000,
            numeral: "M"
        },
        {
            valor: 900,
            numeral: "CM"
        },
        {
            valor: 500,
            numeral: "D"
        },
        {
            valor: 400,
            numeral: "CD"
        },
        {
            valor: 100,
            numeral: "C"
        },
        {
            valor: 90,
            numeral: "XC"
        },
        {
            valor: 50,
            numeral: "L"
        },
        {
            valor: 40,
            numeral: "XL"
        },
        {
            valor: 10,
            numeral: "X"
        },
        {
            valor: 9,
            numeral: "IX"
        },
        {
            valor: 5,
            numeral: "V"
        },
        {
            valor: 4,
            numeral: "IV"
        },
        {
            valor: 1,
            numeral: "I"
        }
    ];

    for (var i = 0; i < valoresRomanos.length; i++) {
        while (numero >= valoresRomanos[i].valor) {
            romanNumeral += valoresRomanos[i].numeral;
            numero -= valoresRomanos[i].valor;
        }
    }

    return romanNumeral;
}
//  Asignar mono
function AsignarMonografia() {
    $('#paralelosele').html('');
    // $('#selectModal').html('');

    var ci = $('#cidiplo').text();
    console.log(ci);
    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/diplomante/inscribirMonografia",
        data: {
            txtci: ci,
        },
        success: function(data) {
            // data=JSON.parse(data);
            console.log(data);
            if (data == "notienemono") // data[0]['idMonografia']==null,data.empty(),
            {
                // $('#modalOpcionesMono').modal('toggle'); verificar que cumple
            } else {
                data = JSON.parse(data);
                console.log("ELIAQUIESTOOOY");
                $('#academicosSeleS').html('');
                $.getJSON(
                    'http://10.4.25.3:8080/diplomado/index.php/academicoseleccionado/getTodosAcademicoSelec',
                    function(data) {
                        $.each(data, function(key, registro) {
                            $('#academicosSeleS').append('<option value=' + registro
                                .idRegistroAV + ' >' + registro.nombreA + '</option></br>');
                        });
                    });

                $('#academicosSeleP').html('');
                $.getJSON(
                    'http://10.4.25.3:8080/diplomado/index.php/academicoseleccionado/getTodosAcademicoSelec',
                    function(data) {
                        $.each(data, function(key, registro) {
                            $('#academicosSeleP').append('<option value=' + registro
                                .idRegistroAV + ' >' + registro.nombreA + '</option></br>');
                        });
                    });
                //solo muestra un mensaje para regsitrar defensa debe ir a la lista de monos,,, HACER LO QUE SIGUEE!!!!..
                $.ajax({
                    type: 'post',
                    url: "http://10.4.25.3:8080/diplomado/index.php/defensa/getDefensa_porci",
                    data: {
                        cidiplo: ci
                    },
                    success: function(data) {
                        if (data == "vacio") {
                            $("#mensajedefensa").html(
                                '<em>Registre su Defenza en el Menu de Monografias</em>');
                        } else {
                            data = JSON.parse(data);
                            if (data[0]['nombreDef'] == 1) {
                                $('#dettipoDef').text('Primera Defensa');
                            } else {
                                $('#dettipoDef').text('Defensa Recuperatorio');
                            }
                            $('#detfechaDef').text(data[0]['fechaDef']);
                            $('#detnotaDef').text(data[0]['notaDef']);
                            switch (data[0]['aprobarDef']) {
                                case '1':
                                    $('#detaproboDef').text('APROBADO');
                                    break;
                                case '2':
                                    $('#detaproboDef').text('REPROBADO');
                                    break;
                                case '3':
                                    $('#detaproboDef').text('AHUN NO SE CALIFICO');
                                    break;
                                default:
                                    $('#detaproboDef').text('No se selecciono ninguna opcion');
                                    break;
                            }
                            $('#detobservDef').text(data[0]['observacionDef']);
                        }
                    }
                });
                $('#modalOpcionesDefenza').modal('toggle');
                // console.log(data[0]['tituloMonografia']);
                $("#tituloMono").html(
                    '<center><p class="alert alert-info"><small><strong>Titulo : </strong>' + data[0][
                        'tituloMonografia'
                    ] + '</small></p></center>');
                $("#realizamono").val(data[0]['idRealizaMono']);

            }

        }
    });
}
//Mostrar los checkets en cada fila
$('#checkedreprogramar').on("change", function() {
    if (this.checked == true) {
        // alert('activado');
        // this.checked=confirm('Estas seguro?');
        $("#participantes tbody tr").each(function(index) {

            // $(this).css("background-color", "#ECF8E0");
            $("#reprogramar", this).removeAttr('hidden');
            $("#cambiarPar").show();
            $("#selectMenosUno").removeAttr("hidden");
        })
    } else {
        if (this.checked == false) {
            $("#participantes tbody tr").each(function(index) {

                // $(this).css("background-color", "#ECF8E0");
                $("#reprogramar", this).attr('hidden', 'hidden');
                $("#cambiarPar").hide();
                $("#selectMenosUno").attr('hidden', 'hidden');
            })
        }
    }

});

//CAMBIAR DE PARALELO

$("#cambiarparalelo").click(function() {
    if (confirm('Los participantes seleccionados se cambiaran de Paralelo?')) {
        $("#participantes tbody tr").each(function(index) {
            var campoci, camporegistro, campochecked, campomodulonum, campoparalelo, fechaeditparalelo,
                respuesta;
            $(this).children("td").each(function(index2) {
                // $(this).parent().parent().children("td:eq(1)").text();
                switch (index2) {
                    case 1:
                        if ($("#reprogramar", this).is(':checked')) {
                            campochecked = 1;
                        } else {
                            campochecked = 0;
                        }
                        // campochecked = $("#reprogramar:checked",this).val();
                        break;
                    case 2:
                        camporegistro = $(this).text();
                        break;
                    case 4:
                        campoci = $(this).text();

                        break;
                }
            })
            campomodulonum = $("#nummodulo").text();
            campoparalelo = $("#paraleloMenosUno")
                .val(); //se puede hacer un if de esto para que no haga nad por q no hay mas pparlelos
            fechaeditparalelo = $("#fechacambparalelo").val();

            // alert(campochecked + ' - ' + camporegistro +' -'+campoci+' -'+campomodulonum+' -paraleleo='+campoparalelo+' -'+fechaeditparalelo);
            if (campoparalelo != null) {
                $.ajax({
                    type: 'post',
                    url: "http://10.4.25.3:8080/diplomado/index.php/modulodiplomante/editarParaleloDiplomante",
                    data: {
                        checked: campochecked,
                        numInscripcion: camporegistro,
                        ciDiplomante: campoci,
                        modulosele: campomodulonum,
                        paralelosele: campoparalelo,
                        fechaAsignacion: fechaeditparalelo
                    },
                    success: function(data) {
                        // data=JSON.parse(data);
                        console.log(data);
                        respuesta = data;
                    },
                    complete: function() {
                        setTimeout(function() {
                            $("#msjeditasigancion").fadeOut();
                            top.location.reload(true);
                        }, 2000);
                    }
                });
                if (respuesta == 'noeditado') {
                    $("#msjeditasigancion").html(
                        '<p class="alert alert-danger"><small>No se pudo cambiar de Paralelo a los Participantes seleccionados!!!</small></p>'
                    ).fadeIn();
                    // ("#mostrarocultar").show();
                } else {

                    $("#msjeditasigancion").html(
                        '<p class="alert alert-success"><small>Los Participantes seleccionados se Reprogramaron al Paralelo seleccionado !!!</small></p>'
                    ).fadeIn();
                }
            } else {
                $("#msjeditasigancion").html(
                    '<p class="alert alert-danger"><small>No existe otro Paralelo para realizar la operación!!!</small></p>'
                ).fadeIn();
                setTimeout(function() {
                    $("#msjeditasigancion").fadeOut();
                    top.location.reload(true);
                }, 2000);
            }
        });

    } else {
        top.location.reload(true);
    }
})
</script>

<script>
function ocultardetalle() {
    $("#detalle2").attr('hidden', 'hidden');
    $("#detalle3").attr('hidden', 'hidden');
    $("#ocultar").attr('hidden', 'hidden');
    $("#mostrar").removeAttr('hidden');
}

function mostrardetalle() {
    $("#detalle2").removeAttr('hidden');
    $("#detalle3").removeAttr('hidden');
    $("#ocultar").removeAttr('hidden');
    $("#mostrar").attr('hidden', 'hidden');
}
</script>
<!-- NOTA -->
<script>
//Habilitar input Calificacion
// document.getElementById('checkednota').addEventListener('change',function(){
$('#checkednota').on("change", function() {
    if (this.checked == true) {
        // alert('activado');
        // this.checked=confirm('Estas seguro?');
        $("#tabla tbody tr").each(function(index) {

            // $(this).css("background-color", "#ECF8E0");
            $("#nota", this).removeAttr('readonly');
            $("#mostrarocultar").show();
        })
    } else {
        if (this.checked == false) {
            $("#tabla tbody tr").each(function(index) {

                // $(this).css("background-color", "#ECF8E0");
                $("#nota", this).attr('readonly', 'readonly');
                $("#mostrarocultar").hide();
            })
        }
    }

});

//registrar notas
$("#obtenernota").click(function() {
    $("#tabla tbody tr").each(function(index) {
        var campoci, camponota, campomodulonum, campoparalelo, fechanota, respuesta;
        $(this).children("td").each(function(index2) {
            // $(this).parent().parent().children("td:eq(1)").text();
            switch (index2) {
                case 1:
                    campoci = $(this).text();
                    break;
                case 3:
                    camponota = $("#nota", this).val();

                    break;
            }
        })
        campomodulonum = $("#nummodulo").text();
        campoparalelo = $("#paralelo").text();
        fechanota = $("#fechanota").val();

        // alert(campoci + ' - ' + camponota +' -'+campomodulonum+' -'+campoparalelo+' -'+fechanota+' -'+establecenota);
        if (camponota != '') {

            $.ajax({
                type: 'post',
                url: "http://10.4.25.3:8080/diplomado/index.php/calificacion/registrar_nota",
                data: {
                    ciDiplo: campoci,
                    nota: camponota,
                    numeromodulo: campomodulonum,
                    nombreparalelo: campoparalelo,
                    fechanota: fechanota
                },
                success: function(data) {
                    // data=JSON.parse(data);
                    // $("#estanota",this).text(data[0]['establece_nota']);
                    console.log(data);
                    respuesta = data;
                },
                complete: function() {
                    setTimeout(function() {
                        $("#msjnota").fadeOut();
                        top.location.reload(true);
                    }, 2000);
                }
            });
            $(this).css("background-color", "#ECF8E0");
            $("#nota", this).attr('readonly', 'readonly');
            $("#checkednota").prop('checked', false);
            $("#mostrarocultar").hide();

            if (respuesta == 'nonota') {
                $("#msjnota").html(
                    '<p class="alert alert-danger"><small>No se registro calificacion!!!</small></p>'
                ).fadeIn();
                ("#mostrarocultar").show();
            } else {

                $("#msjnota").html(
                    '<p class="alert alert-success"><small>Se Registraron las Calificaciones!!!</small></p>'
                ).fadeIn();
            }

            // $("#msjnota").html('<p class="alert alert-success"><small>Se Registraron las Calificaciones!!!</small></p>').fadeIn();

        } else {
            $("#msjnota").html(
                '<p class="alert alert-danger"><small>Espere!! no se permiten valores nulos en los campo, el minimo valor aceptado es cero(0)</small></p>'
            ).fadeIn();
            $("#mostrarocultar").show();
        }

    })
})

//kardex
$("body").on("click", "#tabla b", function(event) {

    $("#listabodykardex").html('');
    $("#listabodyMonografia").html('');
    event.preventDefault();
    cisele = $(this).attr("href");
    cisele = $(this).parent().parent().children("td:eq(1)").text();
    // nombresele=$(this).parent().parent().children("td:eq(2)").text();

    // alert(cisele,nombresele);
    $.ajax({
        type: "POST",
        url: "http://10.4.25.3:8080/diplomado/index.php/calificacion/kardex",
        data: {
            ciDiplomante: cisele
        },
        success: function(data) {
            data = JSON.parse(data);
            $('#datosciDiploKardex').html("<p class='text text-success'> CI : <strong>" + data[0][
                'ciD'
            ] + "</strong></p>");
            $('#datosnombreDiploKardex').html("<p class='text text-success'>Nombre :<strong> " +
                data[0]['nombreD'] + " " + data[0]['apellidoPaternoD'] + " " + data[0][
                    'apellidoMaternoD'
                ] + " </strong></p>");
            // console.log(data);
            if (data != null && $.isArray(data)) {
                $.each(data, function(index, value) {
                    $('#listabodykardex').append("<tr><td>" + value['nombreM'] +
                        "</td><td>" + value['nota'] + "</td><td>" + value[
                            'establece_nota'] + "</td></tr>");
                })
            } else {
                $('#listabodykardex').append("<p>No se programó a ningún módulo!!</p>");
            }
        }
    });
    $.ajax({
        type: "POST",
        url: "http://10.4.25.3:8080/diplomado/index.php/calificacion/kardexMonografia",
        data: {
            ciDiplomante: cisele
        },
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            if (data != null && $.isArray(data)) {
                $.each(data, function(index, value) {
                    $('#listabodyMonografia').append("<tr>" +
                        "<td>" + value['tituloMonografia'] + "</td>" +
                        " <td>" + value['notaDef'] + "</td>" +
                        "</tr>");
                })
            } else {
                $('#listabodyMonografia').append("<p>No tiene Monografía</p>");
            }
        }
    });
})
</script>

<!-- ACADEMICO Seleccionadooo-->
<script>
$("body").on("click", "#listaAcademicos b", function(event) {

    $("#titulolabel").html('');
    event.preventDefault();
    cisele = $(this).attr("href");
    nombresele = $(this).parent().parent().children("td:eq(1)").text();
    cisele = $(this).parent().parent().children("td:eq(2)").text();

    // console.log(cisele,gradosele,profecionsele);

    $("#cia").val(cisele);
    $("#nombrea").val(nombresele);
    $("#titulolabel").append('<small>Seleccionar a <strong>' + nombresele +
        '</strong> para asignarle un Rol</small>');

})
</script>
<!-- DOCENCIA -->
<script>
//Crear Docencia
$(document).ready(function() {

    var ciAcadDoc = $("#ciAcadDoc").text();

    if (ciAcadDoc == '') {
        $("#msjErr").html(
            '<p class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><small> Debe seleccionar un Academico de la lista de superior o del apartado <em>"Todos los Academicos"</em> </small><span class="glyphicon glyphicon-hand-up" ></span></p>'
        );
    } else {
        $("#msjdocencia").hide();

        $("#formasigdoc").validate({
            rules: {
                modulosele: {
                    required: true
                },
                paralelosele: {
                    required: true
                },
                estadodoc: {
                    required: true
                },
                fechainiciodoc: {
                    required: true,
                    date: true
                },
                fechafindoc: {
                    required: true,
                    date: true
                }
            },
            messages: {
                modulosele: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar un Modulo.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
                paralelosele: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar un Paralelo, Primero debe escoger un Modulo.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
                estadodoc: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe Asignarle un estado a la Docencia.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
                fechainiciodoc: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar la Fecha de Inicio de Docencia.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
                fechafindoc: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar la Fecha aproximada del Final de Docencia.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
            },
            submitHandler: function(form) {
                //  ciAcadDoc=$("#ciAcadDoc").text();
                var modulosele = $("#modulosele").val();
                paralelosele = $("#paralelosele").val();
                estadodoc = $("#estadodoc").val();
                contratodoc = $("#contratodoc").val();
                fechacontratodoc = $("#fechacontratodoc").val();
                fechainiciodoc = $("#fechainiciodoc").val();
                fechafindoc = $("#fechafindoc").val();
                observacionDoc = $("#observacionDoc").val();

                $.ajax({
                    type: "POST",
                    url: "http://10.4.25.3:8080/diplomado/index.php/docencia/crearDocencia_paralelo",
                    data: {
                        ciAcadDoc: ciAcadDoc,
                        modulosele: modulosele,
                        paralelosele: paralelosele,
                        estadodoc: estadodoc,
                        contratodoc: contratodoc,
                        fechacontratodoc: fechacontratodoc,
                        fechainiciodoc: fechainiciodoc,
                        fechafindoc: fechafindoc,
                        observacionDoc: observacionDoc
                    },
                    success: function(data) {
                        // data=JSON.parse(data);
                        console.log(data);

                        if (data == 'noinsertado') {
                            $("#msjdocencia").html(
                                '<p class="alert alert-danger"><span class="glyphicon glyphicon-floppy-remove" ></span><small> No se puede Registrar Docencia!! El Paralelo ya cuenta con un Docente. </small><span class="glyphicon glyphicon-thumbs-down" ></span></p>'
                            ).fadeIn();

                        } else {
                            $("#msjdocencia").html(
                                '<p class="alert alert-info"><span class="glyphicon glyphicon-ok" ></span><small> Docencia Registrada al Paralelo Exitosamente!!! </small><span class="glyphicon glyphicon-thumbs-up" ></span></p>'
                            ).fadeIn();
                            $("#msjdocencia").show();

                        }
                    },
                    complete: function() {
                        setTimeout(function() {
                            $("#msjdocencia").fadeOut();
                        }, 6000);
                    }
                });
            }
        });
    }

});
//Sacar Datos d Contrato de Docencia para Edicion
$("body").on("click", "#listaDocencia b", function(event) {
    event.preventDefault();
    docencia = $(this).attr("href");
    docencia = $(this).parent().parent().children("td:eq(1)").text();
    console.log(docencia);
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/docencia/obtenerDatos_docencia",
        data: {
            docencia: docencia
        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            $('#editDetdocencia').val(data[0]['idDocencia']);
            $('#editdetciDoc').text(data[0]['ciA']);
            $('#editdetnombreDoc').text(data[0]['nombreA']);
            $('#eDetfechaiDoc').val(data[0]['fechaInicioDoc']);
            $('#eDetfechafinDoc').val(data[0]['fechaFinalDoc']);
            $('#eDetEstadoDoc').val(data[0]['estadoDoc']);
            $('#eDetcartaDoc').val(data[0]['contratoDoc']);
            $('#eDetEmisionDoc').val(data[0]['fecha_contrato']);
            $('#eDetovservDoc').val(data[0]['observacion']);
        }
    });
})
//Editar Datos d Contrato de Docencia
function cambiarDetDocencia() {
    docencia = $('#editDetdocencia').val();
    fechaIni = $('#eDetfechaiDoc').val();
    fechafinal = $('#eDetfechafinDoc').val();
    estadoc = $('#eDetEstadoDoc').val();
    cartadoc = $('#eDetcartaDoc').val();
    fechacarta = $('#eDetEmisionDoc').val();
    observacion = $('#eDetovservDoc').val();

    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/docencia/editarDatos_docencia",
        data: {
            docencia: docencia,
            fechaIni: fechaIni,
            fechafinal: fechafinal,
            estadoc: estadoc,
            cartadoc: cartadoc,
            fechacarta: fechacarta,
            observacion: observacion
        },
        success: function(data) {
            // data=JSON.parse(data);
            // console.log(data);
            if (data == 'noeditadoDetDoc') {
                $("#msjEditDetDoc").html(
                    '<p class="alert alert-danger"><span class="glyphicon glyphicon-floppy-remove" ></span><small> No se puede Editar Datos de Docencia!! </small><span class="glyphicon glyphicon-thumbs-down" ></span></p>'
                ).fadeIn();

            } else {
                $("#msjEditDetDoc").html(
                    '<p class="alert alert-info"><span class="glyphicon glyphicon-ok" ></span><small> Datos de Docencia Editada Exitosamente!!! </small><span class="glyphicon glyphicon-thumbs-up" ></span></p>'
                ).fadeIn();
                // $("#msjEditTuto").show();
            }
        },
        complete: function() {
            setTimeout(function() {
                $("#msjEditDetDoc").fadeOut();
            }, 3000);
        }
    });
}
</script>
<!-- TUTORIA -->
<script>
//insertar tutoria esta bien seleccionando tutor de la lista d tutres
$(document).ready(function() {

    var ciDiplo = $("#ciDiplo").val();
    var pciTutor = $("#pciTutor").val();
    // var tituloMono=$("#titulomono").text();

    $("#msjtutoria").hide();

    // console.log(pciTutor);
    $("#formasignartutoria").validate({
        rules: {
            numContrato: {
                required: true
            },
            ciDiplo: {
                required: true
            },
            pciTutor: {
                required: true
            },
            fechaCarta: {
                required: true,
                date: true
            },
            fechaInicio: {
                required: true,
                date: true
            },
            fechaFinal: {
                required: true,
                date: true
            },
        },
        messages: {
            numContrato: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe Insertar el campo No. de Contrato de la Tutoría.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
            ciDiplo: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small>  Debe seleccionar un Participante de la lista de Lateral .</small><span class='glyphicon glyphicon-hand-right' ></span></p>",
            pciTutor: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small>  Debe seleccionar un Tutor de la lista de Lateral .</small><span class='glyphicon glyphicon-hand-right' ></span></p>",
            fechaCarta: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar una Fecha de Emision de Carta de Contrato.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
            fechaInicio: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar Fecha de Tutoría.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
            fechaFinal: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar Fecha de Culminación de Tutoría.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
        },
        submitHandler: function(form) {
            var realizamono = $("#realizamono").val();
            numContrato = $("#numContrato").val();
            cancelo = $("input:radio[name=radiocancelacion]:checked").val();
            fechaCarta = $("#fechaCarta").val();
            fechaInicio = $("#fechaInicio").val();
            fechaFinal = $("#fechaFinal").val();
            observaciontutoria = $("#observaciontutoria").val();
            //  console.log(ciDiplo+","+tituloMono+","++","+realizamono);
            $.ajax({
                type: "POST",
                url: "http://10.4.25.3:8080/diplomado/index.php/tutoria/crearTutoriaMonografia",
                data: {
                    realizamono: realizamono,
                    pciTutor: pciTutor,
                    numContrato: numContrato,
                    cancelo: cancelo,
                    fechaCarta: fechaCarta,
                    fechaInicio: fechaInicio,
                    fechaFinal: fechaFinal,
                    observaciontutoria: observaciontutoria
                },
                success: function(data) {
                    // data=JSON.parse(data);
                    // console.log(data);
                    // alert(data);
                    if (data == 'notuto') { //==
                        $("#msjtutoria").html(
                            '<p class="alert alert-danger"><span class="glyphicon glyphicon-floppy-remove" ></span><small> No se puede Registrar Tutoría!! Verifique si el Alumno ya Tiene Tutor. </small><span class="glyphicon glyphicon-thumbs-down" ></span></p>'
                        ).fadeIn();
                    } else {
                        // $("#msjtutoria").html('<p class="alert alert-info"><span class="glyphicon glyphicon-ok" ></span><small> Tutoría Registrada Exitosamente!!! </small><span class="glyphicon glyphicon-thumbs-up" ></span></p>').fadeIn();
                        // $("#msjtutoria").show();                    
                        window.location.href =
                            "http://10.4.25.3:8080/diplomado/index.php/tutoria/imprimirpdftutoria/" +
                            $("#realizamono").val();

                    }
                },
                complete: function() {
                    setTimeout(function() {
                        $("#msjtutoria").fadeOut();
                    }, 6000);
                }
            });
        }
    });
});
//Sacar los datos para Mostrar DETALLES
$("body").on("click", "#listaTutorias b", function(event) {
    event.preventDefault();
    realizaMono = $(this).attr("href");
    realizaMono = $(this).parent().parent().children("td:eq(1)").text();
    console.log(realizaMono);
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/tutoria/obtenerDatos_deTutoria",
        data: {
            realizamono: realizaMono
        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            $('#diplomanteTuto').text(data[0]['nombreD'] + " " + data[0]['apellidoPaternoD'] + " " +
                data[0]['apellidoMaternoD']);
            $('#monografiaTuto').text(data[0]['tituloMonografia']);
            // $('#academicov').val(data[0]['idRegistroAV']);
            $('#ciatuto').text(data[0]['ciA']);
            $('#nombredTuto').text(data[0]['nombreA']);
            $('#fechaiTuto').text(data[0]['fecha_inicioT']);
            $('#fechafTuto').text(data[0]['fecha_finalT']);
            $('#cartaTuto').text(data[0]['contratoT']);
            $('#fEmiCartaTuto').text(data[0]['fechaemision_cartaT']);
            if (data[0]['cancelacionT'] == 1) {
                $('#cancelacionTuto').text('Si Cancelo');
            } else {
                $('#cancelacionTuto').text('No Cancelo');
            }
            if (data[0]['aprobarMono'] == 1) {
                $('#resultadoTuto').text('Aprobado');
            } else {
                $('#resultadoTuto').text('Reprobado');
            }
            $('#observacionTuto').text(data[0]['observacionesT']);
        }
    });
})
//Sacar los datos para EDICIO DE TUTORIA
$("body").on("click", "#listaTutorias c", function(event) {
    event.preventDefault();
    realizaMono = $(this).attr("href");
    realizaMono = $(this).parent().parent().children("td:eq(1)").text();
    // console.log(realizaMono);
    $("#checkCambTutor").prop('checked', false);
    $('#academicoAV').html('')
    $("#academicoAV").attr('disabled', 'disabled');
    $("#btncambTut").attr('disabled', 'disabled');

    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/tutoria/obtenerDatos_deTutoria",
        data: {
            realizamono: realizaMono
        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            $('#editrealizamono').val(data[0]['idRealizaMono']);
            $('#editacademicov').val(data[0]['idRegistroAV']);
            $('#editciatuto').text(data[0]['ciA']);
            $('#editnombredTuto').text(data[0]['nombreA']);
            $('#editfechaiTuto').val(data[0]['fecha_inicioT']);
            $('#editfechafTuto').val(data[0]['fecha_finalT']);
            $('#editcartaTuto').val(data[0]['contratoT']);
            $('#editfEmiCartaTuto').val(data[0]['fechaemision_cartaT']);
            $('#editcancelacionTuto').val(data[0]['cancelacionT']);
            $('#editresultadoTuto').val(data[0]['aprobarMono']);
            $('#editobservacionTuto').val(data[0]['observacionesT']);
        }
    });
})

function cambiarTtutoria() {
    // $("#msjEditTuto").hide();
    monografia = $('#editrealizamono').val();
    academico = $('#editacademicov').val();
    fechaini = $('#editfechaiTuto').val();
    fechaafinal = $('#editfechafTuto').val();
    carta = $('#editcartaTuto').val();
    fechacarta = $('#editfEmiCartaTuto').val();
    cancela = $('#editcancelacionTuto').val();
    resultado = $('#editresultadoTuto').val();
    observacion = $('#editobservacionTuto').val();

    console.log(monografia + "," + academico + "," + fechaini + "," + fechaafinal + "," + carta + "," + fechacarta +
        "," + cancela + "," + resultado + "," + observacion);
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/tutoria/editarTutoriaMonografia",
        data: {
            realizamono: monografia,
            editTutor: academico,
            editfechaInicio: fechaini,
            editfechaFinal: fechaafinal,
            editContrato: carta,
            editfechaCarta: fechacarta,
            editcancelo: cancela,
            resultadoMono: resultado,
            editobservaciontuto: observacion
        },
        success: function(data) {
            // data=JSON.parse(data);
            // console.log(data);
            if (data == "noeditTutoriaMono") {
                $("#msjEditTuto").html(
                    '<p class="alert alert-danger"><span class="glyphicon glyphicon-floppy-remove" ></span><small> No se puede Editar Datos de Tutoria!! </small><span class="glyphicon glyphicon-thumbs-down" ></span></p>'
                ).fadeIn();

            } else {
                $("#msjEditTuto").html(
                    '<p class="alert alert-info"><span class="glyphicon glyphicon-ok" ></span><small> Datos de Tutoría Editada Exitosamente!!! </small><span class="glyphicon glyphicon-thumbs-up" ></span></p>'
                ).fadeIn();
                $("#msjEditTuto").show();
            }
        },
        complete: function() {
            setTimeout(function() {
                $("#msjEditTuto").fadeOut();
                // top.location.reload(true);
            }, 3000);
        }
    });
}
//Mostrar los checkets para camb de Tutor
$('#checkCambTutor').on("change", function() {
    $('#academicoAV').html('')
    if (this.checked == true) {
        $("#academicoAV").removeAttr('disabled');
        $("#btncambTut").removeAttr('disabled');
        $.getJSON('http://10.4.25.3:8080/diplomado/index.php/academicoseleccionado/getTodosAcademicoSelec',
            function(data) {
                console.log(data);
                $.each(data, function(key, registro) {
                    $('#academicoAV').append('<option value=' + registro.idRegistroAV + '>' +
                        registro.nombreA + '</option>');
                });
            });
    } else {
        if (this.checked == false) {
            $('#academicoAV').html('')
            $("#academicoAV").attr('disabled', 'disabled');
            $("#btncambTut").attr('disabled', 'disabled');

        }
    }
});

function cambiatidTutor() {
    nuevoacad = $('#academicoAV').val();
    $('#editacademicov').val(nuevoacad);
    $('#editciatuto').text();
    $('#editnombredTuto').text();
    $('#editfechaiTuto').val('');
    $('#editfechafTuto').val('');
    $('#editcartaTuto').val('');
    $('#editfEmiCartaTuto').val();
    $('#editcancelacionTuto').val('');
    $('#editresultadoTuto').val('');
    $('#editobservacionTuto').val('');

    console.log(nuevoacad);
}
</script>
<script>
// function getseleccionaracad(){
//   var aci=$('#BuscarS').val();
//       // console.log(aci);
//       aci=String(aci);
//       // cia=aci;
//       // console.log(cia);
//   $.ajax(
//     {
//       type:'POST',
//       url:"http://10.4.25.3:8080/diplomado/index.php/academicoseleccionado/getAcademicoSelec",
//       data:{
//         ciacad:aci,
//       },
//       success:function(data){
//         // data=jQuery.parseJSON(data);
//         data=JSON.parse(data);
//         console.log(data);
//         $('#pciTutor').val(data[0]['ciA']);
//         // $('#ciA').text(data[0]['ciA']);
//         $('#nombreA').val(data[0]['nombreA']);
//         // $("#msjtutordiplo").hide();

//       }
//     }
//   );
// }
// Saca datos de monografia y diplomante PARA ASIGNARLE UN TUTOR
function getseleccionarDiplo() {
    $('#nombreDef').html(
        ''
    ); //AQUI HACER AL SACAR EL DIPLOMANTE QUE VEA SI YA TIENE DEFENSA 1 SI ES ASI Y SU NOTA ES REPROBADO ASIGNARLE LA OPCION DE DEFENSA 2 EN EL IMPUT SI NO QUE APARESCA LA LA DEFESA 1 SEGUN SU NOTA HACER
    var mono = $('#txtBuscardiplo').val();
    console.log(mono);
    mono = parseInt(mono);
    console.log(mono);
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/monografia/getmonoDiplomante",
        data: {
            realizamono: mono,
        },
        success: function(data) {
            data = JSON.parse(data);
            // alert(data);
            console.log(data);
            $('#realizamono').val(data[0]['idRealizaMono']);
            $('#ciDiplo').val(data[0]['ciD']);
            $('#nombreParticipante').val(data[0]['nombreD'] + " " + data[0]['apellidoPaternoD'] + " " +
                data[0]['apellidoMaternoD']);
            $('#titulomono').text(data[0]['tituloMonografia']);
            // CREO QUE DESDE ESTA LINEA SALE SOBRANDO TODO PORQ EST FUNCION SOLO ESTA SACAND DATS DEL DIPLOMANT PARA ASIGNARLE TUTORIA, NADA D DEF. REVISAR
            // if (data[0]['aprobarMono']==undefined) {
            //   // $('#nombreDef').val(1);
            //   $('#nombreDef').append('<option value="1">Primera Defensa</option>');
            //   $('#tipdef').show();
            //   $('#fechdef').show(); 
            //   $('#fechaDef').removeAttr('disabled');
            //   $('#mnsjprogdefens').hide();
            // } else {
            //   if (data[0]['aprobarMono']==0) {
            //     // $('#nombreDef').val(2);
            //     $('#nombreDef').append('<option value="2">Segunda Defensa</option>');
            //     $('#tipdef').show();
            //     $('#fechdef').show(); 
            //     $('#fechaDef').removeAttr('disabled');
            //     $('#mnsjprogdefens').hide();
            //   } 
            //   else {
            //     $('#tipdef').hide();
            //     $('#fechdef').hide(); 
            //     $('#mnsjprogdefens').show();
            //     $('#mnsjprogdefens').html('<center><p class="text text-danger"><strong>El Diplomante Ya defendio y Aprobo</strong></p></center>'); 
            //   }
            // }
        }
    });
}
// Saca datos de monografia y diplomante PARA ASIGNARLE UNA DEFENSA
function getselecDiplopDefensa() { /// SIN USO NO FUNCIONA????
    $('#nombreDef').html(
        ''
    ); //AQUI HACER AL SACAR EL DIPLOMANTE QUE VEA SI YA TIENE DEFENSA 1 SI ES ASI Y SU NOTA ES REPROBADO ASIGNARLE LA OPCION DE DEFENSA 2 EN EL IMPUT SI NO QUE APARESCA LA LA DEFESA 1 SEGUN SU NOTA HACER
    var mono = $('#txtBuscardiplo').val();
    console.log(mono);
    mono = parseInt(mono);
    console.log(mono);
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/defensa/obtenerDefensa_porMono",
        data: {
            realizamono: mono
        },
        success: function(data) {
            console.log(data);
            if (data != 'vacio') {
                data = JSON.parse(data);
                // console.log(data);
                $('#realizamono').val(data[0]['idRealizaMono']);
                $('#ciDiplo').val(data[0]['ciD']);
                $('#nombreParticipante').val(data[0]['nombreD'] + " " + data[0]['apellidoPaternoD'] + " " +
                    data[0]['apellidoMaternoD']);
                $('#titulomono').text(data[0]['tituloMonografia']);
                if (data[0]['notaDef'] ==
                    0
                ) { //hacer que tb cambien en la tabla monoo trabajar con la tabla aprobar =Def que no se si saca ese dato
                    // $('#nombreDef').val(1);
                    $('#nombreDef').append('<option value="1">Primera Defensa</option>');
                    $('#tipdef').show();
                    $('#fechdef').show();
                    $('#fechaDef').removeAttr('disabled');
                    $('#mnsjprogdefens').hide();
                } else {
                    if (data[0]['notaDef'] >= 1 && data[0]['notaDef'] <=
                        60
                    ) { //REVISAR BIEN NO FUNCIONAAA!!!!! TIENE QUE CAMBIAR PORQUE AL APROBAR DEFENSA SE REGISTRA EN aprobarDef de la tabla defensa no en la tabla mono, hacer que tb cambien en la tabla monoo trabajar con la tabla aprobar =Def que no se si saca ese dato
                        // $('#nombreDef').val(2);
                        $('#nombreDef').append('<option value="2">Segunda Defensa</option>');
                        $('#tipdef').show();
                        $('#fechdef').show();
                        $('#fechaDef').removeAttr('disabled');
                        $('#mnsjprogdefens').hide();
                    } else {
                        $('#tipdef').hide();
                        $('#fechdef').hide();
                        $('#mnsjprogdefens').show();
                        $('#mnsjprogdefens').html(
                            '</br><center><p class="text text-danger"><strong>El Alumno yá defendió y Aprobó !!! <span class="glyphicon glyphicon-thumbs-up"></span> </strong></p></center>'
                        );
                    }
                }
            } else {
                $.ajax({
                    type: 'POST',
                    url: "http://10.4.25.3:8080/diplomado/index.php/monografia/getmonoDiplomante",
                    data: {
                        realizamono: mono,
                    },
                    success: function(resp) {
                        resp = JSON.parse(resp);
                        // alert(resp);
                        console.log(resp);
                        $('#realizamono').val(resp[0]['idRealizaMono']);
                        $('#ciDiplo').val(resp[0]['ciD']);
                        $('#nombreParticipante').val(resp[0]['nombreD'] + " " + resp[0][
                            'apellidoPaternoD'
                        ] + " " + resp[0]['apellidoMaternoD']);
                        $('#titulomono').text(resp[0]['tituloMonografia']);
                        if (resp[0]['aprobarMono'] == undefined || resp[0]['aprobarMono'] ==
                            1) {
                            // $('#nombreDef').val(1);
                            $('#nombreDef').append(
                                '<option value="1">Primera Defensa</option>');
                            $('#tipdef').show();
                            $('#fechdef').show();
                            $('#fechaDef').removeAttr('disabled');
                            $('#mnsjprogdefens').hide();
                        } else {
                            if (resp[0]['aprobarMono'] == 0) {
                                // ESTO NO SIRVE POR Q SI ESTA VACIO COMO VA LLEVAR DIRECTO A SEGUNDA DEFENSA?????
                                // $('#nombreDef').append('<option value="2">Segunda Defensa</option>');
                                // $('#tipdef').show();
                                // $('#fechdef').show(); 
                                // $('#fechaDef').removeAttr('disabled');
                                // $('#mnsjprogdefens').hide();
                                // ESTO SERIA LO CORRECTO
                                $('#tipdef').hide();
                                $('#fechdef').hide();
                                $('#mnsjprogdefens').show();
                                $('#mnsjprogdefens').html(
                                    '<br><center><p class="text text-danger"><strong>El TUTOR NO APROBO LA MONOGRAFIA O NO CANCELO, POR LO TANTO NO PUEDE PROGRAMAR DEFENSA, VERIFIQUE EN LISTA DE TUTORIAS>EDICION</strong></p></center>'
                                );
                            } else {
                                // ESTO ESTABA ANTES... PERO COMO SE PUEDE PONER YA DEFENDIO SI NO ESTA EN LA LISTA DE DEFENSAS OSEA ES VACIO
                                // $('#tipdef').hide();
                                // $('#fechdef').hide(); 
                                // $('#mnsjprogdefens').show();
                                // $('#mnsjprogdefens').html('<br><center><p class="text text-danger"><strong>El Diplomante Ya defendio y Aprobo</strong></p></center>'); 
                                $('#nombreDef').append(
                                    '<option value="1">Primera Defensa</option>');
                                $('#tipdef').show();
                                $('#fechdef').show();
                                $('#fechaDef').removeAttr('disabled');
                                $('#mnsjprogdefens').hide();
                            }
                        }
                    }
                });
            }
        }
    });
}
</script>
<!--Academico-->
<script>
function selectgrado(dato) {
    $('#profA').html('');
    // console.log(dato);
    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/academico/escogerProfesion",
        data: {
            nombrep: dato,
        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            $.each(data, function(key, registro) {
                // $('#profesion').removeAttr('hidden','hidden');
                $('#profA').append('<option value=' + registro.idProfesion + '>' + registro
                    .nombreP + '</option>');
            });

        }
        // error:function(data) {
        //   alert('error');
        // }
    });
}

function buscarciAcademico() {
    var ciA = $('#ciAcad').val();
    if (ciA.length > 0) {
        $.ajax({
            type: 'post',
            url: "http://10.4.25.3:8080/diplomado/index.php/academico/buscarAcademico",
            data: {
                txtCiA: ciA
            },
            success: function(data) {
                // data=JSON.parse(data);
                console.log(data);
                if (data > 0) {
                    // $("#nombreA").attr('value',data[0].nombreA);
                    // $("#ciudadA").attr('value',data[0].ciudadA);
                    // $("#telefonoA").attr('value',data[0].telefonoA);
                    // $("#direccionA").attr('value',data[0].direccionA);
                    // $("#folioA").attr('value',data[0].numFolioA);
                    // $("#txtDescripcionA").attr('value',data[0].descripcionA);

                    $("#verAcad").removeAttr('hidden');

                    $("#mensajeAcademico").html(
                        '<p class="alert alert-warning"><small>Academico Registrado, Ingrese a Ver Academico.</small></p>'
                    );

                    $("#nombreA").val('');
                    $("#ciudadA").val('');
                    $("#telefonoA").val('');
                    $("#direccionA").val('');
                    $("#folioA").val('');
                    $("#txtDescripcionA").val('');
                    $("#profA").val('');

                    $("#nombreA").attr('disabled', 'disabled');
                    $("#ciudadA").attr('disabled', 'disabled');
                    $("#telefonoA").attr('disabled', 'disabled');
                    $("#direccionA").attr('disabled', 'disabled');
                    $("#folioA").attr('disabled', 'disabled');
                    $("#txtDescripcionA").attr('disabled', 'disabled');
                    $("#profA").attr('disabled', 'disabled');


                    $("#btnRegistrarA").attr('disabled', 'disabled');

                } else {
                    $("#mensajeAcademico").html(
                        '<p class="alert alert-success"><small>CI no encontrado, Ingrese datos del nuevo Academico.</small></p>'
                    );

                    $("#verAcad").attr('hidden', 'hidden');

                    $("#nombreA").removeAttr('disabled').focus();
                    $("#ciudadA").removeAttr('disabled');
                    $("#telefonoA").removeAttr('disabled');
                    $("#direccionA").removeAttr('disabled');
                    $("#folioA").removeAttr('disabled');
                    $("#txtDescripcionA").removeAttr('disabled');
                    $("#profA").removeAttr('disabled');


                    $("#nombreA").val('');
                    $("#ciudadA").val('');
                    $("#telefonoA").val('');
                    $("#direccionA").val('');
                    $("#folioA").val('');
                    $("#txtDescripcionA").val('');
                    $("#profA").val('');

                    $("#btnRegistrarA").removeAttr('disabled');

                }
            }
        })
    } else {
        $("#mensajeAcademico").html(
            '<p class="alert alert-danger"><small>Espere!!! Ingrese CI de Academico.</small></p>');
        $("#nombreA").attr('disabled', 'disabled');
        $("#ciudadA").attr('disabled', 'disabled');
        $("#telefonoA").attr('disabled', 'disabled');
        $("#direccionA").attr('disabled', 'disabled');
        $("#folioA").attr('disabled', 'disabled');
        $("#txtDescripcionA").attr('disabled', 'disabled');
        $("#btnRegistrarA").attr('disabled', 'disabled');
    }
}

function editarAcademico() {
    $('#editProfesion').html("");
    var aci = $('#pci').text();
    anombre = $('#pnombre').text();
    afolio = $('#pfolio').text();
    atelefono = $('#ptelefono').text();
    aciudad = $('#pciudad').text();
    adireccion = $('#pdirecc').text();
    adescripcion = $('#pdescrip').text();
    // alert(aci);
    $('#pciA').text('Editar Datos Personales de' + ' ' + aci);

    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/academicoprofesion/obtenerProfesiones",
        data: {
            txtci: aci,
        },
        success: function(data) {
            data = JSON.parse(data);
            $.each(data, function(key, registro) {
                $('#editProfesion').append('<li value=' + registro.idProfesion + '>' + registro
                    .nombreP + '   ' + '<span class="label label-info">' + registro
                    .gradoAcademicoP + '</span></li>');

                // var a=document.createElement('a');

                // a.on('click',function(event){
                //   alert('ajhd');
                // }));
                // $('#botonEliminar').append('<a onclick="llamadaAjax()"> type="button" href="http://10.4.25.3:8080/diplomado/index.php/academicoprofesion/eliminarProfesionAcad?ci='+aci+'&& prof='+registro.nombreP+'">Eliminar</a></br> ');
                // $('#botonEliminar').append('<a onclick="eliminarprofacad()">Eliminar</a></br> ');
            });

        }
    });

    $('#modalEditarA').modal('toggle')

    $('#textoCiA').val(aci);
    $('#textoNombreA').val(anombre);
    $('#textoArchivoA').val(afolio);
    $('#textoTelefonoA').val(atelefono);
    $('#textoCiudadA').val(aciudad);
    $('#textoDireccionA').val(adireccion);
    $('#textoDescripcionA').val(adescripcion);
}

function insertProfesion() {

    var aci = $('#pci').text();
    // alert(aci);

    $('#modalProfesion').modal('toggle')

    $('#textoCi').val(aci);

}

function insertPosgrado() {
    $('#checkModal').html('');
    $('#selectModal').html('');

    var aci = $('#pci').text();
    // alert(aci);

    $('#modalPosgrado').modal('toggle')

    $('#textoCi').val(aci);

    $.getJSON('http://10.4.25.3:8080/diplomado/index.php/especialidad/obtenerEspecialidades', function(data) {
        console.log(data);
        $.each(data, function(key, registro) {
            $('#checkModal').append('<input type="checkbox" id="" name="checkbox[]" value=' + registro
                .idEspecialidad + ' >' + registro.nombreE + '</br>');
        });
    });


    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/academicoprofesion/obtenerProfesiones",
        data: {
            txtci: aci,
        },
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            $.each(data, function(key, registro) {
                $('#selectModal').append('<option value=' + registro.idProfesion + '>' + registro
                    .nombreP + '...' + registro.gradoAcademicoP + '</option>');
            });

        }
    });
}
</script>
<!-- USUARIO -->
<script>
//generar login y contrasena
function generarLogin() {
    var ci = $('#ciusu').val();
    nombre = $('#nombreusu').val();
    apellido = $('#apellidousu').val().substring(0, 3);
    $('#loginusu').removeAttr('readonly');
    $('#contrasenausu').removeAttr('readonly');

    $('#loginusu').val(nombre + apellido);
    $('#contrasenausu').val(ci);
    console.log(ci);
}
//Ver contrasena checked
$('#vercontrasena').on("change", function() {
    if ($(this).prop('checked')) {
        $('#contrasenausu').attr("type", "text");
    } else {
        $('#contrasenausu').attr("type", "password");
    }
});
//Editar Usuario
$("body").on("click", "#listaUsuarios b", function(event) {
    //  $("#estadoVedit").html('')
    event.preventDefault();
    cisele = $(this).attr("href");
    ciu = $(this).parent().parent().children("td:eq(1)").text();
    //  console.log(ciu);
    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/usuario/getUsuario",
        data: {
            ciUsuario: ciu
        },
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            // $("#modalEditDP .close").click();
            $("#ciU").text(data[0]['ciU']);
            $("#ciusu").val(data[0]['ciU']);
            $("#nombreusu").val(data[0]['nombreU']);
            $("#apellidousu").val(data[0]['apellidosU']);
            $("#cargoU").val(data[0]['cargoU']);
            $("#direccionU").val(data[0]['direccionU']);
            $("#telefonoU").val(data[0]['telefonoU']);
            $("#emailU").val(data[0]['emailU']);
            $("#estadoU").val(data[0]['estadoU']);
            $("#tipoU").val(data[0]['tipoU']);
            $("#loginusu").val(data[0]['loginU']);
            $("#contrasenausu").val(data[0]['contrasenaU']);
            $("#obsevacionU").val(data[0]['observacionU']);
        }
    });
})

//Mostrar Informacion de usuario
$("body").on("click", "#listaUsuarios c", function(event) {
    event.preventDefault();
    cisele = $(this).attr("href");
    ciu = $(this).parent().parent().children("td:eq(1)").text();
    //  console.log(ciu);
    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/usuario/getUsuario",
        data: {
            ciUsuario: ciu
        },
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            // $("#modalEditDP .close").click();
            $("#inforci").text(data[0]['ciU']);
            $("#infornombreu").text(data[0]['nombreU'] + " " + data[0]['apellidosU']);
            $("#inforcargou").text(data[0]['cargoU']);
            $("#infordireccionu").text(data[0]['direccionU']);
            $("#infortelefonou").text(data[0]['telefonoU']);
            $("#inforemailu").text(data[0]['emailU']);
            $("#inforestadou").text(data[0]['estadoU'] == 1 ? 'Activado' : 'Desactivado');
            $("#infortipou").text(data[0]['tipoU']);
            $("#inforloginu").text(data[0]['loginU']);
            $("#inforcontrasenau").text(data[0]['contrasenaU']);
            $("#inforobsevacionu").text(data[0]['observacionU']);
        }
    });
})
//modal para eliminar usuario
$("body").on("click", "#listaUsuarios d", function(event) {
    event.preventDefault();
    cisele = $(this).attr("href");
    ciu = $(this).parent().parent().children("td:eq(1)").text();
    //  console.log(ciu);
    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/usuario/getUsuario",
        data: {
            ciUsuario: ciu
        },
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            // $("#modalEditDP .close").click();
            $("#cielim").val(data[0]['ciU']);
        }
    });
})

function eliminarUsuario() {
    var ciu = $("#cielim").val();
    var ciuintroducido = $("#cieliminar").val();
    //  console.log(ciu);
    if (ciuintroducido.length > 0) {
        if (ciuintroducido == ciu) {
            $.ajax({
                type: 'post',
                url: "http://10.4.25.3:8080/diplomado/index.php/usuario/eliminarUsuario",
                data: {
                    ciUsuario: ciuintroducido
                },
                success: function(data) {
                    console.log(data);
                    if (data == 'seelimino') {
                        $("#msjusuario").html(
                            '<p class="alert alert-success"><small>Se Elimino el Usuario!!!</small></p>'
                        ).fadeIn();
                        $("#eliminarUsuario").modal('hide')
                    } else {
                        $("#msjusuario").html(
                            '<p class="alert alert-danger"><span class="glyphicon glyphicon-alert" ></span><small> No es posible Eliminar al Usuario!!!</small></p>'
                        ).fadeIn();
                        $("#eliminarUsuario").modal('hide')
                    }
                },
                complete: function() {
                    setTimeout(function() {
                        $("#msjusuario").fadeOut();
                        top.location.reload(true);
                    }, 2000);
                }
            });
        } else {
            $("#mnsjEliminar").html(
                '<p class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><small> El CI que introdujo no pertenece al Usuario seleccionado!!</small></p>'
            );
        }
    } else {
        $("#mnsjEliminar").html(
            '<p class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><small> Debe Introducir CI del Usuario si desea Eliminar!</small></p>'
        );

    }

}
</script>
<!--Version-->
<script>
// corregir!!!hacer
// $("body").on("click","#estadov",function(){

//     numeroV=$(this).attr("href");
//     nomV=$(this).parent().parent().children("td:eq(1)").text();
//     estadoV=$(this).parent().parent().children("td:eq(7)").text();
//     // alert(estadoV+nomV);
//     if (estadoV==0) {
//       // $("#estadov").removeAttr('class','btn btn-danger btn-group btn-sm');
//       $("#estadov").attr('class','btn btn-info btn-group btn-sm');
//     } else {
//       // $("#estadov").removeAttr('class','btn btn-info btn-group btn-sm');
//       $("#estadov").attr('class','btn btn-info btn-group btn-sm');
//     }
// })
</script>
<script>
//para editar cada version
$("body").on("click", "#listaversiones b", function(event) {
    $("#estadoVedit").html('')
    event.preventDefault();
    numsele = $(this).attr("href");
    nombrev = $(this).parent().parent().children("td:eq(1)").text();
    fechav = $(this).parent().parent().children("td:eq(2)").text();
    tiempov = $(this).parent().parent().children("td:eq(3)").text();
    costov = $(this).parent().parent().children("td:eq(4)").text();
    lugarv = $(this).parent().parent().children("td:eq(5)").text();
    estadov = $(this).parent().parent().children("td:eq(6)").text();
    descripcionv = $(this).parent().parent().children("td:eq(7)").text();

    // alert(numsele+idsele+" "+nombresele+" "+descripcionsele);
    $('#modalEditVersion').modal('toggle')

    $("#txtNombreV").val(nombrev);
    $("#nombreVedit").text(nombrev);
    $("#fechaVedit").val(fechav);
    $("#tiempoVedit").val(tiempov);
    $("#costoVedit").val(costov);
    $("#lugarVedit").val(lugarv);
    $("#estadoVedit").append('<span class="label label-info">' + estadov + '</span>');
    // if (estadov=="Habilitado") {
    //   $("#estadoedit").append('<p ><span class="label label-success">'+estadov+'</span></p>' );
    //   // $("#estadoVedit").html(estadov);
    // } else {
    //   $("#estadoedit").append('<p ><span class="label label-danger">'+estadov+'</span></p>' );
    //   // $("#estadoVedit").html(estadov );
    // }

    $("#descripcionVedit").val(descripcionv);
});
$(document).ready(function() {
    // Captura el evento change del campo de meses
    $('#txtTiempoV').on('input', function() {
        // Obtiene el valor del campo de meses
        var meses = parseInt($(this).val());

        // Calcula el número de pagos restando 1 al número de meses
        var numPagos = meses - 1;

        // Actualiza el valor del campo de pagos
        $('#txtNumPagosV').val(numPagos);
    });
});
$(document).ready(function() {
    // Captura el evento input del campo de valor total
    $('#txtCostoV, #txtNumPagosV').on('input', function() {
        // Obtiene el valor del campo de valor total
        var valorTotal = parseFloat($('#txtCostoV').val()).toFixed(2);
        // Obtiene el valor del campo de meses
        var meses = parseInt($('#txtNumPagosV').val());

        // Calcula el 10% del valor ingresado para la matrícula
        var costoMatricula = (valorTotal * 0.10).toFixed(2);

        // Calcula el 90% del valor ingresado para los módulos
        var costoModulos = (valorTotal * 0.90).toFixed(2);

        // Calcula el monto mínimo del primer pago (matrícula + 1 módulo)
        var pagoPorMes = (costoModulos / meses).toFixed(2);
        var montoMinPrimerPago = (parseFloat(costoMatricula) + parseFloat(pagoPorMes)).toFixed(2);

        // Actualiza los valores de los campos
        $('#txtCostoMatriculaV').val(costoMatricula);
        $('#txtCostoModulosV').val(costoModulos);
        $('#txtMontoMinPrimerPagoV').val(montoMinPrimerPago);
    });
});
</script>
<!-- PROFESION -->
<script>
// $(document).ready(function(){
//   $(document).on('submit','formProfesion',function() {
//     // var aci=$('#input[name=radioProfesion]').text();
//     var data=$(this).serialize();
//     $.ajax(
//       {
//         type:'post',
//         url:"http://10.4.25.3:8080/diplomado/index.php/profesion/crearProfesion",
//         data:{
//           data
//         },
//         success:function(data){
//           $(".resultado-registro").html(data).fadeIn();
//         },
//         complete:function() {
//           setTimeout(function(){
//             $(".resultado-registro").fadeOut();
//           },15000);
//         }
//       }
//     );
//     return false;
//   });
// })

//buscar perofesion SELECT
// $(document).ready(function(){
//   $("select[name=selectProfesion]").change(function(params) 
//   {
//     // $('#paralelosele').html('');
//     tipoProf=$('select[name=selectProfesion]').val();
//     // alert(tipoProf);
//     if (tipoProf=='') 
//     {
//       // $('#paralelosele').html('');
//     } 
//     else {
//       $.ajax(
//       {
//         type:'post',
//         url:"http://10.4.25.3:8080/diplomado/index.php/profesion/seleccionarProfesiones",
//         data:{
//           selectProfesion:tipoProf
//         },
//         success:function(data){
//           data=JSON.parse(data);
//           // top.location.reload(true);
//           console.log(data);
//           if (data!=null && $.isArray(data)) {
//             $.each(data,function(index,value) {
//               $('#profesion').append("<tr><td></td><td>"+value.idProfesion+"</td><td>"+value.nombreP+"</td><td>"+value.gradoAcademicoP+"</td><td></td></tr>");
//             })
//           } else {

//           }
//         }
//       });
//     }
//   });
// })

function selectProfesion() {
    $('#profesiones').html('');
    // console.log(dato);
    $.ajax({
        type: 'get',
        url: "http://10.4.25.3:8080/diplomado/index.php/profesion/getAllProfesiones",
        data: {

        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            $.each(data, function(key, registro) {
                // $('#profesion').removeAttr('hidden','hidden');
                $('#profesiones').append('<option value=' + registro.idProfesion + '>' + registro
                    .nombreP + '--' + registro.gradoAcademicoP + '</option>');
            });

        }
        // error:function(data) {
        //   alert('error');
        // }
    });
}

function crearProfesion() {
    var nombrePr = $('#nombreP').val();
    var tipoPr = $("#radios input[name='radioProfesion']:checked").val();
    // console.log(nombrePr+','+ tipoPr);
    if (nombrePr.length > 0) {
        $.ajax({
            type: 'post',
            url: "http://10.4.25.3:8080/diplomado/index.php/profesion/nuevaProfesion",
            data: {
                txtNombreP: nombrePr,
                radioProfesion: tipoPr
            },
            success: function(data) {
                // $(".resultado-registro").html(data).fadeIn();
                $(".resultado-registro").html('<p class="alert alert-info">' + data + '</p>');
            },
        });
        return false;
    } else {
        $(".resultado-registro").html('<p class="alert alert-warning">Debe ingresar un nombre de Profesion!!</p>');
    }
}

// edicion profesion abre el modal con sus datos
$("body").on("click", "#listaprofesion b", function(event) {
    event.preventDefault();
    nump = $(this).attr("href");
    nump = $(this).parent().parent().children("td:eq(0)").text();
    idp = $(this).parent().parent().children("td:eq(1)").text();
    nombrep = $(this).parent().parent().children("td:eq(2)").text();
    gradop = $(this).parent().parent().children("td:eq(3)").text();

    //alert(cisele+nombresele+" "+apellidopasele+" "+apellidomasele);
    $('#modalProfesion').modal('toggle')

    $("#idprofesion").val(idp);
    $("#nombreeditado").val(nombrep);

    switch (gradop) {
        case "ingenieria":
            $("#raIngenieria").attr('checked', 'true');
            break;
        case "licenciatura":
            $("#raLicenciatura").attr('checked', 'true');
            break;
        case "tecSup":
            $("#raTecSup").attr('checked', 'true');
            break;
        case "tecMed":
            $("#raTecMed").attr('checked', 'true');
            break;
        default:
            $("#raOtro").attr('checked', 'true');
            break;
    }
})

// edicion especialidad abre el modal con sus datos
$("body").on("click", "#listaespecialidad b", function(event) {
    event.preventDefault();
    numsele = $(this).attr("href");
    numsele = $(this).parent().parent().children("td:eq(0)").text();
    idsele = $(this).parent().parent().children("td:eq(1)").text();
    nombresele = $(this).parent().parent().children("td:eq(2)").text();
    descripcionsele = $(this).parent().parent().children("td:eq(3)").text();

    //alert(cisele+nombresele+" "+apellidopasele+" "+apellidomasele);
    $('#modalEspecialidad').modal('toggle')

    $("#idespecialidadEdi").val(idsele);
    $("#nombreedit").val(nombresele);
    $("#descripcionEedit").val(descripcionsele);
})
</script>
<!-- MODULO -->
<script>
// edicion modulo abre el modal con sus datos-
$("body").on("click", "#listamodulos b", function(event) {

    // $("#txtnombresele").attr('type','hidden');
    // $("#txtdescripcionsele").attr('type','hidden');

    event.preventDefault();
    numsele = $(this).attr("href");
    numsele = $(this).parent().parent().children("td:eq(1)").text();

    nombresele = $(this).parent().parent().children("td:eq(2)").text();
    descripcionsele = $(this).parent().parent().children("td:eq(3)").text();

    // Usa el método trim() para eliminar espacios en blanco al principio y al final de la cadena
    descripcionsele = descripcionsele.trim();
    nombresele = nombresele.trim();
    vigencia = $(this).parent().parent().children("td:eq(4)").text();
    desde = $(this).parent().parent().children("td:eq(5)").text();
    hasta = $(this).parent().parent().children("td:eq(6)").text();

    // alert(numsele+nombresele+" "+descripcionsele+" "+vigencia);
    $('#modalEditarModulo').modal('toggle')


    $('#numsele').text(numsele);
    $('#txtnumsele').val(numsele);
    $('#txtnombresele').val(nombresele);
    $('#nombremostrar').text(nombresele);
    $('#txtdescripcionsele').val(descripcionsele);
    $('#vigenteedit').val(vigencia == 'Activo' ? 1 : 0);
    $('#vigencia').html(vigencia == 'Activo' ? '<p class="alert alert-success"><strong>EN CURSO</strong></p>' :
        '<p class="alert alert-danger"><strong>CULMINADO</strong></p>');
    $('#txtfechainicio').val(desde);
    $('#txtfechafinal').val(hasta);
    calcularDiasentre_fechas(hasta, null);

})
// CAMBIA EL FORMATO DE FECHA DE YYYY-MM-D A DD-MM-YYYY
function reverseFecha(fecha) {
    // var info=fecha.split("-").reverse().join('-');
    var info = fecha.replace(/^(\d{4})-(\d{2})-(\d{2})$/g, '$3-$2-$1');
    return info;
}
//abri el modal con un boton 
function abrirModal() {
    $('#modalCrearModulo').modal('toggle')
}
document.addEventListener("DOMContentLoaded", function() {
    // Obtén el botón por su ID
    var btnAbrirModal = document.getElementById("btnAbrirModal");
});
// COLOCA EL NUMERO DE DIAS ENTRE LA FECHA ACTUAL Y LA INDICADA
function calcularDiasentre_fechas(hasta, desde) {
    if (desde == null) {
        var factual = new Date().toJSON().slice(0, 10);
    } else {
        var factual = desde;
    }
    if ($('#txtfechainicio').val() != 0000 - 00 - 00) {
        var finicio = reverseFecha(factual).split('-');
        var ffin = reverseFecha(hasta).split('-');
        var fdesde = Date.UTC(finicio[2], finicio[1] - 1, finicio[0]);
        var fhasta = Date.UTC(ffin[2], ffin[1] - 1, ffin[0]);
        var dias = fhasta - fdesde;
        var diff_in_days = Math.floor(dias / (1000 * 60 * 60 * 24));
        // console.log(fhasta);
        if (diff_in_days < 0) {
            $('#restafechas').html('<p class="alert alert-danger"><strong>' + diff_in_days + ' Dias</strong></p>');
            $('#vigenteedit').val(0);
            // $('#btnActualizar').val('Activar Modulo');boton
        } else {
            $('#restafechas').html('<p class="alert alert-success"><strong>' + diff_in_days + ' Dias</strong></p>');
            $('#vigenteedit').val(1);
            // $('#btnActualizar').val('Desactivar');boton
        }
    } else {
        $('#restafechas').html('<p class="alert alert-info"><strong> INICIE EL MODULO </strong></p>');
    }
}

function calcularDiasentre_fechas_form_create(hasta, desde) {
    if (desde == null) {
        var factual = new Date().toJSON().slice(0, 10);
    } else {
        var factual = desde;
    }
    if ($('#txtFechaInicioMo').val() != 0000 - 00 - 00) {
        var finicio = reverseFecha(factual).split('-');
        var ffin = reverseFecha(hasta).split('-');
        var fdesde = Date.UTC(finicio[2], finicio[1] - 1, finicio[0]);
        var fhasta = Date.UTC(ffin[2], ffin[1] - 1, ffin[0]);
        var dias = fhasta - fdesde;
        var diff_in_days = Math.floor(dias / (1000 * 60 * 60 * 24));
        // console.log(fhasta);
        if (diff_in_days < 0) {
            $('#restafechasMO').html('<p class="alert alert-danger w-100"><strong>' + diff_in_days +
                ' Dias</strong></p>');
            $('#vigenteedit').val(0);
            // $('#btnActualizar').val('Activar Modulo');boton
        } else {
            $('#restafechasMO').html('<p class="alert alert-success w-100"><strong>' + diff_in_days +
                ' Dias</strong></p>');
            $('#vigenteedit').val(1);
            // $('#btnActualizar').val('Desactivar');boton
        }
    } else {
        $('#restafechasMO').html('<p class="alert alert-info w-100"><strong> INICIE EL MODULO </strong></p>');
    }
}
// FUNCION PARA CALCULAR CUANTOS DIAS FALTA PARA TERMINAR EL MODULO
$(document).ready(function() {
    $("#txtfechafinal").change(function() {
        alert('hola');
        var fhasta = $('#txtfechafinal').val();
        calcularDiasentre_fechas(fhasta, null);
    });
});
$(document).ready(function() {
    // Escucha el evento de cambio en el campo de fecha
    $("#txtFechaFinalMo").change(function() {
        // Obtiene el valor del campo de fecha
        var fecha = $(this).val();

        // Verifica si la fecha no está vacía o nula
        if (fecha) {
            // Muestra una alerta con el mensaje "Hola"
            calcularDiasentre_fechas_form_create(fecha, null);

        }
    });
});


// CERRAR MODULO AUTOMATICAMENTE SEGUN LA FECHA DE VENCIMIENTO
$(document).ready(function() {
    // $("#txtfechafinal").change(function(){
    // var fhasta=$('#restafechas').val();
    // calcularDiasentre_fechas(fhasta,null);
    // });
});
// Habilitar la edicion del modulo
function habilitaredicionmod() {
    var numerom = $('#numsele').text();
    var nombrem = $('#nombresele').text();
    var descripcionm = $('#descripcionsele').text();
    var vigencia = $('#vigencia').text();
    var fechaini = $('#fechainicio').text();
    var fechafini = $('#fechafinal').text();
    $('#txtnumsele').val(numerom);
    $('#txtnombresele').val(nombrem);
    $('#txtdescripcionsele').val(descripcionm);
    $('#vigenteedit').val(vigencia);
    $('#txtfechainicio').val(fechaini);
    $('#txtfechafinal').val(fechafini);

    $("#txtnombresele").removeAttr('type', 'hidden');
    $("#txtdescripcionsele").removeAttr('type', 'hidden');
    $("#vigen").removeAttr('hidden');
    $("#fechai").removeAttr('hidden');
    $("#fechaf").removeAttr('hidden');
    $("#btnActualizar").removeAttr('disabled');
}
</script>
<!-- PARALELO -->
<script>
// edicion PARALELO abre el modal con sus datos-
$("body").on("click", "#listaparalelo b", function(event) {

    event.preventDefault();
    nummodusele = $(this).attr("href");
    nummodusele = $(this).parent().parent().children("td:eq(1)").text();
    nombremodusele = $(this).parent().parent().children("td:eq(2)").text();
    idparalelosele = $(this).parent().parent().children("td:eq(3)").text();
    paralelosele = $(this).parent().parent().children("td:eq(4)").text();
    cantidadsele = $(this).parent().parent().children("td:eq(5)").text();

    //alert(cisele+nombresele+" "+apellidopasele+" "+apellidomasele);
    $('#modalEditarParalelo').modal('toggle')

    $("#txtnumeromod").val(nummodusele);
    $("#txtnombremod").val(nombremodusele);
    $("#txtidparalelo").val(idparalelosele);
    $("#txtparalelosele").val(paralelosele);
    $("#txtcantidadsele").val(cantidadsele);
})

function editaParalelo() {
    // $('#profA').html('');
    // console.log(dato);
    var nummod = $("#txtnumeromod").val();
    idparalelo = $("#txtidparalelo").val();
    nombreparalelo = $("#txtparalelosele").val();
    cantidad = $("#txtcantidadsele").val();
    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/paralelo/existeParalelo",
        data: {
            numModulo: nummod,
            nombParalelo: nombreparalelo,
            idParalelo: idparalelo
        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            if (data == '') {
                $.ajax({
                    type: 'post',
                    url: "http://10.4.25.3:8080/diplomado/index.php/paralelo/editarParalelo",
                    data: {
                        txtnumeromod: nummod,
                        txtparalelosele: nombreparalelo,
                        txtidparalelo: idparalelo,
                        txtcantidadsele: cantidad
                    },
                    success: function(data) {
                        // data=JSON.parse(data);
                        // console.log(data);
                        if (data == 'noseedito') {
                            $('#modalEditarParalelo').modal('hide')
                            // top.location.reload(true);
                            $("#msjEditar").html(
                                '<p class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><small> No es Posible Editar el Paralelo</small><span class="glyphicon glyphicon-thumbs-down" ></span></p>'
                            ).fadeIn();


                        } else {
                            $('#modalEditarParalelo').modal('hide')

                            $("#msjEditar").html(
                                '<p class="alert alert-success"><span class="glyphicon glyphicon-ok" ></span><small> Se Edito datos del Paralelo Exitosamente!!!</small><span class="glyphicon glyphicon-thumbs-up" ></span></p>'
                            ).fadeIn();


                        }

                    },
                    complete: function() {
                        setTimeout(function() {
                            $("#msjEditar").fadeOut();
                            top.location.reload(true);
                        }, 4000);

                    }
                });

            } else {
                $("#mnsjErrorEdicion").html(
                    '<p class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><small> Ya Existe un Paralelo con el mismo Nombre!!!</small><span class="glyphicon glyphicon-hand-up" ></span></p>'
                );

            }

        }
        // error:function(data) {
        //   alert('error');
        // }
    });
}
</script>
<!-- MONOGRAFIA -->
<script>
$(document).ready(function() {

    var ciD = $("#pciDiplo").text();

    if (ciD == '') {
        $("#msjDiploamteMo").html(
            '<p class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><small> Debe seleccionar un Alumno de la lista de Lateral " </small><span class="glyphicon glyphicon-hand-right" ></span></p>'
        );
    } else {
        $("#msjMonografia").hide();

        $("#formMonografia").validate({
            rules: {
                txttituloMono: {
                    required: true
                },
                finicioMono: {
                    required: true,
                    date: true
                },
                ffinalMono: {
                    required: true,
                    date: true
                }
            },
            messages: {
                txttituloMono: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe Insertar el nombre del Título de su Monografía.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
                finicioMono: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar una Fecha de Inicio.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
                ffinalMono: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar una Fecha de Término.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
            },
            submitHandler: function(form) {
                // profesionDiplo=$("#profesionDiplo").text();
                var txttituloMono = $("#txttituloMono").val();
                finicioMono = $("#finicioMono").val();
                ffinalMono = $("#ffinalMono").val();
                txtdescripcionMono = $("#txtdescripcionMono").val();

                $.ajax({
                    type: "POST",
                    url: "http://10.4.25.3:8080/diplomado/index.php/monografia/crearMonografia_de_Diplomante",
                    data: {
                        txtcidiplomante: ciD,
                        txttituloMono: txttituloMono,
                        finicioMono: finicioMono,
                        ffinalMono: ffinalMono,
                        txtdescripcionMono: txtdescripcionMono
                    },
                    success: function(data) {
                        // data=JSON.parse(data);
                        // console.log(data);
                        // alert(data);
                        if (data == 'nomono') {
                            $("#msjMonografia").html(
                                '<p class="alert alert-danger"><span class="glyphicon glyphicon-floppy-remove" ></span><small> No se puede Registrar Monografia!! Verifique si el Alumno ya Tiene Monografia Registrada. </small><span class="glyphicon glyphicon-thumbs-down" ></span></p>'
                            ).fadeIn();

                        } else {
                            $("#msjMonografia").html(
                                '<p class="alert alert-info"><span class="glyphicon glyphicon-ok" ></span><small> Monografia Registrada Exitosamente!!! </small><span class="glyphicon glyphicon-thumbs-up" ></span></p>'
                            ).fadeIn();
                            $("#msjMonografia").show();

                        }
                    },
                    complete: function() {
                        setTimeout(function() {
                            $("#msjMonografia").fadeOut();
                        }, 6000);
                    }
                });
            }
        });
    }

});
//Sacar los datos para EDICIO DE MONOGRAFIA
$("body").on("click", "#listaMonografia b", function(event) {
    event.preventDefault();
    monografia = $(this).attr("href");
    monografia = $(this).parent().parent().children("td:eq(1)").text();
    // console.log(monografia);
    $("#mnsjeditMono").hide();

    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/monografia/getMonografiaporId",
        data: {
            monografia: monografia
        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            $('#editmonografia').val(data[0]['idMonografia']);
            $('#editTituloMono').val(data[0]['tituloMonografia']);
            $('#editIniciaMo').val(data[0]['fecha_inicioMo']);
            $('#editFinalMo').val(data[0]['fecha_finalMo']);
            $('#editObservMo').val(data[0]['descripcionMo']);
        }
    });
})

function editarMonografia() {
    monografia = $('#editmonografia').val();
    titulo = $('#editTituloMono').val();
    desde = $('#editIniciaMo').val();
    hasta = $('#editFinalMo').val();
    ovservacion = $('#editObservMo').val();
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/monografia/editarMonografia",
        data: {
            editmonografia: monografia,
            edittitulo: titulo,
            editdesde: desde,
            edithasta: hasta,
            editovservacion: ovservacion
        },
        success: function(data) {
            // console.log(data);
            if (data == 'noeditMono') {
                $("#mnsjeditMono").html(
                    '<p class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><small> No es Posible Editar Monografia</small><span class="glyphicon glyphicon-thumbs-down" ></span></p>'
                ).fadeIn();

            } else {

                $("#mnsjeditMono").html(
                    '<p class="alert alert-success"><span class="glyphicon glyphicon-ok" ></span><small> Se Edito datos de Monografia Exitosamente!!!</small><span class="glyphicon glyphicon-thumbs-up" ></span></p>'
                ).fadeIn();

            }
        },
        complete: function() {
            setTimeout(function() {
                $("#mnsjeditMono").fadeOut();
                top.location.reload(true);
            }, 3000);
        }
    });
}
</script>
<script>
// ya no est en uso, colocaba los valore a texarea
function modulodiplomante() {
    var v1 = $("#cisele").val();
    var v2 = $("#listasele").val();
    var v3 = $("#modulito").val();

    $("#cidiplomante").val(v1);
    $("#nombrediplomante").val(v2);
    $("#modulosele").val(v3);
}
</script>
<script>
//vista modulo, para el boton -iniciar version!! CREO Q YA NO ESTA EN USO REVISAR
function iniciarV() {

    if (confirm(
            'Desde este momento se Iniciara la version Actual, solo podra acceder a esta version. Desea Continuar?')) {
        $.getJSON('http://10.4.25.3:8080/diplomado/index.php/version/habilitarV', function(resp) {
            console.log(resp);
            $("#iniciarver").html('<p class="alert alert-info">La version durara aproximadamente ' + resp +
                ', Buena suerte!!</p>');
        });
    } else {
        console.log("nooo se confirmoo, no hacer nada");
    }
}
</script>
<!--DEFENSA-->
<script>
//   $(document).ready(function() {
//     $('#defensas').DataTable( {
//         dom: 'Bfrtip',
//         buttons: [
//             'copy', 'csv', 'excel', 'pdf', 'print'
//         ]
//     } );
// } );
//Mostrar Tribunales
$("body").on("click", "#listaDefensa b", function(event) {
    event.preventDefault();
    defensa = $(this).attr("href");
    defensa = $(this).parent().parent().children("td:eq(1)").text();

    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/defensa/getDefensa_tribunal",
        data: {
            iddefensa: defensa
        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            $('#nombreD').text(data[0]['nombreD'] + " " + data[0]['apellidoPaternoD'] + " " + data[
                0]['apellidoMaternoD']);
            $('#tituloMono').text(data[0]['tituloMonografia']);
            $.each(data, function(key, registro) {
                if (registro.tipo_tribunal == 'Presidente') {
                    $('#tribunaP').val(registro.idTribunal);
                    $('#tipoTribP').text(registro.tipo_tribunal);
                    $('#ciPresidente').text(registro.ciA);
                    $('#nombrePresidente').text(registro.nombreA);
                    if (registro.carta_invitacionTrib == '1') {
                        $('#cartaP').text("Se Envio Carta de Inv.");
                    } else {
                        $('#cartaP').text("No se envio Carta de Inv.");
                    }

                } else {
                    $('#tribunaS').val(registro.idTribunal);
                    $('#tipoTribS').text(registro.tipo_tribunal);
                    $('#ciSecretario').text(registro.ciA);
                    $('#nombreSecretario').text(registro.nombreA);
                    if (registro.carta_invitacionTrib == '1') {
                        $('#cartaS').text("Se Envio Carta de Inv.");
                    } else {
                        $('#cartaS').text("No se envio Carta de Inv.");
                    }
                }
            });
        }
    });
})
//obtener datos p.editar trib Presi
function editarPresi() {
    $(".mnsjeditribunal").html('');

    $('#academicosSele').html('');
    trib = $('#tribunaP').val();
    nombrep = $('#nombrePresidente').text();

    $('#tribunal').val(trib);
    $('#diplomante').text(nombrep);
    $.getJSON('http://10.4.25.3:8080/diplomado/index.php/academicoseleccionado/getTodosAcademicoSelec', function(data) {
        // console.log(data);
        $.each(data, function(key, registro) {
            $('#academicosSele').append('<option value=' + registro.idRegistroAV + ' >' + registro
                .nombreA + '</option></br>');
        });
    });
}
//obtener datos p.editar trib Secre
function editarSecre() {
    $(".mnsjeditribunal").html('');

    $('#academicosSele').html('');
    trib = $('#tribunaS').val();
    nombres = $('#nombreSecretario').text();

    $('#tribunal').val(trib);
    $('#diplomante').text(nombres);
    $.getJSON('http://10.4.25.3:8080/diplomado/index.php/academicoseleccionado/getTodosAcademicoSelec', function(data) {
        // console.log(data);
        $.each(data, function(key, registro) {
            $('#academicosSele').append('<option value=' + registro.idRegistroAV + ' >' + registro
                .nombreA + '</option></br>');
        });
    });
}
//CREAR DEFENSA DESDE EL MODAL DE DETALLES DEL DIPLOMANTE---------sin uso ahun
$(document).ready(function() {
    var ciD = $("#pciDiplo").text();

    // $("#msjMonografia").hide();
    $("#formModalDefenza").validate({
        rules: {
            // realizamono: { required: true},
            // nombreDef: { required:true},
            fechaDef: {
                required: true,
                date: true
            }
            // tipoTribunal[]:{ required:true},
            // tribunal[]:{ required:true},
            // invitacioncarta[]:{ required:true}
        },
        messages: {
            // realizamono: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe Insertar el nombre del Título de su Monografía.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
            // nombreDef: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar un tipo de Defenza.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",
            fechaDef: "<p class='alert alert-warning'><span class='glyphicon glyphicon-alert' ></span><small> Debe seleccionar una Fecha de Defenza.</small><span class='glyphicon glyphicon-hand-up' ></span></p>",

        },
        submitHandler: function(form) {
            var realizamono = $("#realizamono").val();
            nombreDef = $("#nombreDef").val();
            fechaDef = $("#fechaDef").val();
            tipoTribunal = $("#tipoTribunal[]").val();
            tribunal = $("#tribunal").val();
            invitacioncarta = $("#invitacioncarta").val();

            $.ajax({
                type: "POST",
                url: "http://10.4.25.3:8080/diplomado/index.php/defensa/crearDefensa_paraPie",
                data: {
                    realizamono: realizamono,
                    nombreDef: nombreDef,
                    fechaDef: fechaDef,
                    tipoTribunal: tipoTribunal,
                    tribunal: tribunal,
                    invitacioncarta: invitacioncarta
                },
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);
                    // alert(data);
                    // if (data =='nomono') {
                    //   $("#msjMonografia").html('<p class="alert alert-danger"><span class="glyphicon glyphicon-floppy-remove" ></span><small> No se puede Registrar Monografia!! Verifique si el Diplomante ya Tiene Monografia Registrada. </small><span class="glyphicon glyphicon-thumbs-down" ></span></p>').fadeIn();

                    // } 
                    // else 
                    // {
                    //   $("#msjMonografia").html('<p class="alert alert-info"><span class="glyphicon glyphicon-ok" ></span><small> Monografia Registrada Exitosamente!!! </small><span class="glyphicon glyphicon-thumbs-up" ></span></p>').fadeIn();
                    //   $("#msjMonografia").show();

                    // }
                },
                complete: function() {
                    setTimeout(function() {
                        $("#msjMonografia").fadeOut();
                    }, 6000);
                }
            });
        }
    });
});
//Editar Tribunal
function editarTribunal() {

    trib = $('#tribunal').val();
    academico = $('#academicosSele').val();
    carta = $('#editCarta').val();
    console.log(trib + "," + academico + "," + carta);
    if (academico != '') {
        $.ajax({
            type: 'POST',
            url: "http://10.4.25.3:8080/diplomado/index.php/defensa/editarTribunal",
            data: {
                tribunal: trib,
                academicov: academico,
                cartaA: carta
            },
            success: function(data) {
                // console.log(data);
                if (data == 'noeditrib') {
                    $(".mnsjeditribunal").html(
                        '<p class="alert alert-warning "><span class="glyphicon glyphicon-alert" ></span><small> No es posible Editar Tribunal" </small><span class="glyphicon glyphicon-thumbs-down" ></span></p>'
                    );
                } else {
                    $(".mnsjeditribunal").html(
                        '<p class="alert alert-success"><span class="glyphicon glyphicon-ok" ></span><small> Se Edito Tribunal " </small><span class="glyphicon glyphicon-hand-right" ></span></p>'
                    );
                    data = JSON.parse(data);
                    if (data[0]['tipo_tribunal'] == 'Presidente') {
                        $('#ciPresidente').text(data[0]['ciA']);
                        $('#nombrePresidente').text(data[0]['nombreA']);
                        if (data[0]['carta_invitacionTrib'] == '1') {
                            $('#cartaP').text("Se Envio Carta de Inv.");
                        } else {
                            $('#cartaP').text("No se envio Carta de Inv.");
                        }
                    } else {
                        $('#ciSecretario').text(data[0]['ciA']);
                        $('#nombreSecretario').text(data[0]['nombreA']);
                        if (data[0]['carta_invitacionTrib'] == '1') {
                            $('#cartaS').text("Se Envio Carta de Inv.");
                        } else {
                            $('#cartaS').text("No se envio Carta de Inv.");
                        }
                    }
                }
            }
        });
    } else {
        $(".mnsjeditribunal").html(
            '<p class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><small> Debe seleccionar un Academico " </small><span class="glyphicon glyphicon-hand-up" ></span></p>'
        );
    }
}

//Obtener datos de Nota y cambiaFecha al modal defensa
$("body").on("click", "#listaDefensa c", function(event) {
    event.preventDefault();
    defensa = $(this).attr("href");
    defensa = $(this).parent().parent().children("td:eq(1)").text();

    $("#checkHabilitarNota").prop('checked', false);
    $("#notaDef").attr('readonly', 'readonly');
    $("#AprobacionDef").attr('readonly', 'readonly');
    $("#observDef").attr('readonly', 'readonly');

    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/defensa/getDefensa_tribunal",
        data: {
            iddefensa: defensa
        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            $('#defensa').val(defensa);
            $('#nombreDiplo').text(data[0]['nombreD'] + " " + data[0]['apellidoPaternoD'] + " " +
                data[0]['apellidoMaternoD']);
            $('#titulo').text(data[0]['tituloMonografia']);
            $('#fechaDef').text(data[0]['fechaDef']);
            $('#notaDef').val(data[0]['notaDef']);
            $('#AprobacionDef').val(data[0]['aprobarDef']);
            $('#observDef').val(data[0]['observacionDef']);
        }
    });
})
//Aparece Fecha para edit
$('#checkapareceFecha').on("change", function() {
    if (this.checked == true) {
        $(".cambiar-fecha").removeAttr('hidden');
        // $("#mostrarocultar").show();
    } else {
        if (this.checked == false) {
            $(".cambiar-fecha").attr('hidden', 'hidden');
            // $("#mostrarocultar").hide();
        }
    }
});
//editar fechade defensa
function cambiarFechaDef() {
    defensaa = $('#defensa').val();
    fecha = $('#fechaEditDef').val();
    // console.log(fecha);
    if (fecha == '') {
        $("#mnsjeditfecha").html(
            '<p class="alert alert-warning "><span class="glyphicon glyphicon-alert" ></span><small> Debe Seleccionar una Fecha y Hora" </small><span class="glyphicon glyphicon-hand-up" ></span></p>'
        ).fadeIn();
    } else {
        $.ajax({
            type: 'POST',
            url: "http://10.4.25.3:8080/diplomado/index.php/defensa/editarFechaDef",
            data: {
                defensa: defensaa,
                fechad: fecha
            },
            success: function(data) {
                // console.log(data);
                if (data == 'noeditFechaDef') {
                    $("#mnsjeditfecha").html(
                        '<p class="alert alert-warning "><span class="glyphicon glyphicon-alert" ></span><small> No es posible Editar Fecha de Defensa" </small><span class="glyphicon glyphicon-thumbs-down" ></span></p>'
                    ).fadeIn();
                } else {
                    $("#mnsjeditfecha").html(
                        '<p class="alert alert-success"><span class="glyphicon glyphicon-ok" ></span><small> Se Edito Fecha de Defensa " </small><span class="glyphicon glyphicon-thumbs-up" ></span></p>'
                    ).fadeIn();
                    data = JSON.parse(data);
                    $('#fechaDef').text(data[0]['fechaDef']);
                }
            },
            complete: function() {
                setTimeout(function() {
                    $("#mnsjeditfecha").fadeOut();
                    $('#fechaEditDef').val('');
                    $("#checkapareceFecha").prop('checked', false);
                    $(".cambiar-fecha").attr('hidden', 'hidden');

                }, 3000);
            }
        });
    }
}
//Habilitar campos para introducir nota
$('#checkHabilitarNota').on("change", function() {
    if (this.checked == true) {
        $("#notaDef").removeAttr('readonly');
        // $("#AprobacionDef").removeAttr('readonly');
        $("#observDef").removeAttr('readonly');
    } else {
        if (this.checked == false) {
            $("#notaDef").attr('readonly', 'readonly');
            // $("#AprobacionDef").attr('readonly','readonly');
            $("#observDef").attr('readonly', 'readonly');
        }
    }
});
//Asignar Nota de defensa
function asignarNotaDef() {
    defensaa = $('#defensa').val();
    nota = $('#notaDef').val();
    // aprobacion=$('#AprobacionDef').val();
    observacion = $('#observDef').val();
    // console.log(fecha);
    // if (aprobacion=='') {
    //   $("#mnsjeditfecha").html('<p class="alert alert-warning "><span class="glyphicon glyphicon-alert" ></span><small> Debe Seleccionar una Opcion en "Respuesta Tribunal" </small><span class="glyphicon glyphicon-thumbs-up" ></span></p>').fadeIn();
    // } 
    // else {
    if (nota >= 0 && nota < 65) {
        aprobacion = "2";
    } else {
        if (nota > 64 && nota <= 100) {
            aprobacion = "1";
        } else {
            aprobacion = "3";
        }
    }
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/defensa/AsignarNotaDefensa",
        data: {
            defensa: defensaa,
            nota: nota,
            aprobacion: aprobacion,
            observacion: observacion
        },
        success: function(data) {
            // console.log(data);
            if (data == 'nocalificadoDef') {
                $("#mnsjeditfecha").html(
                    '<p class="alert alert-warning "><span class="glyphicon glyphicon-alert" ></span><small> No es posible Registrar Resultados de Defensa" </small><span class="glyphicon glyphicon-thumbs-down" ></span></p>'
                ).fadeIn();
            } else {
                $("#mnsjeditfecha").html(
                    '<p class="alert alert-success"><span class="glyphicon glyphicon-ok" ></span><small> Se Registraron los Resulados de la Defensa " </small><span class="glyphicon glyphicon-thumbs-up" ></span></p>'
                ).fadeIn();
                data = JSON.parse(data);
                $('#notaDef').val(data[0]['notaDef']);
                $('#AprobacionDef').val(data[0]['aprobarDef']);
                $('#observDef').val(data[0]['observacionDef']);

                $('#notaDef').attr('readonly', 'readonly');
                // $('#AprobacionDef').attr('readonly','readonly');
                $('#observDef').attr('readonly', 'readonly');
            }
        },
        complete: function() {
            setTimeout(function() {
                $("#mnsjeditfecha").fadeOut();
                $("#checkHabilitarNota").prop('checked', false);
                $("#notaDef").attr('readonly', 'readonly');
                // $("#AprobacionDef").attr('readonly','readonly');
                $("#observDef").attr('readonly', 'readonly');
            }, 4000);
        }
    });
    // }
}
//Mostrar Datos de Defensa para imprimir
$("body").on("click", "#listaDefensa d", function(event) {
    event.preventDefault();
    defensa = $(this).attr("href");
    defensa = $(this).parent().parent().children("td:eq(1)").text();

    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/defensa/getDefensa_tribunal",
        data: {
            iddefensa: defensa
        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            $('#defensa').val(defensa);
            $('#detInscrDef').text(data[0]['numeroI']);
            $('#detciDef').text(data[0]['ciD']);
            $('#detnombreDef').text(data[0]['nombreD'] + " " + data[0]['apellidoPaternoD'] + " " +
                data[0]['apellidoMaternoD']);
            $('#detTituloMonoDef').text(data[0]['tituloMonografia']);
            if (data[0]['nombreDef'] == 1) {
                $('#dettipoDef').text('Primera Defensa');
            } else {
                $('#dettipoDef').text('Defensa Recuperatorio');
            }
            $('#detfechaDef').text(data[0]['fechaDef']);
            $('#detnotaDef').text(data[0]['notaDef']);
            switch (data[0]['aprobarDef']) {
                case '1':
                    $('#detaproboDef').text('APROBADO');
                    break;
                case '2':
                    $('#detaproboDef').text('REPROBADO');
                    break;
                case '3':
                    $('#detaproboDef').text('AHUN NO SE CALIFICO');
                    break;
                default:
                    $('#detaproboDef').text('No se selecciono ninguna opcion');
                    break;
            }
            $('#detobservDef').text(data[0]['observacionDef']);
        }
    });
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/defensa/getDefensa_tribunal",
        data: {
            iddefensa: defensa
        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            $('#nombreD').text(data[0]['nombreD'] + " " + data[0]['apellidoPaternoD'] + " " + data[
                0]['apellidoMaternoD']);
            $('#tituloMono').text(data[0]['tituloMonografia']);
            $.each(data, function(key, registro) {
                if (registro.tipo_tribunal == 'Presidente') {
                    $('#detciTribp').text(registro.ciA);
                    $('#detnombreTribp').text(registro.nombreA);
                } else {
                    $('#detciTribs').text(registro.ciA);
                    $('#detnombreTribs').text(registro.nombreA);
                }
            });
        }
    });
})
//iprimir Detalle Defensa
$(document).on("click", "#printDetalleDef", function() {
    $("#bodydetalleDef").print({
        title: "Detalle de Defensa"
    });

})

//ALEATORIO DE TRIBUNALES PARA DEFENZA
$("body").on("click", "#aleatorio", function(event) {
    event.preventDefault();
    var tipoProfesion = '';
    // alert(ci);
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/defensa/tribunal_aleatorio",
        data: {
            tipoProf: tipoProfesion
        },
        success: function(data) {
            if (data == "vacioaleatorio") {
                console.log("no hay aleatorio");
            } else {
                data = JSON.parse(data);
                console.log(data);
                var a = $("#presialeatorio").text(data[0]['nombreA']);
                b = $("#secrealeatorio").text(data[1]['nombreA']);

                $('#presialeatorioo').attr('value', data[0]['idRegistroAV']);
                $("#presialeatorioo").text(data[0]['nombreA']);
                $('#secrealeatorioo').attr('value', data[1]['idRegistroAV']);
                $("#secrealeatorioo").text(data[1]['nombreA']);

                $("#botonForm").removeAttr('disabled');
                console.log(data[0]['idRegistroAV']);
            }
        }
    });
})
//kk
$(document).ready(function() {
    if ($("#presialeatorio").text() == '' && $("#secrealeatorio").text() == '') {
        $("#botonForm").attr('disabled', 'disabled');
    } else {
        $('#tribunal').on("change", function() {
            $("#botonForm").removeAttr('disabled');
        });

    }
});
//modal Detalle Academico desde Modal Lista de Academico
$("body").on("click", "#listaAcademicosmodal c", function(event) {

    $("#academicoCompleto").html("");
    $("#profesionAcademico").html("");
    event.preventDefault();
    numsele = $(this).attr("href");
    numsele = $(this).parent().parent().children("td:eq(0)").text();
    nombresele = $(this).parent().parent().children("td:eq(1)").text();
    ci = $(this).parent().parent().children("td:eq(2)").text();
    telefono = $(this).parent().parent().children("td:eq(3)").text();
    folio = $(this).parent().parent().children("td:eq(4)").text();
    ciudad = $(this).parent().parent().children("td:eq(5)").text();

    $('#ciacadtitulo').text(ci);
    // alert(numsele+nombresele+" "+ci+" "+telefono);
    // $('#modalEditarModulo').modal('toggle')
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/academico/getAcademico_paraModalDefenza",
        data: {
            ciAcademico: ci
        },
        success: function(data) {
            if (data == "listaVaciaAcademico") {
                console.log("no hay academicos para seleccionas=r");
            } else {
                data = JSON.parse(data);
                // console.log(data);
                $('#ciacademico').text(data[0]['ciA']);
                $("#nombreacademico").text(data[0]['nombreA']);
                $('#ciudadacademico').text(data[0]['ciudadA']);
                $("#direccionacademico").text(data[0]['direccionA']);
                $("#telefonoacademico").text(data[0]['telefonoA']);
                $('#noarchivoacademico').text(data[0]['numFolioA']);
                $("#observacionacademico").text(data[0]['descripcionA']);

                // $('#ciudadacademico').attr('value',data[1]['idRegistroAV']);
            }
        }
    });
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/academico/getAcademicoProfesion_paramodalDef",
        data: {
            ciAcademico: ci
        },
        success: function(data) {
            if (data == "listaVaciaAcademicoProfesion") {
                console.log("no hay profesiones de academicos para seleccionar");
            } else {
                data = JSON.parse(data);
                $.each(data, function(key, registro) {
                    console.log(registro);
                    $("#profesionAcademico").append('<li type="button"><small>' + registro
                        .nombreP + '<span class="label label-default" > ' + registro
                        .gradoAcademicoP + '</span></small></li>');
                    // $('#profesiones').append('<option value='+registro.idProfesion+'>'+registro.nombreP+'--'+registro.gradoAcademicoP+'</option>');
                });
            }
        }
    });
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/academico/getAcademicoCompleto_paramodalDef",
        data: {
            ciAcademico: ci
        },
        success: function(data) {
            if (data == "listaVaciaAcademicoEspecialidad") {
                console.log("no hay especialidad de academicos para seleccionar");
            } else {
                data = JSON.parse(data);
                $.each(data, function(key, registro) {
                    console.log(registro);
                    $("#academicoCompleto").append('<tr><td><small>' + registro.nombreP +
                        '--' + registro.gradoAcademicoP +
                        '</small></td></br> <td><small>' + registro.nombreE +
                        '</small></td></tr>');
                    // $('#profesiones').append('<option value='+registro.idProfesion+'>'+registro.nombreP+'--'+registro.gradoAcademicoP+'</option>');
                });
            }
        }
    });
})
// MODAL PARA SELECCIONAR TIPO DE TRIBUNAL SECRE O PRESE
$("body").on("click", "#listaAcademicosmodal b", function(event) {
    event.preventDefault();
    numsele = $(this).attr("href");
    numsele = $(this).parent().parent().children("td:eq(0)").text();
    nombre = $(this).parent().parent().children("td:eq(1)").text();
    ciTribunal = $(this).parent().parent().children("td:eq(2)").text();
    telefono = $(this).parent().parent().children("td:eq(3)").text();

    // alert(cisele+nombresele+" "+apellidopasele+" "+apellidomasele);
    $("#cia").text(ciTribunal);
    $("#nombretrib").text(nombre);
})
// MODAL PARA SELECCIONAR PRESIDENTE O SECRETARIO DEL LA LSITA 
function selecTribunal() {
    ciTribunal = $("#cia").text();
    nombreTribunal = $("#nombretrib").text();
    tipoTrib = $('#radios[name=radiotipotrib]:checked').val();
    console.log(tipoTrib, ciTribunal);
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/academicoseleccionado/crearSeleccionAcademico",
        data: {
            citrib: ciTribunal
        },
        success: function(data) {
            if (data == "nosepuedeinsertaracademico") {
                console.log("no se puede seleccionar");
            } else {
                data = JSON.parse(data);
                console.log(data);
                v1 = data[0]['nombreA'];
                switch (tipoTrib) {
                    case "Presidente":
                        $("#presialeatorio").text(nombreTribunal);
                        $('#presialeatorioo').attr('value', data[0]['idRegistroAV']);
                        $("#presialeatorioo").text(data[0]['nombreA']);
                        // $(this).parent().css("background-color","red");
                        // $("table td:last-child:contains("+ciTribunal+")").parents("tr").css("background-color","red");
                        // $("table td").parents("tr").css("background-color","white");
                        $("table td:nth-child(2):contains(" + v1 + ")").parents("tr").css(
                            "background-color", "#5499C7 ");
                        $("#botonForm").removeAttr('disabled'); //desbloquea el boton "Registrar defensa"
                        break;
                    case "Secretario":
                        $("#secrealeatorio").text(nombreTribunal);
                        $('#secrealeatorioo').attr('value', data[0]['idRegistroAV']);
                        $("#secrealeatorioo").text(data[0]['nombreA']);
                        // $("table td").parents("tr").css("background-color","white");
                        $("table td:nth-child(2):contains(" + v1 + ")").parents("tr").css(
                            "background-color", "#F4D03F");
                        $("#botonForm").removeAttr('disabled'); //desbloquea el boton "Registrar defensa"
                        break;
                    default:
                        // mejor que se habilite el boton contratar cuando seleccione alguna opcion
                        $("#secrealeatorio").text("");
                        $("#botonForm").removeAttr('disabled'); //desbloquea el boton "Registrar defensa"
                        break;
                }
            }
        }
    });

}
// BOTON BORRAR SELECCIONES DEL MODAL DE LISTA DE SELECCIONES
function borrarTribunal() {
    $("table td").parents("tr").css("background-color", "white");
    $("#presialeatorio").text('');
    $('#presialeatorioo').attr('value', '');
    $("#presialeatorioo").text('');
    $("#secrealeatorio").text('');
    $('#secrealeatorioo').attr('value', '');
    $("#secrealeatorioo").text('');
    $("#botonForm").attr('disabled', 'disabled'); //bloquea el boton "Registrar defensa"
}
// FUNCION PARA EL BOTON TERMINAR VERSION
function terminarVersion() {
    var version = $("#idversion").val();
    var cidirector = $("#ciusuario").val();
    var razon = $("#razonVersion").val();
    var directorbd = '';

    if (cidirector.length > 0) {
        $.getJSON('http://10.4.25.3:8080/diplomado/index.php/usuario/getDirector', function(data) {
            // data=JSON.parse(data);
            console.log('el id del la bd es' + data[0]['ciU']);
            directorbd = data[0]['ciU'];

            if (cidirector == directorbd) {
                $("#mnsjEliminarVersion").html(
                    '<p class="alert alert-success"><span class="glyphicon glyphicon-thumbs-up" ></span><small> el CI si coincide!</small></p>'
                );
                console.log(version);
                $.ajax({
                    type: 'post',
                    url: "http://10.4.25.3:8080/diplomado/index.php/version/cerrar_sesion_version",
                    data: {
                        version: version,
                        razonV: razon
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == 'versiontermino') {
                            $("#mnsjEliminarVersion").html(
                                '<p class="alert alert-danger"><small>YA SE CERRÓ LA VERSIÓN!!!</small></p>'
                            ).fadeIn();
                            // $("#terminarVersion").modal('hide')
                        } else {
                            $("#mnsjEliminarVersion").html(
                                '<p class="alert alert-success"><span class="glyphicon glyphicon-up" ></span><small> Se cerró la Versión Actual!!!</small></p>'
                            ).fadeIn();
                            window.location.href =
                                "http://10.4.25.3:8080/diplomado/index.php/version/imprimirtcpdf/" +
                                data;
                        }
                    },
                    // complete:function() {
                    //   setTimeout(function(){
                    //     $("#terminarVersion").fadeOut();
                    //     top.location.reload(true);
                    //     $("#eliminarVersion").modal('hide')
                    //   },3000);
                    // }
                });
            } else {
                $("#mnsjEliminarVersion").html(
                    '<p class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><small> El CI que introdujo no pertenece al Usuario seleccionado!!</small></p>'
                );
            }
        });

    } else {
        $("#mnsjEliminarVersion").html(
            '<p class="alert alert-danger"><span class="glyphicon glyphicon-alert" ></span><small> Debe Introducir su CI para comprobar que puede realizar esta acción!</small></p>'
        );

    }
}
//MOSTRAR LISTA DE EVENTOS REALIZADOS EN ESA VERSION
$("body").on("click", "#espacio c", function(event) {

    $('#numv').html("");
    $('#nombrev').html("");
    $('#accionv').html("");
    $('#razonv').html("");
    $('#fechav').html("");
    $('#horav').html("");
    $('#imprimirv').html("");

    event.preventDefault();
    numsele = $(this).attr("href");
    numverion = $(this).parent().parent().children("td:eq(0)").text();
    nombreversion = $(this).parent().parent().children("td:eq(1)").text();

    // alert(cisele+nombresele+" "+apellidopasele+" "+apellidomasele);

    $("#nameV").text(nombreversion);
    $('#modalRegistroEventosVersion').modal('toggle')
    // LISTA DE EVENTOS QUE SE HIZO EN ESA VERSION
    $.ajax({
        type: 'post',
        url: "http://10.4.25.3:8080/diplomado/index.php/version/getEvento_vercion",
        data: {
            nombreV: nombreversion
        },
        success: function(data) {
            console.log(data);
            if (data == "nohayevento") {
                // MOPSTRAR EMNSAJE
            } else {
                var num = 1;
                data = JSON.parse(data);
                $.each(data, function(key, registro) {

                    $('#numv').append('<span><small>' + num + '</small></span></br></br>');
                    $('#nombrev').append('<span><small>' + registro.nombreV +
                        '</small></span></br></br>');
                    if (registro.estadoVersion == 0) {
                        $('#accionv').append(
                            '<span class="text text-danger"><small>Desabilitó</small></span></br></br>'
                        );
                    } else {
                        $('#accionv').append(
                            '<span class="text text-success"><small>Habilitó</small></span></br></br>'
                        );
                    }
                    $('#razonv').append('<span><small><small>' + registro.razon_accionV +
                        '</small></small></span></br></br>');
                    $('#fechav').append('<span><small>' + registro.fecha_accionV +
                        '</small></span></br></br>');
                    $('#horav').append('<span><small>' + registro.hora_accionV +
                        '</small></span></br></br>');
                    $('#imprimirv').append(
                        '<a class="btn btn-primary btn-xs" href="http://10.4.25.3:8080/diplomado/index.php/version/imprimirtcpdf/?bversion=' +
                        registro.idBitacora_version +
                        '"><span class="glyphicon glyphicon-print" ></span></a></br></br>'
                    );
                    num += 1;

                });
            }

        }
    });
})

// REINICIAR VERSION
function reiniciarVer(idver) {
    console.log(idver);
    $("#ciusuariorei").val("");
    $("#mnsjReiniciarVersion").html("");
    $("#razonVersionrei").val("");

    $("#idversionrei").val(idver);
}
// FUNCION PARA EL BOTON REINICIAR VERSION
function reiniciarVersion() {
    var version = $("#idversionrei").val();
    var cidirector = $("#ciusuariorei").val();
    var razon = $("#razonVersionrei").val();
    var directorbd = '';

    $("#mnsjReiniciarVersion").html("");
    if (cidirector.length > 0) {
        $.getJSON('http://10.4.25.3:8080/diplomado/index.php/usuario/getDirector', function(data) {
            // data=JSON.parse(data);
            console.log('el id del la bd es' + data[0]['ciU']);
            directorbd = data[0]['ciU'];

            if (cidirector == directorbd) {
                // $("#mnsjReiniciarVersion").html('<p class="alert alert-success"><span class="glyphicon glyphicon-thumbs-up" ></span><small> el CI si coincide!</small></p>');
                console.log(version);
                $.ajax({
                    type: 'post',
                    url: "http://10.4.25.3:8080/diplomado/index.php/version/reiniciar_sesion_version",
                    data: {
                        version: version,
                        razonV: razon
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == 'yasehabilitoversion') {
                            $("#mnsjReiniciarVersion").html(
                                '<p class="alert alert-danger"><small>YA SE HABILITO LA VERSIÓN!!!</small></p>'
                            ).fadeIn();
                            // $("#terminarVersion").modal('hide')
                        } else {
                            $("#mnsjReiniciarVersion").html(
                                '<p class="alert alert-success"><span class="glyphicon glyphicon-up" ></span><small> Se REINICIO la Versión !!!</small></p>'
                            ).fadeIn();
                            window.location.href =
                                "http://10.4.25.3:8080/diplomado/index.php/version/imprimirtcpdf/" +
                                data;
                        }
                    },
                    // complete:function() {
                    //   setTimeout(function(){
                    //     $("#terminarVersion").fadeOut();
                    //     top.location.reload(true);
                    //     $("#eliminarVersion").modal('hide')
                    //   },3000);
                    // }
                });
            } else {
                $("#mnsjReiniciarVersion").html(
                    '<p class="alert alert-warning"><span class="glyphicon glyphicon-alert" ></span><small> El CI que introdujo no pertenece al Usuario autorizado!!</small></p>'
                );
            }
        });

    } else {
        $("#mnsjReiniciarVersion").html(
            '<p class="alert alert-danger"><span class="glyphicon glyphicon-alert" ></span><small> Debe Introducir su CI para comprobar que puede realizar esta acción!</small></p>'
        );

    }
}
// ELIMINAR UN DOWNLOAD PDF CALIFICACIONES
function eliminardowload(archivo) {
    if (confirm(
            'Esta seguro de ELIMINAR el Documento de Calificaciones?? Una vez que acepte se volvera a Habilitar la Edicion de Calificaciones!!!'
        )) {
        $.ajax({
            type: 'post',
            url: "http://10.4.25.3:8080/diplomado/index.php/cargarcalificacionpdf/eliminar_download",
            data: {
                pdf: archivo
            },
            success: function(data) {
                // console.log(data);
                switch (data) {
                    case 'nohayarchivo':
                        $("#mnsjeliminopdf").html(
                            '<p class="alert alert-danger"><small>No existe archivo en la base de datos!!!</small></p>'
                        ).fadeIn();
                        break;
                    case 'nosepuedeeliminarpdf':
                        $("#mnsjeliminopdf").html(
                            '<p class="alert alert-danger"><small>No se puede eliminar el Archivo de Calificaciones!!!</small></p>'
                        ).fadeIn();
                        break;
                    case 'siseeliminopdf':
                        $("#mnsjeliminopdf").html(
                            '<p class="alert alert-success"><span class="glyphicon glyphicon-up" ></span><small> Se Elimino el archivo de calificaciones !!!</small></p>'
                        ).fadeIn();
                        break;
                    case 'noeliminadeBD':
                        $("#mnsjeliminopdf").html(
                            '<p class="alert alert-danger"><small>No se puede Eliminar de la base de datos!!!</small></p>'
                        ).fadeIn();
                        break;
                    default:
                        $("#mnsjeliminopdf").html('<p class="alert alert-danger"><small>' + data +
                            '</small></p>').fadeIn();
                        break;
                }
            },
            complete: function() {
                setTimeout(function() {
                    $("#mnsjeliminopdf").fadeOut();
                    top.location.reload(true);
                }, 3000);
            }
        });
    } else {}
}
// MONOGRAFIA PDF
// PASAR DATOS DE MONOGRAFIA
$("body").on("click", "#listaMonografia c", function(event) {
    event.preventDefault();
    numsele = $(this).attr("href");
    nummono = $(this).parent().parent().children("td:eq(0)").text();
    idmono = $(this).parent().parent().children("td:eq(1)").text();

    // alert(cisele+nombresele+" "+apellidopasele+" "+apellidomasele);
    $('#modaldocumentopdfMono').modal('toggle')
    // LISTA DE EVENTOS QUE SE HIZO EN ESA VERSION
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/monografia/getMonografiaporId",
        data: {
            monografia: idmono
        },
        success: function(data) {
            data = JSON.parse(data);
            console.log(data[0]['rutaMonografia']);
            $('#pdfmonografia').val(data[0]['idMonografia']);
            var rutamono = data[0]['rutaMonografia'];
            if (rutamono == null) {
                $('#formMonografiapdf').show();
                $('#idcargado').hide();
            } else {
                $('#idcargado').show();
                $('#formMonografiapdf').hide();
                $('#descargarmono').attr("href",
                    "http://10.4.25.3:8080/diplomado/index.php/monografia/downloadmonografiapdf/" +
                    rutamono);
                $('#rutamono').text(data[0]['rutaMonografia']);
            }
        }
    });
})
// COMO SUBIR UN PDF DE MONOGRAFIA
$("#formMonografiapdf").submit(function(e) { //puede funcionarVERRRRR O REVISAAAAR
    e.preventDefault();
    console.log(e);
    var monografia = $("#pdfmonografia").val();
    var f = $(this);
    var formdata = new FormData(document.getElementById("formMonografiapdf"));
    // formdata.append(f.attr("name"),monografia);
    formdata.append("monografia", monografia);
    console.log(formdata);
    $.ajax({
        url: "http://10.4.25.3:8080/diplomado/index.php/monografia/subirMonografiapdf",
        type: "POST",
        data: formdata,
        fileElementId: 'filemonografia',
        mimeTypes: "multipart/form-data",
        contentType: false,
        cache: false,
        processData: false,
        success: function(resp) {
            console.log(resp);
            switch (resp) {
                case 'nosubiomonopdf':
                    $("#mnsjpdfMono").html(
                        '<p class="alert alert-danger"><small>No se pudo subir el Archivo Monografia!!!</small></p>'
                    ).fadeIn();
                    break;
                case 'subiomonopdf':
                    $("#formMonografiapdf").hide();
                    $("#idcargado").show();
                    $("#mnsjpdfMono").html(
                        '<p class="alert alert-success"><small>Se cargo exitosamente el archivo Monografia</small></p>'
                    ).fadeIn();
                    break;
                case 'noseleccpdf':
                    $("#mnsjpdfMono").html(
                        '<p class="alert alert-danger"><small>Selecciones un Documento pdf!!!</small></p>'
                    ).fadeIn();
                    break;
                default:
                    $("#mnsjpdfMono").html('<p class="alert alert-danger"><small>' + resp +
                        '</small></p>').fadeIn();
                    break;
            }
        },
        complete: function() {
            setTimeout(function() {
                $("#mnsjpdfMono").fadeOut();
                top.location.reload(true);
            }, 3000);
        }
    });
});
// ELIMINAR UN DOWNLOAD PDF MONOGRAFIA
function eliminarmonopdf() {
    if (confirm('Esta Seguro de Eliminar el Documento de Monografia del Alumno?')) {
        var archivo = $('#pdfmonografia').val();
        $.ajax({
            type: 'post',
            url: "http://10.4.25.3:8080/diplomado/index.php/monografia/eliminar_monografiapdf",
            data: {
                pdf: archivo
            },
            success: function(data) {
                // console.log(data);
                switch (data) {
                    case 'nohayarchivomono':
                        $("#mnsjeditMono").html(
                            '<p class="alert alert-danger"><small>No existe Monografia en la base de datos!!!</small></p>'
                        ).fadeIn();
                        break;
                    case 'nosepuedeeliminarpdfmono':
                        $("#mnsjeditMono").html(
                            '<p class="alert alert-danger"><small>No se puede eliminar el Documenti Monografia!!!</small></p>'
                        ).fadeIn();
                        break;
                    case 'siseeliminopdfmono':
                        $("#formMonografiapdf").show();
                        $("#idcargado").hide();
                        $("#mnsjeditMono").html(
                            '<p class="alert alert-success"><span class="glyphicon glyphicon-up" ></span><small> Se Elimino el Documnto Monografia  !!!</small></p>'
                        ).fadeIn();
                        break;
                    case 'noeliminadeBDmono':
                        $("#mnsjeditMono").html(
                            '<p class="alert alert-danger"><small>No se puede Eliminar de la base de datos!!!</small></p>'
                        ).fadeIn();
                        break;
                    default:
                        $("#mnsjeditMono").html('<p class="alert alert-danger"><small>' + data +
                            '</small></p>').fadeIn();
                        break;
                }
            },
            complete: function() {
                setTimeout(function() {
                    $("#mnsjeditMono").fadeOut();
                    // top.location.reload(true);
                }, 3000);
            }
        });
    } else {

    }
}
// ABRIR MODAL PASANDO DATOS DE COMPARACION CON LOS OTRSO PDFs--GRAFICA--
$("body").on("click", "#listaMonografia d", function(event) {
    $('#graph').html('');
    event.preventDefault();
    numsele = $(this).attr("href");
    nummono = $(this).parent().parent().children("td:eq(0)").text();
    idmono = $(this).parent().parent().children("td:eq(1)").text();

    $('#comparacionpdfmono').modal('toggle')
    $.ajax({
        type: 'POST',
        url: "http://10.4.25.3:8080/diplomado/index.php/monografia/comparar_monografiapdf",
        data: {
            monografia: idmono
        },
        success: function(data) {
            console.log(data);
            if (data == 'nohaymonog') {
                $("#mnsjcompararmono").html(
                    '<p class="alert alert-danger"><small>No existen Monografias en la base de datos!!!</small></p>'
                );
            } else {
                // resp=JSON.parse(resp);
                // $("#mnsjcompararmono").html('<p class="alert alert-danger"><small>'+data+'</small></p>');
                console.log(data);
                resp = JSON.parse(data);
                titulomo = resp[0];
                monotitu = resp[1];
                objmo = resp[2];
                var day_data = [];
                for (var x = 0; x <= monotitu.length - 1; x++) {
                    // for (var j = 0; j <= objmo.length-1; j++) {//estoy comentando estos puntos por q no se encuentra obj. y no grafica nada es mas dificil compara los obj. rev
                    day_data.push({
                            "x": titulomo[0]['ciI'],
                            "y": monotitu[x]
                        } //, "z": objmo[x]
                    );
                    // }//estoy comentando estos puntos por q no se encuentra obj. y no grafica nada es mas dificil compara los obj. rev
                }
                Morris.Bar({
                    element: 'graph',
                    grid: false,
                    data: day_data,
                    xkey: 'x',
                    ykeys: 'y', //['y','z'],
                    labels: 'Titulo', //['Titulo','Objetivos'],
                });
            }
        }
    });
})
</script>
<script>
// ----------------GRAFICAS--------------
$(document).ready(function() {
    // console.log('ssssss');data=JSON.parse(data);
    $.getJSON('http://10.4.25.3:8080/diplomado/index.php/calificacion/getProbabilidad_calificaciones', function(
        data) {
        // data=JSON.parse(data);  
        console.log(data);
        modulo = data['modulo'];
        aprobados = data['aprobados'];
        reprobados = data['reprobados'];
        //empezamos con variable y graficas
        var modulo_data = [];
        for (var x = 0; x <= modulo.length - 1; x++) {
            modulo_data.push({
                "modulo": 'M' + modulo[x],
                "aprobados": aprobados[x],
                "reprobados": reprobados[x]
            });
        }
        Morris.Bar({
            element: 'grafica_modu_porcent',
            data: modulo_data,
            xkey: 'modulo',
            ykeys: ['aprobados', 'reprobados'],
            labels: ['Aprobados(%)', 'Reprobados(%)'],
            barColors: function(row, series, type) {
                if (type === 'bar') {
                    var red = Math.ceil(255 * row.y / this.ymax);
                    return 'rgb(' + red + ',0,0)';
                } else {
                    return '#000';
                }
            }
        });
        var donut_modulo = [];
        for (var x = 0; x <= modulo.length - 1; x++) {
            donut_modulo.push({
                value: aprobados[x],
                label: 'Modulo' + modulo[x],
                formatted: aprobados[x] + '%'
            });
        }
        Morris.Donut({
            element: 'gAprobados_donut',
            data: donut_modulo,
            formatter: function(x, data) {
                return data.formatted;
            }
        });
        var donut_modulo = [];
        for (var x = 0; x <= modulo.length - 1; x++) {
            donut_modulo.push({
                value: reprobados[x],
                label: 'Modulo' + modulo[x],
                formatted: reprobados[x] + '%'
            });
        }
        Morris.Donut({
            element: 'gReprobados_donut',
            data: donut_modulo,
            colors: [
                '#0BA462',
                '#39B580',
                '#67C69D',
                '#95D7BB'
            ],
            formatter: function(x, data) {
                return data.formatted;
            }
        });

    });
    // ESTA GRAFICA E SPARA LAS LINEAS.. PROBAR SI DA BIEN
    $.getJSON('http://10.4.25.3:8080/diplomado/index.php/monografia/grafic_fecha_defensas', function(data) {
        // data=JSON.parse(data);  
        console.log(data);
        def1 = data[0];
        def2 = data[1];
        var fechasdef_data = [];
        if (def1.length == 0 && def2.length == 0) {
            fechasdef_data.push({
                "period": 0,
                "defensa1": 0,
                "defensa2": 0
            });
        } else {
            if (def1.length != 0 && def2.length == 0) {
                for (var x = 0; x <= def1.length - 1; x++) {
                    // for (var y = 0; y <= def2.length-1; y ++) {
                    fechasdef_data.push({
                        "period": def1[x]['fechaDef'],
                        "defensa1": def1[x]['fechaDef'],
                        "defensa2": 1
                    });
                    // }
                    // console.log(def1[x]['fechaDef']);
                }
            } else {
                if (def1.length == 0 && def2.length != 0) {
                    for (var y = 0; y <= def2.length - 1; y++) {
                        fechasdef_data.push({
                            "period": def2[y]['fechaDef'],
                            "defensa1": 1,
                            "defensa2": def2[y]['fechaDef']
                        });
                    }
                } else {
                    for (var x = 0; x <= def1.length - 1; x++) {
                        for (var y = 0; y <= def2.length - 1; y++) {
                            fechasdef_data.push({
                                "period": def1[x]['fechaDef'],
                                "defensa1": def1[x]['fechaDef'],
                                "defensa2": def2[y]['fechaDef']
                            });
                        }
                        // console.log(def1[x]['fechaDef']);
                    }
                }
            }
        }
        // for (var x = 0; x <= def1.length-1; x ++) {
        //   // for (var y = 0; y <= def2.length-1; y ++) {
        //     fechasdef_data.push(
        //         { "period": def1[x]['fechaDef'], "defensa1":def1[x]['fechaDef'], "defensa2":2}
        //       );
        //   // }
        //   // console.log(def1[x]['fechaDef']);
        //   console.log(def2.length);
        // }
        Morris.Line({
            element: 'graph5',
            data: fechasdef_data,
            xkey: 'period',
            ykeys: ['defensa1', 'defensa2'],
            labels: ['1ra.Def.', '2da.Def.'],
            // events: [
            //   '2011-04',
            //   '2011-08'
            // ]
        });


    });


});
</script>
<script>
$(document).ready(function() {
    $('.editar-descuento').on('click', function() {
        var descuentoId = $(this).data('descuento-id');
        var nombre = $(this).data('nombre');
        var descripcion = $(this).data('descripcion');
        var porcentaje = $(this).data('porcentaje');
        var estado = $(this).data('estado');

        // Establecer los valores en el formulario de edición
        $('#descuentoIdEditar').val(descuentoId);
        $('#nombreDescuentoEditar').val(nombre);
        $('#descripcionDescuentoEditar').val(descripcion);
        $('#porcentajeDescuentoEditar').val(porcentaje);
        $('#estadoDescuentoEditar').val(estado);

        // Abrir el modal de edición
        $('#modalEditarDescuento').modal('show');
    });

    $('#formCrearDescuento').submit(function(event) {

        event.preventDefault();

        var nombreD = $('#txtNombreD').val();
        var descripcionD = $('#txtDescripcionD').val();
        var porcentajeD = $('#txtPorcentajeD').val();
        var valorD = $('#txtValorD').val();
        if (nombreD.length > 0) {

            $.ajax({
                type: 'post',
                url: "http://localhost:8080/diplomado/index.php/descuento/crearDescuento",
                data: {
                    txtNombreD: nombreD,
                    txtDescripcionD: descripcionD,
                    txtValorD: valorD,
                    txtTipoD: tipoD
                },
                success: function(data) {
                    $('#modalEditarDescuento').modal('hide');
                    console.log(data);
                    // $(".resultado-registro").html(data).fadeIn();
                    location.reload();

                    $(".resultado").html('<p class="alert alert-info">' + data + '</p>');
                },
            });
            return false;
        } else {
            $(".resultado").html('<p class="alert alert-warning"> Error al crear </p>');
        }
    });
});
</script>
<script>

</script>

<script>
// multas
$(document).ready(function() {
    <?php if (validation_errors() && $this->uri->segment(2) === 'crearMulta') { ?>
    // Muestra el modal de creación si hay errores de validación y la URI indica que es una operación de creación
    $('#modalCrearMulta').modal('show');
    <?php } elseif (validation_errors() && $this->uri->segment(2) === 'editarMulta') { ?>
    // Muestra el modal de edición si hay errores de validación y la URI indica que es una operación de edición
    $('#modalEditarMulta').modal('show');
    <?php } ?>
});
//multas modal form editar 
$(document).ready(function() {
    // Manejar el clic en el botón de editar
    $('.editar-multa').on('click', function() {
        var multaId = $(this).data('multa-id');
        var baseUrl = '<?= base_url(); ?>';
        // Hacer una solicitud AJAX al servidor para cargar los detalles de la multa
        $.ajax({
            url: baseUrl + 'multa/getMultaById/' + multaId,
            method: 'GET',
            dataType: 'json', // Esperamos datos en formato JSON
            success: function(dataArray) {
                let data = dataArray[0];
                // Llenar el formulario de edición con los datos recuperados
                console.log(data);
                $('#txtIdMultaEditar').val(data.idMulta);
                $('#txtNombreMEditar').val(data.nombreM);
                $('#txtDescripcionMEditar').val(data.descripcionM);
                $('#txtMontoMEditar').val(data.montoM);
                $('#txtMonedaMEditar').val(data.monedaM);
                $('#txtEstadoMEditar').val(data.estadoM);
                // Mostrar el modal de edición
                $('#modalEditarMulta').modal('show');
            },
            error: function() {
                alert(
                    'Error al cargar los detalles de la multa. Por favor, inténtalo de nuevo.'
                );
            }
        });
    });
});
$(document).ready(function() {
    // Función para realizar el cálculo
    function calcularMontoBSMulta() {
        // Obtener el valor de montoSusMulta y tasa de cambio
        const montoSusMulta = parseFloat($('#txtMontoSusM').val()) || 0;
        const tasaCambio = parseFloat($('#decimalInput').val()) || 0;

        // Calcular el monto en moneda local y llenar el campo montoBSMulta
        const montoBSMulta = montoSusMulta * tasaCambio;
        $('#txtMontoBSMulta').val(montoBSMulta.toFixed(2)); // Limitar a 2 decimales
    }

    // Calcular inicialmente el monto en moneda local
    calcularMontoBSMulta();

    // Escuchar el evento "input" en el campo montoSusMulta y decimalInput
    $('#txtMontoSusM, #decimalInput').on('input', function() {
        // Calcular el monto en moneda local
        calcularMontoBSMulta();
    });
    $('form').on('submit', function(event) {
        // Validar el formulario
        if ($(this).valid()) {
            // Si el formulario es válido, permitir que el modal se cierre
            return true;
        } else {
            // Si hay errores de validación, evitar que el modal se cierre
            event.preventDefault();
            event.stopPropagation();
        }
    });
});

$(document).ready(function() {
    <?php if (validation_errors() && $this->uri->segment(2) === 'crearModulo') { ?>
    // Muestra el modal de creación si hay errores de validación y la URI indica que es una operación de creación
    $('#modalCrearModuloAsignatura').modal('show');
    <?php } elseif (validation_errors() && $this->uri->segment(2) === 'editarModulo') { ?>
    // Muestra el modal de edición si hay errores de validación y la URI indica que es una operación de edición
    $('#modalEditarModuloAsignatura').modal('show');
    <?php } ?>
});

$(document).ready(function() {
    // Manejar clic en el botón de editar
    $('.editar-modulo-btn').on('click', function() {
        var idModulo = $(this).data('id');

        // Hacer la llamada AJAX al controlador
        $.ajax({
            url: '<?= base_url('index.php/modulo/getModuloJson/'); ?>' + idModulo,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Maneja la respuesta del controlador aquí
                console.log(response);

                $("#txtNumMEditar").val(response.numeroM); // Corregir aquí
                $('#selectNivelMEditar').val(response.nivelM);
                $('#txtNombreModuloEditar').val(response.nombreM);
                $('#txtAsignaturaNombreMEditar').val(response.asignaturaNombreM);
                $('#txtFechaInicioMoEditar').val(response.fecha_inicioMo);
                $('#txtFechaFinalMoEditar').val(response.fecha_finalMo);
                $('#vigentemoEditar').val(response.vigenteMo);
                $('#txtIdModuloEditar').val(response.idModulo);

                // Calcula la diferencia de días y actualiza el campo restafechasMOEditar
                calcularDiferenciaYEstilos();
                $('#modalEditarModuloAsignatura').modal('show'); // Abre el modal
            },
            error: function(error) {
                console.error('Error en la llamada AJAX', error);
            }
        });
    });

    // Función para calcular la diferencia de días y aplicar estilos
    function calcularDiferenciaYEstilos() {
        // Calcula la diferencia de días y actualiza el campo restafechasMOEditar
        var fechaInicio = new Date($('#txtFechaInicioMoEditar').val());
        var fechaFinal = new Date($('#txtFechaFinalMoEditar').val());
        var diferenciaDias = Math.ceil((fechaFinal - fechaInicio) / (1000 * 60 * 60 * 24));

        var html = '<p id="htmlrestafechasMO" class="w-100"><strong>' + diferenciaDias + ' días</strong></p>';

        // Actualiza el contenido del elemento con el nuevo HTML
        $('#restafechasMOEditar').html(html);

        // Aplica estilos CSS según la diferencia de días
        if (diferenciaDias >= 0) {
            $('#htmlrestafechasMO').removeClass('alert-danger').addClass('alert-success');
        } else {
            $('#htmlrestafechasMO').removeClass('alert-success').addClass('alert-danger');
        }
    }

    // Llama a la función para calcular la diferencia y aplicar estilos al cargar la página
    calcularDiferenciaYEstilos();

    // Manejar cambio en el campo de fecha de inicio
    $('#txtFechaInicioMoEditar').on('input', function() {
        calcularDiferenciaYEstilos();
    });

    // Manejar cambio en el campo de fecha final
    $('#txtFechaFinalMoEditar').on('input', function() {
        calcularDiferenciaYEstilos();
    });
});
</script>
<script>
// pagos

$(document).ready(function() {
    verificarSelectBS();


    // Manejar el evento de cambio del select
    $('#SelectDescuentos').change(function() {

        var idDescuento = $(this).find(':selected').data('iddescuentoselect');


        $('#idDescuentoSeleccionado').val(idDescuento);

        var porcentajeDescuento = parseInt($(this)
            .val()); // Obtener el porcentaje de descuento seleccionado
        var costoEvento = parseFloat(
            <?= $version->costoModulosV; ?>); // Obtener el costo del evento desde PHP
        var descuentoCalculado = costoEvento * (porcentajeDescuento /
            100); // Calcular el descuento en base al porcentaje

        var totalCostoFinalColegiatura = costoEvento - descuentoCalculado; // Calcular el costo final

        var totalCostoFinal = totalCostoFinalColegiatura + parseFloat(
            <?= $version->costoMatriculaV; ?>); // Calcular el costo final
        // Actualizar el texto del descuento y el costo final
        $('#descuentoCalculado').text(porcentajeDescuento + '%');
        $('#resultadoDescuentoCalculado').text('- ' + descuentoCalculado.toFixed(2) + ' Bs.');
        $('#totalCostoFinalColegiatura').text(totalCostoFinalColegiatura.toFixed(2) + ' Bs.');

        $('#totalCostoFinal').text(totalCostoFinal.toFixed(2) + ' Bs.');
        $('#totalCostoFinal2').text(totalCostoFinal.toFixed(2) + ' Bs.');
        $('#txtMontoDescuentoT').val(totalCostoFinal);

        calcularMontoTotalBs();

    });




    // Manejar el cambio en el campo de moneda usando jQuery
    $('#txtMonedaP').change(function() {
        // Obtener el valor seleccionado del campo de moneda
        var selectedCurrency = $(this).val();

        // Obtener el campo de tasa de cambio
        var tasaCambioField = $('#txtTasaCambioP');

        // Si la moneda seleccionada es "BS", bloquear y poner en blanco el campo de tasa de cambio
        if (selectedCurrency === 'BS') {
            tasaCambioField.prop('disabled', true).val('');
        } else {
            // Si la moneda seleccionada es "USD", habilitar el campo de tasa de cambio
            tasaCambioField.prop('disabled', false);
        }
        calcularMontoTotalBs();
    });

    // Manejar el evento de cambio en el campo de tasa de cambio usando jQuery
    $('#txtMontoP').on('input', function() {
        // Obtener el valor del campo de tasa de cambio
        calcularMontoTotalBs();
    });
    $('#txtTasaCambioP').on('input', function() {
        // Obtener el valor del campo de tasa de cambio
        var selectedCurrency = $('#txtMonedaP').val();
        if (selectedCurrency === 'USD') {
            calcularMontoTotalBs();
        }
    });

    function calcularMontoTotalBs() {
        var monto = $('#txtMontoP').val();
        var selectedCurrency = $('#txtMonedaP').val();

        if (monto === '') {
            monto = 0;
        }

        var tasaCambio = 1;

        if (selectedCurrency === 'USD') {
            tasaCambio = $('#txtTasaCambioP').val();
        }

        if (selectedCurrency === 'BS') {
            tasaCambio = 1;
        }

        // Calcular el monto en moneda local
        var montoTotalBs = convertirAMonedaLocal(monto, tasaCambio);

        // Establecer el valor del input con id 'txtMontoTotalBsP'
        $('#txtMontoTotalBsP').val(montoTotalBs.toFixed(2));

        // Establecer el texto de 'resultadoDepostioCalculado'
        $('#montoDepostio').text(' - ' + montoTotalBs + ' Bs.');
        var totalCostoFinal2 = $('#totalCostoFinal2').text();
        var montoFinal = parseFloat(totalCostoFinal2) - parseFloat(montoTotalBs);
        // Establecer el texto de 'resultadoDepostioCalculado'
        $('#resultadoDepostioCalculado').text(montoFinal.toFixed(2) + ' Bs.');
    }


    function convertirAMonedaLocal(monto, tasaCambio) {
        // Multiplicar el monto por la tasa de cambio y redondear a dos decimales
        var montoLocal = monto * tasaCambio;

        // Devolver el resultado como un número en lugar de una cadena
        return parseFloat(montoLocal.toFixed(2));
    }

    function verificarSelectBS() {
        var selectedCurrency = $('#txtMonedaP').val();

        if (selectedCurrency === 'BS') {
            $('#txtTasaCambioP').prop('disabled', true).val('');
        }
    }
});

$(document).ready(function() {
    // Manejar el evento cuando se muestra el modal
    $('#modalCrearPago').on('show.bs.modal', function(e) {
        // Bloquear el campo de tasa de cambio y ponerlo en blanco
        $('#txtTasaCambioP').prop('disabled', true).val('');

        // Verificar si la moneda seleccionada es BS (Bolivianos)
        if ($('#txtMonedaP').val() === 'USD') {
            // Desbloquear el campo de tasa de cambio
            $('#txtTasaCambioP').prop('disabled', false);
        }
    });
});
$(document).ready(function() {
    // Manejar el evento cuando se muestra el modal
    $('#modalCrearPago').on('show.bs.modal', function(e) {
        // Bloquear el campo de tasa de cambio y ponerlo en blanco
        $('#txtTasaCambioP').prop('disabled', true).val('');

        // Verificar si la moneda seleccionada es BS (Bolivianos)
        if ($('#txtMonedaP').val() === 'USD') {
            // Desbloquear el campo de tasa de cambio
            $('#txtTasaCambioP').prop('disabled', false);
        }
    });
});
</script>
<script>
//crear pago
$(document).ready(function() {
    verificarSelectBSCrear();

    $('#txtMonedaPCrear').change(function() {
        // Obtener el valor seleccionado del campo de moneda
        var selectedCurrency = $(this).val();

        // Obtener el campo de tasa de cambio
        var tasaCambioField = $('#txtTasaCambioPCrear');

        // Si la moneda seleccionada es "BS", bloquear y poner en blanco el campo de tasa de cambio
        if (selectedCurrency === 'BS') {
            tasaCambioField.prop('disabled', true).val('');
        } else {
            // Si la moneda seleccionada es "USD", habilitar el campo de tasa de cambio
            tasaCambioField.prop('disabled', false);
        }
        calcularMontoTotalBsCrear();
    });
    $('#txtMontoPCrear').on('input', function() {
        // Obtener el valor del campo de tasa de cambio
        calcularMontoTotalBsCrear();
    });
    $('#txtTasaCambioPCrear').on('input', function() {
        // Obtener el valor del campo de tasa de cambio
        var selectedCurrency = $('#txtMonedaPCrear').val();
        if (selectedCurrency === 'USD') {
            calcularMontoTotalBsCrear();
        }
    });

    function calcularMontoTotalBsCrear() {

        var monto = $('#txtMontoPCrear').val();
        var selectedCurrency = $('#txtMonedaPCrear').val();

        if (monto === '') {
            monto = 0;
        }

        var tasaCambio = 1;

        if (selectedCurrency === 'USD') {
            tasaCambio = $('#txtTasaCambioPCrear').val();
        }

        if (selectedCurrency === 'BS') {
            tasaCambio = 1;
        }

        // Calcular el monto en moneda local
        var montoTotalBs = convertirAMonedaLocalCrear(monto, tasaCambio);

        // Establecer el valor del input con id 'txtMontoTotalBsP'
        $('#txtMontoTotalBsPCrear').val(montoTotalBs.toFixed(2));

    }

    function convertirAMonedaLocalCrear(monto, tasaCambio) {
        // Multiplicar el monto por la tasa de cambio y redondear a dos decimales
        var montoLocal = monto * tasaCambio;

        // Devolver el resultado como un número en lugar de una cadena
        return parseFloat(montoLocal.toFixed(2));
    }

    function verificarSelectBSCrear() {
        var selectedCurrency = $('#txtMonedaPCrear').val();

        if (selectedCurrency === 'BS') {
            $('#txtTasaCambioPCrear').prop('disabled', true).val('');
        }
    }
});
//editar pago
$(document).ready(function() {


    $('#txtMonedaPEditar').change(function() {
        // Obtener el valor seleccionado del campo de moneda
        var selectedCurrency = $(this).val();

        // Obtener el campo de tasa de cambio
        var tasaCambioField = $('#txtTasaCambioPEditar');

        // Si la moneda seleccionada es "BS", bloquear y poner en blanco el campo de tasa de cambio
        if (selectedCurrency === 'BS') {
            tasaCambioField.prop('disabled', true).val('');
        } else {
            // Si la moneda seleccionada es "USD", habilitar el campo de tasa de cambio
            tasaCambioField.prop('disabled', false);
        }
        calcularMontoTotalBsEditar();
    });
    $('#txtMontoPEditar').on('input', function() {
        // Obtener el valor del campo de tasa de cambio

        calcularMontoTotalBsEditar();
    });
    $('#txtTasaCambioPEditar').on('input', function() {
        // Obtener el valor del campo de tasa de cambio
        var selectedCurrency = $('#txtMonedaPEditar').val();
        if (selectedCurrency === 'USD') {
            calcularMontoTotalBsEditar();
        }
    });

    function calcularMontoTotalBsEditar() {

        var monto = $('#txtMontoPEditar').val();
        var selectedCurrency = $('#txtMonedaPEditar').val();

        if (monto === '') {
            monto = 0;

        }

        var tasaCambio = 1;

        if (selectedCurrency === 'USD') {
            tasaCambio = $('#txtTasaCambioPEditar').val();
        }

        if (selectedCurrency === 'BS') {
            tasaCambio = 1;
        }

        // Calcular el monto en moneda local
        var montoTotalBs = convertirAMonedaLocalEditar(monto, tasaCambio);

        // Establecer el valor del input con id 'txtMontoTotalBsP'
        $('#txtMontoTotalBsPEditar').val(montoTotalBs.toFixed(2));

    }

    function convertirAMonedaLocalEditar(monto, tasaCambio) {
        // Multiplicar el monto por la tasa de cambio y redondear a dos decimales
        var montoLocal = monto * tasaCambio;

        // Devolver el resultado como un número en lugar de una cadena
        return parseFloat(montoLocal.toFixed(2));
    }


});
$(document).ready(function() {
    // Manejar el clic en el botón de editar
    $('.editar-transaccion-pago').on('click', function() {

        var pagoId = $(this).data('pago-id');
        var baseUrl = '<?= base_url(); ?>';
        // Hacer una solicitud AJAX al servidor para cargar los detalles de la multa
        var editUrl = baseUrl + 'index.php/transaccion/detalle/3';

        $.ajax({
            url: baseUrl + 'pago/getPagoById/' + pagoId,
            method: 'GET',
            dataType: 'json', // Esperamos datos en formato JSON
            success: function(response) {
                console.log(response);

                $('#txtFechaDepositoPEditar').val(response.fechaDepositoP);
                $('#txtNumeroDepositoPEditar').val(response.numeroDepositoP);
                $('#txtMonedaPEditar').val(response.monedaP);
                $('#txtTasaCambioPEditar').val(response.tasaCambioP);
                $('#txtMontoPEditar').val(response.montoP);
                $('#txtMontoTotalBsPEditar').val(response.montoTotalBsP);

                $('#txtIdTransaccionEditar').val(response.idTransaccion);
                $('#txtIdPagoEditar').val(response.idPago);
                // Mostrar el modal de edición
                verificarSelectBSEditar();
                $('#modalEditarPago').modal('show');
            },
            error: function() {
                alert(
                    'Error al cargar los detalles de la multa. Por favor, inténtalo de nuevo.'
                );
            }
        });
    });

    function verificarSelectBSEditar() {
        var selectedCurrency = $('#txtMonedaPEditar').val();

        if (selectedCurrency === 'BS') {

            $('#txtTasaCambioPEditar').prop('disabled', true).val('');
        }
        if (selectedCurrency === 'USD') {

            $('#txtTasaCambioPEditar').prop('disabled', false);
        }

    }
});

$(document).ready(function() {

    <?php if (validation_errors() && $this->uri->segment(2) === 'crearPagoTransaccion') { ?>
    // Muestra el modal de creación si hay errores de validación y la URI indica que es una operación de creación
    $('#modalCrearPago').modal('show');
    <?php } elseif (validation_errors() && $this->uri->segment(2) === 'EditarPagoTransaccion') { ?>
    // Muestra el modal de edición si hay errores de validación y la URI indica que es una operación de edición

    $('#modalEditarPago').modal('show');
    <?php } ?>
});
$(document).ready(function() {
    $('#versionSelectCSV').on('change', function() {
        if ($(this).val()) {
            $('#csvVersionFormSelect').submit();
        }
    });
});
</script>
</script>

</body>
<footer>
    <!-- <center><adresses>Copyright 2018, Elizabeth Aduviri Zeballos. E-mail:eliadu90@gmail.com </adresses></center>  -->

    <center>
        <hr>
        <ul class="list-inline">


        </ul>

    </center>
</footer>

</html>