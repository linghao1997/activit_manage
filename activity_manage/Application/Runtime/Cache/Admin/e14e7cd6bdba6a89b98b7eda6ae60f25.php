<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>后台管理平台</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/activity_manage/Public/Public/css/AdminMain/bootstrap.min.css">
    <link rel="stylesheet" href="/activity_manage/Public/Public/css/AdminMain/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/activity_manage/Public/Public/css/AdminMain/matrix-style.css">
    <link rel="stylesheet" href="/activity_manage/Public/Public/css/AdminMain/matrix-media.css">
    <link href="/activity_manage/Public/Public/css/AdminMain/font-awesome.css" rel="stylesheet">
</head>
<body>
    <div id="header">
        <h1><a href="#">house365</a></h1>
    </div>

    <div id="user-nav" class="navbar ">
        <ul class="nav">
        
            <li class="dropdown" id="profile-messages">
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
                    <i class="icon icon-user"></i>&nbsp;
                    <span class="text">欢迎你，<?php
 if($_SESSION['username']!=='') echo $_SESSION['username']; ?></span>&nbsp;
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">

                    <li><a href="/activity_manage/Public/index.php/Admin/Main/layout"><i class="icon-key"></i> 退出系统</a></li>
                </ul>
            </li>

            <li class=""><a title="layout" href="/activity_manage/Public/index.php"><i class="icon-picture"></i> <span class="text">&nbsp;首页</span></a></li>
            <li class=""><a title="layout" href="/activity_manage/Public/index.php/Admin/Main/layout" onclick="return confirm('您确定要退出吗?');"><i class="icon icon-share-alt"></i> <span class="text">&nbsp;退出系统</span></a></li>
        </ul>
    </div>

</body>
</html>




<!DOCTYPE html>
<!-- saved from url=(0046)/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>后台管理平台</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/activity_manage/Public/Public/css/AdminMain/bootstrap.min.css">
    <link rel="stylesheet" href="/activity_manage/Public/Public/css/AdminMain/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/activity_manage/Public/Public/css/AdminMain/matrix-style.css">
    <link rel="stylesheet" href="/activity_manage/Public/Public/css/AdminMain/matrix-media.css">
    <link href="/activity_manage/Public/Public/css/AdminMain/font-awesome.css" rel="stylesheet">
</head>
<body>

    <!--sidebar-menu-->
    <div id="sidebar" style="overflow-y: auto; overflow-x: hidden; height: 90%;">
        <ul>
            <li class="submenu open">
            <a class="menu_a" href="/#"><i class="icon icon-home"></i> <span>后台首页</span></a>
            <ul style="display: block;">
                    <li><a class="menu_a" href="/activity_manage/Public/index.php/Admin/Main/index.html"><i class="icon icon-caret-right"></i>后台首页</a></li>
                </ul>
            </li>
            <?php if(is_array($menuList)): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="submenu" onclick="dj(this)">
                  <!--  <a href="/#" >-->
                       <!-- <i class="icon-th-list"></i>-->
                        <!--<span class="now" value="<?= $key;?>"><?php echo ($key); ?></span>-->
                        <?php foreach($vo as $k => $v):?>
                <li id="cc"><a  onclick="false" class="menu_a" id="<?php echo $v?>" href="<?php echo $v;?>"><i class="icon icon-caret-right"></i><!--<?php echo $k;?>--><?php echo ($key); ?></span><!--<?php
 echo "&nbsp;&nbsp;&nbsp;<span class='label label-important'></span>"; ?>--></a></li>
                <?php endforeach;?>

                </li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
    <!--sidebar-menu-->


    <!--end-main-container-part-->

    <script src="/activity_manage/Public/Public/js/Mainjs/excanvas.min.js"></script>
    <script src="/activity_manage/Public/Public/js/Mainjs/jquery.min.js"></script>
    <script src="/activity_manage/Public/Public/js/Mainjs/jquery.ui.custom.js"></script>
    <script src="/activity_manage/Public/Public/js/Mainjs/bootstrap.min.js"></script>
    <script src="/activity_manage/Public/Public/js/Mainjs/jquery.nicescroll.min.js"></script>
    <script src="/activity_manage/Public/Public/js/Mainjs/matrix.js"></script>


    <script type="text/javascript">

    //初始化相关元素高度
    function init(){
        $("body").height($(window).height()-80);
        $("#iframe-main").height($(window).height()-90);
        $("#sidebar").height($(window).height()-50);
    }

    $(function(){
        init();
        $(window).resize(function(){
            init();
        });
    });

    function goPage (newURL) {
        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {
            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();            
            } 
            // else, send page to designated URL            
            else {  
                document.location.href = newURL;
            }
        }
    }

    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }

    </script>
    <style>

        .add{
            background-color:#0e90d2;

        }
        /*.currentli a.add {
            !*color:seagreen;*!

        }*/
    </style>
    <script>
        $(document).ready(
                function () {
                    $(".cc a").click(function () {
                        $(this).addClass("add").siblings().removeClass("menu_a");
                       // $(this).addClass("add").siblings().removeClass("add");
                        //$(this).children("a").addClass("add").siblings().removeClass("add");

                    })
                });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>后台管理平台</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/activity_manage/Public/Public/js/jquery.datetimepicker.css"/>
</head>
<body>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="/activity_manage/Public/index.php/Admin/Main/index.html" class="tip-bottom" data-original-title="返回后台首页"><i class="icon-home"></i> 后台首页</a><span>|</span><a href="/activity_manage/Public/index.php/Admin/Activity/activityEdit"> &nbsp;活动平台</a><span>|</span><a href="/activity_manage/Public/index.php/Admin/Activity/activityEdit?id=19" class="current"> 修改活动</a> </div>
        <h1>修改  活动</h1>
    </div>
    <style type="text/css">
        .table th, .table td {
            text-align: left;
        }
    </style>
    <div class="container-fluid" style="overflow-y: auto; overflow-x: hidden; height: auto">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" style="border: 0">
                <thead>
                <th colspan="2">
                    <span class="icon"> <i class="icon-pencil"></i> </span>
                    <span>修改  活动</span>
                </th>
                </thead>
                <tbody>
                <form class="form-horizontal" role="form" action="/activity_manage/Public/index.php/Admin/Activity/activityEdit?id=19" method="post" ENCTYPE="multipart/form-data">
                    <?php foreach($data as $k=>$v):?>
                        <td style="width: 15%;">活动名称:</td>
                        <td><input id="s1" class="form-control col-md-9" type="text" name="activename" value="<?php echo ($v['activename']); ?>"></input>
                            <span2 id="sp1"></span2>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">活动简介:</td>
                        <td><input class="form-control col-md-9" type="text" name="activeinfo" id="s2" value="<?php echo ($v['activeinfo']); ?>"></input>
                            <span2 id='sp2'></span2></td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">活动内容:</td>
                        <td><textarea class="form-control col-md-9" name="activecontact" rows="6" id="s3"   placeholder="活动内容"><?php echo $v['activecontact'];?></textarea><span2 id='sp3'></span2>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">活动负责人名称:</td>
                        <td><input class="form-control col-md-9" type="text" id="s4" name="people" placeholder="活动负责人名称" value="<?php echo ($v['people']); ?>"></input>
                            <span2 id='sp4'></span2>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">活动照片: &nbsp; &nbsp;</td>
                        <td><!--<input class="form-control col-md-9" type="file" id="s5" name="pic" style="opacity: 0;">-->
                           <!-- <a href="/activity_manage/Public/Public/<?php echo ($v['pic']); ?>" class="a-upload" target="_blank">
                                <?php echo '已上传图片'; ?>
                            </a>-->
                            <button class="open-new-link a-upload" id="photo" value="/activity_manage/Public/Public/<?php echo ($v['pic']); ?>">已上传图片</button>
                            <span><input type="file" name="pic" id="s5" style="opacity: 0">
                            上传图片</span>
                           <!-- </input>-->
                            <span2 id='sp5'></span2>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">缩略图尺寸:</td>
                        <td>
                            <select class="form-control" name="thumbsize" style="width: 20%;">
                                <option value="50">--默认50X50--</option>
                                <option value="100">100X100</option>
                                <option value="150">150X150</option>
                                <option value="200">200X200</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">
                            活动开始时间:&nbsp;&nbsp;
                        </td><td>
                        <input name="holdtime" type="text" value="<?php echo ($v['holdtime']); ?>" id="datetimepicker"/><br><br>
                        <span2 id="sp7"></span2>
                    </td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">
                            活动结束时间:&nbsp;&nbsp;
                        </td><td>
                        <input name="endtime" type="text" value="<?php echo ($v['endtime']); ?>" id="enddatetime"/><br><br>
                        <span2 id="sp7"></span2>
                    </td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">活动场地:</td>
                        <td>
                            <input class="form-control col-md-9" type="text" id="s9" name="backfield" value="<?php echo ($res[0]['backfield']); ?>"></input>
                            <span2 id='sp9'></span2>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">活动经费:</td>
                        <td>
                            <input class="form-control col-md-9" type="text" id="s12" name="planmoney" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')" value="<?php echo ($v['planmoney']); ?>"></input>
                            <span2 id='sp9'></span2>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" class="btn btn-warning ajax-post"  id="submit1
                           " onclick="return c1()">确定</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <br>
                            <br>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </form>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--end-main-container-part-->
<script src="/activity_manage/Public/Public/ueditor/ueditor.config.js"></script>
<script src="/activity_manage/Public/Public/ueditor/ueditor.all.min.js"></script>
<script src="/activity_manage/Public/Public/js/Mainjs/jquery.min.js"></script>
<script src="/activity_manage/Public/Public/js/Mainjs/jquery.min.js"></script>
<script src="/activity_manage/Public/Public/js/jquery.js"></script>
<script src="/activity_manage/Public/Public/js/jquery.datetimepicker.js"></script>

<script>
    $('#datetimepicker').datetimepicker();
    //$('#datetimepicker').datetimepicker({value:'2017-08-01 07:00',step:10});
    $('#enddatetime').datetimepicker();
    //$('#enddatetime').datetimepicker({value:'2017-08-01 09:00',step:10});
</script>
<script type="text/javascript" src="/activity_manage/Public/Public/js/laydate.dev.js"></script>
<style type="text/css">
    .a-upload {
        padding: 4px 10px;
        height: 25px;
        line-height: 15px;
        position: relative;
        cursor: pointer;
        color: #888;
        background: #fafafa;
        border: 1px solid #ddd;
        border-radius: 4px;
        overflow: hidden;
        display: inline-block;
        *display: inline;
        *zoom: 1
    }

    .a-upload  input {
        position: absolute;
        font-size: 100px;
        right: 0;
        top: 0;
        opacity: 0;
        filter: alpha(opacity=0);
        cursor: pointer
    }

    .a-upload:hover {
        color: #444;
        background: #eee;
        border-color: #ccc;
        text-decoration: none
    }
</style>
<script>
    function c1(){
        if ($('#s1').val()=='') {
            $('#sp1').html('活动名称不能为空');
            return false;
        }else if($('#s2').val()==''){
            $('#sp2').html('活动简介不能为空');
            return false;
        }else if($('#s3').val()==''){
            $('#sp3').html('活动内容不能为空');
            return false;
        }else if($('#s4').val()==''){
            $('#sp4').html('负责人姓名不能为空');
            return false;
        }
        else if($('#s9').val()==''){
            $('#sp9').html('活动场地不能为空');
            return false;
        }
        return true;
    }
</script>
<script type="text/javascript">
        $('.ajax-post').click(function(){
            event.preventDefault();
          //  var action_url=$('form').attr('action');
            var s1 = $("#s1").val();
            var s2 = $("#s2").val();
            var s3 = $("#s3").val();
            var s4 = $("#s4").val();
            var datetimepicker = $("#datetimepicker").val();
            var enddatetime = $("#enddatetime").val();
            var s9 = $("#s9").val();
            var s12 = $("#s12").val();
            $.ajax({
                url: "/activity_manage/Public/index.php/Admin/Activity/activityEdit?id=19",
                type: "POST",
                data:{
                    "activename" : s1,
                    "activeinfo":s2,
                    "activecontact":s3,
                    "people":s4,
                    "holdtime":datetimepicker,
                    "endtime":enddatetime,
                    "backfield":s9,
                    "planmoney":s12

                },
                dataType: "json",
                async:true,
                error: function(){
                    alert('Error loading JSON document');
                },
                success: function(data){
                    alert(data.info);
                    window.location.href='/activity_manage/Public/index.php/Admin/Activity/activityApply';
                }
            });
        })
        $(function() {
            var url = $("#photo").val();
            $('.open-new-link').on('click', function() {
                var openNewLink = window.open(url, '图片', 'height=800, width=700, top=100, left=200, toolbar=no, menubar=no, scrollbars=no, resizable=false, location=no, status=no'); //参数： url, 名称, 窗体样式
                if(window.focus) {
                    openNewLink.focus();
                }
                return false;
            })
        })
</script>
<ul class="typeahead dropdown-menu"></ul>
</body>
</html>