<?php
/**
 * 
 */
require 'files/autoloader.php';


$url        = explode("/", $_GET["route"]);
$controller = (ucfirst($url[0]) == '')?"Index":ucfirst($url[0]);
$parameter  = !isset(array_slice($url, 1)[0])?'index':(array_slice($url, 1)[0] == '')?"index":array_slice($url, 1)[0];
$args       = !isset(array_slice($url, 2)[0])?[]:(array_slice($url, 2)[0] == '')?[]:array_slice($url, 2);

/*
echo "Controller : " ; var_dump($controller);
echo "Parameter : "; var_dump($parameter);
echo "Args : "; var_dump($args);
*/

try{

    $controller .= "Controller";
    $c = new $controller();
    $c->{$parameter}(...$args);

}catch(Error $c){

    if ($config['debug']) die($c);
    else {
        $c = new NotFoundController();
        $c->index();
    }

}
