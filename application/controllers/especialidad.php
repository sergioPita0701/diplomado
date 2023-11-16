<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidad extends CI_Controller {

    
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
    }
    
    public function index()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                $data=array(
                    // 'version'=>$this->version_model->mostrar_versiones_habilitados(),
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'especialidad'=>$this->especialidad_model->getEspecialidad()
        
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
        
                $data1['tipo']=$this->session->userdata('tipo');
                switch ($data1['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario',$data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('especialidad',$data);
                        break;
                    
                    default:
                        redirect('autenticacion');
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
            redirect('autenticacion','refresh');
        }
    }

    public function registroEs($indice=null)
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'especialidad'=>$this->especialidad_model->getEspecialidad()
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
                if($indice==1)
                {

                    $data['msg']="Se registro Nuevo Registro de Est. Sup.";
                    $this->load->view('plantillas/msg_success',$data);

                }else if($indice==2)
                {
                    $data['msg']="No es posible registrar Est. Sup.";
                    $this->load->view('plantillas/msg_error',$data);
                }else if($indice==3)
                {
                    $data['msg']="Se Elimino registro de Est. Sup.";
                    $this->load->view('plantillas/msg_success',$data);

                }else if($indice==4)
                {
                    $data['msg']="No es posible Eliminar Registro de Est. Sup.";
                    $this->load->view('plantillas/msg_error',$data);
                }else if($indice==5)
                {
                    $data['msg']="Se Edito la Est. Sup.";
                    $this->load->view('plantillas/msg_success',$data);

                }else if($indice==6)
                {
                    $data['msg']="No es posible Editar Est. Sup.";
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
                        $this->load->view('especialidad',$data);
                        break;
                    default:
                        redirect('autenticacion');
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
            redirect('autenticacion','refresh');
        }
        
    }

    public function crearEspecialidad()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) 
            {
                case 'Secretario':
                    
                    break;
                case 'Coordinador':
                    
                    $nombEs=$this->input->post('txtNombreEs');
                    $descripcioEs=$this->input->post('txtDescripcionEs');
                    
                    $this->especialidad_model->crearEspecialidad($nombEs,$descripcioEs);
                    $filasAfectadas=$this->db->affected_rows();
            
                    if($filasAfectadas>0)
                    {
                        redirect('especialidad/registroEs/1');
                    }
                    else
                    {
                        redirect('especialidad/registroEs/2');
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
    public function obtenerId()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) 
            {
                case 'Secretario':
                    
                case 'Coordinador':
                    $nombre=$this->input->get('nombre');
                    $nom=urldecode($nombre);
                    $especialidad=$this->especialidad_model->getEspecialidad($nom);

                    $idE=array(
                        'idEspecialidad'=>$especialidad->idEspecialidad
                    );
                    echo json_encode($idE) ;
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
    public function editarEspecialidad()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) 
            {
                case 'Secretario':
                    redirect('especialidad/registroEs/6');
                    break;
                case 'Coordinador':
                    $idE=$this->input->post('txtidespecialidadEdi');
                    $nomE=$this->input->post('txtnombreedit');
                    $descripcionE=$this->input->post('txtDescripcionEedit');
                
                    $this->especialidad_model->editarEspecialidad($idE,$nomE,$descripcionE);
                    $filasAfectadas=$this->db->affected_rows();
                
                    if($filasAfectadas>0)
                    {
                        redirect('especialidad/registroEs/5');
                    }
                    else
                    {
                        redirect('especialidad/registroEs/6');
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

    public function eliminarEspecialidad()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) 
            {
                case 'Secretario':
                    redirect('especialidad/registroEs/4');
                    break;
                case 'Coordinador':
                    $nombre=$this->input->get('nombre');
                    $nom=urldecode($nombre);
                    // echo $nom;
                    $this->especialidad_model->eliminarEspecialidad($nom);
                    $filasAfectadas=$this->db->affected_rows();
                
                    if($filasAfectadas>0)
                    {
                        redirect('especialidad/registroEs/3');
                    }
                    else
                    {
                        redirect('especialidad/registroEs/4');
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

    public function obtenerEspecialidades($algo = null)
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) 
            {
                case 'Secretario':
                    
                case 'Coordinador':

                case 'Administrador':
                    if ($algo == null) 
                    {
                        $especialidades=$this->especialidad_model->getEspecialidad();
                        echo json_encode($especialidades) ;
                    } 
                    else 
                    {
                        $especialidades=$this->especialidad_model->getEspecialidad($algo);
                        echo $especialidades;
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

    public function getEspecialidad()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) 
            {
                case 'Secretario':
                    
                case 'Coordinador':

                case 'Administrador':
                    if ($this->input->post()) {
                        $gradoAcadP=$this->input->post('txtBuscarEs');
                    }
                    else{
                        $gradoAcadP=$this->input->get('nombreE');
                        $gradoAcadP=urldecode($gradoAcadP);
                    }
                    return $gradoAcadP;
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
    
    public function buscarEspecialidad()
    {   
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');

                $nombre=$this->getEspecialidad();
                
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'especialidad'=>$this->especialidad_model->getEspecialidad($nombre)
                
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
            
                $data1['tipo']=$this->session->userdata('tipo');
            
                switch ($data1['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario',$data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('especialidad',$data);
                        break;

                    default:
                        redirect('autenticacion');
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
            redirect('autenticacion','refresh');
        }
        
    }
}