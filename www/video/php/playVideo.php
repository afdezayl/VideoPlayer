<?php
    const secureFolder = "./../../../seguridad/video/";

    require secureFolder."VideoDB.class.php";
    require secureFolder."Session.class.php";
    require secureFolder."VideoStream.class.php";
    require secureFolder.'Cripto.class.php';

    Session::start();
    if (Session::isValidSession() == false) {
        echo json_encode(["Error" => "Usuario no autorizado"]);
        exit;
    }

    $token = getDesencryptedToken();
    $ruta = getVideoPath($token);
    
    saveUserView($token);
    $stream = new VideoStream($ruta);
    $stream->start();
    
    
    function getDesencryptedToken()
    {
        $token = isset($_GET['v']) ?
            strip_tags(trim($_GET['v']))
            : null;

        if (is_null($token)) {
            echo json_encode(["Error" => "Usuario no autorizado"]);
            exit;
        }
        
        $key = Session::getValue('key');
        $desencryptedToken = Cripto::decrypt($token, $key);
        
        return json_decode($desencryptedToken);
    }   

    function getVideoPath($token)
    {
        $DB = new VideoDB();

        $user = Session::getValue('dni');
        $codigo = $token->cod;
    
        if ($DB->isUserVideo($user, $codigo) == false) {
            echo json_encode(["Error" => "Usuario no autorizado"]);
            exit;
        }

        $video = $DB->getVideoInfo($codigo);
        $fileName = $video['video'];

        return secureFolder.'movies/'.$fileName;
    }

    function saveUserView($token) {
        $DB = new VideoDB();

        $user = Session::getValue('dni');
        $codigo = $token->cod;

        $DB->saveUserView($user, $codigo);
    }
