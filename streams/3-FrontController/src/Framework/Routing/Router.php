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


    public function match()
    {

    }


    /**
     * Call action
     * @param $controller
     * @param $action
    */
    public function callAction($controller, $action)
    {

    }
}