<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once (__DIR__ . '/model/Database.php');
require_once (__DIR__ . '/controller/RegistrationController.php');
require_once (__DIR__ . '/controller/PostController.php');

$PostController = new \controller\PostController();
$registrationController = new \controller\RegistrationController();

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'registration';
}

if ($action == 'post') {
    $PostController->indexAct();
} elseif ($action == 'registration') {
    $registrationController->indexAction();
}


