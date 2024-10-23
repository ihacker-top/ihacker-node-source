<?php

namespace app\core\model;

class User {

    // 根据email获取用户记录
    public function getUserInfoByEmail ($email) {
        return Db('m_user')->where(['email' => $email])->find();
    }

    // 根据用户id获取用户记录
    public function getUserInfoById ($id) {
        return Db('m_user')->where(['id' => $id])->find();
    }

    // 根据token获取用户记录
    public function getUserInfoByToken ($token) {
        return Db('m_user')->where(['token' => $token])->find();
    }

    // 保存新用户数据记录
    public function saveUser ($email) {
        $data = [];
        $data['email'] = $email;
        $data['salt'] = md5($email . 'a89fd5dbedd24280');
        $data['create_time'] = date('Y-m-d', time());
        return Db('m_user')->data($data)->insert();
    }

    // 根据email更新用户记录
    public function saveTokenByEmail ($email, $token, $tokenCtime, $loginIp) {
        $data = [];
        $data['token'] = $token;
        $data['token_ctime'] = $tokenCtime;
        $data['login_ip'] = $loginIp;
        return Db('m_user')->where(['email' => $email])->data($data)->update();
    }
}