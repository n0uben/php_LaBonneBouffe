<?php

require_once './src/model/manager/Manager.php';
require_once './src/model/entity/Utilisateur.php';

class UtilisateurManager extends Manager
{
    /**
     * @param int $id
     * @return Utilisateur
     */
    public function getById(int $id): Utilisateur
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('SELECT * FROM Utilisateurs WHERE id = :id');
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $donnees = $requete->fetch(PDO::FETCH_ASSOC);

        $utilisateur = new Utilisateur($donnees['email'], $donnees['mdp'], $donnees['nom'], $donnees['role']);
        $utilisateur->setId($donnees['id']);

        return $utilisateur;
    }

    /**
     * @return Utilisateur[]
     */
    public function getAll(): iterable
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

    /**
     * @param Utilisateur $utilisateur
     * @return void
     */
    public function save(Utilisateur $utilisateur): void
    {

    }

    /**
     * @param Utilisateur $utilisateur
     * @return void
     */
    public function modify(Utilisateur $utilisateur): void
    {

    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {

    }
}