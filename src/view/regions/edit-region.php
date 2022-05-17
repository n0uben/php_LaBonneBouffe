<?php
//Details Ingredients

$messageErreur = '';
if (isset($_GET['error'])) {
    if ($_GET['error'] == '1') {
        $messageErreur = 'Cette région contient une ou plusieurs recettes ! <br>Vous ne pouvez pas la supprimer, essayez plutôt de la modifier :';
    }
}
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">

                <p><a href="./index.php?p=region">Retour à la liste des régions</a> </p>
                <h1>
                    Modifier la région #<?= $region->getId(); ?>
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
                <form action="./index.php?p=region&action=edit&id=<?= $region->getId(); ?>" method="post">
                    <div class="form-group mt-2">
                        <label for="nom">Nom*</label>
                        <input required type="text" name="nom" class="form-control" value="<?= $region->getNom();?>">
                    </div>
                    <div class="form-group mt-4">
                        <a class="btn btn-danger" href="./index.php?p=region&action=delete&id=<?=$region->getId()?>"><i class="fa-solid fa-trash-can"></i> Supprimer</a>
                        <input class="btn btn-primary" type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
