<?php


require_once __DIR__ . '/../vendor/autoload.php';
require 'functions.php';
require 'config.php';
require 'bootstrap.php';

$routes = require_once 'routes.php';
$url= parse_url($_SERVER['REQUEST_URI']);
$path = $url["path"];



if(!key_exists('path', $url)){
    die("error 404");
}
if(key_exists($path, $routes)) {
    $route = $routes[$path];
    try{
        $route->call();
    } catch (Exception $exception) {
        echo 'Error 404' . $exception->getMessage();
    }
} else {
    redirect("/error");
}

