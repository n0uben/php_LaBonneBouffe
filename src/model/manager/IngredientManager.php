<?php
require_once './src/model/manager/Manager.php';
require_once './src/model/entity/Ingredient.php';

class IngredientManager extends Manager
{
    public function getById($id)
    {

        $id = (int)$id;

        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('SELECT * FROM Ingrédients WHERE id = ?');
        $requete->execute(array($id));
        $donnees = $requete->fetch(PDO::FETCH_ASSOC);

        $monIngredient = new Ingredient($donnees['nom'], $donnees['uniteMesure']);
        $monIngredient->setId($donnees['id']);

        return $monIngredient;
    }

    public function getAll()
    {

        $ingredients = [];

        // On se connecte a la bdd;
        $bdd = $this->DBConnect();
        // On execute la requete
        $requete = $bdd->query('SELECT * FROM Ingrédients');

        //tant qu‘il y a des lignes en BDD
        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {

            //chaque ligne devient une instance de la classe ingrédient
            $ingredient = new Ingredient($donnees['nom'], $donnees['uniteMesure']);
            // on rajoute l’id absent du constructeur
            $ingredient->setId($donnees['id']);

            //on ajoute l’ingredient a un tableau d’ingrédients
            $ingredients[] = $ingredient;
        }

        return $ingredients;
    }

//    retourne un array sous la forme [[ingredient1, quantite (int)], [ingredient2, quantite (int)]]
    public function getAllByRecipeId($recipeId)
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('SELECT i.id as id, i.nom as nom, i.uniteMesure as uniteMesure, c.quantite as quantite 
                                        FROM Ingrédients i
                                        JOIN composition c ON i.id = c.id_ingredient
                                        JOIN Recettes r ON c.id_recette = r.id
                                        WHERE r.id = ?;
        ');
        $requete->bindValue(1, $recipeId);

        $requete->execute();

        $ingredients = [];

        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {
            $ingredient = new Ingredient($donnees['nom'], $donnees['uniteMesure']);
            $ingredient->setId($donnees['id']);

            $ingredients[] = [$ingredient, $donnees['quantite']];
        }
        return $ingredients;
    }

    public function save($ingredient)
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('INSERT INTO Ingrédients (nom, uniteMesure) VALUES (?, ?)');
        $requete->bindValue(1, $ingredient->getNom());
        $requete->bindValue(2, $ingredient->getUniteMesure());

        $requete->execute();

    }

    public function modify($ingredient)
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('UPDATE Ingrédients SET nom = ?, uniteMesure = ? WHERE id = ?');
        $requete->bindValue(1, $ingredient->getNom());
        $requete->bindValue(2, $ingredient->getUniteMesure());
        $requete->bindValue(3, $ingredient->getId());

        $requete->execute();
    }

    public function delete($id)
    {
        $bdd = $this->DBConnect();

        $requete = $bdd->prepare('DELETE FROM Ingrédients WHERE id = ? ');
        $requete->bindValue(1, $id);

        $requete->execute();

    }

}