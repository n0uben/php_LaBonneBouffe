<?php
//Details Recettes
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <p><a href="./index.php?p=recette">Retour à la liste des recettes</a> </p>

                <h1>Recette # <?= $recette->getId(); ?> </h1>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="./index.php?p=recette&action=update&id=<?= $recette->getId(); ?>" method="post">
                    <div class="form-group mt-2">
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" class="form-control" value="<?= $recette->getNom();?>">

                        <label for="niveau">Niveau :</label>
                        <input type="text" name="niveau" class="form-control" value="<?= $recette->getNiveau();?>">

                        <label for="tpsPrepa">Préparation (min) :</label>
                        <input type="text" name="tpsPrepa" class="form-control" value="<?= $recette->getTpsPrepa();?>">

                        <label for="tpsCuisson">Cuisson (min) :</label>
                        <input type="text" name="tpsCuisson" class="form-control" value="<?= $recette->getTpsCuisson();?>">

                        <label for="budget">Budget :</label>
                        <input type="text" name="budget" class="form-control" value="<?= $recette->getBudget();?>">

                        <label for="nbPers">Nombre de personnes :</label>
                        <input type="text" name="nbPers" class="form-control" value="<?= $recette->getNbPers();?>">

                        <label for="etapes">Étapes :</label>
                        <textarea class="form-control" name="etapes" rows="6"><?= $recette->getEtapes();?></textarea>
                    </div>
                    <div class="form-group mt-4">
                        <input class="btn btn-primary" type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
