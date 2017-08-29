<?php
namespace Admin\Model;
use Think\Model;

/**
 *
 */
class AdminModel extends Model
{
    // 自动验证的规则$_validate
    protected $_validate = array(
        array('username' ,'','用户账号已经存在',1,'unique',3),
        array('contactway' ,'','联系方式已经存在',1,'unique',3),
    );
//    登陆方法
    function login($username,$password){
        $user=$this->where("username='$username'")->find();
        $salt = '1368';
        if ($user) {
            if ($user['password']== md5(md5($password).$salt)) {
                $roleModel=M('Admin');

                //$roleid=$roleModel->where('id='.$user['id'])->getField('root');
                //$role=M('Role');
               // $_SESSION['action_list']=$role->where('id='.$roleid)->getField('rolelist');
//                echo $_SESSION['action_list'];die();
                $_SESSION['userid']=$user['id'];
                $_SESSION['userroot']=$user['root'];
                $_SESSION['username']=$user['username'];
                //print_r( $_SESSION['action_list']);exit;
                return TRUE;
            }
        }
        return FALSE;
    }
}