<?php
/**
 * Created by PhpStorm.
 * User: erie
 * Date: 07/12/2019
 * Time: 20.54
 */

namespace App\classes;


class Redirect
{
    /**
     * Redirect to a specific page
     * @param $page
     */
    public static function to($page)
    {
        header("location:$page");
    }

    /**
     * Redirect back to a current page
     */
    public static function back()
    {
        $uri = $_SERVER['REQUEST_URI'];
        header("location: $uri");

    }
}