<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\phpstudy\PHPTutorial\WWW\jiudian\public/../application/admin\view\table\edit.html";i:1555037242;}*/ ?>
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
                            <h2 class="title">酒店编辑</h2>
                        </header>
                        <hr>
                    </section>
                    <form id="formData">
                        <div class="form-group-col-2">
                            <div class="form-label">所在城市:</div>
                            <div class="form-cont">

                                <input type="text" placeholder="所在城市"   class="form-control form-boxed " name="name" value=<?php echo $list['city']; ?>
                                       id="city">

                                <span class="span"></span>
                            </div>
                        </div>
                        <div class="form-group-col-2">
                            <div class="form-label">酒店地址:</div>
                            <div class="form-cont">
                                <input id="id" value="<?php echo $list['id']; ?>" style="display: none">
                                <input type="text" placeholder="酒店地址" class="form-control form-boxed " name="name" value="<?php echo $list['name']; ?>"
                                       id="name">

                                <span class="span"></span>
                            </div>
                        </div>
                    </form>
                    <div class="form-group-col-2">
                        <div class="form-label"></div>
                        <div class="form-cont">
                            <button class="btn btn-primary" id="button">确认编辑</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#button").click(function(){
        //id
        var id = $("#id").val();
        //city
        var city = $("#city").val();
        //name
        var name = $("#name").val();

        if(city == ''){
            layer.msg('城市不能为空', { icon: 5 });
            return false;
        }

        if(name == ''){
            layer.msg('酒店名称不能为空', { icon: 5 });
            return false;
        }
        $.ajax({
            url: '/table/update',
            type: 'post',
            data: {id:id,city:city,name:name},
            success:function(data){
                if(data.code == 400){
                    layer.msg(data.msg, { icon: 5 });
                }
                if(data.code == 200){
                    layer.msg(data.msg, { icon: 6 ,time:900});
                    setTimeout("location.href='/table/index';", 1000);
                }
            },
            error:function(e){
                alert(e);
            }
        })
        return false;

    })
</script>