<?php
require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/RecetteManager.php';
require_once './config.php';

$manager = new RecetteManager();

$recettes = $manager->getAllByRegion(1);

foreach ($recettes as $recette) {
    echo $recette->getNom();
    echo '<br>';
}

var_dump($recettes);