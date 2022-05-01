<?php

require_once './src/model/manager/DbManager.php';
require_once './src/model/entity/Utilisateur.php';

class UtilisateurManager extends DbManager
{
    /**
     * @param int $id
     * @return Utilisateur
     */
    public function getOne(int $id): Utilisateur
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

        $bdd = $this->DBConnect();
        $requete = $bdd->query('SELECT * FROM Utilisateurs');

        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {

            $utilisateur = new Utilisateur($donnees['email'], $donnees['mdp'], $donnees['nom'], $donnees['role']);
            $utilisateur->setId($donnees['id']);

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
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('INSERT INTO Utilisateurs (email, mdp, nom, role) VALUES (:email, :mdp, :nom, :role)');
        $requete->bindValue(':email', $utilisateur->getEmail());
        $requete->bindValue(':mdp', $utilisateur->getMdp());
        $requete->bindValue(':nom', $utilisateur->getNom());
        $requete->bindValue(':role', $utilisateur->getRole());

        $requete->execute();
    }

    /**
     * @param Utilisateur $utilisateur
     * @return void
     */
    public function modify(Utilisateur $utilisateur): void
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('UPDATE Utilisateurs SET email = :email, mdp = :mdp, nom = :nom, role = :role WHERE id = :id');
        $requete->bindValue(':email', $utilisateur->getEmail());
        $requete->bindValue(':mdp', $utilisateur->getMdp());
        $requete->bindValue(':nom', $utilisateur->getNom());
        $requete->bindValue(':role', $utilisateur->getRole());
        $requete->bindValue(':id', $utilisateur->getId());

        $requete->execute();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('DELETE FROM Utilisateurs WHERE id = :id ');
        $requete->bindValue(':id', $id);

        $requete->execute();
    }
}