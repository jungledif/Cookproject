<?php 
namespace Controller;
use Entity\Recipe;


class ContentController
{
    public function create()
    {
        global $recipeRepo;
        global $items;
        global $manager;
               

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
        && isset($_POST['recipe_img'])
       
        ){
            
            $errorMsg = "";
            if (strlen(trim($_POST['title'])) <2){
                $errorMsg = "Your title shoud have at least 2 characters.";
            } else if (strlen(trim($_POST['descriptive'])) < 4) {
                $errorMsg = "Your description should have at least 4 characters.";
            } else if (strlen(trim($_POST['level'])) < 1){
                $errorMsg = "at least 1 character.";
            } else if (intval(trim($_POST['cooktime'])) < 1){
                $errorMsg = "at least 1 character.";
            } else if (intval(trim($_POST['servings'])) < 1){
                $errorMsg = "at least 1 character.";
            } else if (strlen(trim($_POST['type'])) < 4) {
                $errorMsg = "Your type should have at least 4 characters.";
            } else if (strlen(trim($_POST['step1'])) < 4) {
                $errorMsg = "Your step 1 should have at least 4 characters.";
            } else if (strlen(trim($_POST['step2'])) < 4) {
                $errorMsg = "Your step 1 should have at least 4 characters.";
            } else if (strlen(trim($_POST['step3'])) < 4) {
                $errorMsg = "Your step 1 should have at least 4 characters.";
            } else if (strlen(trim($_POST['recipe_img'])) < 4) {
                $errorMsg = "You need an image";
            } 
            if ($errorMsg) {
                include "../templates/PostForm.php";
            } else {
                
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
                $newRecipe->creationDate = date("Y-m-d H:i:s");
                
                $newRecipe->user = $_SESSION['user'];
                $manager->persist($newRecipe);
                $manager->flush();
                header('Location:/display');
            }
        }else {
    
            include "../templates/PostForm.php";
        }
            
    
    }
}

?>