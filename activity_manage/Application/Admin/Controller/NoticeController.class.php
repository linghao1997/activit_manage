<?php
namespace Admin\Controller;
use Tools\AdminController;

class NoticeController extends AdminController {


    public function capital(){
        $id =$_GET['id'];
        $sql ='  select a.*  from sw_active as a WHERE a.id='.$id;
        $modle = M('active');
        $const = M('const');

        $data = $modle->query($sql);
        if($_POST){
            //print_r($_POST);exit;
            $_POST['sumprice'] = $_POST['goodsnum']*$_POST['goodsprice'];
            $const->create();
           $flag = $const->add();
            $data['info'] = '录入成功';
            $data['status'] =1;
            //$data['id'] = $data[0]['activeid'];
            $this->ajaxReturn($data,'JSON');
            if($flag){
                //$this->error('录入成功','./sumconst');

            }else{
                $this->error("录入失败");
            }

        }
        $this->assign('id',$id);
        $this->assign('data',$data);
        $this->display();
    }
    public function detail(){
        $id = $_GET['id'];
        $sql= 'select c.id,a.activename,c.goodsname,c.goodsnum,c.goodsprice,c.sumprice from sw_active as a,sw_const as c WHERE a.id = c.activeid AND c.activeid='.$id;

        $modle = M('const');
        $data = $modle->query($sql);
        $this->assign("data",$data);
        $this->display();
    }
    public function sumconst(){
        $sql = 'select id,activename,status from sw_active';
        $modle = M('const');
        $data = $modle->query($sql);
        $i = 0;
        foreach($data as $value){
             $sql2 = 'select  a.activename,c.sumprice,c.activeid from sw_active as a,sw_const as c WHERE a.id = c.activeid and c.activeid='.$value['id'];
            $data2 = $modle->query($sql2);

            $sum = 0;
            foreach($data2 as $v){
                $sum = $sum+$v['sumprice'];
                $v['sumprice'] = $sum;
                $d[$i] = $v['sumprice'];
            }
            if($d[$i]==''){
                $d[$i] = 0;
            }
            $data[$i]['sumprice'] = $d[$i];
            $i++;
        }
       // print_r($data);exit;
        $this->assign("data",$data);
        $this->display();
    }
    public function del()
    {
        $id = $_GET['id'];
        $model = M('const');
        $goods = $model->where('id=' . $id . '')->delete();
        if ($goods) {
            $this->redirect('./Admin/Notice/sumconst',1);
            exit;
        } else {
            $this->error('删除失败,请重新删除');
            exit;
        }
    }
    public function goodsEdit(){
        $id = $_GET['id'];
        $sql = 'select goodsname,goodsnum,goodsprice,activeid from sw_const WHERE id='.$id;
        $modle = M('const');
        $data = $modle->query($sql);
        //print_r($data);exit;
        $this->assign('data',$data);
        if(!empty($_POST)) {
            if ($_GET['id']) {
                $modle->goodsname = $_POST['goodsname'];
                $modle->goodsnum = $_POST['goodsnum'];
                $modle->goodsprice = $_POST['goodsprice'];
                $modle->sumprice = $_POST['goodsnum']*$_POST['goodsprice'];
                $modle->where(array(id => $id))->save();
                //$this->error('修改成功','./detail?id='.$data[0]['activeid']);
                $data['info'] = '修改成功';
                $data['status'] =1;
                $data['id'] = $data[0]['activeid'];
                $this->ajaxReturn($data,'JSON');
            }else {
                $this->error();
            }
        }

        $this->display();
    }
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
SELECT m.username,a.activename,u.userstatus,u.moneystatus,u.createtime FROM sw_active as a,sw_admin as m,sw_userstatus as u WHERE u.uid = {$id} and a.id = u.activeid and m.id = {$id}
SQL;
        $modle = M('userstatus');

        $data = $modle->query($sql);
        $i = 0;
        foreach($data as $value){
            if($value['userstatus']==1){
                $data[$i]['createtime']='';
            }
            $i++;
        }
        $this->assign('data',$data);
        $this->display();
    }
    //    搜索联系人
    public function search(){
        if(!empty($_GET['searchname'])){
            $model=M('admin');
            $count=$model->where(" username like '%".$_GET['searchname']."%'")->count();
            //print_r($count);exit;
            if($count==0){
                $this->error('没有搜索结果');
                exit();
            }
            $sql = "select id,contactway,username from sw_admin as a WHERE a.root = 1 AND a.username like '%".$_GET['searchname']."%'";
            $data = $model->query($sql);
            $this->assign('data',$data);
            $this->display('userInfo');
        }else{
            $this->error('搜索内容不能为空');
        }
    }
}
