<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulodiplomante extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('version_model');
        $this->load->model('modulo_model');
        $this->load->model('diplomante_model');
        $this->load->model('inscripcion_model');
        $this->load->model('modulodiplomante_model');
        $this->load->model('paralelo_model');
        $this->load->model('calificacion_model');
        $this->load->model('mupload');
    }
    public function index()
    {  
    }

    public function incripcion_diplomate_modulo()//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                
                if ($this->input->get()) 
                {
                    $numInscripcion=$this->input->get('inscripcion') ;
                    $ciDiplomante=$this->input->get('ciD') ;
                } 
                else 
                {
                    $numInscripcion=null ;
                    $ciDiplomante="nada" ;
                }
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'diplomanteinscrito'=>$this->inscripcion_model->buscar_inscripcion($version,$ciDiplomante,$numInscripcion),
                    'inscripcion'=>$this->inscripcion_model->getregistroInsripciones($version)
                    // 'nombreM'=>'Diplomantes con Modulo Asignado',
                    
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);

                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario',$data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador',$data);
                        break;
                    default:
                        redirect('autenticacion');
                    break;
                }
                $this->load->view('v_modulo/inscripcion_diplom_modulo',$data);
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

    public function asignarModuloaDiplo()//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                        
                    case 'Coordinador':
                        $version=$this->session->userdata('idVersion');

                        $numInsc=$this->input->post('numInscripcion') ;
                        $cidiplo=$this->input->post('ciDiplomante') ;
                        $modulosele=$this->input->post('modulosele');
                        $paralelosele=$this->input->post('paralelosele');
                        $fechaAsignacion=$this->input->post('fechaAsignacion');
                        // echo json_encode($fechaAsignacion);

                        $yaexiste=$this->modulodiplomante_model->buscar_siExiste($version,$modulosele,$numInsc,$cidiplo);

                        if ($yaexiste==0) 
                        {
                            // echo $yaexiste;
                            $this->modulodiplomante_model->asignar_modulo_diplomante($version,$modulosele,$numInsc,$cidiplo,$paralelosele,$fechaAsignacion);
                            $filasAfectadas=$this->db->affected_rows();
                            if ($filasAfectadas>0) 
                            {
                                echo "insertado";
                            } 
                            else {
                                echo "noinsert";
                            }
                        } 
                        else {
                            echo "noinsert";

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

    public function editarParaleloDiplomante()//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                        
                    case 'Coordinador':
                        $version=$this->session->userdata('idVersion');

                        $checked=$this->input->post('checked') ;
                        $numInsc=$this->input->post('numInscripcion') ;
                        $cidiplo=$this->input->post('ciDiplomante') ;
                        $modulosele=$this->input->post('modulosele');
                        $paralelosele=$this->input->post('paralelosele');
                        $fechaAsignacion=$this->input->post('fechaAsignacion');
                        //POR SI HAY ALGUN ERROR PUEDE SER AFECTADOS POR LOS STRIGGUERS QIE SE APLICAN SOBRE LAS TABLAS
                        if ($checked=='1') {
                            // echo json_encode($checked.',insc='.$numInsc.',ci='.$cidiplo.',mod='.$modulosele.',par='.$paralelosele.',fech='.$fechaAsignacion);
                            $this->modulodiplomante_model->editar_modulo_diplomante($version,$modulosele,$paralelosele,$numInsc,$cidiplo,$fechaAsignacion);
                            $filasAfectadas=$this->db->affected_rows();
                            if ($filasAfectadas>0) 
                            {
                                echo "editado";
                            } 
                            else {
                                echo "noeditadoss";
                            }
                        } else {
                            echo "noeditado";
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
    public function eliminarModuloDiplomante()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                case 'Coordinador':
                    
                    $asignacion=$this->input->get('asignacion');
                    $inscripcion=$this->input->get('inscripcion');
                    $modulo=$this->input->get('modulo');
                    $paralelo=$this->input->get('paralelo');

                    $this->modulodiplomante_model->eliminar_modulo_diplomante($asignacion,$inscripcion);
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
                        redirect('modulodiplomante/registro_asignaciones/'.$modulo.'/'.$paralelo.'/1');
                    }
                    else
                    {
                        // echo "$modulo";
                        redirect('modulodiplomante/registro_asignaciones/'.$modulo.'/'.$paralelo.'/2');
                    }
                    
                    break;
                default:
                    echo '<script> alert("la version fue cerrada!")</script>';
                    redirect('autenticacion','refresh');
                break;
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }

    // HACEEEER AUMENTAR IF COPIARD DE ARRIBA O D INSCRIPCIOES, VERSION Y  LOQUEO
    public function registroModuloDiplomante($modulo=null)//no se usa_ revisar
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                $this->load->view('plantillas/encabezado');
        
                if ($modulo==null) 
                {
                    
                    $data=array(
                        'nombre'=>$this->session->userdata('nombreV'),
                        'modulo'=>$this->modulo_model->getModulo($version),
                        'paralelo'=>$this->paralelo_model->getParalelo($version),
                        'modulodiplomante'=>$this->modulodiplomante_model->getModuloDiplomante($version),
                        'nombreM'=>'Diplomantes con Modulo Asignado'
                    );
                    $this->load->view('plantillas/navegador_version',$data);

                    $data['tipo']=$this->session->userdata('tipo');
                    switch ($data['tipo']) 
                    {
                        case 'Secretario':
                            $this->load->view('plantillas/menu_secretario',$data);
                            break;
                        case 'Coordinador':
                            $this->load->view('plantillas/menu_coordinador',$data);
                            break;
                        default:
                            redirect('autenticacion');
                        break;
                    }
    
                    $this->load->view('registroModuloDiplomante',$data);
                            
                } 
                else 
                {
                    $mod=urldecode($modulo);
                    
                    $data=array(
                        'nombre'=>$this->session->userdata('nombreV'),
                        'modulo'=>$this->modulo_model->getModulo($version),
                        'modulodiplomante'=>$this->modulodiplomante_model->getModuloDiplomante($version,$mod),
                        'nombreM'=>$mod
                    );
                    
                    $this->load->view('plantillas/navegador_version',$data);

                    $data['tipo']=$this->session->userdata('tipo');
                    switch ($data['tipo']) 
                    {
                        case 'Secretario':
                            $this->load->view('plantillas/menu_secretario',$data);
                            break;
                        case 'Coordinador':
                            $this->load->view('plantillas/menu_coordinador',$data);
                            break;
                        default:
                            redirect('autenticacion');
                        break;
                    }
                    $this->load->view('registroModuloDiplomante',$data);
                            
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

    public function registro_asignaciones($modulosele=null,$paralelo=null,$indice=null)
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
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
                    $paralelo=urldecode($paralelo);
                    $nombre=null;
                    $numInsc=null;
                    $cidiplo=null;
                }

                // $calif=$this->calificacion_model->tienenota_pormodparalelo($version,$modulosele,$paralelo);
                $calif=$this->calificacion_model->getCalificacion($version,$modulosele,$paralelo);
                $pdfcalif=$this->mupload->getpdf($version,$modulosele,$paralelo);

                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'moduloseleccionado'=>$modulosele,
                    'paraleloseleccionado'=>$paralelo,
                    'getparalelos'=>$this->paralelo_model->buscarParalelo($version,$modulosele,null),
                    'paralelomenosuno'=>$this->paralelo_model->getParalelo_menos_elIndicado($version,$modulosele,$paralelo),
                    'calificacion'=>$this->calificacion_model->getCalificacion($version,$modulosele,$paralelo),
                    'asigmodulo'=>$this->modulodiplomante_model->getAsignacion_modulo($version,$modulosele),
                    'asignaciones'=>$this->modulodiplomante_model->getAsignacion_paralelo($version,$modulosele,$paralelo,$nombre,$numInsc,$cidiplo)
                    // 'diplomanteprogramados'=>$this->programacion_model->getProgramacion($version,$paralelo,$numInsc=null,$cidiplo=null,$diplomante=null,$profesional=null)
                    
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
                if($indice==1)
                {
                    $data['msg']="Se Elimino Participante del Paralelo";
                    $this->load->view('plantillas/msg_success',$data);

                }else if($indice==2)
                {
                    $data['msg']="Al Diplomante ya se le asigno una CALIFICACION!! Asi que NO es posible Eliminarlo del Paralelo!!";
                    $this->load->view('plantillas/msg_error',$data);
                }
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario',$data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador',$data);
                        break;
                    default:
                        redirect('autenticacion');
                    break;
                }
                if (!empty($calif) && $calif[0]['vigenteMo']==1 && empty($pdfcalif)) //!empty($calif) && $calif[0]['vigenteMo']==1 && empty($pdfcalif)
                {
                    // $this->load->view('v_calificacion/lista_calificaciones',$data);
                    $this->load->view('v_asignacion_modu_diplomante/registro_asignaciones',$data);
                } 
                else {
                    // $this->load->view('v_asignacion_modu_diplomante/registro_asignaciones',$data);
                    $this->load->view('v_calificacion/lista_calificaciones',$data);
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
    public function registro_todas_asignaciones($modulosele=null)
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                
                if ($this->input->get()) {
                    $modulosele=$this->input->get('modulo');
                    $paralelo=null;
                    $nombre=null;
                    $numInsc=null;
                    $cidiplo=null;
                } else {
                    $modulosele=urldecode($modulosele);
                    $paralelo=null;
                    $nombre=null;
                    $numInsc=null;
                    $cidiplo=null;
                }
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'getparalelos'=>$this->paralelo_model->buscarParalelo($version,$modulosele,null),
                    'paralelomenosuno'=>$this->paralelo_model->getParalelo_menos_elIndicado($version,$modulosele,$paralelo),
                    // 'diplomanteinscrito'=>$this->inscripcion_model->buscar_inscripcion($version,$ciDiplomante,$numInscripcion),
                    // 'inscripcion'=>$this->inscripcion_model->getregistroInsripciones($version)
                    'asigmodulo'=>$this->modulodiplomante_model->getAsignacion_modulo($version,$modulosele),
                    // 'asignaciones'=>$this->modulodiplomante_model->getAsignacion_paralelo($version,$modulosele,$paralelo,$nombre,$numInsc,$cidiplo)
                    // 'diplomanteprogramados'=>$this->programacion_model->getProgramacion($version,$paralelo,$numInsc=null,$cidiplo=null,$diplomante=null,$profesional=null)
                    
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);

                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario',$data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador',$data);
                        break;
                    default:
                        redirect('autenticacion');
                    break;
                }
                $this->load->view('v_asignacion_modu_diplomante/lista_todas_asignaciones',$data);
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