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
        $enumRole = $manager->getEnumValues('Utilisateur', 'role');


        //si des donnees sont transmises et ne sont pas vides
        if (isset($_POST) && sizeof($_POST) > 0) {
            $donneesPOST = $_POST;

            //on sanitize les donnees POST
            $emailPOST = htmlentities($donneesPOST['email']);
            $mdpPOST = password_hash(htmlentities($donneesPOST['mdp']),  PASSWORD_BCRYPT );
            $nomPOST = htmlentities($donneesPOST['nom']);
            $rolePOST = htmlentities($donneesPOST['role']);

            //on enregistre l'entité mise à jour
            $utilisateurUpdated = new Utilisateur(['id' => $utilisateur->getId(), 'email' => $emailPOST, 'mdp' => $mdpPOST, 'nom' => $nomPOST, 'role' => $rolePOST]);
            $manager->update($utilisateurUpdated);

            //on récupère l'entité à jour depuis la bdd
            $utilisateur = $manager->getOne(intval($id), UtilisateurController::$tableName);

            header('Location: ./index.php?p=utilisateur');


        }

        require_once './src/view/utilisateurs/edit-utilisateur.php';
    }

    /**
     * @param string $id
     * @return void
     */
    public static function delete(string $id): void
    {
        $manager = new UtilisateurManager();

        $utilisateurAsuppr = $manager->getOne($id, UtilisateurController::$tableName );

        if ($utilisateurAsuppr) {
            $manager->delete($id, UtilisateurController::$tableName);
        }

        header('Location: ./index.php?p=utilisateur');

    }

    public static function add(): void
    {
        $manager = new UtilisateurManager();
        $enumRole = $manager->getEnumValues('Utilisateur', 'role');

        if (isset($_POST) && sizeof($_POST) > 0) {
            $donneesPOST = $_POST;
            //on sanitize les donnees POST
            $emailPOST = htmlentities($donneesPOST['email']);
            $mdpPOST = password_hash(htmlentities($donneesPOST['mdp']),  PASSWORD_BCRYPT );
            $nomPOST = htmlentities($donneesPOST['nom']);
            $rolePOST = htmlentities($donneesPOST['role']);
            $utilisateur = new Utilisateur(['email' => $emailPOST, 'mdp' => $mdpPOST, 'nom' => $nomPOST, 'role' => $rolePOST]);

            $manager->create($utilisateur);
            header('location: ./index.php?p=utilisateur');
        } else {
            require_once './src/view/utilisateurs/ajout-utilisateur.php';
        }
    }
}