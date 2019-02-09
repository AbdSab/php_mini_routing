<?php
/**
 * 
 */
require 'files/autoloader.php';

function urlToController($url){
    $arr = str_split($url);
    $l = count($arr);
    for($i=0; $i<$l; $i++){
        if($arr[$i] == "-"){
            $arr[$i+1] = ucfirst($arr[$i+1]);
            unset($arr[$i]);
        }
    }
    return ucfirst(implode("",$arr));
}


$url        = explode("/", $_GET["route"]);
$controller = (urlToController($url[0]) == '')?"Index":urlToController($url[0]);
$parameter  = !isset(array_slice($url, 1)[0])?'index':(array_slice($url, 1)[0] == '')?"index":(array_slice($url, 1)[0]);
$args       = !isset(array_slice($url, 2)[0])?[]:(array_slice($url, 2)[0] == '')?[]:array_slice($url, 2);

/*
echo "Controller : " ; var_dump($controller);
echo "Parameter : "; var_dump($parameter);
echo "Args : "; var_dump($args);
*/

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

        if ($config['debug']) die($c);
        else {
            $c = new NotFoundController();
            $c->index();
        }

    }

}
