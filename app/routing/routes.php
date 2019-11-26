<?php
// Create a new instance of AltoRouter
// AltoRouter package -> router for PHP

$router = new AltoRouter();

//Create a map to a specific target URL -> a homepage
// (HTTP request method used, 'target' route, 'parameters passed', route name)

// http://altorouter.com/usage/mapping-routes.html

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
    //No route was matched ->
    //Check a server protocol and set it to 404

    //For PHP<5.4
    // In Chrome Inspector, a response header is "500 Internal Server Error"?
    //header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');

    //For PHP>=5.4
    // In Chrome Inspector, a response header is "404 Not Found", as it should be
    http_response_code(404);

    //Show a custom 404.php message
    //include '404_test.php';

    echo "Page not found";
}

//https://thisinterestsme.com/404-not-found-header-php/
