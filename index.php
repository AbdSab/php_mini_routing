<?php

foreach (glob("controllers/*.php") as $controller)
{
    include $controller;
}



$url = explode("/", $_GET["route"]);

$controller = ucfirst($url[0]);
$parameter = array_slice($url, 1)[0];
$args = array_slice($url, 2);

if(!isset($parameter)){
    $parameter = "Index";
}else if($parameter == "" && !isset($args)){
    $parameter = "Index";
}

$controller .= "Controller";
$c = new $controller();
$c->{$parameter}(...$args);