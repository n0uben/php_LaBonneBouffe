<?php
require_once './src/model/manager/IngredientManager.php';

class IngredientController
{
    private static string $tableName = 'Ingredient';

    /**
     * @return void
     */
    public static function index(): void
    {
        $manager = new IngredientManager();
        $ingredients = $manager->getAll(IngredientController::$tableName);

        require_once './src/view/ingredients/liste-ingredients.php';

    }

    /**
     * @param string $id
     * @return void
     */
    public static function edit(string $id): void
    {
        $manager = new IngredientManager();
        $ingredient = $manager->getOne(intval($id), IngredientController::$tableName);
        $enumUnite = $manager->getEnumValues('Ingredient', 'uniteMesure');

        //si des donnees sont transmises et ne sont pas vides
        if (isset($_POST) && sizeof($_POST) > 0) {
            $donneesPOST = $_POST;
            //on sanitize les donnees POST
            $nomPOST = htmlentities($donneesPOST['nom']);
            $unitePOST = htmlentities($donneesPOST['uniteMesure']);

            //on enregistre l'ingrédient mis à jour
            $ingredientUpdated = new Ingredient(['id' => $ingredient->getId(), 'nom' => $nomPOST, 'uniteMesure' => $unitePOST]);
            $manager->update($ingredientUpdated);

            //on récupère l'ingrédient à jour depuis la bdd
            $ingredient = $manager->getOne(intval($id), IngredientController::$tableName);
        }

        require_once './src/view/ingredients/edit-ingredient.php';
    }
}