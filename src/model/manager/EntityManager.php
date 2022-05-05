<?php

require './src/model/manager/DbManager.php';

require_once './src/model/entity/Ingredient.php';
require_once './src/model/entity/Recette.php';
require_once './src/model/entity/Region.php';
require_once './src/model/entity/Utilisateur.php';

class EntityManager
{
    public function getOne(int $id, string $entityName)
    {
        $bdd = DbManager::DBConnect();

        $sql = 'SELECT * FROM ' . htmlentities($entityName) . ' WHERE id = ' . htmlentities($id);

        $requete = $bdd->query($sql);

        $requete->setFetchMode(PDO::FETCH_CLASS, $entityName);
        $entity = $requete->fetch();
        return $entity;
    }

    /**
     * @param string $entityName
     * @return iterable
     */
    public function getAll(string $entityName): iterable
    {

        $entities = [];

        // On se connecte a la bdd;
        $bdd = DbManager::DBConnect();
        // On execute la requete
        $sql = 'SELECT * FROM ' . htmlentities($entityName);

        $requete = $bdd->query($sql);
        $requete->setFetchMode(PDO::FETCH_CLASS, $entityName);

        //tant qu‘il y a des lignes en BDD
        while ($entity = $requete->fetch()) {

            //on ajoute l’entité à un tableau d’ingrédients
            $entities[] = $entity;
        }

        return $entities;
    }

    /**
     * @param Ingredient $ingredient
     * @return void
     */
    public function save(Ingredient $ingredient): void
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('INSERT INTO Ingrédients (nom, uniteMesure) VALUES (?, ?)');
        $requete->bindValue(1, $ingredient->getNom());
        $requete->bindValue(2, $ingredient->getUniteMesure());

        $requete->execute();

    }

    /**
     * @param Ingredient $ingredient
     * @return void
     */
    public function modify(Ingredient $ingredient): void
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('UPDATE Ingrédients SET nom = ?, uniteMesure = ? WHERE id = ?');
        $requete->bindValue(1, $ingredient->getNom());
        $requete->bindValue(2, $ingredient->getUniteMesure());
        $requete->bindValue(3, $ingredient->getId());

        $requete->execute();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('DELETE FROM Ingrédients WHERE id = ? ');
        $requete->bindValue(1, $id);

        $requete->execute();

    }
}