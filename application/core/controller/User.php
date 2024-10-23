<?php

namespace app\core\Controller;

use think\Controller;

class User extends Controller {

    // 登录页面
    public function login () {
        return $this->fetch();
    }

    // 第三方登录接口
    public function apiLogin () {
        $result = ['code' => 0];
        $captchaModel = new \app\core\model\Captcha(); // 验证码类
        $userModel = new \app\core\model\User(); // 用户数据模块
        $userService = new \app\core\service\User(); // 用户方法类
        $email = input('post.email');
        $code = input('post.code');
        if ($captchaModel->checkCaptcha($email, $code)) { // 检查验证码是否正确
            $userInfo = $userModel->getUserInfoByEmail($email); // 获取用户信息
            if (empty($userInfo)) { // 判断用户是否存在，如果不存在则注册新用户
                $userModel->saveUser($email); // 保存用户信息
                $userInfo = $userModel->getUserInfoByEmail($email); // 获取用户信息
            }
            $token = $userService->generAndSaveToken($userInfo); // 生成用户登录token
            $result['token'] = $token;
            $result['domain'] = MY_COOKIE_DOMAIN;
            $result['email'] = $userInfo['email'];
            $result['message'] = '登陆成功';
        }else {
            $result['code'] = -1;
            $result['message'] = '验证码有误';
        }
        return json($result);
    }

    // 登录/注册验证接口
    public function gotoLogin () {
        $result = ['code' => 0];
        $captchaModel = new \app\core\model\Captcha(); // 验证码类
        $userModel = new \app\core\model\User(); // 用户数据模块
        $userService = new \app\core\service\User(); // 用户方法类
        $email = input('post.email');
        $code = input('post.code');
        if ($captchaModel->checkCaptcha($email, $code)) { // 检查验证码是否正确
            $userInfo = $userModel->getUserInfoByEmail($email); // 获取用户信息
            if (empty($userInfo)) { // 判断用户是否存在，如果不存在则注册新用户
                $userModel->saveUser($email); // 保存用户信息
                $userInfo = $userModel->getUserInfoByEmail($email); // 获取用户信息
            }
            $userService->setUserCookie($userInfo); // 设置登录状态（token）
            $result['message'] = '登陆成功';
        }else {
            $result['code'] = -1;
            $result['message'] = '验证码有误';
        }
        return json($result);
    }

    public function sendCode () {
        $result = ['code' => 0];
        $captchaService = new \app\core\service\Captcha(); // 验证码类
        $captchaModel = new \app\core\model\Captcha(); // 验证码数据模块
        $userService = new \app\core\service\User(); // 用户方法类
        $email = input('post.email');
        if (!$userService->checkEmail($email)) { // 检查邮箱格式是否正确
            $result['code'] = 2;
            $result['message'] = '邮箱格式有误';
            return json($result);
        }
        $sendStatus = $captchaModel->getNewCaptcha60ByEmail($email); // 获取此邮箱60秒内是否发送过验证码
        if (empty($sendStatus)) {
            $captchaService->sendCaptcha($email);
            $result['message'] = '发送成功，10分钟内有效';
        }else {
            $time = 60 - (time() - strtotime($sendStatus['create_time'])); // 计算下次发送验证码时间
            $result['code'] = 1;
            $result['time'] = $time + 1;
            $result['message'] = '已发送过验证码，请' . $time . '秒后再次发送';
        }
        return json($result);
    }
}