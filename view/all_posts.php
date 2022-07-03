<?php


    require_once  __DIR__. "/../model/Database.php";

    $db = new \model\Database();
    $db ->getAllPosts();
    var_dump($db);

    $post = $db->getAllPosts();
    var_dump($post);

    foreach ($post as $result) {
        $headline[] = array('headline' -> $result['headline']);
    }