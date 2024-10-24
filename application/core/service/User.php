<?php

namespace app\core\service;

class User {

    // 验证邮箱格式是否正确方法
    public function checkEmail ($email) {
        
        try {
            $pattern = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
            if (preg_match($pattern, $email)) {
                return true;
            }else {
                return false;
            }
        }catch (\Exception $e) {
            \think\facade\Log::record($e->getMessage());
            return false;
        }
    }

    // 生成token并保存到数据库
    public function generAndSaveToken ($userInfo) {
        
        try {

            $aesObj = new \app\common\tools\Aes(); // AES加密/解密类
            $userModel = new \app\core\model\User(); // 用户数据模块
            $aesObj->setIv('a89fd5dbedd24280');
            $aesObj->setKey('a89fd5dbedd24280');
            $email = $userInfo['email'];
            $tokenCtime = date('Y-m-d H:i:s', time());
            $loginIp = $_SERVER['REMOTE_ADDR'];
            $data['id'] = $userInfo['id']; // 用户id
            $data['email'] = $userInfo['email']; // 用户邮箱
            $data['salt'] = $userInfo['salt']; // 用户盐
            $data['create_time'] = $userInfo['create_time']; // 用户创建时间
            $data['login_ip'] = $loginIp; // 用户登录ip
            $data['token_ctime'] = $tokenCtime; // 用户登录时间（token生成时间）
            $token = $aesObj->encrypt(json_encode($data, JSON_UNESCAPED_UNICODE)); // token加密转换
            $userModel->saveTokenByEmail($email, $token, $tokenCtime, $loginIp); // 更新用户记录
            return $token;
        }catch (\Exception $e) {
            \think\facade\Log::record($e->getMessage());
            return false;
        }
    }

    // 检查用户登录状态，如果登录则返回用户数据记录，否则返回false
    public function checkUserLoginStatus () {

        try {
            $aesObj = new \app\common\tools\Aes(); // AES加密/解密类
            $userModel = new \app\core\model\User(); // 用户数据模块
            $aesObj->setIv('a89fd5dbedd24280');
            $aesObj->setKey('a89fd5dbedd24280');
            $token = $_COOKIE['token'];
            $tokenData = json_decode($aesObj->decrypt($token), true); // token数据解密转换
            $userInfo = $userModel->getUserInfoById($tokenData['id']); // 获取用户记录
            if ($userInfo['token'] !== $token 
                || $userInfo['login_ip'] !== $tokenData['login_ip'] 
                || $userInfo['salt'] !== $tokenData['salt']) { // 判断token合法性
                return false;
            }
            return $userInfo;
        }catch (\Exception $e) {
            \think\facade\Log::record($e->getMessage());
            return false;
        }
    }
}