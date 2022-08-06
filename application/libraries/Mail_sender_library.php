<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mail_sender_library
{
    private $host = "smtppro.zoho.com";
    private $port = "465";
    private $username = "support@fogzee.com";
    private $password = '!Fogzee789';

    public function send_an_email($to, $subject, $message)
    {

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer();

        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = $this->host;
            $mail->SMTPAuth = true;
            $mail->Username = $this->username;
            $mail->Password = $this->password;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = $this->port;

            //Recipients
            $mail->setFrom('support@fogzee.com', 'Fogzee.com');
            $mail->addAddress($to);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}