<?php
require_once './src/view/general/header.php';
require_once './src/controller/ConnexionController.php';
require_once './src/model/manager/UtilisateurManager.php';

?>

<div class="container-fluid bg-secondary">
    <!-- zone de connexion -->
    <div class="row">
        <div class="col">
            <form action="./login.php" method="POST">
                <h1 class="text-white">Connexion</h1>

                <label for="email"><b>Nom d'utilisateur *</b></label>
                <input class="form-control" type="email" placeholder="Entrer l'email utilisateur" name="email" required>

                <label for="password"><b>Mot de passe *</b></label>
                <input class="form-control" type="text" placeholder="Entrer le mot de passe" name="password" required>

                <input class="btn btn-primary" type="submit" id='submit' value='LOGIN'>
                <?php
                echo '<br>';
                echo '<br>';

                //si l'utilisateur tente de se connecter
                if (isset($_POST['email']) && isset($_POST['password'])) {
                    $email = htmlentities($_POST['email']);
                    $password = htmlentities($_POST['password']);

                    //on tente la connection
                    $connected = ConnexionController::connect($email, $password);

                    if ($connected) {
                        //on démarre la session
                        ConnexionController::initSession($email);
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