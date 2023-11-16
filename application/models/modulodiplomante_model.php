<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulodiplomante_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        
    }

    
    public function buscar_siExiste($version,$modulosele,$numInsc,$cidiplo)// se usa
    {
        $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM='$modulosele' and idVersion=$version");
        $idModulo=$modulo->result()[0]->idModulo;

            $diplomante=$this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$cidiplo' ");
            $idDiplomante=$diplomante->result()[0]->idDiplomante;

        $inscripcion=$this->db->query("SELECT idInscripcion FROM inscripcion WHERE idDiplomante='$idDiplomante' and numeroI='$numInsc' and idVersion=$version ");
        $idInscripcion=$inscripcion->result()[0]->idInscripcion;


        $asignacion=$this->db->query("SELECT * FROM asignacion_modulo_diplomante WHERE idModulo=$idModulo and idInscripcion=$idInscripcion ");
        return $asignacion->num_rows();

        // if ($asignacion->num_rows()>0) 
        // {
        //     return false;
        // } 
        // else {
        //     return $idInscripcion;
        // }
    }

    public function asignar_modulo_diplomante($version,$modulosele,$numInsc,$cidiplo,$paralelosele=null,$fechaAsignacion=null)//se usa
    {
        $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM='$modulosele' and idVersion=$version");
        $idModulo=$modulo->result()[0]->idModulo;

            $diplomante=$this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$cidiplo' ");
            $idDiplomante=$diplomante->result()[0]->idDiplomante;
        
        $inscripcion=$this->db->query("SELECT idInscripcion FROM inscripcion WHERE idDiplomante=$idDiplomante and numeroI='$numInsc' and idVersion=$version ");
        $idInscripcion=$inscripcion->result()[0]->idInscripcion;
        
        $sql="INSERT INTO asignacion_modulo_diplomante(idModulo,idInscripcion,idParalelo,fecha_asignacion)
        VALUES(".$this->db->escape($idModulo).",".$this->db->escape($idInscripcion).",".$this->db->escape($paralelosele).",".$this->db->escape($fechaAsignacion).")";
        
        if ($this->db->query($sql)) 
        {
            return $this->db->insert_id();
        } else {
            return false;
        }

        
    }
    public function editar_modulo_diplomante($version,$modulosele,$paralelosele,$numInsc,$cidiplo,$fechaAsignacion)
    {
        $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM='$modulosele' and idVersion=$version");
        $idModulo=$modulo->result()[0]->idModulo;

            $diplomante=$this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$cidiplo' ");
            $idDiplomante=$diplomante->result()[0]->idDiplomante;
        
        $inscripcion=$this->db->query("SELECT idInscripcion FROM inscripcion WHERE idDiplomante=$idDiplomante and numeroI='$numInsc' and idVersion=$version ");
        $idInscripcion=$inscripcion->result()[0]->idInscripcion;

        $asignacion=$this->db->query("SELECT idAsignacionMDI FROM asignacion_modulo_diplomante WHERE idModulo='$idModulo' and idInscripcion='$idInscripcion' ");
        $idAsignacion=$asignacion->result()[0]->idAsignacionMDI;

        // $paralelo="UPDATE asignacion_modulo_diplomante SET idParalelo=$paralelosele,fecha_nota='$fechanota'  //ESTOERA ANTES DE LA EDICION PORQ NO CAMBIABA DE PARALELO A DIP.
        $paralelo="UPDATE asignacion_modulo_diplomante SET idParalelo=$paralelosele,fecha_asignacion='$fechaAsignacion'  
                    WHERE idAsignacionMDI=$idAsignacion ";
        $this->db->query($paralelo);

        return $this->db->affected_rows()>0;
    }
    public function eliminar_modulo_diplomante($asignacion,$inscripcion)
    {
        $this->db->query("DELETE FROM asignacion_modulo_diplomante WHERE idAsignacionMDI='$asignacion' and idInscripcion='$inscripcion' ");

        return $this->db->affected_rows()>0;
    }
    // Revisar y si esta bien remplazar por las funciones q tengan los modelos getModulo_por_diplomante() y getregistroModuloAsignado()
    public function getModuloDiplomante($version=null,$modulo=null,$ci=null) //no se usa?
    {
        // $version=$this->session->userdata('idVersion');
        if ($version==null) {
            if($modulo==null && $ci==null)
            {
                $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,v.* FROM diplomante d 
                INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
                INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
                INNER JOIN modulo m on m.idModulo=amd.idModulo
                INNER JOIN version v on v.idVersion=m.idVersion ");
                return $inscripcion->result();
            }
            else {
                if ($modulo==null && $ci!=null) //secambio era<>
                {

                    $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,v.* FROM diplomante d 
                    INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
                    INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
                    INNER JOIN modulo m on m.idModulo=amd.idModulo
                    INNER JOIN version v on v.idVersion=m.idVersion
                    WHERE d.ciD='$ci'");

                    return $inscripcion->result();
                
                } 
                else 
                {
                    if ($modulo!=null && $ci==null) //secambio era<>
                    {

                        $mod=$this->db->query("SELECT idModulo FROM modulo WHERE nombreM='$modulo' ");
                        $m=$mod->result()[0]->idModulo;

                        $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,v.* FROM diplomante d 
                        INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
                        INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
                        INNER JOIN modulo m on m.idModulo=amd.idModulo
                        INNER JOIN version v on v.idVersion=m.idVersion
                        WHERE amd.idModulo='$m' ");

                        return $inscripcion->result();
                    
                    } 
                    else 
                    {
                        $mod=$this->db->query("SELECT idModulo FROM modulo WHERE nombreM='$modulo' ");
                        $m=$mod->result()[0]->idModulo;

                        $diplomante=$this->db->query("SELECT d.idDiplomante FROM diplomante d INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante
                        WHERE d.ciD='$ci' ");
                        $d=$diplomante->result()[0]->idDiplomante;

                        $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,v.* FROM diplomante d 
                        INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
                        INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
                        INNER JOIN modulo m on m.idModulo=amd.idModulo
                        INNER JOIN version v on v.idVersion=m.idVersion
                        WHERE amd.idModulo='$m' and i.idDiplomante='$d' ");

                        return $inscripcion->result();
                    }

                }
            }
        } else {
            if($modulo==null && $ci==null)
            {
                // ASI ESTABA PERO NO MOSTRABA VERSION
                // $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.* FROM diplomante d 
                // INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
                // INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
                // INNER JOIN modulo m on m.idModulo=amd.idModulo

                $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,v.* FROM diplomante d 
                INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
                INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
                INNER JOIN modulo m on m.idModulo=amd.idModulo
                INNER JOIN version v on v.idVersion=m.idVersion
                WHERE i.idVersion= $version ");
                return $inscripcion->result();
            }
            else {
                if ($modulo==null && $ci!=null) //secambio era<>
                {

                    // $diplomante=$this->db->query("SELECT d.idDiplomante FROM diplomante d INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante
                    // WHERE d.ciD='$ci' and i.idVersion= $version");
                    // $d=$diplomante->result()[0]->idDiplomante;

                    $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,v.* FROM diplomante d 
                    INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
                    INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
                    INNER JOIN modulo m on m.idModulo=amd.idModulo
                    INNER JOIN version v on v.idVersion=m.idVersion
                    WHERE d.ciD='$ci' and i.idVersion= $version");

                    return $inscripcion->result();
                
                } 
                else 
                {
                    if ($modulo!=null && $ci==null) //secambio era<>
                    {

                        $mod=$this->db->query("SELECT idModulo FROM modulo WHERE nombreM='$modulo' and idVersion= $version");
                        $m=$mod->result()[0]->idModulo;


                        $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,v.* FROM diplomante d 
                        INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
                        INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
                        INNER JOIN modulo m on m.idModulo=amd.idModulo
                        INNER JOIN version v on v.idVersion=m.idVersion
                        WHERE amd.idModulo='$m' and i.idVersion= $version ");

                        return $inscripcion->result();
                    
                    } 
                    else 
                    {
                        $mod=$this->db->query("SELECT idModulo FROM modulo WHERE nombreM='$modulo' and idVersion= $version");
                        $m=$mod->result()[0]->idModulo;

                        $diplomante=$this->db->query("SELECT d.idDiplomante FROM diplomante d INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante
                        WHERE d.ciD='$ci' and i.idVersion= $version");
                        $d=$diplomante->result()[0]->idDiplomante;

                        $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,v.* FROM diplomante d 
                        INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
                        INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
                        INNER JOIN modulo m on m.idModulo=amd.idModulo
                        INNER JOIN version v on v.idVersion=m.idVersion
                        WHERE amd.idModulo='$m' and i.idDiplomante='$d'and i.idVersion= $version ");

                        return $inscripcion->result();
                    }

                }
            }
        }
    }

    public function getAsignacion_modulo($version,$modulosele=null)//sse usa
    {
        if($modulosele==null)
        {
            $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.* FROM diplomante d 
            INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
            INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
            INNER JOIN modulo m on m.idModulo=amd.idModulo
            WHERE i.idVersion= $version ");
            
            return $inscripcion->result_array();

            // $consulta=$this->db->query("SELECT m.*,p.* FROM modulo m 
            // INNER JOIN paralelo p on p.idModulo=m.idModulo
            // WHERE m.idVersion='$version' ORDER BY p.nombre_paralelo ASC");
            // return $consulta->result_array();
        }
        else 
        {
            $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.* FROM diplomante d 
            INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
            INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
            INNER JOIN modulo m on m.idModulo=amd.idModulo
            WHERE m.numeroM=$modulosele and i.idVersion= $version");

            return $inscripcion->result_array();

        }
    }

    public function getAsignacion_paralelo($version,$modulosele=null,$paralelo=null,$nombre=null,$numInsc=null,$cidiplo=null)//se usa con el getAsignacion_modulo de una u otra forma
    {
        if($modulosele==null && $paralelo==null && $nombre==null && $numInsc==null && $cidiplo==null)
        {
            $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,p.* FROM diplomante d 
            INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
            INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
            INNER JOIN modulo m on m.idModulo=amd.idModulo
            INNER JOIN paralelo p on p.idParalelo=amd.idParalelo
            WHERE m.idModulo=p.idModulo and i.idVersion= $version ");
            
            return $inscripcion->result_array();
        }
        else 
        {
            // $diplomante=$this->db->query("SELECT d.idDiplomante FROM diplomante d INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante
            // WHERE d.ciD='$ci' and i.idVersion= $version");
            // $d=$diplomante->result()[0]->idDiplomante;
            
            $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,p.* FROM diplomante d 
            INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
            INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
            INNER JOIN modulo m on m.idModulo=amd.idModulo
            INNER JOIN paralelo p on p.idParalelo=amd.idParalelo
            WHERE m.numeroM=$modulosele and p.nombre_paralelo='$paralelo' and m.idModulo=p.idModulo and i.idVersion= $version");

            return $inscripcion->result_array();

        }
    }

    public function get_asignacion_porci($cidiplo)//get por ci 
    {
        $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,p.* FROM diplomante d 
            INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
            INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
            INNER JOIN modulo m on m.idModulo=amd.idModulo
            INNER JOIN paralelo p on p.idParalelo=amd.idParalelo
            WHERE d.ciD='$cidiplo' ");

            return $inscripcion->result_array();//sacar el ultimo registro y mandarlo
            
    }
    public function saca_ultasignacion_porci($cidiplo)//get por ci 
    {
        $idasigna=$this->db->query("SELECT max(idAsignacionMDI) as maxidamd FROM diplomante d 
            INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
            INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
            WHERE d.ciD='$cidiplo' ");

        $asignacionmd=$idasigna->result()[0]->maxidamd; 
        return $asignacionmd; 
    }
    public function getasignacion_poid($idasignacion)
    {
        $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,p.* FROM diplomante d 
            INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
            INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
            INNER JOIN modulo m on m.idModulo=amd.idModulo
            INNER JOIN paralelo p on p.idParalelo=amd.idParalelo 
            WHERE amd.idAsignacionMDI=$idasignacion ");

        return $inscripcion->result_array();
    }
    public function sacarNumero($numero)//get por ci 
    {
        $numeroMod=$this->db->query("SELECT amd.numero FROM diplomante d 
            INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
            INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
            INNER JOIN modulo m on m.idModulo=amd.idModulo
            INNER JOIN paralelo p on p.idParalelo=amd.idParalelo
            WHERE amd.numero='$numero' ");

            return $numeroMod->result_array();//sacar el ultimo registro y mandarlo
            
    }
}