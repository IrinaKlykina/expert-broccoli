<?php

namespace model;

use PDO;

class Database
{
    public $dbh;
    public $dsn;

    public function __construct()
    {
        $config = include __DIR__ . '/../config/db.php';
        $this->dsn = $config['db'] . ':host=' . $config['host'] . ';dbname=' . $config['dbname'];
        $this->dbh = new PDO($this->dsn, $config['user'], $config['password']);
    }

    /* public function getAllPosts()
     {

         $sth = $this->dbh->prepare('SELECT * from my_post join user on my_post.author_id=user.id ORDER BY my_post.id DESC');
         $sth->execute();
         $data = $sth->fetchAll();

         return $data;
     }*/
}

