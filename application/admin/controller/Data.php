<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/12 0012
 * Time: 下午 4:57
 */

namespace app\admin\controller;


use think\Db;

class Data extends Base
{
    public function getIndex()
    {
            $this->assign('data', $this->userInfos());
            return $this->fetch('data/index');
    }

    protected function userInfos()
    {
        $users = Db::name('user')->select();
        foreach ($users as &$user) {
            $hotelFunc = function($hotelIdStr) {
                $hotelIds = [];
                foreach (explode('||', $hotelIdStr) as $hotelId) {
                    $hotelIds = array_merge($hotelIds, explode(',', $hotelId));
                }
                return $hotelIds;
            };
            $hotelIds = $hotelFunc($user['hotel_id']);
//            var_dump(Db::name('hotel')->whereIn('id',$hotelIds)->column('name'));exit;
            $user['hotel_id'] = implode(',', Db::name('hotel')->whereIn('id',$hotelIds)->column('name'));
        }
        return $users;
    }

    //导出管理员信息
    public function getexcel()
    {

        ini_set('memory_limit', '3072M');    // 临时设置最大内存占用为3G
        set_time_limit(0);   // 设置脚本最大执行时间 为0 永不过期

        // halt(1111);
        $name = "信息数据";
        $header = ['姓名', '所选酒店'];
        $users = $this->userInfos();
        foreach ($users as &$user) {
            $user = [$user['name'],$user['hotel_id']];
        }
        excelExport($name, $header, $users);
    }
}