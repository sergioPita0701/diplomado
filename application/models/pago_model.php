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
    public function getAllPagosCSV()
    {
        // $this->db->select('
        // p.fechaDepositoP,
        // p.numeroDepositoP,
        // p.montoP,
        // p.monedaP,
        // p.tasaCambioP,
        // p.montoTotalBsP,

        // t.montoOriginalT,
        // t.montoDescuentoT,
        // t.estadoT,

        // i.numeroI,
        // i.ciI,
        // i.sexoI,
        // i.paisnacI,
        // i.departamentonacI,
        // i.fechanacI,
        // i.estadoCivilI,
        // i.direccionI,
        // i.telefonoI,
        // i.celularI,
        // i.emailI,
 
        // d.ciD,
        // d.nombreD,
        // d.apellidoPaternoD,
        // d.apellidoMaternoD,
        // d.ciudadD,
            $this->db->select('
        p.*,
        t.*,
        i.*,
        v.*,
        d.*,
        pro.*,'
        );
        $this->db->from('pago p');
        $this->db->join('transaccion t', 'p.idTransaccion = t.idTransaccion', 'left');
        $this->db->join('inscripcion i', 't.idInscripcion = i.idInscripcion', 'left');   
        $this->db->join('version v', 'v.idVersion = i.idVersion', 'left');
        $this->db->join('diplomante  d', 'i.idDiplomante = d.idDiplomante', 'left');
        $this->db->join('profesion pro', 'd.idProfesion = pro.idProfesion', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
}