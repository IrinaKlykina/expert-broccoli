<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require_once (__DIR__ . '/model/Database.php');
require_once (__DIR__ . '/controller/RegistrationController.php');
require_once (__DIR__ . '/controller/PostController.php');

$registrationController = new \controller\RegistrationController();
$registrationController->indexAction();

$PostController = new \controller\PostController();
$PostController->indexAct();


//MVC - модель, вьюшка, контроллер






