<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->model('version_model');
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
        $this->load->model('diplomante_model');
        $this->load->model('inscripcion_model');
        $this->load->model('modulodiplomante_model');
    }
    public function index()//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            $this->load->view('plantillas/encabezado');
            $this->load->view('plantillas/navegador');
            switch ($data['tipo']) 
            {
                case 'Secretario':
                    echo '<script> alert("Usted no tiene permisos para crear nueva Version")</script>';    
                    $this->load->view('usuarios/secre_principal');
                    break;
                case 'Coordinador':
                case 'Administrador':
                    $data=array(
                        // 'nombre'=>$this->session->userdata('nombreV')
                    );
                    
                    // $this->load->view('plantillas/menu_coordinador',$data);
                    $this->load->view('usuarios/nuevo_usuario',$data);
                    
                    break;
                default:
                    echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                    redirect('autenticacion');
                break;
            }
            $this->load->view('plantillas/pie');
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
        
    }

    public function registroUsuario($indice=null)//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            $data=array(
                'usuario'=>$this->usuario_model->getUsuario()
            );
            $this->load->view('plantillas/encabezado');
            $this->load->view('plantillas/navegador');

            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) 
            {
                case 'Secretario':
                    echo '<script> alert("Usted no tiene permisos para crear nueva Version")</script>';    
                    $this->load->view('usuarios/secre_principal');
                    break;

                case 'Coordinador':
                case 'Administrador':

                    if($indice==1)
                    {
                        $data['msg']="Se Registro Nuevo Usuario.";
                        $this->load->view('plantillas/msg_success',$data);
                    }else if($indice==2)
                    {
                        $data['msg']="No es posible Registrar Usuario."; 
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==3)
                    {
                        $data['msg']="Se Elimino el Usuario.";
                        $this->load->view('plantillas/msg_success',$data);
                    }else if($indice==4)
                    {
                        $data['msg']="No es posible Eliminar Usuario.";
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==5)
                    {
                        $data['msg']="Se ditaron datos del Usuario.";
                        $this->load->view('plantillas/msg_success',$data);
                    }else if($indice==6)
                    {
                        $data['msg']="No se pudo realizar cambios en los datos del Usuario.";
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==7)
                    {
                        $data['msg']="No es posible realizar la operacion, ya existe existe un Usuario con el mismo CI  y nombre .";
                        $this->load->view('plantillas/msg_error',$data);
                    }
                    // $this->load->view('usuarios/nuevo_usuario',$data);
                    $this->load->view('usuarios/lista_usuarios',$data);
                    
                    break;
                
                default:
                {
                    echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                    redirect('autenticacion');
                    break;
                }
            }
            $this->load->view('plantillas/pie');
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    
    public function crearUsuario()//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            
            switch ($data['tipo']) 
            {
                case 'Coordinador':
                case 'Administrador':

                    $this->form_validation->set_rules('ciusu', 'CI Usuario', 'required',array( 'required' => 'El campo %s es requerido.'));
                    $this->form_validation->set_rules('nombreusu', 'Nombre(s)', 'required',array( 'required' => 'El campo %s es requerido.'));
                    $this->form_validation->set_rules('apellidousu', 'Apellidos', 'required',array( 'required' => 'El campo %s es requerido.'));
                    $this->form_validation->set_rules('telefonousu', 'Telefono', 'required',array( 'required' => 'El campo %s es requerido.'));
                    $this->form_validation->set_rules('direccionusu', 'Direccion', 'required',array( 'required' => 'El campo %s es requerido.'));
                    $this->form_validation->set_rules('cargousu', 'Cargo del Usuario', 'required',array( 'required' => 'El campo %s es requerido.'));
                    $this->form_validation->set_rules('estadousu', 'Estado', 'required',array( 'required' => 'El campo %s es requerido.'));
                    $this->form_validation->set_rules('tipousu', 'Tipo de Usuario', 'required',array( 'required' => 'El campo %s es requerido.'));
                    $this->form_validation->set_rules('loginusu', 'Login', 'required',array( 'required' => 'El campo %s es requerido.'));
                    $this->form_validation->set_rules('contrasenausu', 'Contrasena', 'required',array( 'required' => 'El campo %s es requerido.'));

                    if ($this->form_validation->run()==FALSE) 
                    {
                        $this->index();
                    } 
                    else 
                    {

                            $ciu=$this->input->post('ciusu');
                            $nombreu=$this->input->post('nombreusu');
                            $apellidou=$this->input->post('apellidousu');
                            $cargou=$this->input->post('cargousu');
                            $emailu=$this->input->post('emailusu');
                            $telefonou=$this->input->post('telefonousu');
                            $direccionu=$this->input->post('direccionusu');
                            $estadou=$this->input->post('estadousu');
                            $tipou=$this->input->post('tipousu');
                            $loginu=$this->input->post('loginusu');
                            $contrasenau=$this->input->post('contrasenausu');
                            $descripcionu=$this->input->post('descripcionusu');
                    
                            $usuario=$this->usuario_model->buscarUsuario($ciu,$nombreu,$apellidou);
                            if (empty($usuario)) 
                            {
                                $this->usuario_model->crear_usuario($ciu,$nombreu,$apellidou,$cargou,$emailu,$telefonou,$direccionu,$estadou,$tipou,$loginu,$contrasenau,$descripcionu);
                                $filasAfectadas=$this->db->affected_rows();
                            
                                if($filasAfectadas>0)
                                {
                                
                                    redirect('usuario/registroUsuario/1');
                                }
                                else
                                {
                                    redirect('usuario/registroUsuario/2');
                                }
                            }
                            else {
                                redirect('usuario/registroUsuario/7');
                            }
                        
                    }
                    break;
                
                
                default:
                    echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                     redirect('autenticacion');
                    break;
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    public function editarUsuario()//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');

            switch ($data['tipo']) 
            {
                case 'Coordinador':
                case 'Administrador':
                    $ciU=$this->input->post('ciusu');
                    $nombreU=$this->input->post('nombreusu');
                    $apellidosU=$this->input->post('apellidousu');
                    $cargoU=$this->input->post('cargoU');
                    $direccionU=$this->input->post('direccionU');
                    $telefonoU=$this->input->post('telefonoU');
                    $emailU=$this->input->post('emailU');
                    $estadoU=$this->input->post('estadoU');
                    $tipoU=$this->input->post('tipoU');
                    $loginU=$this->input->post('loginusu');
                    $contrasenaU=$this->input->post('contrasenausu');
                    $obsevacionU=$this->input->post('obsevacionU');

                    $this->usuario_model->editarUsuario($ciU,$nombreU,$apellidosU,$cargoU,$direccionU,$telefonoU,$emailU,$estadoU,$tipoU,$loginU,$contrasenaU,$obsevacionU);
                    $filasAfectadas=$this->db->affected_rows();

                    if($filasAfectadas>0)
                    {
                        redirect('usuario/registroUsuario/5');

                    }else
                    {
                        redirect('usuario/registroUsuario/6');

                    }
                break;
                
                default:
                    echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                     redirect('autenticacion');
                    break;
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }

    public function eliminarUsuario()//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');

            switch ($data['tipo']) 
            {
                case 'Coordinador':
                case 'Administrador':

                    $ciusuario=$this->input->post('ciUsuario') ;

                    $modulo=$this->usuario_model->eliminarUsuario($ciusuario);
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
                    
                        // redirect('usuario/registroUsuario/3');
                        echo "seelimino";
                    }
                    else
                    {
                        // redirect('usuario/registroUsuario/4');
                        echo "noseelimino";
                    }

                break;
                // case 'administrador':
                
                //     break;
                
                default:
                    echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                     redirect('autenticacion');
                    break;
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
        
    }
    public function getUsuario()//se usa en el pie para edit
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');

            switch ($data['tipo']) 
            {
                case 'Coordinador':
                case 'Administrador':

                    $ciU=$this->input->post('ciUsuario');

                    $usuario=$this->usuario_model->getUsuario($ciU);
                    echo json_encode($usuario);

                break;
                // case 'administrador':
            
                // break;
            
                default:
                    echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                     redirect('autenticacion');
                    break;
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    public function getDirector()//se usa en el pie para eliminar version
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');

            switch ($data['tipo']) 
            {
                case 'Coordinador':
                case 'Administrador':

                    $director=$this->usuario_model->getUsuarioDirector();
                    echo json_encode($director);

                break;
                // case 'administrador':
            
                // break;
            
                default:
                    echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                     redirect('autenticacion');
                    break;
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
}