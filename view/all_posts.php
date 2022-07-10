<?php


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