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

    // https://github.com/PHPMailer/PHPMailer/blob/master/examples/gmail.phps
    // https://github.com/PHPMailer/PHPMailer/wiki/SMTP-Debugging

    public function setUp()
    {
        //Tell PHPMailer to use SMTP
        $this->mail->isSMTP();
        $this->mail->Mailer = 'smtp';

        //Whether to use SMTP authentication
        $this->mail->SMTPAuth = true;

        //Either 'tls' or 'ssl', depending on my SMTP settings
        $this->mail->SMTPSecure = 'tls';

        //Set the hostname of the mail server
        $this->mail->Host = getenv('SMTP_HOST');

        //Set the SMTP port number - 587 for authenticated TLS
        $this->mail->Port = getenv('SMTP_PORT');

        // Enable SMTP Debug, if not in production environment
        $environment = getenv('APP_ENV');
        if ($environment === 'local') {

            // Debug levels:
            // SMTP::DEBUG_OFF (0)
            // SMTP::DEBUG_CLIENT (1): Output messages sent by the client.
            // SMTP::DEBUG_SERVER (2): client & the server (the most useful setting).

            $this->mail->SMTPDebug = 0;
        }

        //Auth info
        //Username to use for SMTP authentication
        $this->mail->Username = getenv('EMAIL_USERNAME');
        //Password to use for SMTP authentication
        $this->mail->Password = getenv('EMAIL_PASSWORD');

        $this->mail->isHTML(true);
        $this->mail->SingleTo = true;

        //Sender's info
        //Set who the message is to be sent from
        $this->mail->From = getenv('ADMIN_EMAIL');
        $this->mail->FromName = getenv('APP_NAME');

    }

    //Compose the message and who it is sent to
    public function send($data)
    {
        //Set who the message is to be sent to
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

        //send the message, check for errors
        if (!$this->mail->send()) {
            return 'Mailer Error: '. $this->mail->ErrorInfo;
        } else {
            return 'Message sent!';
        }
    }
}