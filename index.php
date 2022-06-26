<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once __DIR__ . '/components/Router.php';

$router = new \components\Router();
$router->run();

require_once __DIR__ . '/components/autoload.php';