<?php
require_once './src/model/entity/Ingredient.php';
//require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/IngredientManager.php';
require_once './src/controller/ConnexionController.php';
require_once './src/controller/IngredientController.php';
require_once './src/model/manager/RecetteManager.php';

$recetteManager = new RecetteManager();
$recette = $recetteManager->getWithIngredients(1);
print_r($recette);

foreach ($recette->getIngredients() as $ingredient) {
    echo '<br>';
    print_r($ingredient);
    echo '<br>';
}

//$donnees = [
//    'nom' => 'pates au pesto',
//    'categorie' => 'plat',
//    'niveau' => '1',
//    'tpsPrepa' => '60',
//    'tpsCuisson' => '30',
//    'budget' => 'moyen',
//    'nbPers' => '2',
//    'etapes' => 'faire bouillir l’eau, mettre les pates. une fois cuites, rajouter du pesto',
//    'utilisateurID' => '1',
//    'regionID' => '6',
//];
//
//$ingredient1 = ['nom' => 'pates', 'uniteMesure' => 'g'];
//$ingredient2 = ['nom' => 'pesto', 'uniteMesure' => 'g'];
//$ingredients = [$ingredient1, $ingredient2];
//
//$recette = new Recette($donnees, $ingredients);
//print_r($recette->getIngredients());
//$manager = new RecetteManager();
//$recetteBDD = $manager->createWithIngredients($recette);
//echo $recetteBDD->getId();
////
//$mdp = "benjamin";
//
//$hash = password_hash($mdp, PASSWORD_ARGON2I);
//
//var_dump($hash);



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