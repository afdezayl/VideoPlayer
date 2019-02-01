<?php
    const secureFolder = "./../../seguridad/video/";
    const smartyLibs = "./../../phpapps/smarty-3.1.33/libs/";
    const smartyScreens = "./../../screens/video/";

    require secureFolder."VideoDB.class.php";
    require secureFolder."Session.class.php";
    require smartyLibs."Smarty.class.php";
    require smartyScreens."VideoSmarty.class.php";

    Session::start();
    if (!Session::isValidSession()) {
        header("Location: login.php");
        exit;
    }

    $dni = Session::getValue('dni');

    $DB = new VideoDB();
    $videos = $DB->getUserVideos($dni);

    //Añade un string con las categorías de cada película
    foreach ($videos as &$video) {
        $categories = $DB->getVideoCategories($video['codigo']);        
        $strCategories = implode(' ', $categories);
        $video['category'] = $strCategories;
    }

    //echo var_dump($videos);
    
    $screen = new VideoSmarty(smartyScreens);    
    $screen->assign('videos', $videos);
    $screen->display('videos.tpl');
