<?php
// Create a new instance of AltoRouter
// AltoRouter package -> router for PHP

$router = new AltoRouter();

# Create a map to a specific target URL
# (HTTP request method used, 'target' route, 'parameters passed', route name)
$router->map('GET', '/', '', 'home');

// Match a given URL against stored routes
$match = $router->match();

if ($match) {
    //A callback function to pass in a function specified in the map('params')

    require_once __DIR__ . '/../controllers/BaseController.php';
    require_once __DIR__ . '/../controllers/IndexController.php';
    $index = new App\Controllers\IndexController();
    $index->show();
} else {
    //Check a server protocol and set it to 404
    header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');
    echo "Page not found";
}
