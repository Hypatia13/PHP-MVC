<?php

namespace App;

use AltoRouter;

class RouteDispatcher
{
    protected $match;
    protected $controller; //from the 'Controllers' folder
    protected $method; //a method inside of a Controller

    public function __construct(AltoRouter $router)
    {
        // Match a given URL against stored routes
        $this->match = $router->match();

        if ($this->match) {

            // Because match['target'] has format -> 'App\Controllers\IndexController@show'
            list($controller, $method) = explode('@', $this->match['target']);
            $this->controller = $controller;
            $this->method = $method;

            //require_once __DIR__ . '/../controllers/BaseController.php';
            //require_once __DIR__ . '/../controllers/IndexController.php';

            //If these are a valid Class and a valid method inside this Class -> call_user_func_array()
            if (is_callable(array(new $this->controller, $this->method))) {

                \call_user_func_array(array(new $this->controller, $this->method), array($this->match['params']));

            } else {
                echo "The method {$this->method} is not defined inside of a {$this->controller}";
            }

        } else {
            //No route was matched ->
            //Check a server protocol and set it to 404

            //For PHP<5.4
            // In Chrome Inspector, a response header is "500 Internal Server Error"?
            //header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');

            //For PHP>=5.4
            // In Chrome Inspector, a response header is "404 Not Found", as it should be
            http_response_code(404);

            //Show a custom 404.php message
            //include '404_test.php';

            view('errors/404');
        }
    }
}
