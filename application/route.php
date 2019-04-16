<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Controller;
use think\Route;

//后台登录
Route::Controller('login','admin/Login');

//后台首页
Route::Controller('admin','admin/Index');

//后台用户管理
Route::Controller('merchant','admin/Merchant');

//后台酒店管理
Route::Controller('table','admin/Table');

//后台导出数据表
Route::Controller('data','admin/Data');


//前台base
Route::Controller('base','index/Base');

//前台登录
Route::Controller('logs','index/Logs');

//前台首页
Route::Controller('index','index/Index');