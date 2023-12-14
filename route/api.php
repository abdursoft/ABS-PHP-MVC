<?php 
use System\Route\Route;
use App\Controller\App;
use App\Controller\Profile;
use App\Controller\User;

$route = new Route();

$route->get('/', App::class."::index");
$route->get('/register', User::class."::register");
$route->post('/login', User::class."::login");
$route->post('/user', USER::class."::user");

$route->middleware('jwt_token',[
    ['get','/profile', Profile::class."::profile"]
]);