<?php

namespace Home\Controller;

use Think\Controller;

class LayoutController extends Controller{

	public function layout(){
	
		$res = M('config');
		
		$result = $res ->where("id=1")->select();
		
		$this -> assign('result',$result);
		
		$this -> display();
	
	}





}