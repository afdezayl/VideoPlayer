<?php
    const secureFolder = "./../../seguridad/video/";
    const smartyLibs = "./../../phpapps/smarty-3.1.33/libs/";
    const smartyScreens = "./../../screens/video/";

    require secureFolder."VideoDB.class.php";
    require secureFolder."Session.class.php";
    require secureFolder.'Cripto.class.php';
    require smartyLibs."Smarty.class.php";
    require smartyScreens."VideoSmarty.class.php";

    Session::start();
    if (Session::isValidSession() == false) {
        header("Location: login.php");
        exit;
    }

    $dni = Session::getValue('dni');
    $codigo = getCodigo();

    $video = getVideo($dni, $codigo);
    $urlVideo = makeUrlToken($codigo);

    $screen = new VideoSmarty(smartyScreens);
    $screen->assign(
        [
            'video'=> $video,
            'urlVideo'=> $urlVideo
        ]);

    //echo var_dump($video);
    $screen->display('watch.tpl');

    //TODO: marcar como vista        

    function getCodigo()
    {
        $codigo = isset($_GET['cod']) ?
            strip_tags(trim($_GET['cod']))
            :null;

        if (is_null($codigo)) {
            header('Location: videos.php');
            exit;
        }

        return $codigo;
    }

    function getVideo($dni, $codigo)
    {
        $DB = new VideoDB();
        $isAuthorized = $DB->isUserVideo($dni, $codigo);
    
        if ($isAuthorized == false) {
            header('Location: videos.php');
            exit;
        }
    
        $video = $DB->getVideoInfo($codigo);
        $video['categories'] = $DB->getVideoCategories($codigo);

        return $video;
    }

    //TODO: Cambios en la clase cripto
    function makeUrlToken($codigo)
    {
        $rand = bin2hex(openssl_random_pseudo_bytes(20));

        $info = [
            'id'=>session_id(),
            'cod'=>$codigo,
            'rand'=>$rand
        ];
    
        Session::setValues(['rand'=>$rand]);
    
        $token = Cripto::encrypt(json_encode($info));
    
        $urlToken = urlencode($token);
        $urlVideo = "/php/playVideo.php?v=$urlToken";

        return dirname($_SERVER['HTTP_REFERER']).$urlVideo;
    }
