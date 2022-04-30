<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('./model/manager/Manager.php');
require('./model/manager/IngredientManager.php');

$ingredientManager = new IngredientManager();
//
$mesIngredients = $ingredientManager->getAll();

foreach ($mesIngredients as $monIngredient) {
    echo $monIngredient->getNom();
    echo '<br>';
}
echo '<br>';




