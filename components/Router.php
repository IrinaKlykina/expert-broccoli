<?php

namespace components;

use controller\AboutController;
use controller\CommentController;
use controller\PostController;
use controller\UserController;

class Router
{
    public $routes;
    public $action;

    public function __construct()
    {
        if (!empty($_POST['action'])) {
            $this->action = $_POST['action'];
        } else {
            $this->action = 'registration';
        }
        $this->action = 'post/create';
        $this->routes = [
            'registration' => new UserController(),
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
    }
}