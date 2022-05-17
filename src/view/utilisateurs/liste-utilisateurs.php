<?php
//Liste utilisateurs
?>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
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
                            <td>
                                <a class="btn btn-primary" href='./index.php?p=utilisateur&action=edit&id=<?= $utilisateur->getId(); ?>'><i class="fa-solid fa-pen-to-square"></i> Modifier</a> -
                                <a class="btn btn-danger" href='./index.php?p=utilisateur&action=delete&id=<?= $utilisateur->getId(); ?>'><i class="fa-solid fa-trash-can"></i> Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>