<?php

namespace controller;

use PDO;
use model\Database;
class PostController
{
    public function isNumberOdLetterNotSmall($numberOfLetters)
    {
        if ($numberOfLetters >= 10) {
            return true;
        } else {
            return false;
        }
    }

    public function isNumberOdLetterNotBig($numberOfLetters)
    {
        if ($numberOfLetters <= 250) {
            return true;
        } else {
            return false;
        }
    }

    public function isNumberBig($number)
    {
        if ($number >= 2) {
            return true;
        } else {
            return false;
        }
    }

    public function isNumberSmall($number)
    {
        if ($number <= 50) {
            return true;
        } else {
            return false;
        }
    }

    public function indexAct()
    {
        if (!isset ($_POST)) {
            include(__DIR__ . '/view/index.html');
        }
        $db = new \model\Database();
        $data = $db->getAllPosts();

        $headline = $_POST['headline'];
        $body = $_POST['body'];

        $number = mb_strlen($headline);
        $numberOfLetters = mb_strlen($body);


        if ($this->isNumberOdLetterNotSmall($numberOfLetters) && $this->isNumberOdLetterNotBig($numberOfLetters) && $this->isNumberBig($number) && $this->isNumberSmall($number)) {

            $sql = 'INSERT INTO my_post (headline, body) VALUES (:headline, :body)';
            $stmt = $db->dbh->prepare($sql);
            $result = $stmt->execute([
                'headline' => $headline,
                'body' => $body,
            ]);
            print "Ваш пост сохранен";
        } else {
            if (!$this->isNumberBig($number)) {
                echo "Заголовок должен быть больше 2 символов";
            }
            if (!$this->isNumberSmall($number)) {
                echo "Заголовок должен быть меньше 50 символов";
            }
            if (!$this->isNumberOdLetterNotSmall($numberOfLetters)) {
                echo "Текст поста должен быть больше 10 символов";
            }
            if (!$this->isNumberOdLetterNotBig($numberOfLetters)) {
                echo "Текст поста должен быть меньше 250 символов";
            }
        }
    }
}