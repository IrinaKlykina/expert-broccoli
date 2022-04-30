<?php

namespace controller;

class RegistrationController
{
    public function indexAction()
    {
        require_once 'model/User.php';


        if (!isset ($_POST)) {
            include(__DIR__ . '/view/reg_form.html');
        }
        $dbh = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $sth = $dbh->prepare('SELECT * from user');
        $sth->execute();
        $data = $sth->fetchAll();


        $user = new \model\User($_POST);


        $number = strlen($user->password);

        if ($number >= 6 && $user->age >= 18) {
            $sql = 'INSERT INTO user (password, login, name, age, gender) VALUES (:password, :login, :name, :age, :gender)';
            $stmt = $dbh->prepare($sql);
            $result = $stmt->execute([
                'login' => $user->login,
                'name' => $user->name,
                'password' => $user->password,
                'age' => $user->age,
                'gender' => $user->gender,
            ]);
        } else {
            if ($number < 6) {
                echo "Пароль должен быть минимум 6 символов";
            }
            if ($number < 6 || $user->password !== $user->confirmPassword) {
                include(__DIR__ . '/view/reg_form.html');
            }
            if ($user->age < 18) {
                echo "Сюда нельзя!";
            }
            if ($user->password !== $user->confirmPassword) {
                echo "Введенные пароли не совпадают!";
            }
        }

    }
}