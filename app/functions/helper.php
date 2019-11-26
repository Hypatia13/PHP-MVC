<?php

//https://laravel.com/docs/5.1/blade

use Philo\Blade\Blade;

// $path - a file to load, $data - data to pass to a view 
function view($path, array $data = [])
{
    $view = __DIR__ .'/../../resources/views'; 
    $cache = __DIR__ . '/../../bootstrap/cache';
    
    $blade = new Blade($view, $cache);

    echo $blade->view()->make($path, $data)->render();
}
