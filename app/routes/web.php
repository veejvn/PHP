<?php

use App\Router;

// Router::get('/hello', function(){
//     echo 'Hello world!';
// });

Router::get('/', 'App\Controllers\Homecontroller@index');
Router::get('home', 'App\Controllers\Homecontroller@index');

Router::error(function(){
    echo '404 :: Page Not Found';
});