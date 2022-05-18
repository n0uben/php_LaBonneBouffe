<?php
//Liste Ingredients
?>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Liste des régions</h1>

                <a class="btn btn-primary" href='./index.php?p=region&action=add'><i class="fa-solid fa-pen-to-square"></i> Ajouter</a>

                <table class="table table-striped">
                    <thead>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Actions</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($regions as $region): ?>
                        <tr>
                            <td><?= $region->getId(); ?></td>
                            <td><?= $region->getNom(); ?></td>
                            <td>
                                <a class="btn btn-primary" href='./index.php?p=region&action=edit&id=<?= $region->getId(); ?>'><i class="fa-solid fa-pen-to-square"></i> Modifier</a> -
                                <a class="btn btn-danger" href="./index.php?p=region&action=delete&id=<?=$region->getId()?>"><i class="fa-solid fa-trash-can"></i> Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
