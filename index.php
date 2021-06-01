<?php
    // difine the root of server
    define('ROOT', $_SERVER['DOCUMENT_ROOT']);
    require_once (ROOT.'/abstract/Controller.class.php');
    require_once (ROOT.'/abstract/Model.class.php');
    // get the url of the page
    $uri = $_SERVER['REQUEST_URI'];
    // cut the url and put it into an array
    $path = explode( '/' , $uri);
    // take the first parameter if exist
    if($path[1] != 0){
        $class = ucfirst($path[1]);
        // take the second parameter if exist
        $method = isset($path[2]) ? $path[2] : 'index';
        // check if the class exist  
        if(file_exists(ROOT.'/controller/'.$class.'.class.php')){
            // load our controller file   
            require_once (ROOT.'/controller/'.$class.'.class.php');
            // instantiation the class
            $class = new $class;
            // Checks if the class method exists
            if(method_exists($class , $method)){
                // call the class method
                $class->$method();
            }
        } else {
            // Set the HTTP response code(404)
            http_response_code (404);
            // redirect to error page 404
            header('Location:');
        }
    } else {
        require_once (ROOT.'/controller/Home.class.php');
        $home->$index();
    }
