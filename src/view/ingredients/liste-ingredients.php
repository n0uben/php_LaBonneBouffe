<?php
//Liste Ingredients
?>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Liste des ingrédients</h1>

                <a class="btn btn-primary" href='./index.php?p=ingredient&action=add'><i class="fa-solid fa-pen-to-square"></i> Ajouter</a>

                <table class="table table-striped">
                    <thead>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Unité</th>
                    <th scope="col">Actions</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($ingredients as $ingredient): ?>
                        <tr>
                            <td><?= $ingredient->getId(); ?></td>
                            <td><?= $ingredient->getNom(); ?></td>
                            <td><?= $ingredient->getUniteMesure(); ?></td>
                            <td><a class="btn btn-primary" href='./index.php?p=ingredient&action=edit&id=<?= $ingredient->getId(); ?>'><i class="fa-solid fa-pen-to-square"></i> Modifier</a> - <a class="btn btn-danger" href="./index.php?p=ingredient&action=delete&id=<?=$ingredient->getId()?>"><i class="fa-solid fa-trash-can"></i> Supprimer</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
