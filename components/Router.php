<?php

namespace components;

use controller\AboutController;
use controller\CommentController;
use controller\PostController;
use controller\RegistrationController;

class Router
{
    public $routes;
    public $action;

    public function __construct()
    {

       /* //todo: написать автозагрузчик
        require_once(__DIR__ . '/../model/Database.php');
        require_once(__DIR__ . '/../controller/RegistrationController.php');
        require_once(__DIR__ . '/../controller/PostController.php');
        require_once(__DIR__ . '/../controller/AboutController.php');
        require_once(__DIR__ . '/../controller/CommentController.php');
        require_once(__DIR__ . '/../controller/ProfileController.php');*/


        if (!empty($_POST['action'])) {
            $this->action = $_POST['action'];
        } else {
            $this->action = 'registration';
        }

        $this->routes = [
            'registration' => new RegistrationController(),
            'post' => new PostController(),
            'about' => new AboutController(),
        ];
    }

    public function run()
    {
        foreach ($this->routes as $kye => $controller) {
            if ($this->action == $kye) {
                $controller->indexAction();
            }
        }
//
//        switch ($action) {
//            case 'registration';
//                $registrationController->indexAction();
//                break;
//            case 'post';
//                $postController->indexAction();
//                break;
//            case 'about';
//                $aboutController->indexAction();
//                break;
//            case 'comment';
//                $commentController->indexAction();
//                break;
//            case 'profile';
//                $profileController->indexAction();
//                break;
//        }
    }
}