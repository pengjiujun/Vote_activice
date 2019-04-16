<?php
/**
 * Created by PhpStorm.
 * User: phui
 * Date: 2019/3/31
 * Time: 23:49
 */

namespace app\admin\controller;

use think\Db;

class Merchant extends Base
{
    public function getIndex()
    {
        $list = Db::name('user')->select();
        $a = 1;
        $this->assign('list', $list);
        return $this->fetch('merchant/index', ['a' => $a]);
    }

    public function postAdd()
    {
        return $this->fetch('merchant/add');
    }

    public function postUserAdd()
    {
        $name = request()->param('name');
        $pwd = request()->param('pwd');
        $date = date("Y-m-d H:i:s");
        if (Db::name('user')->where('name', $name)->column('name')) {
            return ['code' => 404, 'msg' => '名称已存在请重新输入'];
        }
        $password = md5($pwd);

        $data = ['name' => $name, 'password' => $password, 'datetime' => $date];
        if (Db::name('user')->insert($data)) {
            return ['code' => 200, 'msg' => '添加成功'];
        } else {
            return ['code' => 201, 'msg' => '添加失败'];
        }
    }

    public function postEdit()
    {
        $id = request()->param('id');
        $list = Db::name('user')->where('id', $id)->find();
        $this->assign('list', $list);
        return $this->fetch('merchant/edit');
    }

    public function postUpdate()
    {
        $id = request()->param('id');
//        $name = request()->param('name');
        $pwd = request()->param('pwd');
//        if (Db::name('user')->where('name', $name)->column('name')) {
//            return ['code' => 404, 'msg' => '名称已存在请重新输入'];
//        }
        $password = md5($pwd);
        $data = [ 'password' => $password];
        $lise = Db::name('user')->where('id', $id)->update($data);
        if ($lise) {
            return ['code' => 200, 'msg' => '修改成功'];
        } else {
            return ['code' => 400, 'msg' => '与原密码设置重复，请重新编辑'];
        }
    }

    public function getDelete()
    {
        $id = request()->param('id');
        $lise = Db::name('user')->where('id', $id)->delete();
        if ($lise) {
            return ['code' => 200, 'msg' => '删除成功'];
        } else {
            return ['code' => 400, 'msg' => '删除失败'];
        }
    }


}