<?php

namespace app\hackgame\model;

class User {

    public function getUserInfo () {

        return Db('hg_user_level t1')
            ->join('m_user t2', 't1.user_id=t2.id', 'left')
            ->field([
                't2.id',
                't2.username',
                't2.password',
                't2.email',
                't2.create_time',
                't1.user_id',
                't1.level',
                't1.salt',
            ])
            ->where(['t1.user_id' => 1])
            ->find();
    }
}