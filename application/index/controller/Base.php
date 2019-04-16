<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/12 0012
 * Time: 下午 5:15
 */

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Session;

class Base extends Controller
{
    public function _initialize()
    {
        if (!Session::get('id')) {
            //跳转到登录页面
            return $this->redirect('/logs/index');
        };
    }

    public function getindex()
    {
        $type = Db::name('type')->where('id', 1)->value('type');
        if ($type == 1) {
            $type_1 = Db::name('type')->where('id', 1)->find();
            $k_time = $type_1['k_time'];
            $g_time = $type_1['g_time'];
            $data = [1,$k_time,$g_time];
            return json_encode($data);
        }
        if ($type == 2) {
            return 2;
        }

    }

}