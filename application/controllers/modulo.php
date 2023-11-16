<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modulo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // CARGAR LA LIBRERIA PARA IMPRIMIR
        $this->load->library('pdf_report');

        $this->load->library('session');

        $this->load->model('version_model');
        $this->load->model('modulo_model');
        $this->load->model('diplomante_model');
        $this->load->model('inscripcion_model');
        $this->load->model('modulodiplomante_model');
        $this->load->model('paralelo_model');
        $this->load->model('calificacion_model');
    }
    public function index($idVersionURl = null)
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        if ($idVersionURl == null) {

            $idVersion = $this->session->userdata('idVersion');
        } else {
            $idVersion = $idVersionURl;
        }

        $data = array(
            'nombre' => $this->session->userdata('nombreV'),
            'modulo' => $this->modulo_model->getModulo($idVersion),
            'ultimo' => $this->modulo_model->getUltimo($idVersion),
            'paralelo' => $this->paralelo_model->getParalelo($idVersion),
            'version' =>  $this->version_model->getIdVersion($idVersion)
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
                $this->load->view('plantillas/menu_secretario', $data);
                break;
            case 'Coordinador':
                $this->load->view('plantillas/menu_coordinador', $data);
                $this->load->view('v_modulo/lista_modulos', $data); //$this->load->view('v_modulo/modulo',$data);
                break;
            case 'Administrador':
                $this->load->view('plantillas/menu_administrador', $data);
                $this->load->view('v_modulo/lista_modulos', $data);
                break;
            default:
                redirect('autenticacion');
                break;
        }


        $this->load->view('plantillas/pie');
    }

    public function registroM($indice = null, $idVersionURL = null) //se usa
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) {
                if ($idVersionURL == null) {
                    $version = $this->session->userdata('idVersion');
                } else {
                    $version = $idVersionURL;
                }

                $data = array(
                    'nombre' => $this->session->userdata('nombreV'),
                    'modulo' => $this->modulo_model->getModulo($version),
                    'ultimo' => $this->modulo_model->getUltimo($version),
                    'paralelo' => $this->paralelo_model->getParalelo($version),
                    'version' => $this->version_model->getIdVersion($version)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador');
                if ($indice == 1) {
                    $data['msg'] = "Se Registro Nuevo Modulo con un primer Paralelo 'A' si desea añadir mas paralelo o editar ingrese a 'Crear/Editar Paralelos' ";
                    $this->load->view('plantillas/msg_success', $data);
                } else if ($indice == 2) {
                    $data['msg'] = "No es posible Registrar Modulo.";
                    $this->load->view('plantillas/msg_error', $data);
                } else if ($indice == 3) {
                    $data['msg'] = "Se Elimino el Modulo.";
                    $this->load->view('plantillas/msg_success', $data);
                } else if ($indice == 4) {
                    $data['msg'] = "No es posible Eliminar Modulo.";
                    $this->load->view('plantillas/msg_error', $data);
                } else if ($indice == 5) {
                    $data['msg'] = "Edicion satisfactoria de los datos del Modulo.";
                    $this->load->view('plantillas/msg_success', $data);
                } else if ($indice == 6) {
                    $data['msg'] = "No se pudo realizar cambios en el Modulo.";
                    $this->load->view('plantillas/msg_error', $data);
                } else if ($indice == 7) {
                    $data['msg'] = "No es posible realizar la operacion, ya existe existe un Modulo con el mismo nombre ó número.";
                    $this->load->view('plantillas/msg_error', $data);
                } else if ($indice == 8) {
                    $data['msg'] = "Se registro nueva Version.";
                    $this->load->view('plantillas/msg_success', $data);
                }
                $data['tipo'] = $this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario', $data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador', $data);
                        $this->load->view('v_modulo/lista_modulos', $data);
                        break;
                    case 'Administrador':
                        $this->load->view('plantillas/menu_administrador', $data);
                        $this->load->view('v_modulo/lista_modulos', $data);
                        break;
                    default: {
                            echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                            redirect('autenticacion');
                            break;
                        }
                }

                $this->load->view('plantillas/pie');
            } else {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv', 'refresh');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }

    public function crearModulo() //se usa
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesión")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        $this->form_validation->set_rules('txtNumM', 'Número', 'required|max_length[2]', array('required' => 'El campo %s es requerido.', 'max_length' => 'El campo %s no puede exceder los 2 caracteres.'));
        $this->form_validation->set_rules('txtNombreModulo', 'Nombre', 'required|max_length[255]', array('required' => 'El campo %s es requerido.', 'max_length' => 'El campo %s no puede exceder los 255 caracteres.'));
        $this->form_validation->set_rules('txtAsignaturaNombreM', 'Asignatura', 'required|max_length[255]', array('required' => 'El campo %s es requerido.', 'max_length' => 'El campo %s no puede exceder los 255 caracteres.'));
        $this->form_validation->set_rules('vigentemo', 'Activado', 'required', array('required' => 'El campo %s es requerido.'));
        $idVersion = $this->input->post('txtIdVersion');
        if ($this->form_validation->run() == FALSE) {

            $this->moduloMensajes(2);
            $this->index($idVersion);
            return;
        }
        // $idVersion = $this->session->userdata('idVersion');


        $numeroM = $this->input->post('txtNumM');
        $data = array(
            'numeroM' => $numeroM,
            'nombreM' => $this->input->post('txtNombreModulo'),
            'descripcionM' => $this->input->post('txtAsignaturaNombreM'),
            'fecha_inicioMo' => $this->input->post('txtFechaInicioMo'),
            'fecha_finalMo' => $this->input->post('txtFechaFinalMo'),
            'vigenteMo' => $this->input->post('vigentemo'),
            'idVersion' =>  $idVersion,
            'nivelM' => $this->input->post('selectNivelM'),
            'asignaturaNombreM' => $this->input->post('txtAsignaturaNombreM')
        );


        $this->modulo_model->actualizarModulosNumeroM($numeroM, $idVersion);
        $idModulo =  $this->modulo_model->crearModuloData($data);

        $dataPalelo = array(
            'nombre_paralelo' => 'A',
            'idModulo' => $idModulo,
            'cantidad' => 0
        );
        $this->paralelo_model->crearParaleloData($dataPalelo);
        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {
            $this->moduloMensajes(1);
            // Redirige a la página 'modulo'
            redirect('modulo/index/' . $idVersion, 'refresh');
        } else {
            $this->moduloMensajes(2);
            // Redirige a la página 'modulo'
            redirect('modulo', 'refresh');
        }
    }
    public function editarModulo()
    {

        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inició Sesión")</script>';
            redirect('autenticacion', 'refresh');
        }

        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("La versión fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }

        $this->form_validation->set_rules('txtNumMEditar', 'Número', 'required|max_length[2]', array('required' => 'El campo %s es requerido.', 'max_length' => 'El campo %s no puede exceder los 2 caracteres.'));
        $this->form_validation->set_rules('txtNombreModuloEditar', 'Nombre', 'required|max_length[255]', array('required' => 'El campo %s es requerido.', 'max_length' => 'El campo %s no puede exceder los 255 caracteres.'));
        $this->form_validation->set_rules('txtAsignaturaNombreMEditar', 'Asignatura', 'required|max_length[255]', array('required' => 'El campo %s es requerido.', 'max_length' => 'El campo %s no puede exceder los 255 caracteres.'));
        $this->form_validation->set_rules('vigentemoEditar', 'Activado', 'required', array('required' => 'El campo %s es requerido.'));

        $idVersion = $this->input->post('txtIdVersionEditar');
        if ($this->form_validation->run() == FALSE) {

            $this->moduloMensajes(5);
            $this->index($idVersion);
            return;
        }
        //var_dump($this->input->post() );
        // return;
        $idModulo = $this->input->post('txtIdModuloEditar');
        if ($idModulo == null) {
            $this->moduloMensajes(6);
            $this->index($idVersion);
            return;
        }

        $numeroM = $this->input->post('txtNumMEditar');
        $data = array(
            'numeroM' =>  $numeroM,
            'nombreM' => $this->input->post('txtNombreModuloEditar'),
            'descripcionM' => $this->input->post('txtAsignaturaNombreMEditar'),
            'fecha_inicioMo' => $this->input->post('txtFechaInicioMoEditar'),
            'fecha_finalMo' => $this->input->post('txtFechaFinalMoEditar'),
            'vigenteMo' => $this->input->post('vigentemoEditar'),
            'idVersion' => $this->input->post('txtIdVersionEditar'),
            'nivelM' => $this->input->post('selectNivelMEditar'),
            'asignaturaNombreM' => $this->input->post('txtAsignaturaNombreMEditar')
        );

        $this->modulo_model->actualizarModulosNumeroMCambiarDeLugar($numeroM, $idVersion, $idModulo);

        $this->modulo_model->editarModuloData($data, $idModulo);

        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {
            $this->moduloMensajes(5);
            // Redirige a la página 'modulo'
            redirect('modulo', 'refresh');
        } else {
            $this->moduloMensajes(6);
            // Redirige a la página 'modulo'
            redirect('modulo', 'refresh');
        }
    }
    public function eliminarModulo($idModuloURl,$idVersionURL)
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inició Sesión")</script>';
            redirect('autenticacion', 'refresh');
        }

        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("La versión fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        $idModulo = urldecode($idModuloURl);
        $idVersion = urldecode($idVersionURL);
        if ($idModulo == null || $idVersion == null) {
            echo '<script> alert("No es posible eliminar modulo!")</script>';
            redirect('modulo', 'refresh');
        }
        $cantidadInscritos = $this->modulo_model->inscritosCount($idModulo);
        if ($cantidadInscritos > 0) {
            echo '<script> alert("No es posible eliminar modulo!, tiene inscritos")</script>';
            $this->moduloMensajes(4);
            redirect('modulo', 'refresh');
        }
        $modulo = $this->modulo_model->getModuloById($idModulo);
        $this->modulo_model->actualizarModulosNumeroMRestar1($modulo->numeroM, $idVersion);
        $this->modulo_model->eliminarModuloData($idModulo);
        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {
            $this->moduloMensajes(3);
            // Redirige a la página 'modulo'
            redirect('modulo', 'refresh');
        } else {
            $this->moduloMensajes(4);
            // Redirige a la página 'modulo'
            redirect('modulo', 'refresh');
        }
    }
    public function editaMod() //se usa
    {
        if ($this->session->userdata('logueado')) {
            $numeroM = $this->input->post('txtnumsele');
            $nombreM = $this->input->post('txtnombresele');
            $descripcionM = $this->input->post('txtdescripcionsele');
            $vigenteM = $this->input->post('vigenteedit');
            $inicioM = $this->input->post('txtfechainicio');
            $finalM = $this->input->post('txtfechafinal');
            $version = $this->input->post('txtIdVersionEdit');
            if ($this->session->userdata('ingresado')) {
                // $version = $this->session->userdata('idVersion');

                $mm = $this->modulo_model->editarModulo($numeroM, $nombreM, $descripcionM, $vigenteM, $inicioM, $finalM, $version);
                $data = array(
                    'eventoModulo' => $this->modulo_model->buscarModulo($version, $numeroM, $nombreM),
                    'nombre' => $this->session->userdata('nombreV'),
                    'fecha' => $this->getFechaActual(),
                    'fechayHora' => $this->getFechayHoraActual()
                );
                $this->load->view('v_imprimirpdf/eventos_modulo', $data);
                // $filasAfectadas=$this->db->affected_rows();
                // if($filasAfectadas>0)
                // {
                //     // redirect('modulo/registroM/5');

                // }else
                // {
                //     redirect('modulo/registroM/6');
                // }
            } else {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv', 'refresh');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }

    public function deleteModulo($numeroM) //se usa
    {
        if ($this->session->userdata('logueado')) {
            $nummod = urldecode($numeroM);

            if ($this->session->userdata('ingresado')) {
                $version = $this->session->userdata('idVersion');

                $modulo = $this->modulo_model->eliminarModulo($version, $nummod);
                $filasAfectadas = $this->db->affected_rows();
                if ($filasAfectadas > 0) {

                    redirect('modulo/registroM/3' . $version);
                } else {
                    // echo "$modulo";
                    redirect('modulo/registroM/4' . $version);
                }
            } else {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv', 'refresh');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
    //crea modulo 
    public function crear_modulo()
    {
        if ($this->session->userdata('logueado')) {
            $data = array(
                'nombre' => $this->session->userdata('nombreV'),
                // 'modulo' => $this->modulo_model->getModulo($version),
                // 'ultimo' => $this->modulo_model->getUltimo($version),
                // 'paralelo' => $this->paralelo_model->getParalelo($version)
            );
            $this->load->view('v_modulo/crear_modulo', $data);
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
    // public function detallarM($id)
    // {
    //     $modulo=$this->modulo_model->getModulo($id);
    //     echo json_encode($modulo);
    // }
    public function ultimo() //
    {
        $v1 = $this->modulo_model->getUltimo();
        echo $v1;
    }

    public function getModulo()
    {
        $version = $this->session->userdata('idVersion');
        $numeroM = $this->input->post('numeroM');
        $nombreM = $this->input->post('nombreM');
        $modulo = $this->modulo_model->buscarModulo($version, $numeroM, $nombreM);
        echo json_encode($modulo);
    }
    // --------------------------------------IMPRESIONES MODULO-----------------------------
    // IMPRIMIR LA LISTA DE DIPLOMANTES DE CADA MODULO POR SU NUM DE MODULO
    public function listaDiplomantes_porModulo_imprimir($num = null)
    {
        $data['tipo'] = $this->session->userdata('tipo');
        switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                if ($num == null) {
                    $nummod = $this->input->get('num');
                } else {
                    $nummod = urldecode($num);
                }
                $version = $this->session->userdata('idVersion');
                $data = array(
                    'login' => $this->session->userdata('tipo'),
                    'nombre' => $this->session->userdata('nombreV'),
                    'modulo' => $this->modulo_model->getModulo($version),
                    'ultimo' => $this->modulo_model->getUltimo($version),
                    'paralelo' => $this->paralelo_model->getParalelo($version),
                    'listacalificaciones' => $this->calificacion_model->getCalificacion_porModulo($version, $nummod, null)
                );
                $this->load->view('v_imprimirpdf/lista_calificaciones_pormodulo_pdf', $data);
                break;
            default:
                echo '<script> alert("El Usuario no inicio Sesion")</script>';
                redirect('autenticacion', 'refresh');
                break;
        }
    }

    public function getFechaActual()
    {
        setlocale(LC_ALL, "spanish");
        // return now('Australia/Victoria');
        return strftime("%A, %d de %B del %Y");
    }
    public function getFechayHoraActual()
    {
        setlocale(LC_ALL, "spanish");
        // return now('Australia/Victoria');
        return strftime("%A, %d de %B del %Y a Hrs.: %H:%M:%S ");
    }


    public function moduloMensajes($indice = null)
    {
        $mensaje = "";
        $tipo = "";

        if ($indice == 1) {
            $mensaje = "Se registró un nuevo Módulo.";
            $tipo = "success";
        } else if ($indice == 2) {
            $mensaje = "No es posible registrar el Módulo. Revise los datos.";
            $tipo = "danger";
        } else if ($indice == 3) {
            $mensaje = "Se eliminó el Módulo.";
            $tipo = "success";
        } else if ($indice == 4) {
            $mensaje = "No es posible eliminar el Módulo.";
            $tipo = "danger";
        } else if ($indice == 5) {
            $mensaje = "Se editó el Módulo.";
            $tipo = "success";
        } else if ($indice == 6) {
            $mensaje = "No es posible editar el Módulo.";
            $tipo = "danger";
        }

        // Guarda el mensaje y el tipo en flashdata
        $this->session->set_flashdata('mensaje', $mensaje);
        $this->session->set_flashdata('tipo_mensaje', $tipo);
    }


    public function getModuloJson($idModuloURl)
    {
        $idModulo = urldecode($idModuloURl);
        $modulo = $this->modulo_model->getModuloById($idModulo);
        echo json_encode($modulo);
    }
}
