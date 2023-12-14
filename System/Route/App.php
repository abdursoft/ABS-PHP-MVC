<?php
namespace System\Route;

class App{
    public function __construct()
    {
        include "route/".MOOD.".php";
        $route->run();
    }
}