<?php

require_once './src/model/manager/UtilisateurManager.php';

class UtilisateurController
{
    public static function index() {
        $manager = new UtilisateurManager();
        $utilisateurs = $manager->getAll();

        require_once './src/views/liste-utilisateurs.php';

    }
}