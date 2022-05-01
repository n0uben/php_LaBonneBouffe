<?php

require_once './src/model/manager/RecetteManager.php';

class RecetteController
{
    /**
     * @return void
     */
    public static function index(): void
    {
        $manager = new RecetteManager();
        $recettes = $manager->getAll();

        require_once './src/views/recettes/liste-recettes.php';

    }
}