<?php

namespace app\core\model;

class User {

    public function getUserInfoByEmail ($email) {
        return Db('m_user')->where(['email' => $email])->find();
    }

    public function saveUser ($email) {
        $data = [];
        $data['email'] = $email;
        $data['salt'] = md5($email . 'a89fd5dbedd24280');
        $data['create_time'] = date('Y-m-d', time());
        return Db('m_user')->data($data)->insert();
    }

    public function saveTokenByEmail ($email, $token, $tokenCtime, $loginIp) {
        $data = [];
        $data['token'] = $token;
        $data['token_ctime'] = $tokenCtime;
        $data['login_ip'] = $loginIp;
        return Db('m_user')->where(['email' => $email])->data($data)->update();
    }
}