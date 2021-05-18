<?php 

use Entity\User;
use Entity\Recipe;
use ludk\Persistence\ORM;
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
break;
case 'display': 
default:
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
break;
}
?>
