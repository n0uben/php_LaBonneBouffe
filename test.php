<?php
require_once './src/model/entity/Ingredient.php';
//require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/IngredientManager.php';
require_once './src/controller/ConnexionController.php';
require_once './config.php';

$manager = new IngredientManager();
$ingredientUpdated = new Ingredient(['id' => 1, 'nom' => 'concombre', 'uniteMesure' => 'g']);
var_dump($ingredientUpdated);

//$manager->update($ingredientUpdated);

//$ingredients = $manager->getAllByRecipe(1);
//
//foreach ($ingredients as $ingredient) {
//    $ingredient1 = $ingredient[0];
//    $quantite = $ingredient[1];
//
//    echo "il faut ". $quantite . ' ' . $ingredient1->getUniteMesure() . " de " . $ingredient1->getNom();
//    echo "<br>";
//}
//$manager = new UtilisateurManager();
//$controller = new ConnexionController();
//
//$controller->connect('benjamin@example.com');