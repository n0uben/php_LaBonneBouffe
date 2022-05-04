<?php

require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/DbManager.php';
require_once './src/model/entity/Region.php';

class RegionManager extends EntityManager
{

    /**
     * @return Region[]
     */
    public function getAll(): iterable
    {
        $regions = [];

        $bdd = $this->DBConnect();

        $requete = $bdd->query('SELECT * FROM Regions');

        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {
            $region = new Region($donnees['nom']);
            $region->setId($donnees['id']);

            $regions[] = $region;
        }

        return $regions;
    }

    /**
     * @param Region $region
     * @return void
     */
    public function save(Region $region): void
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('INSERT INTO Regions (nom) VALUES (:nom)');
        $requete->bindValue(':nom', $region->getNom());

        $requete->execute();

    }

    /**
     * @param Region $region
     * @return void
     */
    public function modify(Region $region): void
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('UPDATE Regions SET nom = :nom WHERE id = :id');
        $requete->bindValue(':nom', $region->getNom());
        $requete->bindValue(':id', $region->getId());

        $requete->execute();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('DELETE FROM Regions WHERE id = :id ');
        $requete->bindValue(':id', $id);

        $requete->execute();

    }
}