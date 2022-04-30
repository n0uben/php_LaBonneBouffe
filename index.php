<?php

require_once('./views/header.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$page = '';

if (isset($_GET['p'])) {
    $page = htmlentities($_GET['p']);
}

switch ($page) {
    case 'liste-ingredients':
        require_once './controller/IngredientController.php';
        IngredientController::index();
        break;
    default:
        require_once './controller/IngredientController.php';
        IngredientController::index();
}


require_once('./views/footer.php');





