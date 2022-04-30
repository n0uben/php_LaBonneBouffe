<?php
require_once './model/manager/IngredientManager.php';

class IngredientController
{
    public static function index() {
        $manager = new IngredientManager();
        $ingredients = $manager->getAll();

        require_once './views/Backend/liste-ingredients.php';

    }
}