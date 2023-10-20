<?php

use App\Router;

// Router::get('/hello', function(){
//     echo 'Hello world!';
// });

Router::get('/', 'App\Controllers\Homecontroller@index');
Router::get('home', 'App\Controllers\Homecontroller@index');
Router::get("/login", "App\Controllers\Auth\LoginController@showLoginFrom");
Router::post("/login", "App\Controllers\Auth\LoginController@login");

Router::error(function(){
    echo '404 :: Page Not Found';
});