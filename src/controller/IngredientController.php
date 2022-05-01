<?php
require_once './src/model/manager/IngredientManager.php';

class IngredientController
{
    /**
     * @return void
     */
    public static function index(): void
    {
        $manager = new IngredientManager();
        $ingredients = $manager->getAll();

        require_once './src/view/ingredients/liste-ingredients.php';

    }

    /**
     * @param string $id
     * @return void
     */
    public static function show(string $id): void
    {
        $manager = new IngredientManager();
        $ingredient = $manager->getById(intval($id));

        require_once './src/view/ingredients/show-ingredients.php';
    }
}