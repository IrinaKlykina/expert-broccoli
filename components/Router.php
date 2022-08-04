<?php

namespace components;

use controller\PostController;
use controller\UserController;

/**
 * Класс- маршрутизатор
 */
class Router
{
    /**
     * @var mixed|string
     */
    public $action;

    public function __construct()
    {
        if (!empty($_POST['action'])) {
            $this->action = $_POST['action'];
        } else {
            $this->action = 'user/registration';
        }
    }

    /**
     * Основной метод. который запускает экшены
     * @return void
     */
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