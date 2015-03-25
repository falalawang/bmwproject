<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends CommonController{
	//订单列表
	public function index(){
		$model = M('order');
		//分页
		$count = $model -> where("orderStatus!='0'") -> count();
		$Page = new \Think\Page($count,5);	
		$order = $model ->field('id,carType,carNumber,serverCarId,combo,lastPrice,vin,orderTime,orderDate,orderStatus,address,telephone,user')
						-> where("orderStatus!='0'")
						-> order('orderStatus,createTime desc')
						-> limit($Page->firstRow.','.$Page->listRows)
						-> select();
		$count = 1;
		foreach($order as $k=>$v){
			//用空格分隔车型
			$types = explode(",",$v['carType']);
			//用,分隔套餐
			$arr = explode(',',$v['combo']);
			//车的品牌
			$brand = $types[0];
			//车系
			$series = $types[1];
			//车型
			$types = $types[2];
			//将查询出的所有套餐放到下标为combo的数组中
			$order[$k]["combo"] = $arr;
			$Ty = M('models');
			$type = $Ty -> field('id')
						-> where("brand='$brand' and series='$series' and types='$types'")
						-> select();
			//获取用户车型对应车型表中的id
			$typeId = $type[0]['id'];
			$num = 0;
			//遍历，查找出套餐对应的价格对应
			foreach($arr as $value){
				$combos = M('price');
				$combo = $combos -> field('lowPrice,highPrice')
								 -> where("typeId=$typeId and comboName='$value'")
								 -> select();
				//将价格与套餐连接在一起
				foreach($combo as $c){
					if(!empty($c['highPrice'])){
					 	$order[$k]["combo"][$num] = $value;
					 	//在定义一个数组，与套餐对应，当有最高价格时,值为1,否则为0
					 	$order[$k]["price"][$num] = $c['lowPrice'].'-'.$c['highPrice'];
					 	$order[$k]['interval'][$num] = 1;
					}else{
					 	$order[$k]["combo"][$num] = $value;
					 	$order[$k]["price"][$num] = $c['lowPrice'];
					 	$order[$k]['interval'][$num] = 0;
					}
				}				
				$num++;
				//定义编号
				$order[$k]['count'] = $count;
			}		
			$count++;		
		}
		//查询评价表
		$evaluates = M('evaluate');
		$evaluate = $evaluates -> select();
		$show = $Page -> show();
		$this -> assign('show',$show);
		$this -> assign('orders',$order);
		
		$this -> assign('evaluate',$evaluate);
		$this -> display();
	}
	//取消订单的列表
	public function cancel(){
		$model = M('order');
		//分页
		$count = $model -> where("orderStatus='0'") -> count();
		$Page = new \Think\Page($count,2);		
		$order = $model ->field('id,carType,carNumber,combo,lastPrice,vin,orderTime,orderDate,orderStatus,address,telephone,user')
						-> where("orderStatus='0'")
						-> order('orderStatus desc')
						-> limit($Page->firstRow.','.$Page->listRows)
						-> select();
		$count = 1;
		foreach($order as $k=>$v){
			//用空格分隔车型
			$types = explode(",",$v['carType']);
			//用,分隔套餐
			$arr = explode(',',$v['combo']);
			//车的品牌
			$brand = $types[0];
			//车系
			$series = $types[1];
			//车型
			$types = $types[2];
			//将查询出的所有套餐放到下标为combo的数组中
			$order[$k]["combo"] = $arr;
			$Ty = M('models');
			$type = $Ty -> field('id')
						-> where("brand='$brand' and series='$series' and types='$types'")
						-> select();
			//获取用户车型对应车型表中的id
			$typeId = $type[0]['id'];
			$num = 0;
			//遍历，查找出套餐对应的价格对应
			foreach($arr as $value){
				$combos = M('price');
				$combo = $combos -> field('lowPrice,highPrice')
								 -> where("typeId=$typeId and comboName='$value'")
								 -> select();
				//将价格与套餐连接在一起
				foreach($combo as $c){
					if(!empty($c['highPrice'])){
					 	$order[$k]["combo"][$num] = $value;
					 	//在定义一个数组，与套餐对应，当有最高价格时,值为1,否则为0
					 	$order[$k]["price"][$num] = $c['lowPrice'].'-'.$c['highPrice'];
					 	$order[$k]['interval'][$num] = 1;
					}else{
					 	$order[$k]["combo"][$num] = $value;
					 	$order[$k]["price"][$num] = $c['lowPrice'];
					 	$order[$k]['interval'][$num] = 0;
					}
				}				
				$num++;
				//定义编号
				$order[$k]['count'] = $count;
			}		
			$count++;		
		}
		$show = $Page -> show();
		$this -> assign('show',$show);
		$this -> assign('orders',$order);
		$this -> display();
	}

	//修改订单页面
	public function mod(){
		//得到要修改订单的id
		$id = I('get.id');
		$orders = M('order');
		//查询订单表中的一些数据
		$order = $orders	-> field('id,carType,combo,orderDate,orderTime,user,telephone,address')
						    -> where("id=$id")
						    -> select();
		$order[0]['combo'] = explode(",",$order[0]['combo']);
		//分隔数组中的carType,得到当前用户的品牌,车系,车型
		$carType = explode(",",$order[0]['carType']);
		//当前用户的车的品牌
		$brand = $carType[0];
		//当前用户的车系
		$series = $carType[1];
		//当前用户的车型
		$types = $carType[2];     
		//查询当前用户车型对应车型表中的id，并查询对应此车型的所有套餐及价格
		$models = M('models');
		$model = $models -> field('id')
						 -> where("brand='$brand' and series='$series' and types='$types'")
						 -> select();
		foreach($model as $v){	
			$typeId = $v['id'];
		}
		//查询车型id为$v['id']的所有套餐及价格
		$combos = M('price');
		$combo = $combos -> field('comboName,lowPrice,highPrice')
						 -> where("typeId=$typeId")
						 -> select();
		//将此车型对应的所有套餐
		$this -> assign('combos',$combo);
		//将订单的一些数据发送到模板
		$this -> assign('order',$order);
		// dump($order);die;
		$this -> display();
	}
	//更新订单
	public function updateOrder(){
		//分隔车型
		$carType = explode(",",$_POST['carType']);
		//车的品牌
		$brand = $carType[0];
		//车系
		$series = $carType[1];
		//车型
		$types = $carType[2];
		//从车型表中查找出对应的id
		$models = M('models');
		$model = $models -> field('id')
						 -> where("brand='$brand' and series='$series' and types='$types'")
						 -> select();
		$typeId = $model[0]['id'];
		foreach($_POST['combo'] as $v){
			$combos= M('price');
			//查询套餐对应的价格
			$combo = $combos -> field('id,lowPrice,highPrice')
							 -> where("typeId=$typeId and comboName='$v'")
							 -> select();
			foreach($combo as $v){
				//计算出每个套餐对应的低价格之和
				$lowPrice += $v['lowPrice'];
				//计算出每个套餐对应高价格之和
				$highPrice += $v['highPrice'];
			}
		}
		//判断高价格之和是否为空
		if(empty($highPrice)){
			$_POST['lastPrice'] = (string)$lowPrice;
		}else{
			$_POST['lastPrice'] = $lowPrice.'-'.$highPrice;
		}
		//将post接收过来的数组套餐连接成字符串
		$_POST['combo'] = implode(",",$_POST['combo']);
		$order = M('order');
		if($order -> create($_POST)){
			if($order -> save()){
                //将用户信息及操作等一些详细信息记录到Log文件中
                //Log::write("时间:".time().";用户名:".session('hname').";操作:订单修改;");
                writelog("info","用户名:".session('hname').";操作:修改订单信息;");
				$this -> success('修改成功',U('Order/index'));
			}else{
				$this -> error('修改失败','mod');
			}
		}else{
			$this -> error('失败','mod');
		}
	}
	//取消订单
	public function cancelOrder(){
		$id = I('get.id');
		$order = M('order');
		$data['id'] = $id;
		$data['orderStatus'] = '0';
		if($order -> create($data)){
			if($order -> save()){
                writelog("info","用户名:".session('hname').";操作:取消订单;");
				$this -> success('取消成功',U('Order/index'));
			}else{
				$this -> error('取消失败',U('Order/index'));
			}
		}else{
			$this -> error('失败',U('Order/index'));
		}
	}
	//删除订单
	public function del(){
		$id = I('get.id');
		$order = M('order');
		if($order -> delete($id)){
            writelog("info","用户名:".session('hname').";操作:删除订单;");
			$this -> success('删除成功',U('Order/cancel'));
		}else{
			$this -> error('删除失败',U('Order/cancel'));
		}
	}
	//更新订单状态(审核订单)
	public function pass(){
		//得到订单的id
		$data['id'] = $_GET['id'];
		//将其状态改已审核
		$data['orderStatus'] = '2';
		$orders = M('order');
		if($orders -> create($data)){
			if($orders -> save()){
                writelog("info","用户名:".session('hname').";操作:审核订单;");
				$this -> redirect('Order/index');
			}else{
				$this -> error('审核失败',U('Order/index'));
			}
		}else{
			$this -> error('失败',U('Order/index'));
		}
	}
	//修改订单总价格
	public function modLastPrice(){
		//通过ajax得到订单id和总价格
		$data['id'] = $_GET['id'];
		$data['lastPrice'] = $_GET['lastPrice'];
		$order = M('order');
		if($order -> create($data)){
			if($order -> save()){
                writelog("info","用户名:".session('hname').";操作:修改订单中的套餐价格;");
				echo '1';
			}else{
				echo 'error';
			}
		}else{
			echo 'error';
		}
	}
}
?>