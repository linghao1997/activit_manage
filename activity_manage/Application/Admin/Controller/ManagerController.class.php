<?php
namespace Admin\Controller;
use Tools\AdminController;

class ManagerController extends AdminController
{
//    用户情况
    public function userData()
    {
        $id = $_GET['id'];
        $modle = M('userstatus');
        $sql = <<<SQL
SELECT t.activename,u.id,username,userstatus,moneystatus,u.createtime from sw_userstatus as u,sw_admin as a,sw_active as t WHERE u.uid=a.id AND {$id}= u.activeid AND t.status=0 and t.id = {$id}
SQL;

        $data = $modle->query($sql);
        $i=0;
        foreach($data as $value){
            if($value['createtime']=='0000-00-00 00:00:00'){
                $data[$i]['createtime']='';
            }
            $i++;
        }
        $this->assign('id',$id);
        $this->assign('data', $data);
        $this->display();

    }

//    发布活动
    public function active()
    {

        if (!empty($_POST) || !empty($_FILES)) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'docx', 'doc', 'png', 'jpeg');
            $upload->rootPath = './Public/Uploads/';
            $upload->savePath = 'Activity/';
            $upload->replace = true; //存在同名文件是否是覆盖
            $upload->autoSub = true;
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $countarray = count($info);
                if ($countarray !== 1) {
                    $this->error('文件上传格式有误,请重新申请');
                    exit;
                }
                $_POST['pic'] = "Uploads/" . $info['pic']['savepath'] . $info['pic']['savename'];
                $_POST['planway'] = "Uploads/" . $info['planway']['savepath'] . $info['planway']['savename'];

// 保存表单数据 包括附件数据
                $up = M('Active'); // 实例化对象
                //缩略图 文件保存地址
                $timage = "./Public/Uploads/" . $info['pic']['savepath'] . $info['pic']['savename'];

                $spath = "./Public/Uploads/" . $info['pic']['savepath'] . "thumb_" . $info['pic']['savename'];
                $this->thumbs($timage, $spath, $_POST['thumbsize'], $_POST['thumbsize']);
                $_POST['thumb'] = "Uploads/" . $info['pic']['savepath'] . "thumb_" . $info['pic']['savename'];
                $up->create();
                $activeid = $up->add();
                $_POST['activeid'] = $activeid;
                if ($activeid) {
                    $tmodel = M('manager');
                    $tmodel->create();
                    if ($tmodel->add()) {
                        if ($_POST['status'] == 0) {
                            $this->success("活动创办成功");
                            exit();
                        }
                    } else {
                        $this->error('发生未知错误');
                        exit();
                    }

                } else {
                    // 判断当前是否是调试模式,如果是调试模式就打印出sql语句
                    if (definded('APP_DEBUG')) {
                        // tp中的给出的方法,查出上一条语句
                        echo "sql:" . $up->getLastSql();
                        exit();
                    } else {
                        $this->error('发生未知错误,添加失败');
                        exit();
                    }
                }

            }
        }
        $this->display();
    }

    public function thumbs($image, $spath, $height = 150, $width = 150)
    { //传入图片

        $Image = new \Think\Image();
        $Image->open($image);
        $Image->thumb($height, $width, \Think\Image::IMAGE_THUMB_FIXED)->save($spath);
        return $spath;

    }
    public function qiandao()
    {
        $id = $_GET['uid'];
        $modle = M('userstatus');
        $modle->userstatus = 0;
        $modle->createtime = date('Y-m-d H:i:s', time());
        if ($modle->where(array(id => $id))->save()) {
           // $this->success('签到成功', "userData?id=".$_GET['id']);
            header("Location:userData?id=".$_GET['id']);
        } else {
            $this->error('签到失败');
        }
    }
    public function zhifu()
    {
        $id = $_GET['uid'];
        $modle = M('userstatus');
        $modle->moneystatus = 0;
        if ($modle->where(array(id => $id))->save()) {
           // $this->success('支付成功', "userData?id=".$_GET['id']);
            header("Location:userData?id=".$_GET['id']);
        } else {
            $this->error('支付失败');
        }
    }
    public function registration(){
        $sql = 'SELECT activename,enterid,id FROM sw_active as a WHERE a.status =0';
        $modle = M('active');
        $data = $modle ->query($sql);
        foreach($data as $v){

                $sql2 = 'select COUNT(*) from sw_userstatus as u WHERE u.userstatus = 0 and u.activeid='.$v["id"];
            $sql3 = 'select COUNT(*) from sw_userstatus as u WHERE u.moneystatus = 0 and u.activeid='.$v["id"];

            $math1[]=$modle->query($sql2);
            $math2[] = $modle->query($sql3);
        }

        $i=0;
        foreach($math1 as $v){
            $d[$i] = $v[0];
            $i++;
        }
        $this->assign('math1',$math1);
        $this->assign('math2',$math2);
        $this ->assign('data',$data);
        $this->display();
        }
    public function cancelqiandao(){
        $id = $_GET['uid'];
        $modle = M('userstatus');
        $modle->userstatus = 1;
        //$modle->createtime = date('Y-m-d H:i:s', time());
        if ($modle->where(array(id => $id))->save()) {
            //$this->redirect("userData?id=".$_GET['id'],1);
            header("Location:userData?id=".$_GET['id']);
        } else {
            $this->error('失败');
        }
    }
    public function cancelzhifu(){
        $id = $_GET['uid'];
        $modle = M('userstatus');
        $modle->moneystatus = 1;
        if ($modle->where(array(id => $id))->save()) {
            //$this->redirect("userData?id=".$_GET['id'],1);
            header("Location:userData?id=".$_GET['id']);
        } else {
            $this->error('失败');
        }
    }
    public function cancel(){

    }
}