<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesion_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getProfesion($gradoA=null)
    {
        
        if($gradoA==null)
        {
            $consulta=$this->db->query("SELECT * FROM profesion ORDER BY nombreP ASC");
            return $consulta->result_array();
        }
        else{
            $consulta=$this->db->query("SELECT * FROM profesion WHERE gradoAcademicoP='$gradoA' ORDER BY nombreP ASC ");
            return $consulta->result_array();
        }
        
    }
    public function buscarProfesion($nombre=null,$gradoA=null)
    {
        $consulta=$this->db->query("SELECT * FROM profesion WHERE nombreP='$nombre' and gradoAcademicoP='$gradoA' ");
        return $consulta->num_rows();
    }

    public function crearProfesion($nombreP,$gradoP)
    {
        $sql="INSERT INTO profesion(nombreP,gradoAcademicoP) VALUES
        (".$this->db->escape($nombreP).",".$this->db->escape($gradoP).")";
        
        $this->db->query($sql);
        $this->db->affected_rows();
    }

    public function editarProfesion($idP,$nombreP,$gradoP)
    {
        // $idprof=$this->db->query("SELECT idProfesion WHERE nombreP='$nombreP'");
        // $idp=$idprof->result()[0]->idProfesion;

        $editar="UPDATE profesion SET nombreP='$nombreP' , gradoAcademicoP='$gradoP' WHERE idProfesion='$idP'";
        
        if($this->db->query($editar))
        {
            return true;
        }else
        {
            return false;
        }
    }
    public function eliminarProfesion($nombre)
    {
        $query="DELETE FROM profesion WHERE nombreP='$nombre' ";
        
        $this->db->query($query);
        return $this->db->affected_rows()>0;
    }
    
    
}