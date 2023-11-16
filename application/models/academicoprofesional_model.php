<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academicoprofesional_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getAcademicoProfesional($ci=null, $nombre=null, $profesion=null, $grado=null)
    {
        if($ci==null && $nombre==null && $profesion==null && $grado==null)
        {
            $consulta=$this->db->query("SELECT a.*, p.*,atp.* FROM academico a
            INNER JOIN academico_tiene_profesion atp ON a.ciA=atp.ciA 
            INNER JOIN profesion p ON p.idProfesion=atp.idProfesion
            ORDER BY a.nombreA ASC ");
            return $consulta->result_array();
        }
        else
        {
            if ($ci!=null && $nombre==null && $profesion==null && $grado==null) 
            {
                $consulta=$this->db->query("SELECT a.*, p.*,atp.* FROM academico a
                INNER JOIN academico_tiene_profesion atp ON a.ciA=atp.ciA 
                INNER JOIN profesion p ON p.idProfesion=atp.idProfesion 
                WHERE a.ciA='$ci' ORDER BY a.nombreA ASC");
                return $consulta->result_array();
            } 
            else 
            {
                if ($ci==null && $nombre!=null && $profesion==null && $grado==null) {
                    $consulta=$this->db->query("SELECT a.*, p.*,atp.* FROM academico a
                    INNER JOIN academico_tiene_profesion atp ON a.ciA=atp.ciA 
                    INNER JOIN profesion p ON p.idProfesion=atp.idProfesion 
                    WHERE a.nombreA='$nombre' ORDER BY a.nombreA ASC");
                    return $consulta->result_array();
                } 
                else 
                {
                    if ($ci==null && $nombre==null && $profesion!=null && $grado==null) {
                        $consulta=$this->db->query("SELECT a.*, p.*,atp.* FROM academico a
                        INNER JOIN academico_tiene_profesion atp ON a.ciA=atp.ciA 
                        INNER JOIN profesion p ON p.idProfesion=atp.idProfesion 
                        WHERE p.nombreP='$profesion' ORDER BY a.nombreA ASC");
                        return $consulta->result_array();
                    } 
                    else 
                    {
                        if ($ci==null && $nombre==null && $profesion==null && $grado!=null) {
                            $consulta=$this->db->query("SELECT a.*, p.*,atp.* FROM academico a
                            INNER JOIN academico_tiene_profesion atp ON a.ciA=atp.ciA 
                            INNER JOIN profesion p ON p.idProfesion=atp.idProfesion 
                            WHERE p.gradoAcademicoP='$grado' ORDER BY a.nombreA ASC");
                            return $consulta->result_array();
                        } 
                        else 
                        {
                            $consulta=$this->db->query("SELECT a.*, p.*,atp.* FROM academico a
                            INNER JOIN academico_tiene_profesion atp ON a.ciA=atp.ciA 
                            INNER JOIN profesion p ON p.idProfesion=atp.idProfesion 
                            WHERE a.ciA='$ci' or a.nombreA='$nombre' or p.nombreP='$profesion' or p.gradoAcademicoP='$grado' 
                            ORDER BY a.nombreA ASC");
                            return $consulta->result_array();
                        }
                        
                    }
                    
                }
                
            }
            
        }
        
    }
    //ESTE MODAL PRUEBA PARA QUE NO HAYA DUPLICIDAD DE ACADEMICOS CON SUS DIFERENTES CARRERAS SOLO TIENE Q HABER 1
    public function getsoloAcademico($ci=null, $nombre=null)
    {
        if($ci==null && $nombre==null)
        {
            $consulta=$this->db->query("SELECT * FROM academico
            ORDER BY nombreA ASC ");
            return $consulta->result_array();
        }
        else
        {
            if ($ci!=null && $nombre==null) 
            {
                $consulta=$this->db->query("SELECT * FROM academico 
                WHERE ciA='$ci' ORDER BY nombreA ASC");
                return $consulta->result_array();
            } 
            else 
            {
                if ($ci==null && $nombre!=null ) {
                    $consulta=$this->db->query("SELECT * FROM academico 
                    WHERE nombreA='$nombre' ORDER BY nombreA ASC");
                    return $consulta->result_array();
                } 
                else 
                {
                    $consulta=$this->db->query("SELECT * FROM academico 
                    WHERE ciA='$ci' or nombreA='$nombre' 
                    ORDER BY nombreA ASC");
                    return $consulta->result_array();
                }
                
            }
            
        }
        
    }
    public function datos_todo_academico($ciA=null)
    {
        if($ciA==null)
        {
            $consulta=$this->db->query("SELECT * FROM academico  ORDER BY nombreA ASC");   
            return $consulta->result_array();
        }
        else{
            $consulta=$this->db->query("SELECT * FROM academico WHERE ciA='$ciA' ORDER BY nombreA ASC");   
            return $consulta->result_array();
        }
    }
    public function buscarAcademicoProfesion($ci,$profesion)
    {
        // $idAcad=$this->db->query("select idAcademico from academico where ciA='$ci' ");
        // $idA=$idAcad->result()[0]->idAcademico;

        $query=$this->db->query("SELECT * FROM academico_tiene_profesion WHERE ciA='$ci' and idProfesion='$profesion' ");
        return $query->num_rows();
    }

    public function crearAcademico_tiene_profesion($ci,$profesion)
    {
        // $query=$this->db->query("SELECT * FROM academico_tiene_profesion WHERE ciA='$ci' and idProfesion='$profesion' ");
        // $numero=$query->num_rows();
        $sql="INSERT INTO academico_tiene_profesion(ciA,idProfesion) VALUES
        (".$this->db->escape($ci).",".$this->db->escape($profesion).")";
        
        $this->db->query($sql);
        $this->db->affected_rows();
        

        
    }

    public function obtenerProfesiones($ci = null)
    {
        $consulta=$this->db->query("SELECT p.idProfesion FROM academico a
        INNER JOIN academico_tiene_profesion atp ON a.ciA=atp.ciA 
        INNER JOIN profesion p ON p.idProfesion=atp.idProfesion 
        WHERE a.ciA='$ci'
        ORDER BY a.nombreA ASC");
        return $consulta->result_array();
    }

    public function editarProfesionAcad($tieneAcadProf,$ciA,$idProf)
    {

        $editar="UPDATE academico_tiene_profesion SET ciA='$ciA' , idProfesion='$idProf' WHERE idTieneAPr='$tieneAcadProf'";
        
        if($this->db->query($editar))
        {
            return true;
        }else
        {
            return false;
        }
    }
    public function eliminarProfesionAcademico($ciA,$idProf)
    {
        $this->db->query("DELETE FROM academico_tiene_profesion WHERE ciA='$ciA' and idProfesion='$idProf' ");
        return $this->db->affected_rows()>0;
    }
    
}