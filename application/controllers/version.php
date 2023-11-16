<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Version extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        // CARGAR LA LIBRERIA PARA IMPRIMIR
        $this->load->library('pdf_report');
        // CARGAR MODELOS
        $this->load->model('version_model');
        //$this->version_model->conexion();
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
        $this->load->model('bitacora_model');
        // $data['query']=$this->version_model->conexion(); se almacena en un vector la funcion conexion
        // $this->load->view('version',$data);muestra la vista y la funcion
    }
    public function index()
    {
        // $tipousuario=$this->logueadoUsuario(); 
        if ($this->session->userdata('logueado')) {

            $data = array(
                'version' => $this->version_model->getVersiones()
            );

            $this->load->view('plantillas/encabezado');
            $this->load->view('plantillas/navegador');
            $data['mensaje'] = $this->session->flashdata('mensaje');
            $data['mensaje'] = $this->session->flashdata('tipo_mensaje');
            // Carga la vista con el mensaje
            $this->load->view('plantillas/mensajes_session', $data);
            $data['tipo'] = $this->session->userdata('tipo');

            switch ($data['tipo']) {
                case 'Secretario':
                    echo '<script> alert("Usted no tiene permisos para crear nueva Version")</script>';
                    $this->load->view('usuarios/secre_principal');
                    break;
                case 'Coordinador':
                    $this->load->view('v_version/nueva_version', $data);
                    break;
                case 'Administrador':
                    $this->load->view('v_version/nueva_version', $data);
                    break;
                default:
                    echo '<script> alert("El Usuario no inicio Sesion")</script>';
                    redirect('autenticacion', 'refresh');
                    break;
            }
            $this->load->view('plantillas/pie');
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }

    //pasando parametros desde las vistas para visualizar en la misma pagina, el 9indice empieza desde 21
    // public function vista1($indice=null)
    // {
    //     if ($this->session->userdata('logueado')) {
    //         $data=array(
    //         'version'=>$this->version_model->getVersiones());
    //         $this->load->view('plantillas/encabezado');
    //         $this->load->view('plantillas/navegador');

    //         $data['tipo']=$this->session->userdata('tipo');
    //         switch ($data['tipo']) {
    //             case 'Secretario':
    //                 echo '<script> alert("Usted no tiene permisos para crear nueva Version")</script>';    
    //                 $this->load->view('usuarios/secre_principal');
    //                 break;
    //             case 'Coordinador':
    //                 if($indice==21)
    //                 {
    //                     $this->load->view('v_version/registroVersiones',$data);
    //                 }else if($indice==22)
    //                 {
    //                     $this->load->view('modulo',$data);
    //                 }
    //                 $this->load->view('v_version/nueva_version',$data);
    //                 break;
    //             default:
    //                 echo '<script> alert("El Usuario no inicio Sesion")</script>';    
    //                 redirect('autenticacion','refresh');
    //                 break;
    //         }
    //         $this->load->view('plantillas/pie');
    //     } else {
    //         echo '<script> alert("El Usuario no inicio Sesion")</script>';
    //         redirect('autenticacion');
    //     }

    // }
    public function registroV($indice = null)
    {
        if ($this->session->userdata('logueado')) {
            $data = array(
                'version' => $this->version_model->getVersiones()
            );

            $this->load->view('plantillas/encabezado');
            $this->load->view('plantillas/navegador', $data);
            $data['mensaje'] = $this->session->flashdata('mensaje');
            $data['mensaje'] = $this->session->flashdata('tipo_mensaje');
            // Carga la vista con el mensaje
            $this->load->view('plantillas/mensajes_session', $data);
            $data['tipo'] = $this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    $this->load->view('v_version/registroVersiones', $data);
                    break;
                case 'Coordinador':
                    if ($indice == 3) {

                        $data['msg'] = "Se Elimino la Version.";
                        $this->load->view('plantillas/msg_success', $data);
                    } else if ($indice == 4) {
                        $data['msg'] = "No es posible Eliminar Version.";
                        $this->load->view('plantillas/msg_error', $data);
                    } else if ($indice == 5) {
                        $data['msg'] = "Se Edito la Version.";
                        $this->load->view('plantillas/msg_success', $data);
                    } else if ($indice == 6) {
                        $data['msg'] = "No es posible Editar Version.";
                        $this->load->view('plantillas/msg_error', $data);
                    }
                    $this->load->view('v_version/registroVersiones', $data);
                    break;
                case 'Administrador':
                    $this->load->view('v_version/registroVersiones', $data);
                    break;
                default:
                    echo '<script> alert("El Usuario no inicio Sesion")</script>';
                    redirect('autenticacion', 'refresh');
                    break;
            }
            $this->load->view('plantillas/pie');
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
    public function formVersion($indice = null) //esta dejand de servir desde la funcion crear version
    {
        // if ($this->session->userdata('logueado')) 
        // {
        // } 
        // else {
        //     echo '<script> alert("El Usuario no inicio Sesion")</script>';
        //     redirect('autenticacion','refresh');
        // }
        // $data=array(
        //     'ultimo'=>$this->modulo_model->getUltimo(),
        //     'modulo'=>$this->modulo_model->getModulo()
        // );
        // $this->load->view('plantillas/encabezado');
        // $this->load->view('plantillas/navegador');

        // if($indice==1)
        // {

        //     $data['msg']="Se inserto Version Nueva, Registre Modulos de la Version.";
        //     $this->load->view('plantillas/msg_success',$data);

        // }else if($indice==2)
        // {
        //     $data['msg']="No es posible insertar Version.";
        //     $this->load->view('plantillas/msg_error',$data);
        // }
        // $this->load->view('modulo',$data);
        // $this->load->view('plantillas/pie');

    }

    public function registrarVersion()
    {
        if ($this->session->userdata('logueado')) {


            $this->form_validation->set_rules('txtNombreV', 'Nombre', 'required|is_unique[version.nombreV]', array('required' => 'El campo %s es requerido.', 'is_unique' => 'El %s ya se registro,pruebe con otro nombre.'));
            $this->form_validation->set_rules('txtLugarV', 'Lugar', 'required', array('required' => 'El campo %s es requerido.'));
            $this->form_validation->set_rules('txtTipoCursoV', 'Tipo de Curso', 'required', array('required' => 'El campo %s es requerido.'));
            $this->form_validation->set_rules('txtCantidadModulosV', 'Cantidad de Modulos', 'required|greater_than[0]', array('required' => 'El campo %s es requerido.', 'greater_than' => 'El campo %s debe ser mayor a cero.'));
            $this->form_validation->set_rules('txtEstadoV' . 'Estado', 'required', array('required' => 'El campo %s es requerido.'));
            $this->form_validation->set_rules('txtFechaV', 'Fecha de Inicio', 'required', array('required' => 'El campo %s es requerido.'));
            $this->form_validation->set_rules('txtTiempoV', 'Tiempo', 'required', array('required' => 'El campo %s es requerido.'));
            $this->form_validation->set_rules('txtNumPagosV', 'Numero de Pagos', 'required|greater_than[0]', array('required' => 'El campo %s es requerido.', 'greater_than' => 'El campo %s debe ser mayor a cero.'));
            $this->form_validation->set_rules('txtCostoV', 'Costo Total', 'required|greater_than_equal_to[0]', array('required' => 'El campo %s es requerido.', 'greater_than_equal_to' => 'El campo %s debe ser mayor o igual a 0.'));
            $this->form_validation->set_rules('txtCostoMatriculaV', 'Costo de Matricula', 'required|greater_than_equal_to[0]', array('required' => 'El campo %s es requerido.', 'greater_than_equal_to' => 'El campo %s debe ser mayor o igual a 0.'));
            $this->form_validation->set_rules('txtCostoModulosV', 'Costo de Modulo', 'required|greater_than_equal_to[0]', array('required' => 'El campo %s es requerido.', 'greater_than_equal_to' => 'El campo %s debe ser mayor o igual a 0.'));
            $this->form_validation->set_rules('txtMontoMinPrimerPagoV', 'Monto Minimo Primer Pago', 'required|greater_than_equal_to[0]', array('required' => 'El campo %s es requerido.', 'greater_than_equal_to' => 'El campo %s debe ser mayor o igual a 0.'));
            $this->form_validation->set_rules('txtDescripcionV', 'Descripcion', 'required', array('required' => 'El campo %s es requerido.'));
            $costoV = $this->input->post('txtCostoV');
            $costoMatriculaV = $this->input->post('txtCostoMatriculaV');
            $costoModulosV = $this->input->post('txtCostoModulosV');
            $sumaMatriculaModulos = $costoMatriculaV + $costoModulosV;
            if ($costoV != $sumaMatriculaModulos) {
                $this->form_validation->set_message('validate_costs', 'La suma de Costo Matrícula y Costo Módulos debe ser igual al Costo Total (' . $costoV . 'Bs.).');
                $this->form_validation->set_rules('txtCostoMatriculaV', 'Matrícula', 'callback_validate_costs[' . $costoV . ']');
                $this->form_validation->set_rules('txtCostoModulosV', 'Módulos', 'callback_validate_costs[' . $costoV . ']');
            }
            if ($this->form_validation->run() == FALSE) {
                $this->index();
                return;
            }
            //  var_dump($this->input->post());

            $nombreV = $this->input->post('txtNombreV');
            $fechaV = $this->input->post('txtFechaV');
            $tiempoV = $this->input->post('txtTiempoV');
            $fecha_termino  = date('Y-m-d', strtotime($fechaV . ' + ' . $tiempoV . ' month'));
            $descripcionV = $this->input->post('txtDescripcionV');
            $costoModulosV = $this->input->post('txtCostoModulosV');
            $lugarV = $this->input->post('txtLugarV');
            $estadoV = $this->input->post('txtEstadoV');
            $finscripciones_hasta = date('Y-m-d', strtotime($fechaV . ' - 1 day'));
            $tipoCursoV = $this->input->post('txtTipoCursoV');
            $costoMatriculaV = $this->input->post('txtCostoMatriculaV');
            $costoModulosV = $this->input->post('txtCostoModulosV');
            $numPagosV = $this->input->post('txtNumPagosV');
            $montoMinPrimerPagoV = $this->input->post('txtMontoMinPrimerPagoV');
            $cantidadModulosV = $this->input->post('txtCantidadModulosV');

            $data = array(
                'nombreV' => $nombreV,
                'fechaV' => $fechaV,
                'tiempoV' => $tiempoV,
                'fecha_termino' => $fecha_termino,
                'descripcionV' => $descripcionV,
                'costoV' => $costoV,
                'lugarV' => $lugarV,
                'estadoV' => $estadoV,
                'finscripciones_hasta' => $finscripciones_hasta,
                'tipoCursoV' => $tipoCursoV,
                'costoMatriculaV' => $costoMatriculaV,
                'costoModulosV' => $costoModulosV,
                'numPagosV' => $numPagosV,
                'montoMinPrimerPagoV' => $montoMinPrimerPagoV,
                'cantidadModulosV' => $cantidadModulosV
            );
            $versionNuevoId = $this->version_model->insertarVersionData($data);
            $newVersion = $this->version_model->getVersionById($versionNuevoId);
            // $porcentajeDescuentoV = $this->input->post('txtPorcentajeDescuentoV');

            //$idversion = $this->version_model->crearVersion($nombreV, $lugarV, $tipoCursoV, $fechaV, $numPagosV, $costoV, $costoMatriculaV, $costoModulos, $montoMinPrimerPagoV, $descripcionV, $estadoV);

            // $idversion = $this->version_model->crearVersion($nombreV, $fechaV, $tiempoV, $descripcionV, $costoV, $lugarV, $estadoV, $tipoCursoV, $porcentajeDescuentoV);

            // $nombreM = array(
            //     1 => "MODULO I",
            //     2 => "MODULO II",
            //     3 => "MODULO III",
            //     4 => "MODULO IV",
            //     5 => "MODULO V",
            //     6 => "MODULO VI",
            //     7 => "MODULO VII",
            // );
            // $descripcionM = array(
            //     1 => "Introducción al Uso de la Plataforma Virtual Moodle.",
            //     2 => "Metodología de la Investigación.",
            //     3 => "El proceso de Enseñanza y de Aprendizaje en el nivel de Educación Superior.",
            //     4 => "Estrategias Metodológicas y Evaluación del Aprendizaje.",
            //     5 => "Tecnologías de la Información y Comunicación en Educación.",
            //     6 => "Planificación Curricular.",
            //     7 => "Taller de Monografía.",
            // );
            // $vigenciaM = array(
            //     1 => 0,
            //     2 => 0,
            //     3 => 0,
            //     4 => 0,
            //     5 => 0,
            //     6 => 0,
            //     7 => 0,
            // );
            // $desdeM = 0000 - 00 - 00;
            // $hastaM = 0000 - 00 - 00;

            // for ($i = 1; $i <= 7; $i++) {
            //     $version = $idversion;
            //     $this->modulo_model->crearModulo($i, $nombreM[$i], $descripcionM[$i], $vigenciaM[$i], $desdeM, $hastaM, $version);
            // }  $version = $this->version_model->getVersiones($nombre);

            $filasAfectadas = $this->db->affected_rows();
            if ($filasAfectadas > 0) {
                $version_dat = array(
                    'idVersion' => $newVersion['idVersion'],
                    'nombreV' => $newVersion['nombreV'],
                    'estado' => $newVersion['estadoV'],
                    'fechaV' => $newVersion['fechaV'],
                    'fechainscripciones' => $newVersion['finscripciones_hasta'],
                    'tiempoV' => $newVersion['tiempoV'],
                    'ingresado' => TRUE

                );

                $this->session->set_userdata($version_dat);
                $this->load->view('plantillas/msg_success', $data);
                redirect('modulo/registroM/8/' . $versionNuevoId);
            } else {
                echo '<script> alert("No se puede crear los modulos de la Version, por favor intente de nuevo")</script>';
                redirect('version');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
    public function eliminarVersion($nombre = null)
    {
        if ($this->session->userdata('logueado')) {
            $nombre = urldecode($nombre);
            $consulta = $this->version_model->eliminarVersion($nombre);
            if ($consulta) {
                redirect('version/registroV/3');
            } else {

                redirect('version/registroV/4');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }

    public function editarFormVersion($idVersionUrl)
    {
        if (!$this->session->userdata('login')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        $idVersion = urldecode($idVersionUrl);
        if ($idVersion == null) {
            echo '<script> alert("No se encontro la Version")</script>';
            redirect('version/registroV', 'refresh');
        }

        $this->load->view('plantillas/encabezado');
        $this->load->view('plantillas/navegador');
        $data['mensaje'] = $this->session->flashdata('mensaje');
        $data['mensaje'] = $this->session->flashdata('tipo_mensaje');
        // Carga la vista con el mensaje
        $this->load->view('plantillas/mensajes_session', $data);
        $data['tipo'] = $this->session->userdata('tipo');

        $version = $this->version_model->getVersionByID($idVersion);
        $data['version'] = $version;
        switch ($data['tipo']) {
            case 'Secretario':
                echo '<script> alert("Usted no tiene permisos para crear nueva Version")</script>';
                $this->load->view('usuarios/secre_principal');
                break;
            case 'Coordinador':
                $this->load->view('v_version/editar_version', $data);
                break;
            case 'Administrador':
                $this->load->view('v_version/editar_version', $data);

                break;
            default:
                echo '<script> alert("El Usuario no inicio Sesion")</script>';
                redirect('autenticacion', 'refresh');
                break;
        }

        $this->load->view('plantillas/pie');
    }
    public function editarVersion()
    {
        $this->form_validation->set_rules('txtNombreVEditar', 'Nombre', 'required', array('required' => 'El campo %s es requerido.', 'is_unique' => 'El %s ya se registro,pruebe con otro nombre.'));
        $this->form_validation->set_rules('txtLugarVEditar', 'Lugar', 'required', array('required' => 'El campo %s es requerido.'));
        $this->form_validation->set_rules('txtTipoCursoVEditar', 'Tipo de Curso', 'required', array('required' => 'El campo %s es requerido.'));
        $this->form_validation->set_rules('txtCantidadModulosVEditar', 'Cantidad de Modulos', 'required|greater_than[0]', array('required' => 'El campo %s es requerido.', 'greater_than' => 'El campo %s debe ser mayor a cero.'));
        $this->form_validation->set_rules('txtEstadoVEditar' . 'Estado', 'required', array('required' => 'El campo %s es requerido.'));
        $this->form_validation->set_rules('txtFechaVEditar', 'Fecha de Inicio', 'required', array('required' => 'El campo %s es requerido.'));
        $this->form_validation->set_rules('txtTiempoVEditar', 'Tiempo', 'required', array('required' => 'El campo %s es requerido.'));
        $this->form_validation->set_rules('txtNumPagosVEditar', 'Numero de Pagos', 'required|greater_than[0]', array('required' => 'El campo %s es requerido.', 'greater_than' => 'El campo %s debe ser mayor a cero.'));
        $this->form_validation->set_rules('txtCostoVEditar', 'Costo Total', 'required|greater_than_equal_to[0]', array('required' => 'El campo %s es requerido.', 'greater_than_equal_to' => 'El campo %s debe ser mayor o igual a 0.'));
        $this->form_validation->set_rules('txtCostoMatriculaVEditar', 'Costo de Matricula', 'required|greater_than_equal_to[0]', array('required' => 'El campo %s es requerido.', 'greater_than_equal_to' => 'El campo %s debe ser mayor o igual a 0.'));
        $this->form_validation->set_rules('txtCostoModulosVEditar', 'Costo de Modulo', 'required|greater_than_equal_to[0]', array('required' => 'El campo %s es requerido.', 'greater_than_equal_to' => 'El campo %s debe ser mayor o igual a 0.'));
        $this->form_validation->set_rules('txtMontoMinPrimerPagoVEditar', 'Monto Minimo Primer Pago', 'required|greater_than_equal_to[0]', array('required' => 'El campo %s es requerido.', 'greater_than_equal_to' => 'El campo %s debe ser mayor o igual a 0.'));
        $this->form_validation->set_rules('txtDescripcionVEditar', 'Descripcion', 'required', array('required' => 'El campo %s es requerido.'));
        $costoV = $this->input->post('txtCostoVEditar');
        $costoMatriculaV = $this->input->post('txtCostoMatriculaVEditar');
        $costoModulosV = $this->input->post('txtCostoModulosVEditar');
        $sumaMatriculaModulos = $costoMatriculaV + $costoModulosV;
        $idVersion = $this->input->post('txtIdVersionEditar');
        if ($costoV != $sumaMatriculaModulos) {
            $this->form_validation->set_message('validate_costs', 'La suma de Costo Matrícula y Costo Módulos debe ser igual al Costo Total (' . $costoV . 'Bs.).');
            $this->form_validation->set_rules('txtCostoMatriculaVEditar', 'Matrícula', 'callback_validate_costs[' . $costoV . ']');
            $this->form_validation->set_rules('txtCostoModulosVEditar', 'Módulos', 'callback_validate_costs[' . $costoV . ']');
        }
        if ($this->form_validation->run() == FALSE) {
            $this->VersionMensajeSession(6);
            $this->editarFormVersion($idVersion);

            return;
        }
        $nombreV = $this->input->post('txtNombreVEditar');
        $fechaV = $this->input->post('txtFechaVEditar');
        $tiempoV = $this->input->post('txtTiempoVEditar');
        $fecha_termino  = date('Y-m-d', strtotime($fechaV . ' + ' . $tiempoV . ' month'));
        $descripcionV = $this->input->post('txtDescripcionVEditar');
        $costoModulosV = $this->input->post('txtCostoModulosVEditar');
        $lugarV = $this->input->post('txtLugarVEditar');
        $estadoV = $this->input->post('txtEstadoVEditar');
        $finscripciones_hasta = date('Y-m-d', strtotime($fechaV . ' - 1 day'));
        $tipoCursoV = $this->input->post('txtTipoCursoVEditar');
        $costoMatriculaV = $this->input->post('txtCostoMatriculaVEditar');
        $costoModulosV = $this->input->post('txtCostoModulosVEditar');
        $numPagosV = $this->input->post('txtNumPagosVEditar');
        $montoMinPrimerPagoV = $this->input->post('txtMontoMinPrimerPagoVEditar');
        $cantidadModulosV = $this->input->post('txtCantidadModulosVEditar');

        $data = array(
            'nombreV' => $nombreV,
            'fechaV' => $fechaV,
            'tiempoV' => $tiempoV,
            'fecha_termino' => $fecha_termino,
            'descripcionV' => $descripcionV,
            'costoV' => $costoV,
            'lugarV' => $lugarV,
            'estadoV' => $estadoV,
            'finscripciones_hasta' => $finscripciones_hasta,
            'tipoCursoV' => $tipoCursoV,
            'costoMatriculaV' => $costoMatriculaV,
            'costoModulosV' => $costoModulosV,
            'numPagosV' => $numPagosV,
            'montoMinPrimerPagoV' => $montoMinPrimerPagoV,
            'cantidadModulosV' => $cantidadModulosV,
            'idVersion' => $idVersion
        );

        $this->version_model->editarVersionData($data, $idVersion);
        if ($this->db->affected_rows() > 0) {
            $this->VersionMensajeSession(5);
            redirect('version/registroV');
        } else {
            $this->VersionMensajeSession(6);
            redirect('version/registroV');
        }
    }
    public function actualizarV($id = null)
    {
        if ($this->session->userdata('logueado')) {

            $nombreV = $this->input->post('txtNombreVedit');
            $fechaV = $this->input->post('txtFechaVedit');
            $tiempoV = $this->input->post('txtTiempoVedit');
            $descripcionV = $this->input->post('txtDescripcionVedit');
            $costoV = $this->input->post('txtCostoVedit');
            $lugarV = $this->input->post('txtLugarVedit');
            $tipoCursoV = $this->input->post('txtTipoCursoVedit');
            $porcentajeDescuentoV = $this->input->post('txtPorcentajeDescuentoVedit');
            //impimir los dos ultimo elemntos en un alert 


            // echo $nombreV;
            $this->version_model->editarVersion($nombreV, $fechaV, $tiempoV, $descripcionV, $costoV, $lugarV, $tipoCursoV, $porcentajeDescuentoV);
            $filasAfectadas = $this->db->affected_rows();
            if ($filasAfectadas > 0) {

                redirect('version/registroV/5');
            } else {

                redirect('version/registroV/6');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
    public function listaVersiones($id)
    {

        if ($this->session->userdata('logueado')) {
            $version = $this->version_model->getVersiones($id);
            echo $version;
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
    public function habilitarV()
    {
        if ($this->session->userdata('logueado')) {
            $version = $this->version_model->habilitarVersion();
            if ($version) {
                $version_data = array(
                    'id' => $version->idVersion
                );
                // $id=$version_data['id'];
                $vers = $this->version_model->tiempoFechas($version_data['id']);
                echo json_encode($vers);
            } else {
                echo "version no encontrado";
            }
            // $id=$this->db->insert_id();
            // $vers=$this->version_model->tiempoFechas($id);
            // echo json_encode($vers);
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }

    public function iniciarApagarVersion($id = null)
    {
        if ($this->session->userdata('logueado')) {
            // antes HACER EL MODAL PARA ENCENDER O APAGAR LA VERSION Y Q MANDE LA RAZON Y IDBITACORA
            $idv = urldecode($id);
            $version = $this->version_model->iniciarVersion($idv);

            // QUE MUESTRE IGUAL PARA QUE IMPRIMA LA ACCION YA SEA HABILITAR O DESABILITAR LA VERSION
            redirect('version/registroV');
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
    public function versiones_habilitados()
    {
        if ($this->session->userdata('logueado')) {
            $data = array(
                'habilitados' => $this->version_model->mostrar_versiones_habilitados()
            );
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }

    //averiguar por q entra jhay cambias al borra version_dat de else y el modelo de hab version mejorarlo sin muchos elses
    public function ingresarv()
    {
        if ($this->session->userdata('logueado')) {
            if ($this->input->get()) {
                $nombre = $this->input->get('nombre'); //$nombre=$_GET['nombre'];
                $estado = $this->input->get('estado');
                if ($estado == 1) {
                    $version = $this->version_model->getVersiones($nombre);
                    $version_dat = array(
                        'idVersion' => $version->idVersion,
                        'nombreV' => $version->nombreV,
                        'estado' => $version->estadoV,
                        'fechaV' => $version->fechaV,
                        'fechainscripciones' => $version->finscripciones_hasta,
                        'tiempoV' => $version->tiempoV,
                        'ingresado' => TRUE
                    );
                    $this->session->set_userdata($version_dat);
                    redirect('version/logueadoVersion');
                } else {
                    //    echo '<script> alert("La version no esta Habilitada!")</script>';
                    //    redirect('version/registroV','refresh');
                    $version = $this->version_model->getVersiones($nombre);

                    $data = array(
                        'login' => $this->session->userdata('tipo'),
                        'nombre' => $version->nombreV,
                        'estado' => $version->estadoV,
                        'modulo' => $this->modulo_model->getModulo($version->idVersion),
                        'paralelo' => $this->paralelo_model->getParalelo($version->idVersion)
                    );

                    $this->load->view('plantillas/encabezado');
                    $this->load->view('plantillas/navegador', $data);

                    $data1['tipo'] = $this->session->userdata('tipo');
                    switch ($data1['tipo']) {
                        case 'Secretario':
                            $this->load->view('plantillas/menu_version_cerrada', $data);
                            $this->load->view('v_version/gestionar_version', $data);

                            break;
                        case 'Coordinador':
                            $this->load->view('plantillas/menu_version_cerrada', $data);
                            $this->load->view('v_version/gestionar_version', $data);
                            break;
                        case 'Administrador':
                            $this->load->view('plantillas/menu_version_cerrada', $data);
                            $this->load->view('v_version/gestionar_version', $data);
                            break;
                        default:
                            echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                            redirect('autenticacion');
                            break;
                    }
                    $this->load->view('plantillas/pie');
                }
            } else {
                // $version=$this->version_model->ultimaVersion();
                $version = $this->version_model->mostrar_versiones_habilitados();

                // echo json_encode($version) ;
                if (empty($version)) {
                    // echo"vacia";
                    $data = array(
                        '' => "algo q se quiera mostrar en el encabezado"
                    );
                    $this->load->view('plantillas/encabezado');
                    $this->load->view('plantillas/navegador', $data);
                    // $this->load->view('plantillas/menu_general',$data);

                    $data['tipo'] = $this->session->userdata('tipo');

                    switch ($data['tipo']) {
                        case 'Secretario':

                            $this->load->view('usuarios/coordinador_principal');
                            break;

                        case 'Coordinador':

                            $this->load->view('usuarios/coordinador_principal');
                            break;

                        case 'Administrador':

                            $this->load->view('usuarios/coordinador_principal');
                            break;

                        default:
                            echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                            redirect('autenticacion');
                            break;
                    }
                    $this->load->view('plantillas/pie');
                } else {
                    // echo"lleno";
                    // $version=$this->version_model->getVersiones($version_data['nombre']);
                    $version_dat = array(
                        'idVersion' => $version->idVersion,
                        'nombreV' => $version->nombreV,
                        'estado' => $version->estadoV,
                        'fechaV' => $version->fechaV,
                        'fechainscripciones' => $version->finscripciones_hasta,
                        'tiempoV' => $version->tiempoV,
                        'ingresado' => TRUE
                    );
                    $this->session->set_userdata($version_dat);
                    redirect('version/logueadoVersion');
                }
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }

    public function logueadoVersion()
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) {
                $version = $this->session->userdata('idVersion');
                $data = array(
                    'login' => $this->session->userdata('tipo'),
                    'nombre' => $this->session->userdata('nombreV'),
                    'estado' => $this->session->userdata('estado'),
                    'modulo' => $this->modulo_model->getModulo($version),
                    'paralelo' => $this->paralelo_model->getParalelo($version)
                );

                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador', $data);

                $data1['tipo'] = $this->session->userdata('tipo');
                switch ($data1['tipo']) {
                    case 'Secretario':

                        $this->load->view('plantillas/menu_secretario', $data);
                        $this->load->view('v_version/gestionar_version', $data);

                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador', $data);
                        // $this->load->view('plantillas/menu2',$data);
                        $this->load->view('v_version/gestionar_version', $data);
                        break;
                    case 'Administrador':
                        $this->load->view('plantillas/menu_administrador', $data);
                        $this->load->view('v_version/gestionar_version', $data);
                        break;
                    default:
                        echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                        redirect('autenticacion');
                        break;
                }
                $this->load->view('plantillas/pie');
            } else {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv', 'refresh');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
    //cierra verson
    public function cerrar_sesion_version()
    {
        if ($this->session->userdata('logueado')) {
            $version_data = array(

                'ingresado' => FALSE
            );
            // desde aqui se hizo cambios terminarV

            $idVersion = $this->input->post('version');
            $razonv = $this->input->post('razonV');
            $accion = $this->version_model->terminar_version($idVersion);
            if ($accion == false) {
                echo "versiontermino";
            } else {
                // hasta aqui terminarV

                $this->session->set_userdata($version_data);
                //crea bitacora de evento cierre de version
                $v1 = $this->bitacora_model->bitacora_cierra_version($idVersion, $razonv);
                //Generar Informe de cierre de version
                echo json_encode($v1);
                // redirect('version');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
    //Habilita otra ves la sesion de version
    public function reiniciar_sesion_version()
    {
        if ($this->session->userdata('logueado')) {
            $version_data = array(

                'ingresado' => TRUE
            );

            $idVersion = $this->input->post('version');
            $razonv = $this->input->post('razonV');

            $accion = $this->version_model->reiniciar_version($idVersion);
            if ($accion == false) {
                echo "yasehabilitoversion";
            } else {

                $this->session->set_userdata($version_data);
                //crea bitacora de evento cierre de version
                $v1 = $this->bitacora_model->bitacora_habilita_version($idVersion, $razonv);
                //Generar Informe de cierre de version
                echo json_encode($v1);
                // redirect('version');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
    //manda la lista de eventos de version
    public function getEvento_vercion()
    {
        $nombrev = $this->input->post('nombreV');
        $listaEventos = $this->bitacora_model->getBitacora_version_pornombre($nombrev);
        if (empty($listaEventos)) {
            echo "nohayevento";
        } else {
            echo json_encode($listaEventos);
        }
    }
    public function getFechaActual()
    {
        setlocale(LC_ALL, "spanish");
        // return now('Australia/Victoria');
        return strftime("%A, %d de %B del %Y");
    }
    public function imprimirtcpdf($idBitacorav = null)
    {
        if ($idBitacorav == null) {
            if ($this->input->get()) {
                $idBitacorav = $this->input->get('bversion');

                $data = array(
                    'eventoVersion' => $this->bitacora_model->getBitacora_version_porid($idBitacorav),
                    // 'idbitacorav'=>$idBitacorav ,
                    'fecha' => $this->getFechaActual()
                );
                $this->load->view('v_imprimirpdf/eventos_version', $data);
            } else {
                echo "NO esta recibiendo con get hacer algo";
            }
        } else {
            $idBitacorav = $this->input->get('bversion');

            $data = array(
                'eventoVersion' => $this->bitacora_model->getBitacora_version_porid($idBitacorav),
                // 'idbitacorav'=>$idBitacorav ,
                'fecha' => $this->getFechaActual()
            );
            $this->load->view('v_imprimirpdf/eventos_version', $data);
        }
    }

    public function verificar_estadoV() //nousa era para q aparesca o no el boton terminar version
    {
        $version = $this->version_model->mostrar_versiones_habilitados();
        if (empty($version)) {
            echo "hayversioneshabilitadas";
        } else {
            echo "nohabilitadas";
        }
    }

    public function informacion_version()
    {
        if ($this->session->userdata('logueado')) {

            // $data=array(
            //     'version'=>$this->version_model->getVersiones());

            $this->load->view('plantillas/encabezado');
            $this->load->view('plantillas/navegador');

            $data['tipo'] = $this->session->userdata('tipo');

            switch ($data['tipo']) {
                case 'Secretario':
                    // $this->load->view('v_version/informacion_version',$data);
                    $this->load->view('usuarios/coordinador_principal', $data);
                    break;
                case 'Coordinador':
                    $this->load->view('usuarios/coordinador_principal', $data);
                    break;
                case 'Administrador':
                    $this->load->view('usuarios/coordinador_principal', $data);
                    break;
                default:
                    echo '<script> alert("El Usuario no inicio Sesion")</script>';
                    redirect('autenticacion', 'refresh');
                    break;
            }
            $this->load->view('plantillas/pie');
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }

    public function versionMensajes($indice = null)
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        $version = $this->session->userdata('idVersion');
        $data = array(
            'nombre' => $this->session->userdata('nombreV'),
            'modulo' => $this->modulo_model->getModulo($version),
            'paralelo' => $this->paralelo_model->getParalelo($version),

            'descuentos' => $this->descuento_model->getDescuentos()
        );
        $this->load->view('plantillas/encabezado');
        $this->load->view('plantillas/navegador', $data);
        if ($indice == 1) {
            $data['msg'] = "Se registro nueva Version.";
            $this->load->view('plantillas/msg_success', $data);
        } else if ($indice == 2) {
            $data['msg'] = "No es posible registrar Vescuento. Revise datos";
            $this->load->view('plantillas/msg_error', $data);
        } else if ($indice == 3) {
            $data['msg'] = "Se Elimino  Version.";
            $this->load->view('plantillas/msg_success', $data);
        } else if ($indice == 4) {
            $data['msg'] = "No es posible Eliminar Version.";
            $this->load->view('plantillas/msg_error', $data);
        } else if ($indice == 5) {
            $data['msg'] = "Se Edito la Version.";
            $this->load->view('plantillas/msg_success', $data);
        } else if ($indice == 6) {
            $data['msg'] = "No es posible Editar Version.";
            $this->load->view('plantillas/msg_error', $data);
        }

        $data['tipo'] = $this->session->userdata('tipo');
        switch ($data['tipo']) {
            case 'Secretario':
                $this->load->view('plantillas/menu_secretario', $data);
                break;
            case 'Coordinador':
                $this->load->view('plantillas/menu_coordinador', $data);
                break;
            default:
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('autenticacion', 'refresh');
                break;
        }

        $this->load->view('v_descuento/lista_descuentos', $data);
        $this->load->view('plantillas/pie');
    }
    // valdiar costo igual a matricula y modulos
    public function validate_costs($value, $costoV)
    {
        if ($value + $this->input->post('txtCostoModulosV') != $costoV) {
            return false;
        } else {
            return true;
        }
    }
    public function VersionMensajeSession($indice = null)
    {
        $mensaje = "";
        $tipo = "";

        if ($indice == 1) {
            $mensaje = "Se registró un nuevo Versión.";
            $tipo = "success";
        } else if ($indice == 2) {
            $mensaje = "No es posible registrar el Versión. Revise los datos.";
            $tipo = "danger";
        } else if ($indice == 3) {
            $mensaje = "Se eliminó el Versión.";
            $tipo = "success";
        } else if ($indice == 4) {
            $mensaje = "No es posible eliminar el Versión.";
            $tipo = "danger";
        } else if ($indice == 5) {
            $mensaje = "Se editó el Versión.";
            $tipo = "success";
        } else if ($indice == 6) {
            $mensaje = "No es posible editar el Versión.";
            $tipo = "danger";
        }

        // Guarda el mensaje y el tipo en flashdata
        $this->session->set_flashdata('mensaje', $mensaje);
        $this->session->set_flashdata('tipo_mensaje', $tipo);
    }
}
