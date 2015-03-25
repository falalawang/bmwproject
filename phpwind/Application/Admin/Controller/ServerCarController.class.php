<?php
namespace Admin\Controller;
use Think\Controller;
class ServerCarController extends CommonController{

	//显示服务车列表
	public function storeCarList(){
		//查询4S店名，服务车名，技师名
		$data = M();
		//只需要查出店名，车编号，人的id
		$datas = $data -> field("xdl_store.storeName,xdl_server_car.mark,xdl_serviceman_car.servicemanId") -> table("xdl_store,xdl_server_car,xdl_serviceman_car") -> where("xdl_server_car.storeId=xdl_store.id and xdl_serviceman_car.carId=xdl_server_car.id") -> select();
		foreach($datas as $k => $v){
			$rid = explode(',',$v['servicemanId']);
			$datas[$k]['servicemanId'] = $rid;
		}

		$serviceman = M('serviceman');
		$servicemans = $serviceman -> select();
	//	dump($servicemans);exit();
		$this -> assign('data',$datas);
		$this -> assign('serviceman',$servicemans);
		$this -> display();
	}
    
	public function storeList(){
		$store = M('store');
		$stores = $store -> select();
		$this -> assign('store',$stores);
		$this -> display();
	}

	//添加4S店页面
	public function addStore(){
		$this -> display();
	}

	//验证4s店名
	public function storeCheck(){
		$name = $_GET['name'];
		//查询4s店数据表
		$stores = M('store');
		$store = $stores -> where("storeName='$name'")
						 -> select();
		if($store){
			echo 2;
		}else{
			echo 1;
		}
	}

	//添加4S店操作
	public function insertStore(){
		$data = $_POST;
		$store = M('store');
		if($store -> create($data)){
			if($store -> add()){
				$this -> success('添加成功','storeList');
			}else{
				$this -> error('添加失败');
			}
		}else{
			$this -> error('添加失败');
		}	
	}

	//修改4S店名称
	public function modStore(){
		$id = $_GET['id'];
		$store = M('store');
		$stores = $store -> where("id={$id}") -> select();
		$this -> assign('store',$stores);
		$this -> display();
	}

	//修改4S店操作
	public function updateStore(){
		$data = $_GET;
		$store = M('store');
		if($store -> create($data)){
			if($store -> save()){
				$this -> success('修改成功','storeList');
			}else{
				$this -> error('内容没有修改');
			}
		}else{
			$this -> error('修改失败');
		}
	}

	//删除4S店
	public function delStore(){
		//4S店id
		$id = $_GET['id'];				
		$serverCar = M('server_car');
        $store = M('store');
        //删除4s店名
		$stores = $store -> delete($id);
		if($stores){
            //查询服务车id
            $serverCars = $serverCar -> where("storeId={$id}") -> select();          
            $serverCarId = $serverCars[0]['id'];
            //查询服务车与技师关联表
            $serviceman_car = M('serviceman_car');
            $carId = $serverCarId;
            $serviceman_car -> where("carId={$carId}") -> delete();
            $serverCars = $serverCar -> where("storeId={$id}") -> delete();
            writelog("info","用户名:".session('hname').";操作:删除4s店;");
			$this -> success('删除成功');
		}else{
			$this -> error('删除失败');
		}
	}

	//服务车列表
	public function serverCarList(){
		$serverCar = M('server_car');
		$serverCars = $serverCar -> select();
		$this -> assign('serverCar',$serverCars);
		$this -> display();
	}

	//添加服务车信息
	public function addServerCar(){
		$store = M('store');
		$stores = $store -> select();
		$this -> assign('store',$stores);
		$this -> display();
	}

	//添加服务车操作
	public function insertServerCar(){
		$data = $_POST;
		$data['storeId'] = $data['store'];
		$serverCar = M('serverCar');
		if($serverCar -> create($data)){
			if($serverCar -> add()){
				$this -> success('添加服务车成功','serverCarList');
			}else{
				$this -> error('添加服务车失败');
			}
		}else{
			$this -> error('添加服务车失败');
		}
	}

	//修改服务车列表
	public function modServerCar(){
		$id = $_GET['id'];
		$serverCar = M('server_car');
		$serverCars = $serverCar -> select($id);
		$this -> assign('serverCar',$serverCars);
		$this -> display();
	}

	//修改服务车操作
	public function updateServerCar(){
		$serverCar = M('server_car');
		if($serverCar -> create()){
			if($serverCar -> save()){
				$this -> success('修改成功');
			}else{
				$this -> error('数据没有变化');
			}
		}else{
			$this -> error('修改失败');
		}
	}

	//删除服务车列表
	public function delServerCar(){
		$id = $_GET['id'];
		$serverCar = M('server_car');
		if($serverCar -> delete($id)){
			$this -> success('删除成功');
		}else{
			$this -> error('删除失败');
		}
	}

	//ajax请求，判断车编号是否存在
	public function check(){
		$carNum = $_GET['mark'];
		$serverCar = M('server_car');
		$serverCars = $serverCar -> where("mark='$carNum'") -> select();
		if($serverCars){
			echo 1;
		}else{
			echo 2;
		}
	}

	//ajax,判断技师名是否存在
	public function checkName(){
		$serviceman = M('serviceman');
		$servicemans = $serviceman -> where("name='{$_GET['name']}'") -> select();
		if($servicemans){
			echo '1';
		}else{
			echo '2';
		}
	}


	//选择技师
	public function selectServiceman(){
		//查出服务车的编号
		$serverCar = M('server_car');
		$serverCars = $serverCar -> select();
		//查询出已分配好的技师的id
		$serviceman_cars = M('serviceman_car');
		$serviceman_car = $serviceman_cars -> field("servicemanId")
										   -> select();
		foreach($serviceman_car as $key => $value){
			$arr[] = explode(",",$value['servicemanId']);
		}
		foreach($arr as $key => $value){
			foreach($value as $v){
				$array[] = $v;
			}
		}
		//$arr 为已分配了的技师
		//查询出没有被禁用的所有的技师
		$servicemans = M('serviceman');
		$serviceman = $servicemans -> field("id,name")
								   -> where("status='0'")
								   -> select();
		$this -> assign('serverCar',$serverCars);
		$this -> assign('serviceman',$array);
		$this -> assign('allServiceman',$serviceman);
		$this -> display();
	}

	//添加技师
	public function addServiceman(){
		$this -> display();
	}

	//添加技师
	public function insertServiceman(){
		//把接收的密码进行md5加密
		$_POST['password'] = md5($_POST['password']);
		$data = $_POST;
		//创建数据对象
		$serviceman = M('serviceman');
		if($serviceman -> create($data)){
			$servicemans = $serviceman -> add();
			if($servicemans){
				$this -> success('添加成功');
			}else{
				$this -> error('添加失败');
			}
		}else{
			$this -> error('创建失败');
		}		
	}


	//选择技师的操作
	public function insert(){
		//得到服务车的编号
		$carId = $_POST['carId'];
		// dump($carId);die;
		//查询服务车与技师的关联表,是否为该辆车已分配技师,若已分配，查询出已分配的技师
		$serviceman_cars = M('serviceman_car');
		$serviceman_car = $serviceman_cars -> where("carId=$carId")
										   -> select();

		//已分配的技师
		$servicemanId = $serviceman_car[0]['servicemanId'];

		$data['carId'] = $_POST['carId'];
		//如果原先没有为这辆车分配技师,则直接赋值
		if(empty($servicemanId)){
			$servicemanId = implode(',',$_POST['servicemanId']);
		}else{
			//将原来的技师和现在分配的技师连接起来
			$servicemanId .= ",".implode(',',$_POST['servicemanId']);
		}
		
		$data['servicemanId'] = $servicemanId;

		//若已分配,则只能更新原数据,
		if($serviceman_car){
			if($serviceman_cars -> create($data)){
				if($serviceman_cars -> where("carId=$carId") -> save()){
					$this -> success('添加成功');
				}else{
					$this -> error('添加失败');
				}
			}else{
				$this -> error('添加失败');
			}
		//若没分配,则添加新数据
		}else{
			if($serviceman_cars -> create($data)){
				if($serviceman_cars -> add()){
					$this -> success('添加成功');
				}else{
					$this -> error('添加失败');
				}
			}else{
				$this -> error('添加失败');
			}
		}
	}
	//技师列表
	public function servicemanList(){
		$serviceman = M('serviceman');
		$servicemans = $serviceman -> select();
		$this -> assign('serviceman',$servicemans);
		$this -> display();
	}

	//修改信息
	public function mod(){
		$id = $_GET['id'];
		$serviceman = M('serviceman');
		$servicemans = $serviceman -> where("id={$id}") -> select();
		$this -> assign('serviceman',$servicemans);
		$this -> display();
	}
	public function doMod(){
		$_POST['password'] = md5($_POST['password']);
		$data = $_POST;
		$data['id'] = $_GET['id'];
		$serviceman = M('serviceman');
		if($serviceman -> create($data)){
			if($serviceman -> save()){
				$this -> success('修改密码成功',U('ServerCar/servicemanList'));
			}else{
				$this -> error('修改失败');
			}
		}else{
			$this -> error('创建失败');
		}
	}
	public function able(){
		//获取要禁用或者开启的用户的ID
		$id = $_GET['id'];
		$serviceman = M('serviceman');
		$servicemans = $serviceman -> field("status") -> where("id={$id}") -> select();
		//改变状态值
		if($servicemans[0]['status'] == '0'){
			$servicemans[0]['status'] = '1';
		}else{
			$servicemans[0]['status'] = '0';
		}
		$servicemans[0]['id'] = $id;
		if($serviceman -> create($servicemans[0])){
			if($serviceman -> save()){
				if($servicemans[0]['status'] == '1'){
					$this -> redirect('servicemanList');
				}else{
					$this -> redirect('servicemanList');
				}
			}else{
				$this -> error('操作失败');
			}
		}else{
			$this -> error('操作失败');
		}
	}
}
?>