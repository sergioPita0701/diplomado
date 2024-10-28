<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . 'libraries/league_csv/src/Config/Controls.php';
// require_once APPPATH . 'libraries/league_csv/src/AbstractCsv.php';
// require_once APPPATH . 'libraries/league_csv/src/Reader.php';
// require_once APPPATH . 'libraries/league_csv/src/Writer.php';

// use League\Csv\Reader;
// use League\Csv\Writer;

class Csv extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
        $this->load->model('pago_model');
        $this->load->model('transaccion_model');
        $this->load->model('inscripcion_model');
        $this->load->model('descuento_model');
        
        $this->load->model('version_model');
        $this->load->model('diplomante_model');
        $this->load->model('modulo_model');
        $this->load->model('paralelo_model');
     
     
    }
    public function importar_csv($indice=null) {
        if (!$this->session->userdata('login')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        $version = $this->session->userdata('idVersion');
        $pagosCSV = $this->pago_model->getAllPagosCSV();
        $data = array(
            'nombre' => $this->session->userdata('nombreV'),
            'modulo' => $this->modulo_model->getModulo($version),
            'paralelo' => $this->paralelo_model->getParalelo($version),
            'pagos' => $pagosCSV,
            'versiones' => $this->version_model->getVersiones()
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
            case 'Administrador':
                $this->load->view('plantillas/menu_administrador', $data);
                break;
            default:
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('autenticacion', 'refresh');
                break;
        }
  
        $this->load->view('v_csv/importar_csv', $data);
        $this->load->view('plantillas/pie');
       
    }
    public function procesar_importacion() {
        // Obtener la versión seleccionada
       // Obtener la versión seleccionada
       $version_id = $this->input->post('version');

       // Cargar archivo CSV
       if (!empty($_FILES['csv_file']['tmp_name'])) {
            $csv_file = fopen($_FILES['csv_file']['tmp_name'], 'r');
            $this->db->trans_begin();  // Iniciar la transacción

            try {
                // Obtener los encabezados del CSV
                $headers = fgetcsv($csv_file);
                
                // Leer los datos del CSV fila por fila
                while (($row = fgetcsv($csv_file, 1000, ',')) !== FALSE) {
                   
                    $data = array_combine($headers, $row);
                
                      // Decodificar datos a UTF-8 para evitar problemas con tildes y "ñ"
                    foreach ($data as $key => $value) {
                        $data[$key] = utf8_encode($value);
                    }
                    $diplomante = $this->diplomante_model->getDiplomanteByCiDLike($data['ciD']);
                    if (!$diplomante || $diplomante == null) {
                        $diplomante_data = array(
                            'ciD' => $data['ciD'],
                            'nombreD' => $data['nombreD'],
                            'apellidoPaternoD' => $data['apellidoPaternoD'],
                            'apellidoMaternoD' => $data['apellidoMaternoD'],
                            'ciudadD' => 'n/a',
                            'idProfesion' => 118,
                        );
                        $diplomante_id = $this->diplomante_model->insertarDiplomante($diplomante_data);
                        $diplomante = $this->diplomante_model->getDiplomanteById ($diplomante_id);
                       
                    }
                    
                    if (!$diplomante || count($diplomante) == 0) {
                       
                        throw new Exception("El diplomante con CI {$data['ciD']} no existe.");
                    }
                    $diplomante_id = $diplomante->idDiplomante;
                    $inscripcion_data = [
                        'idVersion' => $version_id,
                        'idDiplomante' => $diplomante_id,
                        'numeroI' => 'I-100',
                        'ciI' => $data['ciD'],
                        'sexoI' => 'n/a',
                        'paisnacI' => 'n/a',
                        'departamentonacI' => 'n/a',
                        'fechanacI' => "0000-00-00",
                        'estadoCivilI' => 'n/a',
                        'direccionI' =>'n/a',
                        'telefonoI' =>'n/a',
                        'celularI' => 'n/a',
                        'emailI' => 'n/a',
                        'fechaInscripcionI' => 'n/a',
                    
                    ];
                    $inscripcion_id = $this->inscripcion_model->insertarInscripcion($inscripcion_data);
                    if (!$inscripcion_id) {
                        throw new Exception("Error al insertar la inscripción.");
                    }
                    $inscrpcion = $this->inscripcion_model->getInscripcionById($inscripcion_id);
                  
                    $porcentajeDescuento = 0;
                    switch ($data['montoOriginalT']) {
                        case '3400':
                            $porcentajeDescuento = 0;
                            break;
                        case '3094':
                            $porcentajeDescuento = 10;
                            break;
                        case '2941':
                            $porcentajeDescuento = 15;
                            break;
                        case '2788':
                            $porcentajeDescuento = 20;
                            break;
                        default:
                            $porcentajeDescuento = 0;
                            break;
                    }
                    
                    $descuento = $this->descuento_model->getDescuentoByPorcentaje($porcentajeDescuento);
                    $idDescuento = $descuento->idDescuento;
                   
                        $version = $this->version_model->getVersionByID($version_id);
                        $costoVersion = $version['costoV'];
                        $transaccion_data = [
                            'idDescuento' => $idDescuento,
                            'idInscripcion' => $inscripcion_id,
                            'montoOriginalT' => $costoVersion,
                            'montoDescuentoT' => $data['montoOriginalT'],
                            'estadoT' => 'inactivo',
                        ];
                        $transaccion_id = $this->transaccion_model->crearTransaccionData($transaccion_data);
                  
                        $porcentajeD = $data['porcentajeD'];
                        $porcentajeD_float = (float)str_replace(',', '', $porcentajeD); // Remueve las comas y convierte a float

                        $pago_data = [
                            'idTransaccion' => $transaccion_id,
                            'fechaDepositoP' => '0000-00-00',
                            'numeroDepositoP' => 'n/a',
                            'montoP' => $porcentajeD_float,
                            'monedaP' => 'BS',
                            'tasaCambioP' => null,
                            'montoTotalBsP' => $porcentajeD_float,
                        ];
                       $idpago = $this->pago_model->crearPagoData($pago_data);
                       $pago = $this->pago_model->getPagoById($idpago);
                
                        
                }
                
                if ($this->db->trans_status() === FALSE) {
                    throw new Exception("Error al realizar la transacción");
                }
               
                $this->db->trans_commit();  // Confirmar la transacción

                fclose($csv_file);
                // Mensaje de éxito
                $this->session->set_flashdata('success', 'Datos importados correctamente.');
                redirect('csv/importar_csv');

            } catch (Exception $e) {
                // Si hay un error, revertir la transacción
                $this->db->trans_rollback();  // Revertir la transacción

            // Mensaje de error
                $this->session->set_flashdata('error', 'Error durante la importación: ' . $e->getMessage());
                redirect('csv/importar_csv');
            }
           $this->session->set_flashdata('success', 'Alumnos importados correctamente.');
       } else {
           $this->session->set_flashdata('error', 'Por favor, sube un archivo CSV.');
       }

       redirect('csv/importar');

    }
    public function exportar_csv() {
        if (!$this->session->userdata('login')) {
            echo '<script> alert("El Usuario no inicio Sesion")</script>';
            redirect('autenticacion', 'refresh');
        }
        if (!$this->session->userdata('ingresado')) {
            echo '<script> alert("la version fue cerrada!")</script>';
            redirect('version/ingresarv', 'refresh');
        }
        $version = $this->session->userdata('idVersion');
        $versionGET = $this->input->get('version');
        if ($versionGET) {
            $version = $versionGET;
        }
        $pagosCSV = $this->pago_model->getAllPagosCSV();
        $data = array(
            'nombre' => $this->session->userdata('nombreV'),
            'modulo' => $this->modulo_model->getModulo($version),
            'paralelo' => $this->paralelo_model->getParalelo($version),
            'pagos' => $pagosCSV,
            'versiones' => $this->version_model->getVersiones(),
            'version' => $version,
            'transacciones' => $this->transaccion_model->getTransaccionesSearchByIdVersion($version),
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
            case 'Administrador':
                $this->load->view('plantillas/menu_administrador', $data);
                break;
            default:
                echo '<script> alert("la version fue cerrada!")</script>';
                redirect('autenticacion', 'refresh');
                break;
        }
  
        $this->load->view('v_csv/exportar_csv', $data);
        $this->load->view('plantillas/pie');
       
    }
   
    public function procesar_exportacion () {
        // Obtener la versión seleccionada
        $version_id = $this->input->post('version');
     
        
        // Datos de ejemplo (esto se puede reemplazar con los datos obtenidos de la base de datos)
        $transacciones = $this->transaccion_model->getTransaccionesSearchByIdVersion($version_id);
        // Nombre del archivo CSV
    
        if(empty($transacciones)){
            echo '<script> alert("No se encontraron transacciones")</script>';
            redirect('csv/exportar_csv', 'refresh');  
            return; 
        }
        $filename = 'export_' . date('Ymd') . '.csv';
      
        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename=' . $filename);
        echo "\xEF\xBB\xBF";  // Agregar BOM UTF-8 para que Excel detecte la codificación
    

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
            if ($row['porcentajeD'] == 0 ) {
                $descuento = '';
            } else {
                $descuento= $row['porcentajeD'] . '%';
            }
            $sumaPagosString = '"' . number_format($row['sumaPagos'], 2, '.', ',') . '"';
            $filteredRow = array(
                $row['ciI'],
                $row['nombreDiplomante'],
                $row['apellidoPaternoD'],
                $row['apellidoMaternoD'],  
                $sumaPagosString,
                intval($row['montoOriginalT']),
                $descuento,
                '',
            );
            // fputcsv($output, $filteredRow);
            fwrite($output, implode(',', $filteredRow) . PHP_EOL);
        }
        
        fclose($output);


        exit();
    }
            

    // Método para procesar la importación del CSV
    public function import_process() {
        if ($_FILES['csv_file']['error'] == UPLOAD_ERR_OK) {
            $file = $_FILES['csv_file']['tmp_name'];

            // Leer el archivo CSV
            $csv = Reader::createFromPath($file, 'r');
            $csv->setHeaderOffset(0); // La primera fila es el encabezado

            $data = [];
            foreach ($csv->getRecords() as $record) {
                $data[] = $record;
            }

            // Pasar los datos a la vista
            $data['records'] = $data;
            $this->load->view('import_result', $data);
        } else {
            show_error('Error al subir el archivo.');
        }
    }

    // Método para mostrar el formulario de exportación
    public function export() {
        $this->load->view('export_form');
    }

    // Método para procesar la exportación del CSV
    public function export_process() {
        $data = [
            ['Nombre', 'Edad', 'Correo'],
            ['Juan', 30, 'juan@example.com'],
            ['María', 25, 'maria@example.com']
        ];

        // Crear y escribir el archivo CSV
        $file = 'exported_data.csv';
        $csv = Writer::createFromPath($file, 'w+');
        $csv->insertAll($data);

        // Forzar la descarga del archivo
        $this->load->helper('download');
        force_download($file, file_get_contents($file));
    }

}