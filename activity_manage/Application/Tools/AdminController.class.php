<?php

namespace Tools;
use Think\Controller;

/**
* 
*/
class AdminController extends Controller
{
	// 相当于构造函数(就是相当于已经调用了父类方法)---自动运行
	function _initialize(){

		 $menuList = C('menuList');
         // 取出按钮与权限对应的数组
         //$menuPriList = C('menuPriList');
        if($_SESSION['userroot']==''){
            $this->error('请登录','../Admin/admin');  //跳转(第二个参数不传就跳转到上一个页面)
            exit();
        }
/*         if($_SESSION['userroot'] != 0)
         {
             $adminPris = explode(',', $_SESSION['action_list']);
             foreach ($menuList as $k => $v)
             {
                 if(is_array($menuPriList[$k]))
                 {
                     $_arr = array_intersect($adminPris, $menuPriList[$k]);
                     // 如果没有这个按钮的权限就把按钮从数组中删除
                     if(empty($_arr))
                     {
                         unset($menuList[$k]);
                         // 如果删除了第一个按钮，那么直接循环第二个顶级按钮
                         continue ;
                     }
                 }
                 else
                 {
                     if(!in_array($menuPriList[$k], $adminPris))
                     {
                         unset($menuList[$k]);
                         // 如果删除了第一个按钮，那么直接循环第二个顶级按钮
                         continue ;
                     }
                 }
                 foreach ($v as $k1 => $v1)
                 {
                     // 先取出这个二组按钮需要的权限
                     if(!in_array($menuPriList[$k1], $adminPris))
                         unset($menuList[$k][$k1]);
                 }

             }

         }*/

         $this->assign('menuList', $menuList);
	}

/*	// $priv 要验证的权限的名字
	function chk_priv($priv){
		if ($_SESSION['userroot']==0) {
            return TRUE;
        }
       if (strpos(','.$_SESSION['action_list'].',', ','.$priv.',') === FALSE) {
            $this->error('请登录');  //跳转(第二个参数不传就跳转到上一个页面)
            exit();
        }
	}*/
}