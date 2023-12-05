<?php

//set and truck the errors
ini_set('display_errors',1);

use App\Controller\App;
use System\Route\Route;
require 'vendor/autoload.php';
require 'core/Config/config.php';

$route = new Route();

$route->get('/', App::class."::index");

$route->run();
?>