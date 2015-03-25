<?php
	namespace Admin\Controller;
	use	Think\Controller;
	class OrderController extends CommonController{
		public function orderList(){
			$search = I('post.search');
			$mad =empty($search) ? '': "and (phone like '%{$search}%' or LPN like'%{$search}%')";
			$order = M('order');
			
			$count = $order ->where("status != '已取消'")-> count();
			$Page       = new \Think\Page($count,2);
			$show       = $Page->show();
			
			$data = $order -> where("status != '已取消' {$mad}")->limit($Page->firstRow.','.$Page->listRows) -> select();
			$this -> assign('pag',$count);
			$this -> assign('orders',$data);
			$this -> assign('show',$show);
			$this -> display();
		}
		public function orderRecyclebin(){
			$order = M('order');
			$count = $order ->where('status = "已取消"')-> count();
			$Page       = new \Think\Page($count,1);
			$show       = $Page->show();
			
			$data = $order -> where('status = "已取消"')->limit($Page->firstRow.','.$Page->listRows) -> select();
			$this -> assign('pag',$count);
			$this -> assign('orders',$data);
			$this -> assign('show',$show);
			$this -> display();
		}
		public function deletea(){
			$id = I('get.id');
			$data['status'] = '已取消';
			$log = M('log');
			$dat['username'] = $_SESSION['username'];
			$dat['log'] = "{$dat['username']}在订单表里把id为{$id}的数据加入回收站了";
			if($log -> create($dat)){//创建对象,有一个参数，可选，参数为提交的数据
				$res = $log -> add();//自动从创建的对象中寻找成员属性date，并插入数据
				if($res){//$res 成功便得到影响行数
					//$this -> success('OK');//success()有两个参数，只写第一个参数就是从哪里提交就跳转哪去，第二个参数就是跳转地址
				}else{
					$this -> error('失败');
				}
			}else{
				$this -> error('失败');
			}
			$data['id'] = $id;
			$order = M('order');
			if($order->create($data)){
				if($order->save()){
					$this->success('ok');
				}else{
					$this->error('失败');
				}
			}
		}
		public function updatea(){
			$id = I('get.id');
			$data['id'] = $id;
			$order = M('order');
			$date['year'] = date('Y',time());
			$date['month'] = date('m',time());
			$date['day'] = time();
			$date['endday'] =time() + (6*24*60*60);
			$date['startday'] = date('d',time());
			$this->assign('date',$date);
			$data = $order -> where("id = '{$id}'") -> select();
			$this->assign('orders',$data);
			

			$log = M('log');
			$dat['username'] = $_SESSION['username'];
			$dat['log'] = "{$dat['username']}在订单表里把id为{$id}的数据加入回收站了";
			if($log -> create($dat)){//创建对象,有一个参数，可选，参数为提交的数据
				$res = $log -> add();//自动从创建的对象中寻找成员属性date，并插入数据
				if($res){//$res 成功便得到影响行数
					//$this -> success('OK');//success()有两个参数，只写第一个参数就是从哪里提交就跳转哪去，第二个参数就是跳转地址
				}else{
					$this -> error('失败');
				}
			}else{
				$this -> error('失败');
			}
			$this->display();
		}
		public function updatec(){
			$data['id'] = I('post.id'); 
			$log = M('log');
			$dat['username'] = $_SESSION['username'];
			$dat['log'] = "{$dat['username']}把id为{$data['id']}的";
			if($_POST['date'] != $_POST['odt']){
				$dat['log'] .= "保养日期从{$_POST['date']}更改成{$_POST['odt']}了";
			}
			if($_POST['keep_time'] != $_POST['okt']){
				$dat['log'] .= "保养时间从{$_POST['keep_time']}更改成{$_POST['okt']}了";
			}
			if($_POST['sid'] != $_POST['osid']){
				$dat['log'] .= "服务车从{$_POST['sid']}更改成{$_POST['osid']}了";
			}
			if($_POST['price'] != $_POST['oprice']){
				$dat['log'] .= "保养总价从{$_POST['price']}更改成{$_POST['oprice']}了";
			}
			if($_POST['status'] != $_POST['ostatus']){
				$dat['log'] .= "保养状态从{$_POST['status']}更改成{$_POST['ostatus']}了";
			}
			if($log -> create($dat)){//创建对象,有一个参数，可选，参数为提交的数据
				$res = $log -> add();//自动从创建的对象中寻找成员属性date，并插入数据
				if($res){//$res 成功便得到影响行数
					//$this -> success('OK',U('Order/orderList'));//success()有两个参数，只写第一个参数就是从哪里提交就跳转哪去，第二个参数就是跳转地址
				}else{
					$this -> error('失败la ');
				}
			}else{
				$this -> error('失败');
			}
			$order = M('order');
			$data['date'] = I('post.date');
			$data['status'] = I('post.status');
			$data['keep_time'] = I('post.keep_time');
			$data['sid'] = I('post.sid');
			$data['price'] = I('post.price');
			if($order->create($data)){
				if($order->save()){
					$this->success('ok',U('Order/orderList'));
				}else{
					$this->error('error');
				}
			}
		}
		public function updateb(){
			$id = I('get.id');
			$data['status'] = '已提交';
			$data['id'] = $id;
			$order = M('order');
			if($order->create($data)){
				if($order->save()){
					$this->success('ok');
				}else{
					$this->error('失败');
				}
			}
		}
		public function deleteb(){
			$id = I('get.id');
			$log = M('log');
			$dat['username'] = $_SESSION['username'];
			$dat['log'] = "{$dat['username']}在订单表里把id为{$id}的数据彻底删除了";
			if($log -> create($dat)){//创建对象,有一个参数，可选，参数为提交的数据
				$res = $log -> add();//自动从创建的对象中寻找成员属性date，并插入数据
				if($res){//$res 成功便得到影响行数
					//$this -> success('OK');//success()有两个参数，只写第一个参数就是从哪里提交就跳转哪去，第二个参数就是跳转地址
				}else{
					$this -> error('失败');
				}
			}else{
				$this -> error('失败');
			}
			$order = M('order');
			if($order->delete($id)){
				$this->success('ok');
			}else{
				$this->error('error');
			}
		}
		public function four(){
			$a = empty($_GET) ? '' : $_GET['dto'];
			$ser = M('servicecar');
			$da['a'] = $ser -> where("concat(date,time) = '{$a}'") -> count();

			
			$b = empty($_GET) ? '' : $_GET['dtt'];
			$ser = M('servicecar');
			$da['b'] = $ser -> where("concat(date,time) = '{$b}'") -> count();
			
			$c = empty($_GET) ? '' : $_GET['dts'];
			$ser = M('servicecar');
			$da['c'] = $ser -> where("concat(date,time) = '{$c}'") -> count();
			
			$d = empty($_GET) ? '' : $_GET['dtf'];
			$ser = M('servicecar');
			$da['d'] = $ser -> where("concat(date,time) = '{$d}'") -> count();
			
			echo json_encode($da);
		}
	}
?>