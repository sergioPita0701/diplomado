<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calificacion extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // CARGAR LA LIBRERIA PARA IMPRIMIR
        $this->load->library('pdf_report');
        
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

    public function calificacion_paralelo($modulosele=null,$paralelosele=null)//registroParalelo
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado'))
            {
                $version=$this->session->userdata('idVersion');
    
                if ($this->input->get()) {
                    $modulosele=$this->input->get('modulo');
                    $paralelo=$this->input->get('paralelo');
                    $nombre=null;
                    $numInsc=null;
                    $cidiplo=null;
                } else {
                    $modulosele=urldecode($modulosele);
                    $paralelo=urldecode($paralelosele);
                    $nombre=null;
                    $numInsc=null;
                    $cidiplo=null;
                }
                // $estadoDoc="Activo";
                $calif=$this->calificacion_model->getCalificacion($version,$modulosele,$paralelo);
                $pdfcalif=$this->mupload->getpdf($version,$modulosele,$paralelo);
                
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'moduloseleccionado'=>$modulosele,
                    'paraleloseleccionado'=>$paralelo,
                    'calificacion'=>$this->calificacion_model->getCalificacion($version,$modulosele,$paralelo),
                    // 'diplomanteprogramados'=>$this->calificacion_model->getProgramacion($version,$paralelo,$numInsc=null,$cidiplo=null,$diplomante=null,$profesional=null)
                    'asigmodulo'=>$this->modulodiplomante_model->getAsignacion_modulo($version,$modulosele),
                    'paralelomenosuno'=>$this->paralelo_model->getParalelo_menos_elIndicado($version,$modulosele,$paralelo),
                    'asignaciones'=>$this->modulodiplomante_model->getAsignacion_paralelo($version,$modulosele,$paralelo,$nombre,$numInsc,$cidiplo),
                    'pdfcalificaciones'=>$pdfcalif
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
                // $modulo->result()[0]->idModulo;
                if (!empty($calif) && $calif[0]['vigenteMo']==1 && empty($pdfcalif)) 
                {
                    $data['tipo']=$this->session->userdata('tipo');
                    switch ($data['tipo']) {
                        case 'Secretario':
                            $this->load->view('plantillas/menu_secretario',$data);
                            $this->load->view('v_calificacion/lista_calificaciones',$data);
                            break;
                        case 'Coordinador':
                            $this->load->view('plantillas/menu_coordinador',$data);
                            $this->load->view('v_calificacion/lista_asig_docencia',$data);
                            break;
                        case 'Administrador':
                            $this->load->view('plantillas/menu_administrador',$data);
                            // SI SE QUIERE DAR PERMISOS AL DIRECTOR TB PARA MODIFICAR LAS NOTAS ES EST FORM DE ABAJO
                            // $this->load->view('v_calificacion/lista_asig_docencia',$data);
                            $this->load->view('v_calificacion/lista_calificaciones',$data);
                            break;
                        default:
                        echo '<script> alert("El Usuario no inicio Sesion")</script>';    
                        redirect('autenticacion','refresh');
                        break;
                    }
                    
                } 
                else {
                    $data['tipo']=$this->session->userdata('tipo');
                    switch ($data['tipo']) {
                        case 'Secretario':
                            $this->load->view('plantillas/menu_secretario',$data);
                            $this->load->view('v_calificacion/lista_calificaciones',$data);
                            break;
                        case 'Coordinador':
                            $this->load->view('plantillas/menu_coordinador',$data);
                            // $this->load->view('v_calificacion/lista_asig_docencia',$data);
                            $this->load->view('v_calificacion/lista_calificaciones',$data);
                            break;
                        case 'Administrador':
                            $this->load->view('plantillas/menu_administrador',$data);
                            $this->load->view('v_calificacion/lista_calificaciones',$data);
                            break;
                        default:
                        echo '<script> alert("El Usuario no inicio Sesion")</script>';    
                        redirect('autenticacion','refresh');
                        break;
                    }
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

    public function registrar_nota()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado'))
            {
                $version=$this->session->userdata('idVersion');

                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                        // $this->load->view('plantillas/menu_secretario',$data);
                        break;
                    case 'Coordinador':
                    case 'Administrador':
                        $ciDiplomante=$this->input->post('ciDiplo');
                        $nota=$this->input->post('nota');
                        $numModulo=$this->input->post('numeromodulo');
                        $nombreParalelo=$this->input->post('nombreparalelo');
                        $fechanota=$this->input->post('fechanota');
                        $establecenota='';
                        switch ($nota) {
                            case 0:
                            $establecenota = "Reprobado";
                            break;
                          case ($nota>= 0  && $nota<=64):
                            $establecenota = "Reprobado";
                            break;
                          case ($nota>=65 && $nota<=70):
                            $establecenota = "Aprobado";
                            break;
                          case ($nota>=71 && $nota<=80):
                            $establecenota = "Bueno";
                            break;
                          case ($nota>=81 && $nota<=90):
                            $establecenota = "Muy Bueno";
                            break;
                          case ($nota>=91 && $nota<=100):
                            $establecenota = "Excelente";
                            break;
                          default:
                            $establecenota = "rango no establecido";
                            break;
                        }
                    
                        $this->calificacion_model->registrar_nota($version,$ciDiplomante,$numModulo,$nombreParalelo,$nota,$establecenota,$fechanota);

                        $filasAfectadas=$this->db->affected_rows();
                        if($filasAfectadas>0)
                        {
                            echo "sinota";
                        }
                        else
                        {
                            echo "nonota";
                        }
                        break;
                    default:
                        redirect('autenticacion');
                    break;
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
    public function kardex()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado'))
            {
                $version=$this->session->userdata('idVersion');
    
                $ciP=$this->input->post('ciDiplomante');
                // $nombreD=$this->input->post('paralelo');

                $moduloDiplomante=$this->modulodiplomante_model->getModuloDiplomante($version,null,$ciP);
                echo json_encode($moduloDiplomante);
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
    public function kardexMonografia()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado'))
            {
                $version=$this->session->userdata('idVersion');
    
                $ciP=$this->input->post('ciDiplomante');
                // $nombreD=$this->input->post('paralelo');

                $defensa=$this->defensa_model->getDefensa_resutado_sin_nombreDef($version,$ciP);
                echo json_encode($defensa);
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

    public function subir()//mejor manejarlo por el pie
    {
        $config['upload_path']='./uploads/archivos/.';
        $config['allowed_types']='pdf|xlsx|docx';

        $this->load->library('upload',$config);
        if (!$this->upload->do_upload()) {
            $error=array('error'=>$this->upload->display_errors());
             
        } else {
            $datos["pdf"]=$this->upload->data();
            echo json_encode($datos);
        }
        
    }

    // ================IMPRIMIR CALIFICACIONES POR PARALELO================
    public function imprimir_calificacion_paralelo($modulosele=null,$paralelosele=null)//registroParalelo
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado'))
            {
                $version=$this->session->userdata('idVersion');
    
                if ($this->input->get()) {
                    $modulosele=$this->input->get('modulo');
                    $paralelo=$this->input->get('paralelo');
                    $nombre=null;
                    $numInsc=null;
                    $cidiplo=null;
                } else {
                    $modulosele=urldecode($modulosele);
                    $paralelo=urldecode($paralelosele);
                    $nombre=null;
                    $numInsc=null;
                    $cidiplo=null;
                }
                // $estadoDoc="Activo";
                $calif=$this->calificacion_model->getCalificacion($version,$modulosele,$paralelo);
                $pdfcalif=$this->mupload->getpdf($version,$modulosele,$paralelo);
                
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'moduloseleccionado'=>$modulosele,
                    'paraleloseleccionado'=>$paralelo,
                    'calificacion'=>$this->calificacion_model->getCalificacion($version,$modulosele,$paralelo),
                    // 'diplomanteprogramados'=>$this->calificacion_model->getProgramacion($version,$paralelo,$numInsc=null,$cidiplo=null,$diplomante=null,$profesional=null)
                    'asigmodulo'=>$this->modulodiplomante_model->getAsignacion_modulo($version,$modulosele),
                    'paralelomenosuno'=>$this->paralelo_model->getParalelo_menos_elIndicado($version,$modulosele,$paralelo),
                    'asignaciones'=>$this->modulodiplomante_model->getAsignacion_paralelo($version,$modulosele,$paralelo,$nombre,$numInsc,$cidiplo),
                    'pdfcalificaciones'=>$pdfcalif
                );
                $this->load->view('v_imprimirpdf/calificaciones_porparalelo_pdf',$data);
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
    // ------------------------------------ESTADISTICAS DE CALIFICACIONES PARA GRAFICAS---------------------
    public function getProbabilidad_calificaciones()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado'))
            {
                $version=$this->session->userdata('idVersion');
                for ($m=1; $m <=7 ; $m++) { 
                    
                    $listmod=$this->calificacion_model->getCalificacion_porModulo($version,$m,null);
                    
                    if (!empty($listmod)) 
                    {
                        $aprobados=0;
                        $reprobados=0;
                        for ($i=0; $i <= count($listmod)-1; $i++) 
                        {  
                            $nota=$listmod[$i]['establece_nota'];
                            if ($nota=="Reprobado" || $nota==NULL) {
                                $reprobados=$reprobados+1;
                            } else {
                                $aprobados=$aprobados+1;
                            }
                        }
                        $apro_porciento[]=round(($aprobados*100)/count($listmod));
                        $repro_porciento[]=round(($reprobados*100)/count($listmod));
                    }else {
                        $apro_porciento[]=0;
                        $repro_porciento[]=0;
                    }
                     $mod[]=$m;
                     $mod_perc= array('modulo' =>$mod ,'aprobados' =>$apro_porciento ,'reprobados' =>$repro_porciento );
                    // $mod_perc= [$mod,$apro_porciento,$repro_porciento];
                }
                echo json_encode($mod_perc) ;
                // echo json_encode([$archivo,$valor,$vobj]) ;
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