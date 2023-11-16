<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academico_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        
    }

    public function buscarAcademico($ci=null)
    {
        
        $query=$this->db->query("SELECT * FROM academico WHERE ciA='$ci' ");
        return $query->num_rows();
        // return $query->result();
    }

    public function crearAcaddemico($ciA,$nombA,$ciudadA,$telefonoA,$direccionA,$folioA,$descripcionA)
    {
        
        $sql="INSERT INTO academico(ciA,nombreA,ciudadA,telefonoA,direccionA,numFolioA,descripcionA) VALUES
        (".$this->db->escape($ciA).",".$this->db->escape($nombA).",".$this->db->escape($ciudadA).",".$this->db->escape($telefonoA).",".$this->db->escape($direccionA).",
        ".$this->db->escape($folioA).",".$this->db->escape($descripcionA).")";
        
        $this->db->query($sql);
        $this->db->affected_rows();
    }

    public function getAcademico($ciA=null)
    {
        
        if($ciA==null)
        {
            $consulta=$this->db->query("SELECT * FROM academico ORDER BY nombreA ASC");   
            return $consulta->result_array();
        }
        else{
            $consulta=$this->db->query("SELECT * FROM academico WHERE ciA='$ciA' ORDER BY nombreA ASC");   
            return $consulta->result_array();
        }
    }

    public function editarAcademico($ciA,$nombA,$ciudadA,$telefonoA,$direccionA,$folioA,$descripcionA)
    {
        $sql="UPDATE academico SET nombreA='$nombA', ciudadA='$ciudadA',telefonoA='$telefonoA', direccionA='$direccionA', numFolioA='$folioA',descripcionA='$descripcionA'
         WHERE ciA='$ciA' ";
        $this->db->query($sql); 
        $this->db->affected_rows();
    }

    public function eliminar_academico($ci,$nombreA)
    {
        $this->db->query("DELETE FROM academico WHERE ciA='$ci' and nombreA='$nombreA' ");

        return $this->db->affected_rows()>0;
    }

}