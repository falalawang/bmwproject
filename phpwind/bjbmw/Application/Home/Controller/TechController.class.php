<?php
namespace Home\Controller;
use Think\Controller;
class TechController extends DotechController{
	public function index(){
		if(isset($_SESSION['tech_login'])){
			$configs = $this->config();
    		$this->assign("config",$configs);
			$this->display(); 
		}
	}
	public function modify(){
		if(isset($_SESSION['tech_login'])){
			$configs=$this->config();
			$this->assign("config",$configs);  
			$map['ordernumber']=I('get.id'); 
			$_SESSION['modorderNo']=I('get.id'); 
			$order=M('order')->where($map)->select();
			$arr=$order[0];
			$this->assign('order',$arr);
			$this->display();
		}
	}
	public function modfunc(){ 
		$map['ordernumber']=$_SESSION['modorderNo']; 
		$data['status']=I('post.modstatus');
		$order=M('order')->where($map)->save($data); 
		if($order){
			echo 1;
		}else{
			echo 0;
		}		
	}
	public function serviceperson(){
		
		if(isset($_SESSION['tech_login'])){
		//获取登陆拿到的技师名称
		$configs = $this->config();
    	$this->assign("config",$configs);
		$map['userid']=$_SESSION['userid'];
		$person=M()->table(array('bmw_user'=>'u'))->where($map)->select();
		$_SESSION['techname']=$person[0]['username'];
		$this->assign('person',$person);
		$this->display();
		}
	}
	public function servicecar(){
		if(isset($_SESSION['tech_login'])){
		//获取登陆拿到的技师名称 
		$configs = $this->config();
    	$this->assign("config",$configs);
		$map['userid']=I('session.userid');
		$car=M()->table(array('bmw_user' => 'u','bmw_car' => 'c','bmw_shop' => 's'))->where('u.username = c.technicians AND s.id = c.shopid ')->where($map)->select();
		$arr=$car[0];
		$this->assign('userid',$arr['userid']);
		$this->assign('carid',$arr['carid']);
		$this->assign('username',$arr['username']);
		$this->assign('carname',$arr['carname']);
		$this->assign('shopname',$arr['shopname']);
		$this->assign('shopcity',$arr['ofcity']);
		$this->display();
		}
	}
	public function serviceorder(){ 
	
		if(isset($_SESSION['tech_login'])){
		$configs = $this->config();
    	$this->assign("config",$configs);
		if(isset($_GET['value'])){
			$map[$_GET['condition']] = array('like',"%".$_GET['value']."%");
		}
		$tmp['condition'] = $_GET['condition'];
		$tmp['value'] = $_GET['value'];
		
		//获取登陆拿到的技师名称
		$map['userid']=I('session.userid');
		$time='20';
		$time=$time.date('y/m/d',time());
		$map['hopedata']=$time;
		$count=M()->table(array('bmw_car'=>'c','bmw_client'=>'u','bmw_user'=>'us','bmw_order'=>'o'))->where('c.carid=o.carid AND us.username=c.technicians AND u.tel=o.tel')->where($map)->count();
		$Page=new \Think\Page($count,3); 
		foreach($tmp as $key=>$val){
    		$page->parameter[$key] = $val;
    	}
		$show=$Page->show();
		$order=M()->table(array('bmw_car'=>'c','bmw_client'=>'u','bmw_user'=>'us','bmw_order'=>'o'))->where('c.carid=o.carid AND u.tel=o.tel AND us.username=c.technicians' )->where($map)->order('o.hopedata desc, o.hopetime ')->limit($Page->firstRow.','.$Page->listRows)->select(); 
		$this->assign('time',$time);
		$this->assign('order',$order);
		$this->assign('services',$services);
		$this->assign('page',$show);
		$this->display();
	} 
	}
	public function check_login(){  
		$map['userid']=I('post.uname'); 
		$map['password']=md5(I('post.pwd'));
		$map['status']='3'; 
		$count=M('user')->where($map)->count();  
		if($count){
			$_SESSION['tech_login']=1; 
			$_SESSION['userid']=I('post.uname'); 
			header("Location:serviceperson");
			// $this->success('登录成功','serviceperson'); 
		}else{
			header("Location:index"); 
		}
	}
	public function updateusername(){
		
		if(isset($_SESSION['tech_login'])){
		$configs = $this->config();
    	$this->assign("config",$configs);
		$map['userid']=I('session.userid');
		$user=M('user')->where($map)->select(); 
		$arr=$user[0];
		$_SESSION['oldname']=$arr['username']; 
		$this->assign('person',$user);
		
		$this->display('updateusername');
	}
	}
	public function updateinfo(){
		$map['userid']=I('session.userid');
		$map1['technicians']=I('session.oldname'); 
		$newuname=I('post.newuname');
		if($newuname){
			$data['username']=$newuname;
			$data1['technicians']=$newuname;
			$user=M('user')->where($map)->save($data);
			$up=M('car')->where($map1)->save($data1);
			// $up2=M('car')->
			if($user&&$up){
				$_SESSION['techname']=$newuname;
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	public function logout(){
		unset($_SESSION['tech_login']);
		// session(null);
		header("Location:index"); 
	}
	public function detail(){
		if(isset($_SESSION['tech_login'])){
		$configs = $this->config();
    	$this->assign("config",$configs); 
		$id=I('get.id'); 
		$map['userid']=I('session.userid');
		$order=M()->table(array('bmw_order'=>'o','bmw_car'=>'c','bmw_client'=>'u','bmw_user'=>'us'))->where("c.carid=o.carid AND u.tel=o.tel AND o.ordernumber={$id} AND us.username=c.technicians")->where($map)->select();
		$arr=$order[0]; 
		$service = explode(",",trim($arr['services']));
		$str='';
		foreach ($service as $k =>$v){
			$map1['id']=$v;
			$ser=M('sercode')->field('service')->where($map1)->select();
			$str.=$ser[0]['service']."、";
		}
		$this->assign('order',$arr);
		$this->assign('service',$str);
		$this->display();
		}
	}
	public function config(){

		$config= M("config");
    	$configs = $config->find();
    	return $configs;

	}
}