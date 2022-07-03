<?php


    require_once  __DIR__. "/../model/Database.php";

    $db = new \model\Database();
    $db ->getAllPosts();

    $post = $db->getAllPosts();
echo '<pre>';
        var_dump($post);
echo '</pre>';

    foreach ($post as $result) {
        $headline[] = array('headline' -> $result ['headline']);
    }