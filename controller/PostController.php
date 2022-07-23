<?php

namespace controller;

use PDO;
use model\Database;
class PostController
{

    public function createAction()
    {
        require_once 'model/Post.php';

        if (!empty ($_POST)) {
            include(__DIR__ . '/../view/postCreate.html');
        }
        $db = new \model\Database();
        $data = $db->getAllPosts();

        $post = new \model\Post($_POST);

        if ($post->isNumberOfLetters() && $post->isNumberValid()) {


            $result = $post->temp();
            if ($result) {
                $this->indexAction();
           //  to do убрать индекс - echo 'Ваш пост сохранен';
            } else {
                echo 'Ошибка сохранения в бд';
            }
        } else {
            if (!$post->isNumberValid()) {
                echo 'Заголовок должен быть больше 2 символов';
            }
            if (!$post->isNumberValid()) {
                echo 'Заголовок должен быть меньше 50 символов';
            }
            if (!$post->isNumberOfLetters()) {
                echo 'Текст поста должен быть больше 10 символов';
            }
            if (!$post->isNumberOfLetters()) {
                echo 'Текст поста должен быть меньше 250 символов';
            }
        }
    }

    public function indexAction()
    {
        require_once  __DIR__. "/../model/Database.php";

        $db = new \model\Database();
        $db ->getAllPosts();

        $post = $db->getAllPosts();

        foreach ($post as $key => $result) {
            echo '<pre>';
            echo $result ['login'];
            echo $result ['headline'];
            echo $result ['body'];
            echo '</pre>';
        }
    }
}