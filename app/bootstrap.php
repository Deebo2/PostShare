<?php

    // configuration file
    require_once 'config/config.php';
    //Helpers load
    require_once 'helpers/url_helpers.php';
    require_once 'helpers/session_helper.php';
    // libraries autoloader
    spl_autoload_register(function ($className) {
        require_once 'libraries/'.$className.'.php';
    });
    // require_once 'libraries/Core.php';
    // require_once 'libraries/Controller.php';
    // require_once 'libraries/Database.php';
