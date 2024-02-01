<?php

namespace App\app\routers;

use App\app\routers\Request;

class Router
{
    public static $routes = [];
    public $request;

    public function __construct()
    {
        $this->request = new Request();
    }
    public static function get($path, $handler)
    {
        static::$routes['GET'][$path] = $handler;
    }
    public static function post($path, $handler)
    {
        static::$routes['POST'][$path] = $handler;
    }
    public function getPath()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $basePath = str_replace("Project_Order_Restaurant/src/public/", "/", $path);
        return "/" . ltrim($basePath, "/");
    }
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    public function resolve()
    {
        $path = $this->getPath();
        $method = $this->getMethod();
        $callback = false;
        if (isset(static::$routes[$method][$path])) {
            $callback = static::$routes[$method][$path];
        }
        if ($callback === false) {
            echo "404 FILE NOT found1!";
            return 0;
        }

        if (is_callable($callback)) {
            return $callback();
        }

        if (is_array($callback)) {
            [$class, $action] = $callback;
            $class = new $class;
            return call_user_func([$class, $action], $this->request);
        }
    }
}
