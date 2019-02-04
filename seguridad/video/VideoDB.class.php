<?php
class VideoDB
{
    private $SERVIDOR = "localhost";
    private $USUARIO = "videos";
    private $PASSWORD = "videos";
    private $BBDD = "videos";
    private $CONEXION;
    
    public function __construct()
    {
        $this->CONEXION = $this->getConexion();
    }

    private function getConexion()
    {
        $conexion = new mysqli($this->SERVIDOR, $this->USUARIO, $this->PASSWORD, $this->BBDD);

        if ($conexion->connect_errno) {
            echo json_encode(["ERROR"=>"Fallo al conectar a MySQL"]);
            exit;
        }
        if (!$conexion->set_charset("utf8")) {
            echo json_encode(["ERROR"=>"Fallo al establecer utf8"]);
            exit;
        }

        return $conexion;
    }

    public function getPassword($dni)
    {
        $conexion = $this->CONEXION;

        $consultaSql = "SELECT clave
                    FROM USUARIOS
                    WHERE dni=?";
        
        $stmt = $conexion->prepare($consultaSql);
        $stmt->bind_param('s', $dni);

        $stmt->execute();

        $stmt->bind_result($clave);
        $stmt->fetch();

        return $clave;
    }

    public function getUserVideos($dni)
    {
        $conexion = $this->CONEXION;

        $consultaSql = "SELECT *
                    FROM VIDEOS
                    WHERE codigo_perfil in (                        
                        SELECT codigo_perfil
                            FROM PERFIL_USUARIO
                            WHERE dni=?
                        )
                    ORDER BY titulo
                    ";

        $stmt = $conexion->prepare($consultaSql);
        $stmt->bind_param('s', $dni);

        $stmt->execute();
        $resultado = $stmt->get_result();

        $videos = array();
        
        while ($video = $resultado->fetch_assoc()) {
            array_push($videos, $video);
        }

        return $videos;
    }

    public function getVideoCategories($codigo)
    {
        $conexion = $this->CONEXION;

        $consultaSql = "SELECT descripcion
                    FROM ASOCIADO, TEMATICA
                    WHERE codigo_video=?
                        and codigo_tematica=codigo"
                    ;
        
        $stmt = $conexion->prepare($consultaSql);
        
        $stmt->bind_param('s', $codigo);
        $stmt->bind_result($cat);

        $stmt->execute();        

        $categories = array();

        while($stmt->fetch()) {
            array_push($categories, $cat);
        }

        return $categories;
    }

    public function getUserProfiles($dni)
    {
        $conexion = $this->CONEXION;

        $consultaSql = "SELECT codigo_perfil
                    FROM PERFIL_USUARIO
                    WHERE dni=?";

        $stmt = $conexion->prepare($consultaSql);
        $stmt->bind_param('s', $dni);

        $stmt->execute();
        $resultado = $stmt->get_result();

        $profiles = array();
        
        while ($profile = $resultado->fetch_assoc()) {
            array_push($profiles, $profile);
        }

        return $profiles;
    }
    
    public function isUserVideo($dni, $cod) {
        $conexion = $this->CONEXION;

        $sql = "SELECT count(*)
            FROM VIDEOS
            WHERE 
                codigo=? and
                codigo_perfil in (                        
                    SELECT codigo_perfil
                        FROM PERFIL_USUARIO
                        WHERE dni=?
                )                          
        ";

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('ss', $cod, $dni);
        $stmt->bind_result($count);
        
        $stmt->execute();

        $stmt->fetch();

        return $count==1;
    }

    public function getVideoInfo($cod) {
        $conexion = $this->CONEXION;

        $sql = "SELECT *
            FROM VIDEOS
            WHERE 
                codigo=?                
        ";

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('s', $cod);
        
        $stmt->execute();
        $result = $stmt->get_result();

        $video = $result->fetch_assoc();

        return $video;
    }

    public function viewCount($dni, $codigo) {
        $conexion = $this->CONEXION;

        $sql = 'SELECT count(*)
            FROM visionado
            WHERE dni=?
                and codigo_video=?';

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('ss', $dni, $codigo);
        $stmt->bind_result($count);

        $stmt->execute();

        $stmt->fetch();

        return $count;
    }
}
