<?php
require_once './src/model/entity/Ingredient.php';
//require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/IngredientManager.php';
require_once './src/controller/ConnexionController.php';
require_once './src/controller/IngredientController.php';


$mdp = "benjamin";

$hash = password_hash($mdp, PASSWORD_ARGON2I);

var_dump($hash);

//print_r($donnees['Type']);
//
//foreach ($donnees['Type'] as $donnee):
//    print_r($donnee);
//endforeach;


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