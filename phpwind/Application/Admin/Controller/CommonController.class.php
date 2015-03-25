<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{

	public function _initialize(){
	
		//验证是否登陆
		if(!isset($_SESSION['hid'])){
			$this->error('您还没有登录，请先登陆!',U('Login/index'));
		}
		
		$AUTH = new \Think\Auth();
        //类库位置应该位于ThinkPHP\Library\Think\
        if(!$AUTH->check(CONTROLLER_NAME.'/'.ACTION_NAME, session('hid'))){
            $this->error('您没有访问权限!');
        }
        
	}

}
?>