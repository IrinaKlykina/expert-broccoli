<?php

namespace controller;

use PDO;
use model\Database;
class PostController
{

    public function indexAct()
    {
        require_once 'model/Post.php';

        if (!empty ($_POST)) {
            include(__DIR__ . '/../view/index.html');
        }
        $db = new \model\Database();
        $data = $db->getAllPosts();

        $post = new \model\Post($_POST);

        if ($post->isNumberOfLetters() && $post->isNumberValid()) {

            $sql = 'INSERT INTO my_post (headline, body) VALUES (:headline, :body)';
            $stmt = $db->dbh->prepare($sql);
            $result = $stmt->execute([
                'headline' => $post->headline,
                'body' => $post->body,
            ]);
            print "Ваш пост сохранен";
        } else {
            if (!$post->isNumberValid()) {
                echo "Заголовок должен быть больше 2 символов";
            }
            if (!$post->isNumberValid()) {
                echo "Заголовок должен быть меньше 50 символов";
            }
            if (!$post->isNumberOfLetters()) {
                echo "Текст поста должен быть больше 10 символов";
            }
            if (!$post->isNumberOfLetters()) {
                echo "Текст поста должен быть меньше 250 символов";
            }
        }
    }
}