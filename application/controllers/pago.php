<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pago extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pago_model');
        $this->load->model('academico_model');
        $this->load->model('transaccion_model');

        $this->load->model('version_model');
        $this->load->model('diplomante_model');
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
        $this->load->model('inscripcion_model');
    }

    public function index()
    {
        if (!$this->session->userdata('login')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }

        $version = $this->session->userdata('idVersion');
        $data = array(
            'nombre' => $this->session->userdata('nombreV'),
            'modulo' => $this->modulo_model->getModulo($version),
            'paralelo' => $this->paralelo_model->getParalelo($version),
            'pagos' => $this->pago_model->getPagos()
        );
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
        $this->load->view('v_pago/lista_pagos', $data);
        $this->load->view('plantillas/pie');
    }
    public function formCrearPago($idTransaccion)
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        // Descomenta estas líneas para depurar y ver los valores recibidos.

        $idTransaccion = urldecode($idTransaccion);


        $version = $this->session->userdata('idVersion');
        $diplomante = $this->diplomante_model->getDiplomante($ciP);
        $inscripcion = $this->inscripcion_model->getIDInscripcion($idI);
        if (empty($diplomante) || empty($inscripcion)) {
            echo '<script> alert("El Alumno no esta registrado en esta version")</script>';
            redirect('version/ingresarv', 'refresh');
        }


        $data = array(
            'nombre' => $this->session->userdata('nombreV'),
            'version' => $this->version_model->getIdVersion($version),
            'modulo' => $this->modulo_model->getModulo($version),
            'paralelo' => $this->paralelo_model->getParalelo($version),
            'pagos' => $this->pago_model->getPagos(),
            'diplomante' => $diplomante,
            'inscripcion' => $idI
        );
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
        $this->load->view('v_pago/crear_pago', $data);
        $this->load->view('plantillas/pie');
    }

    public function detalle($idTransaccion = null)
    {

        if (!$this->session->userdata('login')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }

        $idTransaccion = urldecode($idTransaccion);
        $idVersion = $this->session->userdata('idVersion');

        $data = array(
            'nombre' => $this->session->userdata('nombreV'),
            'modulo' => $this->modulo_model->getModulo($idVersion),
            'paralelo' => $this->paralelo_model->getParalelo($idVersion),
            'transaccion' => $this->transaccion_model->getTranssacionById($idTransaccion),
            'pagos' => $this->pago_model->getPagosByIdTransaccion($idTransaccion),
        );
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

        $this->load->view('v_transaccion/detalle_transaccion', $data);
        $this->load->view('plantillas/pie');
    }
    public function crearPago()
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }


        $this->form_validation->set_rules('txtFechaDepositoP', '', 'required', array('required' => 'La fecha del depósito es requerida.'));
        $this->form_validation->set_rules('txtNumeroDepositoP', '', 'required|numeric|greater_than[0]', array('required' => 'El número del depósito es requerido.', 'numeric' => 'El número del depósito debe ser un valor numérico positivo.', 'greater_than' => 'El número del depósito debe ser un valor numérico positivo.'));

        $this->form_validation->set_rules('txtMontoP', '', 'required|numeric|greater_than[0]', array('required' => 'El monto del depósito es requerido.', 'numeric' => 'El monto del depósito debe ser un valor numérico positivo.', 'greater_than' => 'El monto del depósito debe ser un valor numérico positivo.'));
        $this->form_validation->set_rules('txtMonedaP', '', 'required', array('required' => 'La moneda del depósito es requerida.'));
        if ($this->input->post('txtMonedaP') == 'USD') {
            $this->form_validation->set_rules('txtTasaCambioP', '', 'required|numeric|greater_than[0]', array('required' => 'El tipo de cambio es requerido para moneda USD.', 'numeric' => 'El tipo de cambio debe ser un valor numérico positivo.', 'greater_than' => 'El tipo de cambio debe ser un valor numérico positivo.'));
        }
        if ($this->form_validation->run() == FALSE) {
            $this->multaMensajes(2);
            $this->detalle($idTransaccion);
            return;
        }
        $idTransaccion = $this->input->post('txtIdTransaccion');
        $data = array(
            'idTransaccion' => $idTransaccion,
            'fechaDepositoP' => $this->input->post('txtFechaDepositoP'),
            'numeroDepositoP' => $this->input->post('txtNumeroDepositoP'),
            'montoP' => $this->input->post('txtMontoP'),
            'monedaP' => $this->input->post('txtMonedaP'),
            'tasaCambioP' => $this->input->post('txtTasaCambioP')
        );


        $this->pago_model->crearPagoData($data);
        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {

            $this->pagoMensajes(1);
            $this->detalle($idTransaccion);
        } else {
            $this->pagoMensajes(2);
            $this->detalle($idTransaccion);
        }
    }
    public function editarPago()
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        $idPago = $this->input->post('txtIdD');
        $nombreD = $this->input->post('txtNombreD');
        $descripcionD = $this->input->post('txtDescripcionD');
        $procentajeD = $this->input->post('txtPorcentajeD');
        $estadoD = $this->input->post('txtEstadoD');
        $this->pago_model->editarPago($idPago, $nombreD, $descripcionD, $procentajeD, $estadoD);
        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {
            redirect('pago/descuentoMensajes/5');
        } else {
            redirect('pago/descuentoMensajes/6');
        }
    }

    public function eliminarPago()
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        $idPago = $this->input->get('idPago');
        $this->pago_model->eliminarPago($idPago);
        $filasAfectadas = $this->db->affected_rows();
        if ($filasAfectadas > 0) {
            redirect('pago/descuentoMensajes/3');
        } else {
            redirect('pago/descuentoMensajes/4');
        }
    }
    public function detallePagoDiplomante($id)
    {
        if (!$this->session->userdata('login')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }

        $version = $this->session->userdata('idVersion');
        $ciP = urldecode($id);
        $diplomanteinscrito = $this->inscripcion_model->getregistroInsripciones($version, $id);
        if (empty($diplomanteinscrito)) {
            echo '<script> alert("El Alumno no tiene pagos en esta version")</script>';
            redirect('version/ingresarv', 'refresh');
        }

        $data = array(
            'nombre' => $this->session->userdata('nombreV'),
            'modulo' => $this->modulo_model->getModulo($version),
            'paralelo' => $this->paralelo_model->getParalelo($version),
            'pagos' => $this->pago_model->getPagos(),
            'diplomanteinscrito' => $diplomanteinscrito
        );
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
        $this->load->view('v_pago/detalle_pago_diplomante', $data);
        $this->load->view('plantillas/pie');
    }

    public function getPagoById($idPagoURl)
    {
        $idPago = urldecode($idPagoURl);
        $pago = $this->pago_model->getPagoById($idPago);
        echo json_encode($pago);
    }

    public function pagoMensajes($indice = null)
    {
        if ($indice == 1) {
            $data['msg'] = "Se registro nueva Pago.";
            $this->load->view('plantillas/msg_success', $data);
        } else if ($indice == 2) {
            $data['msg'] = "No es posible registrar Pago. Revise datos";
            $this->load->view('plantillas/msg_error', $data);
        } else if ($indice == 3) {
            $data['msg'] = "Se Elimino  Pago.";
            $this->load->view('plantillas/msg_success', $data);
        } else if ($indice == 4) {
            $data['msg'] = "No es posible Eliminar Pago.";
            $this->load->view('plantillas/msg_error', $data);
        } else if ($indice == 5) {
            $data['msg'] = "Se Edito la Pago.";
            $this->load->view('plantillas/msg_success', $data);
        } else if ($indice == 6) {
            $data['msg'] = "No es posible Editar Pago.";
            $this->load->view('plantillas/msg_error', $data);
        }
    }
}
