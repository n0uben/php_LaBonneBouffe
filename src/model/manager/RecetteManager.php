<?php

require_once './src/model/manager/Manager.php';
require_once './src/model/entity/Recette.php';

class RecetteManager extends Manager
{
    public function getById($id)
    {

    }
    public function getAll()
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
    public function save($recette)
    {

    }
    public function modify($recette)
    {

    }
    public function delete($id)
    {

    }
}