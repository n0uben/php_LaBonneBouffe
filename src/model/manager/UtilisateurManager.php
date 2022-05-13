<?php

/*
 * Pour l'instanr je n'ai fait que copier/m'inspiré du cours de PHP sur la PDO
 */

require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/DbManager.php';
require_once './src/model/entity/Utilisateur.php';

class UtilisateurManager extends EntityManager
{
    private $bdd;

    public function setBdd(PDO $bdd){
    $this->bdd = $bdd;
    }

    public function __construct($bdd){
        $this->setBdd($bdd);
    }

    public function add(Utilisateur $utilisateur){
        $req = $this->bdd->prepare('INSERT INTO Utilisateur(email, mdp, nom, role) VALUES(:email, :mdp, :nom, :role)');

        $req->blindValue(':email', $utilisateur->getEmail(), PDO::PARAM_STR);
        $req->blindValue(':email', $utilisateur->getMdp(), PDO::PARAM_STR);
        $req->blindValue(':email', $utilisateur->getNom(), PDO::PARAM_STR);
        $req->blindValue(':email', $utilisateur->getRole(), PDO::PARAM_STR);

        $req->execute();
    }

    public function delete(Utilisateur $utilisateur){
        $this->bdd->exec('DELETE FROM Utilisateur WHERE id = '.$utilisateur->getId());
    }

    public function get($id){
        $id = (string) $id;

        $req = $this->bdd->prepare('SELECT * FROM Utilisateur WHERE id = ?'); // WHERE à supprimer ???
        $req->excecute(array($id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);

        $user = new Utilisateur();

        $user->hydrate($donnees);

        return $user;
    }

    public function getAll(){

    }

    public function update(Utilisateur $utilisateur){

    }

}