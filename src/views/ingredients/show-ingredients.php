<?php
//Liste Ingredients
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">

                <h1>
                    Ingrédients #<?= $ingredient->getId(); ?>
                </h1>

                <table class="table table-striped">
                    <thead>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Unité</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $ingredient->getId(); ?></td>
                            <td><?= $ingredient->getNom(); ?></td>
                            <td><?= $ingredient->getUniteMesure(); ?></td>
                        </tr>
                    </tbody>
                </table>

                <p><a href="/index.php?p=liste-ingredients">Retour à la liste des ingrédients</a> </p>
            </div>
        </div>
    </div>
</main>
