<?php

    $routeDir  = __DIR__. "/../controllers/routes.json";

    function searchController($_url){

        $url = explode("/", $_url);
        $controller = (urlToController($url[0]) == '')?"Home":urlToController($url[0]);
        $parameter  = !isset(array_slice($url, 1)[0])?'index':(array_slice($url, 1)[0] == '')?"index":(array_slice($url, 1)[0]);
        $args       = !isset(array_slice($url, 2)[0])?[]:(array_slice($url, 2)[0] == '')?[]:array_slice($url, 2);

        try{
            $c = new $controller();
            $c->{$parameter}(...$args);
        }catch(Error $c){
            try{
                $controllerName = "Home";
                $c = new $controllerName();
                $c->{$controller}();
            }catch(Error $c){
                notFound($c);
            }
        }
    }

    function searchByRoute($url){

        global $routeDir;
        $jsonFile = file_get_contents($routeDir);
        $json = json_decode($jsonFile, true);

        if(isset($json[substr($url, 0, -1)]))
            $route = $json[substr($url, 0, -1)];
        else
            notFound("Url not defined !");

        $route = explode("/",$route);
        $controllerName = $route[0];
        $c = new $controllerName();
        $c->{$route[1]}();
       
    }

    function notFound($error){
        global $config;
        if ($config['debug']) die($error);
        else{
            $c = new NotFound();
            $c->index();
        }
    }
    