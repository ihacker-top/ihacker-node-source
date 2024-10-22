<?php

namespace app\core\model;

class Captcha {

    // 获取60秒内发送的验证码
    public function getNewCaptcha60ByEmail ($email) {
        $whereTime = date('Y-m-d H:i:s', time() - 60);
        return Db('m_captcha')
            ->where('create_time', 'egt', $whereTime)
            ->where(['email' => $email])
            ->order('create_time desc')
            ->find();
    }

    // 获取10分钟内有的效验证码
    public function getNewCaptcha600ByEmail ($email) {
        $whereTime = date('Y-m-d H:i:s', time() - 600);
        $rs = Db('m_captcha')
            ->where('create_time', 'egt', $whereTime)
            ->where(['email' => $email, 'status' => 1])
            ->order('create_time desc')
            ->find();
        return $rs;
    }

    // 检查验证码是否正确
    public function checkCaptcha ($email, $code) {
        $captchaInfo = $this->getNewCaptcha600ByEmail($email);
        if (!empty($captchaInfo['code']) && $captchaInfo['code'] === $code) {
            return Db('m_captcha')
                ->where(['email' => $email, 'status' => 1])
                ->data(['status' => 0])
                ->update();
        }else {
            return false;
        }
    }

    // 保存新验证码
    public function saveCaptcha ($email, $code) {
        $create_time = date('Y-m-d H:i:s');
        return Db('m_captcha')->data(['email' => $email, 'code' => $code, 'create_time' => $create_time, 'status' => 1])->insert();
    }
}