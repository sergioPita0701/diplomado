<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Descuento extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('descuento_model');
        $this->load->model('version_model');
        $this->load->model('academico_model');
        $this->load->model('diplomante_model');
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
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
            'descuentos' => $this->descuento_model->getDescuentos()
        );
        $this->load->view('plantillas/encabezado');
        $this->load->view('plantillas/navegador');
        $data['tipo'] = $this->session->userdata('tipo');
        switch ($data['tipo']) {

            case 'Coordinador':
                $this->load->view('plantillas/menu_coordinador', $data);
                break;
            case 'Administrador':
                $this->load->view('plantillas/menu_administrador', $data);
                break;
            default:
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('autenticacion', 'refresh');
                break;
        }
        $this->load->view('v_descuento/lista_descuentos', $data);
        $this->load->view('plantillas/pie');
    }
    public function crearDescuento()
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }

        $this->form_validation->set_rules('txtNombreD', '', 'required', array('required' => 'El nombre del descuento es requerido.'));
        $this->form_validation->set_rules('txtDescripcionD', '', 'required', array('required' => 'La descripcion del descuento es requerida.'));
        $this->form_validation->set_rules('txtvalorD', '', 'required', array('required' => 'El porcentaje del Valor es requerido.'));
        $this->form_validation->set_rules('txtTipoD', '', 'required', array('required' => 'El tipo de descuento es requerido.'));

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        }
        $nombreD = $this->input->post('txtNombreD');
        $descripcionD = $this->input->post('txtDescripcionD');
        $procentajeD = $this->input->post('txtProcentajeD');
        $estadoD = $this->input->post('txtEstadoD');


        $this->descuento_model->crearDescuento($nombreD, $descripcionD, $procentajeD, $estadoD);
        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {
            redirect('descuento/descuentoMensajes/1');
        } else {
            redirect('descuento/descuentoMensajes/2');
        }
    }
    public function editarDescuento()
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        $idDescuento = $this->input->post('txtIdD');
        $nombreD = $this->input->post('txtNombreD');
        $descripcionD = $this->input->post('txtDescripcionD');
        $procentajeD = $this->input->post('txtPorcentajeD');
        $estadoD = $this->input->post('txtEstadoD');
        $this->descuento_model->editarDescuento($idDescuento, $nombreD, $descripcionD, $procentajeD, $estadoD);
        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {
            redirect('descuento/descuentoMensajes/5');
        } else {
            redirect('descuento/descuentoMensajes/6');
        }
    }

    public function eliminarDescuento()
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        $idDescuento = $this->input->get('idDescuento');
        $this->descuento_model->eliminarDescuento($idDescuento);
        $filasAfectadas = $this->db->affected_rows();
        if ($filasAfectadas > 0) {
            redirect('descuento/descuentoMensajes/3');
        } else {
            redirect('descuento/descuentoMensajes/4');
        }
    }
    public function descuentoMensajes($indice = null)
    {
        if (!$this->session->userdata('logueado')) {
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

            'descuentos' => $this->descuento_model->getDescuentos()
        );
        $this->load->view('plantillas/encabezado');
        $this->load->view('plantillas/navegador', $data);
        if ($indice == 1) {
            $data['msg'] = "Se registro nueva Descuento.";
            $this->load->view('plantillas/msg_success', $data);
        } else if ($indice == 2) {
            $data['msg'] = "No es posible registrar Descuento. Revise datos";
            $this->load->view('plantillas/msg_error', $data);
        } else if ($indice == 3) {
            $data['msg'] = "Se Elimino  Descuento.";
            $this->load->view('plantillas/msg_success', $data);
        } else if ($indice == 4) {
            $data['msg'] = "No es posible Eliminar Descuento.";
            $this->load->view('plantillas/msg_error', $data);
        } else if ($indice == 5) {
            $data['msg'] = "Se Edito la Descuento.";
            $this->load->view('plantillas/msg_success', $data);
        } else if ($indice == 6) {
            $data['msg'] = "No es posible Editar Descuento.";
            $this->load->view('plantillas/msg_error', $data);
        }

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

        $this->load->view('v_descuento/lista_descuentos', $data);
        $this->load->view('plantillas/pie');
    }
}
