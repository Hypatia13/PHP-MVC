<?php
/**
 * Created by PhpStorm.
 * User: erie
 * Date: 02/12/2019
 * Time: 18.10
 */

namespace App\Classes;


class ErrorHandler
{
    //While in development use a custom error handler ('Whoops') instead of PHP error handler
    public function handleErrors($error_number, $error_message, $error_file, $error_line)
    {
        $error = "[{$error_number}] error occured in file 
        {$error_file} on line {$error_line} : $error_message";

        $environment = getenv('APP_ENV');
        if ($environment === 'local') {
            // https://packagist.org/packages/filp/whoops

            $whoops = new \Whoops\Run;
            $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        } else {
            $data = [
                'to' => getenv('ADMIN_EMAIL'),
                'subject' => 'System Error',
                'name' => 'Admin',
                //The name of a template
                'view' => 'errors',
                'body' => $error
            ];
        } ErrorHandler::emailAdmin($data)->outputFriendlyError();
    }

    //Show a generic error message to users in production
    public function outputFriendlyError()
    {
        //Erase contents of the output buffer
        ob_end_clean();
        view('errors/generic');
        exit;
    }

    //Send an email to admin about error in production
    public static function emailAdmin($data)
    {
        $mail = new Mail();
        $mail->send($data);

        return new static();
    }
}