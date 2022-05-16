<?php

require_once './src/model/manager/UtilisateurManager.php';

class ConnexionController
{
    /**
     * @param string $email
     * retourne un utilisateur si il existe, SINON false
     */
    public function connect(string $email, string $mdp)
    {
        $utilisateurManager = new UtilisateurManager();
        $utilisateur = $utilisateurManager->getByEmail($email) && $utilisateurManager->getByMDP($email, $mdp);
        echo $mdp;
        return $utilisateur;
    }

    public function hashMDP(string $mdp){
        return password_hash($mdp, PASSWORD_ARGON2I);
    }

//    public function disconnect()
//    {
//        header('Location: ./login.php');
//    }

}

//
//require_once __DIR__ . './../model/manager/DbManager.php';
////require_once  __DIR__.'./../model/manager/UtilisateurManager.php';
//session_start();
//if(isset($_POST['username']) && isset($_POST['password']))
//{
//
//    $db = DbManager::DBConnect();
//
//    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
//    // pour eviter les attaques de type injections SQL ou XSS
//    $username = htmlspecialchars($_POST['username']);
//    $password = htmlspecialchars($_POST['password']);
//
//    if($username !== "" && $password !== "")
//    {
////        $utilisateurManager = new UtilisateurManager();
////        $utilisateur = $utilisateurManager->getByEmail($username);
//
//
////        $requete = "SELECT count(*) FROM Utilisateur where
////              email = '".$username."' and mdp = '".$password."' ";
////        $exec_requete = mysqli_query($db,$requete);
////        $reponse      = mysqli_fetch_array($exec_requete);
////        $count = $reponse['count(*)'];
//
//
//        if(1)//$utilisateur->getMdp() == $password) // mot de passe correctes
//        {
//            $_SESSION['username'] = $username;
//            header('Location: http://localhost/php_LaBonneBouffe/index.php');
//        }
//        else
//        {
//            header('Location: http://localhost/php_LaBonneBouffe/login.php?erreur=1'); // utilisateur ou mot de passe incorrect
//        }
//    }
//    else
//    {
//        header('Location: http://localhost/php_LaBonneBouffe/login.php?erreur=2'); // utilisateur ou mot de passe vide
//    }
//}
//else
//{
//    header('Location: http://localhost/php_LaBonneBouffe/login.php');
//}