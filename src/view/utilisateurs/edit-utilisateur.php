<?php
//Details Utilisateurs
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <p><a href="/index.php?p=utilisateur">Retour à la liste des utilisateurs</a> </p>

                <h1>Ingrédients #<?= $utilisateur->getId(); ?></h1>

                <table class="table table-striped">
                    <thead>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Role</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $utilisateur->getId(); ?></td>
                        <td><?= $utilisateur->getEmail(); ?></td>
                        <td><?= $utilisateur->getNom(); ?></td>
                        <td><?= $utilisateur->getRole(); ?></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</main>
