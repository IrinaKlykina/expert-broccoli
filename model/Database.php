<?php
namespace model;

class Database
{
    public function getAllPosts()
    {
        $dbh = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $sth = $dbh->prepare('SELECT * from my_post');
        $sth->execute();
        $data = $sth->fetchAll();

        return $data;
    }
}

