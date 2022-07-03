<?php

namespace model;

class User
{
    public $age;
    public $name;
    public $login;
    public $password;
    public $confirmPassword;
    public $gender;
    public $passwordLength;

    public function __construct($post)
    {
        $this->password = $post['password'];
        $this->confirmPassword = $post['confirmPassword'];
        $this->age = $post['age'];
        $this->name = $post['name'];
        $this->login = $post['login'];
        $this->gender = $post['gender'];

        $this->passwordLength = strlen($this->password);
    }
    public function isConfirmValid()
    {
        if ($this->password == $this->confirmPassword) {
            return true;
        } else {
            return false;
        }
    }

    public function isPasswordValid()
    {
        if ($this->passwordLength >= 6) {
            return true;
        } else {
            return false;
        }
    }

    public function isAgeValid()
    {
        if ($this->age >= 18) {
            return true;
        } else {
            return false;
        }
    }

    public function save()
    {
        $db = new Database();

        $sql = 'INSERT INTO user (password, login, name, age, gender) VALUES (:password, :login, :name, :age, :gender)';
        $stmt = $db->dbh->prepare($sql);
        $result = $stmt->execute([
            'login' => $this->login,
            'name' => $this->name,
            'password' => $this->password,
            'age' => $this->age,
            'gender' => $this->gender,
        ]);
    }

}
