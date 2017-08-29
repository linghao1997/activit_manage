<?php
namespace Admin\Controller;


class UserController extends AdminController
{
    public function userInfo(){
        $sql = 'select id,contactway,username from sw_admin WHERE root = 1';
        $model= M('admin');
        $data = $model->query($sql);
        $this->assign('data',$data);
        $this->display();
    }
   public function attendActivity(){
       $id = $_GET['id'];
       $sql = <<<SQL
SELECT m.username,a.activename FROM sw_active as a,sw_admin as m,sw_userstatus as u WHERE u.uid = {$id} and a.id = u.activeid and m.id = {$id} and u.userstatus = 0
SQL;
       $modle = M('userstatus');
       $data = $modle->query($sql);
       $this->assign('data',$data);
        $this->display();
    }
}