<?php
include __DIR__ . "/header.php";
?>

    <form class="row g-3 col-sm-9 col-md-7 col-lg-8 mx-auto">
 
    <h1 class="text-center">Postez votre nouvelle recette</h1>
    <div class="col-md-9 mb-3">
      <label for="recipeName" class="form-label">Nom de la recette</label>
      <input type="text" id="recipeName" class="form-control" placeholder="Nom de la recette">
    </div>
    <div class="col-md-3 mb-3">
      <label for="servingsNumber" class="form-label">Nombre de couverts</label>
      <input type="number" id="servingsNumber" class="form-control" placeholder="1">
    </div>
   

            
          

                <div class="col-md-6 mb-3">
                    <label for="recipeType" class="form-label">Type de recette</label>
                    <select id="recipeType" class="form-select">
                        <option>Cuisine</option>
                        <option>Pâtisserie</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="difficultyLvl" class="form-label">Difficulté</label>
                    <select id="difficultyLvl" class="form-select">
                        <option>Facile</option>
                        <option>Intermédiaire</option>
                        <option>Difficile</option>
                    </select>
                </div>
            </div>
            <div class="form-floating">
  <textarea class="form-control" placeholder="Etape 1" id="recipeStep1" style="height: 100px"></textarea>
  <label for="recipeStep1">Etape 1</label>
</div>
<div class="form-floating">
  <textarea class="form-control" placeholder="Etape 2" id="recipeStep2" style="height: 100px"></textarea>
  <label for="recipeStep2">Etape 2</label>
</div>
<div class="form-floating">
  <textarea class="form-control" placeholder="Etape 3" id="recipeStep3" style="height: 100px"></textarea>
  <label for="recipeStep3">Etape 3</label>
</div>
            <div class="mb-3">
  <label for="formFileSm" class="form-label">Photo de la recette</label>
  <input class="form-control form-control-sm" id="formFileSm" type="file">
</div>
            
        <button type="submit" class="btn btn-primary mb-5">Postez</button>
    
</form>
 
<?php
include __DIR__ . "/footer.php";
?>