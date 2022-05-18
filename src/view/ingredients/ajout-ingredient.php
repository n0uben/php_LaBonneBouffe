<?php
// Pour le menu deroulant des quantités :
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">

                <p><a href="./index.php?p=ingredient">Retour à la liste des ingrédients</a></p>
                <h1>
                    Ajouter un ingrédient
                </h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="./index.php?p=ingredient&action=add" method="post">
                    <div class="form-group mt-2">

                        <label for="nom">Nom de l’ingrédient*</label>
                        <input id="nom" required type="text" name="nom" class="form-control"
                               value="">

                        <label for="uniteMesure">Unité de mesure*</label>

                        <select id="uniteMesure" name="uniteMesure" class="form-select">
                            <option></option>
                            <?php foreach ($enumUnite as $enumValue): ?>
                                    <option><?= $enumValue ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <input class="btn btn-primary" type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

