<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
    	$model=M('Active');
		$sql ='  select a.* ,t.backfield from sw_active as a,sw_manager as t where a.status=0 AND a.id=t.activeid order by a.createtime desc';
    	$data=$model->query($sql);
    	$this->assign('data',$data);
        $this->display();
	}

    public function wqhd(){
    	$model=M('Active');
    	$sql=" select a.* ,t.backfield,a.status from sw_active as a,sw_manager as t where a.status=1 AND a.id=t.activeid order by a.createtime desc";
    	$data=$model->query($sql);
    	$this->assign('data',$data);
    	$this->display();
    }

    public function portfolio(){
    	$model=M('Active');

		$sql ='  select a.* ,t.backfield from sw_active as a,sw_manager as t where a.status=0 AND a.id=t.activeid order by a.createtime desc';
    	$data=$model->query($sql);
    	$this->assign('data',$data);
    	$this->display();
    }

    // 报名
    public function baoming(){
    	if (!empty($_GET)) {
				$model = M('Active');
				$hq = "select holdtime,endtime,enterid from sw_active as a where a.status=0 AND a.id=" . $_GET['id'];
				$enter = $model->query($hq);
				if (strtotime($enter[0]['holdtime']) - time() > 0 || strtotime($enter[0]['endtime']) - time() < 0) {
					$this->error('对不起，不在时间范围内', 'portfolio');
				}
			$admin = M('admin');
			$asql = <<<SQL
select id from sw_admin as a WHERE a.activeid = {$_GET['id']} and a.contactway ={$_POST['contactway']}
SQL;

				$userid = $admin->query($asql);
			if(count($userid)==1){
				$this->error('请不要重复报名，谢谢', 'portfolio');
			}else{
				$_POST['activeid'] = $_GET['id'];
				$admin->create();
				$admin->add();
			}
				$userid = $admin->query($asql);
				$_POST['enterid'] =  $enter[0]['enterid'] . $userid[0]['id'] . ',';
				$model->create();
				if ($model->where('id=' . $_GET['id'])->save()) {
					$userstatus = M('userstatus');
					$_POST['uid'] = $userid[0]['id'];
					$_POST['activeid'] = $_GET['id'];
					$userstatus->create();
					$userstatus->add();
					$this->success('报名成功', 'portfolio');
				} else {
					$this->error('报名失败', 'portfolio');
				}
    	}else{
    		$this->error('');
    	}
    }
	public function activeDetails(){
		$id = $_GET['id'];
		$status = $_GET['status'];
		if($status==0){
			$bm =  '报名';
		}else $bm = '';
		$sql=' select a.* ,t.backfield from sw_active as a,sw_manager as t where   a.id=t.activeid AND a.id='.$id;

		$modle = M('active');
		$data = $modle->query($sql);
		//print_r($data);exit;
		$this->assign('data',$data);
		$this->assign('id',$id);
		$this->assign('bm',$bm);
		$this ->display();
	}
	public function enter(){
		$id = $_GET['id'];
		$this->assign('id',$id);
		$this->display();

	}
}
