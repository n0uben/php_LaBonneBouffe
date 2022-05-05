<?php

require_once './src/model/manager/UtilisateurManager.php';

class UtilisateurController
{
    private static string $tableName = 'Utilisateur';

    /**
     * @return void
     */
    public static function index(): void
    {
        $manager = new UtilisateurManager();
        $utilisateurs = $manager->getAll(UtilisateurController::$tableName);

        require_once './src/view/utilisateurs/liste-utilisateurs.php';

    }

    /**
     * @param string $id
     * @return void
     */
    public static function show(string $id): void
    {
        $manager = new UtilisateurManager();
        $utilisateur = $manager->getOne($id, UtilisateurController::$tableName);

        require_once './src/view/utilisateurs/show-utilisateurs.php';
    }
}