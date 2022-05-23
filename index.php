<?php

session_start();
// Test d'une session ouverte : si pas de session ouverte avec email, retour sur login.php
if (!isset($_SESSION['email'])) {
    header('Location: ./login.php');
}

require './config.php';
require_once './src/Router.php';

require_once './src/view/general/header.php';
require_once './src/view/general/menu.php';

//recuperation des variables d'URL : page, action et id
$page = '';
if (isset($_GET['p'])) {
    $page = htmlentities($_GET['p']);
}
$action = '';
if (isset($_GET['action'])) {
    $action = htmlentities($_GET['action']);
}
$id = "";
if (isset($_GET['id'])) {
    $id = htmlentities($_GET['id']);
}

//declare router
$router = new Router();

$router->displayPage($page, $action, $id);

require_once('./src/view/general/footer.php');
