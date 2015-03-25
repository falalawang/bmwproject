<?php
	namespace Admin\Controller;
	use Think\Controller;

	class LoginController extends Controller{
		public function index(){
			session(null);
			$this->display();

		}
		public function dologin(){
			$admin = M("admin");
			$group = M("auth_group_access");
			$password = md5($_POST['password']);
			$username = $_POST['username'];
			//dump($_POST);die;
			$admins = $admin->where("username = '$username' and password = '$password'")->select();
			//dump($admins);die;
			
			if($admins){
				$id = $admins[0]['id'];

				session('uid',$id);
				$groups = $group->where("uid = $id")->select();
				//echo $group->getlastsql();
				session('gid',$groups[0]['group_id']);

				//dump($groups);
				//exit;

				//$auth = session('auth',$admins[0]['auth']);
				$this->success("登录成功",U("user/home"));

			}else{
				$this->error("登录名或密码错误！");

			}


		}

	}





?>