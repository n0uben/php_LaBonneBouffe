<?php

/*
 *
 */

require_once './src/model/manager/EntityManager.php';
require_once './src/model/manager/DbManager.php';
require_once './src/model/entity/Utilisateur.php';

class UtilisateurManager extends EntityManager
{
    /**
     * @param string $email
     * @return Utilisateur
     */
    public function getByEmail(string $email)
    {
        $bdd = DbManager::DBConnect();

        $requete = $bdd->prepare('SELECT * FROM Utilisateur WHERE email = :email');
        $requete->bindValue(':email', $email);
        $requete->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $requete->execute();
        $user = $requete->fetch();
        return $user;
    }
    /**
     * @param string $mdp
     * @return Utilisateur
     */
    public function getByMDP(string $mdp)
    {
        $bdd = DbManager::DBConnect();

        $requete = $bdd->prepare('SELECT * FROM Utilisateur WHERE mdp = :mdp');
        $requete->bindValue(':mdp', $mdp);
        $requete->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $requete->execute();
        $user = $requete->fetch();
        return $user;
    }

//    private $bdd;
//
//    public function setBdd(PDO $bdd){
//    $this->bdd = $bdd;
//    }
//
//    public function __construct($bdd){
//        $this->setBdd($bdd);
//    }
//
//    public function add(Utilisateur $utilisateur){
//        $req = $this->bdd->prepare('INSERT INTO Utilisateur(email, mdp, nom, role) VALUES(:email, :mdp, :nom, :role)');
//
//        $req->blindValue(':email', $utilisateur->getEmail(), PDO::PARAM_STR);
//        $req->blindValue(':email', $utilisateur->getMdp(), PDO::PARAM_STR);
//        $req->blindValue(':email', $utilisateur->getNom(), PDO::PARAM_STR);
//        $req->blindValue(':email', $utilisateur->getRole(), PDO::PARAM_STR);
//
//        $req->execute();
//    }
//
//    public function delete(Utilisateur $utilisateur){
//        $this->bdd->exec('DELETE FROM Utilisateur WHERE id = '.$utilisateur->getId());
//    }
//
//    public function get($id){
//        $id = (string) $id;
//
//        $req = $this->bdd->prepare('SELECT * FROM Utilisateur WHERE id = ?');
//        $req->excecute(array($id));
//        $donnees = $req->fetch(PDO::FETCH_ASSOC);
//
//        $user = new Utilisateur();
//
//        $user->hydrate($donnees);
//
//        return $user;
//    }
//
//    public function getAll(){
//        $utilisateurs = [];
//
//        $req = $this->bdd->query('SELECT * FROM Utilisateurs');
//
//        while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
//            $utilisateur = new Utilisateur();
//            $utilisateur->hydrate($donnees);
//            $utilisateurs[] = $utilisateur;
//        }
//
//        return $utilisateurs;
//    }
//
//    public function update(Utilisateur $utilisateur)
//    {
//        $req = $this->bdd->prepare('UPDATE users SET email = :email, mdp = :mdp, nom = :nom, role = :role WHERE id = :id')
//
//        $req->blindValue(':email', $utilisateur->getEmail(), PDO::PARAM_STR);
//        $req->blindValue(':email', $utilisateur->getMdp(), PDO::PARAM_STR);
//        $req->blindValue(':email', $utilisateur->getNom(), PDO::PARAM_STR);
//        $req->blindValue(':email', $utilisateur->getRole(), PDO::PARAM_STR);
//
//        $req->execute();
//    }
//
//    public function login($nom){
//        $req = $this->prepare('SELECT * FROM Utilisateur WHERE nom = ?');
//        $req->execute(array($seudo));
//        if($donnees = $req->fetch(PDO::FETCH_ASSOC)){
//            $utilisateur = new Utilisateur();
//            $utilisateur->hydrate($donnees);
//
//            return $utilisateur;
//        }
//        else{
//            return false;
//        }
//    }
}