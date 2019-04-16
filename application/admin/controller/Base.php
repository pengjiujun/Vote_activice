<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/12
 * Time: 10:35
 */

namespace app\admin\controller;


use think\Controller;
use think\Session;

class Base extends Controller
{
   public function _initialize()
   {

       if(!Session::get('id')){
           //跳转到登录页面
          return $this->redirect('/login/index');
       };
   }

}