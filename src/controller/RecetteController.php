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
    public static function show(string $id): void
    {
        $manager = new RecetteManager();
        $recette = $manager->getById(intval($id));

        require_once './src/views/recettes/show-recettes.php';

    }
}