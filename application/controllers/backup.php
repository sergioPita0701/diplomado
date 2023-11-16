<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('version_model');
        // $this->load->model('academico_model');
        // $this->load->model('diplomante_model');
        // $this->load->model('modulo_model');
        // $this->load->model('profesion_model');
        // $this->load->model('especialidad_model');
        // $this->load->model('academicoespecialidad_model');
    }
    
    public function index()
    {
        //SOLO PHP

        // $db_host='localhost';
        // $db_name='diplomadodb';
        // $db_user='root';
        // $db_pass='123';
        
        // $fecha=date("Ymd-His");

        // $salida_sql=$db_name.'_'.$fecha.'.sql';

        // $dump="mysqlbackup -h$db_host -u$db_user -p$db_pass --opt$db_name > $salida_sql";

        // system($dump,$output);

        // CON CODEIGNITER

        // Load the DB utility class
        $this->load->dbutil();

        $prefs = array(
            //'tables'        => array('table1', 'table2'),    Array of tables to backup.
            //'ignore'        => array(),                      List of tables to omit from the backup
            'format'        => 'txt',                        //gzip, zip, txt
            'filename'      => 'my_dbdiplomado_backup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
            //'add_drop'      => TRUE,                         Whether to add DROP TABLE statements to backup file
            //'add_insert'    => TRUE,                         Whether to add INSERT data to backup file
            //'newline'       => "\n"                          Newline character used in backup file
        );
        
        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup($prefs);

        $db_name='backup-on-'.date("Y-m-d-H-i-s").'.txt';
        $save='pathtobkfolder/'.$db_name;

        // Load the file helper and write the file to your server
        $this->load->helper('file');
        // write_file('/path/to/mybackup.gz', $backup);
        write_file($save, $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($db_name, $backup);
    }

    
}