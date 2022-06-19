<?php

namespace components;

class Router
{
    public function run()
    {
        //todo: написать автозагрузчик
        require_once (__DIR__ . '/../model/Database.php');
        require_once (__DIR__ . '/../controller/RegistrationController.php');
        require_once (__DIR__ . '/../controller/PostController.php');

        $PostController = new \controller\PostController();
        $registrationController = new \controller\RegistrationController();

        if (!empty($_POST['action'])) {
            $action = $_POST['action'];
        } else {
            $action = 'registration';
        }


        if ($action == 'post') {
            $PostController->indexAction();
        } elseif ($action == 'registration') {
            $registrationController->indexAction();
        }
    }
}