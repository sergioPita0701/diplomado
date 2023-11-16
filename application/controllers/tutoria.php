<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutoria extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // CARGAR LA LIBRERIA PARA IMPRIMIR
        $this->load->library('pdf_report');
        //carga modelos
        $this->load->model('version_model');
        $this->load->model('academico_model');
        $this->load->model('diplomante_model');
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
        $this->load->model('inscripcion_model');
        $this->load->model('profesion_model');
        $this->load->model('especialidad_model');
        $this->load->model('academicoprofesional_model');
        $this->load->model('academicoespecialidad_model');
        $this->load->model('docencia_model');
        $this->load->model('academicoseleccionado_model');
        $this->load->model('tutoria_model');
        $this->load->model('monografia_model');
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
                    'diplomantesconmono'=>$this->monografia_model->buscar_monografia($version),

                    'diplomante'=>$this->diplomante_model->ultDiplomante(),
                    'academico'=>$this->docencia_model->buscarAcademico_paraindex(),
                    'academicoProf'=>$this->docencia_model->buscarAcademico_paraindex("1"),
                    'academicoseleccionados'=>$this->academicoseleccionado_model->getAcademicoSeleccionado($version)
                
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
            
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario',$data);
                        $this->load->view('v_version/gestionar_version',$data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('v_tutoria/nueva_tutoria',$data);
                        
                        break;
                    default:
                        echo '<script> alert("la version fue cerrada!")</script>';
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
            redirect('autenticacion','refresh');
        }
    }

    public function registroTutoriaM($ci=null,$indice=null)
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');

                if ($ci==null) 
                {
                    $cia=$this->input->post('txtbuscarD');
                } else {
                    $cia=urldecode($ci);
                    // $cia=$ci;
                }

                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'diplomante'=>$this->diplomante_model->ultDiplomante(),
                    'academico'=>$this->academico_model->getAcademico($cia),
                    'diplomantesconmono'=>$this->monografia_model->buscar_monografia($version),
                    // 'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional($cia),
                    // 'academicocompleto'=>$this->academicoespecialidad_model->get_academico_prof_especialidad($cia),
                    'registroTutoria'=>$this->tutoria_model->getTutoria($cia),
                    'academicoseleccionados'=>$this->academicoseleccionado_model->getAcademicoSeleccionado($version)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
            
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario',$data);
                        $this->load->view('v_version/gestionar_version',$data);
                        break;
                    case 'Coordinador':
                        
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('v_tutoria/nueva_tutoria',$data);
                        break;
                    
                    default:
                        echo '<script> alert("la version fue cerrada!")</script>';
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
            redirect('autenticacion','refresh');
        }
    }


    public function crearTutoriaMonografia()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    break;
                case 'Coordinador':
                    
                    $version=$this->session->userdata('idVersion');
                    $realizamono=$this->input->post('realizamono');
                    $academico=$this->input->post('pciTutor');
                    $numerocontrato=$this->input->post('numContrato');
                    $cancelado=$this->input->post('cancelo');
                    $fechacarta=$this->input->post('fechaCarta');
                    $fechainicio=$this->input->post('fechaInicio');
                    $fechafinal=$this->input->post('fechaFinal');
                    $obserbacion=$this->input->post('observaciontutoria');
                
                    // echo $academico;
                
                    $notieneTutor=$this->tutoria_model->monografia_sin_tutor($realizamono);
                    // echo $notieneTutor;
                    // $noTutor= json_encode($notieneTutor);
                    // if (empty($notieneTutor)) 
                    if ($notieneTutor=='0') 
                    {
                        $tutoria=$this->tutoria_model->crear_tutoriaMonografia($version,$realizamono,$academico,$numerocontrato,$cancelado,$fechacarta,$fechainicio,$fechafinal,$obserbacion);
                        
                        if($tutoria=="true")
                        {
                            // redirect('tutoria/registroTutoriaM/'.$academico.'/1');
                            echo "situto";
                            
                        }
                        else
                        {
                            // redirect('tutoria/registroTutoriaM/'.$academico.'/2');
                            echo "notuto";
                        }
                    } 
                    else {
                        echo "notuto";
                        // $getutoria=$this->tutoria_model->getTutoria_poId($version,$realizamono);
                            // echo $realizamono;
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
    public function lista_tutoria($ci=null,$indice=null)
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');

                if ($ci==null) 
                {
                    $ciT=$this->input->post('txtBuscarTutor');
                    // $ciD=$this->input->post('txtBuscarTutor');
                } else {
                    // $ciT=urldecode($ci);
                    $ciT=null;
                    // $ciD=urldecode($ciD);
                    // $ciD=null;
                }

                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'tutomono'=>$this->tutoria_model->getTutoria_monografia($version,$ciT)
                    // 'diplomante'=>$this->diplomante_model->ultDiplomante(),
                    // 'academico'=>$this->academico_model->getAcademico($cia),
                    // 'diplomantesconmono'=>$this->monografia_model->buscar_monografia($version),
                    // 'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional($cia),
                    // 'academicocompleto'=>$this->academicoespecialidad_model->get_academico_prof_especialidad($cia),
                    // 'registroTutoria'=>$this->tutoria_model->getTutoria($cia),
                    // 'academicoseleccionados'=>$this->academicoseleccionado_model->getAcademicoSeleccionado($version)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
            
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario',$data);
                        $this->load->view('v_version/gestionar_version',$data);
                        break;
                    case 'Coordinador':
                        if($indice==1)
                        {
                            $data['msg']="Se Elimino Tutoria con exito";
                            $this->load->view('plantillas/msg_success',$data);
                        
                        }else if($indice==2)
                        {
                            $data['msg']="No se pudo Eliminar Tutoria";
                            $this->load->view('plantillas/msg_error',$data);
                        }
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('v_tutoria/lista_mono_con_tutor',$data);
                        break;
                    case 'Administrador':
                        $this->load->view('plantillas/menu_administrador',$data);
                        $this->load->view('v_listas_administrador/lista_tutorias',$data);
                        break;
                    default:
                        echo '<script> alert("la version fue cerrada!")</script>';
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
            redirect('autenticacion','refresh');
        }
        
    }
    
    public function obtenerDatos_deTutoria()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');

                $realizaMono=$this->input->post('realizamono');
                $tutorias=$this->tutoria_model->getTutoria_poId($version,$realizaMono);
                
                echo json_encode($tutorias) ;
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
    public function editarTutoriaMonografia()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    break;
                case 'Coordinador':
                    $version=$this->session->userdata('idVersion');

                    $realizamono=$this->input->post('realizamono');
                    $academico=$this->input->post('editTutor');
                    $numerocontrato=$this->input->post('editContrato');
                    $cancelado=$this->input->post('editcancelo');
                    $fechacarta=$this->input->post('editfechaCarta');
                    $fechainicio=$this->input->post('editfechaInicio');
                    $fechafinal=$this->input->post('editfechaFinal');
                    $obserbacion=$this->input->post('editobservaciontuto');
                    $aprobar=$this->input->post('resultadoMono');
                    // echo $academico;
                
                    $this->tutoria_model->editarTutoriaMono($version,$realizamono,$academico,$numerocontrato,$cancelado,$fechacarta,$fechainicio,$fechafinal,$obserbacion,$aprobar);
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
                        // $defensa=$this->defensa_model->obtenerDefensa_porId($version,$defensa);
                        // echo json_encode($defensa) ;
                        echo "sieditTutoMono";
                    }
                    else
                    {
                        echo "noeditTutoriaMono";
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
    public function eliminarTutoriaMono()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    break;
                case 'Coordinador':
                    
                    $realizamono=$this->input->get('mono');
                    $inscripcion=$this->input->get('inscripcion');
                    $this->tutoria_model->eliminar_Tutoria($realizamono,$inscripcion);
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
    
                        redirect('tutoria/lista_tutoria/null/1');
                    }
                    else
                    {
                        // echo "$modulo";
                        redirect('tutoria/lista_tutoria/null/2');
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

    // -----------------------IMPRESIONES PDF----------------
    public function getFechaActual()
    {
        setlocale(LC_ALL,"spanish"); 
        // return now('Australia/Victoria');
        return strftime("%A, %d de %B del %Y");
    }
    public function getFechayHoraActual()
    {
        setlocale(LC_ALL,"spanish"); 
        // return now('Australia/Victoria');
        return strftime("%A, %d de %B del %Y a Hrs.: %H:%M:%S ");
    }
    public function imprimirpdftutoria($idrealizam=null)
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                // echo $idrealizam;
                $version=$this->session->userdata('idVersion');
                if ($idrealizam!=null) 
                {
                    $idrealizam=urldecode($idrealizam);
                    $data = array(
                        'eventoTutoria'=>$this->tutoria_model->getTutoria_poId($version,$idrealizam),
                        // 'fechayHora'=>$this->getFechayHoraActual()
                    );
                    $this->load->view('v_imprimirpdf/eventos_tutoria',$data);
                    // echo $this->getFechayHoraActual();
                } else {
                    if ($this->input->get()) {
                        $idrealizam=$this->input->get('tutoria');
                        $data = array(
                            'eventoTutoria'=>$this->tutoria_model->getTutoria_poId($version,$idrealizam),
                            // 'fecha'=>$this->getFechaActual()
                        );
                        $this->load->view('v_imprimirpdf/eventos_tutoria',$data);
                    } else {
                        echo"NO esta recibiendo con get hacer algo";
                    }
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
    
}