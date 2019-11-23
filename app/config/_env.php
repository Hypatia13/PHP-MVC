<?php

define('BASE_PATH', realpath(__DIR__ . '/../../'));
require_once __DIR__ . '/../../vendor/autoload.php';

$dotEnv = Dotenv\Dotenv::create(BASE_PATH);
$dotEnv->load(); 

// overload() -> for Dotenv to overwrite existing environment variables
// Existing environment variables might be in $_ENV super global array
