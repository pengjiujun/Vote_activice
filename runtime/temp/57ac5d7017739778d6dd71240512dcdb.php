<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\phpstudy\PHPTutorial\WWW\jiudian\public/../application/admin\view\index\date.html";i:1555321796;}*/ ?>

<div class="layui-inline">
    <label class="layui-form-label">日期时间范围</label>

    <div class="layui-input-inline">
        <form>
        <input type="text" style="width: 310px" class="layui-input" id="test10" placeholder=" - ">
        <button id="time">提交</button>
        </form>
    </div>
</div>
<script src="/static/admin/javascript/jquery.js"></script>
<script src="/static/admin/laydate/laydate.js"></script>
<script src="/static/admin/layer/layer.js"></script>
<script>
    //日期时间范围
    laydate.render({
        elem: '#test10'
        , type: 'datetime'
        , range: true
    });
</script>
<script>
    //获取提交时间
    $("#time").on('click',function () {
        var time = $("#test10").val();
            $.ajax({
                url: '/admin/update',
                type: 'get',
                data: {id:1 ,time: time},
                success: function (data) {
                    if (data.code == 200) {
                        layer.msg(data.msg, {icon: 6, time: 900});
                        setTimeout("location.href='/admin/index';", 1000);
                    }
                    if (data.code == 201) {
                        layer.msg(data.msg, {icon: 5, time: 900});
                    }
                }
        })
    })

</script>