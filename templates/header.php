<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
<!-- google fonts-->
<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    
<!-- google fonts-->
<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Cookmaster</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">A propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?action=new">Recettes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <?php 
        if (isset($_SESSION['user'])){
        ?>
        <li class="ms-5 nav-item">
          <a class="nav-link" href="?action=logout">Déconnexion</a>
        </li>
        <?php 
        } else{
        ?>
        <li class="ms-5 nav-item">
          <a class="nav-link" href="?action=login">Connexion</a>
        </li>
        
         <li class="nav-item">
          <a class="nav-link" href="?action=register">S'inscrire</a>
        </li>
        <?php 
        }
        ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Rechercher" name="search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
  </div>
</nav>