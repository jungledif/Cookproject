<?php
namespace Entity;
use Entity\User;
class Recipe
{
public $id;
public $title;
public $preparation;
public $content;
public $step1;
public $step2;
public $step3;
public $recipe_img;
public $cooktime;
public $servings;
public $creationDate;
public User $user;
}