<?php
//Details Utilisateurs
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <p><a href="/index.php?p=utilisateur">Retour à la liste des utilisateurs</a> </p>

                <h1>Ingrédients #<?= $utilisateur->getId(); ?></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="./index.php?p=utilisateur&action=update&id=<?= $utilisateur->getId(); ?>" method="post">
                    <div class="form-group mt-2">
                        <label for="email">Email :</label>
                        <input type="text" name="email" class="form-control" value="<?= $utilisateur->getEmail();?>">

                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" class="form-control" value="<?= $utilisateur->getNom();?>">

                        <label for="role">Role :</label>
                        <input type="text" name="role" class="form-control" value="<?= $utilisateur->getRole();?>">
                    </div>
                    <div class="form-group mt-4">
                        <input class="btn btn-primary" type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
