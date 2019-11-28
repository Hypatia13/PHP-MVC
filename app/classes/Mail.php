<?php
/**
 * Created by PhpStorm.
 * User: erie
 * Date: 28/11/2019
 * Time: 20.21
 */

namespace App\Classes;

use PHPMailer\PHPMailer\PHPMailer as PHPMailer;

class Mail
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->setUp();
    }

    public function setUp()
    {
        $this->mail->isSMTP();
        $this->mail->Mailer = 'smtp';
        $this->mail->SMTPAuth = true;

        //Either 'tls' or 'ssl', depending on my SMTP settings
        $this->mail->SMTPSecure = 'tls';

        $this->mail->Host = getenv('SMTP_HOST');
        $this->mail->Port = getenv('SMTP_PORT');

        // Enable SMTP Debug if not in production environment
        $environment = getenv('APP_ENV');
        if ($environment === 'local') {
            $this->mail->SMTPDebug = 1;
        }

        //Auth info
        $this->mail->Username = getenv('EMAIL_USERNAME');
        $this->mail->Password = getenv('EMAIL_PASSWORD');

        $this->mail->isHTML(true);
        $this->mail->SingleTo = true;

        //Sender's info
        $this->mail->From = getenv('ADMIN_EMAIL');
        $this->mail->FromName = getenv('APP_NAME');

    }

    //Compose the message and who it is sent to
    public function send($data)
    {
        $this->mail->addAddress($data['to'], $data['name']);
        $this->mail->Subject = $data['subject'];

        //One way of composing an email body
        $body = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Title</title>
            </head>
            <body>
            Email Body
            </body>
            </html>';

        $this->mail->Body = $body;
    }
}