<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academico extends CI_Controller {

    
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
        $this->load->model('academicoprofesional_model');
        $this->load->model('academicoespecialidad_model');
    }
    
    public function index()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            
            switch ($data['tipo']) {
                case 'Secretario':
                    
                
                    if ($this->session->userdata('ingresado'))
                    {
                        $version=$this->session->userdata('idVersion');
                        $data=array(
                            'nombre'=>$this->session->userdata('nombreV'),
                            'modulo'=>$this->modulo_model->getModulo($version),
                            'paralelo'=>$this->paralelo_model->getParalelo($version),
                            // 'version'=>$this->version_model->mostrar_versiones_habilitados(),
                            
                            'profesion'=>$this->profesion_model->getProfesion(),
                            'especialidad'=>$this->especialidad_model->getEspecialidad()
                
                        );
                        $this->load->view('plantillas/encabezado');
                        $this->load->view('plantillas/navegador',$data);
                        $this->load->view('plantillas/menu_secretaria',$data);
                        $this->load->view('v_academico/nuevo_academico',$data);
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
                            // 'version'=>$this->version_model->mostrar_versiones_habilitados(),
                            
                            'profesion'=>$this->profesion_model->getProfesion(),
                            'especialidad'=>$this->especialidad_model->getEspecialidad()
                
                        );
                        $this->load->view('plantillas/encabezado');
                        $this->load->view('plantillas/navegador',$data);
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('v_academico/nuevo_academico',$data);
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

    public function registroAcademico($indice=null)
    {
        $data['tipo']=$this->session->userdata('tipo');
        
        switch ($data['tipo']) {
            case 'Secretario':
                $version=$this->session->userdata('idVersion');
            
                if ($version!=null)
                {
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
                        // 'version'=>$this->version_model->mostrar_versiones_habilitados(),
                        
                        'profesion'=>$this->profesion_model->getProfesion(),
                        'especialidad'=>$this->especialidad_model->getEspecialidad()
            
                    );
                    $this->load->view('plantillas/encabezado');
                    $this->load->view('plantillas/navegador',$data);
                    if($indice==1)
                    {
                        $data['msg']="Se registro Nuevo Academico, Exitosamente!!!";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }else if($indice==2)
                    {
                        $data['msg']="Se registro Academico, pero hay un problema al registrar sus especialidades, por favor ingrese a Ver Academico y revise!";
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==7)
                    {
                        $data['msg']="Ya se registro el Academico con esa Profesion, Seleccione otra Profesion si tiene";
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==8)
                    {
                        $data['msg']="Academico ya está Registrado, Ingrese a Lista de Académicos y Clickée en su nombre ";
                        $this->load->view('plantillas/msg_error',$data);
                    }
                    $this->load->view('plantillas/menu_coordinador',$data);
                    $this->load->view('v_academico/nuevo_academico',$data);
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

    public function escogerProfesion()
    {
        $gradoAcadP=$this->input->post('nombrep');
        $profesion=$this->profesion_model->getProfesion($gradoAcadP);
        echo json_encode($profesion) ;
    }

    public function buscarAcademico($ciA=null)
    {
        if ($ciA==null) 
        {
            $ciA=$this->input->post('txtCiA');
            $numAcademico=$this->academico_model->buscarAcademico($ciA);
            echo $numAcademico;
        } 
        else 
        {
            $numAcademico=$this->academico_model->buscarAcademico($ciA);
            echo $numAcademico;
           
        }
    }

    public function crearAcademico()
    {
        $config = array(
            array(
                    'field' => 'txtCiA',
                    'label' => 'CI',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'El campo %s es requerido.',
                    ),
            ),
            array(
                    'field' => 'txtNombreCompletoA',
                    'label' => 'Nombre Completo',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'El campo %s es requerido.',
                    ),
            ),
            array(
                    'field' => 'ProfecionA',
                    'label' => '',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'Porfavor Seleccione una Profesion , para buscar una profesion por tipo de Grado Academico seleccione algun boton de abajo.',
                    ),
            ),
            array(
                    'field' => 'checkbox[]',
                    'label' => 'Estudios Superiores realizados',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'Por favor pinche por lo menos una opcion.',
                    ),
            )
        );
    
        $this->form_validation->set_rules($config);
        
        // $this->form_validation->set_rules('txtCiA', 'CI', 'required',array('required' => 'El campo %s es requerido.'));

        if ($this->form_validation->run()==FALSE) {
            $this->index();
        } 
        else 
        {
            
            $ciA=$this->input->post('txtCiA');
            $nombA=$this->input->post('txtNombreCompletoA');
            $ciudadA=$this->input->post('txtCiudadActualA');
            $telefonoA=$this->input->post('txtTelefonoA');
            $direccionA=$this->input->post('txtDireccionA');
            $folioA=$this->input->post('txtFolioA');
            $descripcionA=$this->input->post('txtDescripcionA');
    
            $profesion=$this->input->post('ProfecionA');

            $numAcademico=$this->academico_model->buscarAcademico($ciA);
            if ($numAcademico>0) 
            {
                redirect('academico/registroAcademico/8');
            } 
            else 
            {
                
                $this->academico_model->crearAcaddemico($ciA,$nombA,$ciudadA,$telefonoA,$direccionA,$folioA,$descripcionA);
                $this->academicoprofesional_model->crearAcademico_tiene_profesion($ciA,$profesion);
                        
     
                if (is_array($_POST['checkbox'])) 
                {   
                    while (list($key,$value)= each($_POST['checkbox'])) 
                    {
                                
                        // $esp=$this->academicoespecialidad_model->crearAcademico_tiene_especialidad($ciA,$value,$profesion);
                        $esp=$this->academicoespecialidad_model->crearTieneAPr_especialidad($ciA,$value,$profesion);
                    }

                    if($esp==true)
                    {
                        redirect('academico/registroAcademico/1');
                        
                    }
                    else
                    {
                        redirect('academico/registroAcademico/2');
                        
                    }
                }
                
            }
        }

    }

    public function editarAcademico()
    {
        $ciA=$this->input->post('textoCiA');
        $nombA=$this->input->post('textoNombreA');
        $ciudadA=$this->input->post('textoCiudadA');
        $telefonoA=$this->input->post('textoTelefonoA');
        $direccionA=$this->input->post('textoDireccionA');
        $folioA=$this->input->post('textoArchivoA');
        $descripcionA=$this->input->post('textoDescripcionA');

        $this->academico_model->editarAcademico($ciA,$nombA,$ciudadA,$telefonoA,$direccionA,$folioA,$descripcionA);
        $filasAfectadas=$this->db->affected_rows();
        
        if($filasAfectadas>0)
        {
            // $this->detalleAcademico($ciA);
            redirect('academico/detalleAcademico/'.$ciA.'/5');
        }
        else
        {
            // $this->detalleAcademico($ciA);
            redirect('academico/detalleAcademico/'.$ciA.'/6');
        }
    }

    public function eliminarAcademico()
    {
        $ciA=$this->input->get('ciacad');
        $nombreA=$this->input->get('nombreAcad');
        
        
        $profesiones=$this->academicoprofesional_model->getAcademicoProfesional($ciA);
        foreach ($profesiones as $p) {
            $idProfesion=$p['idProfesion'];
            $prefesiones=$this->academicoprofesional_model->eliminarProfesionAcademico($ciA,$idProfesion);
        }

        $prefesiones=$this->academico_model->eliminar_academico($ciA,$nombreA);
        // echo json_decode($prefesiones) ;
        $filasAfectadas=$this->db->affected_rows();

		if($filasAfectadas>0)
        {
            redirect('academico/listaAcademico/3');
        }
        else
        {
            redirect('academico/listaAcademico/4');
        }
    }

    public function listaAcademico($indice=null)//se usa para todos academicos
    {
        $data['tipo']=$this->session->userdata('tipo');
        
        switch ($data['tipo']) {
            case 'Secretario':
                $version=$this->session->userdata('idVersion');
            
                if ($version!=null)
                {
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
                        'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional()
            
                    );
                    $this->load->view('plantillas/encabezado');
                    if($indice==3)
                    {
                        $data['msg']="Se Elimino 1 registro de Academico";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }else if($indice==4)
                    {
                        $data['msg']="No es posible Eliminar Registro de Academico";
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==5)
                    {
                        $data['msg']="Ya se seleccionó el Academico!!! revise en detalles de los Academicos seleccionados se borooo noseee";
                        $this->load->view('plantillas/msg_error',$data);
    
                    }else if($indice==6)
                    {
                        $data['msg']="Seleccione Academico y Designe el Rol de Tutoria";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }
                    
                    $this->load->view('plantillas/navegador',$data);
                    $this->load->view('plantillas/menu_coordinador',$data);
                    $this->load->view('v_academico/lista_academico',$data);
                }
                else 
                {
                    echo '<script> alert("la version fue cerrada!")</script>';
                    redirect('version/ingresarv','refresh');
                }
                break;
            case 'Administrador':
                $version=$this->session->userdata('idVersion');
            
                if ($version!=null)
                {
                    $data=array(
                        'nombre'=>$this->session->userdata('nombreV'),
                        'modulo'=>$this->modulo_model->getModulo($version),
                        'paralelo'=>$this->paralelo_model->getParalelo($version),
                        'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional()
            
                    );
                    $this->load->view('plantillas/encabezado');
                    if($indice==3)
                    {
                        $data['msg']="Se Elimino 1 registro de Academico";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }else if($indice==4)
                    {
                        $data['msg']="No es posible Eliminar Registro de Academico";
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==5)
                    {
                        $data['msg']="Ya se seleccionó el Academico!!! revise en detalles de los Academicos seleccionados se borooo noseee";
                        $this->load->view('plantillas/msg_error',$data);
    
                    }else if($indice==6)
                    {
                        $data['msg']="Seleccione Academico y Designe el Rol de Tutoria";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }
                    
                    $this->load->view('plantillas/navegador',$data);
                    $this->load->view('plantillas/menu_administrador',$data);
                    $this->load->view('v_academico/lista_academico',$data);
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

    public function detalleAcademico($ciA = null,$indice= null)//se usa
    {
        $data['tipo']=$this->session->userdata('tipo');
        
        switch ($data['tipo']) {
            case 'Secretario':
                $version=$this->session->userdata('idVersion');
            
                if ($version!=null)
                {
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
                    if ($ciA==null) 
                    {
                        $ciAcademico=$this->input->post('ciAcademico') ;
                    } 
                    else {
                        $ciAcademico=urldecode($ciA);
                    }
                    $data=array(
                        'nombre'=>$this->session->userdata('nombreV'),
                        'modulo'=>$this->modulo_model->getModulo($version),
                        'paralelo'=>$this->paralelo_model->getParalelo($version),
                        // 'version'=>$this->version_model->mostrar_versiones_habilitados(),
                        'academico'=>$this->academico_model->getAcademico($ciAcademico),
                        'profesion'=>$this->profesion_model->getProfesion(),
                        'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional($ciAcademico),
                        'academicocompleto'=>$this->academicoespecialidad_model->get_academico_prof_especialidad($ciAcademico)
            
                    );
                    $this->load->view('plantillas/encabezado');
                    $this->load->view('plantillas/navegador',$data);
                    if($indice==1)
                    {
                        $data['msg']="Se Registró nueva Profesión para el Academico";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }else if($indice==2)
                    {
                        $data['msg']="No es posible registrar nueva Profesión para el Academico, verifique si la Profesion/Carrera ya esta registrada";
                        $this->load->view('plantillas/msg_error',$data);
    
                    }else if($indice==3)
                    {
                        $data['msg']="Se insertaron Estudios de Posgrado";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }else if($indice==4)
                    {
                        $data['msg']="No es posible insertar Estudios de Posgrado, posiblemente ya se insertó ese estudio de posgrado";
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==5)
                    {
                        $data['msg']="Se Edito el registro del Academico";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }else if($indice==6)
                    {
                        $data['msg']="No es posible Editar registro de Academico";
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==7)
                    {
                        $data['msg']="Se Elimino la Carrera/Profesion de Academico";
                        $this->load->view('plantillas/msg_success',$data);
                    }else if($indice==8)
                    {
                        $data['msg']="No es posible Eliminar la Carrera/Profesion de Academico";
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==9)
                    {
                        $data['msg']="Se Elimino la Especialidad del la profesion";
                        $this->load->view('plantillas/msg_success',$data);
                    }
                    $this->load->view('plantillas/menu_coordinador',$data);
                    $this->load->view('v_academico/detalle_academico',$data);
                }
                else 
                {
                    echo '<script> alert("la version fue cerrada!")</script>';
                    redirect('version/ingresarv','refresh');
                }
                
                break;
            case 'Administrador':
                $version=$this->session->userdata('idVersion');
            
                if ($version!=null)
                {
                    if ($ciA==null) 
                    {
                        $ciAcademico=$this->input->post('ciAcademico') ;
                    } 
                    else {
                        $ciAcademico=urldecode($ciA);
                    }
                    $data=array(
                        'nombre'=>$this->session->userdata('nombreV'),
                        'modulo'=>$this->modulo_model->getModulo($version),
                        'paralelo'=>$this->paralelo_model->getParalelo($version),
                        // 'version'=>$this->version_model->mostrar_versiones_habilitados(),
                        'academico'=>$this->academico_model->getAcademico($ciAcademico),
                        'profesion'=>$this->profesion_model->getProfesion(),
                        'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional($ciAcademico),
                        'academicocompleto'=>$this->academicoespecialidad_model->get_academico_prof_especialidad($ciAcademico)
            
                    );
                    $this->load->view('plantillas/encabezado');
                    $this->load->view('plantillas/navegador',$data);
                    if($indice==1)
                    {
                        $data['msg']="Se Registró nueva Profesión para el Academico";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }else if($indice==2)
                    {
                        $data['msg']="No es posible registrar nueva Profesión para el Academico, verifique si la Profesion/Carrera ya esta registrada";
                        $this->load->view('plantillas/msg_error',$data);
    
                    }else if($indice==3)
                    {
                        $data['msg']="Se insertaron Estudios de Posgrado";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }else if($indice==4)
                    {
                        $data['msg']="No es posible insertar Estudios de Posgrado, posiblemente ya se insertó ese estudio de posgrado";
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==5)
                    {
                        $data['msg']="Se Edito el registro del Academico";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }else if($indice==6)
                    {
                        $data['msg']="No es posible Editar registro de Academico";
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==7)
                    {
                        $data['msg']="Se Elimino la Carrera/Profesion de Academico";
                        $this->load->view('plantillas/msg_success',$data);
                    }else if($indice==8)
                    {
                        $data['msg']="No es posible Eliminar la Carrera/Profesion de Academico";
                        $this->load->view('plantillas/msg_error',$data);
                    }else if($indice==9)
                    {
                        $data['msg']="Se Elimino la Especialidad del la profesion";
                        $this->load->view('plantillas/msg_success',$data);
                    }
                    $this->load->view('plantillas/menu_administrador',$data);
                    $this->load->view('v_academico/detalle_academico',$data);
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

    public function obtenerEspecialidad_de_profesion($ciAcademico = null)
    {
        $data=$this->academicoprofesional_model->obtenerProfesiones($ciAcademico);
        $data1 = array(
            'academicoProf' =>$this->academicoprofesional_model->getAcademicoProfesional($ciAcademico) , 
        );
    
        foreach ($data as $f) 
        {
            $idp= $f['idProfesion'];
            // $data1=$this->academicoespecialidad_model->buscarEspecialidad($idp);
            // echo json_encode($data1);

            $data = array(
                'doctorados' =>$this->academicoespecialidad_model->buscarEspecialidad($idp) , 
            );
        }

        $this->load->view('plantillas/encabezado');
        // $this->load->view('plantillas/navegador_version');

        $this->load->view('v_academico/prueva',$data+$data1 );
        $this->load->view('plantillas/pie');
    }

    public function academico_seleccionado($ciA = null,$indice= null)
    {
        $data['tipo']=$this->session->userdata('tipo');
        
        switch ($data['tipo']) {
            case 'Secretario':
                $version=$this->session->userdata('idVersion');
            
                if ($version!=null)
                {
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
                    if ($ciA==null) 
                    {
                        $ciAcademico=$this->input->post('ciAcademico') ;
                    } 
                    else {
                        $ciAcademico=urldecode($ciA);
                    }

                    $data=array(
                        'nombre'=>$this->session->userdata('nombreV'),
                        'modulo'=>$this->modulo_model->getModulo($version),
                        'paralelo'=>$this->paralelo_model->getParalelo($version),
                        'academico'=>$this->academico_model->getAcademico($ciAcademico),
                        'profesion'=>$this->profesion_model->getProfesion(),
                        'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional($ciAcademico),
                        'academicocompleto'=>$this->academicoespecialidad_model->get_academico_prof_especialidad($ciAcademico)
                    );
                    $this->load->view('plantillas/encabezado');
                    $this->load->view('plantillas/navegador',$data);
                    if($indice==1)
                    {
                        $data['msg']="nosee";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }
                    $this->load->view('plantillas/menu_coordinador',$data);
    
                    $this->load->view('v_academico/informacion_academico',$data);
                }
                else 
                {
                    echo '<script> alert("la version fue cerrada!")</script>';
                    redirect('version/ingresarv','refresh');
                }
            break;
            case 'Administrador':
                $version=$this->session->userdata('idVersion');
            
                if ($version!=null)
                {
                    if ($ciA==null) 
                    {
                        $ciAcademico=$this->input->post('ciAcademico') ;
                    } 
                    else {
                        $ciAcademico=urldecode($ciA);
                    }

                    $data=array(
                        'nombre'=>$this->session->userdata('nombreV'),
                        'modulo'=>$this->modulo_model->getModulo($version),
                        'paralelo'=>$this->paralelo_model->getParalelo($version),
                        'academico'=>$this->academico_model->getAcademico($ciAcademico),
                        'profesion'=>$this->profesion_model->getProfesion(),
                        'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional($ciAcademico),
                        'academicocompleto'=>$this->academicoespecialidad_model->get_academico_prof_especialidad($ciAcademico)
                    );
                    $this->load->view('plantillas/encabezado');
                    $this->load->view('plantillas/navegador',$data);
                    if($indice==1)
                    {
                        $data['msg']="nosee";
                        $this->load->view('plantillas/msg_success',$data);
    
                    }
                    $this->load->view('plantillas/menu_administrador',$data);
                    $this->load->view('v_academico/informacion_academico',$data);
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

    public function getAcademico_paraModalDefenza()
    {
        $ciA=$this->input->post('ciAcademico');
        $academico=$this->academico_model->getAcademico($ciA);
        
        if (empty($academico)) {
            echo"listaVaciaAcademico";
        } else {
            echo json_encode($academico);
        }
        
    }
    public function getAcademicoProfesion_paramodalDef()
    {
        $ciA=$this->input->post('ciAcademico');
        $academicoProf=$this->academicoprofesional_model->getAcademicoProfesional($ciA);
        if (empty($academicoProf)) {
            echo"listaVaciaAcademicoProfesion";
        } else {
            echo json_encode($academicoProf);
        }
    }
    public function getAcademicoCompleto_paramodalDef()
    {
        $ciA=$this->input->post('ciAcademico');
        $academicocompleto=$this->academicoespecialidad_model->get_academico_prof_especialidad($ciA);
        if (empty($academicocompleto)) {
            echo"listaVaciaAcademicoEspecialidad";
        } else {
            echo json_encode($academicocompleto);
        }
    }
}