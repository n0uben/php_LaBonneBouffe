<?php

require_once './src/model/manager/Manager.php';
require_once './src/model/entity/Utilisateur.php';

class UtilisateurManager extends Manager
{
    public function getById($id)
    {

    }
    public function getAll()
    {
        $utilisateurs = [];

        // On se connecte a la bdd;
        $bdd = $this->DBConnect();
        // On execute la requete
        $requete = $bdd->query('SELECT * FROM Utilisateurs');

        //tant qu‘il y a des lignes en BDD
        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {

            //chaque ligne devient une instance de la classe ingrédient
            $utilisateur = new Utilisateur($donnees['email'], $donnees['mdp'], $donnees['nom'], $donnees['role']);
            // on rajoute l’id absent du constructeur
            $utilisateur->setId($donnees['id']);

            //on ajoute l’ingredient a un tableau d’ingrédients
            $utilisateurs[] = $utilisateur;
        }

        return $utilisateurs;
    }
    public function save($utilisateur)
    {

    }
    public function modify($utilisateur)
    {

    }
    public function delete($id)
    {

    }
}