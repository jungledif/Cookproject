<?php
namespace Entity;

use ludk\Utils\Serializer;

class User
{
public $id;
public $nickname;
public $password;
public $created_at;
public $avatar_user;

    use Serializer;
}