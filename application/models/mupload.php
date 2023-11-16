<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mupload extends CI_Model {

    public function construct() {
        parent::__construct();
    }
    
    //FUNCIÓN PARA INSERTAR LOS DATOS DE LA ARCHIVO CALIFICACIONES SUBIDA
    function subir($titulo,$archivo,$idparalelo)
    {
        $data = array(
            'nombreArchivo' => $titulo,
            'ruta' => $archivo,
            'idParalelo' => $idparalelo
        );
        return $this->db->insert('archivo', $data);
    }
    public function getpdf($version,$modulosele,$paralelo)
    {
        $query=$this->db->query("SELECT a.*,pa.*,m.* FROM archivo a
        INNER JOIN paralelo pa ON pa.idParalelo=a.idParalelo
        INNER JOIN modulo m ON m.idModulo=pa.idModulo
        WHERE m.idVersion=$version and m.numeroM=$modulosele and pa.nombre_paralelo='$paralelo'");
        return $query->result_array();
    }
    public function getpdf_porid($idarchivo)
    {
        $query=$this->db->query("SELECT * FROM archivo WHERE idArchivo=$idarchivo ");
        return $query->result_array();
    }
    public function eliminar_archivopdf($idarchivo)
    {
        $this->db->query("DELETE FROM archivo WHERE idArchivo='$idarchivo' ");

        return $this->db->affected_rows()>0;
    }

    //FUNCIÓN PARA DATOS DE LA ARCHIVO MONOGRAFIA SUBIDA
    function subir_monopdf($idmonografia,$archivo)
    {
        $sql="UPDATE monografia SET rutaMonografia='$archivo' WHERE idMonografia='$idmonografia' ";
        $this->db->query($sql); 
        $this->db->affected_rows();
    }
    public function getpdf_poridmono($idarchivo=null)
    {
        if ($idarchivo==null) {
            $query=$this->db->query("SELECT m.*,rmo.*,i.* FROM monografia m
            INNER JOIN realiza_monografia rmo ON rmo.idMonografia=m.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=rmo.idInscripcion");
        } else {
            $query=$this->db->query("SELECT m.*,rmo.*,i.* FROM monografia m
            INNER JOIN realiza_monografia rmo ON rmo.idMonografia=m.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=rmo.idInscripcion 
            WHERE m.idMonografia=$idarchivo ");
        }
        return $query->result_array();
    }
    public function getpdf_menosidmod($idarchivo=null)
    {
        if ($idarchivo==null) {
            $query=$this->db->query("SELECT m.*,rmo.*,i.* FROM monografia m
            INNER JOIN realiza_monografia rmo ON rmo.idMonografia=m.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=rmo.idInscripcion
            ");
        } else {
            $query=$this->db->query("SELECT m.*,rmo.*,i.* FROM monografia m
            INNER JOIN realiza_monografia rmo ON rmo.idMonografia=m.idMonografia
            INNER JOIN inscripcion i ON i.idInscripcion=rmo.idInscripcion
            WHERE m.idMonografia!=$idarchivo ");
        }
        return $query->result_array();
    }
    public function eliminar_monopdf($idarchivo)
    {
        $sql="UPDATE monografia SET rutaMonografia=NULL WHERE idMonografia='$idarchivo' ";
        $this->db->query($sql); 
        return $this->db->affected_rows()>0;
    }
}