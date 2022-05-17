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
                    <div class="form-group mt-2 col-12 col-lg-6 mb-2">
                        <h2>Détails</h2>

                        <label for="nom">Nom*</label>
                        <input required type="text" name="nom" class="form-control" value="<?= $recette->getNom(); ?>">

                        <label for="categorie">Catégorie*</label>
                        <select id="categorie" name="categorie" class="form-select">
                            <option><?= $recette->getCategorie();?></option>
                            <?php foreach ($enumCateg as $enumValue): ?>
                                <?php if ($enumValue !== $recette->getCategorie()):  ?>
                                    <option><?= $enumValue ?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>

                        <label for="niveau">Niveau*</label>
                        <select id="niveau" name="niveau" class="form-select">
                            <option><?= $recette->getNiveau();?></option>
                            <?php foreach ($enumNiveau as $enumValue): ?>
                                <?php if ((int) $enumValue !== $recette->getNiveau()):  ?>
                                    <option><?= $enumValue ?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>

                        <label for="tpsPrepa">Préparation (min)*</label>
                        <input required type="number" min="0" max ="1440" name="tpsPrepa" class="form-control" value="<?= $recette->getTpsPrepa(); ?>">

                        <label for="tpsCuisson">Cuisson (min)* :</label>
                        <input required type="number" min="0" max ="1440" name="tpsCuisson" class="form-control"
                               value="<?= $recette->getTpsCuisson(); ?>">

                        <label for="budget">Budget*</label>
                        <select id="budget" name="budget" class="form-select">
                            <option><?= $recette->getBudget();?></option>
                            <?php foreach ($enumBudget as $enumValue): ?>
                                <?php if ($enumValue !== $recette->getBudget()):  ?>
                                    <option><?= $enumValue ?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>


                        <label for="nbPers">Nombre de personnes*</label>
                        <input required type="number" min="1" max="20" name="nbPers" class="form-control" value="<?= $recette->getNbPers(); ?>">

                        <label for="etapes">Étapes*</label>
                        <textarea required class="form-control" name="etapes" rows="6"><?= $recette->getEtapes(); ?></textarea>

                        <label for="region">Région*</label>
                        <select id="region" name="region" class="form-select">
                            <option><?= $region->getNom();?></option>
                            <?php foreach ($regions as $bddValue): ?>
                                <?php if ($bddValue->getNom() !== $region->getNom()):  ?>
                                    <option><?= $bddValue->getNom() ?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>


                        <label for="auteur">Auteur*</label>
                        <select id="auteur" name="auteur" class="form-select">
                            <option><?= $utilisateur->getNom();?></option>
                            <?php foreach ($utilisateurs as $bddValue): ?>
                                <?php if ($bddValue->getNom() !== $utilisateur->getNom()):  ?>
                                    <option><?= $bddValue->getNom() ?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>

                    </div>
                    <div class="col-12 col-lg-6">
                        <h2>Les ingrédients</h2>

                        <?php foreach ($ingredients as $ingredient):?>
                        <div class="row">
                                <div class="col-6">
                                    // Kevin : Ajout autocompletion
                                    <label for="nomIngredient">Nom de l’ingrédient :</label>
                                    <input required type="text" id="mot" name="nomIngredient" class="form-control" value="<?= $ingredient[0]->getNom(); ?>" onKeyUp="ajaxing()">
                                    <div id=suggestion"></div>
                                    // le script suivant : selectionne la suggestion et la met dans le champ ingredient
                                    <script>
                                        document.getElementById("suggestion").onclick=function(event){
                                            document.getElementById("mot").value=event.target.textContent;
                                        }
                                    </script>
                                </div>
                                <div class="col-3">
                                    <label for="nomIngredient">Quantite :</label>
                                    <input required type="number" min="1" max="999" name="nomIngredient" class="form-control" value="<?= $ingredient[1]; ?>">
                                </div>
                                <div class="col-3">
                                    <label for="uniteMesure">Unite :</label>
                                    <select id="uniteMesure" name="uniteMesure" class="form-select">
                                        <option><?= $ingredient[0]->getUniteMesure();?></option>
                                        <?php foreach ($enumUnite as $enumValue): ?>
                                            <?php if ($enumValue !== $ingredient[0]->getUniteMesure()):  ?>
                                                <option><?= $enumValue ?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                        </div>
                        <?php endforeach;?>
                        <div class="row">
                            <div id="newIngredients" class="col">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-end mt-4">
                                <a id="addNewIngredient" class="btn btn-primary">Ajouter un Ingrédient</a>
                            </div>
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