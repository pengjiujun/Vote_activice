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
use think\Db;

class Index extends Base
{
    public function getIndex()
    {
        $info = DB::table('type')->where('id','1')->find();
//        echo '<pre>';
//        var_dump($info);exit();
        $this->assign('list',$info);
        return $this->fetch('index/index');
    }
    public function getDate(){

        return $this->fetch('index/date');
    }

    public function getUpdate()
    {
        $id = $_GET['id'];
        if ($id == 2)
        {
            $data = ['type'=>$id];
           if (Db::name('type')->where('id',1)->update($data)) {
               return ['code'=>200,'msg'=>'活动以关闭'];
           }

        }
        if ($id ==1){
            //        $time = $_GET['time'];
            $request = request();
            $id = $request->param('time');
//        var_dump($time);
//        exit();
            $k_time = substr($id, 0, 19);
            $g_time = substr($id, 22, 18);
            $data = ['type'=>1,'k_time' => $k_time, 'g_time' => $g_time];
//        var_dump($data);exit();
            $info = DB::table('type')->where('id', 1)->update($data);
            if ($info) {
                return ['code' => 200, 'msg' => '开启时间设置成功'];
            } else {
                return ['code' => 201, 'msg' => '开启活动失败'];
            }
        }



    }
}