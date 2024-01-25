<?php 
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 
namespace System\Plugins;

use PHPMailer\PHPMailer\PHPMailer;

include "vendor/autoload.php";

class SMTP
{
    public function __construct(){

    }

    public function msg(){
        return "Hello message SMTP";
    }

    public function send($to, $subject, $msg){

        $mail = new PHPMailer();
        // $mail->SMTPDebug  = 3;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = MAIL_HOST;
        $mail->Port = MAIL_PORT;
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;
        $mail->SetFrom(MAIL_USERNAME);
        $mail->Subject = $subject;
        $mail->Body = $msg;
        $mail->AddAddress($to);
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        if (!$mail->Send()) {
            return false;
        } else {
            return true;
        }
    }
}
?>