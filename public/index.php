<?php

    // require_once(dirname(__FILE__, 2) . '/src/config/config.php');
    require_once(dirname(__FILE__, 2) . '/src/config/config.php');


    // echo 'UPLOAD_PATH ->' . UPLOAD_PATH .'<br>';
    // echo 'UPLOAD_PATH1 ->' . UPLOAD_PATH1 .'<br>';
    // die;
    

    $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    if($uri === '/' || $uri === '' ||  $uri === '/index.php') {
        //$uri = '/login.php';
        // $uri = '/splash.php';
        $uri = '/day_records.php';
    }
    
    require_once(CONTROLLER_PATH . "/{$uri}");
