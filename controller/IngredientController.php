<?php
require_once './model/manager/IngredientManager.php';

class IngredientController
{
    public static function index() {
        $manager = new IngredientManager();
        $ingredients = $manager->getAll();

        require_once '../views/liste-ingredients.php';

    }
}