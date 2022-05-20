<?php

require_once './config.php';

class DbManager
{
    public PDO $bdd;

    public function __construct()
    {
        $this->bdd = $this->DBConnect();
    }

    /**
     * @return PDO
     */
    public function DBConnect(): PDO
    {
        return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
    }
}