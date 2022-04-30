<?php
//Liste Ingredients
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">

                <h1>Liste des utilisateurs</h1>

                <table class="table table-striped">
                    <thead>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Unité</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($utilisateurs as $utilisateur):
                        ?>
                        <tr>
                            <td><?= $utilisateur->getEmail(); ?></td>
                            <td><?= $utilisateur->getNom(); ?></td>
                            <td><?= $utilisateur->getRole(); ?></td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>

                <p><a href="/index.php?p=home">Retour au tableau de bord</a> </p>


            </div>
        </div>
    </div>
</main>
