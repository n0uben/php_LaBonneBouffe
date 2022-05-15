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
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe *</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN'>
                <?php
                //2 retours a la ligne
                echo '<br>';
                echo '<br>';

                if (isset($_POST['username'])) {
                    $controller = new ConnexionController();
                    $connected = $controller->connect($_POST['username'], $_POST['password']);
                    if ($connected) {
                        header('Location: ./index.php');
                    }
                    echo "OOPSIE PAS LE BON EMAIL";
                }
                ?>
            </form>
        </div>
    </div>
</div>

<?php
require_once('./src/view/general/footer.php');
?>