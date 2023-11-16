<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calificacion_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        
    }

    public function registrar_nota($version,$ciDiplomante,$numModulo,$nombreParalelo,$nota,$establecenota,$fechanota)//si
    {
        $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM='$numModulo' and idVersion=$version");
        $idModulo=$modulo->result()[0]->idModulo;

        $paralelo=$this->db->query("SELECT idParalelo FROM paralelo WHERE nombre_paralelo='$nombreParalelo' and idModulo=$idModulo");
        $idParalelo=$paralelo->result()[0]->idParalelo;

            $diplomante=$this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$ciDiplomante' ");
            $idDiplomante=$diplomante->result()[0]->idDiplomante;

        $inscripcion=$this->db->query("SELECT idInscripcion FROM inscripcion WHERE idDiplomante='$idDiplomante' and idVersion=$version");
        $idInscripcion=$inscripcion->result()[0]->idInscripcion;
        
        $calificacion="UPDATE asignacion_modulo_diplomante SET nota=$nota, establece_nota='$establecenota',fecha_nota='$fechanota'  
        WHERE idModulo=$idModulo and idParalelo='$idParalelo' and idInscripcion=$idInscripcion";
        $this->db->query($calificacion);

        return $this->db->affected_rows();
    }

    public function getCalificacion($version,$modulo,$paralelo,$ciDiplo=null)
    {
        $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM='$modulo' and idVersion=$version");
        $idModulo=$modulo->result()[0]->idModulo;

        $paralelo=$this->db->query("SELECT idParalelo FROM paralelo WHERE nombre_paralelo='$paralelo' and idModulo='$idModulo' ");
        $idParalelo=$paralelo->result()[0]->idParalelo;

        if ($ciDiplo==null) 
        {
            $calificacion=$this->db->query("SELECT amd.*, doc.* ,av.*,acad.*,i.*,dip.*,m.*,par.* FROM asignacion_modulo_diplomante amd 
            INNER JOIN inscripcion i on i.idInscripcion=amd.idInscripcion 
            INNER JOIN diplomante dip on dip.idDiplomante=i.idDiplomante 
            INNER JOIN modulo m on m.idModulo=amd.idModulo 
            INNER JOIN paralelo par on par.idParalelo=amd.idParalelo 
            INNER JOIN docencia doc on doc.idDocencia=par.idDocencia
            INNER JOIN academico_version av on av.idRegistroAV=doc.idRegistroAV 
            INNER JOIN academico acad on acad.ciA=av.ciA 
            WHERE i.idVersion= $version and av.idVersion= $version and m.idVersion= $version and m.idModulo='$idModulo' and doc.idModulo='$idModulo' and par.idParalelo='$idParalelo' and m.idModulo=par.idModulo
            ORDER BY acad.nombreA ASC " );
        } 
        else 
        {
            $diplomante=$this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$ciDiplo' ");
            $idDiplomante=$diplomante->result()[0]->idDiplomante;

            $inscripcion=$this->db->query("SELECT idInscripcion FROM inscripcion WHERE idDiplomante='$idDiplomante' and idVersion=$version");
            $idInscripcion=$inscripcion->result()[0]->idInscripcion;

            $calificacion=$this->db->query("SELECT amd.*, doc.* ,av.*,acad.*,i.*,dip.*,m.*,par.* FROM asignacion_modulo_diplomante amd 
            INNER JOIN inscripcion i on i.idInscripcion=amd.idInscripcion 
            INNER JOIN diplomante dip on dip.idDiplomante=i.idDiplomante 
            INNER JOIN modulo m on m.idModulo=amd.idModulo 
            INNER JOIN paralelo par on par.idParalelo=amd.idParalelo 
            INNER JOIN docencia doc on doc.idDocencia=par.idDocencia
            INNER JOIN academico_version av on av.idRegistroAV=doc.idRegistroAV 
            INNER JOIN academico acad on acad.ciA=av.ciA 
            WHERE i.idVersion= $version and av.idVersion= $version and m.idVersion= $version and m.idModulo='$idModulo' and doc.idModulo='$idModulo' 
            and par.idParalelo='$idParalelo' and m.idModulo=par.idModulo and amd.idInscripcion=$idInscripcion
            ORDER BY acad.nombreA ASC " );
        }

        return $calificacion->result_array();

    }

    // get de diplomantes por modulo
    public function getCalificacion_porModulo($version,$modulo,$ciDiplo=null)
    {
        $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM='$modulo' and idVersion=$version");
        $idModulo=$modulo->result()[0]->idModulo;

        if ($ciDiplo==null) 
        {
            $calificacion=$this->db->query("SELECT amd.*,i.*,dip.*,m.* FROM asignacion_modulo_diplomante amd 
            INNER JOIN inscripcion i on i.idInscripcion=amd.idInscripcion 
            INNER JOIN diplomante dip on dip.idDiplomante=i.idDiplomante 
            INNER JOIN modulo m on m.idModulo=amd.idModulo
            WHERE i.idVersion= $version and m.idVersion= $version and m.idModulo='$idModulo'
            ORDER BY dip.nombreD ASC " );
        } 
        else 
        {
            $diplomante=$this->db->query("SELECT idDiplomante FROM diplomante WHERE ciD='$ciDiplo' ");
            $idDiplomante=$diplomante->result()[0]->idDiplomante;

            $inscripcion=$this->db->query("SELECT idInscripcion FROM inscripcion WHERE idDiplomante='$idDiplomante' and idVersion=$version");
            $idInscripcion=$inscripcion->result()[0]->idInscripcion;

            $calificacion=$this->db->query("SELECT amd.*,i.*,dip.*,m.* FROM asignacion_modulo_diplomante amd 
            INNER JOIN inscripcion i on i.idInscripcion=amd.idInscripcion 
            INNER JOIN diplomante dip on dip.idDiplomante=i.idDiplomante 
            INNER JOIN modulo m on m.idModulo=amd.idModulo
            WHERE i.idVersion= $version and m.idVersion= $version and m.idModulo='$idModulo' 
            and amd.idInscripcion=$idInscripcion
            ORDER BY dip.nombreD ASC " );
        }

        return $calificacion->result_array();

    }
    //get solo con la version
    public function getCalificacion_porversion($version)
    {
        $calificacion=$this->db->query("SELECT amd.*,i.*,dip.*,m.*,p.* FROM asignacion_modulo_diplomante amd 
        INNER JOIN inscripcion i on i.idInscripcion=amd.idInscripcion 
        INNER JOIN diplomante dip on dip.idDiplomante=i.idDiplomante 
        INNER JOIN modulo m on m.idModulo=amd.idModulo
        INNER JOIN paralelo p on p.idParalelo=amd.idParalelo
        WHERE i.idVersion= $version and m.idVersion= $version
        ORDER BY m.nombreM ASC " );

        return $calificacion->result_array();

    }

    public function ver_tieneNota($version,$ciI,$numI)
    {
        $inscripcion=$this->db->query("SELECT idInscripcion FROM inscripcion WHERE numeroI='$numI' and ciI='$ciI' and idVersion=$version");
        $idInscripcion=$inscripcion->result()[0]->idInscripcion;

        $calificacion=$this->db->query("SELECT * FROM asignacion_modulo_diplomante WHERE idInscripcion=$idInscripcion and nota!='' ");
        return $calificacion->result_array();
        // return $idInscripcion;
    }
    public function tienenota_pormodparalelo($version,$modulo,$paralelo)
    {
        $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM='$modulo' and idVersion=$version");
        $idModulo=$modulo->result()[0]->idModulo;

        $paralelo=$this->db->query("SELECT idParalelo FROM paralelo WHERE nombre_paralelo='$paralelo' and idModulo='$idModulo' ");
        $idParalelo=$paralelo->result()[0]->idParalelo;

        $calificacion=$this->db->query("SELECT amd.*,m.* FROM asignacion_modulo_diplomante amd
        INNER JOIN modulo m on m.idModulo=amd.idModulo 
        WHERE amd.idModulo=$idModulo and amd.idParalelo=$idParalelo and amd.nota!='' ");
        return $calificacion->result_array();
    }
    // public function getProgramacion($version,$paralelo,$numInsc=null,$cidiplo=null,$diplomante=null,$profesional=null)// ver si es neces o s utiliza?
    // {
    //     if($numInsc==null && $cidiplo==null && $diplomante==null && $profesional==null)
    //     {
    //         $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,p.*,pad.*,doc.*,acadversion.*,acad.* FROM diplomante d 
    //         INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
    //         INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
    //         INNER JOIN modulo m on m.idModulo=amd.idModulo
    //         INNER JOIN paralelo p on p.idParalelo=amd.idParalelo
    //         INNER JOIN programar_asignacion_docencia pad on pad.idAsignacionMDI=amd.idAsignacionMDI
    //         INNER JOIN docencia doc on doc.idDocencia=pad.idDocencia
    //         INNER JOIN academico_version acadversion on acadversion.idRegistroAV=doc.idRegistroAV
    //         INNER JOIN academico acad on acad.ciA=acadversion.ciA
    //         WHERE doc.idParalelo=$paralelo and amd.idParalelo=$paralelo and i.idVersion= $version ");
    //         return $inscripcion->result_array();
    //     }
    //     else 
    //     {
    //         $inscripcion=$this->db->query("SELECT i.*, d.* ,m.*,amd.*,p.*,pad.*,doc.*,acadversion.*,acad.* FROM diplomante d 
    //         INNER JOIN inscripcion i on d.idDiplomante=i.idDiplomante 
    //         INNER JOIN asignacion_modulo_diplomante amd on amd.idInscripcion=i.idInscripcion 
    //         INNER JOIN modulo m on m.idModulo=amd.idModulo
    //         INNER JOIN paralelo p on p.idParalelo=amd.idParalelo
    //         INNER JOIN programar_asignacion_docencia pad on pad.idAsignacionMDI=amd.idAsignacionMDI
    //         INNER JOIN docencia doc on doc.idDocencia=pad.idDocencia
    //         INNER JOIN academico_version acadversion on acadversion.idRegistroAV=doc.idRegistroAV
    //         INNER JOIN academico acad on acad.ciA=acadversion.ciA
    //         WHERE i.numeroI='$numInsc' or i.ciD='$cidiplo' or acad.ciA='$profesional' or d.nombreD='$diplomante' 
    //                 and doc.idParalelo=$paralelo and amd.idParalelo=$paralelo and i.idVersion= $version");

    //         return $inscripcion->result_array();


    //     }
    // }
    
}