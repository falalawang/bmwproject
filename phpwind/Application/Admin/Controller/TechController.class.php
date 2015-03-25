<?php
namespace Admin\Controller;
use Think\Controller;
class TechController extends CommonController{
	//技师排班页面
	public function index(){
		//得到订单的id
		$orderId = $_GET['id'];
		//查询订单表中的日期和时间
		$orders = M('order');
		$order = $orders -> field('orderDate,orderTime')
						 -> where("id=$orderId")
						 -> select();
		//预定日期
		$orderDate = $order[0]['orderDate'];
		//预定时间
		$orderTime = $order[0]['orderTime'];
		$orderT = '';
		if($orderTime == '08:00-10:00'){
			$orderT = 0;
		}elseif($orderTime == '10:00-12:00'){
			$orderT = 1;
		}elseif($orderTime == '12:00-14:00'){
			$orderT = 2;
		}elseif($orderTime == '14:00-16:00'){
			$orderT = 3;
		}
		$serverCar = M('server_car');
		//查询服务车与技师的关联表和服务车表,查询出已绑定技师的服务车
		$modelCar = M();
		$serverCars = $modelCar -> table("xdl_server_car as c,xdl_serviceman_car as m")
									-> field("mark")
									-> where("c.id=m.carId")
									-> select();
		//获得当前时间
		$time = time();
		$array = array();
		//循环出7天的日期
		for($i=0;$i<7;$i++){
			$everyTime = $time+24*3600*$i;
			//将7天日期放到一个数组中
			$every[$i] = date("Y-m-d",$everyTime);
		}
		//遍历日期
		foreach ($every as $key => $value) {
			foreach($serverCars as $ck => $cv){
				//服务车的编号
				$car = $cv['mark'];

				//对应的日期下的车编号的状态都为0即空闲
				for ($i=0; $i <=$ck ; $i++) {
					$all[$value][$car]=array("0"=>"0","1"=>"0","2"=>"0","3"=>"0");
				}
			}			
		}

		//遍历日期,查询对应日期的数据,$key为日期
		foreach($all as $key => $value){		
			$model = M();
			//根据服务车id查询出服务车名
			$arrange = $model -> table('xdl_arrange as a,xdl_server_car as c')
							  -> field("a.carId,a.date,a.time,c.mark")
							  -> where("a.carId=c.id and a.date='$key'")
							  -> select();
			if($arrange){
				foreach($arrange as $v){
					//如果日期相等
					if($key == $v['date']){
						//$num为车的编号
						//dump($v['carId']);
						foreach($value as $num => $status){
							//dump($num);
							//服务车编号相等
							if($v['mark'] == $num){
								$time = explode(",",$v['time']);
								$time = convert($time);
								ksort($time);
								$all[$key][$num] = $time;
							}
						}
					}
				}
			}
		}
		//订单的id
		$this -> assign('orderId',$orderId);
		//预约日期
		$this -> assign('orderDate',$orderDate);
		//预约时间
		$this -> assign('orderTime',$orderT);
		$this -> assign('all',$all);
		// dump($all);die;
		$this -> display();
	}
	
	//更新服务车的状态,即时间段
	public function updateTime(){
		//订单的id
		$orderId = $_POST['orderId'];
		//日期
		$myDate = $_POST['myDate'];
		//服务车名称
		$carName = $_POST['myCar'];
		//查询服务车名对应的编号
		$serverCars = M('server_car');
		$serverCar = $serverCars -> field('id')
								 -> where("mark='$carName'")
								 -> select();
		//得到服务车对应的id
		$carId = $serverCar[0]['id'];
		//服务车的状态
		$status = implode(",",$_POST['time']);
		$arranges = M('arrange');
		//查找,看数据库中是否有此条数据,若有则更新,若没有则添加
		$arrange = $arranges -> where("carId='$carId' and date='$myDate'") -> select();
		//如果能查出对应的值,则更新时间段(若需要更新的数组中没有主键,则需要加where条件)
		if($arrange){
			$data['time'] = $status;
			if($arranges -> create($data)){
				if($arranges ->where("carId='$carId' and date='$myDate'")-> save()){
					//如果更新成功,则将服务车的id放到订单表中
					$order['id'] = $orderId;	//订单的id
					$order['serverCarId'] = $carId;
					$orders = M('order');
					if($orders -> create($order)){
						if($orders -> save()){
							$this -> success('更新成功',U('Order/index'));
						}else{
							$this -> error('没有分配车',U("Tech/index"));
						}
					}else{
						$this -> error('更新失败',U("Tech/index"));
					}
				}else{
					$this -> error('没有选择时间',U('Tech/index'));
				}
			}else{
				$this -> error('失败',U('Tech/index'));
			}
		//如果查不出对应的值,则插入
		}else{
			//组合成数组
			$data['date'] = $myDate;
			$data['carId'] = $carId;
			$data['time'] = $status;
			if($arranges -> create($data)){
				if($arranges -> add()){
					//如果分配成功,则需将服务车id加入到订单表中
					$order['id'] = $orderId;	//订单的id
					$order['serverCarId'] = $carId;
					$orders = M('order');				
					if($orders -> create($order)){
						if($orders -> save()){
							$this -> success('分配成功',U('Order/index'));
						}else{
							$this -> error('分配失败',U("Tech/index"));
						}
					}else{
						$this -> error('分配失败',U("Tech/index"));
					}			
				}else{
					$this -> error('分配失败',U('Tech/index'));
				}
			}else{
				$this -> error('失败',U('Tech/index'));
			}
		}
	}
}
?>