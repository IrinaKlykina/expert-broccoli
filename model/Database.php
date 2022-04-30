<?php
namespace model;

use PDO;


class Database
{
    public $dbh;
    public $stmt;

    public function __construct()
    {
       $this->dbh= new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $this->stmt = $this->dbh->prepare('SELECT * from my_post');
    }

    public function getAllPosts()
    {

        $this->stmt->execute();
        $data = $this->stmt->fetchAll();

        return $data;
    }
}

