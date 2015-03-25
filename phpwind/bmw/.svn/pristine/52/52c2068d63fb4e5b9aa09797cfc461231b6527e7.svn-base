<?php

namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller{

	public function _initialize () {

		$value = session('phone');
		
		if(!isset($value)){

			$this ->error('您还没有登陆',U('Index/index/#loginmodal')); 

		}

}

}


