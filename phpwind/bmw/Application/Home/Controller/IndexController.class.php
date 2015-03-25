<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function close(){
	
		$this -> display();
	
	}
	public function index(){
	
		$res = M('config');
		
		$result = $res ->where("id=1")->select();
		
		$this -> assign('result',$result);
	
		$res = M('config');

		$result = $res ->field('status')->where("id=1")->select();
		
		if($result[0]['status']=='1'){
		
			//$this -> error('网站升级中','Index/close');
			//exit;
			header('location:Index/close');
			exit();
			
			
		
		}
		$car = M('series_models');
    	$data = $car -> group('brand')-> select();
    	$datb = $car -> group('series')-> select();
		$this -> assign('series',$data); 
		$this -> assign('serie',$datb); 
	   
		$links = M('links');
		
		$total = $links -> select();
		
		$this -> assign('total',$total);
		
		$this -> display();	
	}
	
	
}