<?php
// 核心配置目录 
return array(
	// 'TMPL_ENGINE_TYPE' => 'PHP',  // 不使用TP的模板标签

	// 页面底部显示跟踪信息
	'SHOW_PAGE_TRACE'  =>  false,

	// 默认的首页面的控制器
	'DEFAULT_MODULE'  =>  'Home',
	//'配置项'=>'配置值'
	'DB_TYPE' =>'mysql',
	'DB_HOST' =>'localhost',
	'DB_NAME' =>'activity_manage',  // 数据库名称
	'DB_USER' =>'root',
	'DB_PWD'  =>  'root',  // 密码
    'DB_PORT' =>  '3306',
    'DB_PREFIX' =>  'sw_',  // 数据库表前缀
    //"ERROR_PAGE"=>'/Public/404.html',


    'LOAD_EXT_CONFIG'=>' menus',// 加载扩展配置文件
);