<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Version_model extends CI_Model
{

    public function conexion()
    {
        if ($this->load->database()) {
            echo "se conecto con la base de datos";
        } else {
            echo "no se pudo conectar con la bd";
        }
    }
    public function habilitarVersion($idversion = null)
    {
        if ($idversion == null) {
            $query = $this->db->query("SELECT max(idVersion) as cantidad FROM version");
            $v = $query->result()[0]->cantidad;

            $sql = $this->db->query("SELECT estadoV as estado FROM version WHERE idVersion=$v");
            $estado = $sql->result()[0]->estado;
            if ($estado == 0) {
                //Habilitar la ultima version con 1 y poner 0 a las demas 
                $this->db->query("UPDATE version SET estadoV=0");
                $this->db->query("UPDATE version SET estadoV=1 WHERE idVersion=$v");
                $consulta = $this->db->query("SELECT * FROM version WHERE idVersion='$v'");
                return $consulta->row();
                // return $v;
            } else {
                $consulta = $this->db->query("SELECT * FROM version WHERE idVersion='$v'");
                return $consulta->row();
                // return $v;
            }
        } else {
            $consulta = $this->db->query("SELECT * FROM version WHERE nombreV='$idversion'");
            return $consulta->row();
        }
    }
    public function ultimaVersion()
    {
        $query = $this->db->query("SELECT max(idVersion) as cantidad FROM version");
        $v = $query->result()[0]->cantidad;

        $consulta = $this->db->query("SELECT * FROM version WHERE idVersion='$v'");
        return $consulta->row();
    }
    public function tiempoFechas($id) //esta bien devuelve cantidad de dias restantes
    {
        $fecha = $this->db->query("SELECT fechaV as fecha FROM version WHERE idVersion=$id");
        $fechainicio = $fecha->result()[0]->fecha;

        $tiempov = $this->db->query("SELECT tiempoV as tiempo FROM version WHERE idVersion=$id");
        $t = $tiempov->result()[0]->tiempo;

        $f = date_create($fechainicio);
        $tiempo = $t . ' months';

        date_add($f, date_interval_create_from_date_string($tiempo));
        $fechafinal = date_format($f, 'Y-m-d');

        $fi = date_create(); //$fi=date_create($fechainicio);cuando se crea la versionen otra diferente a la actual
        $ff = date_create($fechafinal);

        $trestante = date_diff($fi, $ff);
        return $trestante->format('%m meses %d dias ');
    }

    public function iniciarVersion($id)
    {
        $sql = $this->db->query("SELECT estadoV as estado FROM version WHERE idVersion=$id");
        $estado = $sql->result()[0]->estado;
        if ($estado == 0) {
            $this->db->query("UPDATE version SET estadoV=0");
            $this->db->query("UPDATE version SET estadoV=1 WHERE idVersion=$id");
        } else {
            $this->db->query("UPDATE version SET estadoV=0 WHERE idVersion=$id");
        }
    }
    public function iniciarApagarV($id)
    {

        $sql = $this->db->query("SELECT estadoV as estado FROM version WHERE idVersion=$id");
        $estado = $sql->result()[0]->estado;
        if ($estado == 0) {

            $aa = $this->db->query("UPDATE version SET estadoV=1 WHERE idVersion=$id");
            // echo "el estado era 0 se inicion 1 del id '$id'";
            // return true;    
        } else {
            $aa = $this->db->query("UPDATE version SET estadoV=0 WHERE idVersion=$id");
            // echo "el estado era 1 se apago 0 del id '$id'";
            // return false;
        }
    }

    public function crearVersion($nombre, $fecha, $tiempo, $descripcion, $costo, $lugar, $estado, $tipoCursoV, $porcentajeDescuentoV)
    {
        $this->db->query("UPDATE version SET estadoV=0 ");

        $sql = "INSERT INTO version(idVersion,nombreV,fechaV,tiempoV,descripcionV,costoV,lugarV,estadoV,tipoCursoV,porcentajeDescuentoV) VALUES
        (" . $this->db->escape('') . ", " . $this->db->escape($nombre) . ",
        " . $this->db->escape($fecha) . "," . $this->db->escape($tiempo) . ",
        " . $this->db->escape($descripcion) . "," . $this->db->escape($costo) . ",
        " . $this->db->escape($lugar) . "," . $this->db->escape($estado) . ",
        " . $this->db->escape($tipoCursoV) . "," . $this->db->escape($porcentajeDescuentoV) . ")";

        $this->db->query($sql);
        //----------------
        $idVersion = $this->db->insert_id();
        return $idVersion;
    }
    public function editarVersion($nombre, $fecha, $tiempo, $descripcion, $costo, $lugar, $tipoCursoV, $porcentajeDescuentoV)
    {
        $sql = "UPDATE version SET fechaV='$fecha', tiempoV='$tiempo', descripcionV='$descripcion', costoV='$costo', lugarV='$lugar', tipoCursoV='$tipoCursoV', porcentajeDescuentoV='$porcentajeDescuentoV' 
        WHERE nombreV='$nombre'";

        $this->db->query($sql);
        $this->db->affected_rows();
    }

    public function eliminarVersion($nombre)
    {
        $this->db->query("DELETE FROM version WHERE nombreV='$nombre'");

        return $this->db->affected_rows() > 0;
    }

    public function getVersiones($nombre = null)
    {
        // $nombre=var_dump($nombre);
        if ($nombre == null) {
            $consulta = $this->db->query("SELECT * FROM version ORDER BY nombreV ASC");
            return $consulta->result_array();
        } else {
            $consulta = $this->db->query("SELECT * FROM version WHERE nombreV='$nombre' ORDER BY nombreV ASC ");
            return $consulta->row();
        }
    }

    public function mostrar_versiones_habilitados()
    {
        $query = $this->db->query("SELECT * FROM version WHERE estadoV=1");
        // return $query->result_array();
        return $query->row();
    }
    // HABILITA Y DESABILITAR VERSIONES
    public function terminar_version($idVersion)
    {
        $sql = $this->db->query("SELECT estadoV as estado FROM version WHERE idVersion=$idVersion");
        $estado = $sql->result()[0]->estado;

        date_default_timezone_set('America/Caracas');
        $fechaTerminoV = date("Y-m-d");

        if ($estado == 1) {
            $accion = $this->db->query("UPDATE version SET estadoV=0, fecha_termino='$fechaTerminoV' WHERE idVersion=$idVersion");
        } else {
            $accion = false;
        }
        return $accion;
    }
    public function reiniciar_version($idVersion)
    {
        $sql = $this->db->query("SELECT estadoV as estado FROM version WHERE idVersion=$idVersion");
        $estado = $sql->result()[0]->estado;

        if ($estado == 0) {
            $this->db->query("UPDATE version SET estadoV=0");
            $accion = $this->db->query("UPDATE version SET estadoV=1 WHERE idVersion=$idVersion");

            // $consulta=$this->db->query("SELECT * FROM version WHERE idVersion='$idVersion'");
            // return $consulta->row();
        } else {
            $accion = false;
        }
        return $accion;
    }

    // HABILITAR INSCRIPCIONES
    public function habilitarfechaInscripcion($version, $fechainsc)
    {
        $sql = "UPDATE version SET finscripciones_hasta='$fechainsc' WHERE idVersion='$version' ";
        $this->db->query($sql);
        $this->db->affected_rows();
    }
    public function getIdVersion($idVersion)
    {
        $this->db->select('*');
        $this->db->from('version');
        $this->db->where('idVersion', $idVersion);
        $consulta = $this->db->get();

        return $consulta->row();
    }
    public function getVersionByID($idVersion)
    {
        $this->db->select('*');
        $this->db->from('version');
        $this->db->where('idVersion', $idVersion);
        $query = $this->db->get();
        // Devolver los resultados
        return $query->row_array();
    }
    public function insertarVersionData($data)
    {
        $this->db->insert('version', $data);
        return $this->db->insert_id();
    }
    public function editarVersionData($data, $idVersion)
    {
        $this->db->where('idVersion', $idVersion);
        $this->db->update('version', $data);
        return $this->db->affected_rows();
    }
    public function modulosCount($idVersion)
    {
        $this->db->select('COUNT(*) as total_modulos');
        $this->db->from('modulo');
        $this->db->join('version', 'modulo.idVersion = version.idVersion');
        $this->db->where('version.idVersion', $idVersion);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['total_modulos'];
    }
    public function getExportarcionCsv($idVersion)
    {
        $this->db->select('
        d.*,
        v.*,
        t.*,
        i.*,
        des.*,
        SUM(p.montoP) as totalPagos' // Cambia 'monto' al nombre correcto del campo que representa el monto de pago
        );
    $this->db->from('pago p');
    $this->db->join('transaccion t', 'p.idTransaccion = t.idTransaccion', 'left');
    $this->db->join('inscripcion i', 't.idInscripcion = i.idInscripcion', 'left');   
    $this->db->join('version v', 'v.idVersion = i.idVersion', 'left');
    $this->db->join('diplomante d', 'i.idDiplomante = d.idDiplomante', 'left');
    $this->db->join('descuento des', 'des.idDescuento = t.idDescuento', 'left');
    $this->db->where('v.idVersion', $idVersion);
    $this->db->group_by('t.idTransaccion, i.idInscripcion, v.idVersion, d.idDiplomante');
    
    $query = $this->db->get();
    return $query->result_array();
    }
}