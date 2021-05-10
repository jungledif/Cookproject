<?php 
require "../vendor/autoload.php";

use Entity\User;
use Entity\Recipe;


$userToto = new User();
$userToto->id = 1;
$userToto->nickname = "toto";
$userToto->password = "pwd1";
$userToto->created_at = "10-05-2021";

$recipe1 = new Recipe();
$recipe1->id = 1;
$recipe1->title = "Fraisier";
$recipe1->preparation;
$recipe1->content ="Cette recette de fraisier est rapide, facile, et surtout plus légère que certaines versions avec de la crème au beurre. Ici, c’est un mix de crème pâtissière à la vanille et de crème fouettée. J’utilise un peu d’agar agar (certains préféreront la gélatine), pour bien faire tenir ma garniture. Finalement c’est une recette qu’on pourrait décliner avec d’autres fruits, comme des abricots, des framboises, etc…";
$recipe1->step1 = "Réalisez le sirop en faisant chauffer l'eau, le sucre et la gousse de vanille fendue. Portez à ébullition 2/3 minutes et laissez infuser. Vous pouvez également ajouter du kirsch, du sirop de fraise ou autre...
Réalisez la crème en chauffant le lait avec la gousse de vanille fendue (ou l'extrait de vanille ou sucre vanillé, au choix :)
Fouettez les jaunes avec le sucre, ajoutez la maizéna ensuite, progressivement
Ajoutez l'agar agar dans le lait et laissez bouillir 1 minute";
$recipe1->step2 = "Versez le lait bouillant dessus en une fois, mélangez et remettez sur le feu moyen, fouettez constamment, la crème pâtissière va s'épaissir
Reversez la crème dans un bol propre, couvrez-la au contact avec du film alimentaire et laissez refroidir.
Fouettez la crème liquide bien ferme (mettez-la au congélateur 15 minutes avant, ca aide !!)
Ajoutez la crème fouettée à la crème pâtissière froide, délicatement, et mettez dans une poche à douille au frais.";
$recipe1->step3 = "Réalisez la génoise à présent : séparez les blancs des jaunes et battez les blancs bien fermes
Ajoutez un tiers du sucre aux blancs quand ils sont fermes, et battez encore 1 minute.
Fouettez les jaunes avec le restant de sucre et la vanille
Ajoutez le beurre fondu, puis la moitié de la farine tamisée
Pour détendre la pâte, ajoutez 2 c. à soupe de blanc d'oeufs";
$recipe1->recipe_img = "img/fraisier.jpg";
$recipe1->cooktime = "60";
$recipe1->servings = "8";
$recipe1->creationDate = "10-05-2021";
$recipe1->user = $userToto;

$recipes = [$recipe1];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="css/style.css"
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
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>
<body>
<section class="home">
    </section>
    <!-- <div style="height: 1000px"> -->
        <!-- just to make scrolling effect possible -->
			<!-- <h2 class="myH2"></h2> -->
			<!-- <p class="myP"></p>
			<p class="myP"></p>
			<p class="myP"></p>
			<p class="myP"></p>
				<p class="myP">
			</p>  -->
           
            <div class="cont_principal">
            <h1>Recette du jour</h1>
     <?php 
     foreach($recipes as $recipe){
       ?>
<div class="cont_central">
  <div class="cont_modal cont_modal_active">
  <div class="cont_photo">
<div class="cont_img_back">
    <img src="<?= $recipe->recipe_img ?>" alt="" />
    </div>
<div class="cont_mins">
    <div class="sub_mins">
  <h3><?= $recipe->cooktime?></h3>
<span>MINS</span>
  </div>
  <div class="cont_icon_right">
<a href="#">  <i class="material-icons">&#xE8E7;</i></a>
  </div>
    </div>
<div class="cont_servings">
      <h3>4</h3>
<span>SERVINGS</span>
    </div>
<div class="cont_detalles">
    <h3><?= $recipe->title ?></h3>
<p>orem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sagittis est est aliquam, sed faucibus massa lobortis. Maecenas non est justo.</p>
    </div>
    </div>
<div class="cont_text_ingredients">
<div class="cont_over_hidden">
 
  <div class="cont_tabs">
  <ul>
    <li><a href="#"><h4>INGREDIENTS</h4></a></li>
    <li><a href="#"><h4>PREPARATION</h4></a></li>
  </ul>  
  </div>
   
  <div class="cont_text_det_preparation">
  <div class="cont_title_preparation">
    <p>STEP 1</p>
    </div>
  <div class="cont_info_preparation">
    <p><?= $recipe->step1 ?></p>
    </div>  
  <div class="cont_text_det_preparation">
  <div class="cont_title_preparation">
    <p>STEP 2</p>
    </div>
  <div class="cont_info_preparation">
    <p><?= $recipe->step2 ?></p>
    </div>  
  </div>
</div>  
  <div class="cont_btn_mas_dets">
  <a href="#"><i class="material-icons">&#xE313;</i></a>
  </div>
    
  </div>
  <div class="cont_btn_open_dets">
  <a href="#e" onclick="open_close()"><i class="material-icons">&#xE314;</i></a>
  </div>

    </div>
   </div>
</div>
<?php 
     }
     ?>       

            
    </div>
    
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