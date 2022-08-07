<?php

namespace model;

use PDO;

/**
 * Класс - первичная обертка над базой
 */
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
}
