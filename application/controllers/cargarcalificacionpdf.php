<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargarcalificacionpdf extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();

        //si es que no se cargo en autoload cargar aqui en helper url
        $this->load->model('version_model');
        $this->load->model('modulo_model');
        $this->load->model('diplomante_model');
        $this->load->model('inscripcion_model');
        $this->load->model('modulodiplomante_model');
        $this->load->model('paralelo_model');
        $this->load->model('calificacion_model');
        $this->load->model('defensa_model');
        $this->load->model('mupload');
    }
    public function index()
    {
        
    }
    public function subirNotas()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado'))
            {
                // $fileNotas=$this->input->post('filenotas');
                $modulosele=$this->input->post('numMod');
                $paralelosele=$this->input->post('nomParalelo');
                

                $config['upload_path']          = './uploads/archivos/';
                $config['allowed_types'] = 'pdf|xlsx|docx';
                $config['max_size'] =       '50048';
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['remove_spaces']=TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('filenotas'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        // AQUI PASAR EL ERROR POR UN DATA O CUANDO O ALGO ASI O DESDE EL CONTROLADOR QUE MUESTRA LA VISTA QUE BUSQUE SI TIENE ALGO SINO ERROS
                        redirect('calificacion/calificacion_paralelo/?modulo='.$modulosele.'&paralelo='.$paralelosele,'refresh');
                }
                else
                {
                    //Datos del fichero subido
                    $data = $this->upload->data();
                    // post
                    // $titulo=$this->input->post('titArchivo');
                    $titulo='calificaciones'.$modulosele.$paralelosele;
                    $idparalelo=$this->input->post('idparalelo');
                    $archivo = $data['file_name'];
                    $subir = $this->mupload->subir($titulo,$archivo,$idparalelo);      
                    // $data['estado'] = "Archivo subido.";
                    // $data['archivo'] = $archivo;
         
                    // quiza aqui tendriamos que ir al modulo_model y editar su estado a 0 o apagarlo pero.. tb tendriams q volverlo a abrir cuand se elimine el pdf asi q mejor el caso de habilitar el mod lo dejams al coordinador nmas
                    //Cargamos la vista y le pasamos los datos
                    // BUSCAR PORPIEDADES DEL REDIRECT POR SI SE PUEDE ENVIA UN MENSAJE QUE INDIQ Q SE HA ANADIDO O NO PDF
                    redirect('calificacion/calificacion_paralelo/?modulo='.$modulosele.'&paralelo='.$paralelosele,'refresh');
                }
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
    public function downloadpdf($name)
    {
        $data=file_get_contents('./uploads/archivos/'.$name);
        force_download($name,$data);
    }
    public function eliminar_download($pdf=null)
    {
        if ($this->input->post()) {
            $idarchivo=$this->input->post('pdf');
        } else {
            $idarchivo=urldecode($pdf);
        }
        $archivo=$this->mupload->getpdf_porid($idarchivo);
        if (!empty($archivo)) 
        {
            // $valor=$archivo[0]['idArchivo'];
            $afecterows=$this->mupload->eliminar_archivopdf($archivo[0]['idArchivo']);
            if ($afecterows>0) {
                $ruta=$archivo[0]['ruta'];
                $do = unlink('./uploads/archivos/'.$ruta);
                if($do != true){
                    echo "nosepuedeeliminarpdf";
                 }else {
                    echo "siseeliminopdf";
                 }
            } else {
                echo "noeliminadeBD";
            }
            
            
        } else {
            echo "nohayarchivo";
        }
        
        
    }
    
}