<?php

namespace App\app;

use App\app\Request;

$a = 10;
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
        $handler = static::$routes[$method][$path] ?? false;
        if (!$handler) {
            http_response_code(404);
            die("404 Not Found");
        }
        if (is_array($handler)) {
            $controller = $handler[0];
            $method = $handler[1];
        } else {
            list($controller, $method) = explode('@', $handler);
        }

        $controller = $controller;
        $controllerInstance = new $controller;
        echo call_user_func([$controllerInstance, $method], $this->request);
    }
}
