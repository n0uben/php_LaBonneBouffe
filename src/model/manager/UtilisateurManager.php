<?php

/*
 *
 */

require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/DbManager.php';
require_once './src/model/entity/Utilisateur.php';

class UtilisateurManager extends EntityManager
{
    /**
     * @param string $email
     * @return Utilisateur
     */
    public function getByEmail(string $email): Utilisateur
    {
        $requete = $this->bdd->prepare('SELECT * FROM Utilisateur WHERE email = :email');
        $requete->bindValue(':email', $email);
        $requete->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $requete->execute();
        return $requete->fetch();
    }

    /**
     * @param string $id
     * @return bool
     */
    public function hasRecipes(string $id): bool
    {
        $requete = $this->bdd->prepare('SELECT COUNT(*) FROM Recette WHERE utilisateurID = :id');
        $requete->bindValue(':id', $id);
        $requete->execute();
        $result = $requete->fetch();
        $count = $result['COUNT(*)'];

        //si superieur a 0, renvoie true, sinon false
        return ($count > 0);
    }

}