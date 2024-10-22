<?php

namespace app\core\Controller;

use think\Controller;

class User extends Controller {

    public function login () {
        return $this->fetch();
    }

    public function gotoLogin () {
        $result = ['code' => 0];
        $captchaModel = new \app\core\model\Captcha();
        $userModel = new \app\core\model\User();
        $userService = new \app\core\service\User();
        $email = input('post.email');
        $code = input('post.code');
        if ($captchaModel->checkCaptcha($email, $code)) {
            $userInfo = $userModel->getUserInfoByEmail($email);
            if (empty($userInfo)) {
                $userModel->saveUser($email);
                $userInfo = $userModel->getUserInfoByEmail($email);
            }
            $userService->setUserCookie($userInfo);
            $result['message'] = '登陆成功';
        }else {
            $result['code'] = -1;
            $result['message'] = '验证码有误';
        }
        return json($result);
    }

    public function sendCode () {
        $result = ['code' => 0];
        $captchaModel = new \app\core\model\Captcha();
        $userService = new \app\core\service\User();
        $email = input('post.email');
        if (!$userService->checkEmail($email)) {
            $result['code'] = 2;
            $result['message'] = '邮箱格式有误';
            return json($result);
        }
        $sendStatus = $captchaModel->getNewCaptcha60ByEmail($email);
        if (empty($sendStatus)) {
            $captchaModel->sendCaptcha($email);
            $result['message'] = '发送成功，10分钟内有效';
        }else {
            $time = 60 - (time() - strtotime($sendStatus['create_time']));
            $result['code'] = 1;
            $result['time'] = $time;
            $result['message'] = '已发送过验证码，请' . $time . '秒后再次发送';
        }
        return json($result);
    }
}