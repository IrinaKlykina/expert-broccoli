<?php

namespace controller;

use PDO;
use model\Database;
class CommentController
{

    public function indexAction()
    {
       global $this->dbh;

       $sth = $this->dbh->prepare('SELECT * from my_post');
       $sth->execute();
       $data = $sth->fetchAll();

       return $data;




}