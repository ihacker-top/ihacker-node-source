<?php

namespace app\hackgame\controller;

class GameCommon extends Common {

    protected $userInfo;

    public function __construct () {

        $userModel = new \app\hackgame\model\User();
        $this->userInfo = $userModel->getUserInfo();
    }
}