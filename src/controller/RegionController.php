<?php
require_once './src/model/manager/RegionManager.php';

class RegionController
{

    private RegionManager $manager;

    public function __construct()
    {
        $this->manager = new RegionManager();
    }

    private static string $tableName = 'Region';
    /**
     * @return void
     */
    public function index(): void
    {
        $regions = $this->manager->getAll(RegionController::$tableName);

        require_once './src/view/regions/liste-regions.php';

    }

    /**
     * @param string $id
     * @return void
     */
    public function edit(string $id): void
    {
        $region = $this->manager->getOne(intval($id), RegionController::$tableName);

        //si l’utilisateur a cliqué sur "enregistrer"
        if (isset($_POST) && sizeof($_POST) > 0) {
            $donneesPOST = $_POST;
            //on sanitize les donnees POST
            $nomPOST = htmlentities($donneesPOST['nom']);

            //on enregistre l'entité mise à jour
            $regionUpdated = new Region(['id' => $region->getId(), 'nom' => $nomPOST]);
            $this->manager->update($regionUpdated);

            header('Location: /index.php?p=region');
        }

        require_once './src/view/regions/edit-region.php';
    }

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
    {
        if ($this->manager->hasRecipe($id)) {
            $redirection = 'Location: /index.php?p=region&action=edit&id=' . $id . '&error=1';
            header($redirection);
        } else {
            $regionAsuppr = $this->manager->getOne($id, RegionController::$tableName );
            if ($regionAsuppr) {
                $this->manager->delete($id, RegionController::$tableName);
            }
            header('Location: /index.php?p=region');
        }

    }

    public function add()
    {
        if (isset($_POST) && sizeof($_POST) > 0) {
            $donneesPOST = $_POST;
            //on sanitize les donnees POST
            $nomPOST = htmlentities($donneesPOST['nom']);
            $region = new Region(['nom' => $nomPOST]);

            $this->manager->create($region);
            header('location: ./index.php?p=region');
        } else {
            require_once './src/view/regions/ajout-region.php';
        }
    }
}