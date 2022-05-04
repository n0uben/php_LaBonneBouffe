<?php

class DbManager
{
    /**
     * @return PDO
     */
    public static function DBConnect(): PDO
    {
        $bdd = new PDO('mysql:host=localhost;dbname=LaBonneBouffeNoureuxGerber;charset=utf8', 'benjamin', 'password');
        return $bdd;
    }
}