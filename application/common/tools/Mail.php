<?php

namespace app\common\tools;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail {

    private $host;
    private $username;
    private $password;
    private $port;
    private $from;
    private $nickname;

    public function __construct () {
        
        $this->host = 'hwsmtp.exmail.qq.com';
        $this->port = 25;
        $this->username = 'admin@ihacker.top';
        $this->password = 'AAcdQr6fZxeuPcdU';
        $this->from = 'admin@ihacker.top';
        $this->nickname = 'Security Node Team';
    }

    public function send ($title, $body, $toMail, $toNickname = '') {

        try {

            $mail = new PHPMailer(true);
            // $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = $this->host;
            $mail->Port = $this->port;
            $mail->SMTPAuth = true;
            $mail->Username = $this->username;
            $mail->Password = $this->password;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->setFrom($this->from, $this->nickname);
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];
    
            $mail->addAddress($toMail, $toNickname);
            $mail->Subject = $title;
            $mail->Body = $body;
            $mail->isHTML(true);
            $mail->send();
            return true;
        }catch (\Exception $e) {
            
            return false;
        }
    }
}