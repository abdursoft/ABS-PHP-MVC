<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 
use App\Controller\App;
use App\Controller\Profile;
use App\Controller\User;
use System\Route\Route;
require 'vendor/autoload.php';
require 'core/Config/config.php';
ini_set('display_errors',1);

$route = new Route();

$route->get('/', App::class."::index");
$route->get('/register', User::class."::register");
$route->post('/login', User::class."::login");
$route->post('/user', USER::class."::user");
$route->post('/profile', Profile::class."::profile");

$route->run();
?>