<?php
require_once './src/model/manager/IngredientManager.php';

class IngredientController
{
    private static string $tableName = 'Ingredient';
    private EntityManager $ingredientManager;

    public function __construct()
    {
        $this->ingredientManager = new IngredientManager();
    }

    /**
     * @return void
     */
    public function index(): void
    {
        $ingredients = $this->ingredientManager->getAll(IngredientController::$tableName);

        require_once './src/view/ingredients/liste-ingredients.php';

    }

    /**
     * @param string $id
     * @return void
     */
    public function edit(string $id): void
    {
        $ingredient = $this->ingredientManager->getOne(intval($id), IngredientController::$tableName);
        $enumUnite = $this->ingredientManager->getEnumValues('Ingredient', 'uniteMesure');

        //si des donnees sont transmises et ne sont pas vides
        if (isset($_POST) && sizeof($_POST) > 0) {
            $donneesPOST = $_POST;
            //on sanitize les donnees POST
            $nomPOST = htmlentities($donneesPOST['nom']);
            $unitePOST = htmlentities($donneesPOST['uniteMesure']);

            //on enregistre l'ingrédient mis à jour
            $ingredientUpdated = new Ingredient(['id' => $ingredient->getId(), 'nom' => $nomPOST, 'uniteMesure' => $unitePOST]);
            $this->ingredientManager->update($ingredientUpdated);

            //on récupère l'ingrédient à jour depuis la bdd
//            $ingredient = $manager->getOne(intval($id), IngredientController::$tableName);
            header('Location: ./index.php?p=ingredient');
        }

        require_once './src/view/ingredients/edit-ingredient.php';
    }

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
    {
        if ($this->ingredientManager->isInRecipe($id)) {
            $redirection = 'Location: ./index.php?p=ingredient&action=edit&id=' . $id . '&error=1';
            header($redirection);
        } else {
            $ingredientAsuppr = $this->ingredientManager->getOne($id, IngredientController::$tableName);
            if ($ingredientAsuppr) {
                $this->ingredientManager->delete($id, IngredientController::$tableName);
            }
            header('Location: ./index.php?p=ingredient');
        }
    }

    public function add(): void
    {
        $enumUnite = $this->ingredientManager->getEnumValues('Ingredient', 'uniteMesure');

        if (isset($_POST) && sizeof($_POST) > 0) {
            $donneesPOST = $_POST;
            //on sanitize les donnees POST
            $nomPOST = htmlentities($donneesPOST['nom']);
            $unitePOST = htmlentities($donneesPOST['uniteMesure']);
            $ingredient = new Ingredient(['nom' => $nomPOST, 'uniteMesure' => $unitePOST]);

            $this->ingredientManager->create($ingredient);
            header('location: ./index.php?p=ingredient');
        } else {
            require_once './src/view/ingredients/ajout-ingredient.php';
        }
    }
}