<?php
//Liste Ingredients
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">

                <h1>Liste des ingrédients</h1>

                <table class="table table-striped">
                    <thead>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Unité</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($ingredients as $ingredient):
                        ?>
                        <tr>
                            <td><?= $ingredient->getId(); ?></td>
                            <td><?= $ingredient->getNom(); ?></td>
                            <td><?= $ingredient->getUniteMesure(); ?></td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>

                <p><a href="/index.php?p=home">Retour au tableau de bord</a> </p>


            </div>
        </div>
    </div>
</main>
