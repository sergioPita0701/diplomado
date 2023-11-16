<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monografia_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        
    }

    public function buscar_monografia($version,$tituloMono=null,$ciDiplomante=null)
    {
        // $diplomante=$this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$ciDiplomante'");
        // $idDiplomante=$diplomante->result()[0]->idDiplomante;

        // $inscripcion=$this->db->query("SELECT idInscripcion FROM inscripcion WHERE idDiplomante='$idDiplomante' and idVersion=$version ");
        // $idInscripcion=$inscripcion->result()[0]->idInscripcion; 

        // $monografia=$this->db->query("SELECT idMonografia FROM monografia WHERE tituloMonografia='$tituloMono'");
        // $idMonografia=$monografia->result()[0]->idMonografia;
        if ($tituloMono==null && $ciDiplomante==null) 
        {
            $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.* FROM realiza_monografia remo
            INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
            WHERE i.idVersion=$version ");
            return $query->result_array();
        } 
        else {
            if ($tituloMono!=null && $ciDiplomante==null) 
            {
                $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.* FROM realiza_monografia remo
                INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
                INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
                INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
                INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
                WHERE i.idVersion=$version and mo.tituloMonografia='$tituloMono' ");
                return $query->result_array();
            } 
            else {
                if ($tituloMono==null && $ciDiplomante!=null) 
                {
                    $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.* FROM realiza_monografia remo
                    INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
                    INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
                    INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
                    INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
                    WHERE i.idVersion=$version and d.ciD='$ciDiplomante' ");
                    return $query->result_array();
                } 
                else {

                    $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.* FROM realiza_monografia remo
                    INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
                    INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
                    INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
                    INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
                    WHERE i.idVersion=$version and d.ciD='$ciDiplomante' and mo.tituloMonografia='$tituloMono' ");

                    return $query->result_array();
                }
                
                
            }
            
            
        }
        
        
    }
    public function getMonografia_porId($version,$monografia)
    {
        $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.* FROM realiza_monografia remo
        INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
        INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
        INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
        INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
        WHERE i.idVersion=$version and mo.idMonografia=$monografia ");
        return $query->result_array();
    }
    public function buscar_realizamono($version,$realizamonografia=null)
    {
        if ($realizamonografia==null) 
        {
            $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.* FROM realiza_monografia remo
            INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
            -- INNER JOIN academico_version av ON av.idRegistroAV=remo.idRegistroAV
            -- INNER JOIN academico a ON a.ciA=av.ciA
            WHERE i.idVersion=$version ");

        } 
        else {
            $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.* FROM realiza_monografia remo
            INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
            -- INNER JOIN academico_version av ON av.idRegistroAV=remo.idRegistroAV
            -- INNER JOIN academico a ON a.ciA=av.ciA
            WHERE i.idVersion=$version and remo.idRealizaMono=$realizamonografia ");
            
        }
        
        return $query->result_array();
    }

    public function crear_monografia($tituloMono,$fechaInicioMono,$fechaFinalMono,$descripcionMono,$ciDiplomante,$version)
    {
        $diplomante=$this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$ciDiplomante'");
        $idDiplomante=$diplomante->result()[0]->idDiplomante;

        $inscripcion=$this->db->query("SELECT idInscripcion FROM inscripcion WHERE idDiplomante='$idDiplomante' and idVersion=$version ");
        $idInscripcion=$inscripcion->result()[0]->idInscripcion;
        
        if ( empty($idInscripcion)) 
        {
            return false;
        } 
        else {
            $this->db->query("INSERT INTO monografia(tituloMonografia,fecha_inicioMo,fecha_finalMo,descripcionMo) 
            VALUES(".$this->db->escape($tituloMono).",".$this->db->escape($fechaInicioMono).",".$this->db->escape($fechaFinalMono).",".$this->db->escape($descripcionMono).")");
    
            $idMonografia=$this->db->insert_id();
            // return $idMonografia;
            $this->db->query("INSERT INTO realiza_monografia(idInscripcion,idMonografia) 
            VALUES(".$this->db->escape($idInscripcion).",".$this->db->escape($idMonografia).")");
            
            return true;
        }
        
    }
    public function editar_monografia($version,$monografia,$edittitulo,$editfechaInicio,$editfechaFinal,$editdescripcion)
    {
        $sql="UPDATE monografia SET tituloMonografia='$edittitulo', fecha_inicioMo='$editfechaInicio',fecha_finalMo='$editfechaFinal', descripcionMo='$editdescripcion'
         WHERE idMonografia='$monografia' ";
        $this->db->query($sql); 
        $this->db->affected_rows();
    }

    public function eliminar_monografia($monografia)
    {
        $this->db->query("DELETE FROM monografia WHERE idMonografia='$monografia' ");

        return $this->db->affected_rows()>0;
    }
    // public function crear_monografia_diplomante($ciDiplomante,$monografia,$version)
    // {
    //     $diplomante=$this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$ciDiplomante' ");
    //     $idDiplomante=$diplomante->result()[0]->idDiplomante;

    //     $inscripcion=$this->db->query("SELECT idInscripcion FROM inscripcion WHERE idDiplomante='$idDiplomante' and idVersion=$version ");
    //     $idInscripcion=$inscripcion->result()[0]->idInscripcion;
        
    //     $this->db->query("INSERT INTO realiza_monografia(idInscripcion,idMonografia) 
    //     VALUES(".$this->db->escape($idInscripcion).",".$this->db->escape($monografia).")");
    //     $this->db->affected_rows();
    // }
    public function getMonografia($ci=null,$monografia=null,$academico=null)
    {
        $version=$this->session->userdata('idVersion');

        if($ci==null && $modulo==null)
        {
            $consulta=$this->db->query("SELECT a.*,do.*,m.* FROM academico a 
            INNER JOIN docencia do on do.idAcademico=a.idAcademico
            INNER JOIN modulo m on m.idModulo=do.idModulo
            WHERE m.idVersion=$version
            ORDER BY m.nombreM ASC");   
            return $consulta->result_array();
        }
        else
        {
            if ($ci!=null && $modulo==null) 
            {
                $academico=$this->db->query("SELECT idAcademico FROM academico WHERE ciA='$ci' ");
                $idAcademico=$academico->result()[0]->idAcademico;
        
                
                $consulta=$this->db->query("SELECT a.*,do.*,m.* FROM academico a 
                INNER JOIN docencia do on do.idAcademico=a.idAcademico
                INNER JOIN modulo m on m.idModulo=do.idModulo
                WHERE m.idVersion=$version and a.idAcademico=$idAcademico
                ORDER BY m.nombreM ASC");   
                return $consulta->result_array();
            } 
            else 
            {
                if ($ci==null && $modulo!=null) 
                {
                    $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM=$modulo and idVersion='$version' ");
                    $idModulo=$modulo->result()[0]->idModulo;

                    $consulta=$this->db->query("SELECT a.*,do.*,m.* FROM academico a 
                    INNER JOIN docencia do on do.idAcademico=a.idAcademico
                    INNER JOIN modulo m on m.idModulo=do.idModulo
                    WHERE m.idVersion=$version and m.idModulo=$idModulo
                    ORDER BY m.nombreM ASC");   
                    return $consulta->result_array();
                } 
                else 
                {
                    $academico=$this->db->query("SELECT idAcademico FROM academico WHERE ciA='$ci' ");
                    $idAcademico=$academico->result()[0]->idAcademico;

                    $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM=$modulo and idVersion='$version' ");
                    $idModulo=$modulo->result()[0]->idModulo;

                    $consulta=$this->db->query("SELECT a.*,do.*,m.* FROM academico a 
                    INNER JOIN docencia do on do.idAcademico=a.idAcademico
                    INNER JOIN modulo m on m.idModulo=do.idModulo
                    WHERE m.idVersion=$version and a.idAcademico=$idAcademico and m.idModulo=$idModulo
                    ORDER BY m.nombreM ASC");   
                    return $consulta->result_array();
                }
                
                
            }
            
        }
    }

}