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
        $controller = new IngredientController();

        switch ($action) {
            case 'edit':
                $controller->edit($id);
                break;
            case 'delete':
                $controller->delete($id);
                break;
            case 'add' :
                $controller->add();
                break;
            default:
                $controller->index();
                break;
        }
        break;
    case 'recette':
        require_once './src/controller/RecetteController.php';
        $controller = new RecetteController();
        switch ($action) {
            case 'edit':
                $controller->edit($id);
                break;
            case 'delete':
                $controller->delete($id);
                break;
            default:
                $controller->index();
                break;
        }
        break;
    case 'region':
        require_once './src/controller/RegionController.php';
        $controller = new RegionController();
        switch ($action) {
            case 'edit':
                $controller->edit($id);
                break;
            case 'delete':
                $controller->delete($id);
                break;
            case 'add':
                $controller->add();
                break;
            default:
                $controller->index();
                break;
        }
        break;
    case 'utilisateur':
        require_once './src/controller/UtilisateurController.php';
        $controller = new UtilisateurController();
        switch ($action) {
            case 'edit':
                $controller->edit($id);
                break;
            case 'delete':
                $controller->delete($id);
                break;
            case 'add':
                $controller->add();
                break;
            default:
                $controller->index();
                break;
        }
        break;
    default:
        require_once './src/controller/HomeController.php';
        $controller = new HomeController();
        $controller->index();
}

require_once('./src/view/general/footer.php');
