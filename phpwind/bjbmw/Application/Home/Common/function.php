<?php


	
	//生成随机数
	/**
	 *
	 *
	 *生成随机数,用于发送的手机验证码
	 */
	function makeVerifyCode(){
		$pattern='123456789';
		$code='';
		for($i=0;$i<6;$i++){
			$code.=$pattern{mt_rand(0,8)};
		}
		return $code;
	}


 ?>
