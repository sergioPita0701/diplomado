<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Multa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function getMultaById($idMulta)
    {
        $consulta = $this->db->query("SELECT * FROM multa WHERE idMulta='$idMulta'");
        return $consulta->result_array();
    }

    public function getMultas()
    {
        $consulta = $this->db->query("SELECT * FROM multa");
        return $consulta->result_array();
    }

    public function crearMulta($nombreM, $descripcionM, $montoM, $monedaM, $estadoM)
    {

        $sql = "INSERT INTO multa(nombreM, descripcionM, montoM, monedaM, estadoM)
        VALUES ('$nombreM','$descripcionM','$montoM','$monedaM','$estadoM')";
        $this->db->query($sql);
    }
    public function editarMulta($idMulta, $nombreM, $descripcionM, $montoM, $monedaM, $estadoM)
    {

        $sql = "UPDATE multa SET nombreM='$nombreM',descripcionM='$descripcionM', montoM='$montoM', monedaM='$monedaM', estadoM='$estadoM'
        WHERE idMulta='$idMulta' ";
        if ($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminarMulta($idMulta) //se usa
    {
        $this->db->query("DELETE FROM multa WHERE idMulta='$idMulta' ");
        return $this->db->affected_rows() > 0;
    }

    public function getMultasActivos()
    {

        $consulta = $this->db->query("SELECT * FROM multa WHERE estadoD=1");
        return $consulta->result_array();
        $this->db->select('*');
        $this->db->from('multa');
        $this->db->where('estadoM', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
}
