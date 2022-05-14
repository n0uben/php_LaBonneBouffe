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

        require_once './src/view/regions/edit-region.php';
    }
}