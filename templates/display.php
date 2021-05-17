<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookmaster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
<!-- google fonts-->
<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
</head>
<nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="#">CookMaster</a>
                
            </div>
            
            
             <div id="mainListDiv" class="main_list">
                 
                
                <ul class="navlinks">
     
                    <li><a href="#">A propos</a></li>
                    <li><a href="#">Recettes</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Connexion</a></li>
                </ul>
         
            </div>
           
        </div>
    </nav>
<body>
<section class="home">
    
    </section>
    
      <br>   
      
     <h1>Recette du jour</h1>
     
    <section class="cards-post">
    <?php 
     foreach($recipes as $recipe){
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

    
    
</body>
<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });
        $('.navTrigger').click(function () {
    $(this).toggleClass('active');
    console.log("Clicked menu");
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();

});

    </script>
</html>