<?php

namespace controller;

use PDO;
use model\Database;

class UserController
{
    public function registrationAction()
    {
        if (empty($_POST)) {
            include(__DIR__ . '/../view/userRegistration.html');
        } else {
            $user = new \model\User($_POST);

            if ($user->isPasswordValid() && $user->isAgeValid() && $user->isConfirmValid()) {
                $user->save();
                print "Пользователь зарегистрирован";
                //todo: возможно, тут плохо. Исправить
                include __DIR__ . '/../view/postCreate.html';

            } else {
                if (!$user->isPasswordValid()) {
                    echo "Пароль должен быть минимум 6 символов";
                }
                if (!$user->isPasswordValid() || !$user->isConfirmValid()) {
                    include(__DIR__ . '/../view/userRegistration.html');
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