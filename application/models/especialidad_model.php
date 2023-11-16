<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidad_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getEspecialidad($nombre=null)
    {
        if($nombre==null)
        {
            $consulta=$this->db->query("SELECT * FROM especialidad ORDER BY nombreE ASC");
            return $consulta->result_array();
        }
        else{
            $consulta=$this->db->query("SELECT * FROM especialidad WHERE nombreE='$nombre' ORDER BY nombreE ASC ");
            // return $consulta->row();
            return $consulta->result_array();
        }
        
    }
    public function crearEspecialidad($nombreE,$descripcioE)
    {
        $sql="INSERT INTO especialidad(nombreE,descripcionE) VALUES
        (".$this->db->escape($nombreE).",".$this->db->escape($descripcioE).")";
        
        $this->db->query($sql);
        $this->db->affected_rows();
    }

    public function editarEspecialidad($idE,$nombreE,$descripcioE)
    {

        $editar="UPDATE especialidad SET nombreE='$nombreE' , descripcionE='$descripcioE' WHERE idEspecialidad='$idE'";
        
        if($this->db->query($editar))
        {
            return true;
        }else
        {
            return false;
        }
    }
    public function eliminarEspecialidad($nombre)
    {
        $query="DELETE FROM especialidad WHERE nombreE='$nombre' ";
        
        $this->db->query($query);
        return $this->db->affected_rows()>0;
    }

    public function numEspecialidades()
    {
        $num=$this->db->query("SELECT * FROM especialidad");
        return $num->num_rows();
    }
    
}