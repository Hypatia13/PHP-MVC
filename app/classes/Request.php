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
    /**
     * Return all request data
     * @param bool $is_array
     * @return mixed
     */
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

    /**
     * Get a specific request
     * @param $key
     * @return mixed
     */
    public static function get($key){
        $obj = new static();
        $data = $obj->all();

        return $data->$key;
    }

    /**
     * Check request availability
     * @param $key
     * @return bool
     */
    public static function has($key){
        return (array_key_exists($key, self::all(true)) ? true : false);
    }

}