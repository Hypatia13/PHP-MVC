
<?php

// An initialization file

//Start a session if not started yet
if (!isset($_SESSION)) {
    session_start();
}

// Load environment variables
require_once __DIR__ . '/../app/config/_env.php';

new \App\Classes\Database();


//Set up a custom error handler -> Whoops

//set_error_handler requires a valid callback == a callable function
//Inside an ErrorHandler class call handleErrors()

set_error_handler([new \App\Classes\ErrorHandler(), 'handleErrors']);

//Same as
/* $errorHandler = new \App\Classes\ErrorHandler();
set_error_handler([$errorHandler, 'handleErrors']);*/

require_once __DIR__ . '/../app/routing/routes.php';

//$router (an instance of AltoRouter) is passed from routes.php
new App\RouteDispatcher($router);