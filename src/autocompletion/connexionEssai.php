<?php
    try{
        $pdo = PDO("mysql:host=localhost;dbname=php_LaBonneBouffe", "root", "root");
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>