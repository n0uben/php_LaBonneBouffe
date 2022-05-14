<?php
//Details Ingredients
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">

                <p><a href="./index.php?p=ingredient">Retour à la liste des ingrédients</a> </p>
                <h1>
                    Modifier l’ingrédient #<?= $ingredient->getId(); ?>
                </h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="index.php?p=ingredient&action=update&id=<?= $ingredient->getId(); ?>" method="post">
                    <div class="form-group mt-2">
                        <label for="nom">Nom de l’ingrédient*</label>
                        <input required type="text" name="nom" class="form-control" value="<?= $ingredient->getNom();?>">

                        <label for="unite">Unité de mesure*</label>
                        <input required type="text" name="unite" class="form-control" value="<?= $ingredient->getUniteMesure();?>">
                    </div>
                    <div class="form-group mt-4">
                        <input class="btn btn-primary" type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
