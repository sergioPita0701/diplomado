<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academicoprofesion extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('version_model');
        $this->load->model('academico_model');
        $this->load->model('diplomante_model');
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
        $this->load->model('profesion_model');
        $this->load->model('especialidad_model');
        $this->load->model('academicoprofesional_model');
    }
    
    public function index()
    {
        
        
    }
    
    public function obtenerProfesiones($textoCi = null, $textoNombre = null, $textoProf = null, $textoGrad = null)// se usa en pie para obt. prof.
    {
        if ($textoCi == null) 
        {
            $busCi=$this->input->post('txtci');
            $busNom=$this->input->post('txtBuscar');
            $busProf=$this->input->post('txtBuscar');
            $busGrado=$this->input->post('txtBuscar');
        }
        else 
        {
            $busCi=urldecode($textoCi);
            $busNom=urldecode($textoNombre);
            $busProf=urldecode($textoProf);
            $busGrado=urldecode($textoGrad);
  
        }
        $profesiones=$this->academicoprofesional_model->getAcademicoProfesional($busCi,$busNom,$busProf,$busProf,$busGrado);
        echo json_encode($profesiones) ;
        
    }

    public function getAcademicoProfesional($textoCi = null, $textoNombre = null, $textoProf = null, $textoGrad = null)//se usa buscador de lista acad.
    {
        $data['tipo']=$this->session->userdata('tipo');
        
        switch ($data['tipo']) {
            case 'Secretario':
                $version=$this->session->userdata('idVersion');
            
                if ($version!=null)
                {
                }
                else 
                {
                    echo '<script> alert("la version fue cerrada!")</script>';
                    redirect('version/ingresarv','refresh');
                }
                break;
            case 'Coordinador':
                $version=$this->session->userdata('idVersion');
            
                if ($version!=null)
                {
                    if ($textoCi == null) 
                    {
                        $busCi=$this->input->post('txtBuscar');
                        $busNom=$this->input->post('txtBuscar');
                        $busProf=$this->input->post('txtBuscar');
                        $busGrado=$this->input->post('txtBuscar');
                    }
                    else 
                    {
                        $busCi=urldecode($textoCi);
                        $busNom=urldecode($textoNombre);
                        $busProf=urldecode($textoProf);
                        $busGrado=urldecode($textoGrad);
              
                    }
                    // $busGrado=urldecode($textoGrad); hacer el buscador con filtroo
                    // echo $busGrado;
                    // echo json_encode($busGrado);
            
                    $data=array(
                        'nombre'=>$this->session->userdata('nombreV'),
                        'modulo'=>$this->modulo_model->getModulo($version),
                        'paralelo'=>$this->paralelo_model->getParalelo($version),
                        'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional($busCi,$busNom,$busProf,$busGrado)
            
                    );
                    $this->load->view('plantillas/encabezado');
                    $this->load->view('plantillas/navegador',$data);
                    $this->load->view('plantillas/menu_coordinador',$data);
                    $this->load->view('v_academico/lista_academico',$data);
                }
                else 
                {
                    echo '<script> alert("la version fue cerrada!")</script>';
                    redirect('version/ingresarv','refresh');
                }
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }

        $this->load->view('plantillas/pie');

    }

    public function crearAcademicoProfesion()//se usa en det. acad
    {
        $ciA=$this->input->post('txtCiA');
        $profesion=$this->input->post('ProfecionA');

        $numero=$this->academicoprofesional_model->buscarAcademicoProfesion($ciA,$profesion);
        if ($numero>0) 
        {
            redirect('academico/detalleAcademico/'.$ciA.'/2');
        } 
        else 
        {
            $this->academicoprofesional_model->crearAcademico_tiene_profesion($ciA,$profesion);
            $filasAfectadas=$this->db->affected_rows();
    
            if($filasAfectadas>0)
            {
                redirect('academico/detalleAcademico/'.$ciA.'/1');
            }
            else
            {
                redirect('academico/detalleAcademico/'.$ciA.'/2');
            }
        }
        
        

    }

    public function editarProfesionA()
    {
        // $ciA=$this->input->post('txtci');
        // $profesion=$this->input->post('txtprofesion');
        
        // $this->especialidad_model->editarProfesionAcad($ciA,$profesion);
        // $filasAfectadas=$this->db->affected_rows();

		// if($filasAfectadas>0)
		// {
		// 	redirect('academicoprofesion/registroAP/5');
		// }
		// else
		// {
		// 	redirect('academicoprofesion/registroAP/6');
		// }
    }

    public function eliminarProfesionAcad()// se usa en det. acad.
    {
        $ciA=$this->input->post('txtci');
        $profesion=$this->input->post('profesionA');
        // echo json_encode($ciA);
        // echo json_encode($profesion) ;
        $this->academicoprofesional_model->eliminarProfesionAcademico($ciA,$profesion);
        $filasAfectadas=$this->db->affected_rows();

		if($filasAfectadas>0)
        {
            // $this->detalleAcademico($ciA);
            redirect('academico/detalleAcademico/'.$ciA.'/7');
        }
        else
        {
            // $this->detalleAcademico($ciA);
            redirect('academico/detalleAcademico/'.$ciA.'/8');
        }
    }

}