<?php

namespace app\core\model;

class User {

    public function getUserInfoByEmail ($email) {
        return Db('m_user')->where(['email' => $email])->find();
    }
}