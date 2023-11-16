<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Defensa_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        
    }

    public function buscarAcademico($ci=null)
    {
        
        $query=$this->db->query("SELECT * FROM academico WHERE ciA='$ci' ");
        return $query->num_rows();
        // return $query->result();
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
            ORDER BY d.nombreD ASC");
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
                WHERE i.idVersion=$version and av.ciA=$ciTutor
                and av.idVersion=$version
                ORDER BY d.nombreD ASC");
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
                    WHERE i.idVersion=$version and i.ciD=$ciDiplo
                    and av.idVersion=$version
                    ORDER BY d.nombreD ASC");
                } 
                else {
                    $query=$this->db->query("SELECT remo.*,mo.*,i.*,d.*,pr.*,av.*,a.* FROM realiza_monografia remo
                    INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
                    INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
                    INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
                    INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
                    INNER JOIN academico_version av ON av.idRegistroAV=remo.idRegistroAV
                    INNER JOIN academico a ON a.ciA=av.ciA
                    WHERE i.idVersion=$version and i.ciD=$ciDiplon and av.ciA=$ciTutor
                    and av.idVersion=$version
                    ORDER BY d.nombreD ASC");
                }
                
            }
        }
        return $query->result_array();
    }

    public function monografia_sin_tutor($reamonografia)//se usa ParaleloDocencia
    {
        $tutor=$this->db->query("SELECT idRegistroAV FROM realiza_monografia WHERE idRealizaMono=$reamonografia ");
        $idRegistroAV=$tutor->result()[0]->idRegistroAV;
        return $idRegistroAV;
    }

    public function buscar_defensa($realizamono,$nomDefensa,$fechaDef)
    {
        $query=$this->db->query("SELECT * FROM defensa_monografia WHERE idRealizaMono='$realizamono' and nombreDef='$nomDefensa' ");
        return $query->num_rows();
    }
    public function crearDefensa($realizamono,$nomDefensa,$fechaDef)
    {
        $this->db->query("INSERT INTO defensa_monografia(idRealizaMono,nombreDef,fechaDef) VALUES
        (".$this->db->escape($realizamono).",".$this->db->escape($nomDefensa).",".$this->db->escape($fechaDef).")");

        $idModulo=$this->db->insert_id();
        return $idModulo;

        // $this->db->affected_rows();
    }
    public function crearDesignar_tribunal($defensa,$tribunal,$tipoTribunal,$invitacioncarta)
    {
        // $trib=implode($tribunal);
        // $tipo=implode($tipoTribunal);
        // $carta=implode($invitacioncarta);

        // $trib=str_replace(" ' ","",$trib);
        // $tipo=str_replace(" ' ","",$tipo);
        // $carta=str_replace(" ' ","",$carta);

        $this->db->query("INSERT INTO designar_tribunal(idDefensa,idRegistroAV,tipo_tribunal,carta_invitacionTrib) VALUES
        (".$this->db->escape($defensa).",".$this->db->escape($tribunal).",".$this->db->escape($tipoTribunal).",".$this->db->escape($invitacioncarta).")");

        $this->db->affected_rows();
    }
    public function getDefensa_resutado_sin_nombreDef($version,$ciDiplo=null)
    {
        if($ciDiplo==null)
        {
            $query=$this->db->query("SELECT def.*,remo.*,mo.*,i.*,d.*,pr.* FROM defensa_monografia def
            INNER JOIN realiza_monografia remo ON remo.idRealizaMono=def.idRealizaMono
            INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
            WHERE i.idVersion=$version
            ORDER BY def.fechaDef ASC");
        }
        else
        {
            $query=$this->db->query("SELECT def.*,remo.*,mo.*,i.*,d.*,pr.* FROM defensa_monografia def
            INNER JOIN realiza_monografia remo ON remo.idRealizaMono=def.idRealizaMono
            INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
            WHERE i.idVersion=$version and d.ciD='$ciDiplo'
            ORDER BY def.fechaDef ASC");
        }
        return $query->result_array();
    }
    public function getDefensa($version,$tipoDef,$ciDiplo=null, $fecha=null)
    {
        if($ciDiplo==null && $fecha==null)
        {
            $query=$this->db->query("SELECT def.*,remo.*,mo.*,i.*,d.*,pr.* FROM defensa_monografia def
            INNER JOIN realiza_monografia remo ON remo.idRealizaMono=def.idRealizaMono
            INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
            WHERE i.idVersion=$version and def.nombreDef=$tipoDef
            ORDER BY def.fechaDef ASC");
        }
        else
        {
            if ($ciDiplo!=null && $fecha==null) 
            {
                $query=$this->db->query("SELECT def.*,remo.*,mo.*,i.*,d.*,pr.* FROM defensa_monografia def
                INNER JOIN realiza_monografia remo ON remo.idRealizaMono=def.idRealizaMono
                INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
                INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
                INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
                INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
                WHERE i.idVersion=$version and def.nombreDef=$tipoDef and d.ciD=$ciDiplo
                ORDER BY def.fechaDef ASC");
            } 
            else {
                if ($ciDiplo==null && $fecha!=null) 
                {
                    $query=$this->db->query("SELECT def.*,remo.*,mo.*,i.*,d.*,pr.* FROM defensa_monografia def
                    INNER JOIN realiza_monografia remo ON remo.idRealizaMono=def.idRealizaMono
                    INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
                    INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
                    INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
                    INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
                    WHERE i.idVersion=$version and def.nombreDef=$tipoDef and def.fechaDef=$fecha
                    ORDER BY def.fechaDef ASC");
                } 
                else {
                    $query=$this->db->query("SELECT def.*,remo.*,mo.*,i.*,d.*,pr.* FROM defensa_monografia def
                    INNER JOIN realiza_monografia remo ON remo.idRealizaMono=def.idRealizaMono
                    INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
                    INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
                    INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
                    INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
                    WHERE i.idVersion=$version and def.nombreDef=$tipoDef and d.ciD=$ciDiplo and def.fechaDef=$fecha
                    ORDER BY def.fechaDef ASC");
                }
                
            }
        }
        return $query->result_array();
    }
    public function obtenerDefensa_porId($version,$idDefensa)
    {
        $query=$this->db->query("SELECT def.*,remo.*,mo.*,i.*,d.*,pr.* FROM defensa_monografia def
        INNER JOIN realiza_monografia remo ON remo.idRealizaMono=def.idRealizaMono
        INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
        INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
        INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
        INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
        WHERE i.idVersion=$version and def.idDefensa=$idDefensa 
        ORDER BY def.fechaDef ASC");
        return $query->result_array();
    }
    public function getDefensaTribunal($version,$iddefensa=null)//hacer por q solo saca un tribunal por peticion generand varias listas
    {
        if($iddefensa==null)
        {
            $query=$this->db->query("SELECT tribu.*,def.*,remo.*,mo.*,i.*,d.*,pr.*,av.*,a.* FROM designar_tribunal tribu
            INNER JOIN defensa_monografia def ON def.idDefensa=tribu.idDefensa
            INNER JOIN realiza_monografia remo ON remo.idRealizaMono=def.idRealizaMono
            INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
            INNER JOIN academico_version av ON av.idRegistroAV=tribu.idRegistroAV
            INNER JOIN academico a ON a.ciA=av.ciA
            WHERE i.idVersion=$version 
            and av.idVersion=$version
            ORDER BY def.fechaDef ASC");
        }
        else
        {
            $query=$this->db->query("SELECT tribu.*,def.*,remo.*,mo.*,i.*,d.*,pr.*,av.*,a.* FROM designar_tribunal tribu
            INNER JOIN defensa_monografia def ON def.idDefensa=tribu.idDefensa
            INNER JOIN realiza_monografia remo ON remo.idRealizaMono=def.idRealizaMono
            INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
            INNER JOIN academico_version av ON av.idRegistroAV=tribu.idRegistroAV
            INNER JOIN academico a ON a.ciA=av.ciA
            WHERE i.idVersion=$version and def.idDefensa=$iddefensa
            and av.idVersion=$version
            ORDER BY def.fechaDef ASC");
        }
        return $query->result_array();
    }

    public function getTribunal($version,$tribunal=null)//hacer por q solo saca un tribunal por peticion generand varias listas
    {
        if($tribunal==null)
        {
            $query=$this->db->query("SELECT tribu.*,def.*,remo.*,mo.*,i.*,d.*,pr.*,av.*,a.* FROM designar_tribunal tribu
            INNER JOIN defensa_monografia def ON def.idDefensa=tribu.idDefensa
            INNER JOIN realiza_monografia remo ON remo.idRealizaMono=def.idRealizaMono
            INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
            INNER JOIN academico_version av ON av.idRegistroAV=tribu.idRegistroAV
            INNER JOIN academico a ON a.ciA=av.ciA
            WHERE i.idVersion=$version 
            and av.idVersion=$version
            ORDER BY def.fechaDef ASC");
        }
        else
        {
            $query=$this->db->query("SELECT tribu.*,def.*,remo.*,mo.*,i.*,d.*,pr.*,av.*,a.* FROM designar_tribunal tribu
            INNER JOIN defensa_monografia def ON def.idDefensa=tribu.idDefensa
            INNER JOIN realiza_monografia remo ON remo.idRealizaMono=def.idRealizaMono
            INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN profesion pr ON pr.idProfesion=d.idProfesion
            INNER JOIN academico_version av ON av.idRegistroAV=tribu.idRegistroAV
            INNER JOIN academico a ON a.ciA=av.ciA
            WHERE i.idVersion=$version and tribu.idTribunal=$tribunal
            and av.idVersion=$version
            ORDER BY def.fechaDef ASC");
        }
        return $query->result_array();
    }
    
    public function asignarFecha_defensa($defensa,$nota,$aprobacion,$observacion)
    {
        $sql="UPDATE defensa_monografia SET notaDef='$nota',aprobarDef='$aprobacion',observacionDef='$observacion'
         WHERE idDefensa='$defensa' ";
        $this->db->query($sql); 
        $this->db->affected_rows();
    }
    public function editar_fechaDef($defensa,$fecha)
    {
        $sql="UPDATE defensa_monografia SET fechaDef='$fecha'
         WHERE idDefensa='$defensa' ";
        $this->db->query($sql); 
        $this->db->affected_rows();
    }
    public function editarTribunal($tribunal,$acadVersion,$carta)
    {
        $sql="UPDATE designar_tribunal SET idRegistroAV='$acadVersion', carta_invitacionTrib='$carta'
         WHERE idTribunal='$tribunal' ";
        $this->db->query($sql); 
        $this->db->affected_rows();
    }

    public function eliminar_defensa($defensa)
    {
        $this->db->query("DELETE FROM defensa_monografia WHERE idDefensa='$defensa' ");

        return $this->db->affected_rows()>0;
    }

    public function obtenerDefensa_porMono($version,$mono)
    {
        $query=$this->db->query("SELECT def.*,remo.*,mo.*,i.*,d.* FROM defensa_monografia def
        INNER JOIN realiza_monografia remo ON remo.idRealizaMono=def.idRealizaMono
        INNER JOIN monografia mo ON mo.idMonografia=remo.idMonografia
        INNER JOIN inscripcion i ON i.idInscripcion=remo.idInscripcion
        INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
        WHERE i.idVersion=$version and remo.idRealizaMono=$mono 
        ORDER BY def.fechaDef ASC");
        return $query->result_array();
    }

}