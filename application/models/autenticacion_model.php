<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacion_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        
    }

    public function usuarioHabilitado($login)
    {
        $consulta=$this->db->query("SELECT estadoU FROM usuario WHERE loginU='$login' "); 
        // $usuario= $consulta->result()[0]->estadoU;
        if (empty($consulta->result())) {
            return "vacio";
        } else {
           $usuario= $consulta->result()[0]->estadoU; 
            return $usuario;
        }
        
        return $usuario;
        // return $consulta->result();
    }
    public function autenticacion_por_nombre_contrasena($login, $contrasena)
    {
        $this->db->select('*');//idUsuario,loginU,contrasenaU,tipoU,cargoU
        $this->db->from('usuario');
        $this->db->where('loginU',$login);
        $this->db->where('contrasenaU',$contrasena);
        $consulta=$this->db->get();
        $resultado=$consulta->row();

        // $sql = 'SELECT @identificador := $login FROM usuario WHERE contrasenaU=$contrasena ';
        // $sql = 'SELECT login FROM usuario WHERE contrasenaU=$contrasena ';
        // $consulta =$this->db->prepare($sql);
        // // $consulta->bind_param('i', $usuario_cedula);
        // $consulta->execute();

        return $resultado;
    }

   
}