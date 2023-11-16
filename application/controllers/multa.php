<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Multa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('multa_model');
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
            'multas' => $this->multa_model->getMultas()
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
        $this->load->view('v_multa/lista_multas', $data);
        $this->load->view('plantillas/pie');
    }
    public function getMultaById($idMulta)
    {
        $multa = $this->multa_model->getMultaById($idMulta);
        echo json_encode($multa);
    }
    public function crearMulta()
    {

        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }

        $this->form_validation->set_rules('txtNombreM', 'Nombre', 'required|max_length[255]', array(
            'required' => 'El campo %s es requerido.',
            'max_length' => 'El campo %s no puede exceder los 255 caracteres.'
        ));

        $this->form_validation->set_rules('txtDescripcionM', 'Descripción', 'required|max_length[255]', array(
            'required' => 'El campo %s es requerido.',
            'max_length' => 'El campo %s no puede exceder los 255 caracteres.'
        ));

        $this->form_validation->set_rules('txtMontoM', 'Monto en Moneda Extranjera', 'required|numeric|greater_than[0]', array(
            'required' => 'El campo %s es requerido.',
            'numeric' => 'El campo %s debe ser un número válido.',
            'greater_than' => 'El campo %s debe ser mayor que 0.'
        ));
        $this->form_validation->set_rules('txtMonedaM', 'Número Decimal', 'required|greater_than[0]', array(
            'required' => 'El campo %s es requerido.',
            'greater_than' => 'El campo %s debe ser mayor que 0.'
        ));
        $this->form_validation->set_rules('txtMonedaM', 'Moneda', 'required|in_list[BS,USD]');
        $this->form_validation->set_rules('txtEstadoM', 'Estado', 'required|integer');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
        $this->form_validation->set_message('max_length', 'El campo %s no puede exceder %s caracteres.');
        $this->form_validation->set_message('in_list', 'El campo %s debe ser uno de los valores permitidos.');
        $this->form_validation->set_message('numeric', 'El campo %s debe contener un valor numérico.');
        $this->form_validation->set_message('greater_than', 'El campo %s debe ser mayor que cero.');
        $this->form_validation->set_message('integer', 'El campo %s debe contener un valor entero.');


        if ($this->form_validation->run() == FALSE) {
            // echo '<script> alert("No se pudo registrar la multa")</script>';
            $this->multaMensajes(2);
            $this->index();
            return;
        }


        $nombreM = $this->input->post('txtNombreM');
        $descripcionM = $this->input->post('txtDescripcionM');
        $montoM = $this->input->post('txtMontoM');
        $monedaM = $this->input->post('txtMonedaM');
        $estadoM = $this->input->post('txtEstadoM');


        $this->multa_model->crearMulta($nombreM, $descripcionM, $montoM, $monedaM, $estadoM);
        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {
            $this->multaMensajes(1);
            $this->index();
        } else {
            $this->multaMensajes(2);
            $this->index();
        }
    }
    public function editarMulta()
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        $this->form_validation->set_rules('txtNombreMEditar', 'Nombre', 'required|max_length[255]', array(
            'required' => 'El campo %s es requerido.',
            'max_length' => 'El campo %s no puede exceder los 255 caracteres.'
        ));

        $this->form_validation->set_rules('txtDescripcionMEditar', 'Descripción', 'required|max_length[255]', array(
            'required' => 'El campo %s es requerido.',
            'max_length' => 'El campo %s no puede exceder los 255 caracteres.'
        ));

        $this->form_validation->set_rules('txtMontoMEditar', 'Monto en Moneda Extranjera', 'required|numeric|greater_than[0]', array(
            'required' => 'El campo %s es requerido.',
            'numeric' => 'El campo %s debe ser un número válido.',
            'greater_than' => 'El campo %s debe ser mayor que 0.'
        ));
        $this->form_validation->set_rules('txtMonedaMEditar', 'Número Decimal', 'required|greater_than[0]', array(
            'required' => 'El campo %s es requerido.',
            'greater_than' => 'El campo %s debe ser mayor que 0.'
        ));
        $this->form_validation->set_rules('txtMonedaMEditar', 'Moneda', 'required|in_list[BS,USD]');
        $this->form_validation->set_rules('txtEstadoMEditar', 'Estado', 'required|integer');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
        $this->form_validation->set_message('max_length', 'El campo %s no puede exceder %s caracteres.');
        $this->form_validation->set_message('in_list', 'El campo %s debe ser uno de los valores permitidos.');
        $this->form_validation->set_message('numeric', 'El campo %s debe contener un valor numérico.');
        $this->form_validation->set_message('greater_than', 'El campo %s debe ser mayor que cero.');
        $this->form_validation->set_message('integer', 'El campo %s debe contener un valor entero.');


        if ($this->form_validation->run() == FALSE) {
            // echo '<script> alert("No se pudo registrar la multa")</script>';
            $this->multaMensajes(2);
            $this->index();
            return;
        }
        $idMulta = $this->input->post('txtIdMultaEditar');
        $nombreM = $this->input->post('txtNombreMEditar');
        $descripcionM = $this->input->post('txtDescripcionMEditar');
        $montoM = $this->input->post('txtMontoMEditar');
        $monedaM = $this->input->post('txtMonedaMEditar');
        $estadoM = $this->input->post('txtEstadoMEditar');

        $this->multa_model->editarMulta($idMulta, $nombreM, $descripcionM, $montoM, $monedaM, $estadoM);
        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {
            $this->multaMensajes(5);
            $this->index();
        } else {
            $this->multaMensajes(6);
            $this->index();
        }
    }

    public function eliminarMulta()
    {
        if (!$this->session->userdata('logueado')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        $idMulta = $this->input->get('idMulta');
        $this->multa_model->eliminarMulta($idMulta);
        $filasAfectadas = $this->db->affected_rows();

        if ($filasAfectadas > 0) {
            $this->multaMensajes(3);
            $this->index();
        } else {
            $this->multaMensajes(4);
            $this->index();
        }
    }
    public function multaMensajes($indice = null)
    {
        if ($indice == 1) {
            $data['msg'] = "Se registro nueva Multa.";
            $this->load->view('plantillas/msg_success', $data);
        } else if ($indice == 2) {
            $data['msg'] = "No es posible registrar Multa. Revise datos";
            $this->load->view('plantillas/msg_error', $data);
        } else if ($indice == 3) {
            $data['msg'] = "Se Elimino  Multa.";
            $this->load->view('plantillas/msg_success', $data);
        } else if ($indice == 4) {
            $data['msg'] = "No es posible Eliminar Multa.";
            $this->load->view('plantillas/msg_error', $data);
        } else if ($indice == 5) {
            $data['msg'] = "Se Edito la Multa.";
            $this->load->view('plantillas/msg_success', $data);
        } else if ($indice == 6) {
            $data['msg'] = "No es posible Editar Multa.";
            $this->load->view('plantillas/msg_error', $data);
        }
    }
}
