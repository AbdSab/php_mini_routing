<?php

    $routeDir  = __DIR__. "/../controllers/routes.json";

    function searchController($_url){

        $url = explode("/", $_url);
        $controller = (urlToController($url[0]) == '')?"Index":urlToController($url[0]);
        $parameter  = !isset(array_slice($url, 1)[0])?'index':(array_slice($url, 1)[0] == '')?"index":(array_slice($url, 1)[0]);
        $args       = !isset(array_slice($url, 2)[0])?[]:(array_slice($url, 2)[0] == '')?[]:array_slice($url, 2);

        try{
            $controllerName = $controller."Controller";
            $c = new $controllerName();
            $c->{$parameter}(...$args);
        }catch(Error $c){
            try{
                $controllerName = "IndexController";
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
        $controllerName = $route[0]."Controller";
        $c = new $controllerName();
        $c->{$route[1]}();
       
    }

    function notFound($error){
        global $config;
        if ($config['debug']) die($error);
        else{
            $c = new NotFoundController();
            $c->index();
        }
    }
    