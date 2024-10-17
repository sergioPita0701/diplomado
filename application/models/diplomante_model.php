<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diplomante_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function getDiplomante($ci = null)
    {
        if ($ci == null) {
            $diplomante = $this->db->query('SELECT di.*,pr.* FROM diplomante di INNER JOIN profesion pr ON pr.idProfesion=di.idProfesion ORDER BY nombreD ASC');
            return $diplomante->result_array();
        } else {
            if ($ci == "nada") {
                $diplomante = $this->db->query("SELECT * FROM diplomante WHERE ciD='' ");
            } else {
                $diplomante = $this->db->query("SELECT di.*,pr.* FROM diplomante di INNER JOIN profesion pr ON pr.idProfesion=di.idProfesion 
                WHERE ciD='$ci' ORDER BY nombreD ASC");
                return $diplomante->result_array();
            }
        }
    }

    public function registrarDiplomante($ciD, $nomD, $apePaternoD, $apeMaternoD, $ciudadD, $profD)
    {
        $sql = "INSERT INTO diplomante(ciD,nombreD,apellidoPaternoD,apellidoMaternoD,ciudadD,idProfesion)
              VALUES(" . $this->db->escape($ciD) . "," . $this->db->escape($nomD) . "," . $this->db->escape($apePaternoD) . "," . $this->db->escape($apeMaternoD) . "," . $this->db->escape($ciudadD) . ",
              " . $this->db->escape($profD) . ")";
        $this->db->query($sql);
        // echo $this->db->affected_rows();
    }

    public function eliminarDiplomante($idD)
    {
        $sql = "DELETE FROM diplomante WHERE id=$idD";
        $this->db->query($sql);
    }

    public function editarDiplomante($ciD, $nomb, $apePaterno, $apeMaterno, $ciud, $prof)
    {
        $sql = "UPDATE diplomante SET nombreD='$nomb', apellidoPaternoD='$apePaterno',apellidoMaternoD='$apeMaterno', ciudadD='$ciud', idProfesion='$prof'
         WHERE ciD='$ciD' ";
        $this->db->query($sql);
        $this->db->affected_rows();
    }
    public function ultDiplomante()
    {
        $ultDiplomante = $this->db->query('SELECT MAX(idDiplomante) as diplomate FROM diplomante'); //SELECT di.*,pr.* FROM diplomante di INNER JOIN profesion pr ON pr.idProfesion=di.idProfesion
        $id = $ultDiplomante->result()[0]->diplomate;

        $diplo = $this->db->query("SELECT di.*,pr.* FROM diplomante di INNER JOIN profesion pr ON pr.idProfesion=di.idProfesion 
        WHERE idDiplomante=$id ORDER BY nombreD ASC");
        return $diplo->result();
    }

    public function buscarD($ci = null) //revisar!
    {
        $query = $this->db->query("SELECT di.*,pr.* FROM diplomante di INNER JOIN profesion pr ON pr.idProfesion=di.idProfesion 
        WHERE ciD=$ci");
        if ($query->num_rows() > 0) {
            echo "existe";
            return $query->result();
        } else {
            echo "no existe";
        }
    }
    public function getDiplomanteByCiD($ciD)
    {

        $this->db->select('*');
        $this->db->from('diplomante');
        $this->db->where('ciD', $ciD);
        $query = $this->db->get();
        return $query->row();
    }
    public function getDiplomanteByCiDLike($ciD)
    {
        // Usar expresión regular para capturar solo los dígitos
        if (preg_match('/\d+/', $ciD, $matches)) {
        
            $number = $matches[0]; // Captura solo los dígitos
        } else {
            return null; // Si no se encuentra un número, retorna null
        }

        // Realizar la consulta a la base de datos utilizando LIKE
        $this->db->select('*');
        $this->db->from('diplomante');
        // Utilizar LIKE para buscar el número en ciD
        $this->db->like('ciD', $number);
        $query = $this->db->get();
        return $query->row();
    }
    public function insertarDiplomante ($data){
        
        $this->db->insert('diplomante', $data);
        return $this->db->insert_id();
    }
    public function getDiplomanteById($idDiplomante)
    {
        $this->db->select('*');
        $this->db->from('diplomante');
        $this->db->where('idDiplomante', $idDiplomante);
        $query = $this->db->get();
        return $query->row();
    }
   
}