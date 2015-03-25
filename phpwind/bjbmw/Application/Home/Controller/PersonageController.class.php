<?php
namespace Home\Controller;
use Think\Controller;
class PersonageController extends CommonController {
	public function index(){
		$configs = $this->config();
    	$this->assign("config",$configs);
		if ((!empty($_SESSION['tel']))&& isset($_SESSION["tel"])&&(!empty($_SESSION['tels'])) &&  isset($_SESSION['tels'])&& ($_SESSION['tels']==md5($_SESSION['tel']))){
			$finish = $this -> message(session("tel"),array("egt",'6'));
			$abolish = $this -> message(session("tel"),array("eq",'0'));
			$march = $this -> message(session("tel"),array("in",'1,2,3,4,5'));
			$this->assign("finish",$finish);
			$this->assign("march",$march);
			$this -> assign("abolish",$abolish);
			$this->display();
		}else{
			$this->display("Index/index");
		}

		
	}
	public function message($a,$b="",$oid=""){
		$tel['tel'] = $a;
		!empty($b)? $tel['status'] = $b :""; 
		!empty($oid)? $tel['id'] = $oid :""; 
		$order = M('order');
		$orders = $order ->where($tel)->order('status desc')->select();
		foreach ($orders as $key => $value) {
			$service = explode(",",trim($value['services']));
			$str = '';
			foreach ($service as $key => $val) {
				$sercode = M("sercode");				
				$sercodes = $sercode ->where("id = {$val}") ->find();
				$str .= $sercodes['service']."、";
			}
			switch ($value['status']) {
				case '0':
					$value['status']= "已取消";
					break;
				case '1':
					$value['status']= "客服处理中<button onclick='orde(this)'  value='{$value['id']}' type='button' class=' btn btn-primary btn-xs '>取消订单</button>";
					break;
				case '2':
					$value['status']= "客服处理中<button  onclick='orde(this)' value='{$value['id']}' type='button' class=' btn btn-primary btn-xs '>取消订单</button>";
					break;
				case '3':
					$value['status']= "服务车已出发";
					break;
				case '4':
					$value['status']= "服务中";
					break;
				case '5':
					$value['status']= "服务中";
					break;
				case '6':
					$value['status']= "已付款,<button onclick='codes(this)'   value='{$value['id']}' type='button' class='btn btn-link btn-xs  pcolor'>待评价</button>";
					break;
				case '7':
					$value['status']= "已付款,已评价";
					break;
				default:
					$value['status']= "获取信息失败...";
					break;
			}
			
			if (empty($value['finalprice'])) {
				$value['finalprice'] = $ne = $value['oldprice'];
			}
			$value['services'] = rtrim($str,"、");
			unset($value['hopetime']);
			unset($value['city']);
			unset($value['massage']);
			unset($value['checkreport']);
			unset($value['vin']);
			unset($value['tel']);

			$arr[]=$value;

		}
		return $arr;
	}
	public function oid(){

		$oid = $this -> message(session("tel"),"",$_GET['id']);
		
		foreach ($oid as $key => $value) {
			
		 	$str="<div id='left' class='panel panel-primary'>
                    <div>
                    <div >车辆信息:</div>
                    <div>{$value['carmodel']}</div>
                    </div>
                    <div >
                    <div >服务项:</div>
                    <div>{$value['services']}</div>
                    </div>           
            		<div >
                    <div >价格:</div>
                    <div class='pcolor'>{$value['finalprice']}元</div>
                    </div>
          			<div >
            		<div>状态:</div>
                    <div>{$value['status']}</div>
                    </div>
                    <div>
                    <div>时间:</div>
                    <div>{$value['hopedata']}</div>
                    </div>
                    <div>
                    <div>维修4s店:</div>
                    <div>{$value['carid']}</div>
                    </div>
                    <div>
                    <div>维修地址:</div>
                    <div>{$value['address']}</div>
                    </div>
					
               ";
               
                if(empty($value['evaluate'])){
                	$str .= " </div></div>";
                }else{
                	$str .= "
                		<div>
	                    <div>评价:</div>
	                    <div>{$value['evaluate']}</div>
	                    </div>
						</div></div>
                    ";
                }
		}
		
		$this->ajaxReturn($str);



	}
	public function upda(){
		$evaluate['id']=$_GET['eid'];
		$evaluate['status'] = '7';
		switch ($_GET['ev']) {
			case '1':
				$evaluate["evaluate"]="差";
				break;
			case '2':
				$evaluate["evaluate"]="一般";
				break;
			case '3':
				$evaluate["evaluate"]="较好";
				break;
			case '4':
				$evaluate["evaluate"]="满意";
				break;
			case '5':
				$evaluate["evaluate"]="非常满意";
				break;
			default:
				$evaluate["evaluate"]="较好";
				break;
		}
		$order = M("order");
		if($order->create($evaluate)){
			$red = $order->save();
			if($red){
				$this->ajaxReturn($_GET['eid']);
				
			}else{
				$this->ajaxReturn("0");
			}

		}else{
				$this->ajaxReturn("0");
		}


	}
	public function orde(){

		$status['id']=$_GET['id'];
		$status['status'] = '0';
		$order = M("order");
		if($order->create($status)){
			$red = $order->save();
			if($red){
				echo $_GET['id'];
			}else{
				echo "0";
			}

		}else{
				echo "0";
		}


	}
	public function out(){
		if($_GET['name']){
			echo 1;
			session(null);
		}else{
			echo 0;

		}

	}
		public function config(){

		$config= M("config");
    	$configs = $config->find();
    	return $configs;

	}
}