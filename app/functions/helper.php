<?php

//This file is autoloaded with every request (specified in composer.json)

//https://laravel.com/docs/5.1/blade

use Philo\Blade\Blade;

//Set up a templating engine
// $path - a file to load, $data - data to pass to a view
function view($path, array $data = [])
{
    $view = __DIR__ . '/../../resources/views';
    $cache = __DIR__ . '/../../bootstrap/cache';

    $blade = new Blade($view, $cache);

    echo $blade->view()->make($path, $data)->render();
}

//Set up an email body
// $filename - a template to load, $data - data to pass to a view

function make($filename, $data)
{
    extract($data);

    //ON extract:
    /*   $data = [
           'to'=>'it.hypatia13@gmail.com',
           'subject'=>'PHP MVC Course!',
           'name'=>'Jane Doe'
       ];

       extract() -> to = 'it.hypatia13@gmail.com', subject = 'PHP MVC Course!';*/

    //Turn on output buffering, so no output is sent from the script to a browser but in the buffer
    ob_start();

    //Include a template
    include(__DIR__ . '/../../resources/views/emails/' . $filename . '.php');
    //Get content of a file
    $content = ob_get_contents();
    //Erase content and turn off output buffering
    ob_end_clean();

    //Both variables extracted from $data and contents of a template are available
    //$content is the body that is used in Mail sending
    return $content;
}
