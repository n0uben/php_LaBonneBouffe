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

        require_once './src/view/recettes/liste-recettes.php';

    }
    public static function show(string $id): void
    {
        $manager = new RecetteManager();
        $recette = $manager->getOne(intval($id));

        require_once './src/view/recettes/show-recettes.php';

    }
}