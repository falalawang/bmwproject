<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController{
	
	//后台首页
	public function main(){
		$order = M('order');
		//未审核的订单
		$orderNum = $order -> where("orderStatus='1'") -> count();
		//订单总数
		$orders = $order -> count();
		//关注人数
		$user = M('wechat_user');
		$users = $user -> count();
		//总评价数
		$eva = M('evaluate');
		$evas = $eva -> count();
		//获得当前的时间戳
		$time = time();
		$this -> assign('order',$orderNum);
		$this -> assign('orders',$orders);
		$this -> assign('users',$users);
		$this -> assign('evas',$evas);
		$this -> assign('time',$time);
		$this -> display();
	}	
}