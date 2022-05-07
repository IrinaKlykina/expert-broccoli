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
        }
        $db = new \model\Database();
        $sth = $db->dbh->prepare('SELECT * from user');
        $sth->execute();
        $data = $sth->fetchAll();

        $user = new \model\User($_POST);

        if ($user->isPasswordBig() && $user->isAgeBig() && $user->password == $user->confirmPassword) {
            $sql = 'INSERT INTO user (password, login, name, age, gender) VALUES (:password, :login, :name, :age, :gender)';
            $stmt = $db->dbh->prepare($sql);
            $result = $stmt->execute([
                'login' => $user->login,
                'name' => $user->name,
                'password' => $user->password,
                'age' => $user->age,
                'gender' => $user->gender,
            ]);
        } else {
            if (!$user->isPasswordSmall()) {
                echo "Пароль должен быть минимум 6 символов";
            }
            if (!$user->isPasswordSmall() || $user->password !== $user->confirmPassword) {
                include(__DIR__ . '/../view/reg_form.html');
            }
            if ($user->isAgeSmall()) {
                echo "Сюда нельзя!";
            }
            if ($user->password !== $user->confirmPassword) {
                echo "Введенные пароли не совпадают!";
            }
        }

    }
}