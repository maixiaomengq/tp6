<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

//360安全检测，避免拿到webshell
if( file_exists("./360safe/360webscan.php" ) ){
    require_once "./../360safe/360webscan.php";
}

// 检测PHP环境
if(version_compare(PHP_VERSION,'7.0.0','<'))  die('require PHP > 7.0.0 !');

require __DIR__ . '/../vendor/autoload.php';

// 执行HTTP应用并响应
$http = (new App())->setEnvName('local')->http;

// 绑定入口文件至应用
$response = $http->name('admin')->run();

$response->send();

$http->end($response);
