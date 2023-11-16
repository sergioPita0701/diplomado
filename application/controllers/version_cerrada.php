<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Version_cerrada extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // CARGAR LA LIBRERIA PARA IMPRIMIR
        $this->load->library('pdf_report');

        $this->load->model('version_model');
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
        $this->load->model('academico_model');
        $this->load->model('academicoseleccionado_model');
        $this->load->model('academicoespecialidad_model');
        $this->load->model('profesion_model');
        $this->load->model('especialidad_model');
        $this->load->model('academicoprofesional_model');
        $this->load->model('docencia_model');
        $this->load->model('tutoria_model');
        $this->load->model('defensa_model');
        $this->load->model('inscripcion_model');
        $this->load->model('calificacion_model');
        $this->load->model('monografia_model');
    }
    
    public function index()
    {
        
        
    }
    // --------------------------LISTAS-------------------------------------------
    public function lista_academicos_version($indice=null)//se usa 
    {
        if ($this->session->userdata('logueado')) 
        {
            // if ($this->input->post()) 
            // {
            //     $busCi=$this->input->post('txtBuscarS');
            //     $busNom=$this->input->post('txtBuscarS');
            // }
            // else 
            // {
            //     $busCi="";
            //     $busNom="";
            // }
            if ($this->input->get()) 
            {
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'academicoseleccionado'=>$this->academicoseleccionado_model->getAcademicoSeleccionado($version->idVersion,null,null)
                    // talves crear otro modelo que llametodos lo que muestre modulos por tipo de academico y asi en una sola lista de academicos o ver
                );
                $this->load->view('plantillas/encabezado');
                if($indice==1)
                {
                    $data['msg']="Se Selecciono un Academico";
                    $this->load->view('plantillas/msg_success',$data);
                }else if($indice==2)
                {
                    $data['msg']="No se puede seleccionar Academico, Revise detalles del mismo porfavor ó el mismo ya se debio seleccionar";
                    $this->load->view('plantillas/msg_error',$data);
                }
                $this->load->view('plantillas/navegador',$data);
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_version_cerrada',$data);
                        $this->load->view('v_version_cerrada/academicos_enlaversion',$data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_version_cerrada',$data);
                        $this->load->view('v_version_cerrada/academicos_enlaversion',$data);
                        break;
                    case 'Administrador':
                        $this->load->view('plantillas/menu_version_cerrada',$data);
                        $this->load->view('v_version_cerrada/academicos_enlaversion',$data);
                        break;
                    default:
                        redirect('autenticacion');
                    break;
                }
                $this->load->view('plantillas/pie');
            }
            else 
            {
                echo '<script> alert("No se puede acceder a la Version!")</script>';
                redirect('version/registroV','refresh');
            }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }

    }
    public function lista_docencia()//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    // 'academicoseleccionado'=>$this->academicoseleccionado_model->getAcademicoSeleccionado($version->idVersion,null,null)
                    'registroDocencias'=>$this->docencia_model->getParalelo($version->idVersion)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
                $this->load->view('plantillas/menu_version_cerrada',$data);
                $this->load->view('v_version_cerrada/listadocentes_enlaversion',$data);
                $this->load->view('plantillas/pie');
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    public function lista_tutoria()//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'tutomono'=>$this->tutoria_model->getTutoria_monografia($version->idVersion,null,null)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
                $this->load->view('plantillas/menu_version_cerrada',$data);
                $this->load->view('v_version_cerrada/listatutorias_enlaversion',$data);
                $this->load->view('plantillas/pie');
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    public function lista_tribunal()//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'listadefensas'=>$this->defensa_model->getDefensaTribunal($version->idVersion)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
                $this->load->view('plantillas/menu_version_cerrada',$data);
                $this->load->view('v_version_cerrada/listadefensas_enlaversion',$data);
                $this->load->view('plantillas/pie');
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    public function lista_inscritos()//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'listainscritos'=>$this->inscripcion_model->getregistroInsripciones($version->idVersion, null)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
                $this->load->view('plantillas/menu_version_cerrada',$data);
                $this->load->view('v_version_cerrada/listainscritos_enlaversion',$data);
                $this->load->view('plantillas/pie');
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    public function lista_calificacion()//Revisar no funciona
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $aprob=0;
                $reprob=0;
                $list=$this->calificacion_model->getCalificacion_porversion($version->idVersion);
                foreach ($list as $lis) {
                    if ($lis['nota']<65 || $lis['nota']==NULL) {
                        $reprob=$reprob+1;
                    } else {
                        $aprob=$aprob+1;
                    }
                    // $lista=[$lis,$aprob,$reprob];
                    // $lista = array('calif' =>$lis ,'aprobados' =>$aprob,'reprobados' =>$reprob );
                    $lista = array('aprobados' =>$aprob,'reprobados' =>$reprob );
                }
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'listacalif'=>$lista
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
                $this->load->view('plantillas/menu_version_cerrada',$data);
                $this->load->view('v_version_cerrada/listacalif_enlaversion',$data);
                $this->load->view('plantillas/pie');
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    public function lista_monografias()//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'listamonos'=>$this->monografia_model->buscar_realizamono($version->idVersion)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
                $this->load->view('plantillas/menu_version_cerrada',$data);
                $this->load->view('v_version_cerrada/listamonos_enlaversion',$data);
                $this->load->view('plantillas/pie');
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
        } 
        else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion','refresh');
        }
    }
    // --------------------IMPRRESIONES-----------------------------------------------------
    public function academico_detalles_imprimir($ciA = null)
    {
        $data['tipo']=$this->session->userdata('tipo');
        
        switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                if ($ciA==null) 
                {
                    $ciAcademico=$this->input->post('ciAcademico') ;
                } 
                else {
                    $ciAcademico=urldecode($ciA);
                }
                // $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    // 'modulo'=>$this->modulo_model->getModulo($version),
                    // 'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'academico'=>$this->academico_model->getAcademico($ciAcademico),
                    'profesion'=>$this->profesion_model->getProfesion(),
                    'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional($ciAcademico),
                    'academicocompleto'=>$this->academicoespecialidad_model->get_academico_prof_especialidad($ciAcademico)
                );
                // $this->load->view('plantillas/encabezado');
                // $this->load->view('plantillas/navegador',$data);
                // $this->load->view('plantillas/menu_version_cerrada',$data);
                $this->load->view('v_imprimirpdf/detalle_academico_selec',$data);
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }

        // $this->load->view('plantillas/pie');
    }
    public function lista_academico_imprimir($ciA = null)
    {
        $data['tipo']=$this->session->userdata('tipo');
        switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'academicoseleccionado'=>$this->academicoseleccionado_model->getAcademicoSeleccionado($version->idVersion,null,null)
                );
                $this->load->view('v_imprimirpdf/lista_academicos_pdf',$data);
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
    }
    public function lista_docencia_imprimir()
    {
        $data['tipo']=$this->session->userdata('tipo');
        switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'registroDocencias'=>$this->docencia_model->getParalelo($version->idVersion)
                );
                $this->load->view('v_imprimirpdf/lista_docentes_pdf',$data);
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
    }
    public function lista_tutoria_imprimir()
    {
        $data['tipo']=$this->session->userdata('tipo');
        switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'tutomono'=>$this->tutoria_model->getTutoria_monografia($version->idVersion,null,null)
                );
                $this->load->view('v_imprimirpdf/lista_tutorias_pdf',$data);
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
    }
    public function lista_defensas_imprimir()
    {
        $data['tipo']=$this->session->userdata('tipo');
        switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'listadefensas'=>$this->defensa_model->getDefensaTribunal($version->idVersion)
                );
                $this->load->view('v_imprimirpdf/lista_defensas_pdf',$data);
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
    }
    public function lista_inscritos_imprimir()
    {
        $data['tipo']=$this->session->userdata('tipo');
        switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'listainscritos'=>$this->inscripcion_model->getregistroInsripciones($version->idVersion, null)
                );
                $this->load->view('v_imprimirpdf/lista_inscritos_pdf',$data);
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
    }
    public function lista_calificaciones_imprimir()
    {
        $data['tipo']=$this->session->userdata('tipo');
        switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'listainscritos'=>$this->inscripcion_model->getregistroInsripciones($version->idVersion, null)
                );
                $this->load->view('v_imprimirpdf/lista_calificaciones_pdf',$data);
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
    }
    public function lista_mono_imprimir()
    {
        $data['tipo']=$this->session->userdata('tipo');
        switch ($data['tipo']) {
            case 'Secretario':
            case 'Coordinador':
            case 'Administrador':
                $nombre=$this->input->get('nombrev');
                $version=$this->version_model->getVersiones($nombre);
                $data=array(
                    'login'=>$this->session->userdata('tipo'),
                    'nombre'=>$version->nombreV,
                    'estado'=>$version->estadoV,
                    'modulo'=>$this->modulo_model->getModulo($version->idVersion),
                    'paralelo'=>$this->paralelo_model->getParalelo($version->idVersion),
                    'listamonos'=>$this->monografia_model->buscar_realizamono($version->idVersion)
                );
                $this->load->view('v_imprimirpdf/lista_monos_pdf',$data);
                break;
            default:
            echo '<script> alert("El Usuario no inicio Sesion")</script>';    
            redirect('autenticacion','refresh');
            break;
        }
    }
}