<main>
    <div class="container">
        <div class="row">
            <div class="col">

                <p><a href="./index.php?p=region">Retour à la liste des régions</a> </p>
                <h1>
                    Ajouter une région
                </h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="./index.php?p=region&action=add" method="post">
                    <div class="form-group mt-2">
                        <label for="nom">Nom*</label>
                        <input required type="text" name="nom" class="form-control" value="">
                    </div>
                    <div class="form-group mt-4">
                        <input class="btn btn-primary" type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>