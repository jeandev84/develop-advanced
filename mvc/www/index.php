<?php

require_once __DIR__.'/../vendor/autoload.php';

$controller = new \Blog\Controllers\MainController();

if(! empty($_GET['name']))
{
    $controller->sayHello($_GET['name']);
}else{
    $controller->main();
}