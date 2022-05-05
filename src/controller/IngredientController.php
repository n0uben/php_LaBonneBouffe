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
    public static function show(string $id): void
    {
        $manager = new IngredientManager();
        $ingredient = $manager->getOne(intval($id), IngredientController::$tableName);

        require_once './src/view/ingredients/show-ingredients.php';
    }
}