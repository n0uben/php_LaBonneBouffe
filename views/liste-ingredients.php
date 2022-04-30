<?php
//Liste Ingredients
?>

<div class="container">
    <div class="row">
        <div class="col">

                <table class="table">
                <thead>
                    <th>#</th>
                    <th>#</th>
                    <th>#</th>
                </thead>
                <tbody>
                <?php foreach ($ingredients as $ingredient): ?>
                <tr>
                    <td><?= $ingredients[0]->getNom(); ?></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>

            <?php endforeach; ?>
        </div>
    </div>
</div>
