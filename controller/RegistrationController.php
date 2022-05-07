<?php

namespace controller;

use PDO;
use model\Database;

class RegistrationController
{
    public function isPasswordBig($number)
    {
        if ($number >= 6) {
            return true;
        } else {
            return false;
        }
    }

    public function isPasswordSmall($number)
    {
        if ($number < 6) {
            return true;
        } else {
            return false;
        }
    }

    public function isAgeBig($user)
    {
        if ($user->age >= 18) {
            return true;
        } else {
            return false;
        }
    }

    public function isAgeSmall($age)
    {
        if ($age < 18) {
            return true;
        } else {
            return false;
        }
    }

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
        $number = strlen($user->password);

        if ($this->isPasswordBig($number) && $this->isAgeBig($user->age) && $user->password == $user->confirmPassword) {
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
            if (!$this->isPasswordSmall($number)) {
                echo "Пароль должен быть минимум 6 символов";
            }
            if (!$this->isPasswordSmall($number) || $user->password !== $user->confirmPassword) {
                include(__DIR__ . '/../view/reg_form.html');
            }
            if (!$this->isAgeSmall ($user->age)) {
                echo "Сюда нельзя!";
            }
            if ($user->password !== $user->confirmPassword) {
                echo "Введенные пароли не совпадают!";
            }
        }

    }
}