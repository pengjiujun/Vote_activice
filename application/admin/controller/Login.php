<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/12
 * Time: 14:06
 */

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Session;

class Login extends Controller
{
    public function getIndex()
    {
        return $this->fetch('login/index');
    }

    public function postLog()
    {
        $captcha = $_POST["captcha"];
        //验证码验证
        if (captcha_check($captcha)) {
            $name = $_POST["name"];
            $pwd = $_POST["password"];
            $admin_user = Db::name('admin_user')->where('name', $name)->find();
            if ($admin_user['name'] == $name) {
                if ($admin_user['password'] == md5($pwd)) {
                    //把管理员id和用户名存入session中
                    Session::set('id', $admin_user['id']);
                    Session::set('name', $admin_user['name']);
                    return ['code' => 200, 'msg' => '登录成功'];
                } else {
                    return ['code' => 201, 'msg' => '密码错误'];
                }
            } else {
                return ['code' => 202, 'msg' => '管理员错误'];
            }
        } else {
            return ['code' => 203, 'msg' => '验证码错误'];
        }
    }

    public function getLogout()
    {
        //清除session
        Session::clear();
        return $this->redirect('/login/index');
    }


}