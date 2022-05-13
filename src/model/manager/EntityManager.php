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
     * @param mixed $entity
     * @return void
     */
    public function create($entity): void
    {


        $bdd = DbManager::DBConnect();

        $sql = 'INSERT INTO ' . get_class($entity) . ' ' . $entity->getKeysSQL() .' VALUES '. $entity->getValuesSQL();

        echo $sql;

//        $requete = $bdd->query($sql);
    }

    /**
     * @param mixed $entity
     * @return void
     */
    public function update($entity): void
    {
        $bdd = DbManager::DBConnect();

        $sql = 'UPDATE ' . get_class($entity) . ' ' ;

        $requete = $bdd->query($sql);


    }

    /**
     * @param int $id
     * @param string $tablename
     * @return void
     */
    public function delete(int $id, string $tablename): void
    {
        $bdd = DbManager::DBConnect();

        $sql = 'DELETE FROM ' . htmlentities($tablename) . ' WHERE id = ' . htmlentities($id);

        $requete = $bdd->query($sql);

    }
}