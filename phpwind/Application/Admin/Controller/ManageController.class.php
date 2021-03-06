<?php
namespace Admin\Controller;
use Think\Controller;
class ManageController extends CommonController{
	//网站配置
	public function set(){
		$webset = M('webset');
		//将网站基本配置查询出来
		$web = $webset  -> field('id,title,keywords,description,webLogo')
						->select();
		$this -> assign('web',$web);
		$this -> display();
	}
	//更新网站配置方法
	public function updateSet(){
		$webset = M('webset');
		$web = $webset -> field('id,webLogo')
					   -> select();
		//获取原先的Logo名称
		$oWebLogo = $web[0]['webLogo'];

		//实例化上传类
		$uploads = new \Think\Upload();
		//设置上传文件的大小
		$uploads -> maxSize = 2014*2014;
		//设置上传类型
		$uploads -> exts = array('jpg','gif','png','jpeg');
		$uploads -> rootPath = './Public';
		//上传目录
		$uploads -> savePath = './uploads/';
		$info = $uploads -> upload();
		//上传提示错误信息
		if(!$info){
			$this -> error($uploads -> getError());
		}
		$_POST['webLogo'] = $info['webLogo']['savename'];
		
		if($webset -> create($_POST)){
			if($webset -> save()){
				$this -> success('修改成功','set');
				//将原Logo删除
				unlink("./Public/uploads/Logo/{$oWebLogo}");
				unlink("./Public/uploads/images/{$oWebLogo}");
			}else{
				$this -> error('修改失败','set');
			}
		}else{
			$this -> error('失败','set');
		}		
	}
	//网站开关
	public function onOff(){
		$web = M('webset');
		$sw = $web -> field('webStatus,id')
					   -> select();
		$this -> assign('sw',$sw);
		$this -> display();
	}
	//更新网站开关
	public function updateSwitch(){
		$web = M('webset');
		if($web -> create($_POST)){
			if($web -> save()){
                writelog("info","用户名:".session('hname').";操作:修改网站状态;");
				$this -> success('更新成功','onOff');
			}else{
				$this -> error('无修改值','onOff');
			}
		}else{
			$this -> error('更新失败','onOff');
		}
	}

	//显示后台人员列表
	public function myList(){		
		$manager = M('manager');
		//把超级管理员的信息去掉
		$managers = $manager -> where("auth!='0'") -> select();
		$this -> assign('manager',$managers);
		$this -> display();
	}

	//显示超级管理员增添后台管理员和客服界面
	public function add(){
		$this -> display();
	}
	
	//把后台人员信息插入数据库
	public function insert(){
		//把接收的密码进行md5加密
		$_POST['password'] = md5($_POST['password']);
		$data = $_POST;
		//创建数据对象
		$manager = M('manager');
		if($manager -> create($data)){
			$managers = $manager -> add();
			if($managers){
				$arr = $data;
				$arr['uid'] = $managers;
				$arr['group_id'] = $data['auth'] + 1;
				$ace = M('auth_group_access');
				if($ace -> create($arr)){
					if($ace -> add()){
						$this -> success('添加成功','myList');
					}else{
						$this -> error('添加失败');
					}
				}else{
					$this -> error('添加失败');
				}
			}else{
				$this -> error('添加失败');
			}
		}else{
			$this -> error('创建失败');
		}		
	}

	//禁用和开启功能
	public function able(){
		//获取要禁用或者开启的用户的ID
		$id = $_GET['id'];
		$manager = M('manager');
		$managers = $manager -> field("status") -> where("id={$id}") -> select();
		if($managers[0]['status'] == '0'){
			$managers[0]['status'] = '1';
		}else{
			$managers[0]['status'] = '0';
		}
		$managers[0]['id'] = $id;
		if($manager -> create($managers[0])){
			if($manager -> save()){
				if($managers[0]['status'] == '1'){
					$this -> redirect('myList');
				}else{
					$this -> redirect('myList');
				}
			}else{
				$this -> error('操作失败');
			}
		}else{
			$this -> error('操作失败');
		}
	}

	//ajax请求检查用户名是否存在
	public function checkName(){
		$manager = M('manager');
		$managers = $manager -> where("name='{$_GET['name']}'") -> select();
		if($managers){
			echo '1';
		}else{
			echo '2';
		}
	}

	//修改管理员信息
	public function mod(){
		$id = $_GET['id'];
		$manager = M('manager');
		$managers = $manager -> where("id={$id}") -> select();
		$this -> assign('manager',$managers);
		$this -> display();
	}

	//修改后台管理人员密码
	public function doMod(){	
		$_POST['password'] = md5($_POST['password']);
		$data = $_POST;
		$data['id'] = $_GET['id'];
		$manager = M('manager');
		if($manager -> create($data)){
			if($manager -> save()){
				$this -> success('修改成功',U('Manage/myList'));
			}else{
				$this -> error('您没有修改');
			}
		}else{
			$this -> error('创建失败');
		}
	}

	//修改权限
	public function auth(){
		$id = $_GET['id'];
		$manager = M('manager');
		$data = $manager -> where("id={$id}") -> select();
		$this -> assign('manager',$data);
		$this -> display();
	}

	public function authMod(){
		$data = $_POST;
		$data['id'] = $_GET['id'];
		$manager = M('manager');
		if($manager -> create($data)){
			if($manager -> save()){
				$arr = $data;
				$arr['uid'] = $data['id'] + 0;
				$arr['group_id'] = $data['auth'] + 1;
				$ace = M('auth_group_access');
				$aces = $ace -> where("uid={$arr['uid']}") -> setField("group_id",$arr['group_id']);
					if($aces){
						$this -> success('修改成功',U('Manage/myList'));
					}else{
						$this -> error('权限未修改');
					}
			}else{
				$this -> error('权限未修改');
			}
		}else{
			$this -> error('创建失败');
		}
	}
}
?>