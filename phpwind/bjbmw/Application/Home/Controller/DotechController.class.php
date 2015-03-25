<?php
namespace Home\Controller;
use Think\Controller;
class DotechController extends Controller{
	public function _initialize(){
		// dump($_SESSION);exit;
		if(!isset($_SESSION['tech_login'])){
			$configs = $this->config();
    		$this->assign("config",$configs);
			$this->display('index'); 
			// exit;
		}
	}
}
?>