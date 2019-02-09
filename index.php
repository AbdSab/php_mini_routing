<?php
/**
 * 
 */
require 'files/autoloader.php';


$url = $_GET["route"];

if($config["autoroute"]){
    searchController($url);
}else{
    searchByRoute($url);
}
