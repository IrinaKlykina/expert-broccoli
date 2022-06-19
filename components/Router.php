<?php

namespace components;

class Router
{
    public function run()
    {
        //todo: написать автозагрузчик
        require_once(__DIR__ . '/../model/Database.php');
        require_once(__DIR__ . '/../controller/RegistrationController.php');
        require_once(__DIR__ . '/../controller/PostController.php');

        $PostController = new \controller\PostController();
        $registrationController = new \controller\RegistrationController();
        $aboutController = new \controller\AboutController();
        $commentController = new \controller\CommentController();
        $profileController = new \controller\ProfileController();


        if (!empty($_POST['action'])) {
            $action = $_POST['action'];
        } else {
            $action = 'registration';
        }
    }

    public function action()
    {
        $action ==
        if ($action == 'post') {
            $PostController->indexAction();
        } elseif ($action == 'registration') {
            $registrationController->indexAction();
        }

        if ($action == 'about') {
            $PostController->indexAction();
        } elseif ($action == 'registration') {
            $registrationController->indexAction();
        }

        if ($action == 'comment') {
            $PostController->indexAction();
        } elseif ($action == 'registration') {
            $registrationController->indexAction();
        }

        if ($action == 'profile') {
            $PostController->indexAction();
        } elseif ($action == 'registration') {
            $registrationController->indexAction();
        }
    }
}