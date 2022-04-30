<?php
require_once './src/model/manager/IngredientManager.php';

class IngredientController
{
    public static function index() {
        $manager = new IngredientManager();
        $ingredients = $manager->getAll();

        require_once './src/views/liste-ingredients.php';

    }
}