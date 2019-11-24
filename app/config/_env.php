<?php

//save an absolute path of a root directory in a constant
define('BASE_PATH', realpath(__DIR__ . '/../../')); 

// Make all installed packages accessible
require_once __DIR__ . '/../../vendor/autoload.php';

// Create a new instance of a Dotenv class (from phpdotenv package),
// Provide a path to '.env file'
$dotEnv = Dotenv\Dotenv::create(BASE_PATH);

// Using load() ensures that other used env variables are not overwritten by Dotenv, 
// overload() will overwrite existing environment variables
// Existing environment variables might be in $_ENV superglobal array

$dotEnv->load();