<?php 

namespace Controller;

use Entity\User;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class AuthController extends AbstractController
{
        public function login(Request $request): Response
        {
            $userRepo = $this->getOrm()->getRepository(User::class);
                  
        if ($request->request->has('username') && $request->request->has('password')) {
            $criteriaWithloginAndPawword = [
                "nickname" => $request->request->get('username'),
                "password" => $request->request->get('password')
            ];
            $usersWithThisNicknameAndPassword = $userRepo->findBy($criteriaWithloginAndPawword);
            if (count($usersWithThisNicknameAndPassword) == 1) {
                // $_SESSION['user'] = $usersWithThisNicknameAndPassword[0];
                $request->getSession()->set('user', $usersWithThisNicknameAndPassword[0]);
                return
                $this->redirectToRoute("display");
            } else {
                $data = array(
                "errorMsg" => "Wrong login and/or password.");
                return $this->render("LoginForm.php", $data);
            }
        } else {
           return $this->render("LoginForm.php");
        }
    }

    public function logout(Request $request): Response{
        
        if ($request->getSession()->has('user')) {
                $request->getSession()->remove('user');
            } 
        return
        $this->redirectToRoute("display");
    }
    
    public function register(Request $request): Response{
        $userRepo = $this->getOrm()->getRepository(User::class);
       $manager = $this->getOrm()->getManager();
        if ($request->request->has('username') && $request->request->has('password') && $request->request->has('passwordRetype')) {
            $usersWithThisNicknameAndPassword = $userRepo->findBy(["nickname"=>$_POST["username"]]);
            if (count($usersWithThisNicknameAndPassword) > 0) {
                $errorMsg = "Passwords are not the same.";
            } else if (strlen(trim($request->request->get('password'))) < 4) {
                $errorMsg = "Your password should have at least 4 characters.";
            } else if (strlen(trim($request->request->get('username'))) < 4){
                $errorMsg = "Your nickname should have at least 4 characters.";
            }
            if ($errorMsg) {
                return $this->render("RegisterForm.php");
            } else {
                $newUser = new User();
                $newUser->nickname = $request->request->get('username');
                $newUser->password = $request->request->get('password');
                $manager->persist($newUser);
                $manager->flush();
                $request->getSession()->set('user', $newUser);
                return $this->redirectToRoute("display");
            }
        }else {
    
           return $this->render("RegisterForm.php");
        }
    }
}
?>

