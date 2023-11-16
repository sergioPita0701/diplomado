<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Descuento_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function getDescuento($idDescuento)
    {
        $consulta = $this->db->query("SELECT * FROM descuento WHERE idDescuento='$idDescuento'");
        return $consulta->result_array();
    }

    public function getDescuentos()
    {
        $consulta = $this->db->query("SELECT * FROM descuento");
        return $consulta->result_array();
    }

    public function crearDescuento($nombreD, $descripcionD, $porcentajeD, $estadoD) //se usa
    {
        $this->db->query("INSERT INTO descuento(nombreD, descripcionD, porcentajeD, estadoD)
        VALUES ('$nombreD','$descripcionD','$porcentajeD','$estadoD')");
    }
    public function editarDescuento($idDescuento, $nombreD, $descripcionD, $porcentajeD, $estadoD)
    {

        $sql = "UPDATE descuento SET nombreD='$nombreD',descripcionD='$descripcionD', porcentajeD='$porcentajeD', estadoD='$estadoD'
        WHERE idDescuento='$idDescuento' ";
        if ($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminarDescuento($idDescuento) //se usa
    {
        $this->db->query("DELETE FROM descuento WHERE idDescuento='$idDescuento' ");
        return $this->db->affected_rows() > 0;
    }

    public function getDescuentosActivos()
    {
        $consulta = $this->db->query("SELECT * FROM descuento WHERE estadoD=1");
        return $consulta->result_array();
    }
    public function getDescuentoById($idDescuento)
    {
        $this->db->select('*');
        $this->db->from('descuento');
        $this->db->where('idDescuento', $idDescuento);
        $query = $this->db->get();
        return $query->row();
    }
}
