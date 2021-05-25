<?php 

namespace Controller;

use Entity\Recipe;
use Entity\User;
use ludk\Controller\AbstractController;
use ludk\Http\Request;
use ludk\Http\Response;

class HomeController extends AbstractController
{
    public function display(Request $request): Response
    {
         $userRepo = $this->getOrm()->getRepository(User::class);
         $recipeRepo = $this->getOrm()->getRepository(Recipe::class);
        

         if ($request->query->has('search')) {
            $items = $recipeRepo->findBy(array("title" => '%' . $_GET['search'] . '%'));
        
    } else{
        $items = $recipeRepo->findAll();
    }
 $data = array(
     "items" => $items
 );
 
return $this->render("display.php", $data);

    }
}
?>