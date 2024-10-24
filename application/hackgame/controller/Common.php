<?php

namespace app\hackgame\controller;

use think\Controller;

class Common extends Controller {

    protected $userInfo;
    protected $levelInfo;
    protected $pageInfo;

    public function __construct () {

        parent::__construct();
        $gameModel = new \app\hackgame\model\Game();
        $userService = new \app\core\service\User();
        $nowAction = \think\facade\Request::action();
        $this->userInfo = $userService->checkUserLoginStatus(); // 检查用户登录状态，如果登录则返回用户数据记录，否则返回false

        if (!$this->userInfo) { // 判断用户是否登录
            header('Location: ' . MY_HOME_BASE_URL . '/#/login');
            exit;
        }

        $this->levelInfo = $gameModel->getLevelInfo($this->userInfo['id']); // 获取用户通关列表记录，倒序排列
        $this->pageInfo = $gameModel->getPageInfo($nowAction); // 获取当前页面数据记录

        if ($nowAction === 'index') { // 判断是否为登录跳转，是则跳转到用户最大关卡
            header('Location: ' . url('hackgame/start/' . $this->levelInfo[0]['page']));
            exit;
        }else if ($nowAction !== 'index' 
            && (int)$this->pageInfo['level'] > (int)$this->levelInfo[0]['level']) { // 判断访问关卡是否大于用户当前最大关卡，是则跳转到最大关卡
            header('Location: ' . url('hackgame/start/' . $this->levelInfo[0]['page']));
            exit;
        }
    }

    private function checkFlag ($flag = '') {

        if (input('post.flag')) {

        }
    }

    private function nextLevel () {
        
    }
}