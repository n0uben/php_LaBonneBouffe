<?php

require_once './src/model/manager/Manager.php';
require_once './src/model/entity/Recette.php';

class RecetteManager extends Manager
{
    /**
     * @param int $id
     * @return Recette
     */
    public function getById(int $id): Recette
    {
        //TEMP
        return new Recette();
    }

    /**
     * @return Recette[]
     */
    public function getAll(): iterable
    {
        $recettes = [];

        // On se connecte a la bdd;
        $bdd = $this->DBConnect();
        // On execute la requete
        $requete = $bdd->query('SELECT * FROM Recettes');

        //tant qu‘il y a des lignes en BDD
        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {

            //chaque ligne devient une instance de la classe ingrédient
            $recette = new Recette($donnees['nom'], $donnees['categorie'], $donnees['niveau'], $donnees['tpsPrepa'], $donnees['tpsCuisson'], $donnees['budget'], $donnees['nbPers'], $donnees['etapes'], $donnees['utilisateurID'] );
            // on rajoute l’id absent du constructeur
            $recette->setId($donnees['id']);

            //on ajoute l’ingredient a un tableau d’ingrédients
            $recettes[] = $recette;
        }

        return $recettes;
    }

    /**
     * @param Recette $recette
     * @return void
     */
    public function save(Recette $recette): void
    {

    }

    /**
     * @param Recette $recette
     * @return void
     */
    public function modify(Recette $recette): void
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