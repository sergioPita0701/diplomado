<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academicoseleccionado extends CI_Controller {

    
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
        $this->load->model('academicoseleccionado_model');
    }
    
    public function index()
    {
        
        
    }
    public function buscarAcadSelecc($ciA=null)//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                    case 'Coordinador':
                        if ($ciA==null) 
                        {
                            $ciA=$this->input->post('txtCiA');
                            $numAcademico=$this->academicoseleccionado_model->buscarAcademicoS($ciA);
                            echo $numAcademico;
                        } 
                        else 
                        {
                            $numAcademico=$this->academicoseleccionado_model->buscarAcademicoS($ciA);
                            echo $numAcademico;
                        
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

    public function getAcademicoSelec($cia=null)//se usa para tutoria
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');

                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                    case 'Coordinador':
                        $nombre="";
                        if($cia==null) 
                        {
                            $cia=$this->input->post('ciacad');
                        } 
                        else 
                        {
                            $cia=urldecode($cia);
                        }
                        $academicoselec=$this->academicoseleccionado_model->getAcademicoSeleccionado($version,$cia,$nombre);
                        echo json_encode($academicoselec);
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
    public function getTodosAcademicoSelec()//se usa para tribunal y tutoria
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');

                $academicoselec=$this->academicoseleccionado_model->getAcademicoSeleccionado($version,null,null);
                echo json_encode($academicoselec);
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

    public function registrarAcadSeleccionado($cia=null)//se usa
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $idVersion=$this->session->userdata('idVersion');

                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Secretario':
                        // $this->load->view('plantillas/menu_secretario',$data);
                        break;
                    case 'Coordinador':
                        if ($cia==null) 
                        {
                            $cia=$this->input->post('txtcia');
                            $tipoC=$this->input->post('radiotipocontrato');
                        } else {
                            $cia=urldecode($cia);
                        }
                    
                        $numAS=$this->academicoseleccionado_model->buscarAcademicoS($cia,$idVersion);
                        if ($numAS>0) 
                        {
                            // redirect('academicoseleccionado/lista_seleccionados/2');
                            switch ($tipoC) {
                                case 'Docencia':
                                    redirect('docencia/registroDocencia/'.$cia);
                                    break;
                                case 'Tutoria':
                                    redirect('tutoria/registroTutoriaM/'.$cia);
                                    break;
                                case 'Defenza':
                                    redirect('docencia/registroDocencia/'.$cia);
                                    break;
                                default:
                                    echo '<script> alert("Debe seleccionar una opcion")</script>';   
                                    redirect('academicoseleccionado/lista_seleccionados','refresh');
                                break;
                            }
                        } 
                        else 
                        {
                            $this->academicoseleccionado_model->crearSeleccionA($cia,$idVersion);

                            $filasAfectadas=$this->db->affected_rows();
                            if($filasAfectadas>0)
                            {
                                switch ($tipoC) {
                                    case 'Docencia':
                                        redirect('docencia/registroDocencia/'.$cia);
                                        break;
                                    case 'Tutoria':
                                        redirect('tutoria/registroTutoriaM/'.$cia);
                                        break;
                                    case 'Defenza':
                                        redirect('docencia/registroDocencia/'.$cia);
                                        break;
                                    default:
                                        echo '<script> alert("Debe seleccionar una opcion")</script>';   
                                        redirect('academicoseleccionado/lista_seleccionados','refresh');
                                        break;
                                }
                            }
                            else
                            {
                                // echo "no se inserto contrato";
                                redirect('academicoseleccionado/lista_seleccionados/2');
                            }
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

    public function crearSeleccionAcademico()//recibe datos de pie y crea academcico seleccionado... pie
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $idVersion=$this->session->userdata('idVersion');

                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) 
                {
                    case 'Coordinador':
                        $cia=$this->input->post('citrib');
                        $numAS=$this->academicoseleccionado_model->buscarAcademicoS($cia,$idVersion);
                        if ($numAS>0) 
                        {
                            $academicoseleccionados=$this->academicoseleccionado_model->getAcademicoSeleccionado($idVersion,$cia,null);
                            echo json_encode($academicoseleccionados);
                        }
                        else {
                            $this->academicoseleccionado_model->crearSeleccionA($cia,$idVersion);
                            $filasAfectadas=$this->db->affected_rows();
                            if($filasAfectadas>0)
                            {
                                $academicoseleccionados=$this->academicoseleccionado_model->getAcademicoSeleccionado($idVersion,$cia,null);
                                echo json_encode($academicoseleccionados);
                            }
                            else {
                                echo "nosepuedeinsertaracademico";
                            }
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
    // public function asignar_rol()//arreglar
    // {
    //     $cia=$this->input->post('txtcia');
    //     $tipoC=$this->input->post('radiotipocontrato');

    //     switch ($tipoC) {
    //         case 'Docencia':
    //             redirect('docencia/registroDocencia/'.$cia);
    //             break;
    //         case 'Tutoria':
    //             redirect('tutoria/registroTutoriaM/'.$cia);
    //             break;
    //         case 'Defenza':
    //             redirect('docencia/registroDocencia/'.$cia);
    //             break;
    //         default:
    //             echo '<script> alert("Debe seleccionar una opcion")</script>';   
    //             redirect('academicoseleccionado/lista_seleccionados','refresh');
    //             break;
    //     }
    // }

    public function lista_seleccionados($indice=null)//se usa 
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');

                
                    if ($this->input->post()) 
                    {
                        $busCi=$this->input->post('txtBuscarS');
                        $busNom=$this->input->post('txtBuscarS');
                    }
                    else 
                    {
                        $busCi="";
                        $busNom="";
                    }
                    $data=array(
                        'nombre'=>$this->session->userdata('nombreV'),
                        'modulo'=>$this->modulo_model->getModulo($version),
                        'paralelo'=>$this->paralelo_model->getParalelo($version),
                        // 'academicoProf'=>$this->academicoprofesional_model->getAcademicoProfesional()
                        'academicoseleccionados'=>$this->academicoseleccionado_model->getAcademicoSeleccionado($version,$busCi,$busNom)
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
                            $this->load->view('plantillas/menu_secretario',$data);
                            $this->load->view('v_academico_seleccionado/lista_acad_seleccionados',$data);
                            break;
                        case 'Coordinador':
                            $this->load->view('plantillas/menu_coordinador',$data);
                            $this->load->view('v_academico_seleccionado/lista_acad_seleccionados',$data);
                            break;
                        case 'Administrador':
                            $this->load->view('plantillas/menu_administrador',$data);
                            $this->load->view('v_listas_administrador/academicos_seleccionados',$data);
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