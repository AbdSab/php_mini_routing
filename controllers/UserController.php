<?php

class UserController extends AbstractController{

    public function index(){
        $this->view('home', ['controller' => 'User', 'parameter' => 'index']);
    }

    public function dodo(){
        $this->view('home', ['controller' => 'User', 'parameter' => 'dodo']);
    }

}