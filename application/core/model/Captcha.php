<?php

namespace app\core\model;

class Captcha {

    public function getNewCaptcha60ByEmail ($email) {
        $whereTime = date('Y-m-d H:i:s', time() - 60);
        return Db('m_captcha')
            ->where('create_time', 'egt', $whereTime)
            ->where(['email' => $email])
            ->order('create_time desc')
            ->find();
    }

    public function getNewCaptcha600ByEmail ($email) {
        $whereTime = date('Y-m-d H:i:s', time() - 600);
        $rs = Db('m_captcha')
            ->where('create_time', 'egt', $whereTime)
            ->where(['email' => $email, 'status' => 1])
            ->order('create_time desc')
            ->find();
        return $rs;
    }

    public function checkCaptcha ($email, $code) {
        $captchaInfo = $this->getNewCaptcha600ByEmail($email);
        if (!empty($captchaInfo['code']) && $captchaInfo['code'] === $code) {
            Db('m_captcha')
                ->where(['email' => $email, 'status' => 1])
                ->data(['status' => 0])
                ->update();
            return true;
        }else {
            return false;
        }
    }

    public function saveCaptcha ($email, $code) {
        $create_time = date('Y-m-d H:i:s');
        return Db('m_captcha')->data(['email' => $email, 'code' => $code, 'create_time' => $create_time, 'status' => 1])->insert();
    }

    public function sendCaptcha ($email) {
        $mailObj = new \app\common\tools\Mail();
        $code = rand(100000, 999999);
        $this->saveCaptcha($email, $code);
        $body = '<p style="font-size:26px;font-weight:bold;">
                <span>验证码：</span>
                <span style="background-color:#f33;color:#fff;padding:5px;border-radius:10px;">' . $code . '</span>
            </p>';
        // return $mailObj->send("[安全节点] - 验证码", $body, $email);
    }
}