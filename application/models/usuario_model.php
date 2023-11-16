<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getUsuario($ci=null,$nombre=null,$apellidos=null)//se usa
    {
        
        if($ci==null && $nombre==null && $apellidos==null)
        {
            $consulta=$this->db->query("SELECT * FROM usuario ORDER BY nombreU ASC");
            return $consulta->result_array();
        }
        else
        {
            if ($ci!=null && $nombre==null && $apellidos==null) {
                $consulta=$this->db->query("SELECT * FROM usuario 
                WHERE ciU='$ci' ORDER BY nombreU ASC");
                return $consulta->result_array();
                
            } 
            else {
                $consulta=$this->db->query("SELECT * FROM usuario 
                WHERE ciU='$ci' and nombreU='$nombre' and apellidosU='$apellidos' ORDER BY nombreU ASC");
                return $consulta->result_array();
            }
            
        }
        
    }
    public function buscarUsuario($ciu,$nombreu,$apellidou)//se usa
    {
        $consulta=$this->db->query("SELECT * FROM usuario 
        WHERE ciU='$ciu' and nombreU='$nombreu' and apellidosU='$apellidou' ORDER BY nombreU ASC");
        return $consulta->result_array();
        
    }
    
    public function crear_usuario($ciu,$nombreu,$apellidou,$cargou,$emailu,$telefonou,$direccionu,$estadou,$tipou,$loginu,$contrasenau,$descripcionu)//se usa
    {

        $sql="INSERT INTO usuario(ciU,nombreU,apellidosU,cargoU,direccionU,telefonoU,emailU,estadoU,tipoU,loginU,contrasenaU,observacionU) VALUES
        (".$this->db->escape($ciu).",".$this->db->escape($nombreu).",".$this->db->escape($apellidou).",".$this->db->escape($cargou).",
        ".$this->db->escape($direccionu).",".$this->db->escape($telefonou).",".$this->db->escape($emailu).",".$this->db->escape($estadou).",
        ".$this->db->escape($tipou).",".$this->db->escape($loginu).",".$this->db->escape($contrasenau).",".$this->db->escape($descripcionu).")";
        
        $this->db->query($sql);

        $this->db->affected_rows();
    }

    // public function existenombreParalelo($version,$numModulo,$nombreParalelo,$idParalelo)
    // {
    //     $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m 
    //     INNER JOIN paralelo p on p.idModulo=m.idModulo
    //     WHERE m.idVersion='$version' and m.numeroM='$numModulo' and p.nombre_paralelo='$nombreParalelo' and p.idParalelo<>'$idParalelo' ");
    //     return $consulta->result_array();
    // }

    public function editarUsuario($ciU,$nombreU,$apellidosU,$cargoU,$direccionU,$telefonoU,$emailU,$estadoU,$tipoU,$loginU,$contrasenaU,$obsevacionU)//si
    {

        $editar="UPDATE usuario SET nombreU='$nombreU',apellidosU='$apellidosU' , cargoU='$cargoU',direccionU='$direccionU', telefonoU='$telefonoU',
                        emailU='$emailU', estadoU='$estadoU',tipoU='$tipoU',loginU='$loginU',contrasenaU='$contrasenaU',observacionU='$obsevacionU'
        WHERE ciU='$ciU ' ";
        $this->db->query($editar);
        $this->db->affected_rows();
    }
    public function eliminarUsuario($ciusuario)//si
    {
        $query="DELETE FROM usuario WHERE ciU='$ciusuario' ";
        
        $this->db->query($query);
        return $this->db->affected_rows()>0;
    }
    
    public function getUsuarioDirector()//se usa
    {
        $consulta=$this->db->query("SELECT MAX(idUsuario) as iddirector FROM usuario WHERE tipoU='Administrador' ");
        $director=$consulta->result()[0]->iddirector;

        $query=$this->db->query("SELECT * FROM usuario WHERE tipoU='Administrador' and idUsuario=$director ");
        return $query->result_array();
        
    }
}