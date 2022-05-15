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
                                        FROM Ingredient i
                                        JOIN composition c ON i.id = c.id_ingredient
                                        JOIN Recette r ON c.id_recette = r.id
                                        WHERE r.id = :id;
        ');
        $requete->bindValue(':id', $recipeId);
        $requete->execute();

        $ingredients = [];

        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {
            $ingredient = new Ingredient($donnees);
            $ingredients[] = [$ingredient, $donnees['quantite']];
        }

        return $ingredients;
    }

    /**
     * @param string $id
     * @return bool
     * Renvoie true si l’ingredient est dans au moins une recette (table composition), false sinon
     */
    public function isInRecipe(string $id): bool
    {
        $bdd = DbManager::DBConnect();

        $requete = $bdd->prepare('SELECT COUNT(*) FROM composition WHERE id_ingredient = :id');
        $requete->bindValue(':id', $id);
        $requete->execute();
        $result = $requete->fetch();
        $count = $result['COUNT(*)'];

        //si superieur a 0, renvoie true, sinon false
        return ($count > 0);
    }
}