<?php

namespace controller;

use PDO;
use model\Database;

class RegistrationController
{
    public function indexAction()
    {
        require_once 'model/User.php';

        if (empty($_POST)) {
            include(__DIR__ . '/../view/reg_form.html');
        } else {
            $user = new \model\User($_POST);

            if ($user->isPasswordValid() && $user->isAgeValid() && $user->isConfirmValid()) {
                $user->save();
                print "Пользователь зарегистрирован";
                //todo: возможно, тут плохо. Исправить
                include __DIR__ . '/../view/index.html';

            } else {
                if (!$user->isPasswordValid()) {
                    echo "Пароль должен быть минимум 6 символов";
                }
                if (!$user->isPasswordValid() || !$user->isConfirmValid()) {
                    include(__DIR__ . '/../view/reg_form.html');
                }
                if (!$user->isAgeValid()) {
                    echo "Сюда нельзя!";
                }
                if (!$user->isConfirmValid()) {
                    echo "Введенные пароли не совпадают!";
                }
            }
        }
    }
}