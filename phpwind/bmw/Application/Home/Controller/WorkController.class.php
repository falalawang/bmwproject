<?php
	namespace Home\Controller;
	use Think\Controller;
	use Think\Area;

	class WorkController extends Controller{

		public function login(){
			$this->display();
		}

		public function dologin(){
			$admin = M("admin");
			$password = md5($_POST['password']);
			$username = $_POST['username'];
			$admins = $admin->where("username = '$username'")->select();
			if($admins['0']['password'] == $password and $admins['0']['auth']='1'){
				session('uid',$admins[0]['id']);
				session('username',$username);
				//$auth = session('auth',$admins[0]['auth']);
				$this->success("登录成功",U("Work/work/"));

			}else{
				$this->error("登录名或密码错误！");

			}
		}
		
		public function work(){
			$username=$_SESSION['username'];
			$order=M('');
			$orders=$order->table('bmw_order,bmw_servicecar,bmw_address')->field("bmw_order.*,bmw_servicecar.name,bmw_address.phone,bmw_address.city,bmw_address.county,bmw_address.address,bmw_address.details")->where("bmw_order.sid=bmw_servicecar.id and bmw_servicecar.name='{$username}' and bmw_order.phone=bmw_address.phone and bmw_address.statu='0'")->select();
			$this->assign('order',$orders);
			$this->display();
		}
		
		public function update(){
			$data['status']=$_POST['status'];
			$id=$_POST['id'];
			$order=M('order');
			if($order->create($data)){
				$res=$order->where("id=$id")->save();
				if($res){
					$this->success("修改成功",U("Work/work"));
				}else{
					$this->error("修改失败1111");
				}
			}else{
				$this->error("修改失败");
			}

		}

		public function clear(){
			$_SESSION['username']=null;
			$this->success("退出成功",U("Work/login"));
		}
	}
?>