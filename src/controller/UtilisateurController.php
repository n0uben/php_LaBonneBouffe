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
    public static function edit(string $id): void
    {
        $manager = new UtilisateurManager();
        $utilisateur = $manager->getOne($id, UtilisateurController::$tableName);

        //si l’utilisateur a cliqué sur "enregistrer"
        if (isset($_POST)) {
            $donneesPOST = $_POST;

            //on sanitize les donnees POST
            $emailPOST = htmlentities($donneesPOST['email']);
            $mdpPOST = htmlentities($donneesPOST['mdp']);
            $nomPOST = htmlentities($donneesPOST['nom']);
            $rolePOST = htmlentities($donneesPOST['role']);

            //on enregistre l'entité mise à jour
            $utilisateurUpdated = new Utilisateur(['id' => $utilisateur->getId(), 'email' => $emailPOST, 'mdp' => $mdpPOST, 'nom' => $nomPOST, 'role' => $rolePOST]);
            $manager->update($utilisateurUpdated);

            //on récupère l'entité à jour depuis la bdd
            $utilisateur = $manager->getOne(intval($id), UtilisateurController::$tableName);

        }

        require_once './src/view/utilisateurs/edit-utilisateur.php';
    }
}