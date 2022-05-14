<?php
require_once './src/model/manager/RegionManager.php';

class RegionController
{
    private static string $tableName = 'Region';
    /**
     * @return void
     */
    public static function index(): void
    {
        $manager = new RegionManager();
        var_dump($manager);
        $regions = $manager->getAll(RegionController::$tableName);

        require_once './src/view/regions/liste-regions.php';

    }

    /**
     * @param string $id
     * @return void
     */
    public static function edit(string $id): void
    {
        $manager = new RegionManager();
        $region = $manager->getOne(intval($id), RegionController::$tableName);

        //si l’utilisateur a cliqué sur "enregistrer"
        if (isset($_POST)) {
            $donneesPOST = $_POST;
            //on sanitize les donnees POST
            $nomPOST = htmlentities($donneesPOST['nom']);

            //on enregistre l'entité mise à jour
            $regionUpdated = new Region(['id' => $region->getId(), 'nom' => $nomPOST]);
            $manager->update($regionUpdated);

            //on récupère l'entité à jour depuis la bdd
            $region = $manager->getOne(intval($id), RegionController::$tableName);
        }

        require_once './src/view/regions/edit-region.php';
    }
}