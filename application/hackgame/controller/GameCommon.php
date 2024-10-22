<?php

namespace app\hackgame\controller;

class GameCommon extends Common {

    protected $userInfo;
    protected $levelInfo;
    protected $pageInfo;

    public function __construct () {

        parent::__construct();
        $gameModel = new \app\hackgame\model\Game();
        $nowAction = \think\facade\Request::action();
        $this->userInfo = $gameModel->getUserInfo(1);
        $this->levelInfo = $gameModel->getLevelInfo(1);
        $this->pageInfo = $gameModel->getPageInfo($nowAction);

        

        if ((int)$this->pageInfo['level'] > (int)$this->levelInfo[0]['level']) {
            header('Location: ' . url('hackgame/start/' . $this->levelInfo[0]['page']));
            exit;
        }
    }
}