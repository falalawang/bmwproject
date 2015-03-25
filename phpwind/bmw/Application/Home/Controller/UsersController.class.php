<?php

namespace Home\Controller;

use Think\Controller;

class UsersController extends Controller{

	public function order(){

		//首先得到手机号

		$res = M('order');

		$orp['phone']=22222222222;

		$result = $res -> field('brand,id,series,combo,models,ctime,price')->where($orp)->select();

		$les = $this -> assign('result',$result);

		
		$this -> display();
		

	}

	public function cars(){


	}

	public function settings(){



	}

}