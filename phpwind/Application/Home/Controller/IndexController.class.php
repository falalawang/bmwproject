<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(isset($_SESSION['uid'])){
            setcookie('url','',time()-1,'/');  //判断当前已登录，删除未登录状态url cookie
            // $this -> assign('loginBtn','');
        }else{
            $this -> assign('loginBtn','loginBtn');
            if(isset($_GET['islogin']) && $_GET['islogin'] == 'no'){
                $url = cookie("url");//判断当前是否未登录，从会员中心跳转
                $this->assign("url",$url);
            }else{
                $this->assign("url",null);//判断不是跳转，不分配变量
            }
        }
        $this -> display();
    }
}