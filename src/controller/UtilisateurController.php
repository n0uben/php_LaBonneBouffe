<?php

require_once './src/model/manager/UtilisateurManager.php';

class UtilisateurController
{
    /**
     * @return void
     */
    public static function index(): void
    {
        $manager = new UtilisateurManager();
        $utilisateurs = $manager->getAll();

        require_once './src/views/utilisateurs/liste-utilisateurs.php';

    }
}