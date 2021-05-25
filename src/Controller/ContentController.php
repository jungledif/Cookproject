<?php 
namespace Controller;
use Entity\Recipe;
use ludk\Controller\AbstractController;
use ludk\Http\Request;
use ludk\Http\Response;

class ContentController extends AbstractController
{
    public function create(Request $request): Response
    {
        $recipeRepo = $this->getOrm()->getRepository(Recipe::class);
        $manager  = $this->getOrm()->getManager();
               

        $items = $recipeRepo->findAll();
        if (
            $request->getSession()->get('user')
        && $request->request->get('title')
        && $request->request->get('descriptive')
        && $request->request->get('level')
        && $request->request->get('cooktime')
        && $request->request->get('servings')
        && $request->request->get('type')
        && $request->request->get('step1')
        && $request->request->get('step2')
        && $request->request->get('step3')
        && $request->request->get('recipe_img')
       
        ){
            
            $errorMsg = NULL;
            if (strlen($request->request->get('title')) <2){
                $errorMsg = "Your title shoud have at least 2 characters.";
            } else if (strlen($request->request->get('descriptive')) < 4) {
                $errorMsg = "Your description should have at least 4 characters.";
            } else if (strlen($request->request->get('level')) < 1){
                $errorMsg = "at least 1 character.";
            } else if (intval($request->request->get('cooktime')) < 1){
                $errorMsg = "at least 1 character.";
            } else if (intval($request->request->get('servings')) < 1){
                $errorMsg = "at least 1 character.";
            } else if (strlen($request->request->get('type')) < 4) {
                $errorMsg = "Your type should have at least 4 characters.";
            } else if (strlen($request->request->get('step1')) < 4) {
                $errorMsg = "Your step 1 should have at least 4 characters.";
            } else if (strlen($request->request->get('step2')) < 4) {
                $errorMsg = "Your step 1 should have at least 4 characters.";
            } else if (strlen($request->request->get('step3')) < 4) {
                $errorMsg = "Your step 1 should have at least 4 characters.";
            } else if (strlen($request->request->get('recipe_img')) < 4) {
                $errorMsg = "You need an image";
            } 
            if ($errorMsg) {
                return $this->render("PostForm.php");
            } else {
                
                $newRecipe = new Recipe();
               
                $newRecipe->title = $request->request->get('title');
                $newRecipe->descriptive = $request->request->get('descriptive');
                $newRecipe->level = $request->request->get('level');
                $newRecipe->servings = $request->request->get('servings');
                $newRecipe->cooktime = $request->request->get('cooktime');
                $newRecipe->type = $request->request->get('type');
                $newRecipe->step1 = $request->request->get('step1');
                $newRecipe->step2 = $request->request->get('step2');
                $newRecipe->step3 = $request->request->get('step3');
                $newRecipe->recipe_img = $request->request->get('recipe_img');
                $newRecipe->creationDate = date("Y-m-d H:i:s");
                
                $newRecipe->user = $request->getSession()->get('user');
                $manager->persist($newRecipe);
                $manager->flush();
                return
                $this->redirectToRoute("display");
            }
        }else {
    
            return $this->render("PostForm.php");
        }
            
    
    }
}

?>