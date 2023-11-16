<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Defensa extends CI_Controller {

    
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
        $this->load->model('defensa_model');
    }
    
    public function index()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');
                $busCi=null;
                $busNom=null;
                $busProf=null;
                $busGrado=null;
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'diplomantesconmono'=>$this->monografia_model->buscar_realizamono($version),
                    'academico'=>$this->defensa_model->buscarAcademico_paraindex(),
                    // 'diplomante'=>$this->diplomante_model->ultDiplomante(),
                    // 'academico'=>$this->academicoseleccionado_model->getAcademicoSeleccionado($version),
                    // 'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional($busCi,$busNom,$busProf,$busGrado),era con esto prueba con el de abajo
                    'academicoProf'=>$this->academicoprofesional_model->getsoloAcademico($busCi,$busNom),
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
                        $this->load->view('v_defensa/nueva_defensa',$data);
                        
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
    public function registroDefensa($indice=null)
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');
                $busCi=null;
                $busNom=null;
                $busProf=null;
                $busGrado=null;
                
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'diplomantesconmono'=>$this->monografia_model->buscar_realizamono($version),
                    'academico'=>$this->defensa_model->buscarAcademico_paraindex(),
                    // 'diplomante'=>$this->diplomante_model->ultDiplomante(),
                    // 'academico'=>$this->academicoseleccionado_model->getAcademicoSeleccionado($version),
                    // 'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional($busCi,$busNom,$busProf,$busGrado),
                    'academicoProf'=>$this->academicoprofesional_model->getsoloAcademico($busCi,$busNom),
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
                        if($indice==1)
                        {
                            $data['msg']="Se Registro Fecha para Defensa";
                            $this->load->view('plantillas/msg_success',$data);
                        
                        }else if($indice==2)
                        {
                            $data['msg']="No se pudo registrar Fecha de Defensa, ni Tribunales";
                            $this->load->view('plantillas/msg_error',$data);
                        }else if($indice==3)
                        {
                            $data['msg']="Ya se Registro la Fecha para Defensa";
                            $this->load->view('plantillas/msg_error',$data);
                        
                        }else if($indice==4)
                        {
                            $data['msg']="No se Pudo Registrar la Defensa";
                            $this->load->view('plantillas/msg_error',$data);
                        
                        }else if($indice==5)
                        {
                            $data['msg']="";
                            $this->load->view('plantillas/msg_success',$data);
                        
                        }else if($indice==6)
                        {
                            $data['msg']="";
                            $this->load->view('plantillas/msg_error',$data);
                        
                        }
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('v_defensa/nueva_defensa',$data);
                        
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
                    $noTutor= json_encode($notieneTutor);
                    if ($noTutor!='null') 
                    {
                        echo "notuto";
                    } 
                    else {
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
    public function crear_defensa($ci=null,$indice=null)
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');

                $this->form_validation->set_rules('nombreDef', '', 'required',array('required' => 'Debe seleccionar un Tipo de Defensa.'));
                $this->form_validation->set_rules('fechaDef', 'Fecha de Defensa', 'required',array('required' => 'El campo %s es requerido.'));
                $this->form_validation->set_rules('ciDiplo', '', 'required',array('required' => 'El campo CI del Participante es requerido, Seleccione un Participante de la Lista Lateral.'));
                $this->form_validation->set_rules('nombreParticipante', '', 'required',array('required' => 'El campo Nombre del Participante es requerido, Seleccione un Participante de la Lista Lateral.'));
                // $this->form_validation->set_rules('tribunal[]', '', '',array('required' => 'Debe seleccionar Tribunales Presidente de Defensa.'));
                // $this->form_validation->set_rules('tribunal[]', '', '',array('required' => 'Debe seleccionar Tribunales Secretario de Defensa.'));
        
                if ($this->form_validation->run()==FALSE) {
                    // $ciI=$this->input->post('txtCiI');
                    $this->index();
                } 
                else 
                { 
                    $realizamono=$this->input->post('realizamono');
                    $nomDefensa=$this->input->post('nombreDef');
                    $fechaDef=$this->input->post('fechaDef');
                    $tipoTribunal=$this->input->post('tipoTribunal[]');
                    $tribunal=$this->input->post('tribunal[]');
                    $invitacioncarta=$this->input->post('invitacioncarta[]');
                    // echo json_encode($invitacioncarta);
    
                    $existe=$this->defensa_model->buscar_defensa($realizamono,$nomDefensa,$fechaDef);
                    if ($existe>0) 
                    {
                        redirect('defensa/registroDefensa/3');
                    } 
                    else {
                        $defensa=$this->defensa_model->crearDefensa($realizamono,$nomDefensa,$fechaDef);
                        // echo json_encode($defensa);
        
                        if ($defensa!=null) 
                        {
                            for ($i=0; $i < count($tribunal) ; $i++) 
                            { 
                                $this->defensa_model->crearDesignar_tribunal($defensa,$tribunal[$i],$tipoTribunal[$i],$invitacioncarta[$i]);
                            }
                            $filasAfectadas=$this->db->affected_rows();
                            if($filasAfectadas>0)
                            {
                                // echo "sidefensa";
                                // redirect('defensa/registroDefensa/1');//en ves de esto se imprimira, abajo
                                $data = array(
                                    'eventoDefensa'=>$this->defensa_model->getDefensaTribunal($version,$defensa),
                                    // 'fechayHora'=>$this->getFechayHoraActual()
                                );
                                $this->load->view('v_imprimirpdf/eventos_defensa',$data);
                            }
                            else
                            {
                                // echo "nodefensa";
                                redirect('defensa/registroDefensa/2');
                            }
                        } 
                        else {
                            // echo "nodefensa";
                            redirect('defensa/registroDefensa/4');
                        }
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
    public function crearDefensa_paraPie()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');

                $realizamono=$this->input->post('realizamono');
                $nomDefensa=$this->input->post('nombreDef');
                $fechaDef=$this->input->post('fechaDef');
                $tipoTribunal=$this->input->post('tipoTribunal');
                $tribunal=$this->input->post('tribunal[]');
                $invitacioncarta=$this->input->post('invitacioncarta[]');
                echo json_encode($tipoTribunal);

                // $existe=$this->defensa_model->buscar_defensa($realizamono,$nomDefensa,$fechaDef);
                // if ($existe>0) 
                // {
                //     echo "3";//ya se registro la fecha para defensa
                // } 
                // else {
                //     $defensa=$this->defensa_model->crearDefensa($realizamono,$nomDefensa,$fechaDef);
                //     // echo json_encode($defensa);
    
                //     if ($defensa!=null) 
                //     {
                //         for ($i=0; $i < count($tribunal) ; $i++) 
                //         { 
                //             $this->defensa_model->crearDesignar_tribunal($defensa,$tribunal[$i],$tipoTribunal[$i],$invitacioncarta[$i]);
                //         }
                //         $filasAfectadas=$this->db->affected_rows();
                //         if($filasAfectadas>0)
                //         {
                //             echo "1";//Se Registro Fecha para Defensa
                //             // redirect('defensa/registroDefensa/1');
                //         }
                //         else
                //         {
                //             echo "2";//No se pudo registrar Fecha de Defensa, ni Tribunales
                //             // redirect('defensa/registroDefensa/2');
                //         }
                //     } 
                //     else {
                //         echo "4";//No se Pudo Registrar la Defensa
                //         // redirect('defensa/registroDefensa/4');
                //     }
                // }
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
    public function lista_defensas($tipoDef=null,$indice=null)
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');
                if ($tipoDef==null) 
                {
                    $tipoDef='1';
                } else {
                    $tipoDef=urldecode($tipoDef);
                }
                
                if ($this->input->post()) 
                {
                    $cid=$this->input->post('buscaciD');
                } else {
                    $cid=null;
                }

                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'defensa'=>$this->defensa_model->getDefensa($version,$tipoDef,$cid)
                    // 'tutomono'=>$this->tutoria_model->getTutoria_monografia($version)
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
                            $data['msg']="Se Elimino la Defensa";
                            $this->load->view('plantillas/msg_success',$data);
                        
                        }else if($indice==2)
                        {
                            $data['msg']="No se Pudo Eliminar Defensa";
                            $this->load->view('plantillas/msg_error',$data);
                        }
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('v_defensa/lista_defensas',$data);
                        break;
                    case 'Administrador':
                        $this->load->view('plantillas/menu_administrador',$data);
                        $this->load->view('v_listas_administrador/lista_defensas_admini',$data);
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
    public function getDefensa_tribunal()//para el pie
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');
                $defensa=$this->input->post('iddefensa');
                
                $defensaTrib=$this->defensa_model->getDefensaTribunal($version,$defensa);
                echo json_encode($defensaTrib);
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
    public function getDefensa()//para el pie
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');
                $defensa=$this->input->post('iddefensa');
                
                $defensaTrib=$this->defensa_model->obtenerDefensa_porId($version,$defensa);
                echo json_encode($defensaTrib);
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
    public function getDefensa_porci()//para el pie
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');
                $ciDiplomante=$this->input->post('cidiplo');
                
                $defensa=$this->defensa_model->getDefensa_resutado_sin_nombreDef($version,$ciDiplomante);
                if (empty($defensa)) {
                    echo "vacio";
                } else {
                    echo json_encode($defensa);
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
    public function editarFechaDef()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    break;
                case 'Coordinador':
                    $version=$this->session->userdata('idVersion');

                    $defensa=$this->input->post('defensa');
                    $fecha=$this->input->post('fechad');
                    // echo $carta;
                
                    $this->defensa_model->editar_fechaDef($defensa,$fecha);
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
                        $defensa=$this->defensa_model->obtenerDefensa_porId($version,$defensa);
                        echo json_encode($defensa) ;
                    }
                    else
                    {
                        echo "noeditFechaDef";
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
    public function AsignarNotaDefensa()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    break;
                case 'Coordinador':
                    $version=$this->session->userdata('idVersion');

                    $defensa=$this->input->post('defensa');
                    $nota=$this->input->post('nota');
                    $aprobacion=$this->input->post('aprobacion');
                    $observacion=$this->input->post('observacion');
                    // echo $carta;
                
                    $this->defensa_model->asignarFecha_defensa($defensa,$nota,$aprobacion,$observacion);
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
                        $respuesta=$this->defensa_model->obtenerDefensa_porId($version,$defensa);
                        echo json_encode($respuesta) ;
                    }
                    else
                    {
                        echo "nocalificadoDef";
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
    public function editarTribunal()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    break;
                case 'Coordinador':
                    $version=$this->session->userdata('idVersion');

                    $tribunal=$this->input->post('tribunal');
                    $acadVersion=$this->input->post('academicov');
                    $carta=$this->input->post('cartaA');
                    // echo $carta;
                
                    $this->defensa_model->editarTribunal($tribunal,$acadVersion,$carta);
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
                        // echo "sieditrib";
                        $tribunal=$this->defensa_model->getTribunal($version,$tribunal);
                        echo json_encode($tribunal) ;
                    }
                    else
                    {
                        echo "noeditrib";
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
    public function eliminarDefensa()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    break;
                case 'Coordinador':
                    // echo $carta;
                    $tipod=$this->input->get('tipoD');
                    $defensa=$this->input->get('defensa');
                    $this->defensa_model->eliminar_defensa($defensa);
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
    
                        redirect('defensa/lista_defensas/'.$tipod.'/1');
                    }
                    else
                    {
                        // echo "$modulo";
                        redirect('defensa/lista_defensas/'.$tipod.'/2');
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
    public function tribunal_aleatorio()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    break;
                case 'Coordinador':
                    $version=$this->session->userdata('idVersion');
                    $tipoProf=$this->input->post('tipoProf');
                    // for ($i=0; $i <2 ; $i++) { }
                    $aleatorioTrib=$this->academicoseleccionado_model->getTribunal_aleatorio($version,$tipoProf);
                    // echo json_encode($aleatorioTrib);
                    if(empty($aleatorioTrib))
                    {
                        echo "vacioaleatorio";
                    }
                    else
                    {
                        echo json_encode($aleatorioTrib);
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
    public function obtenerDefensa_porMono()//para el pie
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');
                $mono=$this->input->post('realizamono');
                
                $defensa=$this->defensa_model->obtenerDefensa_porMono($version,$mono);
                if (empty($defensa)) {
                    echo "vacio";
                } else {
                    echo json_encode($defensa);
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
}