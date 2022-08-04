<?php

namespace controller;

use model\Database;
use model\Post;

class PostController
{

    public function createAction()
    {
        if (!empty ($_POST)) {
            include(__DIR__ . '/../view/postCreate.html');
        }
        $post = new \model\Post($_POST);

        if ($post->isNumberOfLetters() && $post->isNumberValid()) {


            $result = $post->save();
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
        $posts = Post::getAllPosts();

        foreach ($posts as $post) {
            echo '<pre>';
            echo $post ['login'];
            echo $post ['headline'];
            echo $post ['body'];
            echo '</pre>';
        }
    }
}