<?php

class IndexController extends AbstractController{

    public function index(){
        $this->view('home', ['controller' => 'Index', 'parameter' => 'index']);
    }

    public function aboutus(){
        echo "aboutus";
    }


}