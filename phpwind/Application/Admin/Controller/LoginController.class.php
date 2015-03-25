<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	
	//登录页面显示
	public function index(){
        $this -> display();
    }
	//处理登录，进行判断用户名和密码是否正确
	public function doLogin(){
        $name = I('post.name');
        $password = md5(I('post.password'));
		$manager = M('manager');
        $result = $manager -> where("name='{$name}' and password='{$password}'")->select();      
        if(!empty($result)){
            if($result[0]['status'] != '0'){
                $this -> error('用户被禁用,请联系超级管理员');
                exit();
            }
        	//登录成功后将用户名和密码存进session中
            $_SESSION['hid'] = $result[0]['id'];
        	$_SESSION['hname'] = $name;
        	$_SESSION['auth'] = $result[0]['auth'];
        	//登录成功后跳转到后台首页
            $this -> success('登录成功',U('Index/main'));
        }else{
        	//登录失败后，重新返回登录页
            $this -> error('用户名或密码不正确',U('Login/index'));
        }
	}

	//退出登陆
	public function logout(){
        //将session数组赋值为空数组
        $_SESSION = array();
        if(isset($_COOKIE['session_name'])){
            setCookie(session_name(),'',time()-100,'/');
        }    
        session_destroy();
		$this -> success('退出成功',U('Login/index'));
	}
}
?>