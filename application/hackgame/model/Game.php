<?php

namespace app\hackgame\model;

class Game {

    public function getUserInfo ($user_id) {

        return Db('hg_user t1')
            ->join('m_user t2', 't1.user_id=t2.id', 'left')
            ->field([
                't2.id',
                't2.username',
                't2.password',
                't2.email',
                't2.create_time',
                't1.user_id',
                't1.salt',
            ])
            ->where(['t1.user_id' => $user_id])
            ->find();
    }

    public function getLevelInfo ($user_id) {
        
        return Db('hg_level t1')
            ->join('hg_page t2', 't1.level=t2.level', 'left')
            ->field([
                't1.id',
                't1.user_id',
                't1.level',
                't1.start_time',
                't1.end_time',
                't2.page',
            ])
            ->where(['t1.user_id' => $user_id])
            ->order('t1.level desc')
            ->select();
    }

    public function getPageInfo ($page) {
        
        return Db('hg_page')
            ->field([
                'id',
                'level',
                'page',
            ])
            ->where(['page' => $page])
            ->find();
    }
}