<?php


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