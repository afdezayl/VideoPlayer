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
    
    $screen->display('watch.tpl');
    

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

    function makeUrlToken($codigo)
    {
        $info = [
            'id'=>session_id(),
            'cod'=>$codigo
        ];
    
        $key = Cripto::getRandomIV();
        Session::setValues(['key'=>$key]);
    
        $token = Cripto::encrypt(json_encode($info), $key);
    
        $urlToken = urlencode($token);
        $urlVideo = "/php/playVideo.php?v=$urlToken";

        /*Ruta completa con:
            dirname($_SERVER['HTTP_REFERER']) */
            
        return '.'.$urlVideo;
    }
