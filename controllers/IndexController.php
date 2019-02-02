<?php

class HelloController{
    public function index($name){
        echo "Hedsllo ".$name;
    }
    public function toto($no){
        include("views/home.php");
    }
}