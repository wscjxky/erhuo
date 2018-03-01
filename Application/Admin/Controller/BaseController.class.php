<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
	public function __construct()
    {
        parent::__construct();
        //实现访问权限控制器过滤功能(防止翻墙访问)
        //1.获得当前请求的controller和action
//		$nowac=CONTROLLER_NAME."-".ACTION_NAME;
        //2.获得当前用户对应的角色权限
        session('account','admin');
        session('admin_id','1');
        session('admin_username','测试管理员');

        if (session('account')) {

            $account = session('account');
            $admin_id = session('admin_id');

        }

//		$manager_info=D('Admin')->find($account);
//		$role_id=$manager_info['role'];
//		$role_info=D('Role')->find($role_id);
//		$auth_ac=$role_info['value'];
//
//		//---------------------------------------------------------------//
//		//禁止未登录系统用户访问后台
		if(empty($account)){
            $this->redirect('admin/login','请您登陆',1);
		}
//		//---------------------------------------------------------------//
//
//		//A.判断用户当前请求的controller和action是否在其权限列表中出现
//		//B.不要限制admin用户
//		//C.允许开放一些不加限制的权限
//		$allowac="Manager-login,Manager-verifyImg,Index-index,Index-head,Index-left,Index-right,Manager-logout";
//		$adminname=session('admin_user');
//		if(strpos($auth_ac, $nowac)===false && $adminname!=='admin' && strpos($allowac, $nowac)===false){
//			exit('没有权限访问');
//		}
//

	}
    public function uploadImg($width,$height){
        if(!empty(I('post.image'))){
            return;
        }
        if(!empty($_POST)){
            if($_FILES['image']['error']!=4) {
                //A.实现图片上传
                $upload = new \Think\Upload(); // 实例化上传类
                $upload->maxSize = 1000240; // 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
                // 设置附件上传根目录
                $upload->rootPath = UP_PATH;
                // 上传单个文件
                $info = $upload->uploadOne($_FILES['image']);
                if (!$info) {// 上传错误提示错误信息
                    $data['code'] = 0;
                    $data['content'] = $upload->getError();
                    exit($upload->getError());
                } else {// 上传成功 获取上传文件信息
                    $picpathname = UP_PATH . $info['savepath'] . $info['savename'];
                    $image = new \Think\Image();
                    $image->open($picpathname);
                    $image->thumb($width, $height)->save($picpathname);
                    $_POST['image'] = $picpathname;

                }
            }
        }

    }
}