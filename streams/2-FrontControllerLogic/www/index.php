<?php

require_once __DIR__ . '/../vendor/autoload.php';

/*
$controller = new \Blog\Controllers\MainController();

if(! empty($_GET['name']))
{
    $controller->sayHello($_GET['name']);
}else{
    $controller->main();
}

======================================
dump($_GET['route']);
dump($_SERVER['REQUEST_URI']);
debug($_SERVER, true);

======================================
$route = $_GET['route'] ?? '';
$pattern = '~^hello/(.*)$~';
preg_match($pattern, $route, $matches);

dump($matches);
*/


/**
 * Matches parameters
 * call method sayHello()
*/
$request = new \Framework\Http\Request();
$route = $request->getPath();
$pattern = '~^hello/(.*)$~';
preg_match($pattern, $route, $matches);

if(!empty($matches))
{
    $controller = new \Blog\Controllers\MainController();
    $controller->sayHello($matches[1]);
    return;
}



/**
 * Matches parameters
 * call method main()
 */
$pattern = '~^$~';
preg_match($pattern, $route, $matches);

if(!empty($matches))
{
    $controller = new \Blog\Controllers\MainController();
    $controller->main();
    return;
}

echo 'Страница не найдена';
