<?php

require_once './src/model/manager/UtilisateurManager.php';

class UtilisateurController
{
    private static string $tableName = 'Utilisateur';
    private UtilisateurManager $manager;

    public function __construct()
    {
        $this->manager = new UtilisateurManager();
    }


    /**
     * @return void
     */
    public function index(): void
    {
        $utilisateurs = $this->manager->getAll(UtilisateurController::$tableName);

        require_once './src/view/utilisateurs/liste-utilisateurs.php';

    }

    /**
     * @param string $id
     * @return void
     */
    public function edit(string $id): void
    {
        $utilisateur = $this->manager->getOne($id, UtilisateurController::$tableName);
        $enumRole = $this->manager->getEnumValues('Utilisateur', 'role');


        //si des donnees sont transmises et ne sont pas vides
        if (isset($_POST) && sizeof($_POST) > 0) {
            $donneesPOST = $_POST;

            //on sanitize les donnees POST
            $emailPOST = htmlentities($donneesPOST['email']);
            $mdpPOST = password_hash($donneesPOST['mdp'],  PASSWORD_ARGON2I );
            $nomPOST = htmlentities($donneesPOST['nom']);
            $rolePOST = htmlentities($donneesPOST['role']);

            //on enregistre l'entité mise à jour
            $utilisateurUpdated = new Utilisateur(['id' => $utilisateur->getId(), 'email' => $emailPOST, 'mdp' => $mdpPOST, 'nom' => $nomPOST, 'role' => $rolePOST]);
            $this->manager->update($utilisateurUpdated);

            //on récupère l'entité à jour depuis la bdd
            $utilisateur = $this->manager->getOne(intval($id), UtilisateurController::$tableName);

            header('Location: ./index.php?p=utilisateur');


        }

        require_once './src/view/utilisateurs/edit-utilisateur.php';
    }

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
    {
        $utilisateurAsuppr = $this->manager->getOne($id, UtilisateurController::$tableName );

        if ($utilisateurAsuppr) {
            $this->manager->delete($id, UtilisateurController::$tableName);
        }

        header('Location: ./index.php?p=utilisateur');

    }

    public function add(): void
    {
        $enumRole = $this->manager->getEnumValues('Utilisateur', 'role');

        if (isset($_POST) && sizeof($_POST) > 0) {
            $donneesPOST = $_POST;
            //on sanitize les donnees POST
            $emailPOST = htmlentities($donneesPOST['email']);
            $mdpPOST = password_hash($donneesPOST['mdp'],  PASSWORD_ARGON2I );
            $nomPOST = htmlentities($donneesPOST['nom']);
            $rolePOST = htmlentities($donneesPOST['role']);
            $utilisateur = new Utilisateur(['email' => $emailPOST, 'mdp' => $mdpPOST, 'nom' => $nomPOST, 'role' => $rolePOST]);

            $this->manager->create($utilisateur);
            header('location: ./index.php?p=utilisateur');
        } else {
            require_once './src/view/utilisateurs/ajout-utilisateur.php';
        }
    }
}