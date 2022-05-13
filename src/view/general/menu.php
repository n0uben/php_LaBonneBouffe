<?php
    /*
    Kevin : Je ne suis pas certain que ce soit le bon fichier pour verifier quelle session utilisateur est ouverte
    */

    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location:../menu.php');

?>


<aside style="float:left;">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="fa-solid fa-gauge"></i>
                Tableau de bord
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?p=recette">
                <i class="fa-solid fa-utensils"></i>
                    Recettes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?p=ingredient">
                <i class="fa-solid fa-carrot"></i>
                Ingrédients
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="index.php?p=region">
                <i class="fa-solid fa-signs-post"></i>
                Régions
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?p=utilisateur">
                <i class="fa-solid fa-user"></i>
                Utilisateurs
            </a>
        </li>
    </ul>
</aside>