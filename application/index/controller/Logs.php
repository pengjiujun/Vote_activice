<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/12 0012
 * Time: 下午 5:20
 */

namespace app\index\controller;


use think\Controller;
use think\Db;
use think\Session;

class Logs extends Controller
{
    public function getIndex()
    {
        return $this->fetch('logs/index');
    }

    public function postLog()
    {
        $name = $_POST["name"];
        $pwd = $_POST["password"];
        $user = Db::name('user')->where('name', $name)->find();
        if ($user['name'] == $name) {
            if ($user['password'] == md5($pwd)) {
                //把管理员id和用户名存入session中
                Session::set('id', $user['id']);
                Session::set('name', $user['name']);
                return ['code' => 200, 'msg' => '登录成功'];
            } else {
                return ['code' => 201, 'msg' => '密码错误'];
            }
        } else {
            return ['code' => 202, 'msg' => '用户名称错误'];
        }
    }

    public function getLogout()
    {
        //清除session
        Session::clear();
        return $this->redirect('/logs/index');
    }

}