<?php
namespace Admin\Controller;
use Think\Controller;
class VipController extends CommonController{

    //显示用户信息页面
	public function index(){
		$this -> display();
	}

    //修改用户密码
	public function mod(){

		$managers = M('manager');
		$name = $_SESSION['hname'];
		//根据session中的用户名，查出id和password
		$manager = $managers -> field('id,password') -> where("name='$name'") -> select();
		$id = $manager[0]['id'];
		$password = $manager[0]['password'];		
		//通过post方法得到原密码和新密码
		$oPwd = md5($_POST['oPwd']);
		if($password != $oPwd){
			$this -> error('原密码不正确','index');
		}else{
			$data['password'] = md5($_POST['nPwd']);
			$data['id'] = $id;
			if($managers -> create($data)){
				if($managers -> save()){
					$this -> success('修改成功',U('Index/main'));
				}else{
					$this -> error('修改失败','index');
				}
			}else{
				$this -> error('失败','index');
			}
		}
	}
	
	//验证原密码是否正确
	public function checkPassword(){
		$password = md5($_GET['oPwd']);
		$id = $_SESSION['hid'];
		$managers = M('manager');
		$manager = $managers -> field('password') -> where("id={$id} and password='{$password}'") -> select();
		if($manager){
			echo 1;
		}else{
			echo 'error';
		}
	}
}
?>