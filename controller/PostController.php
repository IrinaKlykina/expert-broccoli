<?php

namespace controller;

use model\Post;

class PostController
{
    /**
     * @return void
     */
    public function createAction()
    {
        if (!empty ($_POST)) {
            include_once __DIR__ . '/../view/postCreate.php';
        }
        $post = new Post($_POST);

        if ($post->isNumberOfLetters() && $post->isNumberValid()) {
            $result = $post->save();
            if ($result) {
                $this->indexAction();
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
    /**
     * @return void
     */
    public function indexAction()
    {
        $posts = Post::getAllPosts();
        require_once __DIR__ . '/../view/postIndex.php';
    }
}