<?php

$_menu['活动管理']['正在进行']='../Activity/activityApply';
$_menu['活动管理']['活动状态']='../Activity/activityStatus';
$_menu['活动管理']['发布活动'] = '../Manager/active';
$_menu['报名管理']['用户签到与支付费用情况']='../Manager/userData';
$_menu['报名管理']['活动报名情况']='../Manager/registration';

$_menu['经费管理']['活动费用录入']='../Notice/capital';
$_menu['经费管理']['活动费用成本']='../Notice/sumconst';

$_menu['用户管理']['用户信息']='../User/userInfo';

$_menuPri['个人平台']=array('schangedata','susedactivity');
$_menuPri['修改资料']='schangedata';
$_menuPri['参与过的活动']='susedactivity';

$_menuPri['活动管理']=array('activityapply','activitystatus');
$_menuPri['正在进行']='activityapply';
$_menuPri['活动状态']='activitystatus';

$_menuPri['报名管理']=array('tchangedata','registration');
$_menuPri['用户签到与支付费用情况']='tchangedata';
$_menuPri['活动报名情况']='registration';

$_menuPri['发布活动']='tactive';

$_menuPri['经费管理']=array('capital','sumconst');
$_menuPri['活动费用录入']='capital';
$_menuPri['活动费用成本']='sumconst';



$_menuPri['用户管理']=array('userInfo');
$_menuPri['用户信息']='userInfo';

return array(
		'menuList' => $_menu,
		'menuPriList' => $_menuPri,
);
