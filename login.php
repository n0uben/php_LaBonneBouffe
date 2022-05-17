<?php
require_once './src/view/general/header.php';
require_once './src/controller/ConnexionController.php';
require_once './src/model/manager/UtilisateurManager.php';

?>

<div class="container">
    <!-- zone de connexion -->
    <div class="row">
        <div class="col">
            <form action="./login.php" method="POST">
                <h1>Connexion</h1>

                <label><b>Nom d'utilisateur *</b></label>
                <input type="email" placeholder="Entrer l'email utilisateur" name="email" required>

                <label><b>Mot de passe *</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN'>
                <?php
                //2 retours a la ligne
                echo '<br>';
                echo '<br>';

                if (isset($_POST['email']) && isset($_POST['password'])) {
                    $email = htmlentities($_POST['email']);
                    $password = htmlentities($_POST['password']);

                    //on tente la connection, renvoie true ou false
                    $connected = ConnexionController::connect($email, $password);

                    if ($connected) {
                        //on recupere l'utilisateur enregistré en BDD
                        $utilisateurManager = new UtilisateurManager();
                        $utilisateur = $utilisateurManager->getByEmail($email);
                        session_start();

                        //on initie les variables de session de l'utilisateur
                        $_SESSION["email"] = $utilisateur->getEmail();
                        $_SESSION["nom"] = $utilisateur->getNom();
                        $_SESSION["password"] = $utilisateur->getMdp();
                        $_SESSION['role'] = $utilisateur->getRole();

                        //on renvoie vers l'accueil du backoffice
                        header('Location: ./index.php');
                    }
                    echo "Votre email ou votre mot de passe ne sont pas corrects.";
                }

                //on test si l'utilisateur veut se déconnecter
                if (isset($_GET['disconnect'])) {
                    if ($_GET['disconnect'] == "true") {
                        ConnexionController::destroySession();
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>

<?php
require_once('./src/view/general/footer.php');
?>