<?php
namespace Tech\Controller;
use Think\Controller;
class LoginController extends Controller {
    //技师登陆页面
    public function login(){
        $this ->display();
    }
    //技师处理页面
    public function doLogin(){
        $tel = $_POST['telephone'];
        $pwd = md5($_POST['password']);
        $tech = M("serviceman");
        $res = $tech ->where("telephone = '$tel' and password = '$pwd' and status = '0'")-> find();
        if($res){
            echo 1;
            session('tech_isLogin','1');
            session('tech_id',$res['id']);
            session('tech_telephone',$tel);
        }else{
            echo 0;
        }
    }
    //技师处理页面
    public function logout(){
        session(null);
        session_destroy();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-1,'/');
        }
        $this -> success('退出成功',U('Login/login'));
    }
}