<?php

use ludk\Http\Kernel;
use ludk\Http\Request;
require '../vendor/autoload.php';
$kernel = new Kernel();
$request = new Request($_GET, $_POST, $_SERVER, $_COOKIE);
$response = $kernel->handle($request);
$response->send();

// use Controller\AuthController;
// use Controller\ContentController;
// use Entity\User;
// use Entity\Recipe;
// use ludk\Persistence\ORM;
// use Controller\HomeController;


// require __DIR__ . '/../vendor/autoload.php';


// session_start();
// $orm = new ORM(__DIR__ . '/../Resources');
// $manager = $orm->getManager();

// $userRepo = $orm->getRepository(User::class);
// $recipeRepo = $orm->getRepository(Recipe::class);
// $items = array();

// $action = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1);


// switch ($action) {
// case 'register':
//     $controller = new AuthController();
//     $controller->register();
    
// break;
// case 'logout':
//     $controller = new AuthController();
//     $controller->logout();
    
//     break;
// case 'login': 
//     $controller = new AuthController();
//     $controller->login();
      
// break;
// case 'new':
    
//    $controller = new ContentController();
//    $controller->create();
    
// break;
// case 'display': 
// default:
//  $controller = new HomeController();
//  $controller->display();
// break;
// }
?> 
