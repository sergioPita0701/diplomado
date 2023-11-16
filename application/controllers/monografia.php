<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monografia extends CI_Controller {

    
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
        $this->load->model('monografia_model');
        $this->load->model('inscripcion_model');
        $this->load->model('mupload');
        $this->load->model('defensa_model');
    }
    
    public function index()
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
                    'inscritos'=>$this->inscripcion_model->getregistroInsripciones($version),
                    // 'diploinscritos'=>$this->inscripcion_model->getregistroInsripciones($version,"sd")
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
                        $this->load->view('v_monografia/nueva_monografia',$data);
                        
                        break;
                    default:
                        echo '<script> alert("El Usuario no inicio Sesion")</script>';    
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

    public function registroMonografia($cia=null,$indice=null)
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');

                if ($cia=='') 
                {
                    $cia=$this->input->post('txtbuscarD');
                }else {
                    $cia=urldecode($cia);
                }
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'inscritos'=>$this->inscripcion_model->getregistroInsripciones($version),
                    'diploinscritos'=>$this->inscripcion_model->getregistroInsripciones($version,$cia)
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador',$data);
        
                $data['tipo']=$this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario',$data);
                        break;
                    case 'Coordinador':
                        if($indice==1)
                        {
                            $data['msg']="Se Registro Monografia del Participante";
                            $this->load->view('plantillas/msg_success',$data);
        
                        }else if($indice==2)
                        {
                            $data['msg']="No se pudo registrar Monografia del Participante";
                            $this->load->view('plantillas/msg_error',$data);
                        }else if($indice==3)
                        {
                            $data['msg']="Ya se seleccionó el Academico!!! revise en detalles de los Academicos seleccionados se borooo noseee";
                            $this->load->view('plantillas/msg_error',$data);
        
                        }
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('v_monografia/nueva_monografia',$data);
                        
                        break;
                    
                    default:{
                        echo '<script> alert("El Usuario no inicio Sesion")</script>';    
                        redirect('autenticacion','refresh');
                        break;
                    }
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

    public function crearMonografia_de_Diplomante()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                    
                    $ciDiplomante= $this->input->post('txtcidiplomante');
                    // $profecionDiplomante=$this->input->post('txtprofesiondiplomante');
                    $tituloMono=$this->input->post('txttituloMono');
                    $fechaInicioMono=$this->input->post('finicioMono');
                    $fechaFinalMono=$this->input->post('ffinalMono');
                    $descripcionMono=$this->input->post('txtdescripcionMono');
                    
                    // echo json_encode($descripcionMono);
                    $existeMono=$this->monografia_model->buscar_monografia($version,$tituloMono,$ciDiplomante);
                    if (empty($existeMono)) 
                    {
                        $monografia=$this->monografia_model->crear_monografia($tituloMono,$fechaInicioMono,$fechaFinalMono,$descripcionMono,$ciDiplomante,$version);
                        // $this->monografia_model->crear_monografia_diplomante($ciDiplomante,$monografia,$version);
    
                        if($monografia=='true')
                        {
                            // redirect('monografia/registroMonografia/'.$ciDiplomante.'/1');
                            echo "simono";
                        }
                        else
                        {
                            // redirect('monografia/registroMonografia/'.$ciDiplomante.'/2');
                            echo "nomono";
                        }
                    } else {
                        echo "nomono";
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
    public function editarMonografia()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version=$this->session->userdata('idVersion');
                    
                    $monografia= $this->input->post('editmonografia');
                    $edittitulo=$this->input->post('edittitulo');
                    $editfechaInicio=$this->input->post('editdesde');
                    $editfechaFinal=$this->input->post('edithasta');
                    $editdescripcion=$this->input->post('editovservacion');
                    
                    // echo json_encode($descripcionMono);
                    $this->monografia_model->editar_monografia($version,$monografia,$edittitulo,$editfechaInicio,$editfechaFinal,$editdescripcion);
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
                        echo "sieditMono";
                    }
                    else
                    {
                        echo "noeditMono";
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
    public function eliminarMonografia()
    {
        if ($this->session->userdata('logueado')) 
        {
            $data['tipo']=$this->session->userdata('tipo');
            switch ($data['tipo']) {
                case 'Secretario':
                    break;
                case 'Coordinador':
                    
                    $monografia=$this->input->get('mono');
                    $this->monografia_model->eliminar_monografia($monografia);
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
    
                        redirect('monografia/lista_monografia/null/1');
                    }
                    else
                    {
                        // echo "$modulo";
                        redirect('monografia/lista_monografia/null/2');
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

    public function getmonografiaDiplomante($cidiplo=null,$monografia=null)//se usa para el pie
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
                        // $tituloMono="";
                        if($cidiplo==null) 
                        {
                            $diplomanteci=$this->input->post('cidiplo');
                        } 
                        else 
                        {
                            $diplomanteci=urldecode($cidiplo);
                        }
                        $diplomante=$this->monografia_model->buscar_monografia($version,null,$diplomanteci);
                        echo json_encode($diplomante);
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

    public function getmonoDiplomante()//se usa para el pie
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
                        $realizamonografia=$this->input->post('realizamono');
                        // echo json_encode($realizamonografia);
                        $reamono=$this->monografia_model->buscar_realizamono($version,$realizamonografia);
                        echo json_encode($reamono);
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
    public function getMonografiaporId()//se usa para el pie
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
                        $monografia=$this->input->post('monografia');
                        // echo json_encode($realizamonografia);
                        $reamono=$this->monografia_model->getMonografia_porId($version,$monografia);
                        echo json_encode($reamono);
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
    public function lista_monografia($ci=null,$indice=null)
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
                    // $cia=urldecode($ci);
                    $cia=$ci;
                }
                $data=array(
                    'nombre'=>$this->session->userdata('nombreV'),
                    'modulo'=>$this->modulo_model->getModulo($version),
                    'paralelo'=>$this->paralelo_model->getParalelo($version),
                    'monografia'=>$this->monografia_model->buscar_realizamono($version)
                    
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
                            $data['msg']="Se Elimino la Monografia del Participante";
                            $this->load->view('plantillas/msg_success',$data);
                        
                        }else if($indice==2)
                        {
                            $data['msg']="No se pudo Eliminar la Monografia del Participante";
                            $this->load->view('plantillas/msg_error',$data);
                        }
                        $this->load->view('plantillas/menu_coordinador',$data);
                        $this->load->view('v_monografia/lista_monografias_sin_tutor',$data);
                        break;
                    case 'Administrador':
                        $this->load->view('plantillas/menu_administrador',$data);
                        $this->load->view('v_listas_administrador/lista_monografias',$data);
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

    // ARCHIVOS MONOGRAFIA CARGAR,DESACARGAR,ELIMINAR
    public function subirMonografiapdf()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado'))
            {
                $config['upload_path']          = './uploads/monografias/';
                $config['allowed_types'] = 'pdf|xlsx|docx';
                $config['max_size'] =       '50048';
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['remove_spaces']=TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('filemonografia'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    echo "noseleccpdf";
                }
                else
                {
                    //Datos del fichero subido
                    $data = $this->upload->data();
                    
                    $idmonografia=$this->input->post('monografia');
                    $archivo = $data['file_name'];
                    $this->mupload->subir_monopdf($idmonografia,$archivo);      
                    $filasAfectadas=$this->db->affected_rows();
                    if($filasAfectadas>0)
                    {
                        echo "subiomonopdf";
                    }
                    else
                    {
                        echo "nosubiomonopdf";
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
    public function downloadmonografiapdf($name)
    {
        $data=file_get_contents('./uploads/monografia/'.$name);
        force_download($name,$data);
    }
    public function eliminar_monografiapdf($pdf=null)
    {
        if ($this->input->post()) {
            $idarchivo=$this->input->post('pdf');
        } else {
            $idarchivo=urldecode($pdf);
        }
        $archivo=$this->mupload->getpdf_poridmono($idarchivo);
        if (!empty($archivo)) 
        {
            $afecterows=$this->mupload->eliminar_monopdf($archivo[0]['idMonografia']);
            if ($afecterows>0) {
                $ruta=$archivo[0]['rutaMonografia'];
                $do = unlink('./uploads/monografias/'.$ruta);
                if($do != true){
                    echo "nosepuedeeliminarpdfmono";
                 }else {
                    echo "siseeliminopdfmono";
                 }
            } else {
                echo "noeliminadeBDmono";
            }
            
            
        } else {
            echo "nohayarchivomono";
        }
    }
    // --------------GRAFICAS----------------
    //----COMPARACION DE MONOGRAFIAS- GRAFICAS---
    public function comparar_monografiapdf($pdf=null)
    {
        if ($this->input->post()) {
            $idarchivo=$this->input->post('monografia');
        } else {
            $idarchivo=urldecode($pdf);
        }
        $archivo=$this->mupload->getpdf_poridmono($idarchivo);
        $listapdf=$this->mupload->getpdf_menosidmod($idarchivo);
        if (!empty($listapdf)) 
        {
            $cadena1 = $archivo[0]['tituloMonografia']; 
            $valor=array();
            $v1=0;
            for ($i=0; $i < count($listapdf); $i++) 
            {  
                $cadena2 = $listapdf[$i]['tituloMonografia'];

                similar_text($cadena1, $cadena2,$percente);
                $v1=number_format($percente,2,",",".");
                if ($v1>70) {
                    $valor[]=$v1;
                    // $valor.= "{v1:'".$v1."'},";
                }
                else{
                    $valor[]=20;
                } 
            }
            $objetivos1 = $archivo[0]['descripcionMo']; 
            $vobj=array();
            $v2=0;
            for ($j=0; $j < count($listapdf); $j++) 
            {  
                $objetivos2 = $listapdf[$j]['descripcionMo'];

                similar_text($objetivos1, $objetivos2,$percente);
                $v2=number_format($percente,2,",",".");
                if ($v2>60) {
                    $vobj[]=$v2;
                }
                else{
                    $valor[]=20;
                }  
            }
            echo json_encode([$archivo,$valor,$vobj]) ;
            // echo $valor;
        } else {
            echo "nohaymonog";
        }
    }
    // -----GRAFICA DE CUANTOS APRUEBAN LA VERSION Y CUANTOS NO------------
    public function grafic_fecha_defensas()
    {
        if ($this->session->userdata('logueado')) 
        {
            if ($this->session->userdata('ingresado')) 
            {
                $version=$this->session->userdata('idVersion');
                $defensas1=$this->defensa_model->getDefensa($version,'1',null,null);
                $defensas2=$this->defensa_model->getDefensa($version,'2',null,null);
                // if (!empty($defensas1)) 
                // {
                //     // for ($i=0; $i < count($defensas1); $i++) 
                //     // {  
                //     //     $fechaDef1[] = $defensas1[$i]['fechaDef'];
                //     // }

                //     if (!empty($defensas2)) {
                //         // for ($j=0; $j < count($defensas2); $j++) 
                //         // {  
                //         //     $fechaDef2[] = $defensas2[$j]['fechaDef'];
                //         // }
                //     } else {
                //         // $fechaDef2[] = 0;
                //         $defensas2=0;
                //     }
                // } else {
                //     // $fechaDef1[] = 0;
                //     $defensas1=0;
                // }
                echo json_encode([$defensas1,$defensas2]) ;
                // echo json_encode($defensas1) ;
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