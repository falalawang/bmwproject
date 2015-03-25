<?php
namespace Admin\Controller;
use Think\Controller;
class IndentController extends Controller {

	// 订单管理主页
	public function index(){
		
		if(isset($_GET['value'])){
			$map[$_GET['condition']] = array('like',"%".$_GET['value']."%");
		}
			$map['o.status'] = array('neq','0');
			$tmp['condition'] = $_GET['condition'];
			$tmp['value'] = $_GET['value'];
		$orders = M();
    	$count = $orders -> table(array('bmw_order' => 'o','bmw_client' => 'c','bmw_car' => 'r')) -> where("o.tel=c.tel AND  r.carid=o.carid") -> where($map) -> count();
    	$page = new \Think\Page($count,10);
    	foreach($tmp as $key=>$val) {    
    		$page->parameter[$key] = $val;
    	}
    	$show = $page -> show();
    	$order = $orders -> table(array('bmw_order' => 'o','bmw_client' => 'c','bmw_car' => 'r')) -> where("o.tel=c.tel AND r.carid=o.carid")  -> where($map) ->  order('o.id desc') -> limit($page->firstRow.','.$page->listRows) -> select();

    	$this -> assign('status',session('userlogin')['status']);
    	$this -> assign('show',$show);
    	$this -> assign('order',$order);
		$this -> display();
	}

	//订单详情
	public function detail(){
		$brands = M('brand');
    	$brand = $brands -> select();
    
		$orders = M();
		$id = I('get.id');
		$order = $orders -> table(array('bmw_order' => 'o','bmw_client' => 'c','bmw_car' => 'r')) -> where("o.tel=c.tel AND o.id={$id} AND r.carid=o.carid ") ->  select();

		
		$arr = explode(',',$order[0]['services']);
		$services = M('sercode');
		$res = array();
		for($i = 0;$i < count($arr);$i++){
			$res[] = $services -> find($arr[$i]);
		}
		$shops = M('shop');
		$shop = $shops -> select();
		$this -> assign('status',session('userlogin')['status']);
		$this -> assign('shop',$shop);
		$this -> assign('brand',$brand);
		$this -> assign('res',$res);
		$this -> assign('car',$car);
    	$this -> assign('order',$order[0]);
		$this -> display();
	}

	public function update(){
		if($_POST['carid'] == -1){
			unset($_POST['carid']);
		}
		
		$order = M('order');
		$ordernumber = $order -> find($_POST['id']);
		$order -> create();
		if($order -> save()){
			$shops = M('shop');
			$shop = $shops -> find($_POST['shopid']);
		
			$cars = M('car');
			$car = $cars -> find($_POST['carid']);
			$msg = $_POST['status']?'确定':'取消';
			$users = M('user');
			$user = $users -> where("userid='{$_SESSION['userlogin']['userid']}'") -> select();

			$data['uid'] = $user[0]['id'];
			$data['operation'] = "修改了".$ordernumber['ordernumber']."号订单,最终价格：".$_POST['finalprice'].",日期：".$_POST['hopedata'].",时间：".$_POST['hopetime'].",地点：".$_POST['address'].",服务车：".$shop['shopname']."  ".$car['carname'].",订单状态：".$msg;
			$data['otime'] = time();
			$operatecord = M("operatecord");
			$operatecord -> create($data);
			if($operatecord -> add()){
				$this->redirect("indent/detail/id/{$_POST['id']}",0);
			}else{
				$this -> error('修改失败1');
			}
		}else{
			$this -> error('修改失败2');
		}		
		$this -> assign('status',session('userlogin')['status']);
	}

	public function change(){
		$cars = M('car');
		$car = $cars -> where("shopid={$_POST['shopid']}") -> select();
		$str = "<option value='-1'>请选择</option>";
		foreach ($car as $key => $value) {
			$str .= "<option value='{$value['carid']}'>{$value['carname']}</option>";
		}
		echo $str;
		$this -> assign('status',session('userlogin')['status']);
	}	
	public function series(){
		$series = M('series');
		$res = $series -> where("brandid='{$_POST['brandid']}'") -> select();
		$str = '<option>请选择</option>';
		foreach ($res as $key => $value) {
			$str .= "<option value='{$value['id']}'>{$value['series']}</option>";
		}
		echo $str;
		$this -> assign('status',session('userlogin')['status']);

	}
	public function model(){
		$models = M('model');
		$res = $models -> where("seriesid='{$_POST['seriesid']}'") -> select();
		$str = '<option>请选择</option>';
		foreach ($res as $key => $value) {
			$str .= "<option value='{$value['id']}'>{$value['model']}</option>";
		}
		echo $str;
		$this -> assign('status',session('userlogin')['status']);
	}

	public function cancel(){
		
		if(isset($_GET['value'])){
			$map[$_GET['condition']] = array('like',"%".$_GET['value']."%");
		}
			$map['o.status'] = array('eq','0');
			$tmp['condition'] = $_GET['condition'];
			$tmp['value'] = $_GET['value'];
		$orders = M();
    	$count = $orders -> table(array('bmw_order' => 'o','bmw_client' => 'c','bmw_car' => 'r')) -> where("o.tel=c.tel AND  r.carid=o.carid") -> where($map) -> count();
    	$page = new \Think\Page($count,10);
    	foreach($tmp as $key=>$val) {    
    		$page->parameter[$key] = $val;
    	}
    	$show = $page -> show();
    	$order = $orders -> table(array('bmw_order' => 'o','bmw_client' => 'c','bmw_car' => 'r')) -> where("o.tel=c.tel AND r.carid=o.carid")  -> where($map) ->  order('o.id desc') -> limit($page->firstRow.','.$page->listRows) -> select();

    	$this -> assign('status',session('userlogin')['status']);
    	$this -> assign('show',$show);
    	$this -> assign('order',$order);
		$this -> display();
	}
	public function updatecar(){

		$models = M('model');
		$model = $models -> find($_POST['id']);
		$seriess = M('series');
		$series = $seriess -> find($_POST['seriesid']);
		$brands = M('brand');
		$brand = $brands -> find($_POST['brandid']);
		$order = M('order');
		$ordermsg = $order -> find($_POST['id']);
		$users = M('user');
		$user = $users -> where("userid='{$_SESSION['userlogin']['userid']}'") -> select();
		$data['uid'] = $user[0]['id'];
		$data['operation'] = "修改了".$ordermsg['ordernumber']."号订单,车品牌：".$brand['brand'].",车系：".$series['series'].",车型：".$model['model'];
		$data['otime'] = time();
		
		$sercode = M('sercode');
		$arr = explode(',',$_POST['arr']);

		for($i = 0;$i < count($arr);$i++){
			$res[] = $sercode -> find($arr[$i]);
		}
		$str = '';
		foreach ($res as $key => $value) {
			$str .= "{$value['sercode']},";
		}
		$newstr = substr($str,0,strrpos($str,','));

		$serprice = M('serprice');
		$code = $serprice -> field($newstr) -> where("brand='{$brand['brand']}' AND series='{$series['series']}' AND model='{$model['model']}'") -> find();
		// 价格最小值
		$num1 = 0;
		foreach ($code as $key => $value) {
			if(is_numeric($value)){
				$num1 += $value;
			}else{
				$tmp = explode('/',$value);
				if($tmp[0] > $tmp[1]){
					$num1 += $tmp[1];
				}else{
					$num1 += $tmp[0];
				}
			}
		}
		
		
		//价格最大值
		$num2 = 0;
		foreach ($code as $key => $value) {
			if(is_numeric($value)){
				$num2 += $value;
			}else{
				$tmp = explode('/',$value);
				if($tmp[0] > $tmp[1]){
					$num2 += $tmp[0];
				}else{
					$num2 += $tmp[1];
				}
			}
		}
		
		if($num1 == $num2){
			$msg['oldprice'] = $num1;
		}else{
			$msg['oldprice'] = $num1.'-'.$num2;
		}
		
		$msg['carmodel'] = $brand['brand'].' '.$series['series'].' '.$model['model'];
		$msg['id'] = $_POST['orderid'];
		$order -> create($msg);
		if($order -> save()){
			$operatecord = M("operatecord");
			$operatecord -> create($data);
			$operatecord -> add();
			$this -> redirect("indent/detail/id/{$_POST['orderid']}",0);
		}else{
			$this -> error('修改失败');
		}
		$this -> assign('status',session('userlogin')['status']);
		
	}
}