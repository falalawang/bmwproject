<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
	public function _initialize(){
		$conf = M('config');
		$res = $conf -> field('status') -> find();
		if(!$res['status']){
		session(null);
		$configs = $this->config();
    	$this->assign("config",$configs);
			$this->display("Index/index2",0);
			exit;
		}
	}
}

?>