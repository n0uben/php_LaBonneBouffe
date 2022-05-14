<?php
require_once './src/view/general/header.php';
require_once './src/controller/ConnexionController.php';

if (isset($_POST)) {
    $controller = new ConnexionController();
    $controller->connect();
}

?>

<div class="container">
    <!-- zone de connexion -->
    <div class="row">
        <div class="col">
            <form action="login.php" method="POST">
                <h1>Connexion</h1>

                <label><b>Nom d'utilisateur *</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe *</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN'>
                <?php

                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
    </div>
</div>

<?php
require_once('./src/view/general/footer.php');
?>