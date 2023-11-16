<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesion extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profesion_model');
        $this->load->model('version_model');
        $this->load->model('academico_model');
        $this->load->model('diplomante_model');
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
    }
    
    public function index()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'profesion'=>$this->profesion_model->getProfesion()
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
                        echo '<script> alert("la version fue cerrada!")</script>';
                        redirect('autenticacion','refresh');
                    break;
                }

                $this->load->view('v_profesion/lista_profesiones',$data);
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

    public function registroprofesion($indice=null)
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'profesion'=>$this->profesion_model->getProfesion()
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
                if($indice==1)
                {

                    $data['msg']="Se registro nueva Profesion.";
                    $this->load->view('plantillas/msg_success',$data);

                }else if($indice==2)
                {
                    $data['msg']="No es posible registrar Profesion. Revise datos";
                    $this->load->view('plantillas/msg_error',$data);
                }else if($indice==3)
                {
                    $data['msg']="Se Elimino  Profesion.";
                    $this->load->view('plantillas/msg_success',$data);

                }else if($indice==4)
                {
                    $data['msg']="No es posible Eliminar Profesion.";
                    $this->load->view('plantillas/msg_error',$data);
                }else if($indice==5)
                {
                    $data['msg']="Se Edito la Profesion.";
                    $this->load->view('plantillas/msg_success',$data);

                }else if($indice==6)
                {
                    $data['msg']="No es posible Editar Profesion.";
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
                        echo '<script> alert("la version fue cerrada!")</script>';
                        redirect('autenticacion','refresh');
                    break;
                }

                $this->load->view('v_profesion/lista_profesiones',$data);
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

    public function nuevaProfesion()
    {
        if ($this->session->userdata('logueado')) 
        {
            $nombreP=$this->input->post('txtNombreP');
            $gradoAcadP=$this->input->post('radioProfesion');

            $numProfesiones=$this->profesion_model->buscarProfesion($nombreP,$gradoAcadP);
            if ($numProfesiones>0) 
            {
                echo "Ya existe una Profesion con ese Grado Academico";
            } 
            else 
            {
                $this->profesion_model->crearProfesion($nombreP,$gradoAcadP);
                $filasAfectadas=$this->db->affected_rows();
    
                if($filasAfectadas>0)
                {
                    // redirect('profesion/registroprofesion/1');
                    echo "Se Agrego la Profesion";
                }
                else
                {
                    // redirect('profesion/registroprofesion/2');
                    echo "No se Agrego la Profesion";
                }
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    

    public function editarProfesion()
    {
        if ($this->session->userdata('logueado')) 
        {
            $idp=$this->input->post('txtidprofesion');
            $nomb=$this->input->post('txtnombreeditado');
            $gradoAcadP=$this->input->post('radioProfEditado');

            $this->profesion_model->editarProfesion($idp,$nomb,$gradoAcadP);
            $filasAfectadas=$this->db->affected_rows();

		    if($filasAfectadas>0)
		    {
		    	redirect('profesion/registroprofesion/5');
		    }
		    else
		    {
		    	redirect('profesion/registroprofesion/6');
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }

    public function eliminarProfesion()
    {
        if ($this->session->userdata('logueado')) 
        {
            $nombre=$this->input->get('nombre');
            $nom=urldecode($nombre);
            // echo $nom;
            $this->profesion_model->eliminarProfesion($nom);
            $filasAfectadas=$this->db->affected_rows();

		    if($filasAfectadas>0)
		    {
		    	redirect('profesion/registroprofesion/3');
		    }
		    else
		    {
		    	redirect('profesion/registroprofesion/4');
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }

    public function getProfesion()
    {
        if ($this->session->userdata('logueado')) 
        {    
            if ($this->input->post()) {
                $gradoAcadP=$this->input->post('selectProfesion');
            }
            else{
                $gradoAcadP=$this->input->get('nombrep');
                $gradoAcadP=urldecode($gradoAcadP);
            }
            return $gradoAcadP;
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    public function seleccionarProfesiones()
    {
        if ($this->session->userdata('logueado')) 
        {    
            $gradoAcadP=$this->input->post('selectProfesion');
            $pr=$this->profesion_model->getProfesion($gradoAcadP);
            echo json_encode($pr);
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    public function getAllProfesiones()
    {
        if ($this->session->userdata('logueado')) 
        { 
            $profesion=$this->profesion_model->getProfesion();
            echo json_encode($profesion);
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    public function buscarProfesion()
    {   
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');

                $gradoAcadP=$this->getProfesion();
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'profesion'=>$this->profesion_model->getProfesion($gradoAcadP)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);

                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario',$data);
                        break;
                
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador',$data);
                        break;
                
                    case 'administrador':
                
                        $this->load->view('usuarios/sistemas_principal');
                         break;
                
                     default:
                        echo '<script> alert("No se le asigno un tipo de Usuario!!, consulte sus datos con el encargado")</script>';
                        redirect('autenticacion','refresh');
                        break;
                }
                $this->load->view('v_profesion/lista_profesiones',$data);
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