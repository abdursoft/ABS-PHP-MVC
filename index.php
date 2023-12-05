<?php
use App\Controller\App;
use System\Route\Route;
require 'vendor/autoload.php';
require 'core/Config/config.php';
ini_set('display_errors',1);

$route = new Route();

$route->get('/', App::class."::index");

$route->run();
?>