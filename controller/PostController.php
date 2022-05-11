<?php

namespace controller;

use PDO;
use model\Database;
class PostController
{

    public function indexAct()
    {
        require_once 'model/Publish.php';

        if (!empty ($_POST)) {
            include(__DIR__ . '/view/index.html');
        }
        $db = new \model\Database();
        $data = $db->getAllPosts();

        if ($publish->isNumberOfLetters() && $publish->isNumberValid()) {

            $sql = 'INSERT INTO my_post (headline, body) VALUES (:headline, :body)';
            $stmt = $db->dbh->prepare($sql);
            $result = $stmt->execute([
                'headline' => $publish->headline,
                'body' => $publish->body,
            ]);
            print "Ваш пост сохранен";
        } else {
            if (!$publish->isNumberValid()) {
                echo "Заголовок должен быть больше 2 символов";
            }
            if (!$publish->isNumberValid()) {
                echo "Заголовок должен быть меньше 50 символов";
            }
            if (!$publish->isNumberOfLetters()) {
                echo "Текст поста должен быть больше 10 символов";
            }
            if (!$publish->isNumberOfLetters()) {
                echo "Текст поста должен быть меньше 250 символов";
            }
        }
    }
}