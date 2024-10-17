<?php
defined('BASEPATH') or exit('No direct script access allowed');

class inscripcion_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function registrarInscripcion($version, $numI, $ciI, $sexoI, $paisNacI, $departNacI, $fechaNacI, $estadoCivilI, $direccionI, $telefonoI, $celularI, $emailI, $fInscripcionI)
    {
        // $data['idv']=$this->session->userdata('idVersion');

        $diplomante = $this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$ciI'");

        $sql = "INSERT INTO inscripcion(idVersion,idDiplomante,numeroI,ciI,sexoI,paisnacI,departamentonacI,fechanacI,estadoCivilI,direccionI,telefonoI,celularI,emailI,fechaInscripcionI)
              VALUES(" . $this->db->escape($version) . "," . $diplomante->result()[0]->idDiplomante . "," . $this->db->escape('I-' . $numI) . "," . $this->db->escape($ciI) . "," . $this->db->escape($sexoI) . ",
              " . $this->db->escape($paisNacI) . "," . $this->db->escape($departNacI) . "," . $this->db->escape($fechaNacI) . "," . $this->db->escape($estadoCivilI) . ",
              " . $this->db->escape($direccionI) . "," . $this->db->escape($telefonoI) . "," . $this->db->escape($celularI) . "," . $this->db->escape($emailI) . "," . $this->db->escape($fInscripcionI) . ")";

        $this->db->query($sql);
    }
    public function ultInscripcion($version)
    {
        $inscrito = $this->db->query("SELECT MAX(numeroI) AS uinscrito FROM inscripcion WHERE idVersion='$version'");
        $inscripcion = $inscrito->result()[0]->uinscrito;
        if (empty($inscripcion)) {
            $resultado = '99';
        } else {
            $resultado = intval(preg_replace('/[^0-9]+/', '', $inscripcion), 10);
        }
        return $resultado;
    }

    public function eliminarInscripcion($version, $ciI, $numI) //no se usa
    {
        $diplomante = $this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$ciI'");
        $idDiplomante = $diplomante->result()[0]->idDiplomante;

        $inscrip = $this->db->query("SELECT idInscripcion FROM inscripcion WHERE idVersion=$version and idDiplomante=$idDiplomante ");
        $idInscripcion = $inscrip->result()[0]->idInscripcion;

        $this->db->query("DELETE FROM inscripcion WHERE idInscripcion=$idInscripcion and idVersion=$version and idDiplomante=$idDiplomante ");

        return $this->db->affected_rows() > 0;
    }

    public function editarInscripcion($ciI, $numI, $paisNacI, $departNacI, $fechaNacI, $sexoI, $estadoCivilI, $direccionI, $telefonoI, $celularI, $emailI, $fInscripcionI, $version)
    {
        $diplomante = $this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$ciI'");
        $idDiplomante = $diplomante->result()[0]->idDiplomante;

        $inscrip = $this->db->query("SELECT idInscripcion FROM inscripcion WHERE idVersion=$version and idDiplomante=$idDiplomante ");
        $idInscripcion = $inscrip->result()[0]->idInscripcion;

        $this->db->query("UPDATE inscripcion SET numeroI='$numI',paisnacI='$paisNacI', departamentonacI='$departNacI', fechanacI='$fechaNacI',sexoI='$sexoI',
        estadoCivilI='$estadoCivilI', direccionI='$direccionI', telefonoI='$telefonoI', celularI='$celularI', emailI='$emailI', fechaInscripcionI='$fInscripcionI' 
        WHERE idInscripcion='$idInscripcion' ");
        return $this->db->affected_rows() > 0;
    }
    public function buscar_inscripcion($version, $ci = null, $inscripcion = null, $nombre = null, $profesion = null, $sexo = null, $ciudadactual = null, $estadocivil = null) //s usa
    {
        if ($ci == null && $inscripcion == null && $nombre == null && $profesion == null && $sexo == null && $ciudadactual == null && $estadocivil == null) {
            $inscripcion = $this->db->query("SELECT i.*, d.*,pr.* FROM diplomante d 
            INNER JOIN profesion pr on pr.idProfesion=d.idProfesion
            INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante
            WHERE i.idVersion= $version");
            return $inscripcion->result_array();
        } else {
            if ($ci == "nada") {
                $inscripcion = $this->db->query("SELECT i.*, d.*,pr.* FROM diplomante d 
                INNER JOIN profesion pr on pr.idProfesion=d.idProfesion
                INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante
                WHERE d.ciD=' ' and i.idVersion= $version ");
            } else {
                $inscripcion = $this->db->query("SELECT i.*, d.*,pr.* FROM diplomante d 
                INNER JOIN profesion pr on pr.idProfesion=d.idProfesion
                INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante
                WHERE i.ciI='$ci'  and i.idVersion= $version "); //hacer para mas buscadores como sexo,

                return $inscripcion->result_array();
            }
        }
    }

    public function getregistroInsripciones($version, $ci = null) //se usa
    {
        // $diplomante=$this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$ci'");
        // $idDiplomante=$diplomante->result()[0]->idDiplomante;
        // echo $idDiplomante;
        if ($ci == null) {
            $inscripcion = $this->db->query("SELECT i.*, d.*,pr.* FROM diplomante d 
            INNER JOIN profesion pr on pr.idProfesion=d.idProfesion
            INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante
            WHERE i.idVersion= $version");
            return $inscripcion->result();
        } else {

            $inscripcion = $this->db->query("SELECT i.*, d.*,pr.* FROM diplomante d 
            INNER JOIN profesion pr on pr.idProfesion=d.idProfesion
            INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante
            WHERE i.ciI='$ci' and i.idVersion= $version ");

            return $inscripcion->result();
        }
    }

    public function getDiplomante_no_registrado($version) //no da por q va mostrar a todos los que no pertenecen a la version
    {
        $inscripcion = $this->db->query("SELECT d.*,pr.* FROM diplomante d 
        INNER JOIN profesion pr on pr.idProfesion=d.idProfesion
         "); //WHERE d.ciD!=(select ciD from inscripcion where idVersion=$version) 

        return $inscripcion->result();
    }

    public function numeroInscritos($version, $ci = null) //se usa para sacar nuero d cuantos inscrits hay
    {
        if ($ci == null) {
            $query = $this->db->query("SELECT * FROM inscripcion WHERE idVersion=$version ");
        } else {
            $query = $this->db->query("SELECT * FROM inscripcion WHERE ciI='$ci' and idVersion=$version ");
        }
        return $query->num_rows();
    }
    public function getIDInscripcion($idI) //se usa para sacar nuero d cuantos inscrits hay
    {
        $sql = "SELECT * FROM inscripcion WHERE idInscripcion=$idI";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function registrarInscripcionData($data)
    {

        // Insertar datos en la tabla 'inscripcion'
        $this->db->insert('inscripcion', $data);

        $idInscripcion = $this->db->insert_id();

        // Retornar el ID de la inscripción
        return $idInscripcion;
    }
    public function asignacionesCount($idInscripcion)
    {
        $this->db->select('COUNT(*) as total_asignaciones');
        $this->db->from('asignacion_modulo_diplomante');
        $this->db->join('inscripcion', 'asignacion_modulo_diplomante.idInscripcion = inscripcion.idInscripcion');
        $this->db->where('inscripcion.idInscripcion', $idInscripcion);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['total_asignaciones'];
    }
    public function insertarInscripcion($data)
    {
        $this->db->insert('inscripcion', $data);
        return $this->db->insert_id();
    }
    public function getInscripcionById($idInscripcion)
    {
        $this->db->select('*');
        $this->db->from('inscripcion');
        $this->db->where('idInscripcion', $idInscripcion);
        $query = $this->db->get();
        return $query->row();
    }
 
    // public function editarInscripcion($nommod,$ciudmod,$profmod)//nos usa
    // {
    //     $sql="UPDATE doplomado SET nombreD=$nommod,ciudadD=$ciudmod,profecionD=$profmod
    //      WHERE ciD=$ciD";
    //     $this->db->query($sql); 
    // }


    // public function inscripcionesAlDia($fecha=null)//no se usa
    // {
    //     if($fecha==null)
    //     {

    //         $inscripcion=$this->db->query('SELECT * FROM inscripcion WHERE fechaInscripcionI=(SELECT MAX(fechaInscripcionI) as fechaactual FROM inscripcion)');
    //         return $inscripcion->result();
    //     }else
    //     {
    //         $inscripcion=$this->db->query("SELECT * FROM inscripcion WHERE fechainscripcionI='$fecha'");

    //             return $inscripcion->result();

    //     }
    // }





}