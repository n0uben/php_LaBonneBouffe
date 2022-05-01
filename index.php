<?php
define('PATH', $_SERVER['SERVER_NAME']);

require_once('./src/views/general/header.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$page = '';
if (isset($_GET['p'])) {
    $page = htmlentities($_GET['p']);
}

$id = "";
if (isset($_GET['id'])) {
    $id = htmlentities($_GET['id']);
}

switch ($page) {
    case 'liste-ingredients':
        require_once './src/controller/IngredientController.php';
        IngredientController::index();
        break;
    case 'show-ingredients':
        require_once './src/controller/IngredientController.php';
        IngredientController::show($id);
        break;
    case 'liste-utilisateurs':
        require_once './src/controller/UtilisateurController.php';
        UtilisateurController::index();
        break;
    case 'liste-recettes':
        require_once './src/controller/RecetteController.php';
        RecetteController::index();
        break;
    case 'home':
        require_once './src/controller/HomeController.php';
        HomeController::index();
        break;
    default:
        require_once './src/controller/HomeController.php';
        HomeController::index();
}

require_once('./src/views/general/footer.php');