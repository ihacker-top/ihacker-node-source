<?php
namespace app\hackgame\controller;

class Index {

    public function index () {

        header('Location: ' . url('hackgame/start/first'));
        exit;
    }

    public function mail () {

        $mail = new \app\common\tools\Mail();
        $mail->send("test", "测试<b>一下</b>", 'ihacker.top@hotmail.com', 'nickname');
    }
}
