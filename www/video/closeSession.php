<?php
    const secureFolder = "./../../seguridad/video/";
    require secureFolder."Session.class.php";

    Session::start();
    Session::destroy();

    header('Location: login.php');
    exit;