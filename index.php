<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 
use App\Controller\App;
use System\Route\Route;
require 'vendor/autoload.php';
require 'core/Config/config.php';
ini_set('display_errors',0);

$route = new Route();

$route->get('/', App::class."::index");

$route->run();
?>