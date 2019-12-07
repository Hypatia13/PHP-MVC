<?php
/**
 * Created by PhpStorm.
 * User: erie
 * Date: 07/12/2019
 * Time: 16.52
 */

namespace App\Classes;


class Session
{


    /** Create a session
     * @param $name
     * @param $value
     * @return mixed
     * @throws \Exception
     */
    public static function add($name, $value)
    {
        if ($name != '' && !empty($name) && $value != '' && !empty($value)) {
            return $_SESSION[$name] = $value;
        } else {
            throw new \Exception('Name and value are required');
        }
    }

    /** Get value from a session
     * @param $name
     * @return mixed
     */
    public static function get($name)
    {
        return $_SESSION[$name];
    }


    /** Check if session exists
     * @param $name
     * @return bool
     */
    public static function has($name)
    {
        if ($name != '' && !empty($name)) {
            return isset($_SESSION[$name]) ? true : false;
        } else {
            throw new \Exception('Name is required');
        }
    }


    /** Remove a session
     * @param $name
     */
    public static function remove($name)
    {
        if (self::has($name)) {
            unset($_SESSION[$name]);
        }
    }
}