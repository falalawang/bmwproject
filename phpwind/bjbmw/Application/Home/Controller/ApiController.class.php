<?php
	/**
	 *
	 *
	 *短信接口Api
	 */
	namespace Home\Controller;
	use Think\Controller;
	class ApiController extends CommonController{ 
		
		public function sendMessage(){
			//初始化必填
			$options['accountsid']='5e4dac2dd5812b148f886829cc725e8f';
			$options['token']='c39575e628dacfd4a95365d36dd89a6a';

			//初始化 $options必填
			$ucpass = new \Org\Util\Ucpaas($options);
			$_SESSION['tel']=((I('post.tel')-I('post.num'))/10);
			$_SESSION['vCode']= makeVerifyCode();
			//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
			$appId = "4748cab05f9e432e9e7103dcb0c7a8d0";
			$to = $_SESSION['tel'];
			$templateId = "4413";
			$param=$_SESSION['vCode'];

			echo $ucpass->templateSMS($appId,$to,$templateId,$param);
		}
		public function send(){
				//初始化必填
			$options['accountsid']='5e4dac2dd5812b148f886829cc725e8f';
			$options['token']='c39575e628dacfd4a95365d36dd89a6a';

			//初始化 $options必填
			$ucpass = new \Org\Util\Ucpaas($options);
			$_SESSION['tel']=I('post.tel');
			$_SESSION['vCode']= makeVerifyCode();
			//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
			$appId = "4748cab05f9e432e9e7103dcb0c7a8d0";
			$to = $_SESSION['tel']; 
			$templateId = "4413";
			$param=$_SESSION['vCode'];
			echo $ucpass->templateSMS($appId,$to,$templateId,$param);
		}
		
	}
	