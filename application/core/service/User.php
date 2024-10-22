<?php

namespace app\core\service;

class User {

     public function checkEmail ($email) {
        
        $pattern = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
        if (preg_match($pattern, $email)) {
            return true;
        }else {
            return false;
        }
    }

    public function setUserCookie ($userInfo) {

        try {
            $aesObj = new \app\common\tools\Aes();
            $userModel = new \app\core\model\User();
            $aesObj->setIv('a89fd5dbedd24280');
            $aesObj->setKey('a89fd5dbedd24280');
            $email = $userInfo['email'];
            $tokenCtime = date('Y-m-d H:i:s', time());
            $loginIp = $_SERVER['REMOTE_ADDR'];
            $data['id'] = $userInfo['id'];
            $data['email'] = $userInfo['email'];
            $data['create_time'] = $userInfo['create_time'];
            $data['login_ip'] = $loginIp;
            $data['token_ctime'] = $tokenCtime;
            $token = $aesObj->encrypt(json_encode($data, true));
            $userModel->saveTokenByEmail($email, $token, $tokenCtime, $loginIp);
            setcookie("token", $token, time() + 3600);
            return true;
        }catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}