<?php

class User extends Controller{

    public function index(){
        $this->view('home', ['controller' => 'User', 'parameter' => 'index']);
    }

    public function profile(){
        $this->view('home', ['controller' => 'User', 'parameter' => 'profile']);
    }

}