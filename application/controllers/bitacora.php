<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitacora extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('version_model');
        $this->load->model('paralelo_model');
        $this->load->model('diplomante_model');
        $this->load->model('modulo_model');
        $this->load->model('profesion_model');
        $this->load->model('especialidad_model');
        $this->load->model('bitacora_model');
    }
    
    public function index()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            
            switch ($data['tipo']) {
                case 'Administrador':
                    $version=$this->session->userdata('idVersion');
                
                    if ($version!=null)
                    {
                        $data=array(
                            'nombre'=>$this->session->userdata('nombreV'),
                            'modulo'=>$this->modulo_model->getModulo($version),
                            'paralelo'=>$this->paralelo_model->getParalelo($version),
                            'bitacora_acciones'=>$this->bitacora_model->get_bitacora()
                        );
                        $this->load->view('plantillas/encabezado');
                        $this->load->view('plantillas/navegador',$data);
                        $this->load->view('plantillas/menu_administrador',$data);
                        $this->load->view('plantillas/bitacora_accion',$data);
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
                        $data=array(
                            'nombre'=>$this->session->userdata('nombreV'),
                            'modulo'=>$this->modulo_model->getModulo($version),
                            'paralelo'=>$this->paralelo_model->getParalelo($version),
                            'bitacora_acciones'=>$this->bitacora_model->get_bitacora()
                        );
                        $this->load->view('plantillas/encabezado');
                        $this->load->view('plantillas/navegador',$data);
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('plantillas/bitacora_accion',$data);
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
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
    public function getBitacora()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            
            switch ($data['tipo']) {
                case 'Administrador':
                $version=$this->session->userdata('idVersion');

                    $fecha=$this->input->post('fechabitacoracc');
                    // echo json_encode($fechabitacora) ;
                    if ($version!=null)
                    {
                        $data=array(
                            'nombre'=>$this->session->userdata('nombreV'),
                            'modulo'=>$this->modulo_model->getModulo($version),
                            'paralelo'=>$this->paralelo_model->getParalelo($version),
                            'bitacora_acciones'=>$this->bitacora_model->get_bitacora($fecha)
                        );
                        $this->load->view('plantillas/encabezado');
                        $this->load->view('plantillas/navegador',$data);
                        $this->load->view('plantillas/menu_administrador',$data);
                        $this->load->view('plantillas/bitacora_accion',$data);
                    }
                    else 
                    {
                        echo '<script> alert("la version fue cerrada!")</script>';
                        redirect('version/ingresarv','refresh');
                    }
                break;
                case 'Coordinador':
                    $version=$this->session->userdata('idVersion');

                    $fecha=$this->input->post('fechabitacoracc');
                    // echo json_encode($fechabitacora) ;
                    if ($version!=null)
                    {
                        $data=array(
                            'nombre'=>$this->session->userdata('nombreV'),
                            'modulo'=>$this->modulo_model->getModulo($version),
                            'paralelo'=>$this->paralelo_model->getParalelo($version),
                            'bitacora_acciones'=>$this->bitacora_model->get_bitacora($fecha)
                        );
                        $this->load->view('plantillas/encabezado');
                        $this->load->view('plantillas/navegador',$data);
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('plantillas/bitacora_accion',$data);
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
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
    public function getBitacora_acceso()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            
            switch ($data['tipo']) {
                case 'Administrador':
                    $version=$this->session->userdata('idVersion');
                    if ($this->input->post()) {
                        $fecha=$this->input->post('fechabitacoracc');
                        // echo json_encode($fechabitacora) ;
                    } else {
                        $fecha=null;
                    }
                    if ($version!=null)
                    {
                        $data=array(
                            'nombre'=>$this->session->userdata('nombreV'),
                            'modulo'=>$this->modulo_model->getModulo($version),
                            'paralelo'=>$this->paralelo_model->getParalelo($version),
                            'bitacora_acceso'=>$this->bitacora_model->get_bitacora_acceso($fecha)
                        );
                        $this->load->view('plantillas/encabezado');
                        $this->load->view('plantillas/navegador',$data);
                        $this->load->view('plantillas/menu_administrador',$data);
                        $this->load->view('plantillas/bitacora_acceso',$data);
                    }
                    else 
                    {
                        echo '<script> alert("la version fue cerrada!")</script>';
                        redirect('version/ingresarv','refresh');
                    }
                break;
                case 'Coordinador':
                    $version=$this->session->userdata('idVersion');

                    if ($this->input->post()) {
                        $fecha=$this->input->post('fechabitacoracc');
                        // echo json_encode($fechabitacora) ;
                    } else {
                        $fecha=null;
                    }
                    if ($version!=null)
                    {
                        $data=array(
                            'nombre'=>$this->session->userdata('nombreV'),
                            'modulo'=>$this->modulo_model->getModulo($version),
                            'paralelo'=>$this->paralelo_model->getParalelo($version),
                            'bitacora_acceso'=>$this->bitacora_model->get_bitacora_acceso($fecha)
                        );
                        $this->load->view('plantillas/encabezado');
                        $this->load->view('plantillas/navegador',$data);
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('plantillas/bitacora_acceso',$data);
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
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
    public function cierra_sesion_usuario($idAccesousuario)
    {
        
        if ($this->session->userdata('logueado')) 
        {
            
            $idv=urldecode($idAccesousuario);
            $bitacora_acceso=$this->bitacora_model->bitacora_acceso_usuario_salepor_idbitacora($idv);
            
            redirect('bitacora/getBitacora_acceso');
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
    public function getBit_actualizar_asignacioMDI()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $data['tipo']=$this->session->userdata('tipo');

                switch ($data['tipo']) {
                    case 'Administrador':
                        $version=$this->session->userdata('idVersion');
                        if ($this->input->post()) {
                            $fecha=$this->input->post('fechaupdatecalif');
                        } else {
                            $fecha=null;
                        }
                        if ($version!=null)
                        {
                            $data=array(
                                'nombre'=>$this->session->userdata('nombreV'),
                                'modulo'=>$this->modulo_model->getModulo($version),
                                'paralelo'=>$this->paralelo_model->getParalelo($version),
                                'bitupdate_asignacionmdi'=>$this->bitacora_model->getbitacora_update_asignacionmdi($fecha)
                            );
                            $this->load->view('plantillas/encabezado');
                            $this->load->view('plantillas/navegador',$data);
                            $this->load->view('plantillas/menu_administrador',$data);
                            $this->load->view('plantillas/bit_update_asignacionmdi',$data);
                        }
                        else 
                        {
                            echo '<script> alert("la version fue cerrada!")</script>';
                            redirect('version/ingresarv','refresh');
                        }
                    break;
                    case 'Coordinador':
                        $version=$this->session->userdata('idVersion');
                        if ($this->input->post()) {
                            $fecha=$this->input->post('fechaupdatecalif');
                        } else {
                            $fecha=null;
                        }
                        if ($version!=null)
                        {
                            $data=array(
                                'nombre'=>$this->session->userdata('nombreV'),
                                'modulo'=>$this->modulo_model->getModulo($version),
                                'paralelo'=>$this->paralelo_model->getParalelo($version),
                                'bitacora_acciones'=>$this->bitacora_model->get_bitacora(),
                                'bitupdate_asignacionmdi'=>$this->bitacora_model->getbitacora_update_asignacionmdi($fecha)
                            );
                            $this->load->view('plantillas/encabezado');
                            $this->load->view('plantillas/navegador',$data);
                            $this->load->view('plantillas/menu_coordinador',$data);
                            $this->load->view('plantillas/bit_update_asignacionmdi',$data);
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
            else 
            {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv','refresh');
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
    public function getBit_actualizar_inscripcion()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $data['tipo']=$this->session->userdata('tipo');

                switch ($data['tipo']) {
                    case 'Administrador':
                        $version=$this->session->userdata('idVersion');
                        if ($this->input->post()) {
                            $fecha=$this->input->post('fechaupdateinsc');
                        } else {
                            $fecha=null;
                        }
                        if ($version!=null)
                        {
                            $data=array(
                                'nombre'=>$this->session->userdata('nombreV'),
                                'modulo'=>$this->modulo_model->getModulo($version),
                                'paralelo'=>$this->paralelo_model->getParalelo($version),
                                'bitupdate_inscripcion'=>$this->bitacora_model->getbitacora_update_inscripcion($fecha)
                            );
                            $this->load->view('plantillas/encabezado');
                            $this->load->view('plantillas/navegador',$data);
                            $this->load->view('plantillas/menu_administrador',$data);
                            $this->load->view('plantillas/bit_update_inscripcion',$data);
                        }
                        else 
                        {
                            echo '<script> alert("la version fue cerrada!")</script>';
                            redirect('version/ingresarv','refresh');
                        }
                    break;
                    case 'Coordinador':
                        $version=$this->session->userdata('idVersion');
                        if ($this->input->post()) {
                            $fecha=$this->input->post('fechaupdateinsc');
                        } else {
                            $fecha=null;
                        }
                        if ($version!=null)
                        {
                            $data=array(
                                'nombre'=>$this->session->userdata('nombreV'),
                                'modulo'=>$this->modulo_model->getModulo($version),
                                'paralelo'=>$this->paralelo_model->getParalelo($version),
                                'bitupdate_inscripcion'=>$this->bitacora_model->getbitacora_update_inscripcion($fecha)
                            );
                            $this->load->view('plantillas/encabezado');
                            $this->load->view('plantillas/navegador',$data);
                            $this->load->view('plantillas/menu_coordinador',$data);
                            $this->load->view('plantillas/bit_update_inscripcion',$data);
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
            else 
            {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv','refresh');
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
}