<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"D:\phpstudy\PHPTutorial\WWW\myadmin\public/../application/admin\view\table\list.html";i:1554965353;s:77:"D:\phpstudy\PHPTutorial\WWW\myadmin\application\admin\view\public\public.html";i:1554965353;}*/ ?>
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
        <div class="panel panel-secondary">
            <div class="panel-hd">面板标题</div>
            <div class="panel-bd">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>产品名称</th>
                        <th>图片</th>
                        <th>市场价</th>
                        <th>销售价</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="cen">
                        <td>#001</td>
                        <td class="lt"><a href="#">正宗陕西洛川红富士 新鲜水果特惠</a></td>
                        <td>50000斤</td>
                        <td>￥4.00</td>
                        <td>￥3.80</td>
                        <td>
                            <button class="btn btn-primary">编辑</button>
                            <button class="btn btn-danger">删除</button>
                        </td>
                    </tr>
                    <tr class="cen">
                        <td>#001</td>
                        <td class="lt"><a href="#">正宗陕西洛川红富士 新鲜水果特惠</a></td>
                        <td>50000斤</td>
                        <td>￥4.00</td>
                        <td>￥3.80</td>
                        <td>
                            <a title="编辑" class="mr-5">编辑</a>
                            <a title="详情" class="mr-5">详情</a>
                            <a title="删除">删除</a>
                        </td>
                    </tr>
                    <tr class="cen">
                        <td>#001</td>
                        <td class="lt"><a href="#">正宗陕西洛川红富士 新鲜水果特惠</a></td>
                        <td>50000斤</td>
                        <td>￥4.00</td>
                        <td>￥3.80</td>
                        <td>
                            <a title="编辑" class="mr-5">编辑</a>
                            <a title="详情" class="mr-5">详情</a>
                            <a title="删除">删除</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
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
