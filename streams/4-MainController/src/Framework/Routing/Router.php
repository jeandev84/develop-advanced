<?php
namespace Framework\Routing;

/**
 * Class Router
 * @package Framework\Routing
 */
class Router
{

    /** @var array */
    private $routes;


    /**
     * Router constructor.
     * @param array $routes
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }


    /**
     * Get Matching Route
     * @param string $route
     * @return array|bool
     */
    public function match(string $route)
    {
        foreach($this->routes as $path => $controllerAndAction)
        {
            $pattern = '~^'. trim($path, '/') . '$~';

            if(preg_match($pattern, $route, $matches))
            {
                unset($matches[0]);
                return [
                   'controller' => $controllerAndAction[0],
                   'action'     => $controllerAndAction[1],
                   'arguments'  => $matches
                ];
            }
        }

        return false;
    }


    /**
     * Call action
     * @param object $controller
     * @param string $action
     * @param array $arguments
     * @return bool
     */
    public function callAction(object $controller, string $action, $arguments = [])
    {
        if(! method_exists($controller, $action))
        {
             return false;
        }
        call_user_func_array([$controller, $action], $arguments);
    }
}