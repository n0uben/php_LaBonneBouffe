<?php

class Manager
{
    private function DBConnect(){

        $bdd = new PDO('mysql:host=localhost;dbname=LaBonneBouffeNoureuxGerber;charset=utf8', 'root', '');
        return $bdd;
    }
}