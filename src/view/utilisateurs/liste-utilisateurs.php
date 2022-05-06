<?php
//Liste utilisateurs
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <p><a href="/index.php?p=home">Retour au tableau de bord</a> </p>

                <h1>Liste des utilisateurs</h1>

                <table class="table table-striped">
                    <thead>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($utilisateurs as $utilisateur):
                        ?>
                        <tr>
                            <td><?= $utilisateur->getId(); ?></td>
                            <td><?= $utilisateur->getEmail(); ?></td>
                            <td><?= $utilisateur->getNom(); ?></td>
                            <td><?= $utilisateur->getRole(); ?></td>
                            <td><a href='index.php?p=utilisateur&action=edit&id=<?= $utilisateur->getId(); ?>'>Modifier l’utilisateur</a></td>
                            <td><a href='index.php?p=utilisateur&action=delete&id=<?= $utilisateur->getId(); ?>'>Supprimer l’utilisateur</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>