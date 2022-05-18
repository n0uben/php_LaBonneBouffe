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

    /**
     * @param string $id
     * @return void
     */
    public static function edit(string $id): void
    {
        $recetteManager = new RecetteManager();
        $ingredientManager = new IngredientManager();
        $utilisateurManager = new UtilisateurManager();
        $regionManager = new RegionManager();

        $recette = $recetteManager->getOne(intval($id), RecetteController::$tableName);
        $enumCateg = $recetteManager->getEnumValues('Recette', 'categorie');
        $enumNiveau = $recetteManager->getEnumValues('Recette', 'niveau');
        $enumBudget = $recetteManager->getEnumValues('Recette', 'budget');

        //Retourne un array sous la forme [[ingredient1, quantite (int)], [ingredient2, quantite (int)]]
        $ingredients = $ingredientManager->getAllByRecipe($id);
        $enumUnite = $ingredientManager->getEnumValues('Ingredient', 'uniteMesure');

        $region = $regionManager->getOne($recette->getRegionID(), 'Region');
        $regions = $regionManager->getAll('Region');

        $utilisateur = $utilisateurManager->getOne($recette->getUtilisateurID(), 'Utilisateur');
        $utilisateurs = $utilisateurManager->getAll('Utilisateur');

        require_once './src/view/recettes/edit-recette.php';

    }

    /**
     * @param string $id
     * @return void
     */
    public static function delete(string $id): void
    {
        $manager = new RecetteManager();

        $recetteAsuppr = $manager->getOne($id, RecetteController::$tableName);

        if ($recetteAsuppr) {
            $manager->delete($id, RecetteController::$tableName);
        }

        header('Location: ./index.php?p=recette');

    }
}