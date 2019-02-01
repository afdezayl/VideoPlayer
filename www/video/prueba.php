<?php
    const secureFolder = "./../../seguridad/video/";

    require secureFolder.'Cripto.class.php';
    require secureFolder.'Session.class.php';

    //urldecode automático
    $token = isset($_GET['v']) ? strip_tags(trim($_GET['v'])) : null;
   
    echo "<p>Token: $token</p>";    

    $desencriptado = Cripto::decrypt($token);
    $array = json_decode($desencriptado);
    
    echo "<p>Desencriptado: $desencriptado</p>";
    echo var_dump($array);
    
    session_id($array->id);
    Session::start();

    $rand = $array->rand;
    echo "<p>Código único: $rand</p>";
    echo var_dump($_SESSION);

    if ($rand == Session::getValue('rand')) {
        echo "<p>Coincide</p>";
    } else {
        echo "<p>No coincide</p>";
    }
    
    Session::setValues(['rand'=>'']);    
