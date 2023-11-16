<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('version_model');
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
    }
    public function index()
	{
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');

                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'version'=>$this->version_model->mostrar_versiones_habilitados()
                );
                
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
                
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario',$data);
                        $this->load->view('usuarios/secre_principal',$data);
                        break;
                
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('usuarios/coordinador_principal',$data);
                        break;
                
                    case 'administrador':
                
                        $this->load->view('usuarios/sistemas_principal');
                         break;
                
                     default:
                        echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                        redirect('autenticacion','refresh');
                        break;
                }
                $this->load->view('plantillas/pie');
            }
            else 
            {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv','refresh');
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
	}

}