<?php

class NotFoundController extends AbstractController{

    public function index(){
        $this->view('404');
    }

}