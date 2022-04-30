<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('./model/manager/Manager.php');
require('./model/manager/IngredientManager.php');

$ingredientManager = new IngredientManager();
//
$mesIngredients = $ingredientManager->getAllByRecipeId(1);

foreach ($mesIngredients as $monIngredient) {

    $quantite = $monIngredient[1];
    $monIngredient = $monIngredient[0];

    echo $monIngredient->getNom();
    echo " / ";

    echo $quantite;
    echo $monIngredient->getUniteMesure();
    echo '<br>';
}
echo '<br>';




