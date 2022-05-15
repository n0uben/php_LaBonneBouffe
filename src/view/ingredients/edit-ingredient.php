<?php
//Details Ingredients
//if ($ingredient):
//
//test si code erreur suppression present
$messageErreur = '';
if (isset($_GET['error'])) {
    if ($_GET['error'] == '1') {
        $messageErreur = 'Cet ingrédient est utilisé dans une ou plusieurs recettes ! <br>Vous ne pouvez pas le supprimer, essayez de le modifier plutôt :';
    }
}
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">

                <p><a href="./index.php?p=ingredient">Retour à la liste des ingrédients</a></p>
                <h1>
                    Modifier l’ingrédient #<?= $ingredient->getId(); ?>
                </h1>
                <?php if ($messageErreur): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $messageErreur; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="./index.php?p=ingredient&action=edit&id=<?= $ingredient->getId(); ?>" method="post">
                    <div class="form-group mt-2">

                        <label for="nom">Nom de l’ingrédient*</label>
                        <input id="nom" required type="text" name="nom" class="form-control"
                               value="<?= $ingredient->getNom(); ?>">

                        <label for="uniteMesure">Unité de mesure*</label>

                        <select id="uniteMesure" name="uniteMesure" class="form-select">
                            <option><?= $ingredient->getUniteMesure(); ?></option>
                            <?php foreach ($enumUnite as $enumValue): ?>
                                <?php if ($enumValue !== $ingredient->getUniteMesure()): ?>
                                    <option><?= $enumValue ?></option>
                                <?php endif; ?>
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
<?php //endif;?>
