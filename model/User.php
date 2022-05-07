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

    public function isPasswordBig()
    {
        if ($this->passwordLength >= 6) {
            return true;
        } else {
            return false;
        }
    }

    public function isPasswordSmall()
    {
        if ($this->passwordLength < 6) {
            return true;
        } else {
            return false;
        }
    }

    public function isAgeBig()
    {
        if ($this->age >= 18) {
            return true;
        } else {
            return false;
        }
    }

    public function isAgeSmall()
    {
        if ($this->age < 18) {
            return true;
        } else {
            return false;
        }
    }

}
