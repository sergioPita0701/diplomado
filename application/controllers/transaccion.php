<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaccion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // CARGAR LA LIBRERIA PARA IMPRIMIR
        $this->load->library('pdf_report');

        $this->load->model('transaccion_model');
        $this->load->model('pago_model');

        $this->load->model('version_model');
        $this->load->model('academico_model');
        $this->load->model('diplomante_model');
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
        $this->load->model('descuento_model');
        $this->load->model('inscripcion_model');
    }
    public function index($start = 0, $search = '')
    {
        if (!$this->session->userdata('login')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        $idVersion = $this->session->userdata('idVersion');
        // Calcula el número total de páginas
        $limit = 15;
        $start = $this->input->get('start'); // Obtén el valor de start desde la URL
        $search = $this->input->get('search'); // Obtén el valor de search desde la URL

        // Calcula el número total de páginas
        $totalRowsString = $this->transaccion_model->getTotalTransacciones($idVersion, $search);
        //$totalRows = intval($totalRowsString);
        //$total_paginas = ceil($totalRows / $limit);
        // Asegúrate de que $start no sea negativo
        //$start = max(0, $start);

        $data = array(
            'nombre' => $this->session->userdata('nombreV'),
            'modulo' => $this->modulo_model->getModulo($idVersion),
            'paralelo' => $this->paralelo_model->getParalelo($idVersion),
            'transacciones' => $this->transaccion_model->getTransacciones($idVersion, $search),
            'version' => $this->version_model->getIdVersion($idVersion),
            //'total_paginas' => $total_paginas,
            // 'pagina_actual' => ($start / $limit) + 1 // Calcula el número de página actual

        );
        $data['mensaje'] = $this->session->flashdata('mensaje');
        $data['mensaje'] = $this->session->flashdata('tipo_mensaje');
        // Carga la vista con el mensaje
        $this->load->view('plantillas/mensajes_session', $data);

        //var_dump($data);
        $this->load->view('plantillas/encabezado');
        $this->load->view('plantillas/navegador');


        $data['tipo'] = $this->session->userdata('tipo');
        switch ($data['tipo']) {
            case 'Secretario':
                $this->load->view('plantillas/menu_secretario', $data);
                break;
            case 'Coordinador':
                $this->load->view('plantillas/menu_coordinador', $data);
                break;
            default:
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('autenticacion', 'refresh');
                break;
        }
        $this->load->view('v_transaccion/lista_transacciones', $data);
        $this->load->view('plantillas/pie');
    }

    public function detalle($idTransaccionURl)
    {

        if (!$this->session->userdata('login')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        $idTransaccion = urldecode($idTransaccionURl);
        $idVersion = $this->session->userdata('idVersion');
        $transaccion  = $this->transaccion_model->getTranssacionById($idTransaccion);

        $data = array(
            'nombre' => $this->session->userdata('nombreV'),
            'modulo' => $this->modulo_model->getModulo($idVersion),
            'paralelo' => $this->paralelo_model->getParalelo($idVersion),
            'transaccion' => $transaccion,
            'pagos' => $this->pago_model->getPagosByIdTransaccion($idTransaccion),
            'version' => $this->version_model->getIdVersion($idVersion),
            'descuento' => $this->descuento_model->getDescuentoById($transaccion->idDescuento),
            'asignacionesCount' => $this->inscripcion_model->asignacionesCount($transaccion->idInscripcion),
            'modulosCount' => $this->version_model->modulosCount($idVersion),
        );


        $this->load->view('plantillas/encabezado');
        $this->load->view('plantillas/navegador');
        $data['mensaje'] = $this->session->flashdata('mensaje');
        $data['mensaje'] = $this->session->flashdata('tipo_mensaje');
        // Carga la vista con el mensaje
        $this->load->view('plantillas/mensajes_session', $data);
        $data['tipo'] = $this->session->userdata('tipo');
        switch ($data['tipo']) {
            case 'Secretario':
                $this->load->view('plantillas/menu_secretario', $data);
                break;
            case 'Coordinador':
                $this->load->view('plantillas/menu_coordinador', $data);
                break;
            default:
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('autenticacion', 'refresh');
                break;
        }

        $this->load->view('v_transaccion/detalle_transaccion', $data);

        $this->session->set_flashdata('mensaje', 'no Se registro nueva Pago.');
        $this->load->view('plantillas/mensajes_session');
        $this->load->view('plantillas/pie');
    }
    public function crearPagoTransaccion()
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }

        $this->form_validation->set_rules('txtFechaDepositoPCrear', '', 'required', array('required' => 'La fecha del depósito es requerida.'));
        $this->form_validation->set_rules('txtNumeroDepositoPCrear', 'Numero de Deposito', 'required|is_unique[pago.numeroDepositoP]', array('required' => 'El campo %s es requerido.', 'is_unique' => 'El %s ya está en uso. Proporcione un valor único.'));
        $this->form_validation->set_rules('txtMontoPCrear', '', 'required|numeric|greater_than[0]', array('required' => 'El monto del depósito es requerido.', 'numeric' => 'El monto del depósito debe ser un valor numérico positivo.', 'greater_than' => 'El monto del depósito debe ser un valor numérico positivo.'));
        $this->form_validation->set_rules('txtMonedaPCrear', '', 'required', array('required' => 'La moneda del depósito es requerida.'));
        if ($this->input->post('txtMonedaPCrear') === 'USD') {
            $this->form_validation->set_rules('txtTasaCambioPCrear', '', 'required|numeric|greater_than[0]', array('required' => 'El tipo de cambio es requerido para moneda USD.', 'numeric' => 'El tipo de cambio debe ser un valor numérico positivo.', 'greater_than' => 'El tipo de cambio debe ser un valor numérico positivo.'));
        }

        if ($this->form_validation->run() == FALSE) {

            $this->pagoMensajes(2);
            $this->detalle($this->input->post('txtIdTransaccion'));

            return;
        }
        $data = array(
            'idTransaccion' => $this->input->post('txtIdTransaccion'),
            'fechaDepositoP' => $this->input->post('txtFechaDepositoPCrear'),
            'numeroDepositoP' => $this->input->post('txtNumeroDepositoPCrear'),
            'montoP' => $this->input->post('txtMontoPCrear'),
            'monedaP' => $this->input->post('txtMonedaPCrear'),
            'tasaCambioP' => $this->input->post('txtTasaCambioPCrear'),
            'montoTotalBsP' => $this->input->post('txtMontoTotalBsPCrear'),

        );

        $this->pago_model->crearPagoData($data);
        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {
            // Almacenar el mensaje en una sesión flash
            $this->pagoMensajes(1);

            // Redirigir a la página 'detalle' con el idTransaccion
            redirect('transaccion/detalle/' . $this->input->post('txtIdTransaccion'), 'refresh');
            return;
        } else {
            $this->pagoMensajes(2);
            $this->session->set_flashdata('mensaje', ' seSe registro nueva Pago.');
            redirect('transaccion/detalle/' . $this->input->post('txtIdTransaccion'), 'refresh');
            return;
        }
    }
    public function editarPagoTransaccion()
    {

        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }

        $this->form_validation->set_rules('txtFechaDepositoPEditar', '', 'required', array('required' => 'La fecha del depósito es requerida.'));
        $this->form_validation->set_rules(
            'txtNumeroDepositoPEditar',
            'Numero de Deposito',
            [
                'required',
                [
                    'check_unique',
                    function ($value) {
                        // Obtiene el id del pago actual (puedes ajustar según tu estructura)
                        $currentPaymentId = $this->input->post('txtIdPagoEditar');

                        // Verifica si el número de depósito es único, excluyendo el pago actual
                        return $this->is_unique_except('pago.numeroDepositoP', $value, $currentPaymentId);
                    },
                ],
            ],
            [
                'required' => 'El campo %s es requerido.',
                'check_unique' => 'El %s ya está en uso. Proporcione un valor único.',
            ]
        );
        $this->form_validation->set_rules('txtMontoPEditar', '', 'required|numeric|greater_than[0]', array('required' => 'El monto del depósito es requerido.', 'numeric' => 'El monto del depósito debe ser un valor numérico positivo.', 'greater_than' => 'El monto del depósito debe ser un valor numérico positivo.'));
        $this->form_validation->set_rules('txtMonedaPEditar', '', 'required', array('required' => 'La moneda del depósito es requerida.'));
        if ($this->input->post('txtMonedaPEditar') === 'USD') {
            $this->form_validation->set_rules('txtTasaCambioPEditar', '', 'required|numeric|greater_than[0]', array('required' => 'El tipo de cambio es requerido para moneda USD.', 'numeric' => 'El tipo de cambio debe ser un valor numérico positivo.', 'greater_than' => 'El tipo de cambio debe ser un valor numérico positivo.'));
        }

        if ($this->form_validation->run() == FALSE) {

            $this->pagoMensajes(2);
            $this->detalle($this->input->post('txtIdTransaccion'));

            return;
        }
        $data = array(
            'idTransaccion' => $this->input->post('txtIdTransaccion'),
            'fechaDepositoP' => $this->input->post('txtFechaDepositoPEditar'),
            'numeroDepositoP' => $this->input->post('txtNumeroDepositoPEditar'),
            'montoP' => $this->input->post('txtMontoPEditar'),
            'monedaP' => $this->input->post('txtMonedaPEditar'),
            'tasaCambioP' => $this->input->post('txtTasaCambioPEditar'),
            'montoTotalBsP' => $this->input->post('txtMontoTotalBsPEditar'),

        );


        $idPago = $this->input->post('txtIdPagoEditar');
        $this->pago_model->editarPagoData($data, $idPago);
        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {
            // Almacenar el mensaje en una sesión flash
            $this->pagoMensajes(5);

            // Redirigir a la página 'detalle' con el idTransaccion
            redirect('transaccion/detalle/' . $this->input->post('txtIdTransaccion'), 'refresh');
            return;
        } else {
            $this->pagoMensajes(6);
            redirect('transaccion/detalle/' . $this->input->post('txtIdTransaccion'), 'refresh');
            return;
        }
    }
    public function eliminarPagoTransaccion($idPagoUrl, $idTransaccionURL)
    {

        if (!$this->session->userdata('login')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        $idPago = urldecode($idPagoUrl);
        $idTransaccion = urldecode($idTransaccionURL);

        $this->pago_model->eliminarPagoById($idPago);
        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {
            $this->pagoMensajes(3);

            redirect('transaccion/detalle/' . $idTransaccion, 'refresh');
        } else {
            $this->pagoMensajes(4);
            redirect('transaccion/detalle/' . $idTransaccion, 'refresh');
        }
    }
    public function listaTransaccionesImprimir($idVersionUrl)
    {
        if (!$this->session->userdata('login')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        $idVersion = urldecode($idVersionUrl);
        $data['tipo'] = $this->session->userdata('tipo');
        $data['nombre'] = $this->session->userdata('nombreV');
        $transaccion =  $this->transaccion_model->getTransacciones($idVersion);
        $data = array(
            'transacciones' => $transaccion,
            'version' => $this->version_model->getIdVersion($idVersion),
            'asignacionesCount' => $this->inscripcion_model->asignacionesCount($transaccion->idInscripcion),
            'modulosCount' => $this->version_model->modulosCount($idVersion),
        );

        $this->load->view('v_imprimirpdf/lista_transacciones_pdf', $data);

        //redirect('transaccion', 'refresh');

        return;
    }
    public function listaPagoTransaccionesImprimir($idVersionUrl, $idTransaccionURl)
    {
        if (!$this->session->userdata('login')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        $idVersion = urldecode($idVersionUrl);
        $idTransaccion = urldecode($idTransaccionURl);
        if ($idTransaccion == null) {
            echo '<script> alert("No se encontró la transaccion!")</script>';
            redirect('transaccion/detalle', 'refresh');
        }
        if ($idVersion == null) {
            echo '<script> alert("No se encontró la version!")</script>';
            redirect('transaccion/detalle', 'refresh');
        }
        $data['tipo'] = $this->session->userdata('tipo');
        $data['nombre'] = $this->session->userdata('nombreV');
        $transaccion =  $this->transaccion_model->getTranssacionById($idTransaccion);
        $data = array(
            'transaccion' => $transaccion,
            'version' => $this->version_model->getIdVersion($idVersion),
            'pagos' => $this->pago_model->getPagosByIdTransaccion($idTransaccion),
            'asignacionesCount' => $this->inscripcion_model->asignacionesCount($transaccion->idInscripcion),
            'modulosCount' => $this->version_model->modulosCount($idVersion),
        );
     
        $this->load->view('v_imprimirpdf/lista_transacciones_pagos_pdf', $data);

        //redirect('transaccion', 'refresh');

        return;
    }


    public function pagoMensajes($indice = null)
    {
        $mensaje = "";
        $tipo = "";

        if ($indice == 1) {
            $mensaje = "Se registró un nuevo Pago.";
            $tipo = "success";
        } else if ($indice == 2) {
            $mensaje = "No es posible registrar el Pago. Revise los datos.";
            $tipo = "danger";
        } else if ($indice == 3) {
            $mensaje = "Se eliminó el Pago.";
            $tipo = "success";
        } else if ($indice == 4) {
            $mensaje = "No es posible eliminar el Pago.";
            $tipo = "danger";
        } else if ($indice == 5) {
            $mensaje = "Se editó el Pago.";
            $tipo = "success";
        } else if ($indice == 6) {
            $mensaje = "No es posible editar el Pago.";
            $tipo = "danger";
        }

        // Guarda el mensaje y el tipo en flashdata
        $this->session->set_flashdata('mensaje', $mensaje);
        $this->session->set_flashdata('tipo_mensaje', $tipo);
    }

    function is_unique_except($field, $value, $currentId)
    {
        $this->db->where($field, $value);
        $this->db->where_not_in('idPago', $currentId);
        $query = $this->db->get('pago');

        return $query->num_rows() === 0;
    }
}
