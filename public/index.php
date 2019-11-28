<?php

require_once __DIR__ . '/../bootstrap/init.php';

// vlucas/phpdotenv package: loads env variables from '.env' to 'getenv()'
// getenv() fetches 'APP_NAME' from it
$app_name = getenv('APP_NAME');

// use Illuminate\Database\Capsule\Manager as Capsule;
//$categories = Capsule::table('categories')->get();
//var_dump($categories->toArray());
