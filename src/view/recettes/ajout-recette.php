<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <p><a href="./index.php?p=recette">Retour à la liste des recettes</a></p>

                <h1>Ajout d'une recette</h1>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">

                <form action="./index.php?p=recette&action=add" method="post" class="row">
                    <div class="form-group mt-2 col-12 col-lg-6 mb-2">
                        <h2>Détails</h2>

                        <label for="nom">Nom*</label>
                        <input required type="text" name="nom" class="form-control" value="">

                        <label for="categorie">Catégorie*</label>
                        <select id="categorie" name="categorie" class="form-select">
                            <option></option>
                                    <option></option>

                        </select>

                        <label for="niveau">Niveau*</label>
                        <select id="niveau" name="niveau" class="form-select">
                            <option></option>
                                    <option></option>

                        </select>

                        <label for="tpsPrepa">Préparation (min)*</label>
                        <input required type="number" min="0" max ="1440" name="tpsPrepa" class="form-control" value="">

                        <label for="tpsCuisson">Cuisson (min)* :</label>
                        <input required type="number" min="0" max ="1440" name="tpsCuisson" class="form-control"
                               value="">

                        <label for="budget">Budget*</label>
                        <select id="budget" name="budget" class="form-select">
                            <option></option>

                        </select>


                        <label for="nbPers">Nombre de personnes*</label>
                        <input required type="number" min="1" max="20" name="nbPers" class="form-control" value="">

                        <label for="etapes">Étapes*</label>
                        <textarea required class="form-control" name="etapes" rows="6"></textarea>

                        <label for="region">Région*</label>
                        <select id="region" name="region" class="form-select">
                            <option></option>

                                    <option></option>

                        </select>


                        <label for="auteur">Auteur*</label>
                        <select id="auteur" name="auteur" class="form-select">
                            <option></option>
                                    <option></option>

                        </select>

                    </div>
                    <div class="col-12 col-lg-6">
                        <h2>Les ingrédients</h2>


                        <div class="row">
                                <div class="col-6">
                                    <label for="nomIngredient">Nom de l’ingrédient :</label>
                                    <input required type="text" name="nomIngredient" class="form-control" value="<?= $ingredient[0]->getNom(); ?>">
                                </div>
                                <div class="col-3">
                                    <label for="nomIngredient">Quantite :</label>
                                    <input required type="number" min="1" max="999" name="nomIngredient" class="form-control" value="<?= $ingredient[1]; ?>">
                                </div>
                                <div class="col-3">
                                    <label for="uniteMesure">Unite :</label>
                                    <select id="uniteMesure" name="uniteMesure" class="form-select">
                                        <option></option>
                                                <option></option>

                                    </select>
                                </div>
                        </div>
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
<!--                        <a class="btn btn-danger" href='./index.php?p=recette&action=delete&id=--><?//= $recette->getId(); ?><!--'><i class="fa-solid fa-trash-can"></i> Supprimer</a>-->
                        <input class="btn btn-primary" type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
