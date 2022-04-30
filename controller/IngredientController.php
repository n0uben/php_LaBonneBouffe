<?php
require_once './model/manager/IngredientManager.php';

class IngredientController
{
    public static function index() {
        $manager = new IngredientManager();
        $ingredients = $manager->getAll();

        foreach ($ingredients as $ingredient) {
            echo $ingredient->getNom();
            echo '<br>';
        }
    }
}