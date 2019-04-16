<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"D:\phpstudy\PHPTutorial\WWW\jiudian\public/../application/admin\view\merchant\add.html";i:1555041487;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="panel panel-default">
    <div class="panel-bd">
        <div class="panel panel-primary">
            <div class="panel-hd"></div>
            <div class="panel-bd">
                <div class="page-wrap">
                    <section class="page-hd">
                        <header>
                            <h2 class="title">人员添加</h2>
                        </header>
                        <hr>
                    </section>
                    <form id="formData">
                        <div class="form-group-col-2">
                            <div class="form-label">名称:</div>
                            <div class="form-cont">
                                <input type="text" placeholder="请输入名称" class="form-control form-boxed " name="name"
                                       id="name">
                                <span class="span"></span>
                            </div>
                        </div>
                        <div class="form-group-col-2">
                            <div class="form-label">密码:</div>
                            <div class="form-cont">
                                <input type="password" placeholder="请输入密码" class="form-control form-boxed " name="name"
                                       id="pwd">
                                <span class="span"></span>
                            </div>
                        </div>
                        <div class="form-group-col-2">
                            <div class="form-label">确认密码:</div>
                            <div class="form-cont">
                                <input type="password" placeholder="请再次输入密码" class="form-control form-boxed "
                                       name="name"
                                       id="pwd1">
                                <span class="span"></span>
                            </div>
                        </div>
                    </form>
                    <div class="form-group-col-2">
                        <div class="form-label"></div>
                        <div class="form-cont">
                            <button class="btn btn-primary" id="button">提交</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#button").click(function () {
        var name = $("#name").val();
        var pwd = $("#pwd").val();
        var pwd1 = $("#pwd1").val();

        if (name == '') {
            layer.msg('名称不能为空', {icon: 5, time: 900});
            return false
        }
        if (pwd == '') {
            layer.msg('密码不能为空', {icon: 5, time: 900})
            return false
        }
        if (pwd1 == '') {
            layer.msg('确认密码不能为空', {icon: 5, time: 900})
            return false
        }
        if (pwd !== pwd1) {
            layer.msg('两次密码输入不一致，请重新输入', {icon: 5, time: 900})
            return false
        }
        $.ajax({
            url: '/merchant/userAdd',
            type: 'post',
            data: {name: name, pwd: pwd1},
            success: function (data) {
                if (data.code == 404) {
                    layer.msg(data.msg, {icon: 5, time: 900});
                }
                if (data.code == 200) {
                    layer.msg(data.msg, {icon: 6, time: 900});
                    setTimeout("location.href='/merchant/index';", 1000);
                }
                if (data.code == 201) {
                    layer.msg(data.msg, {icon: 5, time: 900});
                }
            }
        })

    })

</script>
</body>
</html>