<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docencia_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        
    }
    public function buscarAcademico_paraindex($ci=null)
    {
        if ($ci==null) 
        {
            $data = array(
                    'ciA' =>"dds" ,
                    'nombreA' =>"no hay" ,
                    'nombreP' =>0 ,
                    'gradoAcademicoP' =>"no hay" 
            );
        } 
        else if ($ci=="1") 
        {
            $consulta=$this->db->query("SELECT * FROM profesion WHERE idProfesion='' ");   
            return $consulta->result_array();
        } else if ($ci=="2") 
        {
            $consulta=$this->db->query("SELECT a.*,p.*,e.*, te.*,atp.* FROM academico a 
            INNER JOIN academico_tiene_profesion atp ON a.ciA=atp.ciA
            INNER JOIN profesion p ON p.idProfesion=atp.idProfesion
            INNER JOIN tieneapr_especialidad te ON te.idTieneAPr=atp.idTieneAPr
            INNER JOIN especialidad e ON e.idEspecialidad=te.idEspecialidad
            WHERE a.ciA=' '");  
            return $consulta->result_array();
            
        }else if ($ci=="3") 
        {
            $consulta=$this->db->query("SELECT a.*,do.*,m.*,acadv.* FROM academico a 
            INNER JOIN academico_version acadv on a.ciA=acadv.ciA
            INNER JOIN docencia do on do.idRegistroAV=acadv.idRegistroAV
            INNER JOIN modulo m on m.idModulo=do.idModulo
            WHERE a.idAcademico='' ");   
            return $consulta->result_array();
        }
    }

    public function getModulo_porEstado($version,$modulosele,$estado)//se usa?rev
    {
        $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM='$modulosele' and idVersion=$version ");
        $idModulo=$modulo->result()[0]->idModulo;

        $docencia=$this->db->query("SELECT * FROM docencia WHERE idModulo='$idModulo' and estadoDoc='$estado' ");
        return $docencia->num_rows();
    }
    
    public function buscarDocencia($version,$ciAcad,$modulosele)//se usa?
    {
        $acadselect=$this->db->query("SELECT idRegistroAV FROM academico_version WHERE ciA='$ciAcad' and idVersion=$version ");
        $idacadselect=$acadselect->result()[0]->idRegistroAV;

        $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM='$modulosele' and idVersion=$version ");
        $idModulo=$modulo->result()[0]->idModulo;

        $docencia=$this->db->query("SELECT * FROM docencia WHERE idRegistroAV='$idacadselect' and idModulo=$idModulo");
        return $docencia->num_rows();
    }

    public function crear_docencia($version,$ciAcad,$modulosele,$paraleloDoc,$estadodoc,$contratodoc,$fechacontratodoc,$fechainiciodoc,$fechafindoc,$observacionDoc)//se usa
    {
        $acadselect=$this->db->query("SELECT idRegistroAV FROM academico_version WHERE ciA='$ciAcad' and idVersion=$version ");
        $idacadselect=$acadselect->result()[0]->idRegistroAV;
        
        $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM='$modulosele' and idVersion=$version ");
        $idModulo=$modulo->result()[0]->idModulo;

        $this->db->query("INSERT INTO docencia(idRegistroAV,idModulo,estadoDoc,contratoDoc,fecha_contrato,fechaInicioDoc,fechaFinalDoc,observacion) 
        VALUES(".$this->db->escape($idacadselect).",".$this->db->escape($idModulo).",".$this->db->escape($estadodoc).",".$this->db->escape($contratodoc).",
        ".$this->db->escape($fechacontratodoc).",".$this->db->escape($fechainiciodoc).",".$this->db->escape($fechafindoc).",".$this->db->escape($observacionDoc).")");
        // $this->db->affected_rows();

        $idDoc=$this->db->insert_id();

        $editar="UPDATE paralelo SET idDocencia='$idDoc'  WHERE idParalelo='$paraleloDoc' and idModulo=$idModulo";
        $this->db->query($editar);
        $this->db->affected_rows();

        // if ($this->db->query($sql)) 
        // {
        //     return $this->db->insert_id();
        // } else {
        //     return false;
        // }
    }

    public function getDocencia($version,$ci=null,$modulo=null,$paralelo=null)//ver por que creo q no se usa
    {

        if($ci==null && $modulo==null && $paralelo==null)
        {
            $consulta=$this->db->query("SELECT a.*,av.*,do.*,p.*,m.* FROM academico a
            INNER JOIN academico_version av on a.ciA=av.ciA 
            INNER JOIN docencia do on do.idRegistroAV=av.idRegistroAV
            INNER JOIN modulo m on m.idModulo=do.idModulo
            INNER JOIN paralelo p on p.idModulo=m.idModulo
            WHERE av.idVersion=$version
            ORDER BY a.nombreA ASC");   

            return $consulta->result_array();
        }
        else
        {
            if ($ci!=null && $modulo==null  && $paralelo==null) 
            {
                // $academico=$this->db->query("SELECT idAcademico FROM academico WHERE ciA='$ci' ");
                // $idAcademico=$academico->result()[0]->idAcademico;
        
                $consulta=$this->db->query("SELECT a.*,av.*,do.*,p.*,m.* FROM academico a
                INNER JOIN academico_version av on a.ciA=av.ciA 
                INNER JOIN docencia do on do.idRegistroAV=av.idRegistroAV
                INNER JOIN modulo m on m.idModulo=do.idModulo
                INNER JOIN paralelo p on p.idModulo=m.idModulo
                WHERE av.idVersion=$version and av.ciA=$ci
                ORDER BY a.nombreA ASC");   
                return $consulta->result_array();
            } 
            else 
            {
                if ($ci==null && $modulo!=null  && $paralelo==null) 
                {
                    $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM=$modulo and idVersion='$version' ");
                    $idModulo=$modulo->result()[0]->idModulo;

                    $consulta=$this->db->query("SELECT a.*,av.*,do.*,p.*,m.* FROM academico a
                    INNER JOIN academico_version av on a.ciA=av.ciA 
                    INNER JOIN docencia do on do.idRegistroAV=av.idRegistroAV
                    INNER JOIN modulo m on m.idModulo=do.idModulo
                    INNER JOIN paralelo p on p.idModulo=m.idModulo
                    WHERE av.idVersion=$version and do.idModulo=$idModulo
                    ORDER BY a.nombreA ASC");  
                    return $consulta->result_array();
                } 
                else 
                {
                    if ($ci==null && $modulo!=null  && $paralelo!=null) 
                    {
                        $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM=$modulo and idVersion='$version' ");
                        $idModulo=$modulo->result()[0]->idModulo;
    
                        $consulta=$this->db->query("SELECT a.*,av.*,do.*,p.*,m.* FROM academico a
                        INNER JOIN academico_version av on a.ciA=av.ciA 
                        INNER JOIN docencia do on do.idRegistroAV=av.idRegistroAV
                        INNER JOIN modulo m on m.idModulo=do.idModulo
                        INNER JOIN paralelo p on p.idModulo=m.idModulo
                        WHERE av.idVersion=$version and do.idModulo=$idModulo and do.idParalelo=$paralelo
                        ORDER BY a.nombreA ASC");  
                        return $consulta->result_array();
                    } 
                    else 
                    {
                        $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM=$modulo and idVersion='$version' ");
                        $idModulo=$modulo->result()[0]->idModulo;
    
                        $consulta=$this->db->query("SELECT a.*,av.*,do.*,p.*,m.* FROM academico a
                        INNER JOIN academico_version av on a.ciA=av.ciA 
                        INNER JOIN docencia do on do.idRegistroAV=av.idRegistroAV
                        INNER JOIN modulo m on m.idModulo=do.idModulo
                        INNER JOIN paralelo p on p.idModulo=m.idModulo
                        WHERE av.idVersion=$version and av.ciA=$ci  and do.idModulo=$idModulo and do.idParalelo=$paralelo
                        ORDER BY a.nombreA ASC");  
                        return $consulta->result_array();
                    }
                }
                
                
            }
            
        }
    }

    public function obtenerDocencia($version,$ciA=null,$modulo)
    {
        if ($ciA==null && $modulo==null) 
        {
            $consulta=$this->db->query("SELECT acad.*,doc.*,av.*,m.* FROM docencia doc 
            INNER JOIN academico_version av on av.idRegistroAV=doc.idRegistroAV
            INNER JOIN academico acad on acad.ciA=av.ciA
            INNER JOIN modulo m on m.idModulo=doc.idModulo
            WHERE av.idVersion=$version and m.idVersion=$version
            ORDER BY acad.nombreA ASC ");   
            
        } 
        else {
            if ($ciA!=null && $modulo==null) {
                $consulta=$this->db->query("SELECT acad.*,doc.*,av.*,m.* FROM docencia doc 
                INNER JOIN academico_version av on av.idRegistroAV=doc.idRegistroAV
                INNER JOIN academico acad on acad.ciA=av.ciA
                INNER JOIN modulo m on m.idModulo=doc.idModulo
                WHERE av.idVersion=$version and m.idVersion=$version and av.ciA='$ciA'
                ORDER BY acad.nombreA ASC "); 
            } 
            else {
                if ($ciA==null && $modulo!=null) {
                    $consulta=$this->db->query("SELECT acad.*,doc.*,av.*,m.* FROM docencia doc 
                    INNER JOIN academico_version av on av.idRegistroAV=doc.idRegistroAV
                    INNER JOIN academico acad on acad.ciA=av.ciA
                    INNER JOIN modulo m on m.idModulo=doc.idModulo
                    WHERE av.idVersion=$version and m.idVersion=$version and m.numeroM=$modulo
                    ORDER BY acad.nombreA ASC "); 
                } 
                else {
                    $consulta=$this->db->query("SELECT acad.*,doc.*,av.*,m.* FROM docencia doc 
                    INNER JOIN academico_version av on av.idRegistroAV=doc.idRegistroAV
                    INNER JOIN academico acad on acad.ciA=av.ciA
                    INNER JOIN modulo m on m.idModulo=doc.idModulo
                    WHERE av.idVersion=$version and m.idVersion=$version and m.numeroM=$modulo  and av.ciA='$ciA'
                    ORDER BY acad.nombreA ASC "); 
                }
            }
            
        }
        return $consulta->result_array();
    }
    public function geDocencia_porId($version,$docencia)
    {
        $consulta=$this->db->query("SELECT acad.*,doc.*,av.*,m.* FROM docencia doc 
        INNER JOIN academico_version av on av.idRegistroAV=doc.idRegistroAV
        INNER JOIN academico acad on acad.ciA=av.ciA
        INNER JOIN modulo m on m.idModulo=doc.idModulo
        WHERE av.idVersion=$version and m.idVersion=$version and doc.idDocencia=$docencia
        ORDER BY acad.nombreA ASC "); 
        return $consulta->result_array();
    }

    public function editarDetDocencia($version,$docencia,$estadodoc,$contratodoc,$fechacontratodoc,$fechainiciodoc,$fechafindoc,$observacionDoc)
    {
        $sql="UPDATE docencia SET estadoDoc='$estadodoc', contratoDoc='$contratodoc',fecha_contrato='$fechacontratodoc', fechaInicioDoc='$fechainiciodoc', fechaFinalDoc='$fechafindoc',observacion='$observacionDoc'
         WHERE idDocencia='$docencia' ";
        $this->db->query($sql); 
        $this->db->affected_rows();
    }

    public function eliminar_docencia($docencia,$paralelo)
    {
        $this->db->query("UPDATE paralelo SET idDocencia=NULL
        WHERE idParalelo='$paralelo' ");

        $this->db->query("DELETE FROM docencia WHERE idDocencia='$docencia' ");

        return $this->db->affected_rows()>0;
    }

    //PARALELO-DOCENCIA
    public function paralelo_sin_docencia($paraleloDoc)//se usa ParaleloDocencia
    {

        $doceciaParalelo=$this->db->query("SELECT idDocencia FROM paralelo WHERE idParalelo=$paraleloDoc ");
        $docencia=$doceciaParalelo->result()[0]->idDocencia;
        return $docencia;
    }

    public function getParaleloDocencia($version,$ciAcad,$modulosele,$paraleloDoc)//se usa ParaleloDocencia
    {
        if ($ciAcad==null) 
        {
            $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM='$modulosele' and idVersion=$version ");
            $idModulo=$modulo->result()[0]->idModulo;
    
            $doceciaParalelo=$this->db->query("SELECT * FROM paralelo WHERE nombre_paralelo=$paraleloDoc and idModulo=$idModulo");
            

            $consulta=$this->db->query("SELECT acad.*,doc.*,av.*,m.* FROM docencia doc 
            INNER JOIN academico_version av on av.idRegistroAV=doc.idRegistroAV
            INNER JOIN academico acad on acad.ciA=av.ciA
            INNER JOIN paralelo p on p.idDocencia=doc.idDocencia
            INNER JOIN modulo m on m.idModulo=doc.idModulo and m.idModulo=p.idModulo
            WHERE av.idVersion=$version and m.idVersion=$version and m.numeroM=$modulo and p.nombre_paralelo=$paraleloDoc 
            ORDER BY acad.nombreA ASC "); 

        } 
        else {
            $modulo=$this->db->query("SELECT idModulo FROM modulo WHERE numeroM='$modulosele' and idVersion=$version ");
            $idModulo=$modulo->result()[0]->idModulo;
            
                $acadselect=$this->db->query("SELECT idRegistroAV FROM academico_version WHERE ciA='$ciAcad' and idVersion=$version ");
                $idacadselect=$acadselect->result()[0]->idRegistroAV;
    
                $docencia=$this->db->query("SELECT idDocencia FROM docencia WHERE idRegistroAV='$idacadselect' and idModulo=$idModulo" );
                $idDocencia=$docencia->result()[0]->idDocencia;
    
            $doceciaParalelo=$this->db->query("SELECT * FROM paralelo WHERE nombre_paralelo=$paraleloDoc and idModulo=$idModulo and idDocencia=$idDocencia ");
            

            $consulta=$this->db->query("SELECT acad.*,doc.*,av.*,m.* FROM docencia doc 
            INNER JOIN academico_version av on av.idRegistroAV=doc.idRegistroAV
            INNER JOIN academico acad on acad.ciA=av.ciA
            INNER JOIN paralelo p on p.idDocencia=doc.idDocencia
            INNER JOIN modulo m on m.idModulo=doc.idModulo and m.idModulo=p.idModulo
            WHERE av.idVersion=$version and m.idVersion=$version and m.numeroM=$modulo  and av.ciA='$ciA' and p.nombre_paralelo=$paraleloDoc 
            ORDER BY acad.nombreA ASC "); 
        }
        
        return $doceciaParalelo->result_array();
        
    }

    public function getParalelo($version, $ciAcad = null)
    {
        if ($ciAcad==null) 
        {
            $consulta=$this->db->query("SELECT acad.*,doc.*,av.*,m.*,p.* FROM paralelo p
            INNER JOIN modulo m on m.idModulo=p.idModulo
            INNER JOIN docencia doc  on doc.idDocencia=p.idDocencia
            INNER JOIN academico_version av on av.idRegistroAV=doc.idRegistroAV
            INNER JOIN academico acad on acad.ciA=av.ciA
            WHERE av.idVersion=$version and m.idVersion=$version
            ORDER BY m.nombreM ASC "); 
        } 
        else {
            $acadselect=$this->db->query("SELECT idRegistroAV FROM academico_version WHERE ciA='$ciAcad' and idVersion=$version ");
            $idacadselect=$acadselect->result()[0]->idRegistroAV;

            // $docencia=$this->db->query("SELECT idDocencia FROM docencia WHERE idRegistroAV='$idacadselect' and idModulo=$idModulo" );
            // $idDocencia=$docencia->result()[0]->idDocencia;

            $consulta=$this->db->query("SELECT acad.*,doc.*,av.*,m.*,p.* FROM paralelo p
            INNER JOIN modulo m on m.idModulo=p.idModulo
            INNER JOIN docencia doc  on doc.idDocencia=p.idDocencia
            INNER JOIN academico_version av on av.idRegistroAV=doc.idRegistroAV
            INNER JOIN academico acad on acad.ciA=av.ciA
            WHERE av.idVersion=$version and m.idVersion=$version and av.idRegistroAV=$idacadselect 
            ORDER BY m.nombreM ASC "); 
        }

        return $consulta->result_array();
        
    }
}