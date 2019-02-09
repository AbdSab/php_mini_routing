<?php
use BC\Blade\Blade;

abstract class Controller{
    protected $blade;

    public function __construct(){
        $this->blade = new Blade(__DIR__ . '/../../views', __DIR__ . '/../cache');
    }

    public function view($view,$args=[]){
        echo $this->blade->make($view, $args)->render();
    }
}