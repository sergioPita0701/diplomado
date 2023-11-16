<?php
/**
* 
*/
class Cupload extends CI_Controller
{
	public function __construct()
    {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            // $old = umask(0); // tomas el valor actual ... 
            // chmod("/uploads", 0777); // creas tu directorio con tal permiso especifico .. 
            // umask($old); // y lo restauras ...  
    }
    public function index()
    {
            $this->load->view('v_upload/vupload', array('error' => ' ' ));
    }
    public function do_upload()
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types'] = 'pdf|xlsx|docx';
            $config['max_size'] =       '20048';
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('v_upload/vupload', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    $this->load->view('v_upload/upload_success', $data);
            }
    }

	// function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('mupload');
	// 	$this->load->helper('download');
    //     // if (!$this->session->userdata('s_idUsuario')) {
    //     //     redirect('clogin');
    //     // }
	// }

	// public function index(){
	// 	$data['error'] = "";
	// 	$data['errorArch'] = "";
	// 	$data['estado'] = "";
    //     $data['archivo'] = "";
	// 	// $this->load->view('layout/header');
	// 	// $this->load->view('layout/menu');
	// 	$this->load->view('v_upload/vupload',$data);
	// 	// $this->load->view('layout/footer');
	// }

	// // public function subirImagen(){
	// // 	$config['upload_path'] = './uploads/archivos/';
    // //     $config['allowed_types'] = 'gif|jpg|png';
    // //     $config['max_size'] = '2048';
    // //     $config['max_width'] = '2024';
    // //     $config['max_height'] = '2008';

    // //     $this->load->library('upload',$config);

    // //     if (!$this->upload->do_upload("fileImagen")) {
    // //         $data['error'] = $this->upload->display_errors();
	// // 		// $this->load->view('layout/header');
	// // 		// $this->load->view('layout/menu');
	// // 		$this->load->view('v_upload/vupload',$data);
	// // 		// $this->load->view('layout/footer');
    // //     } else {

    // //         $file_info = $this->upload->data();

    // //         $this->crearMiniatura($file_info['file_name']);

    // //         $titulo = $this->input->post('titImagen');
    // //         $imagen = $file_info['file_name'];
            
    // //         $subir = $this->mupload->subir($titulo,$imagen);      
    // //         $data['titulo'] = $titulo;
    // //         $data['imagen'] = $imagen;

    // //         // $this->load->view('layout/header');
	// // 		// $this->load->view('layout/menu');
	// // 		$this->load->view('v_upload/vupload',$data);
	// // 		// $this->load->view('layout/footer');
            
    // //     }
    // // }
    
    // // function crearMiniatura($filename){
    // //     $config['image_library'] = 'gd2';
    // //     $config['source_image'] = 'uploads/archivos/'.$filename;
    // //     $config['create_thumb'] = TRUE;
    // //     $config['maintain_ratio'] = TRUE;
    // //     $config['new_image']='uploads/archivos/thumbs/';
    // //     $config['thumb_marker']='';//captura_thumb.png
    // //     $config['width'] = 150;
    // //     $config['height'] = 150;
    // //     $this->load->library('image_lib', $config); 
    // //     $this->image_lib->resize();
    // // }

    // public function subirArchivo(){
	// 	$config['upload_path'] = './uploads/archivos/';
    //     $config['allowed_types'] = 'pdf|xlsx|docx';
    //     $config['max_size'] = '20048';

    //     $this->load->library('upload',$config);

    //     if (!$this->upload->do_upload("fileImagen")) {
    //         $data['errorArch'] = $this->upload->display_errors();
    //         $data['error'] = "";
	// 		// $this->load->view('layout/header');
	// 		// $this->load->view('layout/menu');
	// 		$this->load->view('v_upload/vupload',$data);
	// 		// $this->load->view('layout/footer');
    //     } else {

    //         $file_info = $this->upload->data();
           
    //         $titulo = $this->input->post('titImagen');
    //         $archivo = $file_info['file_name'];
    //         $subir = $this->mupload->subir($titulo,$archivo);      
    //         $data['estado'] = "Archivo subido.";
    //         $data['archivo'] = $archivo;
	// 		$data['error'] = "";
	// 		$data['errorArch'] = "";

    //         // $this->load->view('layout/header');
	// 		// $this->load->view('layout/menu');
	// 		$this->load->view('v_upload/vupload',$data);
	// 		// $this->load->view('layout/footer');
            
    //     }
    // }

    // public function downloads($name){
         
    //    $data = file_get_contents('./uploads/archivos/'.$name); 
    //    force_download($name,$data); 
     
	// }
}