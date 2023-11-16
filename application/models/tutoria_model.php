<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutoria_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        
    }

    // public function buscarAcademico($ci=null)
    // {
        
    //     $query=$this->db->query("SELECT * FROM academico WHERE ciA='$ci' ");
    //     return $query->num_rows();
    //     // return $query->result();
    // }
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
            $consulta=$this->db->query("SELECT a.*,do.*,m.* FROM academico a 
            INNER JOIN docencia do on do.idAcademico=a.idAcademico
            INNER JOIN modulo m on m.idModulo=do.idModulo
            WHERE a.idAcademico='' ");   
            return $consulta->result_array();
        }
    }

    public function crear_tutoriaMonografia($version,$realizamono,$academico,$numerocontrato,$cancelado,$fechacarta,$fechainicio,$fechafinal,$obserbacion)
    {
        // $academico=$this->db->query("SELECT idAcademico FROM academico WHERE ciA='$academico' ");
        // $idAcademico=$academico->result()[0]->idAcademico;

        $academico=$this->db->query("SELECT idRegistroAV FROM academico_version WHERE ciA='$academico' and idVersion='$version' ");
        $idRegistroAV=$academico->result()[0]->idRegistroAV;
        
            $this->db->query("UPDATE realiza_monografia SET idRegistroAV=$idRegistroAV,fecha_inicioT='$fechainicio',fecha_finalT='$fechafinal',
                                contratoT='$numerocontrato',fechaemision_cartaT='$fechacarta',cancelacionT='$cancelado',observacionesT='$obserbacion'
            WHERE idRealizaMono=$realizamono"); 
        // $this->db->affected_rows();
        return true;
    }

    public function getTutoria($ciTutor=null)
    {
        $version=$this->session->userdata('idVersion');

        if($ciTutor==null)
        {
            $consulta=$this->db->query("SELECT a.*,tu.*,av.* FROM academico a 
            INNER JOIN tutoria tu on tu.idAcademico=a.idAcademico
            INNER JOIN academico_version av on av.ciA=a.ciA
            WHERE av.idVersion=$version
            ORDER BY tu.numeroContratoT ASC");   
            return $consulta->result_array();
            
        }
        else
        {
            $academico=$this->db->query("SELECT idAcademico FROM academico WHERE ciA='$ciTutor' ");
            $idAcademico=$academico->result()[0]->idAcademico;

            $consulta=$this->db->query("SELECT a.*,tu.*,av.* FROM academico a 
            INNER JOIN tutoria tu on tu.idAcademico=a.idAcademico
            INNER JOIN academico_version av on av.ciA=a.ciA
            WHERE av.idVersion=$version and a.idAcademico=$idAcademico
            ORDER BY tu.numeroContratoT ASC");   
            return $consulta->result_array();
            
        }
    }
    public function getTutoria_monografia($version,$ciTutor=null, $ciDiplo=null)
    {
        if($ciTutor==null && $ciDiplo==null)
        {
            $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.*,av.*,a.* FROM realiza_monografia remo
            INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
            INNER JOIN academico_version av ON av.idRegistroAV=remo.idRegistroAV
            INNER JOIN academico a ON a.ciA=av.ciA
            WHERE i.idVersion=$version 
            and av.idVersion=$version
            ORDER BY a.nombreA  ASC");
        }
        else
        {
            if ($ciTutor!=null && $ciDiplo==null) 
            {
                $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.*,av.*,a.* FROM realiza_monografia remo
                INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
                INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
                INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
                INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
                INNER JOIN academico_version av ON av.idRegistroAV=remo.idRegistroAV
                INNER JOIN academico a ON a.ciA=av.ciA
                WHERE i.idVersion=$version and av.ciA='$ciTutor'
                and av.idVersion=$version
                ORDER BY a.nombreA  ASC");
            } 
            else {
                if ($ciTutor==null && $ciDiplo!=null) 
                {
                    $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.*,av.*,a.* FROM realiza_monografia remo
                    INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
                    INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
                    INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
                    INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
                    INNER JOIN academico_version av ON av.idRegistroAV=remo.idRegistroAV
                    INNER JOIN academico a ON a.ciA=av.ciA
                    WHERE i.idVersion=$version and d.ciD='$ciDiplo'
                    and av.idVersion=$version
                    ORDER BY a.nombreA  ASC");
                } 
                else {
                    $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.*,av.*,a.* FROM realiza_monografia remo
                    INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
                    INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
                    INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
                    INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
                    INNER JOIN academico_version av ON av.idRegistroAV=remo.idRegistroAV
                    INNER JOIN academico a ON a.ciA=av.ciA
                    WHERE i.idVersion=$version and d.ciD='$ciDiplo' and av.ciA='$ciTutor'
                    and av.idVersion=$version
                    ORDER BY a.nombreA ASC");
                }//se cambio and por or en la ultima para que realize la busqueta
                
            }
        }
        return $query->result_array();
    }

    public function monografia_sin_tutor($reamonografia)//se usa ParaleloDocencia
    {
        $tutor=$this->db->query("SELECT idRegistroAV FROM realiza_monografia WHERE idRealizaMono=$reamonografia ");
        $idRegistroAV=$tutor->result()[0]->idRegistroAV;
        return $idRegistroAV;
        // if ($idRegistroAV==0) {
        //     return TRUE;
        // } else {
        //     return FALSE;
        // }
        
    }
    public function getTutoria_poId($version,$reamonografia)//se usa ParaleloDocencia
    {
        $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.*,av.*,a.* FROM realiza_monografia remo
        INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
        INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
        INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
        INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
        INNER JOIN academico_version av ON av.idRegistroAV=remo.idRegistroAV
        INNER JOIN academico a ON a.ciA=av.ciA
        WHERE remo.idRealizaMono=$reamonografia
        and av.idVersion=$version
        ORDER BY a.nombreA  ASC");

        return $query->result_array();
    }
    public function editarTutoriaMono($version,$realizamono,$academico,$numerocontrato,$cancelado,$fechacarta,$fechainicio,$fechafinal,$obserbacion,$aprobar)
    {
        $sql="UPDATE realiza_monografia SET idRegistroAV='$academico', fecha_inicioT='$fechainicio',fecha_finalT='$fechafinal', contratoT='$numerocontrato', 
        fechaemision_cartaT='$fechacarta',cancelacionT='$cancelado',observacionesT='$obserbacion',aprobarMono='$aprobar'
         WHERE idRealizaMono='$realizamono' ";
        $this->db->query($sql); 
        $this->db->affected_rows();
    }

    public function eliminar_Tutoria($realizamono,$inscripcion)
    {
        $sql="UPDATE realiza_monografia SET idRegistroAV=0, fecha_inicioT='',fecha_finalT='', contratoT='', 
        fechaemision_cartaT='',cancelacionT=0,observacionesT='',aprobarMono=0
         WHERE idRealizaMono='$realizamono' and idInscripcion='$inscripcion' ";
        $this->db->query($sql); 
        $this->db->affected_rows();
    }
}