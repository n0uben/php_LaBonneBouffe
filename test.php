<?php
require_once './src/model/entity/Ingredient.php';
require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/IngredientManager.php';
require_once './config.php';

$manager = new IngredientManager();

$donnees = ['nom' => 'bavette','uniteMesure' => 'g'];

//$ingredient = new Ingredient('bavette', 'g');
$ingredient = new Ingredient($donnees);
var_dump($ingredient);
echo '<br>';
echo $ingredient->getNom();
echo '<br>';
echo $ingredient->getValuesSQL();
