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
            $db = new \model\Database();
            $sth = $db->dbh->prepare('SELECT * from user');
            $sth->execute();
            $data = $sth->fetchAll();

            $user = new \model\User($_POST);

            if ($user->isPasswordValid() && $user->isAgeValid() && $user->isConfirmValid()) {
                $sql = 'INSERT INTO user (password, login, name, age, gender) VALUES (:password, :login, :name, :age, :gender)';
                $stmt = $db->dbh->prepare($sql);
                $result = $stmt->execute([
                    'login' => $user->login,
                    'name' => $user->name,
                    'password' => $user->password,
                    'age' => $user->age,
                    'gender' => $user->gender,
                ]);
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