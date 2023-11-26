<?php

define("BASE_PATH", __DIR__);
define('ENCRYPTION_KEY', '!@@#%_my_serect_key_for_encryption_@#$!&');

// nạp tập tin autoload được tạo bởi Composer 
require "../vendor/autoload.php";

// init config pakage và tự động load tát cả các tập tin trong thư mục /config
use Illuminate\Config\Repository;

$configPath = BASE_PATH . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR;

$config = new Repository();

foreach(glob($configPath . "*.php") as $phpFile){
    $config->set(
        basename($phpFile, '.php'),
        require_once "$phpFile"
    );
}
//start request handler
$request = \App\Http\Request::createFromGlobals();

//start Symfony Session Manager
$session = new \App\Http\Session\Session();
$session->start();

//nạp các tập tin route trong thư mục /routes
$routesPath = BASE_PATH . DIRECTORY_SEPARATOR . "routes" . DIRECTORY_SEPARATOR;
foreach(glob($routesPath . "*.php") as $phpFile){
    require_once "$phpFile";
}

// Khởi tạo thư viện Iluminate Database
$dbConfig = $config->get("app.db");
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection($dbConfig);
$capsule->setAsGlobal();
$capsule->bootEloquent();