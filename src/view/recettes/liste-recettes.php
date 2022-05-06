<?php
//Liste Recettes
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <p><a href="/index.php?p=home">Retour au tableau de bord</a> </p>

                <h1>Liste des recettes</h1>

                <table class="table table-striped">
                    <thead>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Niveau</th>
                    <th scope="col">Temps Prépa</th>
                    <th scope="col">Temps Cuisson</th>
                    <th scope="col">Budget</th>
                    <th scope="col">Nb Pers.</th>
                    <th scope="col">Actions</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($recettes as $recette):
                        ?>
                        <tr>
                            <td><?= $recette->getId(); ?></td>
                            <td><?= $recette->getNom(); ?></td>
                            <td><?= $recette->getNiveau(); ?></td>
                            <td><?= $recette->getTpsPrepa(); ?></td>
                            <td><?= $recette->getTpsCuisson(); ?></td>
                            <td><?= $recette->getBudget(); ?></td>
                            <td><?= $recette->getNbPers(); ?></td>
                            <td><a href='index.php?p=recette&action=edit&id=<?= $recette->getId(); ?>'>Voir la recette</a></td>
                            <td><a href='index.php?p=recette&action=delete&id=<?= $recette->getId(); ?>'>Voir la recette</a></td>

                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
