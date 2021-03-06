<?php

//
//    session_start();
//    $_SESSION = array();
//    session_destroy();
//    header('Location:../menu.php');

?>

<aside>
    <img src="./public/img/logo-light.png">
    <ul class="nav flex-column mt-4">
        <li class="nav-item">
            <a class="nav-link" href="./index.php">
                <i class="fa-solid fa-gauge"></i>
                Tableau de bord
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php?p=recette">
                <i class="fa-solid fa-utensils"></i>
                    Recettes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php?p=ingredient">
                <i class="fa-solid fa-carrot"></i>
                Ingrédients
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php?p=region">
                <i class="fa-solid fa-signs-post"></i>
                Régions
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php?p=utilisateur">
                <i class="fa-solid fa-user"></i>
                Utilisateurs
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./login.php?disconnect=true">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Déconnexion
            </a>
        </li>
    </ul>
</aside>