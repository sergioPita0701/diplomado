<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academicoseleccionado_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        
    }

    public function buscarAcademicoS($ci=null, $version=null)//se usa
    {
        $query=$this->db->query("SELECT * FROM academico_version WHERE ciA='$ci' and idVersion='$version'");
        return $query->num_rows();
        // return $query->result();
    }

    public function crearSeleccionA($ciA,$idVersion)//se usa
    {

        $sql="INSERT INTO academico_version(ciA,idVersion) VALUES
        (".$this->db->escape($ciA).",".$this->db->escape($idVersion).")";
        
        $this->db->query($sql);
        $this->db->affected_rows();
    }

    public function getAcademicoSeleccionado($version,$ci=null, $nombre=null)
    {
        if($ci==null && $nombre==null)
        {
            $consulta=$this->db->query("SELECT a.*,av.* FROM academico a
            INNER JOIN academico_version av ON a.ciA=av.ciA 
            INNER JOIN version v ON v.idVersion=av.idVersion 
            WHERE av.idVersion='$version'
            ORDER BY a.nombreA ASC ");
            return $consulta->result_array();
        }
        else
        {
            if ($ci!=null && $nombre==null) 
            {
                $consulta=$this->db->query("SELECT a.*,av.* FROM academico a
                INNER JOIN academico_version av ON a.ciA=av.ciA 
                INNER JOIN version v ON v.idVersion=av.idVersion 
                WHERE a.ciA='$ci' and av.idVersion='$version '
                ORDER BY a.nombreA ASC");
                return $consulta->result_array();
            } 
            else 
            {
                if ($ci==null && $nombre!=null) 
                {
                    $consulta=$this->db->query("SELECT a.*,av.* FROM academico a
                    INNER JOIN academico_version av ON a.ciA=av.ciA 
                    INNER JOIN version v ON v.idVersion=av.idVersion 
                    WHERE a.nombreA='$nombre' and av.idVersion='$version '
                    ORDER BY a.nombreA ASC");
                    return $consulta->result_array();
                } 
                else 
                {
                    $consulta=$this->db->query("SELECT a.*,av.* FROM academico a
                    INNER JOIN academico_version av ON a.ciA=av.ciA 
                    INNER JOIN version v ON v.idVersion=av.idVersion 
                    WHERE av.idVersion='$version' and a.ciA='$ci' or a.nombreA='$nombre'   
                    ORDER BY a.nombreA ASC");
                    return $consulta->result_array();
                    
                }
                
            }
            
        }
    }

    public function getTribunal_aleatorio($version,$tipoProfesion=null)
    {
        if($tipoProfesion==null)
        {
            $query=$this->db->query("SELECT a.*,av.*,prof.*,avpro.* FROM academico a
            INNER JOIN academico_version av ON a.ciA=av.ciA 
            INNER JOIN version v ON v.idVersion=av.idVersion 
            INNER JOIN academico_tiene_profesion avpro ON avpro.ciA=av.ciA 
            INNER JOIN profesion prof ON prof.idProfesion=avpro.idProfesion 
            WHERE av.idVersion='$version'
            ORDER BY RAND() LIMIT 2");
        }
        else
        {
            $query=$this->db->query("SELECT a.*,av.*,prof.*,avpro.* FROM academico a
            INNER JOIN academico_version av ON a.ciA=av.ciA 
            INNER JOIN version v ON v.idVersion=av.idVersion 
            INNER JOIN academico_tiene_profesion avpro ON avpro.ciA=av.ciA 
            INNER JOIN profesion prof ON prof.idProfesion=avpro.idProfesion 
            WHERE av.idVersion='$version' AND prof.gradoAcademicoP=$tipoProfesion
            ORDER BY RAND() LIMIT 2");
        }
        return $query->result_array();
    }
    // get de academico de la version con docencia, mono ytribunales osea TODO NO FUNCIONA OBVIO POR QUE NO TODOS HICIERON TODO ESO DA TABLA VACIA
    public function getAcademicoversion_condocenciaytribunal($version,$tipoacad=null)
    {
        if($tipoacad==null)
        {
            $query=$this->db->query("SELECT a.*,av.*,v.*,doc.*,mo.*,desigtrib.* FROM academico a
            INNER JOIN academico_version av ON a.ciA=av.ciA 
            INNER JOIN version v ON v.idVersion=av.idVersion 
            INNER JOIN docencia doc ON doc.idRegistroAV=av.idRegistroAV
            INNER JOIN modulo mo ON mo.idModulo=doc.idModulo
            INNER JOIN designar_tribunal desigtrib ON desigtrib.idRegistroAV=av.idRegistroAV
            WHERE v.idVersion=$version ");
        }
        else
        {
            // $idAcad=$this->db->query("select idAcademico from academico where ciA='$ci' ");
            // $idA=$idAcad->result()[0]->idAcademico;

            $query=$this->db->query("SELECT a.*,av.*,v.*,doc.*,mo.*,desigtrib.* FROM academico a
            INNER JOIN academico_version av ON a.ciA=av.ciA 
            INNER JOIN version v ON v.idVersion=av.idVersion 
            INNER JOIN docencia doc ON doc.idRegistroAV=av.idRegistroAV
            INNER JOIN modulo mo ON mo.idModulo=doc.idModulo
            INNER JOIN designar_tribunal desigtrib ON desigtrib.idRegistroAV=av.idRegistroAV
            WHERE doc.idRegistroAV=$tipoacad OR reamono.idRegistroAV=$tipoacad OR desigtrib.idRegistroAV=$tipoacad AND av.idVersion='$version' ");
        }
        return $query->result_array();
    }

}