<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modulo_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getModulo($version, $idm = null) //se usa
    {
        // $version=$this->session->userdata('idVersion');
        if ($idm == null) {
            $consulta = $this->db->query("SELECT * FROM modulo WHERE idVersion='$version' ORDER BY numeroM ASC");
            return $consulta->result_array();
            // $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m INNER JOIN paralelo p ON m.idModulo=p.idModulo 
            // WHERE idVersion='$version' ORDER BY numeroM ASC");
            // return $consulta->result_array();
        } else {
            $consulta = $this->db->query("SELECT * FROM modulo WHERE idVersion='$version' and idModulo=$idm ORDER BY numeroM ASC");
            return $consulta->result_array();
            // $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m INNER JOIN paralelo p ON m.idModulo=p.idModulo 
            // WHERE idVersion='$version' and idModulo=$idm ORDER BY numeroM ASC");
            // return $consulta->result_array();
        }
    }
    public function obtenerModulo($version) //se usa  revisar, como es q si version es nulo se usa en el where
    {
        $consulta = $this->db->query("SELECT * FROM modulo WHERE idVersion='$version' ORDER BY numeroM ASC");
        return $consulta->result_array();
    }
    public function buscarModulo($version, $numeroM = null, $nombreM = null) //se usa
    {

        if ($numeroM == null && $nombreM == null) {
            $consulta = $this->db->query("SELECT * FROM modulo WHERE idVersion='$version' ");
            return $consulta->result_array();
            // break;
        } else {
            if ($numeroM == null && $nombreM != null) {
                $consulta = $this->db->query("SELECT * FROM modulo WHERE idVersion='$version' and nombreM='$nombreM' ");
                return $consulta->result_array();
                // break;
            } else {
                if ($numeroM != null && $nombreM == null) {
                    $consulta = $this->db->query("SELECT * FROM modulo WHERE idVersion='$version' and numeroM='$numeroM' ");
                    return $consulta->result_array();
                    // break;
                } else {
                    $consulta = $this->db->query("SELECT * FROM modulo WHERE numeroM='$numeroM' and nombreM='$nombreM' and idVersion='$version'");
                    return $consulta->result_array();
                    // break;
                }
            }
        }
    }

    public function buscarNextModulo($version, $numeroM, $nombreM) //se usa
    {
        $next = $this->db->query("SELECT (numeroM + 1) as prox FROM modulo WHERE numeroM='$numeroM' and nombreM='$nombreM' and idVersion='$version'");
        $nextMod = $next->result()[0]->prox;
        $consulta = $this->db->query("SELECT * FROM modulo WHERE numeroM=$nextMod");
        return $consulta->result_array();
    }
    public function get_primerModulo($version) //se usa
    {
        $primerMod = $this->db->query("SELECT MIN(numeroM) as primer FROM modulo WHERE idVersion='$version'");
        $primermodulo = $primerMod->result()[0]->primer;
        $consulta = $this->db->query("SELECT * FROM modulo WHERE numeroM=$primermodulo");
        return $consulta->result_array();
    }

    public function crearModulo($numM, $nombreM, $descripcionM, $vigenciaM, $desdeM, $hastaM, $version) //se usa
    {
        $this->db->query("INSERT INTO modulo(numeroM,nombreM,descripcionM,fecha_inicioMo,fecha_finalMo,vigenteMo,idVersion) VALUES
                            (" . $this->db->escape($numM) . "," . $this->db->escape($nombreM) . "," . $this->db->escape($descripcionM) . ",
                            " . $this->db->escape($desdeM) . "," . $this->db->escape($hastaM) . "," . $this->db->escape($vigenciaM) . "," . $this->db->escape($version) . ")");

        $idModulo = $this->db->insert_id();
        $nombreParalelo = 'A';
        $cantidadParalelo = 0;

        $this->db->query("INSERT INTO paralelo(nombre_paralelo,cantidad,idModulo) VALUES
        (" . $this->db->escape($nombreParalelo) . "," . $this->db->escape($cantidadParalelo) . "," . $this->db->escape($idModulo) . ")");

        $this->db->affected_rows();
    }
    public function getUltimo($version) //se usa
    {
        // $version=$this->session->userdata('idVersion');

        $id = $this->db->query("select max(numeroM) as idm from modulo where idVersion=$version");
        return $id->result()[0]->idm;
    }


    public function editarModulo($numM, $nombreM, $descripcionM, $vigenteM, $inicioM, $finalM, $version) //se usa
    {
        if ($vigenteM == 1) {
            $this->db->query("UPDATE modulo SET vigenteMo=0 WHERE idVersion=$version");
        }

        $editar = "UPDATE modulo SET nombreM='$nombreM' , descripcionM='$descripcionM',fecha_inicioMo='$inicioM', fecha_finalMo='$finalM', vigenteMo='$vigenteM' WHERE numeroM='$numM' and idVersion=$version";
        $this->db->query($editar);
        $this->db->affected_rows();
    }
    public function eliminarModulo($vers, $numeroM)
    {
        $query = "DELETE FROM modulo WHERE idModulo='$numeroM' and idVersion='$vers' ";

        $this->db->query($query);
        return $this->db->affected_rows() > 0;
    }
    public function getModuloIdORM(INT $idModulo)
    {

        $modulo = $this->db->get_where('modulo', array('idModulo' => $idModulo));
        return $modulo->result_array();
    }
    public function crearModuloData($data)
    {
        $this->db->insert('modulo', $data);
        return $this->db->insert_id();
    }
    public function getModuloById($idModulo)
    {
        $this->db->select('*');
        $this->db->from('modulo');
        $this->db->where('idModulo', $idModulo);
        $query = $this->db->get();
        return $query->row();
    }
    public function getModuloByNumeroMIdVersion($NumeroM, $idVersion)
    {
        $this->db->select('*');
        $this->db->from('modulo');
        $this->db->where('NumeroM', $NumeroM);
        $this->db->where('idVersion', $idVersion);
        $query = $this->db->get();
        return $query->row();
    }
    public function editarModuloData($data, $idModulo)
    {
        $this->db->where('idModulo', $idModulo);
        $this->db->update('modulo', $data);

        return $this->db->affected_rows();
    }
    public function actualizarModulosNumeroM($numeroM, $idVersion, $idModulo = null)
    {


        // Actualizamos los módulos
        $this->db->set('numeroM', 'numeroM+1', FALSE);
        $this->db->where('idVersion', $idVersion);
        $this->db->where('numeroM >=', $numeroM);
        $this->db->update('modulo');
    }
    //7  id256 
    public function actualizarModulosNumeroMCambiarDeLugar($numeroM, $idVersion, $idModulo = null)
    {
        if ($idModulo != null) {
            $modulo = $this->getModuloById($idModulo);
            if ($modulo->numeroM == $numeroM) {
                return;
            }
        }

        $moduloOriginal = $this->getModuloById($idModulo);
        $moduloEditar = $this->getModuloByNumeroMIdVersion($numeroM, $idVersion);

        // Actualizamos el modulo Editar
        $this->db->set('numeroM', $moduloOriginal->numeroM, FALSE);
        $this->db->where('idVersion', $idVersion);
        $this->db->where('idModulo', $moduloEditar->idModulo);
        $this->db->update('modulo');

        // Actualizamos el modulo orignal
        // $this->db->set('numeroM', $numeroM, FALSE);
        // $this->db->where('idVersion', $idVersion);
        // $this->db->where('idModulo', $moduloOriginal->idModulo);
        // $this->db->update('modulo');
    }
    public function actualizarModulosNumeroMRestar1($numeroM, $idVersion, $idModulo = null)
    {
        // Actualizamos los módulos
        $this->db->set('numeroM', 'numeroM-1', FALSE);
        $this->db->where('idVersion', $idVersion);
        $this->db->where('numeroM >=', $numeroM);
        $this->db->update('modulo');
    }
    public function eliminarModuloData($idModulo)
    {
        $this->db->where('idModulo', $idModulo);
        $this->db->delete('modulo');

    }
    public function inscritosCount($idModulo)
    {

        $this->db->select('COUNT(*) as total_inscritos');
        $this->db->from('asignacion_modulo_diplomante');
        $this->db->where('idModulo', $idModulo);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['total_inscritos'];
    }
}
