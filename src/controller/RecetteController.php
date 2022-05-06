<?php

require_once './src/model/manager/RecetteManager.php';

class RecetteController
{
    private static string $tableName = 'Recette';
    /**
     * @return void
     */
    public static function index(): void
    {
        $manager = new RecetteManager();
        $recettes = $manager->getAll(RecetteController::$tableName);

        require_once './src/view/recettes/liste-recettes.php';

    }
    public static function edit(string $id): void
    {
        $manager = new RecetteManager();
        $recette = $manager->getOne(intval($id), RecetteController::$tableName);

        require_once './src/view/recettes/edit-recette.php';

    }
}