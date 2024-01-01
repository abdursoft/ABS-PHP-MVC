<?php

use App\Controller\App;
use System\Route\Route;
use App\Controller\Profile;
use App\Controller\User;

$route = new Route();

$route->get('/',App::class."::init");

$route->get('/register', User::class."::register",[]);
$route->post('/login', User::class."::login");

$route->get('/post', App::class."::test",['name','age']);


$route->middleware('jwt_token',[
    ['get','/profile', Profile::class."::profile"]
]);

$route->group('password',[
    ['get','/forgot', Profile::class."::forgot"],
    ['get','/retrieve', Profile::class."::retrieve",['id','pass']]
]);