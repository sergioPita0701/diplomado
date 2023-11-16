<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docencia extends CI_Controller {

    
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
        $this->load->model('docencia_model');
        $this->load->model('academicoseleccionado_model');
    }
    
    public function index()//se usa
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
                    'academico'=>$this->docencia_model->buscarAcademico_paraindex(),
                    'academicoProf'=>$this->docencia_model->buscarAcademico_paraindex("1"),
                    'academicocompleto'=>$this->docencia_model->buscarAcademico_paraindex("2"),
                    'registroDocencias'=>$this->docencia_model->buscarAcademico_paraindex("3"),
                    'academicoseleccionados'=>$this->academicoseleccionado_model->getAcademicoSeleccionado($version)
                    
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
                    default:
                    echo '<script> alert("El Usuario no inicio Sesion")</script>';    
                    redirect('autenticacion','refresh');
                    break;
                }
                
                $this->load->view('v_docencia/nueva_docencia',$data);
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

    public function registroDocencia($ci=null,$indice=null)//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                        // $this->load->view('plantillas/menu_secretario',$data);
                        break;
                    case 'Coordinador':
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
                            'academico'=>$this->academico_model->getAcademico($cia),
                            'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional($cia),
                            'academicocompleto'=>$this->academicoespecialidad_model->get_academico_prof_especialidad($cia),
                            'registroDocencias'=>$this->docencia_model->getParalelo($version,$cia),
                            'academicoseleccionados'=>$this->academicoseleccionado_model->getAcademicoSeleccionado($version)
                        );
                        $this->load->view('plantillas/encabezado');
                        $this->load->view('plantillas/navegador',$data);
                        $this->load->view('plantillas/menu_coordinador',$data);
                        if($indice==1)
                        {
                            $data['msg']="Se Registro Nueva docencia";
                            $this->load->view('plantillas/msg_success',$data);
        
                        }else if($indice==2)
                        {
                            $data['msg']="No Se inserto Docencia, revise detalles porfavor";
                            $this->load->view('plantillas/msg_error',$data);
                        }else if($indice==3)
                        {
                            $data['msg']="Ya se seleccionó el Academico!!! revise en detalles de los Academicos seleccionados se borooo noseee";
                            $this->load->view('plantillas/msg_error',$data);
        
                        }
                        $this->load->view('v_docencia/nueva_docencia',$data);
                        $this->load->view('plantillas/pie');
                    break;
                    default:
                        redirect('autenticacion');
                    break;
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

    public function ListaDocencia($indice=null)//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                // if ($ci==null) 
                // {
                //     $cia=$this->input->post('txtbuscarD');
                // } else {
                //     $cia=urldecode($ci);
                //     // $cia=$ci;
                // }
                
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'registroDocencias'=>$this->docencia_model->getParalelo($version),
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
                if($indice==1)
                {
                    $data['msg']="Se Registro Nueva docencia";
                    $this->load->view('plantillas/msg_success',$data);

                }else if($indice==2)
                {
                    $data['msg']="No Se inserto Docencia, revise detalles porfavor";
                    $this->load->view('plantillas/msg_error',$data);
                }else if($indice==3)
                {
                    $data['msg']="Ya se seleccionó el Academico!!! revise en detalles de los Academicos seleccionados se borooo noseee";
                    $this->load->view('plantillas/msg_error',$data);

                }else if($indice==4)
                {
                    $data['msg']="Se Elimino el Registro de Docencia";
                    $this->load->view('plantillas/msg_success',$data);

                }else if($indice==5)
                {
                    $data['msg']="No se puede Eliminar Docencia";
                    $this->load->view('plantillas/msg_error',$data);
                }

                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario',$data);
                        $this->load->view('v_listas_administrador/lista_docencias',$data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('v_docencia/listaDocencia',$data);
                        break;
                    case 'Administrador':
                        $this->load->view('plantillas/menu_administrador',$data);
                        $this->load->view('v_listas_administrador/lista_docencias',$data);
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

    public function crearDocencia_paralelo()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                        
                        break;
                    case 'Coordinador':
                        $ciAcad=$this->input->post('ciAcadDoc');
                        $modulosele=$this->input->post('modulosele');
                        $paraleloDoc=$this->input->post('paralelosele');
                        $estadodoc=$this->input->post('estadodoc');
                        $contratodoc=$this->input->post('contratodoc');
                        $fechacontratodoc=$this->input->post('fechacontratodoc');
                        $fechainiciodoc=$this->input->post('fechainiciodoc');
                        $fechafindoc=$this->input->post('fechafindoc');
                        $observacionDoc=$this->input->post('observacionDoc');
                    
                        // echo json_encode($observacionDoc);
                    
                        $notieneDocentes=$this->docencia_model->paralelo_sin_docencia($paraleloDoc);
                        $noDoc= json_encode($notieneDocentes);
                        if (empty($notieneDocentes) || $noDoc=='null' || $noDoc=="") //$noDoc!='null'
                        {
                            
                            $this->docencia_model->crear_docencia($version,$ciAcad,$modulosele,$paraleloDoc,$estadodoc,$contratodoc,$fechacontratodoc,$fechainiciodoc,$fechafindoc,$observacionDoc);

                            $filasAfectadas=$this->db->affected_rows();
                            if($filasAfectadas>0)
                            {

                                echo "insertado";
                            }
                            else
                            {
                            
                                echo "noinsertado";
                            }
                        } 
                        else 
                        {
                            //echo $noDoc;
                            echo "noinsertado";
                        }
                        break;
                    default:
                        redirect('autenticacion');
                    break;
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
    public function editarDatos_docencia()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                        
                        break;
                    case 'Coordinador':
                        // $ciAcad=$this->input->post('ciAcadDoc');pensar 
                        // $modulosele=$this->input->post('modulosele');
                        // $paraleloDoc=$this->input->post('paralelosele');
                        $docencia=$this->input->post('docencia');
                        $estadodoc=$this->input->post('estadoc');
                        $contratodoc=$this->input->post('cartadoc');
                        $fechacontratodoc=$this->input->post('fechacarta');
                        $fechainiciodoc=$this->input->post('fechaIni');
                        $fechafindoc=$this->input->post('fechafinal');
                        $observacionDoc=$this->input->post('observacion');
                    
                        // echo json_encode($observacionDoc);
                    
                        $this->docencia_model->editarDetDocencia($version,$docencia,$estadodoc,$contratodoc,$fechacontratodoc,$fechainiciodoc,$fechafindoc,$observacionDoc);
                        
                        $filasAfectadas=$this->db->affected_rows();
                        if($filasAfectadas>0)
                        {
                            echo "editadoDetDoc";
                        }
                        else
                        {
                        
                            echo "noeditadoDetDoc";
                        }
                        break;
                    default:
                        redirect('autenticacion');
                    break;
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
    public function obtenerDatos_docencia()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                
                $docencia=$this->input->post('docencia');
            
                // echo json_encode($observacionDoc);
            
                $datosdeDocencia=$this->docencia_model->geDocencia_porId($version,$docencia);
                echo json_encode($datosdeDocencia);
                        
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
    public function eliminarDocenciaParalelo()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    echo '<script> alert("Usted no tiene permisos para Eliminar Docencias!")</script>';
                    redirect('docencia/ListaDocencia','refresh');
                    break;
                case 'Coordinador':
                    
                    $docencia=$this->input->get('docencia');
                    $paralelo=$this->input->get('paralelo');
                    $this->docencia_model->eliminar_docencia($docencia,$paralelo);
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
                        redirect('docencia/ListaDocencia/4');
                    }
                    else
                    {
                        // echo "$modulo";
                        redirect('docencia/ListaDocencia/5');
                    }
                    
                    break;
                case 'Administrador':
                    echo '<script> alert("Usted no tiene permisos para Eliminar Docencias!")</script>';
                    redirect('docencia/ListaDocencia','refresh');
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
}