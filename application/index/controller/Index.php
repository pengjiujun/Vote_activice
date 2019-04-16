<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Index extends Base
{
    public function getIndex()
    {
//        //接收搜索查询信息
//        $select = request()->get('name');
//        $select = '留';

        $name = Session::get('name');
        $sid= Session::get('id');
//        var_dump($name);exit();
//        $name = Db::name('user')->select();
        $list = Db::name('hotel')->select();
//        var_dump($list);
        foreach ($list as $v) {

            $city[$v['city']][$v['id']] = $v['name'];
        }
//        $a =  $this->index();
//        echo '<pre>';
//        var_dump($city);exit();
//        $list = Db::table('hotel')->distinct(true)->field('city')->select();

        //倒叙模糊查询、模板数据、搜索
//        $data = Db::table('hotel')->where(
//            [
//                'name' => ['like', '%' . $select . '%'],
//            ])->order('id desc')->select();
//
//        echo '<pre>';
//        var_dump($data);
//        var_dump($list);exit();

        //查询所选所有酒店信息
        $info = Db::name('user')->where('id',$sid)->value('hotel_id');
        //以||分割为数组
        $info = explode("||", $info);
        //在数组中以","分割数据
        foreach ($info as $v)
        {
            $info_s[]=explode(",",$v);
        }
        //将分割数据转换为一维数组
        $info_s = multi2array($info_s);
        //将一维数组字符串类型，转换为整型
        foreach ($info_s as $v)
        {
            $info_s1[] = (int)$v;
        }
        //将字符串中空数据删除
        $info_s2=(array_filter($info_s1));
        //将酒店地址id,转换为整形
        foreach ($info_s2 as $v)
        {
            $info_s3[] = $v = Db::name('hotel')->whereIn('id',$v)->value('name');
        }
        //将数组每3个分割一组
        $info_4 = array_chunk($info_s3, 3);
        $this->assign('city', $city);
        return $this->fetch('index/index', ['name' => $name,'info'=>$info_4]);
    }

    /**
     * 接收所选择的3家酒店
     */
    public function getAdd()
    {
        $uid = Session::get('id');
        $id[] = $_GET['id'];
        //将接收的数组，进行循环拼接，转换为字符串
        foreach ($id as $v) {
            $did = implode(",", $v);
        }
        //先查询该用户是否已经选择酒店
        $selected = Db::name('user')->where('id',$uid)->value('hotel_id');
        //将所选酒店，和已选酒店进行拼接
        $close = ($did.'||'.$selected);
        $data = ['hotel_id' => $close];
        if (Db::name('user')->where('id', $uid)->update($data)) {
            return ['code' => 200, 'msg' => '选择成功'];
        };
    }

    /**
     * 1.查询酒店总数
     * 2.查询用户已选酒店id
     * 3.将数据进行比对
     * 4.返回还未选酒店id
     */
    public function getCount()
    {
        //查询酒店地址id
        $did = Db::name('hotel')->column('id');
        //查询用户已选酒店地址id
        $user_did = Db::name('user')->column('hotel_id');
        foreach ($user_did as $k=>$v)
        {
            $a[]=explode("||",$v);
        }
        //将查询数据转换为字符串
        foreach ($did as $v)
        {
            $did1[]=(string)$v;
        }
        //将用户选择的酒店id,转换为一维数组
        $result = array_reduce($a, function ($result, $value) {
            return array_merge($result, array_values($value));
        }, array());
        //将数据再次分割
        foreach ($result as $v)
        {
            $d_id[]=explode(",",$v);
        }
        //将分割数据转换为一维数组
        $d_ids = multi2array($d_id);

       //比较数据（返回剩余没被选择的数据）
        $old = array_diff($did1,$d_ids);

        foreach($old as $v)
        {
            $array[]=(int)$v;
        }
//        $old = (int)$old;


        return json_encode($array);
    }

}
