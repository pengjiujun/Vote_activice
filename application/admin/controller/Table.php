<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/12
 * Time: 11:21
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\Validate;

class Table extends Base
{
    public function getIndex()
    {
        $list = Db::name('hotel')->select();
        $a = 1;
        $this->assign('list', $list);
        return $this->fetch('table/index', ['a' => $a]);
    }

    public function postAdd()
    {
        return $this->fetch('table/add');
    }

    public function postCity()
    {
        $city = request()->param('city');
        $name = request()->param('name');
        $date = date("Y-m-d H:i:s");

        //验证提交信息
        $validate = new Validate(
            [
                'city' => 'require|max:25',
                'name' => 'require|max:200',
            ],
            [
                'city.require' => '城市必须填写',
                'city.max' => '城市名最多不能超过25个字符',
                'name.require' => '酒店地址必须填写',
                'name.max' => '酒店地址名最多不能超过200个字符',
            ]);
        $data =
            [
                'city' => $city,
                'name' => $name,
                'datetime' => $date
            ];
        //校验信息
        if (!$validate->check($data)) {
            return ['code' => 202, 'msg' => $validate->getError()];
            //return $this->error($validate->getError());
        }
        if (Db::name('hotel')->insert($data)) {
            return ['code' => 200, 'msg' => '添加成功'];
        } else {
            return ['code' => 201, 'msg' => '添加失败'];
        }
    }

    public function postEdit()
    {

        $id = request()->param('id');
        $list = Db::name('hotel')->where('id', $id)->find();
        $this->assign('list', $list);
        return $this->fetch('table/edit');
    }

    public function postUpdate()
    {
        $id = request()->param('id');
        $city = request()->param('city');
        $name = request()->param('name');
        $data = ['city' => $city, 'name' => $name];
        $lise = Db::name('hotel')->where('id', $id)->update($data);
        if ($lise) {
            return ['code' => 200, 'msg' => '修改成功'];
        } else {
            return ['code' => 400, 'msg' => '请确认编辑后再次提交'];
        }
    }
    public function getDelete(){
        $id = request()->param('id');
        $lise = Db::name('hotel')->where('id', $id)->delete();
        if ($lise) {
            return ['code' => 200, 'msg' => '删除成功'];
        } else {
            return ['code' => 400, 'msg' => '删除失败'];
        }
    }

}