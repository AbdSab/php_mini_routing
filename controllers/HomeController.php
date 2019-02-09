<?php

class Home extends Controller{

    public function index(){
        $this->view('home', ['controller' => 'Index', 'parameter' => 'index']);
    }

    public function aboutus(){
        echo "aboutus";
    }


}