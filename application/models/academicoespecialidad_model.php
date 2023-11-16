<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academicoespecialidad_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_academico_prof_especialidad($ciA=null)
    {
        if($ciA==null)
        {
            $consulta=$this->db->query("SELECT a.*,p.*,e.*, te.*,atp.* FROM academico a 
            INNER JOIN academico_tiene_profesion atp ON a.ciA=atp.ciA
            INNER JOIN profesion p ON p.idProfesion=atp.idProfesion
            INNER JOIN tieneapr_especialidad te ON te.idTieneAPr=atp.idTieneAPr
            INNER JOIN especialidad e ON e.idEspecialidad=te.idEspecialidad
            ORDER BY a.nombreA ASC");
            return $consulta->result_array();
        }
        else
        {
            
            $consulta=$this->db->query("SELECT a.*,p.*,e.*, te.*,atp.* FROM academico a 
            INNER JOIN academico_tiene_profesion atp ON a.ciA=atp.ciA
            INNER JOIN profesion p ON p.idProfesion=atp.idProfesion
            INNER JOIN tieneapr_especialidad te ON te.idTieneAPr=atp.idTieneAPr
            INNER JOIN especialidad e ON e.idEspecialidad=te.idEspecialidad
            WHERE a.ciA='$ciA' ");
            return $consulta->result_array();
        }
        
    }
    public function buscarAcademicoEspecialidad($ci,$especialidad)
    {
        // $idAcad=$this->db->query("select idAcademico from academico where ciA='$ci' ");
        // $idA=$idAcad->result()[0]->idAcademico;

        $query=$this->db->query("SELECT * FROM academico_tiene_especialidad WHERE ciA='$ci' and idEspecialidad='$especialidad' ");
        return $query->num_rows();
    }
    // este de abajo no se usa, por que se creo otra relacion, abajo esta el q se usa
    public function crearAcademico_tiene_especialidad($ci,$especialidad,$profesion)
    {
        $query=$this->db->query("SELECT * FROM academico_tiene_especialidad WHERE ciA='$ci' and idEspecialidad='$especialidad' and idProfesion='$profesion' ");
        $num=$query->num_rows();

        if ($num==0) 
        {

            $this->db->query("INSERT INTO academico_tiene_especialidad(ciA,idEspecialidad,idProfesion) VALUES
            (".$this->db->escape($ci).",".$this->db->escape($especialidad).",".$this->db->escape($profesion).")");

            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function crearTieneAPr_especialidad($ci,$especialidad,$profesion)
    {
        $data=$this->db->query("SELECT idTieneAPr FROM academico_tiene_profesion WHERE ciA='$ci' and idProfesion='$profesion' ");
        $idtieneAPr=$data->result()[0]->idTieneAPr;

        $query=$this->db->query("SELECT * FROM tieneapr_especialidad WHERE idTieneAPr='$idtieneAPr' and idEspecialidad='$especialidad' ");
        $num=$query->num_rows();

        if ($num==0) 
        {

            $this->db->query("INSERT INTO tieneapr_especialidad(idTieneAPr,idEspecialidad) VALUES
            (".$this->db->escape($idtieneAPr).",".$this->db->escape($especialidad).")");

            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function buscarEspecialidad( $var)
    {
        $consulta=$this->db->query("SELECT p.nombreP,e.nombreE FROM especialidad e 
                 INNER JOIN  academico_tiene_especialidad ate ON e.idEspecialidad=ate.idEspecialidad
                 INNER JOIN profesion p ON p.idProfesion=ate.idProfesion
                 WHERE p.idProfesion=$var");
        return $consulta->result_array();
        // return $id;
    }

    public function eliminarEspecialidad_de_academico($ci,$profesion,$especialidad)
    {
        $especialidad=$this->db->query("SELECT idEspecialidad FROM especialidad WHERE nombreE='$especialidad' ");
        $idEspecialidad=$especialidad->result()[0]->idEspecialidad;
        
        $data=$this->db->query("SELECT idTieneAPr FROM academico_tiene_profesion WHERE ciA='$ci' and idProfesion='$profesion' ");
        $idtieneAPr=$data->result()[0]->idTieneAPr;

        $this->db->query("DELETE FROM tieneapr_especialidad WHERE idTieneAPr='$idtieneAPr' and idEspecialidad='$idEspecialidad' ");
        
        return $this->db->affected_rows()>0;
    }
    
}