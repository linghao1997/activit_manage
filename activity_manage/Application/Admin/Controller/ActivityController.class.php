<?php
namespace Admin\Controller;
use Tools\AdminController;

class ActivityController extends AdminController
{

    public function activityApply()
    {

        $model = M('Active');
        $sql = '  select a.* ,t.backfield from sw_active as a,sw_manager as t where  a.id=t.activeid order by a.createtime desc';
        $data = $model->query($sql);
        if ($data == array()) {
            $kon1 = '<td style=\'text-align: center;\' colspan=\'10\'><span4>没有活动</span4></td>';
            $this->assign('kon1', $kon1);
        } else {
            ;
            $this->assign('data', $data);
        }

        $this->display();
    }
//    活动状态
    public function activityStatus()
    {

        $model = M('Active');
        $sql = '  select a.* ,t.backfield from sw_active as a,sw_manager as t where  a.id=t.activeid order by a.createtime asc';
        $data = $model->query($sql);

        if ($data == array()) {
            $kon1 = '<td style=\'text-align: center;\' colspan=\'9\'><span4>没有举办的活动</span4></td>';
            $this->assign('kon1', $kon1);
        } else {
            $this->assign('data', $data);
        }

        $this->display();
    }

    public function thumbs($image, $spath, $height = 150, $width = 150)
    { //传入图片

        $Image = new \Think\Image();
        $Image->open($image);
        // 生成一个固定大小为150*150的缩略图并保存为thumb.jpg
        $Image->thumb($height, $width, \Think\Image::IMAGE_THUMB_FIXED)->save($spath);
        return $spath;//时间戳加后缀

    }

    public function del($id)
    {

        $model = M('Active');
        $user = $model->where('id=' . $id . '')->delete();
        if ($user) {
           // $this->success('删除活动成功');
            header("Location:activityApply");
            exit;
        } else {
            $this->error('删除失败,请重新删除');
            exit;
        }
    }

    public function activityEdit()
    {
        $model = M('Active');
        $id = $_REQUEST['id'];
        $sql = ' select a.* from sw_active as a  where a.id=' . $id . '.  order by a.createtime desc';
        $dq = 'select t.backfield from sw_manager as t where t.activeid= ' . $id . '.';
        $data = $model->query($sql);
        $res = $model->query($dq);
        if ($data == array()) {
            $kon1 = '<td style=\'text-align: center;\' colspan=\'10\'><span4>没有活动</span4></td>';
            $this->assign('kon1', $kon1);
        } else {
           // print_r($data);exit;
            $this->assign('data', $data);
            $this->assign('res', $res);
        }
        if (!empty($_POST)) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'docx', 'doc', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'Activity/'; // 设置附件上传（子）目录
            $upload->replace = true; //存在同名文件是否是覆盖
            // 是否使用子目录保存上传文件
            $upload->autoSub = true;
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                //$this->error($upload->getError());
                $_POST['pic'] = $data[0]['pic'];
            } else {// 上传成功
                $countarray = count($info);
                if ($countarray !== 1) {
                    $this->error('文件上传格式有误,请重新申请');
                    exit;
                }
                $_POST['pic'] = "Uploads/" . $info['pic']['savepath'] . $info['pic']['savename'];
                $timage = "./Public/Uploads/" . $info['pic']['savepath'] . $info['pic']['savename'];
                $spath = "./Public/Uploads/" . $info['pic']['savepath'] . "thumb_" . $info['pic']['savename'];
                $this->thumbs($timage, $spath, $_POST['thumbsize'], $_POST['thumbsize']);
            }
                //$_POST['planway'] = "Uploads/" . $info['planway']['savepath'] . $info['planway']['savename'];
                // print_r($_POST['cehua']);

// 保存表单数据 包括附件数据
                $up = M('Active'); // 实例化对象
                //缩略图 文件保存地址

                $activeid = $_GET['id'];
                if ($activeid) {
                    $up->activename = $_POST['activename'];
                    $up->activeinfo = $_POST['activeinfo'];
                    $up->activecontact = $_POST['activecontact'];
                    $up->people = $_POST['people'];
                    $up->holdtime = $_POST['holdtime'];
                    $up->endtime = $_POST['endtime'];
                    $up->planmoney = $_POST['planmoney'];
                    $up->where(array(id => $_GET['id']))->save();
                    $tmodel = M('manager');
                    $tmodel->backfield = $_POST['backfield'];
                    $tmodel->where(array(activeid => $activeid))->save();
                    $data['info'] = '修改成功';
                    $data['status'] =1;
                    $this->ajaxReturn($data,'JSON');
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
        $this->display();
    }

    public function exportExcel($fileName = 'table', $expCellName, $expTableData)
    {
        $xlsTitle = iconv('utf-8', 'gb2312', $fileName);//文件名称
        $xlsName = $fileName . date("_Y.m.d_H.i.s"); //or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        import("Vendor.PHPExcel.PHPExcel");
        import("Vendor.PHPExcel.Writer.Excel5");
        import("Vendor.PHPExcel.IOFactory.php");

        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setWidth(15);
        $objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setWidth(15);
        $objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setWidth(10);
        $objPHPExcel->getActiveSheet(0)->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet(0)->getColumnDimension('F')->setWidth(15);
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:' . $cellName[$cellNum - 1] . '1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $fileName . '  Export time:' . date('Y-m-d H:i:s'));
        for ($i = 0; $i < $cellNum; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '2', $expCellName[$i][1]);
        }

        for ($i = 0; $i < $dataNum; $i++) {
            for ($j = 0; $j < $cellNum; $j++) {
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsTitle . '.xls"');
        header("Content-Disposition:attachment;filename=$xlsName.xls");
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    /**导出**/
    public function msgOut()
    {
        $id = $_GET['id'];
        $xlsCell = array(
            array('activename', '活动名'),
            array('username', '用户名'),
            array('contactway', '手机号'),
            array('userstatus', '是否签到'),
            array('createtime', '签到时间'),
            array('moneystatus', '是否支付费用'),

        );
        $field = null;
        foreach ($xlsCell as $key => $value) {
            if ($key == 0) {
                $field = $value[0];
            } else {
                $field .= "," . $value[0];
            }
        }
        $xls = $this->exportDetail($id);
        $xlsName = $xls[0]['activename'].'活动统计导出';
        $this->exportExcel($xlsName, $xlsCell, $xls);
    }

    public function detailPage()
    {
        $id = $_GET['id'];
        $export = $this->exportDetail($id);
        $this->assign('data', $export);
        $this->assign('id',$id);
        $this->display();


    }

    public function exportDetail($id)
    {
        $sql = <<<SQL
          SELECT t.activename,a.username,a.contactway,u.userstatus,u.createtime,u.moneystatus FROM sw_active as t,sw_admin as a,sw_userstatus as u WHERE a.id=u.uid AND u.activeid={$id} AND t.id={$id}
SQL;

        $model = M('admin');
        if (IS_GET) {
            $data = $model->query($sql);
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i]['userstatus'] == 1) {
                    $data[$i]['createtime'] = '';
                }
                if ($data[$i]['userstatus'] == 1) {
                    $data[$i]['userstatus'] = '未签到';
                } else {
                    $data[$i]['userstatus'] = '已签到';
                }
                if ($data[$i]['moneystatus'] == 1) {
                    $data[$i]['moneystatus'] = '未支付';
                } else {
                    $data[$i]['moneystatus'] = '已支付';
                }
            }
        }
        return $data;
    }

//    搜索活动
    public function search(){
        if(!empty($_GET['searchname'])){
            $model=M('Active');
            $count=$model->where(" activename like '%".$_GET['searchname']."%'")->count();
            if($count==0){
                $this->error('没有搜索结果');
                exit();
            }
            $sql = "select a.* ,t.backfield from sw_active as a,sw_manager as t where  a.id=t.activeid and a.activename like '%".$_GET['searchname']."%' order by a.createtime desc";
            $data = $model->query($sql);

           // print_r($data);exit;

            $this->assign('data',$data);// 赋值数据集

            $this->display('activityApply');
        }else{
            $this->error('搜索内容不能为空');
        }
    }

}