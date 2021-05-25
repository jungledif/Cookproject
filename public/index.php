<?php 

use Entity\User;
use Entity\Recipe;
use ludk\Persistence\ORM;
use Controller\HomeController;

require __DIR__ . '/../vendor/autoload.php';


session_start();
$orm = new ORM(__DIR__ . '/../Resources');
$manager = $orm->getManager();

$userRepo = $orm->getRepository(User::class);
$recipeRepo = $orm->getRepository(Recipe::class);
$items = array();




$action = $_GET["action"] ?? "display";
switch ($action) {
case 'register':
    
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
        $usersWithThisNicknameAndPassword = $userRepo->findBy(["nickname"=>$_POST["username"]]);
        if (count($usersWithThisNicknameAndPassword) > 0) {
            $errorMsg = "Passwords are not the same.";
        } else if (strlen(trim($_POST['password'])) < 4) {
            $errorMsg = "Your password should have at least 4 characters.";
        } else if (strlen(trim($_POST['username'])) < 4){
            $errorMsg = "Your nickname should have at least 4 characters.";
        }
        if ($errorMsg) {
            include "../templates/RegisterForm.php";
        } else {
            $newUser = new User();
            $newUser->nickname = $_POST['username'];
            $newUser->password = $_POST['password'];
            
            $manager->persist($newUser);
            $manager->flush();
            $_SESSION['user'] = $newUser;
            header('Location: ?action=display');
        }
    }else {

        include "../templates/RegisterForm.php";
    }
    

break;
case 'logout':
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    header('Location: ?action=display');
    break;
case 'login': 

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $criteriaWithloginAndPawword = [
            "nickname" => $_POST['username'],
            "password" => $_POST['password']
        ];
        $usersWithThisNicknameAndPassword = $userRepo->findBy($criteriaWithloginAndPawword);
        if (count($usersWithThisNicknameAndPassword) == 1) {
            $_SESSION['user'] = $usersWithThisNicknameAndPassword[0];
            header('Location: ?action=display');
        } else {
            $errorMsg = "Wrong login and/or password.";
            include "../templates/LoginForm.php";
        }
    } else {
        include "../templates/LoginForm.php";
    }
break;
case 'new':
    $items = $recipeRepo->findAll();
    if (
        isset($_SESSION['user'])
    && isset($_POST['title'])
    && isset($_POST['descriptive'])
    && isset($_POST['level'])
    && isset($_POST['cooktime'])
    && isset($_POST['servings'])
    && isset($_POST['type'])
    && isset($_POST['step1'])
    && isset($_POST['step2'])
    && isset($_POST['step3'])
    && isset($_FILES['recipe_img'])
   
    ){
        $errorMsg = NULL;
        if (strlen(trim($_POST['title'])) <2){
            $errorMsg = "Your title shoud have at least 2 characters.";
        } else if (strlen(trim($_POST['descriptive'])) < 4) {
            $errorMsg = "Your description should have at least 4 characters.";
        } else if (strlen(trim($_POST['level'])) < 1){
            $errorMsg = "at least 1 character.";
        } else if (intval(trim($_POST['cooktime'])) < 1){
            $errorMsg = "at least 1 character.";
        } else if (intval(trim($_POST['serving'])) < 1){
            $errorMsg = "at least 1 character.";
        } else if (strlen(trim($_POST['type'])) < 4) {
            $errorMsg = "Your type should have at least 4 characters.";
        } else if (strlen(trim($_POST['step1'])) < 4) {
            $errorMsg = "Your step 1 should have at least 4 characters.";
        } else if (strlen(trim($_POST['step2'])) < 4) {
            $errorMsg = "Your step 1 should have at least 4 characters.";
        } else if (strlen(trim($_POST['step3'])) < 4) {
            $errorMsg = "Your step 1 should have at least 4 characters.";
        } else if (strlen(trim($_FILES['recipe_img'])) < 4) {
            $errorMsg = "You need an image";
        } 
        if ($errorMsg) {
            include "../templates/PostForm.php";
        } else {
            $recipe = $recipeRepo->find($_POST['id']);
            $newRecipe = new Recipe();
            $newRecipe->title = trim($_POST['title']);
            $newRecipe->descriptive = trim($_POST['descriptive']);
            $newRecipe->level = trim($_POST['level']);
            $newRecipe->servings = trim($_POST['servings']);
            $newRecipe->cooktime = trim($_POST['cooktime']);
            $newRecipe->step1 = trim($_POST['step1']);
            $newRecipe->step1 = trim($_POST['step1']);
            $newRecipe->step2 = trim($_POST['step2']);
            $newRecipe->step3 = trim($_POST['step3']);
            $newRecipe->recipe_img = trim($_POST['recipe_img']);
            $newRecipe->created_at = date("Y-m-d H:i:s");
            $newRecipe->recipe = $recipe;
            $newRecipe->user = $_SESSION['user'];
            $manager->persist($newRecipe);
            $manager->flush();
            header('Location: ?action=display');
        }
    }else {

        include "../templates/PostForm.php";
    }
        

    
break;
case 'display': 
default:
 $controller = new HomeController();
 $controller->display();
break;
}
?>
