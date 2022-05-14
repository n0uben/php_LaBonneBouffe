<?php

require_once './src/model/manager/RecetteManager.php';
require_once './src/model/manager/UtilisateurManager.php';
require_once './src/model/manager/RegionManager.php';
require_once './src/model/manager/IngredientManager.php';

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
        $recetteManager = new RecetteManager();
        $ingredientManager = new IngredientManager();
        $utilisateurManager = new UtilisateurManager();
        $regionManager = new RegionManager();

        $recette = $recetteManager->getOne(intval($id), RecetteController::$tableName);
        $ingredients = $ingredientManager->getAllByRecipe($id);
        $region = $regionManager->getOne($recette->getRegionID(), 'Region');
        $utilisateur = $utilisateurManager->getOne($recette->getUtilisateurID(), 'Utilisateur');

        require_once './src/view/recettes/edit-recette.php';

    }
}