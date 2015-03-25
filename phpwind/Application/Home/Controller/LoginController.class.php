<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function login(){
        // $this -> display();
    }
    

    public function sendMessage(){

        //初始化必填
        $options['accountsid']='f31d96c3b6be7e25ab07236b2d6d8f4e';
        $options['token']='d173243d104fc78792b748d9f717c33a';

        //随机验证码
        $str = '0123456789';
        $str = str_shuffle($str);
        $code = substr($str,3,4);

        //初始化 $options必填
        $ucpass = new \Org\Util\Ucpaas($options);
        $appId = "5f838dc7196e436b9f11de24a93a9fe6";
        $templateId ="4398";
        $to =$_GET['telephone'];
        $param ="宇瑞安".','.$code.',2';
        // cookie('code',$param);
        setcookie('code',$code,time()+120,'/');
        echo $ucpass-> templateSMS($appId,$to,$templateId,$param,'xml');
    }

    //退出
    public function logout(){
        //将session数组赋值为空数组
        session(null);
        session_destroy();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-1,'/');
        }
        $this -> success('退出成功',U("Index/index"));
    }
    public function doLogin(){
        $tel = $_POST['telephone'];
        $code = $_POST['code'];

        if($code != '' && $code == $_COOKIE['code']){
            $customer = M("customer");
            $res = $customer ->where("telephone = '$tel'") -> find();
            if($res){
                session('uid',$res['id']);
                session('telephone',$tel);
                echo 1;
            }else{
                $data['telephone'] = $tel;
                if($customer->create($data)){
                    $result = $customer -> add();
                    session('uid',$result);
                    session('telephone',$tel);
                    echo 1;
                }else{
                    echo 0;
                }
            }
        }else{
            echo 0;
        }
    }

}
?>