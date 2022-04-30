<?php

require_once ('./templates/header.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './controller/IngredientController.php';

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

IngredientController::index();

require_once ('./templates/footer.php');





