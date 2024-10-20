<?php
namespace app\hackgame\controller;

class Start extends GameCommon {

    private $level = 3;

    public function index () {
        header('Location: /hackgame/start/first.html');
        exit;
    }

    public function first () {
        print_r($this->userInfo);
        return $this->fetch();
    }

    public function second () {
        return $this->fetch();
    }

    public function third () {
        return $this->fetch();
    }

    public function four () {
        return $this->fetch();
    }

    public function five () {
        $msg = '';
        $flag = 'flag{1234567890}';
        if (isset($_POST['flag'])) {
            if ($_POST['flag'] === $flag) {
                header('Location: six.html'); 
                exit;
            }else {
                $msg = '不对哦';
            }
        }
        $this->assign('msg', $msg);
        return $this->fetch();
    }

    public function six () {
        return $this->fetch();
    }
}
