<?php
/**
 * Created by PhpStorm.
 * User: erie
 * Date: 15/12/2019
 * Time: 22.28
 */

namespace App\Classes;


class Request
{
    public static function all($is_array = false)
    {
        $result = [];
        if (count($_GET) > 0) $result['get'] = $_GET;
        if (count($_POST) > 0) $result['post'] = $_POST;
        $result['file'] = $_FILES;

        // 2nd parameter in json_decode is a BOOLEAN
        // When TRUE, returned objects will be converted into associative arrays.
        return json_decode(json_encode($result), $is_array);
    }
}