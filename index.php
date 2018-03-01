<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
header("Content-type:text/html;charset=utf-8");

// 应用入口文件

// 检测PHP环境

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);


// 定义应用目录
define('APP_PATH','./Application/');
define('DEFAULT_MODULE','Chat');
define("SITE_URL","http://localhost:8888/");
//define("SITE_URL","http://localhost/");
define("SHOW_URL",SITE_URL."erhuo/");
define("CSS_URL",SHOW_URL."Public/css/");
define("IMG_URL",SHOW_URL."Public/img/");
define("JS_URL",SHOW_URL."Public/js/");
define("UP_PATH","./Public/up/");

//后台
define("ADMIN_CSS_URL",SHOW_URL."Application/Admin/Public/css/");
define("ADMIN_IMG_URL",SHOW_URL."Application/Admin/Public/img/");
define("ADMIN_JS_URL",SHOW_URL."Application/Admin/Public/js/");


// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

