<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routePath = ROOT . '/app/etc/config/routes.php';
        $this->routes = include($routePath);
    }

    public function run()
    {
//        if(!empty($_SERVER['REQUEST_URI'])){
//            $uri = trim($_SERVER['REQUEST_URI'], '/');
//        }
        var_dump($_SERVER['REQUEST_URI']);
    }
}