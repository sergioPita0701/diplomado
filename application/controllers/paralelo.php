<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paralelo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('version_model');
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
        $this->load->model('diplomante_model');
        $this->load->model('inscripcion_model');
        $this->load->model('modulodiplomante_model');
    }
    public function index()

    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version = $this->session->userdata('idVersion');
                $data = array(
                    'nombre' => $this->session->userdata('nombreV'),
                    'modulo' => $this->modulo_model->getModulo($version),
                    // 'ultimo'=>$this->modulo_model->getUltimo($version),
                    'paralelo' => $this->paralelo_model->getParalelo($version)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador');

                $data['tipo'] = $this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario', $data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador', $data);
                        $this->load->view('v_modulo/paralelo', $data);
                        break;
                    case 'administrador':
                        $this->load->view('plantillas/menu_administrador', $data);
                        $this->load->view('v_modulo/paralelo', $data);
                        break;
                    default:
                        echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                        redirect('autenticacion', 'refresh');
                        break;
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

    public function registroParalelo($indice = null) //se usa
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version = $this->session->userdata('idVersion');

                $data = array(
                    'nombre' => $this->session->userdata('nombreV'),
                    'modulo' => $this->modulo_model->getModulo($version),
                    // 'ultimo'=>$this->modulo_model->getUltimo($version),
                    'paralelo' => $this->paralelo_model->getParalelo($version)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador');

                $data['tipo'] = $this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario', $data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador', $data);
                        if ($indice == 1) {
                            $data['msg'] = "Se Registro Nuevo Paralelo al un Modulo.";
                            $this->load->view('plantillas/msg_success', $data);
                        } else if ($indice == 2) {
                            $data['msg'] = "No es posible Registrar Paralelo.";
                            $this->load->view('plantillas/msg_error', $data);
                        } else if ($indice == 3) {
                            $data['msg'] = "Se Elimino el Paralelo.";
                            $this->load->view('plantillas/msg_success', $data);
                        } else if ($indice == 4) {
                            $data['msg'] = "No es posible Eliminar el Paralelo.";
                            $this->load->view('plantillas/msg_error', $data);
                        } else if ($indice == 5) {
                            $data['msg'] = "Se dito Paralelo.";
                            $this->load->view('plantillas/msg_success', $data);
                        } else if ($indice == 6) {
                            $data['msg'] = "No se pudo realizar cambios en el Paralelo.";
                            $this->load->view('plantillas/msg_error', $data);
                        } else if ($indice == 7) {
                            $data['msg'] = "No es posible realizar la operacion, ya existe existe un Paralelo con el mismo nombre ó módulo.";
                            $this->load->view('plantillas/msg_error', $data);
                        }
                        $this->load->view('v_modulo/paralelo', $data);
                        break;
                    case 'administrador':
                        $this->load->view('plantillas/menu_administrador', $data);
                        $this->load->view('v_modulo/paralelo', $data);
                        break;
                    default:
                        echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                        redirect('autenticacion', 'refresh');
                        break;
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

    public function crearParalelo() //se usa
    {
        if ($this->session->userdata('logueado')) {
            $this->form_validation->set_rules(
                'txtNombreParalelo',
                'Nombre de Paralelo',
                'required',
                array('required' => 'El campo %s es requerido.')
            );

            if ($this->form_validation->run() == FALSE) {
                $this->index();
            } else {
                if ($this->session->userdata('ingresado')) {
                    $version = $this->session->userdata('idVersion');

                    $modulo = $this->input->post('selectModulo');
                    $nombreParalelo = $this->input->post('txtNombreParalelo');
                    $cantidadParalelo = $this->input->post('txtCantidad');
                    // $docencia="";

                    $paralelo = $this->paralelo_model->buscarParalelo($version, $modulo, $nombreParalelo);
                    if (empty($paralelo)) {
                        $this->paralelo_model->crear_paralelo($modulo, $nombreParalelo, $cantidadParalelo, $version);
                        $filasAfectadas = $this->db->affected_rows();

                        if ($filasAfectadas > 0) {

                            redirect('paralelo/registroParalelo/1');
                        } else {
                            redirect('paralelo/registroParalelo/2');
                        }
                    } else {
                        redirect('paralelo/registroParalelo/7');
                    }
                } else {
                    echo '<script> alert("la version fue cerrada!")</script>';
                    redirect('version/ingresarv', 'refresh');
                }
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
    public function editarParalelo() //se usa
    {
        if ($this->session->userdata('logueado')) {
            $numeroM = $this->input->post('txtnumeromod');
            $idParalelo = $this->input->post('txtidparalelo');
            $nombreParalelo = $this->input->post('txtparalelosele');
            $cantidadParalelo = $this->input->post('txtcantidadsele');

            if ($this->session->userdata('ingresado')) {
                $version = $this->session->userdata('idVersion');

                $this->paralelo_model->editarParalelo($idParalelo, $nombreParalelo, $cantidadParalelo, $numeroM, $version);
                $filasAfectadas = $this->db->affected_rows();
                if ($filasAfectadas > 0) {
                    // redirect('paralelo/registroParalelo/5');
                    echo "seedito";
                } else {
                    // redirect('paralelo/registroParalelo/6');
                    echo "noseedito";
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

    public function eliminarParalelo() //se usa
    {
        if ($this->session->userdata('logueado')) {
            $data['tipo'] = $this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    $this->load->view('plantillas/menu_secretario', $data);
                    break;
                case 'Coordinador':
                    $nummod = $this->input->get('modulo');
                    $paralelo = $this->input->get('paralelo');

                    if ($this->session->userdata('ingresado')) {
                        $version = $this->session->userdata('idVersion');

                        $modulo = $this->paralelo_model->eliminarParalelo($version, $nummod, $paralelo);
                        $filasAfectadas = $this->db->affected_rows();
                        if ($filasAfectadas > 0) {

                            redirect('paralelo/registroParalelo/3');
                        } else {
                            redirect('paralelo/registroParalelo/4');
                        }
                    } else {
                        echo '<script> alert("la version fue cerrada!")</script>';
                        redirect('version/ingresarv', 'refresh');
                    }
                    break;
                default:
                    echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                    redirect('autenticacion', 'refresh');
                    break;
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
    public function existeParalelo() //se usa en el pie para edit
    {
        if ($this->session->userdata('logueado')) {
            $data['tipo'] = $this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    $this->load->view('plantillas/menu_secretario', $data);
                    break;
                case 'Coordinador':
                    if ($this->session->userdata('ingresado')) {
                        $version = $this->session->userdata('idVersion');

                        $modulo = $this->input->post('numModulo');
                        $paralelo = $this->input->post('nombParalelo');
                        $idparalelo = $this->input->post('idParalelo');

                        $paralelo = $this->paralelo_model->existenombreParalelo($version, $modulo, $paralelo, $idparalelo);
                        echo json_encode($paralelo);
                    } else {
                        echo '<script> alert("la version fue cerrada!")</script>';
                        redirect('version/ingresarv', 'refresh');
                    }
                    break;
                default:
                    echo '<script> alert("El Usuario no inicio Sesion")</script>';
                    redirect('autenticacion', 'refresh');
                    break;
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
    public function get_paralelosde_modulo() //se usa para el pie
    {
        if ($this->session->userdata('logueado')) {
            $data['tipo'] = $this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                case 'Coordinador':
                case 'Administrador':
                    if ($this->session->userdata('ingresado')) {
                        $version = $this->session->userdata('idVersion');

                        $modulo = $this->input->post('modulo');
                        $paralelo = $this->paralelo_model->buscarParalelo($version, $modulo, null);
                        echo json_encode($paralelo);
                    } else {
                        echo '<script> alert("la version fue cerrada!")</script>';
                        redirect('version/ingresarv', 'refresh');
                    }
                    break;
                default:
                    echo '<script> alert("El Usuario no inicio Sesion")</script>';
                    redirect('autenticacion', 'refresh');
                    break;
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
}
