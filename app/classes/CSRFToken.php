<?php
/**
 * Created by PhpStorm.
 * User: erie
 * Date: 07/12/2019
 * Time: 17.35
 */

namespace App\Classes;


class CSRFToken
{
    /**
     * Generate a token
     * @return mixed
     * @throws \Exception
     */
    public static function _token()
    {
        //If Session doesn't have a key 'token' -> generate a random string
        if (!SESSION::has('token')) {
            $randomToken = base64_encode(openssl_random_pseudo_bytes(32));
            //Add a new key to a session
            Session::add('token', $randomToken);
        }
        return Session::get('token');
    }

    /**
     * Verify a token
     * @param $requestToken
     * @return bool
     * @throws \Exception
     */
    public static function verifyCSRFToken($requestToken)
    {
        if (SESSION::has('token') && SESSION::get('token') === $requestToken) {
            Session::remove('token');
            return true;
        }
        return false;
    }
}