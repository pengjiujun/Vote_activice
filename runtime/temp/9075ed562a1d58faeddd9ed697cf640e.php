<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\phpstudy\PHPTutorial\WWW\jiudian\public/../application/index\view\index\index.html";i:1555342522;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Title</title>
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

        .one {
            margin: 26px 0;
        }

        .one input {
            margin: 0 40px;
            border-radius: 6px;
            width: 205px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border: 1px solid gainsboro;
            outline: 0;
        }

        .one button {
            width: 38px;
            height: 29px;
            background: 0;
            border: 1px solid gainsboro;
            border-radius: 5px;
            color: grey;
        }

        .two {
            width: 80%;
            height: 32px;
            line-height: 32px;
            margin: 0 auto;
            color: #CCCCCC;
        }

        .two-left {
            float: left;
            margin-right: 110px;
        }

        .two-right {
            float: left;
        }

        .two img {
            width: 25px;
            height: 25px;
            position: relative;
            top: 6px;
        }

        .ys2 span {
            margin: 0 3px;
        }

        .three {
            width: 311px;
            margin: 0 auto;
            margin-top: 20px;
            font-size: 14px;
        }

        .three ul li {
            display: inline-block;
        }

        .title {
            text-align: center;
            line-height: 40px;
        }

        .three span {
            line-height: 36px;
            padding-right: 10px;
        }

        input:checked + span {
            color: #999999;
        }

        .sanjiao-up {
            position: absolute;
            bottom: 2px;
            left: 45%;
        }

        .sanjiao-down {
            border-top: 1px solid #CCCCCC;
            border-radius: 12px;
            text-align: center;
        }

        .box {
            display: flex;
            height: 300px;
            justify-content: space-between;
            flex-wrap: wrap;
            font-size: 14px;
            overflow-y: scroll;
        }

        .bg_model_inside ul {
            width: 157px;
            height: 122px;
            margin: 10px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        .bg_model_inside ul li {
            text-align: center;
            margin: 6px;
            height: 30px;
            line-height: 30px;
        }

    </style>
</head>
<body>
<div class="content">
    <p class="one">
        <input type="text" value="查找酒店">
        <button class="btn">OK</button>

    </p>
    <div class="two">
        <div class="two-left">
            <img src="/static/index/img/people1.png" alt="">
            <span><?php echo $name; ?></span>
        </div>
        <div class="two-right">
            <span class="container timeBar ys2" data="180"></span>
            <img src="/static/index/img/horologe.png" alt="">
        </div>
    </div>
    <div class="three">
        <?php foreach($city as $k=>$v): ?>
        <div class="title"><?php echo $k; ?></div>
        <ul>
            <?php foreach($v as $b=>$a): ?>
            <li><label><input type="checkbox" class="apk" name="hole" value="<?php echo $b; ?>"><span><?php echo $a; ?></span></label></li>
            <?php endforeach; ?>
        </ul>
        <?php endforeach; ?>
    </div>

    <img class="sanjiao-up" src="/static/index/img/sanjiao-up.png" alt="">
</div>
<div class="bg-model"
     style="position:absolute;bottom:0;left:0%;width:100%;display:none;background:white;height:343px;z-index:10;">
    <div class="sanjiao-down">
        <img src="/static/index/img/sanjiao-down.png" alt="">
    </div>
    <div class="bg_model_inside"
         style="position:absolute;border-radius:8px;width:90%;height:100%;margin:0 5%;">
        <div style="text-align:center;font-size:20px;">my list</div>
        <div class="box">
            <?php foreach($info as $v): ?>
            <ul>
                <?php foreach($v as $row): ?>
                <li><?php echo $row; ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="/static/admin/layer/layer.js"></script>
<script src="/static/index/js/countdown.js"></script>
<script>
    //接收可选着的酒店id
    $.ajax({
        url: '/base/index',
        type:'get',
        dataType:'json',
        success:function (data) {
            console.log(data)

            // console.log(str)
            if (data == 2){
                // 活动关闭
                $('.apk').attr('checked',true);
            }else {
                // 活动开启
                $('.apk').attr('checked',false);
                //接收可选着的酒店id
                $.ajax({
                    url: '/index/count',
                    type:'get',
                    dataType:'json',
                    success:function (data) {
                        console.log($('.apk'),$('.apk').length,"所有酒店");

                        var obj  = JSON.parse(data);
                       console.log(obj,'未选中酒店')
                        for (var k=0;k<$('.apk').length;k++){
                            var dom = $('.apk')[k];
                            var vall = dom.value;
                            if (vall == 12){
                                console.log(this)
                            }

                        }



                    },
                    error:function (e) {
                        alert(e);
                    }
                })
            }

        },
    });
    $(function () {
        $(".timeBar").each(function () {
            $(this).countdownsync({
                dayTag: "",
                hourTag: "",
                minTag: "<label class='tt mm dib vam'>00</label><span >分</span>",
                secTag: "<label class='tt ss dib vam' >00</label><span>秒</span>",
                dayClass: ".dd",
                hourClass: ".hh",
                minClass: ".mm",
                secClass: ".ss",
                isDefault: false,
                showTemp: 1
            }, function () {
                location.reload();
            });
        });

        $(".sanjiao-up").click(function () {
            $(".bg-model").show();
        });
        $(".sanjiao-down").click(function () {
            $(".bg-model").hide()
        });

        $(".btn").click(function () {
            var len = $("input:checkbox:checked").length;
            if (len == 3) {
                var obj = $("input:checkbox:checked");
                check_val = [];
                for (k in obj) {
                    check_val.push(obj[k].value);
                };
                //    输出选中id
                btn2(check_val)

                function btn2(params) {
                    $.ajax({
                        url: '/index/add',
                        type: 'get',
                        data: {id: params},
                        async: true,
                        success: function (data) {
                            if (data.code == 200) {
                                layer.msg(data.msg, {icon: 6, time: 900});
                            }
                        },
                        error: function (e) {
                            alert(e);
                        }
                    })
                }
            } else {
                layer.msg("请选择3个酒店", {icon: 5, time: 900})
            }
        })
    })




</script>
</html>
