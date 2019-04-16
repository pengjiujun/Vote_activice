<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"E:\phpStudy\PHPTutorial\WWW\myAdmin\public/../application/admin\view\table\index.html";i:1553603580;s:77:"E:\phpStudy\PHPTutorial\WWW\myAdmin\application\admin\view\public\public.html";i:1554214959;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>后台管理</title>
    <meta name="keywords" content="设置关键词..."/>
    <meta name="description" content="设置描述..."/>
    <meta name="author" content="DeathGhost"/>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link rel="icon" href="/static/admin/images/icon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/static/admin/css/style.css"/>
    <script src="/static/admin/javascript/jquery.js"></script>
    <script src="/static/admin/javascript/plug-ins/customScrollbar.min.js"></script>
    <script src="/static/admin/javascript/plug-ins/echarts.min.js"></script>
    <script src="/static/admin/javascript/plug-ins/layerUi/layer.js"></script>
    <script src="/static/admin/javascript/plug-ins/pagination.js"></script>
    <script src="/static/admin/javascript/public.js"></script>
    <script src="/static/admin/layer/layer.js"></script>
</head>
<body>
<div class="main-wrap">
    <div class="side-nav">
        <div class="side-logo">
            <div class="logo">
				<span class="logo-ico">
					<i class="i-l-1"></i>
					<i class="i-l-2"></i>
					<i class="i-l-3"></i>
				</span>
                <strong>模块化后台管理</strong>
            </div>
        </div>

        <nav class="side-menu content mCustomScrollbar" data-mcs-theme="minimal-dark">
            <h2>
                <a href="/admin/index" class="InitialPage"><i class="icon-dashboard"></i>后台首页</a>
            </h2>
            <ul>

                <li>
                    <dl>
                        <dt>
                            <i class="icon-user"></i>表单管理<i class="icon-angle-right"></i>
                        </dt>
                        <dd>
                            <a href="/table/index">表单提交</a>
                        </dd>
                        <dd>
                            <a href="/table/list">表单展示</a>
                        </dd>

                    </dl>
                </li>

                <li>
                    <dl>
                        <dt>
                            <i class="icon-user"></i>商户管理<i class="icon-angle-right"></i>
                        </dt>
                        <dd>
                            <a href="/merchant/index">商户列表</a>
                        </dd>

                    </dl>
                </li>

            </ul>

        </nav>
        <footer class="side-footer">© DeathGhost 版权所有</footer>
    </div>
    <div class="content-wrap">
        <header class="top-hd">
            <div class="hd-lt">
                <a class="icon-reorder"></a>
            </div>
            <div class="hd-rt">
                <ul>

                    <li>
                        <a><i class="icon-user"></i>管理员:<em><?php echo \think\Request::instance()->session('name'); ?></em></a>
                    </li>
                    <li>
                        <a class="xu"><i class="icon-bell-alt">修改密码</i></a>
                    </li>
                    <li>
                        <a href="/login/logout" id=""><i class="icon-signout"></i>安全退出</a>
                    </li>
                </ul>
            </div>
        </header>
        <main class="main-cont content mCustomScrollbar">
            
<div class="panel panel-default">
    <div class="panel-bd">
        <div class="panel panel-primary">
            <div class="panel-hd">表单</div>
            <div class="panel-bd">
                <div class="page-wrap">
                    <!--开始::内容-->
                    <section class="page-hd">
                        <header>
                            <h2 class="title">表单结构展示</h2>
                            <p class="title-description">
                                两列式表单结构，一般针对产品详情，文章详情应用。
                            </p>
                        </header>
                        <hr>
                    </section>
                    <form method="post" action="/table/insert">
                    <div class="form-group-col-2">
                        <div class="form-label">商品标题：</div>
                        <div class="form-cont">
                            <input type="text" placeholder="100%输入框..." class="form-control form-boxed">
                        </div>
                    </div>
                    <div class="form-group-col-2">
                        <div class="form-label">手机号码：</div>
                        <div class="form-cont">
                            <input type="tel" placeholder="手机号码..." class="form-control form-boxed" style="width:300px;">
                            <button class="btn btn-secondary-outline">测试</button>
                            <span class="word-aux"><i class="icon-warning-sign"></i>清正确输入11位手机号码</span>
                        </div>
                    </div>
                    <div class="form-group-col-2">
                        <div class="form-label">电子邮箱：</div>
                        <div class="form-cont">
                            <input type="email" placeholder="电子邮箱..." class="form-control form-boxed">
                        </div>
                    </div>
                    <div class="form-group-col-2">
                        <div class="form-label">保持四个字否则截断：</div>
                        <div class="form-cont">
                            <select style="width:auto;">
                                <option>商品分类</option>
                                <option>女装</option>
                                <option>男装</option>
                            </select>
                            <select style="width:auto;">
                                <option>子分类</option>
                                <option>上装</option>
                                <option>下装</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group-col-2">
                        <div class="form-label">兴趣爱好：</div>
                        <div class="form-cont">
                            <label class="check-box">
                                <input type="checkbox" checked="checked" name="mmm">
                                <span>读书</span>
                            </label>
                            <label class="check-box">
                                <input type="checkbox" name="mmm">
                                <span>听音乐</span>
                            </label>
                            <label class="check-box">
                                <input type="checkbox" name="mmm">
                                <span>羽毛球</span>
                            </label>
                            <label class="check-box">
                                <input type="checkbox" name="mmm">
                                <span>篮球</span>
                            </label>
                            <label class="check-box">
                                <input type="checkbox" name="mmm">
                                <span>足球</span>
                            </label>
                            <label class="check-box">
                                <input type="checkbox" checked="checked" name="mmm">
                                <span>读书</span>
                            </label>
                            <label class="check-box">
                                <input type="checkbox" name="mmm">
                                <span>听音乐</span>
                            </label>
                            <label class="check-box">
                                <input type="checkbox" name="mmm">
                                <span>羽毛球</span>
                            </label>
                            <label class="check-box">
                                <input type="checkbox" name="mmm">
                                <span>篮球</span>
                            </label>
                            <label class="check-box">
                                <input type="checkbox" name="mmm">
                                <span>足球</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group-col-2">
                        <div class="form-label">性别：</div>
                        <div class="form-cont">
                            <label class="radio">
                                <input type="radio" name="sex">
                                <span>男士</span>
                            </label>
                            <label class="radio">
                                <input type="radio" name="sex" checked="checked">
                                <span>女士</span>
                            </label>
                            <label class="radio">
                                <input type="radio" name="sex">
                                <span>保密</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group-col-2">
                        <div class="form-label">摘要：</div>
                        <div class="form-cont">
                            <textarea class="form-control form-boxed">摘要信息</textarea>
                        </div>
                    </div>
                    <div class="form-group-col-2">
                        <div class="form-label"></div>
                        <div class="form-cont">
                            <input type="submit" class="btn btn-primary" value="提交表单">
                        </div>
                    </div>
                    <!--开始::结束-->
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


            <!--开始::结束-->

        </main>

    </div>
</div>
</body>
<script>
    $(".xu").click(function () {

        $.ajax({
            url: '/adminuser/edit',
            typr: 'get',
            data: {},
            success: function (data) {

                layer.open({
                    type: 1,
                    title: '管理员修改',
                    skin: 'layui-layer-demo', //加上边框
                    area: ['600px', '500px'], //宽高
                    content: data
                })
                // console.log(data);
            },
            error: function (e) {
                console.log(e);
            }

        })

    });

</script>
</html>
