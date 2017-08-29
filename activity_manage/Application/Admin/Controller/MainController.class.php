<?php
namespace Admin\Controller;
use Tools\AdminController;


 class MainController extends AdminController {

     public function index(){
         $this->display();
     }

//     退出后台
     public function layout(){
         $_SESSION=array();
         $this->success('退出成功',__MODULE__.'/Admin/admin');
     }
 }