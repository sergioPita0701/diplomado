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
                    // $contador=$contador+1;
                    // $nombre=$nombre.", ".$esp;
                }
                if($esp==true)
                {
                    redirect('academico/detalleAcademico/'.$ciA.'/3');
                    
                }
                else
                {
                    redirect('academico/detalleAcademico/'.$ciA.'/4');
                    
                }
                // $filasAfectadas=$this->db->affected_rows();
                // echo $contador;
                // echo $nombre;

            }
        } 
        else 
        {
            redirect('academico/detalleAcademico/'.$ciA.'/4');
        }

    }

    // public function getAcademico_profesion_especialidad($textoCi = null, $textoNombre = null, $textoProf = null, $textoGrad = null)// no se usa la funcion en el controlador, pero su model esta bien? es un get para obtener academico con sus especialidades
    // {
    //     if ($textoCi == null) 
    //     {
    //         $busCi=$this->input->post('txtBuscar');
    //         $busNom=$this->input->post('txtBuscar');
    //         $busProf=$this->input->post('txtBuscar');
    //         $busGrado=$this->input->post('txtBuscar');
    //     }
    //     else 
    //     {
    //         $busCi=urldecode($textoCi);
    //         $busNom=urldecode($textoNombre);
    //         $busProf=urldecode($textoProf);
    //         $busGrado=urldecode($textoGrad);
  
    //     }
    //     // $busGrado=urldecode($textoGrad); hacer el buscador con filtroo
    //     // echo $busGrado;
    //     // echo json_encode($busGrado);

    //     $data=array(
    //         'nombre'=>$this->session->userdata('nombreV'),
    //         'version'=>$this->version_model->getVersiones(),
    //         'diplomante'=>$this->diplomante_model->ultDiplomante(),
    //         'modulo'=>$this->modulo_model->getModuloVersion(),
    //         'academicocompleto'=>$this->academicoespecialidad_model->get_academico_prof_especialidad($busCi,$busNom,$busProf,$busGrado)

    //     );
    //     // echo json_encode($data) ;
    //     $this->load->view('plantillas/encabezado');
    //     $this->load->view('plantillas/navegador_version',$data);

    //     $data1['tipo']=$this->session->userdata('tipo');
    //     switch ($data1['tipo']) {
    //         case 'Secretario':
    //             $this->load->view('plantillas/menu_secretario',$data);
    //             break;
    //         case 'Coordinador':
    //             $this->load->view('plantillas/menu_coordinador',$data);
    //             $this->load->view('v_academico/lista_academico',$data);
    //             break;
            
    //         default:
    //             redirect('autenticacion');
    //             break;
    //     }
    //     $this->load->view('plantillas/pie');
    // }

    public function EliminarAcademicoEspecialidad()//se usa
    {
        $ciA=$this->input->get('ciacad');
        $profesion=$this->input->get('profesion');
        $especialidad=$this->input->get('especialidad');
        // echo $ciA;
        // echo $profesion;
        // echo $especialidad;
        $this->academicoespecialidad_model->eliminarEspecialidad_de_academico($ciA,$profesion,$especialidad);
        $filasAfectadas=$this->db->affected_rows();
        

		if($filasAfectadas>0)
        {
            // $ciA=urldecode($ciA);
            redirect('academico/detalleAcademico/'.$ciA);// no se puede poner anuncio ?parece q es por q es un tag a
            // redirect('academico/detalleAcademico/'.$ciA'/9');
        }
        else
        {
            // $this->detalleAcademico($ciA);
            redirect('academico/detalleAcademico/'.$ciA);
        }

    }
    
}