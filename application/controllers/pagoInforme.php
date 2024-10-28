<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PagoInforme extends CI_Controller
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
    public function listar($indice=null) {
        $this->loadLogin();
        $search = $this->input->get('search');
        $version = $this->session->userdata('idVersion');
        $pagosCSV = $this->pago_model->getAllPagosCSV();
        $data = array(
            'nombre' => $this->session->userdata('nombreV'),
            'modulo' => $this->modulo_model->getModulo($version),
            'paralelo' => $this->paralelo_model->getParalelo($version),
            'pagos' => $pagosCSV,
            'versiones' => $this->version_model->getVersiones(),
            'transacciones' =>  $this->transaccion_model->getTransaccionesSearch($search)
        ); 
        $this->loadView($data);
        $this->load->view('v_pagoInforme/listarDiplomante', $data);
       
    }
    public function descargar_csv()
    {
        $search = $this->input->post('search');
    
        // Datos de ejemplo (esto se puede reemplazar con los datos obtenidos de la base de datos)
        $transacciones = $this->transaccion_model->getTransaccionesSearch($search);
        // Nombre del archivo CSV
      
        if(empty($transacciones)){
            echo '<script> alert("No se encontraron transacciones")</script>';
            redirect('pagoInforme/listar', 'refresh');  
            return; 
        }
        $filename = 'transacciones' . date('Ymd') . '.csv';
      
        header('Conptent-Type: application/csv');
        header('Content-Disposition: attachment; filename=' . $filename);

        // Crear el archivo CSV en memoria
        $output = fopen('php://output', 'w');
        $headers = array(
            'ciD', 'nombreD', 'apellidoPaternoD', 'apellidoMaternoD', 'porcentajeD', 'montoOriginalT', 'montoDescuentoT','totalPagos',
          
        );
        // Escribir encabezados
        fputcsv($output, $headers);

        // Escribir los datos
        foreach ($transacciones as $row) {
            $descuento = '';
            if ($row['nombreD'] == "Ninguno" ) {
                $descuento = '';
            } else {
                $descuento= $row['nombreD'] . '%';
            }
            $sumaPagosString = '"' . number_format($row['sumaPagos'], 2, '.', ',') . '"';
            $filteredRow = array(
                $row['ciI'],
                $row['nombreDiplomante'],
                $row['apellidoPaternoD'],
                $row['apellidoMaternoD'],  
                $sumaPagosString,
                intval($row['montoDescuentoT']),
                $descuento,
                '',
            );
            // fputcsv($output, $filteredRow);
            fwrite($output, implode(',', $filteredRow) . PHP_EOL);
        }
        
        fclose($output);

        exit();
       
    }
    private function loadLogin() {
        if (!$this->session->userdata('login')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
    }
    private function loadView($data) {
    
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
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('autenticacion', 'refresh');
                break;
        }
  
       
        $this->load->view('plantillas/pie');
    }
}