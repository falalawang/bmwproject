<?php
namespace Home\Controller;
use Think\Controller;
class SmsController extends Controller{

	public function sendMessage(){

		$phone = I("get.phone");
		//echo $phone;
		$Vcode = Vcode();
		session('Vcode',$Vcode);
		//echo session('Vcode');exit;
		/*
		$curl = new \Org\Util\Curl();//curl扩展 功能就是在脚本中发送http请求
		//拼接短信接口接口url
		$prefix = C('message.MessageUrl');//读取接口地址
		$url = C('message.MessageUrl')."?action=send&account=".C('message.username')."&password=".C('message.password')."&mobile=".$phone."&content="."您的验证码是".$Vcode."&AddSign=Y";
		//发送请求
		$res = $curl->get($url);

		*/
		$options['accountsid']='bf4848d0edc45055c848187403a32a9f';
		$options['token']='195ca3aab65539722f43771070540903';
		$Sms = new \Org\Util\Sms($options);
		//dump($Sms);
		$appid="954fcf9e2b4946e69163f64f28ebead7";
		$to=$phone;
		$templateId ="1";
		$param =$Vcode;
		//$type = "";
		$Sms ->templateSMS($appid,$to,$templateId,$param,'xml');
		
	}
	public function check(){

		$phone = I("post.phone");
		
		$code = I("post.code");
		
		if($code == session('Vcode')){
			session('phone',$phone);
			$this->success("登录成功");

		}else{
			$this->error("登录失败！");
		}
	}
	public function checka(){

		$phone = I("get.phone");
		
		$code = I("get.code");
		if($code == session('Vcode')){
			session('phone',$phone);
			echo 'true';
		}else{
			echo 'false';
		}
	}

}