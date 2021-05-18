<?php 
include __DIR__ . "/header.php";
?>
    
</head>

<body>
<section class="home">
    
    </section>
    
      <br>   
      
     <h1>Recette du jour</h1>
     
    <section class="cards-post">
    <?php 
     foreach($items as $recipe){
       ?>
    <div id="card-wrapper<?= $recipe->id ?>">
    <style>#card-wrapper<?= $recipe->id ?> {
     background-image:url(<?= htmlentities($recipe->recipe_img) ?>);
     background-size:cover;
     background-repeat:no-repeat;

     min-width:550px;
     min-height:750px;
     color:black;
     box-shadow: 5px 5px 15px; 
     font-family: 'Abril Fatface', cursive;
     order:2;
     margin-top:50px;}</style>
    <div class="inner-card">
    <!--top right btn-->
    <div class="more-info-btn">
      
    </div>
    
    <!--title-->
    <div id="title">
      <?= htmlentities($recipe->title) ?>
    </div>
    
    <!--details-->
    <div id="details">
      
    <div class="Details">
      <h2>Niveau</h2>
      <h4><?=htmlentities($recipe->level)?></h4>
    </div>
      
    <div class="Details">
      <h2>Temps</h2>
      <h4><?= htmlentities($recipe->cooktime)?> minutes</h4>
    </div>
      
    <div class="Details">
      <h2>Couverts</h2>
      <h4><?= htmlentities($recipe->servings)?></h4>
    </div>
      
    </div>
    
   
  </div>
     <!--start btn-->
    <div class="start-btn"><a href=""><h3>Voir la recette<i class="fas fa-long-arrow-alt-right"></i></h3> </a></div>
  
    </div>
  

     
     <?php
           
        }
        ?>

    </section>
    
    
<?php
include __DIR__ . "/footer.php";
?>