<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitacora_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        
    }
    // BITACORA DE ACCIONES DEL USUARIO
    public function get_bitacora($fecha=null)
    {
        if ($fecha==null) {
            $consulta=$this->db->query("SELECT * FROM bitacora ORDER BY fecha DESC");  
        } else { 
            $consulta=$this->db->query("SELECT * FROM bitacora WHERE DATE(fecha)='$fecha' ORDER BY fecha DESC");  
        }
        
        return $consulta->result_array();
    }
    public function getbitacora_update_asignacionmdi($fecha=null)
    {
        if ($fecha==null) {
            $consulta=$this->db->query("SELECT bamd.*,amd.*,i.*,d.*,m.*,p.* FROM bit_asignacion_modiplo bamd 
            INNER JOIN asignacion_modulo_diplomante amd ON amd.idAsignacionMDI=bamd.idBit_amd 
            INNER JOIN inscripcion i ON i.idInscripcion=amd.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN modulo m ON m.idModulo=amd.idModulo
            INNER JOIN paralelo p ON p.idParalelo=amd.idParalelo
            ORDER BY bamd.fecha_modif DESC");  
        } else { 
            $consulta=$this->db->query("SELECT bamd.*,amd.*,i.*,d.*,m.*,p.* FROM bit_asignacion_modiplo bamd 
            INNER JOIN asignacion_modulo_diplomante amd ON amd.idAsignacionMDI=bamd.idBit_amd 
            INNER JOIN inscripcion i ON i.idInscripcion=amd.idInscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            INNER JOIN modulo m ON m.idModulo=amd.idModulo
            INNER JOIN paralelo p ON p.idParalelo=amd.idParalelo
            WHERE DATE(bamd.fecha_modif)='$fecha' ORDER BY bamd.fecha_modif DESC");  
        }
        
        return $consulta->result_array();
    }
    public function getbitacora_update_inscripcion($fecha=null)
    {
        if ($fecha==null) {
            $consulta=$this->db->query("SELECT bia.*,i.*,d.* FROM bit_inscripcion_actualizacion bia 
            INNER JOIN inscripcion i ON i.idInscripcion=bia.idBit_inscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            ORDER BY bia.fecha_modI DESC");  
        } else { 
            $consulta=$this->db->query("SELECT bia.*,i.*,d.* FROM bit_inscripcion_actualizacion bia 
            INNER JOIN inscripcion i ON i.idInscripcion=bia.idBit_inscripcion
            INNER JOIN diplomante d ON d.idDiplomante=i.idDiplomante
            WHERE DATE(bia.fecha_modI)='$fecha' ORDER BY bia.fecha_modI DESC");  
        }
        
        return $consulta->result_array();
    }
    // BITACORA DE ACCESSO DE USUARIOS AL SISTEMA
    public function bitacora_acceso_usuario_ingresa($idusuario,$ciu,$estado)
    {
        date_default_timezone_set('America/Caracas');
        $f_entrada=date("Y-m-d");
        // $h_entrada=date("H:i:s",time()-21600);
        $h_entrada=date("H:i:s");
        $sql="INSERT INTO bitacora_acceso_usuarios(idUsuario,ciU,fecha_entrada,hora_entrada,estado)
              VALUES(".$this->db->escape($idusuario).",".$this->db->escape($ciu).",".$this->db->escape($f_entrada).",".$this->db->escape($h_entrada).",".$this->db->escape($estado).")";
        $this->db->query($sql);
    }
    public function bitacora_acceso_usuario_sale($idusuario,$ciu)
    {
        date_default_timezone_set('America/Caracas');
        $f_salida=date("Y-m-d");
        // $h_salida=date("H:i:s",time()-21600);
        $h_salida=date("H:i:s");
        $sql="UPDATE bitacora_acceso_usuarios SET fecha_salida='$f_salida', hora_salida='$h_salida', estado=0 WHERE idUsuario=$idusuario and ciU=$ciu and estado=1 ";
        $this->db->query($sql); 
        // $this->db->affected_rows();
    }
    public function bitacora_acceso_usuario_salepor_idbitacora($idbitacoraacceso)
    {
        date_default_timezone_set('America/Caracas');
        $f_salida=date("Y-m-d");
        $h_salida=date("H:i:s",time()-21600);
        $sql="UPDATE bitacora_acceso_usuarios SET fecha_salida='$f_salida', hora_salida='$h_salida', estado=0 WHERE idAccesoU_bitacora=$idbitacoraacceso ";
        $this->db->query($sql);
        // NO CIERRA SECION SINO DESABILITA AL USUARIO, ESTO SE DEBE HACER EN REGISTRO DE USUARIOS
        // $usuario=$this->db->query("SELECT idUsuario as usuario FROM bitacora_acceso_usuarios
        //             WHERE idAccesoU_bitacora=$idbitacoraacceso"); 
        // $usu=$usuario->result()[0]->usuario;
        // $sql="UPDATE usuario SET estadoU=0 WHERE idUsuario=$usu ";
        // $this->db->query($sql);
    }
    public function get_bitacora_acceso($fecha=null)
    {
        if ($fecha==null) {
            $consulta=$this->db->query("SELECT bau.*,u.* FROM bitacora_acceso_usuarios bau
            INNER JOIN usuario u ON u.idUsuario=bau.idUsuario 
            ORDER BY bau.idAccesoU_bitacora DESC");  
            // ORDER BY bau.fecha_entrada DESC ,bau.hora_entrada DESC");
        } else { 
            $consulta=$this->db->query("SELECT bau.*,u.* FROM bitacora_acceso_usuarios bau
            INNER JOIN usuario u ON u.idUsuario=bau.idUsuario 
            WHERE bau.fecha_entrada='$fecha' 
            ORDER BY bau.fecha_entrada DESC ,bau.hora_entrada DESC");  
        }
        
        return $consulta->result_array();
    }
    public function get_bitacora_acceso_enLinea($fecha=null)//no se si hacerlo, se veria mas eficiente??
    {
        if ($fecha==null) {
            $consulta=$this->db->query("SELECT bau.*,u.* FROM bitacora_acceso_usuarios bau
            INNER JOIN usuario u ON u.idUsuario=bau.idUsuario 
            WHERE bau.fecha_salida=null OR bau.fecha_salida='0000-00-00'
            ORDER BY bau.fecha_entrada DESC");  
        } else { 
            $consulta=$this->db->query("SELECT bau.*,u.* FROM bitacora_acceso_usuarios bau
            INNER JOIN usuario u ON u.idUsuario=bau.idUsuario 
            WHERE bau.fecha_entrada='$fecha' AND WHERE bau.fecha_salida=null OR bau.fecha_salida='0000-00-00'
            ORDER BY bau.fecha_entrada DESC ");  
        }
        
        return $consulta->result_array();
    }

    // BITACORA DE VERSION
    public function bitacora_habilita_version($idVersion,$razonv)// hacer
    {
        date_default_timezone_set('America/Caracas');
        $f_habilitaV=date("Y-m-d");
        $h_habilitaV=date("H:i:s");
        $estado=1;
        $sql="INSERT INTO bitacora_version(idVersion,estadoVersion,fecha_accionV,hora_accionV,razon_accionV)
              VALUES(".$this->db->escape($idVersion).",".$this->db->escape($estado).",".$this->db->escape($f_habilitaV).",
                        ".$this->db->escape($h_habilitaV).",".$this->db->escape($razonv).")";
        $this->db->query($sql);
    }
    public function bitacora_cierra_version($idVersion,$razonv)// hacer
    {
        date_default_timezone_set('America/Caracas');
        $fechaTerminoV=date("Y-m-d");
        $h_termino=date("H:i:s");
        $estado=0;
        $sql="INSERT INTO bitacora_version(idVersion,estadoVersion,fecha_accionV,hora_accionV,razon_accionV)
              VALUES(".$this->db->escape($idVersion).",".$this->db->escape($estado).",".$this->db->escape($fechaTerminoV).",
                        ".$this->db->escape($h_termino).",".$this->db->escape($razonv).")";
        $this->db->query($sql);
        return $this->db->insert_id();

    }
    public function getBitacora_version_pornombre($nombre)
    {
        if ($nombre==null) {
            $consulta=$this->db->query("SELECT bv.*,v.* FROM bitacora_version bv
            INNER JOIN version v ON v.idVersion=bv.idVersion 
            ORDER BY bv.idBitacora_version DESC");  
        } else { 
            $consulta=$this->db->query("SELECT bv.*,v.* FROM bitacora_version bv
            INNER JOIN version v ON v.idVersion=bv.idVersion 
            WHERE v.nombreV='$nombre' ");  
        }
        
        return $consulta->result_array();
    }
    public function getBitacora_version_porid($id)
    {
        if ($id==null) {
            $consulta=$this->db->query("SELECT bv.*,v.* FROM bitacora_version bv
            INNER JOIN version v ON v.idVersion=bv.idVersion 
            ORDER BY bv.idBitacora_version DESC");  
        } else { 
            $consulta=$this->db->query("SELECT bv.*,v.* FROM bitacora_version bv
            INNER JOIN version v ON v.idVersion=bv.idVersion 
            WHERE bv.idBitacora_version='$id' ");  
        }
        
        return $consulta->result_array();
    }
}