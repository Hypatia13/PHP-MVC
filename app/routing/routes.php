<?php
// Create a new instance of AltoRouter
// AltoRouter package -> router for PHP

$router = new AltoRouter();

# Create a map to a specific target URL
# (HTTP request method used,'target' route, parameters passed, route name)
$router->map('GET', '/about', '', 'about_us');

// Match a given URL against stored routes
$match = $router->match();

var_dump($match);
