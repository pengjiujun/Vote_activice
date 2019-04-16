<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\phpstudy\PHPTutorial\WWW\jiudian\public/../application/admin\view\login\index.html";i:1554963276;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>登录-后台管理系统</title>
    <meta name="keywords" content="设置关键词..."/>
    <meta name="description" content="设置描述..."/>
    <meta name="author" content="DeathGhost"/>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name='apple-touch-fullscreen' content='yes'>
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <link rel="icon" href="/static/admin/images/icon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/static/admin/css/style.css"/>
    <!--<link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css"/>-->
    <script src="/static/admin/javascript/jquery.js"></script>
    <script src="/static/admin/javascript/public.js"></script>
    <script src="/static/admin/javascript/plug-ins/customScrollbar.min.js"></script>
    <script src="/static/admin/javascript/pages/login.js"></script>
    <script src="/static/admin/layer/layer.js"></script>
</head>
<body class="login-page">
<section class="login-contain" onkeydown="on_return()">
    <header>
        <h1>后台管理系统</h1>
        <p>management system</p>
    </header>
    <div class="form-content">
        <ul>
            <form>
                <li>
                    <div class="form-group">
                        <label class="control-label">管理员账号：</label>
                        <input type="text" placeholder="管理员账号..." name="name" class="form-control form-underlined"
                               id="adminName"/>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label class="control-label">管理员密码：</label>
                        <input type="password" placeholder="管理员密码..." name="password"
                               class="form-control form-underlined" id="adminPwd"/>
                    </div>
                </li>
                <li>
                    <div>
                        请输入验证码：<br/>
                        <input type="text" class="form-control form-underlined" name="captcha"
                               style="width:40%;float: left;" id="captcha">
                        <img src="<?php echo captcha_src(); ?>" alt="captcha" style="height: 50px; width: 53%;float: right;"
                             onclick='this.src="<?php echo captcha_src(); ?>?rand="+Math.random()'>
                    </div>
                </li>
            </form>
            <li>
                <button class="btn btn-lg btn-block" id="entry" onclick="check()">立即登录</button>
            </li>
            <li>
                <p class="btm-info">©Copyright 2019-3-26 <a href="http://www.widmm.com" target="_blank"
                                                            title="DeathGhost">widmm</a></p>
                <address class="btm-info">widmm</address>
            </li>
        </ul>
    </div>
</section>
</body>
<script>
    function check() {
        //获取表单中管理员信息    val()  attr()
        var name = $("#adminName").val();
        //获取表单中密码信息
        var pwd = $("#adminPwd").val();
        //获取表单中验证码
        var captcha = $("#captcha").val();
        //讲接收表单中的信息进行判断
        if (name == '') {
            layer.msg('管理员不能为空', {icon: 5, time: 900});
            return false
        }
        if (pwd == '') {
            layer.msg('密码不能为空', {icon: 5, time: 900});
            return false
        }
        if (captcha == '') {
            layer.msg('请输入验证码', {icon: 5, time: 900});
            return false
        }
        $.ajax({
            url: '/login/log',
            type: 'post',
            data: {name: name, password: pwd, captcha: captcha},
            success: function (data) {
                if (data.code == 200) {
                    layer.msg(data.msg,{icon: 6, time: 900});
                    setTimeout("location.href='/admin/index'");
                }
                if (data.code == 201) {
                    layer.msg(data.msg ,{icon: 5, time: 900});

                }
                if (data.code == 202) {
                    layer.msg(data.msg,{icon: 5, time: 900});
                }
                if (data.code == 203) {
                    layer.msg(data.msg,{icon: 5, time: 900});
                }
            },
            error: function (e) {
                alert(e);
            }
        });


    }

    //回车时，默认是登陆
    function on_return() {
        if (window.event.keyCode == 13) {
            if ($('#button') != null) {
                check();
            }
        }
    }
</script>
</html>
