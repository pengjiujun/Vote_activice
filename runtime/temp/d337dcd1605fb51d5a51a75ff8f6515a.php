<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"D:\phpstudy\PHPTutorial\WWW\jiudian\public/../application/admin\view\table\index.html";i:1555041597;s:77:"D:\phpstudy\PHPTutorial\WWW\jiudian\application\admin\view\public\public.html";i:1555059569;}*/ ?>
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
                <a href="/admin/index" class="InitialPage"><i class="icon-dashboard"></i>权限管理</a>
            </h2>
            <ul>

                <li>
                    <dl>
                        <dt>
                            <i class="icon-user"></i>酒店管理<i class="icon-angle-right"></i>
                        </dt>
                        <dd>
                            <a href="/table/index">酒店编辑</a>
                        </dd>
                    </dl>
                </li>

                <li>
                    <dl>
                        <dt>
                            <i class="icon-user"></i>人员管理<i class="icon-angle-right"></i>
                        </dt>
                        <dd>
                            <a href="/merchant/index">人员编辑</a>
                        </dd>

                    </dl>
                </li>

                <li>
                    <dl>
                        <dt>
                            <i class="icon-user"></i>数据查看/导出<i class="icon-angle-right"></i>
                        </dt>
                        <dd>
                            <a href="/data/index">数据导出</a>
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
                        <a href="/login/logout" id=""><i class="icon-signout"></i>安全退出</a>
                    </li>
                </ul>
            </div>
        </header>
        <main class="main-cont content mCustomScrollbar">
            
<div class="panel panel-default">
    <div class="panel-bd">
        <div class="panel panel-secondary">
            <div class="panel-hd"></div>
            <div class="panel-bd">
                <section class="page-hd">
                    <header>
                        <h2 class="title">酒店管理</h2>
                        <p class="title-description">
                            <button class="btn btn-warning add">添加酒店</button>
                        </p>
                    </header>
                    <hr>
                </section>
                <table class="table table-bordered table-striped table-hover">
                    <!--<thead>-->
                    <tr>
                        <th>id</th>
                        <th>酒店所在城市</th>
                        <th>酒店地点</th>
                        <th>操作</th>
                    </tr>
                    <!--</thead>-->
                    <!--<tbody>-->
                    <?php foreach($list as $v): ?>
                    <tr class="cen">
                        <td><?php echo $a++; ?></td>
                        <td><?php echo $v['city']; ?></td>
                        <td><?php echo $v['name']; ?></td>
                        <td>
                            <button class="btn btn-primary" name="<?php echo $v['id']; ?>">编辑</button>
                            <button class="btn btn-danger" name="<?php echo $v['id']; ?>">删除</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <!--</tbody>-->
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    //添加酒店
    $(".add").click(function () {
        $.ajax({
            url: "/table/add",
            type: "post",
            data: {},
            success: function (data) {
                layer.open({
                    type: 1,
                    title: '添加酒店',
                    shadeClose: true,//点击阴影处关闭
                    skin: 'layui-layer-demo',//加上边框
                    area: ['500px', '400px'],//宽高
                    content: data
                });
            }
        });
    });
    //点击编辑
    $(".btn-primary").click(function () {
        var id = $(this).attr('name');
        $.ajax({
            url: '/table/edit',
            type: 'post',
            data: {id: id},
            success: function (data) {
                layer.open({
                    type: 1,
                    title: '更改信息',
                    skin: 'layui-layer-demo', //加上边框
                    area: ['550px', '400px'], //宽高
                    content: data
                })
            },
            error: function (e) {
                console.log(e);
            }
        })
    });
    //点击删除
    $(".btn-danger").click(function () {

        // 获取id
        var id = $(this).attr('name');

        // 获取本条tr
        ss = $(this).parents('tr');
        layer.confirm('你确定要删除吗', ['删除', '取消'], function () {
            $.get('/table/delete', {id: id}, function (data) {
                if (data.code == 200) {
                    ss.remove();
                    layer.msg(data.msg, {icon: 6, time: 900});
                }
                if (data.code == 400) {
                    layer.msg(data.message, {icon: 5, time: 900});
                }
            })
        });
    });


</script>

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
