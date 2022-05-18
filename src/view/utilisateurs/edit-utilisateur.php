<?php
//Details Utilisateurs
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <p><a href="./index.php?p=utilisateur">Retour à la liste des utilisateurs</a> </p>

                <h1>Modifier l'utilisateur #<?= $utilisateur->getId(); ?></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="./index.php?p=utilisateur&action=edit&id=<?= $utilisateur->getId(); ?>" method="post">
                    <div class="form-group mt-2">
                        <label for="email">Email*</label>
                        <input required type="text" name="email" class="form-control" value="<?= $utilisateur->getEmail();?>">

                        <label for="nom">Nom*</label>
                        <input required type="text" name="nom" class="form-control" value="<?= $utilisateur->getNom();?>">

                        <label for="mdp">Mot de passe*</label>
                        <input required type="password" name="mdp" class="form-control" value="<?= $utilisateur->getMdp();?>">

                        <label for="role">Role*</label>
                        <select id="uniteMesure" name="role" class="form-select">
                            <option><?= $utilisateur->getRole(); ?></option>
                            <?php foreach ($enumRole as $enumValue): ?>
                                <?php if ($enumValue !== $utilisateur->getRole()): ?>
                                    <option><?= $enumValue ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <a class="btn btn-danger" href='./index.php?p=utilisateur&action=delete&id=<?= $utilisateur->getId(); ?>'><i class="fa-solid fa-trash-can"></i> Supprimer</a>
                        <input class="btn btn-primary" type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
