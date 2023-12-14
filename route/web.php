<?php
use System\Route\Route;
use App\Controller\Profile;
use App\Controller\User;

$route = new Route();

$route->get('/register', User::class."::register");
$route->post('/login', User::class."::login");


$route->middleware('jwt_token',[
    ['get','/profile', Profile::class."::profile"]
]);