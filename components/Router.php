<?php

class Router
{
    private $routes;

    public function __constructor(){
        $routesPath = '/config/routes.php';
        $this->routes = include ($routesPath);
    }
    public function run() {

    }
}