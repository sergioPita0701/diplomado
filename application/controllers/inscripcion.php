<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inscripcion extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('diplomante_model');
        $this->load->model('inscripcion_model');
        $this->load->model('version_model');
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
        $this->load->model('modulodiplomante_model');
        $this->load->model('profesion_model');
        $this->load->model('calificacion_model');
        $this->load->model('descuento_model');
        $this->load->model('transaccion_model');
        $this->load->model('pago_model');
    }

    public function index()
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version = $this->session->userdata('idVersion');

                $data = array(
                    'nombre' => $this->session->userdata('nombreV'),
                    'ultinscrito' => $this->inscripcion_model->ultInscripcion($version),
                    'modulo' => $this->modulo_model->getModulo($version),
                    'paralelo' => $this->paralelo_model->getParalelo($version),
                    'profesion' => $this->profesion_model->getProfesion(),
                    // 'version'=>$this->version_model->getVersiones(),
                    'diplomante' => $this->diplomante_model->getDiplomante("nada"), // haceeeer para que inicien por defecto sin ningun valor
                    'inscritos' => $this->inscripcion_model->getregistroInsripciones($version),
                    'descuentos' => $this->descuento_model->getDescuentosActivos(),
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador', $data);

                $data['tipo'] = $this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario', $data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador', $data);
                        break;
                    default:
                        redirect('autenticacion');
                        break;
                }
                $this->load->view('v_inscripcion/inscripcion', $data);
                // $this->load->view('v_inscripcion/registroInscripcion',$data);
                $this->load->view('plantillas/pie');
            } else {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv', 'refresh');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
    public function inscripciones($ciP = null, $indice = null) //se usa
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version = $this->session->userdata('idVersion');
                if ($version == null) {
                    redirect('version/ingresarv', 'refresh');
                }
                if ($ciP == null) {
                    $data = array(
                        'nombre' => $this->session->userdata('nombreV'),
                        'ultinscrito' => $this->inscripcion_model->ultInscripcion($version),
                        'modulo' => $this->modulo_model->getModulo($version),
                        'paralelo' => $this->paralelo_model->getParalelo($version),
                        'profesion' => $this->profesion_model->getProfesion(),
                        'diplomante' => $this->diplomante_model->getDiplomante("nada"),
                        // 'dnoinscrito'=>$this->diplomante_model->getDiplomante(),
                        'inscritos' => $this->inscripcion_model->getregistroInsripciones($version),
                        'descuentos' => $this->descuento_model->getDescuentosActivos(),
                        'version'  => $this->version_model->getIdVersion($version),
                    );


                    $this->load->view('plantillas/encabezado');
                    $this->load->view('plantillas/navegador', $data);

                    $data['tipo'] = $this->session->userdata('tipo');
                    switch ($data['tipo']) {
                        case 'Secretario':
                            $this->load->view('plantillas/menu_secretario', $data);
                            break;
                        case 'Coordinador':
                            $this->load->view('plantillas/menu_coordinador', $data);
                            break;
                        default:
                            redirect('autenticacion');
                            break;
                    }
                    if ($indice == 1) {

                        $data['msg'] = "Se registro nueva Inscripcion.";
                        $this->load->view('plantillas/msg_success', $data);
                    } else if ($indice == 2) {
                        $data['msg'] = "No es posible registrar Inscripcion.El diplomante ya esta Registrado";
                        $this->load->view('plantillas/msg_error', $data);
                    } else if ($indice == 3) {
                        $data['msg'] = "Se Elimino registro de Inscripcion.";
                        $this->load->view('plantillas/msg_success', $data);
                    } else if ($indice == 4) {
                        $data['msg'] = "No es posible Eliminar Inscripcion.";
                        $this->load->view('plantillas/msg_error', $data);
                    }
                    $this->load->view('v_inscripcion/inscripcion', $data);
                    // $this->load->view('v_inscripcion/registroInscripcion',$data);

                } else {
                    $data = array(
                        'nombre' => $this->session->userdata('nombreV'),
                        'ultinscrito' => $this->inscripcion_model->ultInscripcion($version),
                        'modulo' => $this->modulo_model->getModulo($version),
                        'paralelo' => $this->paralelo_model->getParalelo($version),
                        'profesion' => $this->profesion_model->getProfesion(),
                        // 'version'=>$this->version_model->getVersiones(),
                        'diplomante' => $this->diplomante_model->getDiplomante($ciP),
                        'dnoinscrito' => $this->diplomante_model->getDiplomante(),
                        'inscritos' => $this->inscripcion_model->getregistroInsripciones($version),
                        'descuentos' => $this->descuento_model->getDescuentosActivos(),
                        'version'  => $this->version_model->getIdVersion($version),
                    );
                    $this->load->view('plantillas/encabezado');
                    $this->load->view('plantillas/navegador', $data);

                    $data['tipo'] = $this->session->userdata('tipo');
                    switch ($data['tipo']) {
                        case 'Secretario':
                            $this->load->view('plantillas/menu_secretario', $data);
                            break;
                        case 'Coordinador':
                            $this->load->view('plantillas/menu_coordinador', $data);
                            break;
                        default:
                            redirect('autenticacion');
                            break;
                    }
                    if ($indice == 1) {

                        $data['msg'] = "Se registro nueva Inscripcion.";
                        $this->load->view('plantillas/msg_success', $data);
                    } else if ($indice == 2) {
                        $data['msg'] = "No es posible registrar Inscripcion.El diplomante ya esta Registrado";
                        $this->load->view('plantillas/msg_error', $data);
                    } else if ($indice == 3) {
                        $data['msg'] = "Se Elimino registro de Inscripcion.";
                        $this->load->view('plantillas/msg_success', $data);
                    } else if ($indice == 4) {
                        $data['msg'] = "No es posible Eliminar Inscripcion.";
                        $this->load->view('plantillas/msg_error', $data);
                    }
                    $this->load->view('v_inscripcion/inscripcion');
                    // $this->load->view('v_inscripcion/registroInscripcion',$data);
                }
                $this->load->view('plantillas/pie');
            } else {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv', 'refresh');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
    public function registroInscripciones($indice = null) //se usa
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version = $this->session->userdata('idVersion');
                $data = array(
                    'nombre' => $this->session->userdata('nombreV'),
                    'modulo' => $this->modulo_model->getModulo($version),
                    'paralelo' => $this->paralelo_model->getParalelo($version),
                    'inscripcion' => $this->inscripcion_model->getregistroInsripciones($version),
                    'numeroInscritos' => $this->inscripcion_model->numeroInscritos($version),
                    'version'  => $this->version_model->getIdVersion($version),
                    'descuentos' => $this->descuento_model->getDescuentosActivos(),
                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador', $data);

                $data['tipo'] = $this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario', $data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador', $data);
                        break;
                    default:
                        echo '<script> alert("El Usuario no inicio Sesion")</script>';
                        redirect('autenticacion', 'refresh');
                        break;
                }
                if ($indice == 1) {
                    $data['msg'] = "Se registro nueva Inscripcion.";
                    $this->load->view('plantillas/msg_success', $data);
                } else if ($indice == 2) {
                    $data['msg'] = "No es posible registrar Inscripcion.El Alumno ya esta Registrado";
                    $this->load->view('plantillas/msg_error', $data);
                } else if ($indice == 3) {
                    $data['msg'] = "Se Elimino registro de Inscripcion.";
                    $this->load->view('plantillas/msg_success', $data);
                } else if ($indice == 4) {
                    $data['msg'] = "No es posible Eliminar Inscripcion, es posible que el Alumno ya tenga asignada una calificacion!.";
                    $this->load->view('plantillas/msg_error', $data);
                }
                // $this->load->view('v_inscripcion/inscripcion',$data);
                $this->load->view('v_inscripcion/registroInscripcion', $data);
                $this->load->view('plantillas/pie');
            } else {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv', 'refresh');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }

    public function insertarInscripcion() //se usa
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
        {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        //inscripcion
        $this->form_validation->set_rules('txtNumI', '', 'required', array('required' => 'El No. de Inscripción es requerido.'));
        $this->form_validation->set_rules('radioSexoI', 'Sexo', 'required', array('required' => 'El campo %s es requerido.'));
        $this->form_validation->set_rules('txtPaisNacI', 'Pais de Nacimiento', 'required', array('required' => 'El campo %s es requerido.'));
        $this->form_validation->set_rules('txtfechaNacI', 'Fecha de Nacimiento', 'required', array('required' => 'El campo %s es requerido.'));
        $this->form_validation->set_rules('estadoCivil', 'Estado Civil', 'required', array('required' => 'El campo %s es requerido.'));
        $this->form_validation->set_rules('txtFechaInscI', 'Fecha de Inscripcion', 'required', array('required' => 'El campo %s es requerido.'));
        //|is_unique[users.email]
        //pago   
        $this->form_validation->set_rules('txtFechaDepositoP', 'Fecha de Deposito', 'required', array('required' => 'El campo %s es requerido.'));
        $this->form_validation->set_rules('txtNumeroDepositoP', 'Numero de Deposito', 'required|is_unique[pago.numeroDepositoP]', array('required' => 'El campo %s es requerido.', 'is_unique' => 'El %s ya está en uso. Proporcione un valor único.'));
        $this->form_validation->set_rules('txtMontoP', 'Monto', 'required', array('required' => 'El campo %s es requerido.'));
        $this->form_validation->set_rules('txtMonedaP', 'Moneda', 'required', array('required' => 'El campo %s es requerido.'));
        //$this->form_validation->set_rules('txtMontoTotalBsP', 'Monto Total', 'required', array('required' => 'El campo %s es requerido.'));
        if ($this->input->post('txtMonedaP') === 'USD') {
            $this->form_validation->set_rules('txtTasaCambioP', '', 'required|numeric|greater_than[0]', array('required' => 'El tipo de cambio es requerido para moneda USD.', 'numeric' => 'El tipo de cambio debe ser un valor numérico positivo.', 'greater_than' => 'El tipo de cambio debe ser un valor numérico positivo.'));
        }
        $IdVersion = $this->input->post('txtIdVersion');
        $version = $this->version_model->getIdVersion($IdVersion);

        $montoMinimoPrimerPago = $version->montoMinPrimerPagoV;
        // $this->form_validation->set_rules(
        //     'txtMontoTotalBsP',
        //     'Monto Total',
        //     'required|numeric|greater_than_or_equal[' . $montoMinimoPrimerPago . ']',
        //     array(
        //         'required' => 'El tipo de cambio es requerido para moneda USD.',
        //         'numeric' => 'El tipo de cambio debe ser un valor numérico positivo.',
        //         'greater_than_or_equal' => 'El monto debe ser mayor o igual al monto mínimo del primer pago (' . $montoMinimoPrimerPago . ' Bs). Tu monto es: %s'
        //     )
        // );
        // var_dump($this->input->post('txtMontoTotalBsP'));
        // var_dump($montoMinimoPrimerPago);
        // var_dump($this->form_validation->run());
        // var_dump($this->form_validation->error_array());
        // return;
        if ($this->form_validation->run() == FALSE) {
            $ciI = $this->input->post('txtCiI');
            $this->inscripciones($ciI);
            return;
        }


        $cidiplomante = $this->input->post('txtCiI');

        $inscripcionEncontrada = $this->inscripcion_model->buscar_inscripcion($IdVersion, $cidiplomante);
        if ($inscripcionEncontrada) {
            redirect('inscripcion/inscripciones/' . nada . '/2');
        } else {
            // $modulo=$this->input->post('txtmodulo');

            $numI = $this->input->post('txtNumI');
            $ciI = $this->input->post('txtCiI');
            $sexoI = $this->input->post('radioSexoI');
            $paisNacI = $this->input->post('txtPaisNacI');
            $departNacI = $this->input->post('txtDepNacI');
            $fechaNacI = $this->input->post('txtfechaNacI');
            $estadoCivilI = $this->input->post('estadoCivil');
            $direccionI = $this->input->post('txtDireccionI');
            $telefonoI = $this->input->post('txtTelefonoI');
            $celularI = $this->input->post('txtCelularI');
            $emailI = $this->input->post('txtEmailI');
            $fInscripcionI = $this->input->post('txtFechaInscI');

            $idDiplomante = $this->diplomante_model->getDiplomanteByCiD($ciI);
            if ($idDiplomante == null) {
                //     $idDiplomante = $this->diplomante_model->registrarDiplomante($ciI, $sexoI, $paisNacI, $departNacI, $fechaNacI, $estadoCivilI, $direccionI, $telefonoI, $celularI, $emailI);
                return;
            }
            // Datos a insertar en la tabla 'inscripcion'
            $dataInscripcion = array(
                'idVersion' => $IdVersion,
                'idDiplomante' => $idDiplomante->idDiplomante,
                'numeroI' => 'I-' . $numI,
                'ciI' => $ciI,
                'sexoI' => $sexoI,
                'paisnacI' => $paisNacI,
                'departamentonacI' => $departNacI,
                'fechanacI' => $fechaNacI,
                'estadoCivilI' => $estadoCivilI,
                'direccionI' => $direccionI,
                'telefonoI' => $telefonoI,
                'celularI' => $celularI,
                'emailI' => $emailI,
                'fechaInscripcionI' => $fInscripcionI
            );

            $idInscripcion = $this->inscripcion_model->registrarInscripcionData($dataInscripcion);

            // $version = $this->version_model->getIdVersion($IdVersion);
            $idDescuento = $this->input->post('idDescuentoSeleccionado');
            if ($idDescuento == null) {
                $idDescuento = 0;
            }
            $montoDescuentoT = $this->input->post('txtMontoDescuentoT');
            $dataTransaccion = array(
                'idDescuento' => $idDescuento,
                'idInscripcion' => $idInscripcion,
                'montoOriginalT' => $version->costoV,
                'montoDescuentoT' => $montoDescuentoT,
                'estadoT' => 'activo',
            );


            $idTransaccion = $this->transaccion_model->crearTransaccionData($dataTransaccion);
            $dataPago = array(
                'idTransaccion' => $idTransaccion,
                'fechaDepositoP' =>  $this->input->post('txtFechaDepositoP'),
                'numeroDepositoP' => $this->input->post('txtNumeroDepositoP'),
                'montoP' => $this->input->post('txtMontoP'),
                'monedaP' => $this->input->post('txtMonedaP'),
                'tasaCambioP' => $this->input->post('txtTasaCambioP'),
                'montoTotalBsP' => $this->input->post('txtMontoTotalBsP')
            );
            $idPago = $this->pago_model->crearPagoData($dataPago);

            $filasAfectadas = $this->db->affected_rows();
            // $this->modulodiplomante_model->asignacion_modulo_diplomante($modulo,$ciI);

            if ($filasAfectadas > 0) {
                // redirect('inscripcion/inscripciones/'.nada.'/1');
                redirect('diplomante/detalleDiplomante_completo/' . $ciI . '/1');
            } else {
                redirect('inscripcion/inscripciones/' . nada . '/2');
            }
        }
    }
    public function eliminarInscripcion() // se usa
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) {
                $version = $this->session->userdata('idVersion');
                $ciI = $this->input->post('ciDiplomante');
                $numI = $this->input->post('numInscripcion');
                // echo $numI;
                $tienenota = $this->calificacion_model->ver_tieneNota($version, $ciI, $numI); //se anadio esta filas 1 NOOO FUNCIONA IGUAL ELIMINA REV. :((
                // echo json_encode($tienenota);
                if (empty($tienenota)) { //se anadio esta filas 2
                    echo json_encode($tienenota);
                    $eliminado = $this->inscripcion_model->eliminarInscripcion($version, $ciI, $numI);
                    if ($eliminado) {
                        redirect('inscripcion/registroInscripciones/3');
                    } else {
                        redirect('inscripcion/registroInscripciones/4');
                    }
                } else { //se anadio esta filas 3
                    redirect('inscripcion/registroInscripciones/4');
                }
            } else {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv', 'refresh');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
    public function buscarInscripcion($ci = null) //no se usa?
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version = $this->session->userdata('idVersion');
                $data = array(
                    'inscripcion' => $this->inscripcion_model->getInscripcion($version, $ci)
                );
            } else {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv', 'refresh');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
    public function editarInscripcion() //se usa 
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version = $this->session->userdata('idVersion');
                $ciI = $this->input->post('textociDI');
                $numI = $this->input->post('textoNumI');
                $paisNacI = $this->input->post('textoPaisnacI');
                $departNacI = $this->input->post('textoDepanacI');
                $fechaNacI = $this->input->post('textoFechanacI');
                $sexoI = $this->input->post('radioESexoI');
                $estadoCivilI = $this->input->post('selectestadoCivil');
                $direccionI = $this->input->post('textoDireccionI');
                $telefonoI = $this->input->post('textoTelefonoI');
                $celularI = $this->input->post('textoCelularI');
                $emailI = $this->input->post('textoEmailI');
                $fInscripcionI = $this->input->post('textoFechaI');

                // echo $fInscripcionI;

                $this->inscripcion_model->editarInscripcion($ciI, $numI, $paisNacI, $departNacI, $fechaNacI, $sexoI, $estadoCivilI, $direccionI, $telefonoI, $celularI, $emailI, $fInscripcionI, $version);
                $filasAfectadas = $this->db->affected_rows();
                if ($filasAfectadas > 0) {
                    $diplom = $this->inscripcion_model->getregistroInsripciones($version, $ciI);
                    echo json_encode($diplom);
                } else {
                    echo false;
                }
            } else {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv', 'refresh');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }

    public function fechaActual() //no se usa, esta en el pie de comentario
    {
        if ($this->session->userdata('logueado')) {
            $fecha = $this->input->post('fechaactual');

            $inscripcion = $this->inscripcion_model->inscripcionesAlDia($fecha);
            echo Json_encode($inscripcion);
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }

    public function nueva_profesion() //se usa
    {
        if ($this->session->userdata('logueado')) {
            $this->load->view('v_profesion/nueva_profesion');
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }

    public function detalleDiplomante_inscrito($ciP, $indice = null)
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) //hacer la prueba, si no funciona polocar :$this->session->userdata('ingresado')
            {
                $version = $this->session->userdata('idVersion');
                $ciP = urldecode($ciP);
                $data = array(
                    'nombre' => $this->session->userdata('nombreV'),
                    'modulo' => $this->modulo_model->getModulo($version),
                    'paralelo' => $this->paralelo_model->getParalelo($version),
                    'profesion' => $this->profesion_model->getProfesion(),
                    // 'version'=>$this->version_model->getVersiones(),
                    'diplomante' => $this->diplomante_model->getDiplomante($ciP),
                    'version'  => $this->version_model->getIdVersion($version),
                    'diplomanteinscrito' => $this->inscripcion_model->getregistroInsripciones($version, $ciP)

                );
                $this->load->view('plantillas/encabezado');
                $this->load->view('plantillas/navegador', $data);

                $data['tipo'] = $this->session->userdata('tipo');
                switch ($data['tipo']) {
                    case 'Secretario':
                        $this->load->view('plantillas/menu_secretario', $data);
                        break;
                    case 'Coordinador':
                        $this->load->view('plantillas/menu_coordinador', $data);
                        break;
                    case 'Administrador':
                        $this->load->view('plantillas/menu_administrador', $data);
                        break;
                    default:
                        redirect('autenticacion');
                        break;
                }
                if ($indice == 1) {

                    $data['msg'] = "Se registro nueva Inscripcion.";
                    $this->load->view('plantillas/msg_success', $data);
                } else if ($indice == 2) {
                    $data['msg'] = "No es posible registrar Inscripcion.El diplomante ya esta Registrado";
                    $this->load->view('plantillas/msg_error', $data);
                } else if ($indice == 3) {
                    $data['msg'] = "Se Elimino registro de Inscripcion.";
                    $this->load->view('plantillas/msg_success', $data);
                } else if ($indice == 4) {
                    $data['msg'] = "No es posible Eliminar Inscripcion.";
                    $this->load->view('plantillas/msg_error', $data);
                }
                $this->load->view('v_inscripcion/detalle_diplomanteI', $data);

                $this->load->view('plantillas/pie');
            } else {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv', 'refresh');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }

    // MUESTRA LA OPCION DE INSCRIPCION DURANTE LAS FECHAS ESTABLECIDAS
    public function habilitar_inscripcion()
    {
        if ($this->session->userdata('logueado')) {
            if ($this->session->userdata('ingresado')) {
                $version = $this->session->userdata('idVersion');
                $fechainsc = $this->input->post('fechainscripcion');

                $inscripcion = $this->version_model->habilitarfechaInscripcion($version, $fechainsc);
                $filasAfectadas = $this->db->affected_rows();
                if ($filasAfectadas > 0) {
                    echo true;
                } else {
                    echo false;
                }
            } else {
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('version/ingresarv', 'refresh');
            }
        } else {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
    }
}

/* End of file Controllername.php */