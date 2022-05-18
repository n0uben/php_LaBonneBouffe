// script pour ajouter une rangée vierge d’Ingredient dans la vue recette

function addIngredient() {
    const addNewIngredient = document.querySelector("#addNewIngredient");
    const newIngredients = document.querySelector("#newIngredients");
    const previousIngredients = document.querySelectorAll(".editIngredient");
    const numberOfPreviousIngredients = previousIngredients.length;

    let rowIngredient = `
        <div class="row editIngredient">
            <div class="col-6">
                <label for="nomIngredient">Nom de l’ingrédient :</label>
                <input required type="text" name="ingredient[${numberOfPreviousIngredients + 1}][nom]" class="form-control" value="">
            </div>
            <div class="col-3">
                <label for="quantiteIngredient">Quantite :</label>
                <input required type="number" min="1" max="999" name="ingredient[${numberOfPreviousIngredients + 1}][quantite]" class="form-control" value="">
            </div>
            <div class="col-3">
                <label for="uniteMesure">Unite :</label>
                <select id="uniteMesure" name="ingredient[${numberOfPreviousIngredients + 1}][uniteMesure]" class="form-select">
                    <option>g</option>
                    <option>kg</option>
                    <option>cl</option>
                    <option>l</option>
                    <option>cac</option>
                    <option>cas</option>
                    <option>pincée</option>
                </select>
            </div>
        </div>
    `;
    newIngredients.insertAdjacentHTML('beforeend', rowIngredient);
}
addNewIngredient.addEventListener('click', addIngredient);
