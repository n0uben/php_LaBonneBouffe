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
                <input type="text" placeholder="Entrer l'email utilisateur" name="email" required>

                <label><b>Mot de passe *</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN'>
                <?php
                //2 retours a la ligne
                echo '<br>';
                echo '<br>';

                if (isset($_POST['email'])) {
                    $controller = new ConnexionController();
                    $email = htmlentities($_POST['email']);
                    $connected = $controller->connect($email, $_POST['password']);
                    if ($connected) {
                        session_start();
                        $_SESSION["email"] = $email;
                        header('Location: ./index.php');
                    }
                    echo "OOPSIE PAS LE BON EMAIL OU MDP";
                }
                ?>
            </form>
        </div>
    </div>
</div>

<?php
require_once('./src/view/general/footer.php');
?>