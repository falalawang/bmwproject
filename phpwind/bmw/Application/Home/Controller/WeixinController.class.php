<?php
	namespace Home\Controller;
	use Think\Controller;
	class WeixinController extends Controller{
		public function weixin(){
			
			define("TOKEN","weixin");
			define("APPID", "wx0f1620d11eea2b65");
			define("APPSECRET", "79b6a102916f99892480ca59b644ef72");
			$weixin = new \Think\weixin();
			
			if(!isset($_GET['echostr'])){
		   		 $weixin -> responseMsg();
			}else{
			    $weixin -> valid();//用来验证TOKEN
			}

			$access_token = $weixin->getAccessToken();
			$weixin ->createmenu($access_token);
			
			
		}
	}