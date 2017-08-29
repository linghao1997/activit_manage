<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
    <!--Header-part-->
    <div id="header">
        <h1><a href="#">house365</a></h1>
    </div>
    <!--close-Header-part-->

    <!--top-Header-menu-->
    <div id="user-nav" class="navbar ">

        <!-- <ul class="nav" style="width: auto; margin: 0px;"> -->
        <ul class="nav">
        
            <li class="dropdown" id="profile-messages">
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
                    <i class="icon icon-user"></i>&nbsp;
                    <span class="text">欢迎你，<?php
 if($_SESSION['username']!=='') echo $_SESSION['username']; ?></span>&nbsp;
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <!-- <li><a href="/activity_manage/Public/index.php/Admin/Menu/myAdmin"><i class="icon-user"></i> 个人资料</a></li> -->
                    <!-- <li class="divider"></li> -->
                    <li><a href="/activity_manage/Public/index.php/Admin/Main/layout"><i class="icon-key"></i> 退出系统</a></li>
                </ul>
            </li>

            <!--<li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">&nbsp;设置</span></a></li>-->
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
                    <a href="/#" >
                        <i class="icon-th-list"></i>
                        <span class="now" value="<?= $key;?>">
                            <?php foreach($vo as $k => $v):?>
                <li><a class="menu_a" id="<?php echo $v?>" href="<?php echo $v;?>"><i class="icon icon-caret-right"></i><?php echo ($key); endforeach;?></span>
                    </a>
                   <!-- <ul>
                        <?php foreach($vo as $k => $v):?>
                        <li><a class="menu_a" id="<?php echo $v?>" href="<?php echo $v;?>"><i class="icon icon-caret-right"></i><?php echo $k;?>&lt;!&ndash;<?php
 echo "&nbsp;&nbsp;&nbsp;<span class='label label-important'></span>"; ?>&ndash;&gt;</a></li>
                        <?php endforeach;?>

                    </ul>-->
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

</body>
</html>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>申请状态</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="/activity_manage/Public/index.php/Admin/Main/index.html" class="tip-bottom" data-original-title="返回后台首页"><i class="icon-home"></i> 后台首页</a><span>|</span><a href="/activity_manage/Public/index.php/Admin/Activity/activityStatus"> 活动 管理</a><span>|</span><a href="/activity_manage/Public/index.php/Admin/Activity/activityStatus" class="current"> 活动状态</a> </div>
        <h1>活动  状态</h1>
    </div>
    <style type="text/css">

        .table th, .table td {
            text-align: center;
        }
        .mycolor{
            background-color: #D9EDF7;
        }
    </style>
    <!---->
    <div class="container-fluid" style="overflow-y: auto; overflow-x: hidden; height: 460px;">
        <div class="table-responsive">
        <form class="form-horizontal" role="form" action="/activity_manage/Public/index.php/Admin/Activity/activityStatus" method="post">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="text-align: left;" colspan='11'>
                        <span class="icon"> <i class='icon-file'></i> </span>
                        <span>活动 状态</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php echo ($kon1); ?>
                </tr>
                    <tr>
                        <th>活动名称</th>
                        <th>活动简介</th>
                        <th>活动内容</th>
                        <th>活动负责人</th>
                        <th>活动缩略图</th>
                        <th>活动&nbsp;&nbsp;状态</th>
                        <th>开始&nbsp;&nbsp;时间</th>
                        <th>结束&nbsp;&nbsp;时间</th>
                        <th>活动经费</th>
                        <th>结束活动</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($data as $k=>$v):?> 
                        <tr>
                            <td><?php echo ($v['activename']); ?></td>
                            <td><?php echo ($v['activeinfo']); ?></td>
                            <td><textarea disabled rows="6"><?php echo ($v['activecontact']); ?></textarea></td>
                            <td><?php echo ($v['people']); ?></td>
                            <td><img src="/activity_manage/Public/Public/<?php echo ($v['thumb']); ?>"/></td>
                            <td>
                            <?php
 if($v['status']== 1){ echo "<span><i class='icon-lock'></i> 活动已结束</span>"; }elseif($v['status']== 0){ echo "<span><i class='icon-group'></i> 活动进行中</span>"; } ?>
                            </td>
                            <td><?php echo ($v['holdtime']); ?></td>
                            <td><?php echo ($v['endtime']); ?></td>
                            <td><?php echo ($v['planmoney']); ?></td>
                            <td>
                                <?php
 if($v['status'] == 0 ){ echo "<a href=\"/activity_manage/Public/index.php/Admin/Activity/change?id=".$v['id']."\"  onclick=\"return confirm('是否修改活动状态为结束?')\">结束活动</a>"; }else{ echo '&nbsp;'; } ?>
                            </td>
                            <td>
                            <?php
 echo "<a onclick=\"return confirm('是否确认删除')\" href='/activity_manage/Public/index.php/Admin/Activity/del?id=".$v['id']."'>删 除</a>"; ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                
                <tr>
                    <td colspan="11"><br></td>
                </tr>
                </tbody>
            </table>
        </form></div>
    </div>
</div>
<script type="text/javascript" src="/activity_manage/Public/Public/jS/jq.js"></script>
<script type="text/javascript" src="/activity_manage/Public/Public/jS/jquery-2.1.1.min.js"></script>
<ul class="typeahead dropdown-menu"></ul>
</body>
</html>