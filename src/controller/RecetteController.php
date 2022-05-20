<?php

require_once './src/model/manager/RecetteManager.php';
require_once './src/model/manager/UtilisateurManager.php';
require_once './src/model/manager/RegionManager.php';
require_once './src/model/manager/IngredientManager.php';

class RecetteController
{
    private static string $tableName = 'Recette';

    /**
     * @return void
     */
    public function index(): void
    {
        $manager = new RecetteManager();
        $recettes = $manager->getAll(RecetteController::$tableName);

        require_once './src/view/recettes/liste-recettes.php';

    }

    /**
     * @param string $id
     * @return void
     */
    public function edit(string $id): void
    {
        $recetteManager = new RecetteManager();
        $ingredientManager = new IngredientManager();
        $utilisateurManager = new UtilisateurManager();
        $regionManager = new RegionManager();

        $recette = $recetteManager->getWithIngredients(intval($id));

        $enumCateg = $recetteManager->getEnumValues('Recette', 'categorie');
        $enumNiveau = $recetteManager->getEnumValues('Recette', 'niveau');
        $enumBudget = $recetteManager->getEnumValues('Recette', 'budget');
        $enumUnite = $ingredientManager->getEnumValues('Ingredient', 'uniteMesure');


        //Retourne un array sous la forme [[ingredient1, quantite (int)], [ingredient2, quantite (int)]]
        $ingredients = $recette->getIngredients();
        $region = $regionManager->getOne($recette->getRegionID(), 'Region');
        $regions = $regionManager->getAll('Region');
        $utilisateur = $utilisateurManager->getOne($recette->getUtilisateurID(), 'Utilisateur');
        $utilisateurs = $utilisateurManager->getAll('Utilisateur');

        if ((isset($_POST)) && (sizeof($_POST) > 0)) {

            //on récupère et sanitize les données transmises
            $regionPOST = $regionManager->getOneByNom(htmlentities($_POST['region']), 'Region');
            //on prepare l'array a transmettre au constructeur de Recette
            $donneesPOST = [
                'id' => $recette->getId(),
                'nom' => htmlentities($_POST['nom']),
                'categorie' => htmlentities($_POST['categorie']),
                'niveau' => htmlentities($_POST['niveau']),
                'tpsPrepa' => intval(htmlentities($_POST['tpsPrepa'])),
                'tpsCuisson' => intval(htmlentities($_POST['tpsCuisson'])),
                'budget' => htmlentities($_POST['budget']),
                'nbPers' => (intval(htmlentities($_POST['nbPers']))),
                'etapes' => htmlentities($_POST['etapes']),
                'regionID' => $regionPOST->getId(),
            ];

            $recetteUpdated = new Recette($donneesPOST);
            $recetteManager->updateRecette($recetteUpdated);

            $recette = $recetteManager->getOne($id, 'Recette');

//            si au moins 1 ingrédient a été transmis
            if (isset($_POST['ingredient']) && sizeof($_POST['ingredient']) > 0) {
                foreach ($_POST['ingredient'] as $ingredientPOST) {
                    $nomPOST = htmlentities($ingredientPOST['nom']);
                    $uniteMesurePOST = htmlentities($ingredientPOST['uniteMesure']);
                    $quantitePOST = htmlentities($ingredientPOST['quantite']);

                    //on check si l’ingredient existe en BDD
                    $ingredientBDD = $ingredientManager->getOneByNom($nomPOST, 'Ingredient');
                    //s’il n’existe pas en BDD
                    if (!$ingredientBDD) {
//                        on crée un objet
                        $ingredientBDD = new Ingredient(['nom' => $ingredientPOST['nom'], 'uniteMesure' => $uniteMesurePOST]);
//                        on l’enregistre en BDD
                        $ingredientManager->create($ingredientBDD);
                    }
//                    on crée notre array d’ingredient et quantités
                    $ingredientsPOST[] = [$ingredientBDD, $ingredientPOST['quantite']];
                }
//                $recetteManager->addIngredientsToRecipe($recette, $ingredientsPOST);
            }
            header('Location: ./index.php?p=recette');
        }

        require_once './src/view/recettes/edit-recette.php';

    }

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
    {
        $manager = new RecetteManager();

        $recetteAsuppr = $manager->getOne($id, RecetteController::$tableName);

        if ($recetteAsuppr) {
            $manager->delete($id, RecetteController::$tableName);
        }

        header('Location: ./index.php?p=recette');

    }
}