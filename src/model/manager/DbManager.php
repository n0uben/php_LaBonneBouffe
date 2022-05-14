<?php

require_once './config.php';

class DbManager
{
    /**
     * @return PDO
     */
    public static function DBConnect(): PDO
    {
        $bdd = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
        return $bdd;
    }
}