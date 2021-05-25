<?php 

namespace Controller;
use Entity\User;

class AuthController
{
        public function login()
        {
            global $userRepo;
                  
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $criteriaWithloginAndPawword = [
                "nickname" => $_POST['username'],
                "password" => $_POST['password']
            ];
            $usersWithThisNicknameAndPassword = $userRepo->findBy($criteriaWithloginAndPawword);
            if (count($usersWithThisNicknameAndPassword) == 1) {
                $_SESSION['user'] = $usersWithThisNicknameAndPassword[0];
                header('Location:/display');
            } else {
                $errorMsg = "Wrong login and/or password.";
                include "../templates/LoginForm.php";
            }
        } else {
            include "../templates/LoginForm.php";
        }
    }

    public function logout(){
        
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location:/display');
    }
    
    public function register(){
        global $userRepo;
       
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
                header('Location:/display');
            }
        }else {
    
            include "../templates/RegisterForm.php";
        }
    }
}
?>

