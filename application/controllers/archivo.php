<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academicoespecialidad extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('version_model');
        $this->load->model('academico_model');
        $this->load->model('diplomante_model');
        $this->load->model('modulo_model');
        $this->load->model('profesion_model');
        $this->load->model('especialidad_model');
        $this->load->model('academicoespecialidad_model');
    }
    
    public function index()
    {
        
        
    }

    public function crearAcademicoEspecialidad()//se usa en det. acad.
    {
        $ciA=$this->input->post('txtCiA');
        $profesion=$this->input->post('selectProfA');
        // echo $ciA;
        // echo $profesion;

        // $contador=0;
        // $nombre=" ";
        if ($_POST['checkbox'] != null) 
        {   
            if (is_array($_POST['checkbox'])) 
            {   
                while (list($key,$value)= each($_POST['checkbox'])) 
                {
                    
                    $esp=$this->academicoespecialidad_model->crearTieneAPr_especialidad($ciA,$value,$profesion);
                }
                if($esp==true)
                {
                    redirect('academico/detalleAcademico/'.$ciA.'/3');
                    
                }
                else
                {
                    redirect('academico/detalleAcademico/'.$ciA.'/4');
                    
                }

            }
        } 
        else 
        {
            redirect('academico/detalleAcademico/'.$ciA.'/4');
        }

    }

}