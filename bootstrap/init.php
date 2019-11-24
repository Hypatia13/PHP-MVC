// An initialization file

<?php

//Start a session if not started yet

if (!isset($_SESSION)) {
    session_start();
}

// Load environment variables
require_once __DIR__ . '/../app/config/_env.php';
