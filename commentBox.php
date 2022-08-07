<?php

namespace model;

class commentBox
    public function temp()
{
        include '/../view/userComment.php';

        $userName = $_POST['userName'];
        $textComment = $_POST['textComment'];

        $db = new Database();

        $sql = 'INSERT INTO commentbox (userName,textComment) VALUES (:userName :textComment	)';
        $stmt = $db->dbh->prepare($sql);
        $test = $stmt->execute([
            'userName' => userName,
            'textComment' => textComment,
        ]);

        return $test;
    }
}