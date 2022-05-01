<?php

require_once './src/model/manager/RecetteManager.php';

class RecetteController
{
    public static function index() {
        $manager = new RecetteManager();
        $recettes = $manager->getAll();

        require_once './src/views/recettes/liste-recettes.php';

    }
}