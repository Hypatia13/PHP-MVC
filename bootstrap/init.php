
<?php

// An initialization file

//Start a session if not started yet
if (!isset($_SESSION)) {
    session_start();
}

// Load environment variables
require_once __DIR__ . '/../app/config/_env.php';

new \App\Classes\Database();

require_once __DIR__ . '/../app/routing/routes.php';

//$router (an instance of AltoRouter) is passed from routes.php
new App\RouteDispatcher($router);