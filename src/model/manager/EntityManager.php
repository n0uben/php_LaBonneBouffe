<?php

require_once './src/model/manager/DbManager.php';
require_once './src/model/manager/QueryBuilder.php';

require_once './src/model/entity/Ingredient.php';
require_once './src/model/entity/Recette.php';
require_once './src/model/entity/Region.php';
require_once './src/model/entity/Utilisateur.php';

class EntityManager
{
    /**
     * @param int $id
     * @param string $entityName
     * @return Entity | false
     */
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
     * @return array|bool
     */
    public function getAll(string $entityName)
    {

        $entities = [];

        // On se connecte a la bdd;
        $bdd = DbManager::DBConnect();
        // On execute la requete
        $sql = 'SELECT * FROM ' . htmlentities($entityName);

        print_r($sql);

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
     * @param Entity $entity
     * @return void
     */
    public function create(Entity $entity): void
    {
        $bdd = DbManager::DBConnect();

        $sql = QueryBuilder::createSQL($entity);
        $requete = $bdd->query($sql);
        var_dump($requete);
    }

    /**
     * @param Entity $entity
     * @return void
     * Nécessite une entité avec ID initialisé
     */
    public function update(Entity $entity): void
    {
        $bdd = DbManager::DBConnect();
        $sql = QueryBuilder::updateSQL($entity);
        echo $sql;
        $requete = $bdd->query($sql);
    }

    /**
     * @param int $id
     * @param string $entityName
     * @return void
     */
    public function delete(int $id, string $entityName): void
    {
        $bdd = DbManager::DBConnect();

        $sql = 'DELETE FROM ' . htmlentities($entityName) . ' WHERE id = ' . htmlentities($id);

        $requete = $bdd->query($sql);

    }

    /**
     * @param string $table
     * @param string $field
     * @return array
     * retourne les valeurs d’une ENUM d‘un champ en BDD (uniteMesure, niveau…)
     */
    public function getEnumValues(string $table, string $field): array
    {
        $bdd = DbManager::DBConnect();
        //requete SQL pour récupérer les données contenant l’enum d’une colonne
        $type = $bdd->query("SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'");
        //stocke temporairement le resultat de la requete dans tmp
        $tmp = $type->fetchAll();
        // récupère le champ du tableau contenant l’enum sous forme string 'enum('enum1, enum2, …)'
        $tmp = $tmp[0]['Type'];
        //coupe la string pour n’avoir que 'enum1, enum2, …'
        preg_match("/^enum\(\'(.*)\'\)$/", $tmp, $matches);
        //crée un tableau à partir de la string des enums
        $enum = explode("','", $matches[1]);
        return $enum;
    }
}