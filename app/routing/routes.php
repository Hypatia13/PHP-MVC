<?php
// AltoRouter package -> router for PHP
// http://altorouter.com/usage/mapping-routes.html

// Create a new instance of AltoRouter

$router = new AltoRouter();

//Create a map to a specific target URL -> a homepage
// (HTTP request method used, 'target' route, 'parameters passed', route name)

//Call a show() of IndexController when a homepage is accessed
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

$router->map('GET', '/admin', 'App\Controllers\Admin\DashboardController@show', 'admin_dashboard');

