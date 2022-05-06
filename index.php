<?php
define('PATH', $_SERVER['SERVER_NAME']);

require_once('./src/view/general/header.php');
require_once('./src/view/general/menu.php');

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
$action = '';
if (isset($_GET['action'])) {
    $action = htmlentities($_GET['action']);
}

switch ($page) {
    case 'ingredient':
        require_once './src/controller/IngredientController.php';
        switch ($action) {
            case 'edit':
                IngredientController::edit($id);
                break;
            default:
                IngredientController::index();
                break;
        }
        break;
    case 'recette':
        require_once './src/controller/RecetteController.php';
        switch ($action) {
            case 'edit':
                RecetteController::edit($id);
                break;
            default:
                RecetteController::index();
                break;
        }
        break;
    case 'utilisateur':
        require_once './src/controller/UtilisateurController.php';
        switch ($action) {
            case 'edit':
                UtilisateurController::edit($id);
                break;
            default:
                UtilisateurController::index();
                break;
        }
        break;
    default:
        require_once './src/controller/HomeController.php';
        HomeController::index();
}

require_once('./src/view/general/footer.php');