<?php
// Create a new instance of AltoRouter
// AltoRouter package -> router for PHP

$router = new AltoRouter();

//Create a map to a specific target URL -> a homepage
// (HTTP request method used, 'target' route, 'parameters passed', route name)

//Call a show() of IndexController when a homepage is accessed
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

// http://altorouter.com/usage/mapping-routes.html
