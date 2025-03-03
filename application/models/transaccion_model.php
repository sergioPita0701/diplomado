<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaccion_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getTotalTransacciones($idVersion, $search = '')
    {
        // Inicializar la consulta base
        $this->db->select('COUNT(*) as total');
        $this->db->from('transaccion as t');
        $this->db->join('inscripcion as i', 't.idInscripcion = i.idInscripcion');
        $this->db->join('version as v', 'i.idVersion = v.idVersion');
        $this->db->join('diplomante as d', 'i.idDiplomante = d.idDiplomante');

        // Aplicar filtros
        $this->db->where('v.idVersion', $idVersion);
        if (!empty($search)) {
            $this->db->like('i.ciI', $search);
        }

        // Ejecutar la consulta para contar el total de resultados
        $query = $this->db->get();

        // Obtener el resultado
        $result = $query->row_array();

        // Devolver el total de resultados
        return $result['total'];
    }
    public function getTransacciones($idVersion, $search = '')
    {
        // Inicializar la consulta base
        $this->db->select('trans.*, ins.*, dip.*, ver.*, des.*, SUM(pag.montoTotalBsP) as sumaPagos');
        $this->db->from('transaccion as trans');
        $this->db->join('inscripcion as ins', 'trans.idInscripcion = ins.idInscripcion');
        $this->db->join('descuento as des', 'trans.idDescuento = des.idDescuento', 'left');
        $this->db->join('pago as pag', 'pag.idTransaccion = trans.idTransaccion', 'left');
        $this->db->join('version as ver', 'ins.idVersion = ver.idVersion', 'left');
        $this->db->join('diplomante as dip', 'ins.idDiplomante = dip.idDiplomante', 'left');
        $this->db->group_by('trans.idTransaccion');

        // Aplicar filtros
        $this->db->where('ver.idVersion', $idVersion);
        if (!empty($search)) {
            $this->db->like('ins.ciI', $search); // Reemplaza 'nombreCampo' con el nombre real del campo a buscar
        }

        // Ejecutar la consulta
        $query = $this->db->get();
        // Devolver los resultados
        return $query->result_array();
    }
    public function getTranssacionById($idTransaccion)
    {
        $this->db->select('trans.*, ins.*, dip.*, ver.*, des.*, SUM(pag.montoTotalBsP) as sumaPagos');
        $this->db->from('transaccion as trans');
        $this->db->join('inscripcion as ins', 'trans.idInscripcion = ins.idInscripcion');
        $this->db->join('descuento as des', 'trans.idDescuento = des.idDescuento', 'left');
        $this->db->join('pago as pag', 'pag.idTransaccion = trans.idTransaccion', 'left');
        $this->db->join('version as ver', 'ins.idVersion = ver.idVersion', 'left');
        $this->db->join('diplomante as dip', 'ins.idDiplomante = dip.idDiplomante', 'left');
        $this->db->group_by('trans.idTransaccion');
        // Aplicar filtros
        $this->db->where('trans.idTransaccion', $idTransaccion);
        // Ejecutar la consulta
        $query = $this->db->get();
        // Devolver los resultados
        return $query->row();
    }
    public function crearTransaccionData($data)
    {
        $this->db->insert('transaccion', $data);
        $idTransaccion = $this->db->insert_id();

        // Retornar el ID de la inscripción
        return $idTransaccion;
    }
    public function getTransaccionesSearch($search = '')
    {
        // Inicializar la consulta base
        $this->db->select('trans.*, ins.*, dip.*, ver.*, des.*, SUM(pag.montoTotalBsP) as sumaPagos');
        $this->db->select('trans.idTransaccion, ins.*, dip.ciD,dip.nombreD as nombreDiplomante,dip.apellidoPaternoD,dip.apellidoMaternoD, ver.*, des.*, SUM(pag.montoTotalBsP) as sumaPagos');
        $this->db->from('transaccion as trans');
        $this->db->join('inscripcion as ins', 'trans.idInscripcion = ins.idInscripcion');
        $this->db->join('descuento as des', 'trans.idDescuento = des.idDescuento', 'left');
        $this->db->join('pago as pag', 'pag.idTransaccion = trans.idTransaccion', 'left');
        $this->db->join('version as ver', 'ins.idVersion = ver.idVersion', 'left');
        $this->db->join('diplomante as dip', 'ins.idDiplomante = dip.idDiplomante', 'left');
        $this->db->group_by('trans.idTransaccion');

      
        if (!empty($search)) {

            
            $this->db->like('ins.ciI', $search); // Reemplaza 'nombreCampo' con el nombre real del campo a buscar
            $this->db->or_like('dip.nombreD', $search);
            $this->db->or_like('dip.apellidoPaternoD', $search);
            $this->db->or_like('dip.apellidoMaternoD', $search);
        }

        // Ejecutar la consulta
        $query = $this->db->get();
        // Devolver los resultados
        return $query->result_array();
    }

    public function getTransaccionesSearchByIdVersion($idVersion)
    {
        // Inicializar la consulta base
        $this->db->select([
            'trans.idTransaccion',
            'trans.idDescuento',
            'trans.idInscripcion',
            'trans.montoOriginalT',
            'ins.idInscripcion',
            'ins.idVersion',  
            'ins.idDiplomante',
            "ins.ciI",
            'des.idDescuento',
            'des.porcentajeD',
            'dip.idDiplomante',
            'dip.ciD',
            'dip.nombreD as nombreDiplomante',
            'dip.apellidoPaternoD',
            'dip.apellidoMaternoD',
            'ver.idVersion',
            'ver.nombreV',
            'ver.costoV',
            'pag.idPago',
            'pag.idTransaccion',
            'SUM(pag.montoTotalBsP) as sumaPagos'
        ]);
    
        $this->db->from('transaccion as trans');
        $this->db->join('inscripcion as ins', 'trans.idInscripcion = ins.idInscripcion');
        $this->db->join('descuento as des', 'trans.idDescuento = des.idDescuento', 'left');
        $this->db->join('pago as pag', 'pag.idTransaccion = trans.idTransaccion', 'left');
        $this->db->join('version as ver', 'ins.idVersion = ver.idVersion', 'left');
        $this->db->join('diplomante as dip', 'ins.idDiplomante = dip.idDiplomante', 'left');
        $this->db->group_by('trans.idTransaccion');
        $this->db->where('ver.idVersion', $idVersion);
      
    
        // Ejecutar la consulta
        $query = $this->db->get();
        // Devolver los resultados
        return $query->result_array();
    }
}