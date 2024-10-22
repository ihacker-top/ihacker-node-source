<?php

namespace app\hackgame\model;

class Game {

    // 获取用户通关列表记录，倒序排列
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
 
    // 获取当前页面数据记录
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