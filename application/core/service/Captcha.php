<?php

namespace app\core\service;

class Captcha {

    // 向email发送验证码
    public function sendCaptcha ($email) {
        $mailObj = new \app\common\tools\Mail();
        $captchaModel = new \app\core\model\Captcha(); // 验证码数据模块
        $code = rand(100000, 999999);
        $captchaModel->saveCaptcha($email, $code);
        $body = '<p style="font-size:26px;font-weight:bold;">
                <span>验证码：</span>
                <span style="background-color:#f33;color:#fff;padding:5px;border-radius:10px;">' . $code . '</span>
            </p>';
        // return $mailObj->send("[安全节点] - 验证码", $body, $email);
    }
}