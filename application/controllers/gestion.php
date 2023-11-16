<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gestion extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('version_model');
        //$this->version_model->conexion();
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
        $this->load->model('diplomante_model');
        $this->load->model('profesion_model');
    }

    public function index() //nose  donde levanto?
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version = $this->session->userdata('idVersion');

                $data = array(
                    'nombre' => $this->session->userdata('nombreV'),
                    'estado' => $this->session->userdata('estadoV'),
                    'modulo' => $this->modulo_model->getModulo($version),
                    'paralelo' => $this->paralelo_model->getParalelo($version)
                );

                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador', $data);

                $data['tipo'] = $this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario', $data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador', $data);
                        break;
                    case 'Administrador':
                        $this->load->view('plantillas/menu_administrador', $data);
                        break;
                    default:

                        redirect('autenticacion');
                        break;
                }
                $this->load->view('v_version/gestionar_version', $data);
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
    public function levantarV() //nose  donde levanto?
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version = $this->session->userdata('idVersion');
                $data = array(
                    'nombre' => $this->session->userdata('nombreV'),
                    'estado' => $this->session->userdata('estadoV'),
                    'modulo' => $this->modulo_model->getModulo($version),
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
                        break;

                    default:

                        redirect('autenticacion');
                        break;
                }
                $this->load->view('v_version/gestionar_version', $data);
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
    public function gestion_modulo()
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) //hacer la prueba:$this->session->userdata('ingresado')
            {
                $version = $this->session->userdata('idVersion');

                $data = array(
                    'nombre' => $this->session->userdata('nombreV'),
                    'modulo' => $this->modulo_model->getModulo($version),
                    'paralelo' => $this->paralelo_model->getParalelo($version)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador', $data);

                $data['tipo'] = $this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario', $data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador', $data);
                        break;

                    default:
                        redirect('autenticacion');
                        break;
                }
                $this->load->view('v_modulo/gestion_modulo', $data);
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
    public function gestion_inscripcion()
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) //hacer la prueba:$this->session->userdata('ingresado')
            {
                $version = $this->session->userdata('idVersion');

                $data = array(
                    'nombre' => $this->session->userdata('nombreV'),
                    'modulo' => $this->modulo_model->getModulo($version),
                    'paralelo' => $this->paralelo_model->getParalelo($version),
                    'profesion' => $this->profesion_model->getProfesion(),
                    'diplomante' => $this->diplomante_model->getDiplomante("nada"),
                    'dnoinscrito' => $this->diplomante_model->getDiplomante(),
                    'version' => $this->version_model->getIdVersion($version)

                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador', $data);

                $data1['tipo'] = $this->session->userdata('tipo');
                switch ($data1['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario', $data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador', $data);
                        break;

                    default:
                        redirect('autenticacion');
                        break;
                }
                $this->load->view('v_inscripcion/inscripcion', $data);
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
}

/* End of file Controllername.php */
