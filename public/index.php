<?php 

use Entity\User;
use Entity\Recipe;
use ludk\Persistence\ORM;
require __DIR__ . '/../vendor/autoload.php';


session_start();
$orm = new ORM(__DIR__ . '/../Resources');

$userRepo = $orm->getRepository(User::class);
$recipeRepo = $orm->getRepository(Recipe::class);
$items = array();


if (isset($_GET['search'])) {
$strToSearch = $_GET['search'];
if (strpos($strToSearch, "@") === 0) {
$userName = substr($strToSearch, 1);
$userRepo = $orm->getRepository(User::class);
$users = $userRepo->findBy(array("nickname" => $userName));
if (count($users) == 1) {
$items = $userRepo->findBy(array("user" => $users[0]->id));
}
} else {
$items = $recipeRepo->findBy(array("content" => "%$strToSearch%"));
}
} else {
$items = $recipeRepo->findAll();
}
if(isset($_GET["search"])){
    $recipes = $recipeRepo->findBy(
        array("desc" => "%" . $_GET["search"] . "%")
    );
} else{
    $recipes = $recipeRepo->findAll();
}
include '../templates/display.php';

$action = $_GET["action"] ?? "display";
switch ($action) {
case 'register':
break;
case 'logout':
break;
case 'login':
break;
case 'new':
break;
case 'display':
default:
break;
}
?>
