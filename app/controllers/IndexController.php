<?php

namespace App\Controllers;

use App\Classes\Mail;

class IndexController extends BaseController
{

    public function show()
    {
        // echo "Inside Homepage from an Index Controller" . "<br>";

        $mail = new Mail();
        $data = [
            'to' => 'it.hypatia13@gmail.com',
            'subject' => 'PHP MVC Course!',
            'name' => 'Jane Doe',
            //The name of a template
            'view' => 'welcome',
            'body' => 'Testing email template'
        ];

        //Check for errors
        if (!$mail->send($data)) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
    }

}
