<?php

class Manager
{
    protected function DBConnect(){
        $bdd = new PDO('mysql:host=localhost;dbname=LaBonneBouffeNoureuxGerber;charset=utf8', 'benjamin', 'password');
        return $bdd;
    }
}