<?php
    include("./src/model/manager/DbManager.php");
    $bdd = DbManager::DBConnect();
    $mot = $_POST["mot"];
    $req = $bdd->prepare("SELECT nom FROM Ingredient WHERE nom LIKE ?");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array(trim($mot), "%"));
    $tab = $req->fetchAll();
    for ($i=0; $i<count($tab);$i++){
        // format
        echo "<div>".$tab[$i]["nom"]."</div>";
    }
?>