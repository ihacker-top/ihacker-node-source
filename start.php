<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');

// 设置DEBUG状态
define('MY_DEBUG', true);

// 定义项目存放根目录
define('MY_ROOT_DIR', __DIR__);

// 定义资源访问根目录
define('MY_ROOT_URL', MY_DEBUG ? '/ihacker-node-source' : '');

// 加载基础文件
require __DIR__ . '/thinkphp/base.php';

// 加载第三方类库
require __DIR__ . '/vendor/autoload.php';

// 支持事先使用静态方法设置Request对象和Config对象

// 执行应用并响应
Container::get('app')->path(APP_PATH)->run()->send();