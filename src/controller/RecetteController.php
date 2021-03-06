<?php

require_once './src/model/manager/RecetteManager.php';
require_once './src/model/manager/UtilisateurManager.php';
require_once './src/model/manager/RegionManager.php';
require_once './src/model/manager/IngredientManager.php';

class RecetteController
{
    private EntityManager $recetteManager;
    private EntityManager $ingredientManager;
    private EntityManager $utilisateurManager;
    private EntityManager $regionManager;

    public function __construct()
    {
        $this->recetteManager = new RecetteManager();
        $this->ingredientManager = new IngredientManager();
        $this->utilisateurManager = new UtilisateurManager();
        $this->regionManager = new RegionManager();
    }

    private static string $tableName = 'Recette';

    /**
     * @return void
     */
    public function index(): void
    {
        $recettes = $this->recetteManager->getAll(RecetteController::$tableName);

        require_once './src/view/recettes/liste-recettes.php';

    }

    /**
     * @param string $id
     * @return void
     */
    public function edit(string $id): void
    {


        $recette = $this->recetteManager->getWithIngredients(intval($id));

        $enumCateg = $this->recetteManager->getEnumValues('Recette', 'categorie');
        $enumNiveau = $this->recetteManager->getEnumValues('Recette', 'niveau');
        $enumBudget = $this->recetteManager->getEnumValues('Recette', 'budget');
        $enumUnite = $this->ingredientManager->getEnumValues('Ingredient', 'uniteMesure');


        //Retourne un array sous la forme [[ingredient1, quantite (int)], [ingredient2, quantite (int)]]
        $ingredients = $recette->getIngredients();
        $region = $this->regionManager->getOne($recette->getRegionID(), 'Region');
        $regions = $this->regionManager->getAll('Region');
        $utilisateur = $this->utilisateurManager->getOne($recette->getUtilisateurID(), 'Utilisateur');
        $utilisateurs = $this->utilisateurManager->getAll('Utilisateur');

        if ((isset($_POST)) && (sizeof($_POST) > 0)) {

            //on r??cup??re et sanitize les donn??es transmises
            $regionPOST = $this->regionManager->getOneByNom(htmlentities($_POST['region']), 'Region');
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
            $this->recetteManager->updateRecette($recetteUpdated);

            $recette = $this->recetteManager->getOne($id, 'Recette');

//            si au moins 1 ingr??dient a ??t?? transmis
            if (isset($_POST['ingredient']) && sizeof($_POST['ingredient']) > 0) {
                foreach ($_POST['ingredient'] as $ingredientPOST) {
                    $nomPOST = htmlentities($ingredientPOST['nom']);
                    $uniteMesurePOST = htmlentities($ingredientPOST['uniteMesure']);
                    $quantitePOST = htmlentities($ingredientPOST['quantite']);

                    //on check si l???ingredient existe en BDD
                    $ingredientBDD = $this->ingredientManager->getOneByNom($nomPOST, 'Ingredient');
                    //s???il n???existe pas en BDD
                    if (!$ingredientBDD) {
//                        on cr??e un objet
                        $ingredientBDD = new Ingredient(['nom' => $ingredientPOST['nom'], 'uniteMesure' => $uniteMesurePOST]);
//                        on l???enregistre en BDD
                        $this->ingredientManager->create($ingredientBDD);
                    }
//                    on cr??e notre array d???ingredient et quantit??s
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
        $recetteAsuppr = $this->recetteManager->getOne($id, RecetteController::$tableName);

        if ($recetteAsuppr) {
            $this->recetteManager->delete($id, RecetteController::$tableName);
        }

        header('Location: ./index.php?p=recette');

    }
}