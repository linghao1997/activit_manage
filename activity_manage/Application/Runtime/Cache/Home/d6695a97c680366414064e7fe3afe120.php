<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<head>
<title>365网</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<meta name="keywords" content="Skate Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap -->
<link href="/activity_manage/Public/Public/Home/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="/activity_manage/Public/Public/Home/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!----font-Awesome----->
<link rel="stylesheet" href="/activity_manage/Public/Public/Home/fonts/css/font-awesome.min.css">
<!----font-Awesome----->
<!-- start plugins -->
<script type="text/javascript" src="/activity_manage/Public/Public/Home/js/jquery.min.js"></script>
<!-- Owl Carousel Assets -->
<link href="/activity_manage/Public/Public/Home/css/owl.carousel.css" rel="stylesheet">
<script src="/activity_manage/Public/Public/Home/js/owl.carousel.js"></script>
		<script>
			$(document).ready(function() {

				$("#owl-demo").owlCarousel({
					items : 4,
					lazyLoad : true,
					autoPlay : true,
					navigation : true,
					navigationText : ["", ""],
					rewindNav : false,
					scrollPerPage : false,
					pagination : false,
					paginationNumbers : false,
				});

			});
		</script>
		<!-- //Owl Carousel Assets -->
</head>
<body>
<div class="header_bg">
<div class="container">
	<div class="header">
		<div class="logo">
			<h3><a href="/activity_manage/Public/index.php/Home/Index/index"><img src="/activity_manage/Public/Public/Home/images/libra-logo1.png"></a></h3>
		</div>
		<div class="h_menu">
		<a id="touch-menu" class="mobile-menu" href="#">menu</a>
		<nav>
		<ul class="menu list-unstyled">
			<li class="activate"><a href="index.html">首页</a></li>
			<li><a href="/activity_manage/Public/index.php/Home/Index/wqhd">往期活动</a></li>
		</ul>
		</nav>
		<script src="/activity_manage/Public/Public/Home/js/menu.js" type="text/javascript"></script>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="grid_12">
      <img src="/activity_manage/Public/Public/Home/images/color_stripe.jpg" class="img-responsive" class="c_stripe">
    </div>
</div>
</div>
<div class="main_bg"><!-- start main -->
<div class="container">
	<div class="main_grid1">
		<h3 class="style pull-left">进行中活动</h3>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="main_btm1"><!-- start main_btm -->
<div class="container">
	<div class="about">
		<div class="about-desc">
        <hr color="#000000">
        <?php foreach($data as $k=>$v):?>
			<p></p>
			<div class="active_w cf">
				<div class="active_img fl">
					<a href='activeDetails.html?id=<?php echo ($v["id"]); ?>'><img src="/activity_manage/Public/Public/<?php echo ($v['pic']); ?>" width="100%" height="100%"></a>
				</div>
				<div class="active_info fl">
					<a href="activeDetails.html?id=<?php echo ($v['id']); ?>">活动名称: <?php echo $v['activename'];?></a><br>
					活动开始时间:  <?php $time=strtotime($v['holdtime']); echo date('Y-m-d H:i',$time);?><br>
					活动结束时间:  <?php $time=strtotime($v['endtime']); echo date('Y-m-d H:i',$time);?><br>
					活动地址：<?php echo $v['backfield'];?></br>
					费用：<?php echo $v['planmoney'];?><br>
				</div>

			</div>
        <?php endforeach;?>        
		</div>
		<div class="about_bottom">
		</div>
	</div>
</div>
</div>
<div class="footer_bg">
<div class="container">
	<div class="footer">
		<div class="col-md-4 footer1_of_3">
			<div class="f_logo">
				<a href="index.html"><img src="/activity_manage/Public/Public/Home/images/1.jpg" alt=""/></a>
                <a href="index.html" style="padding-left:20px; padding-top:20px"><img src="/activity_manage/Public/Public/Home/images/2.png" alt=""/></a>
			</div>		
			
		</div>
		<div class="col-md-2 footer1_of_3">
			<h4>友情链接</h4>
			<ul class="list-unstyled f_list">
				                <li><a href="http://www.sohu.com/">搜狐网</a></li>
                                <li><a href="http://www.sina.com.cn/">新浪网</a></li>
                                <li><a href="http://www.qq.com/">腾讯网</a></li>
			</ul>
		</div>
</div>
</div>
<div class="footer1_bg"><!-- start footer1 -->
<div class="container">
	<div class="footer1">
		<div class="copy pull-left">
			<td height="120" bgcolor="#8c1515" style="line-height:20px; text-align:center; vertical-align:middle; color:#f9ebb9;">@2017 江苏三六五股份有限公司 版权所有 苏ICP备 123456 号<br/>
地址：中国·江苏·南京<br/>
		</div>
		<div class="soc_icons pull-right">
			<ul class="list-unstyled text-center">
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-rss"></i></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
</div>
</body>
</html>