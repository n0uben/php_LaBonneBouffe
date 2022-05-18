<?php

session_start();
// Test d'une session ouverte : si pas de session ouverte avec email, retour sur login.php
if (!isset($_SESSION['email'])) {
    header('Location: ./login.php');
}

require './config.php';
require_once './src/view/general/header.php';
require_once './src/view/general/menu.php';

//recuperation des variables d'URL : page, action et id
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

//Le "routeur" qui charge le contenu des pages
switch ($page) {
    case 'ingredient':
        require_once './src/controller/IngredientController.php';
        switch ($action) {
            case 'edit':
                IngredientController::edit($id);
                break;
            case 'delete':
                IngredientController::delete($id);
                break;
            case 'add' :
                IngredientController::add();
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
            case 'delete':
                RecetteController::delete($id);
                break;
            default:
                RecetteController::index();
                break;
        }
        break;
    case 'region':
        require_once './src/controller/RegionController.php';
        switch ($action) {
            case 'edit':
                RegionController::edit($id);
                break;
            case 'delete':
                RegionController::delete($id);
                break;
            default:
                RegionController::index();
                break;
        }
        break;
    case 'utilisateur':
        require_once './src/controller/UtilisateurController.php';
        switch ($action) {
            case 'edit':
                UtilisateurController::edit($id);
                break;
            case 'delete':
                UtilisateurController::delete($id);
                break;
            case 'add':
                UtilisateurController::add();
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
