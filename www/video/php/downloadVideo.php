<?php
    const secureFolder = "./../../../seguridad/video/";

    require secureFolder."VideoDB.class.php";
    require secureFolder."Session.class.php";

    Session::start();
    if (Session::isValidSession() == false) {
        echo json_encode(["Error" => "Usuario no autorizado"]);
        exit;
    }

    $user = Session::getValue('dni');
    $codigo = getCodigo();
    $video = getVideo($user, $codigo);

    if($video['descargable']=='S') {
        sendFile($video);
    }    
    exit;

    function getCodigo()
    {
        $codigo = isset($_POST['codigo']) && strlen($_POST['codigo']) == 4
            ? strip_tags(trim($_POST['codigo']))
            : null;

        return $codigo;
    }

    function getVideo($user, $codigo)
    {
        $DB = new VideoDB();
    
        if (is_null($codigo) || (!$DB->isUserVideo($user, $codigo))) {
            echo json_encode(["Error" => "Usuario no autorizado"]);
            exit;
        }

        return $DB->getVideoInfo($codigo);
    }
    
    function sendFile($video)
    {        
        $name = $video['titulo'].'.mp4';             
        $videoPath = secureFolder.'movies/'.$video['video'];

        //Borramos el archivo anterior
        $zipPath = secureFolder.'movies/video.zip';       
        unlink($zipPath);

        $zip = new ZipArchive();
        $zip->open($zipPath, ZIPARCHIVE::CREATE);

        $zip->addFile($videoPath, $name);
        $zip->close();        

        header("Content-Disposition: attachment; filename=video.zip");
        header("Content-Type: application/zip");    
    
        ob_clean();
        readfile($zipPath);
    }
