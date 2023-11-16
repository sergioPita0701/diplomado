<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pago_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }
    public function getPagos()
    {
        $consulta = $this->db->query("SELECT * FROM pago");
        return $consulta->result_array();
    }
    public function crearPago($idDescuento, $idPersona, $montoOrginalP, $montoDescuentoP, $fechaDepositoP, $numeroDepositoP)
    {
        $sql = "INSERT INTO pago(idDescuento,idPersona,montoP,fechaDepositoP,numeroDepositoP) 
        VALUES ('$idDescuento','$idPersona','$montoOrginalP','$montoDescuentoP','$fechaDepositoP','$numeroDepositoP')";
        $this->db->query($sql);
    }
    public function getPagosDiplomado($ciD, $idVersion)
    {
        $sql = "SELECT * FROM dilpmado p
        JOIN pagos pg ON p.idDiplomante = pg.idDiplomante
        JOIN version v ON pg.idVersio = v.idVersion
        WHERE p.ciD = '$ciD' AND v.idVersion = '$idVersion'";

        $consulta = $this->db->query($sql);
        return $consulta->result_array();
    }
    public function getPagosByIdTransaccion($idTransaccion)
    {
        $this->db->select('*');
        $this->db->from('pago');
        $this->db->where('idTransaccion', $idTransaccion);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function crearPagoData($data)
    {
        $this->db->insert('pago', $data);
        return $this->db->insert_id();  // Devuelve el id del registro insertado
    }
    public function editarPagoData($data, $idPago)
    {
        $this->db->where('idPago', $idPago);
        $this->db->update('pago', $data);
    }
    public function getPagoById($idPago)
    {
        $this->db->select('*');
        $this->db->from('pago');
        $this->db->where('idPago', $idPago);
        $query = $this->db->get();
        return $query->row();
    }
    public function eliminarPagoById($idPago)
    {
        $this->db->where('idPago', $idPago);
        $this->db->delete('pago');
    }
}
