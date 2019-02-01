<?php    
    const secureFolder = "./../../seguridad/video/";
    const smartyLibs = "./../../phpapps/smarty-3.1.33/libs/";
    const smartyScreens = "./../../screens/video/";

    require secureFolder."VideoDB.class.php";
    require secureFolder."Session.class.php";
    require smartyLibs."Smarty.class.php";
    require smartyScreens."VideoSmarty.class.php";
    
    Session::start();
    if (Session::isValidSession()) {
        header("Location: videos.php");
        exit;
    }

    $dni = isset($_POST['dni']) && strlen($_POST['dni']) == 9
        ? strip_tags(trim($_POST['dni']))
        : "";
    $pass = isset($_POST['pass']) && strlen($_POST['pass']) <= 20
        ? strip_tags(trim($_POST['pass']))
        : "";

    $txt="";
    
    $DB = new VideoDB();
    $passDB = $DB->getPassword($dni);
    
    if ($dni && $pass && password_verify($pass, $passDB)) {
        $ip = $_SERVER['REMOTE_ADDR'];
        Session::setValues(["dni"=>$dni, "ip"=>$ip]);
                
        header("Location: videos.php");
        exit;
    } elseif ($dni || $pass) {
        $txt="Combinación de usuario y contraseña incorrecta";
    }

    $screen = new VideoSmarty(smartyScreens);   
    $screen->assign('txt', $txt);
    $screen->display('login.tpl');
