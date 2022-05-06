<?php
//Details Recettes
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">

                <h1>
                    Recette #<?= $recette->getId(); ?>
                </h1>

                <table class="table table-striped">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Niveau</th>
                        <th scope="col">Temps Prépa</th>
                        <th scope="col">Temps Cuisson</th>
                        <th scope="col">Budget</th>
                        <th scope="col">Nb Pers.</th>
                        <th scope="col">Étapes</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $recette->getId(); ?></td>
                            <td><?= $recette->getNom(); ?></td>
                            <td><?= $recette->getNiveau(); ?></td>
                            <td><?= $recette->getTpsPrepa(); ?></td>
                            <td><?= $recette->getTpsCuisson(); ?></td>
                            <td><?= $recette->getBudget(); ?></td>
                            <td><?= $recette->getNbPers(); ?></td>
                            <td><?= $recette->getEtapes(); ?></td>
                        </tr>
                    </tbody>
                </table>

                <p><a href="/index.php?p=recette">Retour à la liste des recettes</a> </p>
            </div>
        </div>
    </div>
</main>
