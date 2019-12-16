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
     * Return all requests
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
    public static function get($key)
    {
        $obj = new static();
        $data = $obj->all();

        return $data->$key;
    }

    /**
     * Check request availability
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        // By passing a TRUE to a self::all, turned the result into an array
        return (array_key_exists($key, self::all(true)) ? true : false);
    }

    /**
     * Get request data
     * @param $key
     * @param $value
     * @return mixed
     */
    public static function old($key, $value)
    {
        $obj = new static();
        $data = $obj->all();
        return (isset($data->$key->$value)) ? $data->$key->$value : "";
    }

    /**
     * Refresh all requests
     */
    public static function refresh()
    {
        $_GET = [];
        $_POST = [];
        $_FILES = [];
    }

}