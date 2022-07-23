<?php

namespace components;

use controller\AboutController;
use controller\CommentController;
use controller\PostController;
use controller\UserController;

class Router
{
    public $action;

    public function __construct()
    {
        if (!empty($_POST['action'])) {
            $this->action = $_POST['action'];
        } else {
            $this->action = 'user/registration';
        }
    }

    public function run()
    {
        switch ($this->action) {
            case 'user/registration':
                $controller = new UserController();
                $controller->registrationAction();
                break;
            case 'post/create':
                $controller = new PostController();
                $controller->createAction();
                break;
            case 'post/index':
                $controller = new PostController();
                $controller->indexAction();
                break;
        }
    }
}