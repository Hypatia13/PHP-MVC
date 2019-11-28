<?php

namespace App\Classes;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct()
    {
        //https://packagist.org/packages/illuminate/database

        $db = new Capsule();
        $db->addConnection([

            //Values from the '.env' file
            'driver' => \getenv('DB_DRIVER'),
            'host' => \getenv('DB_HOST'),
            'database' => getenv('DB_NAME'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        // Make this Capsule instance available globally via static methods
        $db->setAsGlobal();

        // Setup the Eloquent ORM
        $db->bootEloquent();

    }
}
