<?php

namespace App\Controllers;



class HomeController extends BaseController{
    public function index(){
        return $this->render('home/index');
    }
    // public function render($name){
    //     include(__DIR__ . '/../Views/') . $name . '.php';
    // }
    
}