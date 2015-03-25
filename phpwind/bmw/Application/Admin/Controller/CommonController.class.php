<?php
namespace Admin\Controller;
    use Think\Controller;
    class CommonController extends Controller {
        public function _initialize () {
            if(!session('uid')){
                $this->error('没有登陆',U("index/index"));
            }
            $AUTH = new \Think\Auth();
            //类库位置应该位于ThinkPHP\Library\Think\
         

            if(!$AUTH->check(CONTROLLER_NAME.'/'.ACTION_NAME, session('uid'))){

                $this->error('没有权限');
        }
}
}