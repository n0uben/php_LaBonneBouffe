<?php
//Details Recettes
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <p><a href="./index.php?p=recette">Retour à la liste des recettes</a></p>

                <h1>Recette # <?= $recette->getId(); ?> </h1>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="./index.php?p=recette&action=edit&id=<?= $recette->getId(); ?>" method="post" class="row">
                    <div class="form-group mt-2 col-6">
                        <h2>Détails</h2>

                        <label for="nom">Nom*</label>
                        <input required type="text" name="nom" class="form-control" value="<?= $recette->getNom(); ?>">

                        <label for="niveau">Niveau*</label>
                        <input required type="text" name="niveau" class="form-control" value="<?= $recette->getNiveau(); ?>">

                        <label for="tpsPrepa">Préparation (min)*</label>
                        <input required type="text" name="tpsPrepa" class="form-control" value="<?= $recette->getTpsPrepa(); ?>">

                        <label for="tpsCuisson">Cuisson (min) :</label>
                        <input required type="text" name="tpsCuisson" class="form-control"
                               value="<?= $recette->getTpsCuisson(); ?>">

                        <label for="budget">Budget*</label>
                        <input required type="text" name="budget" class="form-control" value="<?= $recette->getBudget(); ?>">

                        <label for="nbPers">Nombre de personnes*</label>
                        <input required type="text" name="nbPers" class="form-control" value="<?= $recette->getNbPers(); ?>">

                        <label for="etapes">Étapes*</label>
                        <textarea required class="form-control" name="etapes" rows="6"><?= $recette->getEtapes(); ?></textarea>

                        <label for="region">Région*</label>
                        <input required type="text" name="region" class="form-control" value="<?= $region->getNom(); ?>">

                        <label for="region">Auteur*</label>
                        <input required type="text" name="region" class="form-control" value="<?= $utilisateur->getNom(); ?>">

                    </div>
                    <div class="col-6">
                        <h2>Les ingrédients</h2>

                        <div class="row">
                            <?php foreach ($ingredients as $ingredient):?>
                                <div class="col-6">
                                    <label for="nomIngredient">Nom de l’ingrédient :</label>
                                    <input type="text" name="nomIngredient" class="form-control" value="<?= $ingredient[0]->getNom(); ?>">
                                </div>
                                <div class="col-3">
                                    <label for="nomIngredient">Quantite :</label>
                                    <input type="text" name="nomIngredient" class="form-control" value="<?= $ingredient[1]; ?>">
                                </div>
                                <div class="col-3">
                                    <label for="nomIngredient">Unite :</label>
                                    <input type="text" name="nomIngredient" class="form-control" value="<?= $ingredient[0]->getUniteMesure(); ?>">
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <input class="btn btn-primary" type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
