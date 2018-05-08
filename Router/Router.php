<?php
/**
 * Created by PhpStorm.
 * User: jreche
 * Date: 5/7/18
 * Time: 10:44 AM
 */

namespace Router;

/**
 * Router for very simple urls
 * @package Router
 */
class Router
{
    /**
     * @var string $method
     */
    protected $method;

    /**
     * @var string $route
     */
    protected $route;

    /**
     * @var string $params
     */
    protected $params;

    /**
     * @var \stdClass[] $bindings
     */
    protected $bindings;


    /**
     * Router constructor.
     * @param $method
     * @param $route
     * @param $params
     */
    public function __construct(string $method, string $route, array $params)
    {
        $this->method = $method;
        $this->route = $route;
        $this->params = $params;
    }

    /**
     * @param string $method
     * @param string $route
     * @param $controller
     */
    public function bind(string $method, string $route, $controller)
    {
        $function_name = $this->getFunctionName($method, $route);
        $this->bindings[$function_name] = $controller;
    }

    protected function getFunctionName(string $method, string $route)
    {
        return strtolower($method) . ucfirst($route);
    }

    /**
     * Resolve the url
     */
    public function resolve()
    {
        $function_name = $this->getFunctionName($this->method, $this->route);
        if (!isset($this->bindings[$function_name])) {
            throw new \Exception("No binding found for method:" . strtoupper($this->method) . " and route " . $this->route);
        }

        $class = $this->bindings[$function_name];

        if (!method_exists($class, $function_name)) {
            throw new \Exception("Method " . $function_name . " not found in the class specified");
        }
        
        return $class->$function_name();
    }

}