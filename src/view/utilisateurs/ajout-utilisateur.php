<?php
//Details Utilisateurs
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <p><a href="/index.php?p=utilisateur">Retour à la liste des utilisateurs</a> </p>

                <h1>Modifier l'utilisateur #</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="./index.php?p=utilisateur&action=add" method="post">
                    <div class="form-group mt-2">
                        <label for="email">Email*</label>
                        <input required type="text" name="email" class="form-control" value="">

                        <label for="nom">Nom*</label>
                        <input required type="text" name="nom" class="form-control" value="">

                        <label for="mdp">Mot de passe*</label>
                        <input required type="password" name="mdp" class="form-control" value="">

                        <label for="role">Role*</label>
                        <input required type="text" name="role" class="form-control" value="">
                    </div>
                    <div class="form-group mt-4">
                        <a class="btn btn-danger" href='./index.php?p=utilisateur&action=add'><i class="fa-solid fa-trash-can"></i> Supprimer</a>
                        <input class="btn btn-primary" type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
