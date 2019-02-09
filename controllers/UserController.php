<?php

class UserController extends AbstractController{

    public function index(){
        $this->view('home', ['controller' => 'User', 'parameter' => 'index']);
    }

    public function profile(){
        $this->view('home', ['controller' => 'User', 'parameter' => 'profile']);
    }

}