<?php
require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/DbManager.php';
require_once './src/model/entity/Ingredient.php';

class IngredientManager extends EntityManager
{


    /**
     * @param int $recipeId
     * @return iterable
     */
//    retourne un array sous la forme [[ingredient1, quantite (int)], [ingredient2, quantite (int)]]
    public function getAllByRecipe(int $recipeId): iterable
    {
        $bdd = DbManager::DBConnect();

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

//    /**
//     * @param Ingredient $ingredient
//     * @return void
//     */
//    public function save(Ingredient $ingredient): void
//    {
//        $bdd = DbManager::DBConnect();
//
//        $requete = $bdd->prepare('INSERT INTO Ingrédients (nom, uniteMesure) VALUES (?, ?)');
//        $requete->bindValue(1, $ingredient->getNom());
//        $requete->bindValue(2, $ingredient->getUniteMesure());
//
//        $requete->execute();
//
//    }
//
//    /**
//     * @param Ingredient $ingredient
//     * @return void
//     */
//    public function modify(Ingredient $ingredient): void
//    {
//        $bdd = DbManager::DBConnect();
//
//        $requete = $bdd->prepare('UPDATE Ingrédients SET nom = ?, uniteMesure = ? WHERE id = ?');
//        $requete->bindValue(1, $ingredient->getNom());
//        $requete->bindValue(2, $ingredient->getUniteMesure());
//        $requete->bindValue(3, $ingredient->getId());
//
//        $requete->execute();
//    }
//
//    /**
//     * @param int $id
//     * @return void
//     */
//    public function delete(int $id): void
//    {
//        $bdd = DbManager::DBConnect();
//
//        $requete = $bdd->prepare('DELETE FROM Ingrédients WHERE id = ? ');
//        $requete->bindValue(1, $id);
//
//        $requete->execute();
//
//    }

}