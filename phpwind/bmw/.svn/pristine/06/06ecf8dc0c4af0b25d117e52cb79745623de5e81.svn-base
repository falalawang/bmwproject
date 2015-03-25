<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
		public function home(){
    	$cum = M("auth_group_access");
    	$count = $cum ->where("group_id=2")->count();
    	$this->assign("count",$count);
    	$this->display();

   		 }
  

		public function userList(){
			$admin = M("admin");
			$count = $admin->count();
			$Page = new \Think\Page($count,10);
			$admins = $admin->limit($Page->firstRow.','.$Page->listRows)->select();
			$show = $Page->show();
			$this->assign("show",$show);
			$this->assign("admins",$admins);
			$this->display();

		}
		
		public function userAdd(){
			
			
			$this->display();

		}
		public function insert(){
			$admin = M("admin");
			$auth = M("auth_group_access");
			$auths = $_POST["auth"];

			//dump($_POST);
			//exit;
			
			if($_POST['password'] == $_POST['repassword']){
				$_POST['password'] = md5($_POST['password']);
				//$date = $_POST['auth'];
				
				if($admin->create()){
					$res=$admin->add();
					if($auths == "0"){
						$aut['uid']= $res;
						$aut['group_id']=2;
						$re = $auth ->add($aut);
					
					if($res && $re){
						$this->success("添加成功！","userList");
					}else{
						$this->error("添加失败！");
					}
					}else{
						$aut['uid']= $res;
						$aut['group_id']=1;
						$re = $auth ->add($aut);
						if($res && $re){
						$this->success("添加成功！","userList");
					}else{
						$this->error("添加失败！");
					}
					}

				}else{
         
					$this->error("添加失败！");
				}
			}else{
				$this->error("两次密码不一致！");
				//$this->redirect();
			}

		}
		public function mod(){
			$id = I("get.id");
			$admin = M("admin");
			$data = $admin -> find($id);
			$this -> assign("admin",$data);

			$this -> display();
		}
		public function update(){
			$admin = M("admin");
			if($_POST['password'] == $_POST['repassword']){
				$_POST['password'] = md5($_POST['password']);
				if($admin -> create()){
					if($admin -> save()){
						$this -> success("修改成功","userList");
					}else{
						$this -> error("修改失败");
					}
				}else{
					$this -> error("失败");
				}
			}else{
				$this -> error("失败");
			}
			//dump($_POST);
		}
		public function del(){
			$id = I("get.id");
			$admin = M("admin");
			$res = $admin->delete($id);
			if($res){
				$this->success("删除成功！");

			}else{
				$this->error("删除失败！");

			}


		}
		public function auth(){
			$id = I("get.id");
			$admin = M("admin");
			$admins = $admin ->find($id);
			//dump($admins);exit;
			$this->assign("admin",$admins);
			$this->display();

		}
		public function authupdate(){
			$auth = M("auth_group_access");
			//dump($auth);exit;
			$uid = $_POST['uid'];
			$data['group_id'] = $_POST['group_id'];
			$res = $auth->where("uid=$uid")->save($data);

					if($res){
						
						$this->success("修改成功！","userlist");
					}else{
						$this->error("修改失败！");
					}
				
			
		}
		public function search(){
			$admin = M("admin");
			$name=$_POST['name'];
			$admins = $admin ->where("username like '%{$name}%'")->select();
			//dump($admins);
			 echo ltrim(rtrim(json_encode($admins),"]"),'[');
			 //echo $this->ajaxReturn(json);
			//echo json_encode($_POST);

		}

	}




?>