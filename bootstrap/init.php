
<?php

// An initialization file

//Start a session if not started yet
if (!isset($_SESSION)) {
    session_start();
}

// Load environment variables
require_once __DIR__ . '/../app/config/_env.php';

require_once __DIR__ . '/../app/routing/routes.php';

//Shouldn't be here, but doesnt work without it?'
//require_once __DIR__ . '/../app/routing/RouteDispatcher.php';

//$router (an instance of AltoRouter) is passed from routes.php
new App\RouteDispatcher($router);