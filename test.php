<?php
require_once './src/model/entity/Ingredient.php';
require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/IngredientManager.php';
require_once './config.php';

$manager = new IngredientManager();

$ingredients = $manager->getAllByRecipe(1);

foreach ($ingredients as $ingredient) {
    $ingredient1 = $ingredient[0];
    $quantite = $ingredient[1];

    echo "il faut ". $quantite . ' ' . $ingredient1->getUniteMesure() . " de " . $ingredient1->getNom();
    echo "<br>";
}

