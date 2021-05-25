<?php 

namespace Controller;

class HomeController
{
    public function display(){
        global $userRepo;
        global $recipeRepo;
        global $items;

        if (isset($_GET['search'])) {
            $items = $recipeRepo->findBy(array("title" => '%' . $_GET['search'] . '%'));
        
    } else{
        $items = $recipeRepo->findAll();
    }
 include '../templates/display.php';


    }
}
?>