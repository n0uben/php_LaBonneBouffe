<?php

require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/EntityManager.php';
require_once './src/model/entity/Recette.php';

class RecetteManager extends EntityManager
{

    /**
     * @return Recette[]
     */
    public function getAll(): iterable
    {
//        $recettes = [];
//
//        $bdd = $this->DBConnect();
//        $requete = $bdd->query('SELECT * FROM Recettes');
//
//        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {
//
//            $recette = new Recette($donnees['nom'], $donnees['categorie'], $donnees['niveau'], $donnees['tpsPrepa'], $donnees['tpsCuisson'], $donnees['budget'], $donnees['nbPers'], $donnees['etapes'], $donnees['utilisateurID']);
//            $recette->setId($donnees['id']);
//
//            $recettes[] = $recette;
//        }
//
//        return $recettes;
    }

    /**
     * @param Recette $recette
     * @return void
     */
    public function save(Recette $recette): void
    {
//        $bdd = $this->DBConnect();
//
//        $requete = $bdd->prepare('INSERT INTO Recettes (nom, categorie, niveau, tpsPrepa, tpsCuisson, budget, nbPers, etapes, utilisateurID, regionID) VALUES (:nom, :categorie, :niveau, :tpsPrepa, :tpsCuisson, :budget, :nbPers, :etapes, :utilisateurID, :regionID)');
//        $requete->bindValue(':nom', $recette->getNom());
//        $requete->bindValue(':categorie', $recette->getCategorie());
//        $requete->bindValue(':niveau', $recette->getNiveau());
//        $requete->bindValue(':tpsPrepa', $recette->getTpsPrepa());
//        $requete->bindValue(':tpsCuisson', $recette->getTpsCuisson());
//        $requete->bindValue(':budget', $recette->getBudget());
//        $requete->bindValue(':nbPers', $recette->getNbPers());
//        $requete->bindValue(':etapes', $recette->getEtapes());
//        $requete->bindValue(':utilisateurID', $recette->getUtilisateurID());
//        $requete->bindValue(':regionID', $recette->getRegionID());
//
//        $requete->execute();
    }

    /**
     * @param Recette $recette
     * @return void
     */
    public function modify(Recette $recette): void
    {
//        $bdd = $this->DBConnect();
//
//        $requete = $bdd->prepare('UPDATE Recettes SET nom = :nom, categorie = :categorie, niveau = :niveau, tpsPrepa = :tpsPrepa, tpsCuisson = :tpsCuisson, budget = :budget, nbPers = :nbPers, etapes = :etapes, utilisateurID = :utilisateurID, regionID = :regionID WHERE id = :id');
//        $requete->bindValue(':nom', $recette->getNom());
//        $requete->bindValue(':categorie', $recette->getCategorie());
//        $requete->bindValue(':niveau', $recette->getNiveau());
//        $requete->bindValue(':tpsPrepa', $recette->getTpsPrepa());
//        $requete->bindValue(':tpsCuisson', $recette->getTpsCuisson());
//        $requete->bindValue(':budget', $recette->getBudget());
//        $requete->bindValue(':nbPers', $recette->getNbPers());
//        $requete->bindValue(':etapes', $recette->getEtapes());
//        $requete->bindValue(':utilisateurID', $recette->getUtilisateurID());
//        $requete->bindValue(':regionID', $recette->getRegionID());
//
//        $requete->execute();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
//        $bdd = $this->DBConnect();
//
//        $requete = $bdd->prepare('DELETE FROM Recettes WHERE id = :id ');
//        $requete->bindValue(':id', $id);
//
//        $requete->execute();
    }
}