<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{

	public function _initialize(){
		if(!isset($_SESSION['userlogin'])){
			$this->error('没有登陆！');
		}
		if($_SESSION['userlogin']['status'] == 2){
			$this->error('没有权限！');
		}
		
	}
}