<?php

require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/EntityManager.php';
require_once './src/model/entity/Recette.php';

class RecetteManager extends EntityManager
{
    /**
     * @param $id
     * @return array
     */
    public function getAllByRegion($id): array
    {
        $bdd = DbManager::DBConnect();

        $requete = $bdd->prepare('SELECT * FROM Recette WHERE regionID = :regionID ');
        $requete->bindValue('regionID', $id);
        $requete->setFetchMode(PDO::FETCH_CLASS, 'Recette');
        $requete->execute();

        $recettes = [];

        while ($recette = $requete->fetch()) {
            $recettes[] = $recette;
        }
        return $recettes;
    }

    /**
     * @param $id
     * @return array
     */
    public function getAllByUser($id): array
    {
        $bdd = DbManager::DBConnect();

        $requete = $bdd->prepare('SELECT * FROM Recette WHERE utilisateurID = :utilisateurID ');
        $requete->bindValue('utilisateurID', $id);
        $requete->setFetchMode(PDO::FETCH_CLASS, 'Recette');
        $requete->execute();

        $recettes = [];

        while ($recette = $requete->fetch()) {
            $recettes[] = $recette;
        }
        return $recettes;
    }
}