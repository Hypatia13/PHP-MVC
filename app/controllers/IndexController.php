<?php
namespace App\Controllers;

use App\Classes\Mail;

class IndexController extends BaseController
{

    public function show()
    {
        //echo "Inside Homepage from an Index Controller";

        $mail = new Mail();
        $data = [
            'to'=>'it.hypatia13@gmail.com',
            'subject'=>'Welcome to a Store!',
            'name'=>'Jane Doe'
        ];
        $mail->send($data);
    }

}
