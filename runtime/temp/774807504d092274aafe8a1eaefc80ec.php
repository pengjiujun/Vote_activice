<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\phpstudy\PHPTutorial\WWW\jiudian\public/../application/index\view\logs\index.html";i:1555066410;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=0">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        body {
            width: 100%;
            height: 100%;
        }

        ul {
            width: 80%;
            margin: auto 10%;
            margin-top: 160px;
        }

        .ipt, .login {
            width: 100%;
            height: 30px;
            line-height: 30px;
            border: 1px solid red;
            margin: 40px 0;
            text-align: center;
            border-radius: 50px;
            padding: 10px;
        }

        .login {
            font-size: 24px;
            letter-spacing: 50px;
            color: white;
            background: #FF676C;
            text-indent: 50px;
        }

        .ipt1 input {
            outline: none;
            border: 0;
            width: 80%;
            text-indent: 10px;
            color: #D9D9D9;
            position: relative;
            bottom: 10px;
        }

        .ipt2 input {
            outline: none;
            border: 0;
            width: 80%;
            height: 30px;
            line-height: 30px;
            text-indent: 10px;
            color: #D9D9D9;
        }

        p {
            font-size: 16px;
            color: #FF676C;
            text-align: center;
            position: relative;
            top: 100px;
        }
    </style>
</head>
<body>
<ul>
    <li class="ipt ipt1">
        <img src="/static/index/img/people1.png" alt="">
        <input type="text" id="name" placeholder="请输入姓名">
    </li>
    <li class="ipt ipt2">
        <input type="password" id="pwd" placeholder="请输入密码">
    </li>
    <li class="login"><span>登录</span></li>
</ul>
</body>
</html>
<script src="/static/admin/javascript/jquery.js"></script>
<script src="/static/admin/layer/layer.js"></script>
<script>
    $(".login").click(function () {
        var name = $("#name").val();
        var pwd = $("#pwd").val();

        if (name == '') {
            layer.msg('姓名不能为空', {icon: 5, time: 900});
            return false
        }
        if (pwd == '') {
            layer.msg('密码不能为空', {icon: 5, time: 900});
            return false
        }
        $.ajax({
            url: '/logs/log',
            type: 'post',
            data: {name: name, password: pwd},
            success: function (data) {
                if (data.code == 200) {
                    layer.msg(data.msg, {icon: 6, time: 900});
                    setTimeout("location.href='/index/index'");
                }
                if (data.code == 201) {
                    layer.msg(data.msg, {icon: 5, time: 900});

                }
                if (data.code == 202) {
                    layer.msg(data.msg, {icon: 5, time: 900});
                }
            },
            error: function (e) {
                alert(e);
            }
        });

    });
</script>