<?php

require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/IngredientManager.php';
require_once './src/model/entity/Recette.php';

class RecetteManager extends EntityManager
{
    /**
     * @param $id
     * @return array
     */
    public function getAllByRegion($id): array
    {
        $bdd = DbManager::DBConnect();

        $requete = $bdd->prepare('SELECT * FROM Recette WHERE regionID = :regionID ');
        $requete->bindValue('regionID', $id);
        $requete->setFetchMode(PDO::FETCH_CLASS, 'Recette');
        $requete->execute();

        $recettes = [];

        while ($recette = $requete->fetch()) {
            $recettes[] = $recette;
        }
        return $recettes;
    }

    /**
     * @param $id
     * @return array
     */
    public function getAllByUser($id): array
    {
        $bdd = DbManager::DBConnect();

        $requete = $bdd->prepare('SELECT * FROM Recette WHERE utilisateurID = :utilisateurID ');
        $requete->bindValue('utilisateurID', $id);
        $requete->setFetchMode(PDO::FETCH_CLASS, 'Recette');
        $requete->execute();

        $recettes = [];

        while ($recette = $requete->fetch()) {
            $recettes[] = $recette;
        }
        return $recettes;
    }

    /**
     * @param string $id
     * @return Entity|false
     */
    public function getWithIngredients(string $id)
    {
        $ingredientManager = new IngredientManager();
        $recette = $this->getOne($id, 'Recette');
        // rappel : getAllByRecipe retourne [[ingredient1, quantite1], […]]
        $ingredientsInRecipe = $ingredientManager->getAllByRecipe($id);
        $recette->setIngredients($ingredientsInRecipe);
        return $recette;
    }

    public function createWithIngredients(Recette $recette)
    {
        $bdd = DbManager::DBConnect();

        $requeteRecette = $bdd->prepare('INSERT INTO Recette (nom, categorie, niveau, tpsPrepa, tpsCuisson, budget, nbPers, etapes, utilisateurID, regionID) VALUES (:nom, :categorie, :niveau, :tpsPrepa, :tpsCuisson, :budget, :nbPers, :etapes, :utilisateurID, :regionID) ');

        $requeteRecette->bindValue(':nom', $recette->getNom());
        $requeteRecette->bindValue(':categorie', $recette->getCategorie());
        $requeteRecette->bindValue(':niveau', $recette->getNiveau());
        $requeteRecette->bindValue(':tpsPrepa', $recette->getTpsPrepa());
        $requeteRecette->bindValue(':tpsCuisson', $recette->getTpsCuisson());
        $requeteRecette->bindValue(':budget', $recette->getBudget());
        $requeteRecette->bindValue(':nbPers', $recette->getNbPers());
        $requeteRecette->bindValue(':etapes', $recette->getEtapes());
        $requeteRecette->bindValue(':utilisateurID', $recette->getUtilisateurID());
        $requeteRecette->bindValue(':regionID', $recette->getRegionID());

        $requeteRecette->execute();

        foreach ($recette->getIngredients() as $ingredient) {
            $ingredientInBDD = $this->getOneByNom($ingredient[0]->getNom(), 'Ingredient');
            if (!$ingredientInBDD) {
                $this->create($ingredient[0]);
            }
        }
        $recetteBDD = $this->getOneByNom($recette->getNom(), 'Recette');
        $recetteBDD->setIngredients();

        return $recetteBDD;
    }

    /**
     * @param Recette $recette
     * @param Ingredient $ingredient
     * @return bool
     */
    public function hasIngredientAlready(Recette $recette, Ingredient $ingredient): bool
    {
        $bdd = DbManager::DBConnect();

        $requete = $bdd->prepare('SELECT COUNT(*) FROM composition WHERE id_ingredient = :idIngredient AND id_recette = :idRecette');

        $requete->bindValue(':idIngredient', $ingredient->getId());
        $requete->bindValue(':idRecette', $recette->getId());
        $requete->execute();
        $result = $requete->fetch();
        $count = $result['COUNT(*)'];

        //si superieur a 0, renvoie true, sinon false
        return ($count > 0);
    }


    public function addIngredientsToRecipe(Recette $recette, array $ingredients)
    {
        $bdd = DbManager::DBConnect();
        foreach ($ingredients as $ingredient) {
            // on teste si l’association entre l’ingrédient et la recette existe déja dans la table composition
            $hasIngredient = $this->hasIngredientAlready($recette, $ingredient[0]);
            // si ce n’est pas la cas, on enregistre en BDD l’association dans la table composition
            if (!$hasIngredient) {
                $requete = $bdd->prepare('INSERT INTO composition (id_ingredient, id_recette, quantite) VALUES (:idIngredient, :idRecette, :quantite)');
                $requete->bindValue(':idIngredient', $ingredient[0]->getId());
                $requete->bindValue(':idRecette', $recette->getId());
                $requete->bindValue(':quantite', $ingredient[1]);

                $requete->execute();
            }
        }
    }

    public function updateWithIngredients(Recette $recette)
    {
        $bdd = DbManager::DBConnect();

        $requeteRecette = $bdd->prepare('UPDATE Recette SET nom = :nom, categorie = :categorie, niveau = :niveau, tpsPrepa = :tpsPrepa, tpsCuisson = :tpsCuisson, budget = :budget, nbPers = :nbPers, etapes = :etapes, utilisateurID = :utilisateurID, regionID = :regionID WHERE id = :id');

        $requeteRecette->bindValue(':nom', $recette->getNom());
        $requeteRecette->bindValue(':categorie', $recette->getCategorie());
        $requeteRecette->bindValue(':niveau', $recette->getNiveau());
        $requeteRecette->bindValue(':tpsPrepa', $recette->getTpsPrepa());
        $requeteRecette->bindValue(':tpsCuisson', $recette->getTpsCuisson());
        $requeteRecette->bindValue(':budget', $recette->getBudget());
        $requeteRecette->bindValue(':nbPers', $recette->getNbPers());
        $requeteRecette->bindValue(':etapes', $recette->getEtapes());
        $requeteRecette->bindValue(':utilisateurID', $recette->getUtilisateurID());
        $requeteRecette->bindValue(':regionID', $recette->getRegionID());
        $requeteRecette->bindValue(':id', $recette->getId());

        if ($requeteRecette->execute()) {
            echo "La recette a bien été mise à jour";
        } else {
            echo "Il y a un eu probleme lors de la sauvegarde de votre recette";
        }
    }
}