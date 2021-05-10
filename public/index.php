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
<div class="cont_central">
  <div class="cont_modal cont_modal_active">
  <div class="cont_photo">
<div class="cont_img_back">
    <img src="https://s-media-cache-ak0.pinimg.com/736x/57/98/9f/57989f2a2e186e38bf93429aa395120c.jpg" alt="" />
    </div>
<div class="cont_mins">
    <div class="sub_mins">
  <h3>50</h3>
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
    <h3>Shakshuka With Feta</h3>
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
    <p>Heat oven to 375 degress</p>
    </div>  
  <div class="cont_text_det_preparation">

  <div class="cont_title_preparation">
    <p>STEP 2</p>
    </div>
  <div class="cont_info_preparation">
    <p>Heat oil in a large skillet over medium-low head. Add onion and bell papper. Cook gently until very soft, about 20 minutes. Add garlic and cook until tender, 1 to 2 minutes; stir in cumin, paprika and cook 1 minute. Pour in tomatoes and season with 3/4 teaspoon salt and 1/4 teaspoon pepper;</p>
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