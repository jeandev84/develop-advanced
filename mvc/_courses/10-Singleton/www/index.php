<?php

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Requesting
 * $route = $request->getPath();
 * $route = $request->server('REQUEST_URI');
*/
$request = new \Framework\Http\Request();
$route = $request->getPath();


/**
 * Load routes collection
 * dump($routes)
*/
$routes = require __DIR__ . '/../src/routes.php';


/**
 * Matching route
*/
$isRouteFound = false;

foreach($routes as $path => $controllerAndAction)
{
    $pattern = '~^'. trim($path, '/') . '$~';
    preg_match($pattern, $route, $matches);
    if(!empty($matches))
    {
        $isRouteFound = true;
        break;
    }
}

if(!$isRouteFound)
{
    echo 'Страница не найдена!';
    return;
}

/*
dump($controllerAndAction);
dump($matches);
*/

/**
 * Call Action
*/

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);


# Instance Database
dump(\Framework\Services\Database\Db::getInstancesCount());
