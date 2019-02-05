<?php
    const secureFolder = "./../../../seguridad/video/";

    require secureFolder."VideoDB.class.php";
    require secureFolder."Session.class.php";
    require secureFolder."VideoStream.class.php";
    require secureFolder.'Cripto.class.php';

    $token = getDesencryptedToken();
    $isValidSession = checkSession($token);

    if ($isValidSession == false) {
        echo json_encode(["Error" => "Usuario no autorizado"]);
        exit;
    }

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
        
        $desencryptedToken = Cripto::decrypt($token);

        return json_decode($desencryptedToken);
    }

    function checkSession($token)
    {
        Session::start();
        if (Session::isValidSession() == false) {
            return false;
        }

        if ($token->id != session_id()) {
            return false;
        }

        $rand = $token->rand;
        $sess_rand = Session::getValue('rand');

        if (is_null($sess_rand) || ($rand != $sess_rand)) {
            return false;
        }

        return true;
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
