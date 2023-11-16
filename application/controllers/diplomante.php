<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diplomante extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('diplomante_model');
        $this->load->model('inscripcion_model');
        $this->load->model('version_model');
        $this->load->model('modulo_model');
        $this->load->model('modulodiplomante_model');
        $this->load->model('profesion_model');
        $this->load->model('paralelo_model');
        $this->load->model('monografia_model');
        $this->load->model('defensa_model');
    }
    
    public function index()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado'))
            {
                if ($this->input->post()) {
                    $ci=$this->input->post('txtbuscar');
                } else {
                    $ci=null;
                }
                
                $version=$this->session->userdata('idVersion');
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    // 'diplomante'=>$this->diplomante_model->getDiplomante(),
                    'numinscritos'=>$this->inscripcion_model->numeroInscritos($version),
                    'diplomante'=>$this->inscripcion_model->buscar_inscripcion($version,$ci,null,null,null,null,null,null)
                    // 'numeroInscritos'=>$this->inscripcion_model->numeroInscritos($version)
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
                        echo '<script> alert("El Usuario no inicio Sesion")</script>';
                        redirect('autenticacion','refresh');
                    break;
                }
                $this->load->view('v_diplomante/lista_todosDiplomantes',$data);
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

    public function crearDiplomante()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) 
            {
                case 'Secretario':
                case 'Coordinador':

                    $ciD=$this->input->post('txtci');
                    $nombD=$this->input->post('txtNombreD');
                    $apePaternoD=$this->input->post('txtApellidoPaternoD');
                    $apeMaternoD=$this->input->post('txtApellidoMaternoD');
                    $ciudD=$this->input->post('txtCiudadD');
                    $profD=$this->input->post('txtProfesionD');
                
                    $this->diplomante_model->registrarDiplomante($ciD,$nombD,$apePaternoD,$apeMaternoD,$ciudD,$profD);
                    $filasAfectadas=$this->db->affected_rows();
                
                    if($filasAfectadas>0)
                    {
                        $diplom=$this->diplomante_model->getDiplomante($ciD);
                        echo json_encode($diplom);
                    }
                    else
                    {
                        echo false;
                    }
                    break;
                default:
                    redirect('autenticacion');
                break;
            }
            
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }

    public function editarDiplomante()
    {
        
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) 
            {
                case 'Secretario':
                case 'Coordinador':
                    $ci=$this->input->post('textoCiDi');
                    $nomb=$this->input->post('textoNombreDi');
                    $apePaterno=$this->input->post('textoApePaternoDi');
                    $apeMaterno=$this->input->post('textoApeMaternoDi');
                    $ciud=$this->input->post('textociudadDi');
                
                    $prof=$this->input->post('profesionDi');
                
                    $this->diplomante_model->editarDiplomante($ci,$nomb,$apePaterno,$apeMaterno,$ciud,$prof);
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
                        $diplom=$this->diplomante_model->getDiplomante($ci);
                        echo json_encode($diplom);
                    }
                    else
                    {
                        echo false;
                    }
                    break;
                default:
                    redirect('autenticacion');
                break;
            }
            
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
        
    }

    public function buscarDiplomante()
    {   
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) 
            {
                case 'Secretario':
                case 'Coordinador':
                    $ci=$this->input->post('txtci');
                    $diplomante=$this->diplomante_model->getDiplomante($ci);
                    echo json_encode($diplomante);
                    break;
                default:
                    redirect('autenticacion');
                break;
            }
            
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
        
    }

    public function detalleDiplomante_completo($ciP,$indice=null)
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                    $ciP=urldecode($ciP);
                    $data=array(
                        'nombre'=>$this->session->userdata('nombreV'),
                        'modulo'=>$this->modulo_model->getModulo($version),
                        'paralelo'=>$this->paralelo_model->getParalelo($version),
                        'profesion'=>$this->profesion_model->getProfesion(),
                        // 'version'=>$this->version_model->getVersiones(),
                        'diplomante'=>$this->diplomante_model->getDiplomante($ciP),
                        'diplomanteinscrito'=>$this->inscripcion_model->getregistroInsripciones($version,$ciP),
                        // 'moduloDiplomante'=>$this->modulodiplomante_model->getModuloDiplomante($version,null,$ciP),
                        'moduloDiplomante'=>$this->modulodiplomante_model->getModuloDiplomante(null,null,$ciP),
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
                    case 'Administrador':
                        $this->load->view('plantillas/menu_administrador',$data);
                        break;
                    default:
                        redirect('autenticacion');
                    break;
                }
                if($indice==1)
                {
                
                    $data['msg']="Se registro Inscripcion de siguiente Diplomante a la Version Actual.";
                    $this->load->view('plantillas/msg_success',$data);
                
                }else if($indice==2)
                {
                    $data['msg']="No es posible registrar Inscripcion.El diplomante ya esta Registrado";
                    $this->load->view('plantillas/msg_error',$data);
                }else if($indice==3)
                {
                    $data['msg']="Se Elimino registro de Inscripcion.";
                    $this->load->view('plantillas/msg_success',$data);
                
                }else if($indice==4)
                {
                    $data['msg']="No es posible Eliminar Inscripcion.";
                    $this->load->view('plantillas/msg_error',$data);
                }
                $this->load->view('v_diplomante/detalle_diplomante',$data);
                
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
    public function inscribirModulo()
    {
        // $ciDiplomante=$this->input->post('txtci');
        // $asignar=$this->modulodiplomante_model->get_asignacion_porci($ciDiplomante);
        // if (empty($asignar)) {
        //     echo 0;//hacer esta opcion cuando es nuevo
        // } 
        // else {
        //     $version=$this->session->userdata('idVersion');
        //     $modulos=$this->modulo_model->obtenerModulo($version);
        //     $ultimo=end($asignar);
        //     // echo "su ultimo amd es =".json_encode($ultimo)  ;
        //     $tienemono=$this->monografia_model->buscar_monografia($version,null,$ciDiplomante);
        //     if (empty($tienemono)) 
        //     {
        //         // echo json_encode($tienemono) ;
        //         if ($ultimo['numeroM']==7 && $ultimo['nota']>=65) {
        //             echo "aprobomodulos";
        //         } 
        //         else 
        //         {
        //             if ($ultimo['nota']<65) {
        //                 // echo json_encode($ultimo) ;
        //                 $numeroM=$ultimo['numeroM'];
        //                 $nombreM=$ultimo['nombreM'];
        //                 $proximo=$this->modulo_model->buscarModulo($version,$numeroM,$nombreM);
        //                 echo json_encode($proximo) ;
        //                 // echo "reprobaod";
        //             }else {
        //                 // $version=$this->session->userdata('idVersion');
        //                 $numeroM=$ultimo['numeroM'];
        //                 $nombreM=$ultimo['nombreM'];
        //                 $proximo=$this->modulo_model->buscarNextModulo($version,$numeroM,$nombreM);
        //                 echo json_encode($proximo) ;
        //                 // echo "aprobado,numerom=".$numeroM;
        
        //             }
        //         }
        //     } else 
        //     {
        //         // $tienemono="tienemono";
        //         echo json_encode($tienemono) ;
        //     }
        // }

        // ------OTRA OPCION-----
        $ciDiplomante=$this->input->post('txtci');
        $idasigna=$this->modulodiplomante_model->saca_ultasignacion_porci($ciDiplomante);
        // echo $idasigna;
        if (empty($idasigna)) {
           echo "nohayasignamd";//hacer esta opcion cuando es nuevo
        } else {
            $asignar=$this->modulodiplomante_model->getasignacion_poid($idasigna);
            // echo json_encode($asignar);
            if (empty($asignar)) {
                echo 0;//hacer esta opcion cuando es nuevo
            } 
            else {
                $version=$this->session->userdata('idVersion');
                $modulos=$this->modulo_model->obtenerModulo($version);
                // $ultimo=$asignar;
                // echo "su ultimo amd es =".json_encode($asignar)  ;
                $tienemono=$this->monografia_model->buscar_monografia($version,null,$ciDiplomante);
                if (empty($tienemono)) 
                {
                    // echo "su ultimo amd es =".json_encode($asignar)  ;
                    if ($asignar[0]['numeroM']==7 && $asignar[0]['nota']>=65) {
                        echo "aprobomodulos";
                    } 
                    else 
                    {
                        // echo json_encode("mooooodulsss".$asignar[0]['numeroM']) ;
                        if ($asignar[0]['nota']<65) {
                            // echo json_encode($asignar) ;
                            $numeroM=$asignar[0]['numeroM'];
                            $nombreM=$asignar[0]['nombreM'];
                            $proximo=$this->modulo_model->buscarModulo($version,$numeroM,$nombreM);
                            echo json_encode($proximo) ;
                            // echo "reprobaod";
                        }else {
                            // $version=$this->session->userdata('idVersion');
                            $numeroM=$asignar[0]['numeroM'];
                            $nombreM=$asignar[0]['nombreM'];
                            $proximo=$this->modulo_model->buscarNextModulo($version,$numeroM,$nombreM);
                            echo json_encode($proximo) ;
                            // echo "aprobado,numerom=".$numeroM;
                
                        }
                    }
                } else 
                {
                    // $tienemono="tienemono";
                    echo json_encode($tienemono) ;
                }
            }
        }
    }
    public function inscribirMonografia()
    {
        $ciDiplomante=$this->input->post('txtci');
        $asignar=$this->modulodiplomante_model->get_asignacion_porci($ciDiplomante);
        if (empty($asignar)) {
            echo 0;//hacer esta opcion cuando es nuevo
        } 
        else {
            $version=$this->session->userdata('idVersion');
            $modulos=$this->modulo_model->obtenerModulo($version);
            $ultimo=end($asignar);
            // echo json_encode($ultimo) ;
            $tienemono=$this->monografia_model->buscar_monografia($version,null,$ciDiplomante);
            if (empty($tienemono)) 
            {
                echo "notienemono" ;
                
            } else 
            {
                // $tienemono="tienemono";
                echo json_encode($tienemono) ;
            }
        }
    }
    public function nextModulo()
    {
        $version=$this->session->userdata('idVersion');
        $numeroM=$this->input->post('numeroM');
        $nombreM=$this->input->post('nombreM');
        $proximo=$this->modulo_model->buscarNextModulo($version,$numeroM,$nombreM);
        echo json_encode($proximo) ;
        // echo $proximo ;
    }
    public function get_primer_modulo()
    {
        $version=$this->session->userdata('idVersion');
        $primermod=$this->modulo_model->get_primerModulo($version);
        echo json_encode($primermod) ;
    }
}