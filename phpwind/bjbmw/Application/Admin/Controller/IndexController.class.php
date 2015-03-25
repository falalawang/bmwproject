<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {

    //用户登录验证  跳转到登录页
    public function index(){
        dump(session('userlogin'));

        $userlogin = session('userlogin');//本网站用户登录的session
//exit;直接跳到后台
        $this -> redirect('Index/login'); //开启后台验证
    }
    public function login(){


    	$this->display();
    	
        }

    //登录验证
    public function dologin(){
    	$user = M('user');
    	   
	        
	        //跟数据库中的数据对比
	        $data['userid'] = $_POST['userid'];
			$data['password'] = md5($_POST['password']);
			$userdetail = $user -> where($data) ->find();

			$_POST['status'] = $userdetail['status'];//用户登录成功 得到他的权限
			$_POST['username'] = $userdetail['username'];//用户登录成功 得到他的昵称
			session('userlogin',$_POST);
			
			//dump($_SESSION);exit;
	        //有结果 说明正确登录  把权限得到存到session中
	        if($userdetail && !($userdetail['status']==2)){
				
	        
		        $this -> redirect('User/index');

	        }elseif($userdetail['status']==2){
	        	$this -> redirect('Indent/index'); //客服管理页
	        }else{
	        	$this -> error('用户名或密码不正确！','Index/login',1);
	        }
	        
		}
    		
	public function logout(){
		session('userlogin',null);
		dump(session('userlogin'));
		$this -> redirect('Index/login');
	}
	
}