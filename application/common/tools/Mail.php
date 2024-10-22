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
        
        $this->host = 'smtp.exmail.qq.com';
        $this->port = 25;
        $this->username = 'admin@ihacker.top';
        $this->password = 'AAcdQr6fZxeuPcdU';
        $this->from = 'admin@ihacker.top';
        $this->nickname = 'Security Node Team';
    }

    public function send ($title, $body, $toMail, $toNickname = '') {

        try {

            $mail = new PHPMailer(true);
            // $mail->SMTPDebug  = SMTP::DEBUG_SERVER; // 开启显示输出邮件发送过程
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
            $mail->Subject = $title; // 邮件标题
            $mail->Body = $body; // 邮件内容
            $mail->isHTML(true);
            $mail->send(); // 发送邮件
            return true;
        }catch (\Exception $e) {
            
            return false;
        }
    }
}