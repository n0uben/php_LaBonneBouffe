<?php
require_once ('./model/entity/Ingredient.php');

class IngredientManager extends Manager
{
    public function getById($id){

        $id = (int) $id;

        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('SELECT * FROM Ingrédients WHERE id = ?');
        $requete->execute(array($id));
        $donnees = $requete->fetch(PDO::FETCH_ASSOC);

        $monIngredient = new Ingredient($donnees['nom'], $donnees['uniteMesure']);
        $monIngredient->setId($donnees['id']);

        return $monIngredient;
    }

    public function getAll(){

        $ingredients = [];

        // On se connecte a la bdd;
        $bdd = $this->DBConnect();
        // On execute la requete
        $requete = $bdd->query('SELECT * FROM Ingrédients');

        //tant qu‘il y a des lignes en BDD
        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {

            //chaque ligne devient une instance de la classe ingrédient
            $ingredient = new Ingredient($donnees['nom'], $donnees['uniteMesure']);
//            // on rajoute l’id absent du constructeur
            $ingredient->setId($donnees['id']);
//
//          //on ajoute l’ingredient a un tableau d’ingrédients
            $ingredients[] = $ingredient;
        }

        return $ingredients;
    }

    public function save($ingredient){
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('INSERT INTO Ingrédients (nom, uniteMesure) VALUES (?, ?)');
        $requete->bindValue(1, $ingredient->getNom());
        $requete->bindValue(2, $ingredient->getUniteMesure());

        $requete->execute();

    }

    public function modify($ingredient){

    }

    public function delete($id){

    }

}