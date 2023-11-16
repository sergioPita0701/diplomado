<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Autenticacion extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('autenticacion_model');
        $this->load->model('version_model');
        $this->load->model('bitacora_model');
    }
    
    public function index()
    {
        $data=array(
            'mensaje'=>''
        );
        $this->load->view('plantillas/encabezado');    
        $this->load->view('autenticacion',$data);
        $this->load->view('plantillas/pie');
    }

    public function iniciar_sesion($data)
	{
        // $data=array(
        //     'mensaje'=>'aqui'
        // );
        $this->load->view('plantillas/encabezado');
		$this->load->view('autenticacion',$data);
		$this->load->view('plantillas/pie');
	}
	public function iniciar_sesion_post()
	{
        
        $this->form_validation->set_rules('txtUsuario', '', 'required',array('required' => 'Inserte su nombre de usuaio.'));
        $this->form_validation->set_rules('txtContraseña', '', 'required',array('required' => 'Debe inseratar su contraseña.'));

        if ($this->form_validation->run()==FALSE) {
            
            $this->index();
        } 
        else 
        {
		    if ($this->input->post()) {
		    	$login=$this->input->post('txtUsuario');
		    	$contrasena=$this->input->post('txtContraseña');
                
                $habilitado=$this->autenticacion_model->usuarioHabilitado($login);
                // echo $habilitado ;
                if ($habilitado=="vacio") {
                    $data['mensaje']='<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button><strong> Cuidado!!</strong> No existe Usuario!! Consulte con el Administrador.</div>';
		    	    $this->iniciar_sesion($data);
                } else {
                    if ($habilitado=='1') {
                        
                        $usuario=$this->autenticacion_model->autenticacion_por_nombre_contrasena($login,$contrasena);
                        if ($usuario) {
		    	        	$usuario_data=array(
                                'id'=>$usuario->idUsuario,
                                'ciu'=>$usuario->ciU,
                                'login'=>$usuario->loginU,
                                'contraseña'=>$usuario->contrasenaU,
                                'tipo'=>$usuario->tipoU,
                                'estado'=>$usuario->estadoU,
		    	        		'logueado'=>TRUE
                            );
                        
                            $this->session->set_userdata($usuario_data);

                            $idusuario=$this->session->userdata('id');
                            $ciu=$this->session->userdata('ciu');
                            $logueado=$this->session->userdata('logueado');
                            if ($logueado==TRUE) {
                                $estado=1;
                            } else {
                                $estado==0;
                            }
                            
                            $this->bitacora_model->bitacora_acceso_usuario_ingresa($idusuario,$ciu,$estado);

                            $this->logueadoUsuario();

                            // redirect('version/ingresarv');
                            // $this->cargarVistas($tipousuario);
                        
		    	        } else {
                            $data['mensaje']='<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button><strong> Cuidado!!</strong>Contraseña Incorrecta!</div>';
		    	        	$this->iniciar_sesion($data);
		    	        }
                    }else {
                        $data['mensaje']='<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button><strong> Cuidado!!</strong> Usuario registrado pero Nó tiene permisos para el acceso al sistema!! Consulte con el Administrador.</div>';
		    	        $this->iniciar_sesion($data);
                    }
                }
                
		    }else {

                $data['mensaje']='<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button><strong> Cuidado!!</strong> Inicie Sesion, Ingresar Datos!!</div>';

		    	$this->iniciar_sesion($data);
            }
        }
	}

	public function logueadoUsuario()
	{
		if ($this->session->userdata('logueado')) {
            
            // $data['tipo']=$this->session->userdata('tipo');
            // return $data['tipo'];
            redirect('version/ingresarv');

        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
    }
    
    public function cerrar_sesion()
	{
        if ($this->session->userdata('logueado')) 
        {
            $usuario_data=array(
                // 'id'=>$usuario->idUsuario,
                // 'ciu'=>$usuario->ciU,
                'logueado'=>FALSE
            );
            
            $idusuario=$this->session->userdata('id');
            $ciu=$this->session->userdata('ciu');
            $this->bitacora_model->bitacora_acceso_usuario_sale($idusuario,$ciu);
    
            $this->session->set_userdata($usuario_data);
            redirect('autenticacion');
        }else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion');
        }
	}

    public function comprobar_si_la_version_esta_habilitada()
    {
        $version=$this->version_model->ultimaVersion();
        $version_data=array(
            'idversion'=>$version->idVersion,
            'nombreversion'=>$version->nombreV,
            'estadoversion'=>$version->estadoV,
        );

        
    }
}


        