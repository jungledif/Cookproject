{% include '/header.php' %}
    <form method="POST" action="/new" class="row g-3 col-sm-9 col-md-7 col-lg-8 mx-auto">
   
    <?php
            if (isset($errorMsg)) {
                echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
            }
            ?>
    <h1 class="text-center">Postez votre nouvelle recette</h1>
    <div class="col-md-8 mb-3">
  
      <label for="recipeName" class="form-label">Nom de la recette</label>
      <input type="text" id="recipeName" class="form-control" placeholder="Nom de la recette" name="title" required="">
    </div>
    <div class="col-md-2 mb-3">
      <label for="cooktimeNumber" class="form-label">Temps</label>
      <input type="number" id="cooktimeNumber" class="form-control" placeholder="1" name="cooktime" required="">
    </div>       
    <div class="col-md-2 mb-3">
      <label for="servingsNumber" class="form-label">Couverts</label>
      <input type="number" id="servingsNumber" class="form-control" placeholder="1" name="servings" required="">
    </div>   
         <div class="col-md-6 mb-3">
                    <label for="recipeType" class="form-label">Type de recette</label>
                    <select id="recipeType" class="form-select" name="type" required="">
                        <option>Cuisine</option>
                        <option>Pâtisserie</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="difficultyLvl" class="form-label">Difficulté</label>
                    <select id="difficultyLvl" class="form-select" name="level" required="">
                        <option>Facile</option>
                        <option>Intermédiaire</option>
                        <option>Difficile</option>
                    </select>
                </div>
            </div>
            <div class="form-floating">
  <textarea class="form-control" placeholder="Descriptif" id="descriptive" style="height: 100px" name="descriptive"></textarea>
  <label for="descriptive">Descriptif</label>
</div>
            <div class="form-floating">
  <textarea class="form-control" placeholder="Etape 1" id="recipeStep1" style="height: 100px" name="step1"></textarea>
  <label for="recipeStep1">Etape 1</label>
</div>
<div class="form-floating">
  <textarea class="form-control" placeholder="Etape 2" id="recipeStep2" style="height: 100px" name="step2"></textarea>
  <label for="recipeStep2">Etape 2</label>
</div>
<div class="form-floating">
  <textarea class="form-control" placeholder="Etape 3" id="recipeStep3" style="height: 100px" name="step3"></textarea>
  <label for="recipeStep3">Etape 3</label>
</div>
            <div class="mb-3">
  <label for="formFileSm" class="form-label">Photo de la recette</label>
  <input class="form-control form-control-sm" id="formFileSm" type="text" name="recipe_img">
</div>
            
        <button type="submit" class="btn btn-primary mb-5">Postez</button>
    
</form>
 
{% include '/footer.php' %}