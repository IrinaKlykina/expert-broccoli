<?php
namespace model;

use PDO;


class Database
{
    public $dbh;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    }

    public function getAllPosts()
    {

        $sth = $this->dbh->prepare('SELECT * from my_post');
        $sth->execute();
        $data = $sth->fetchAll();

        return $data;
    }
}

