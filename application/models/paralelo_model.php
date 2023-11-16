<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paralelo_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getParalelo($version,$modulo=null)//se usa
    {
        
        if($modulo==null)
        {
            // $consulta=$this->db->query("SELECT acad.*,doc.*,av.*,m.*,p.* FROM paralelo p
            // INNER JOIN modulo m on m.idModulo=p.idModulo
            // INNER JOIN docencia doc  on doc.idDocencia=p.idDocencia
            // INNER JOIN academico_version av on av.idRegistroAV=doc.idRegistroAV
            // INNER JOIN academico acad on acad.ciA=av.ciA
            // WHERE av.idVersion=$version and m.idVersion=$version
            // ORDER BY m.nombreM ASC "); 
            $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m 
            INNER JOIN paralelo p on p.idModulo=m.idModulo
            WHERE m.idVersion='$version' ORDER BY m.numeroM ASC");
            return $consulta->result_array();
        }
        else
        {
            $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m 
            INNER JOIN paralelo p on p.idModulo=m.idModulo
            WHERE m.idVersion='$version' and m.idModulo=(SELECT idModulo FROM modulo WHERE numeroM='$modulo' and idVersion=$version) ORDER BY m.numeroM ASC");
            return $consulta->result_array();
        }
        
    }
    public function getParalelo_menos_elIndicado($version,$modulosele=null,$paralelo=null)//se usa
    {
        if($modulosele==null)
        {
            $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m 
            INNER JOIN paralelo p on p.idModulo=m.idModulo
            WHERE m.idVersion='$version' ORDER BY p.nombre_paralelo ASC");
            return $consulta->result_array();
        }
        else
        {
            // $paralelo=$this->db->query("SELECT nombre_paralelo FROM paralelo p                  -- desd aqui se aumenta
            //                             INNER JOIN archivo a ON a.idParalelo=p.idParalelo 
            //                             INNER JOIN modulo m ON m.idModulo=p.idModulo
            //                             INNER JOIN version v ON v.idVersion=m.idVersion 
            //                             WHERE m.numeroM='$modulosele' and m.idVersion=$version");
            // $nomParalelo= $paralelo->result()[0]->nombre_paralelo;                                         // -- hasta aqui

            $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m 
            INNER JOIN paralelo p on p.idModulo=m.idModulo
            WHERE m.idVersion='$version' and m.idModulo=(SELECT idModulo FROM modulo WHERE numeroM='$modulosele' and idVersion=$version) 
            and p.nombre_paralelo<>'$paralelo' 
            ORDER BY p.nombre_paralelo ASC");
            return $consulta->result_array();
        }
        
    }
    public function buscarParalelo($version,$numModulo=null,$nombreParalelo=null)//se usa
    {
        if($numModulo==null && $nombreParalelo==null)
        {
            $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m 
            INNER JOIN paralelo p on p.idModulo=m.idModulo
            WHERE m.idVersion='$version' ORDER BY p.nombre_paralelo ASC ");
            return $consulta->result_array();
        }
        else 
        {
            if ($numModulo==null && $nombreParalelo!=null) 
            {
                $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m 
                INNER JOIN paralelo p on p.idModulo=m.idModulo
                WHERE m.idVersion='$version' and p.nombre_paralelo='$nombreParalelo' ORDER BY p.nombre_paralelo ASC");
                return $consulta->result_array();
            } 
            else 
            {
                if ($numModulo!=null && $nombreParalelo==null) 
                {
                    $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m 
                    INNER JOIN paralelo p on p.idModulo=m.idModulo
                    WHERE m.idVersion='$version' and m.numeroM='$numModulo' ORDER BY p.nombre_paralelo ASC");
                    return $consulta->result_array();
                } 
                else 
                {
                    $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m 
                    INNER JOIN paralelo p on p.idModulo=m.idModulo
                    WHERE m.idVersion='$version' and m.numeroM='$numModulo' and p.nombre_paralelo='$nombreParalelo' ORDER BY p.nombre_paralelo ASC");
                    return $consulta->result_array();
                }
                
            }
        }
        
    }
    
    public function crear_paralelo($numModulo,$nombreParalelo,$cantidad,$version)//se usa
    {
        $modulo=$this->db->query("select idModulo from modulo where idVersion=$version and numeroM=$numModulo");
        $idModulo= $modulo->result()[0]->idModulo;

        $sql="INSERT INTO paralelo(nombre_paralelo,cantidad,idModulo) VALUES
        (".$this->db->escape($nombreParalelo).",".$this->db->escape($cantidad).",".$this->db->escape($idModulo).")";
        
        $this->db->query($sql);

        $this->db->affected_rows();
    }

    public function existenombreParalelo($version,$numModulo,$nombreParalelo,$idParalelo)
    {
        $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m 
        INNER JOIN paralelo p on p.idModulo=m.idModulo
        WHERE m.idVersion='$version' and m.numeroM='$numModulo' and p.nombre_paralelo='$nombreParalelo' and p.idParalelo<>'$idParalelo' ");
        return $consulta->result_array();
    }

    public function editarParalelo($idParalelo,$nombreParalelo,$cantidadParalelo,$numeroM,$version)//se usa
    {
        $modulo=$this->db->query("select idModulo from modulo where idVersion=$version and numeroM=$numeroM ");
        $idModulo= $modulo->result()[0]->idModulo;

        $editar="UPDATE paralelo SET nombre_paralelo='$nombreParalelo',cantidad='$cantidadParalelo' WHERE idParalelo=$idParalelo and idModulo=$idModulo ";
        $this->db->query($editar);
        $this->db->affected_rows();
    }
    public function eliminarParalelo($vers,$numeroM,$paralelo)
    {
        

        $paralelo=$this->db->query("select p.idParalelo as para from paralelo p inner join modulo m on m.idModulo=p.idModulo
                                     where p.nombre_paralelo='$paralelo' and m.numeroM=$numeroM and m.idVersion=$vers ");

        $idParalelo= $paralelo->result()[0]->para;

        $query="DELETE FROM paralelo WHERE idParalelo='$idParalelo' ";
        
        $this->db->query($query);
        return $this->db->affected_rows()>0;
    }
    
    public function subirArchivoNota($titulo,$archivo,$idParalelo)
    {
        $sql="INSERT INTO archivo(nombreArchivo,ruta,idParalelo) VALUES
        (".$this->db->escape($titulo).",".$this->db->escape($archivo).",".$this->db->escape($idParalelo).")";
        $this->db->query($sql);
        return $this->db->affected_rows()>0;
    }
    public function crearParaleloData($data)//se usa
    {
        $this->db->insert('paralelo', $data);
        return $this->db->insert_id();
    }
}