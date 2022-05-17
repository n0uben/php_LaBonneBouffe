<?php

require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/DbManager.php';
require_once './src/model/entity/Region.php';

class RegionManager extends EntityManager
{
    public function hasRecipe(string $id): bool
    {
        $bdd = DbManager::DBConnect();

        $requete = $bdd->prepare('SELECT COUNT(*) FROM Recette WHERE regionID = :id');
        $requete->bindValue(':id', $id);
        $requete->execute();
        $result = $requete->fetch();
        $count = $result['COUNT(*)'];

        //si superieur a 0, renvoie true, sinon false
        return ($count > 0);
    }
}