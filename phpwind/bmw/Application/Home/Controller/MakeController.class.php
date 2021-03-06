<?php
	namespace Home\Controller;
	use Think\Controller;
	use Think\Area;
	class MakeController extends Controller{
		public function index(){
			$brand = M('brand');
			$dato = $brand -> select();
			$this -> assign('brands',$dato); 
			$this -> display();
		}
		public function serie(){
			$series = M('series');

			$bid = empty($_GET['id']) ? '' : I('GET.id');

			$datt = $series -> where("bid = $bid") -> select();
			$str = '';
			$str .= "<option value='请选择车型'>请选择车型</option>";
			foreach($datt as $key =>$value){
				$str .= "<option value='{$value['id']}'>{$value['series']}</option>";
			}
			echo $str;
		}
		public function model(){
			$models = M('models');
			$bid = empty($_GET['id']) ? '' : I('GET.id');
			$datm = $models -> where("sid = $bid") -> select();
			$str = '';
			$str .= "<option value='请选择车系'>请选择车系</option>";
			foreach($datm as $key =>$value){
				$str .= "<option value='{$value['id']}'>{$value['model']}</option>";
			}
			echo $str;
		}
		public function two(){
			$data['brand'] = I('post.brand');
			$brand = M('brand');
			$da = $brand->where("id = {$data['brand']}")->find();

			$data['series']= I('post.series');
			$serie = M('series');
			$db = $serie->where("id = {$data['series']}")->find();

			$data['models']= I('post.models');
			$model = M('models');
			$dc = $model->where("id = {$data['models']}")->find();

			$price = M('price');
			$map['brand'] = $da['brands'];
			$map['series'] = trim($db['series']);
			$map['models'] = trim($dc['model']);
			$this->assign('zhi',$map);
			$dab = $price -> where($map)->select();

			$this->assign('prices',$dab);
			$this->display();
		}
		public function three(){
			//dump($_POST);die;
			foreach($_POST['pric'] as $value){
				$vals .=$value.'/';
			}
			$data['combo'] = trim($vals,'/');
			$data['brand'] = I('post.brand');
			$data['series']= I('post.series');
			$data['models']= I('post.models');
			$data['price'] = I('post.price');
			$this->assign('zhi',$data);
			$this -> assign("city",Area::city(array("省","市","县")));
			$this->display();
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

		public function look(){
			//dump($_SESSION['phone']);
			$data['brand'] = I('post.brand');
			$data['combo'] = I('post.combo');
			$data['series']= I('post.series');
			$data['models']= I('post.models');
			$data['date'] = I('post.date');
			$data['keep_time'] = I('post.keep_time');
			$data['price'] = I('post.price');
			$data['LPN'] = I('post.LPN');
			$data['vin'] = I('post.vin');
			$data['city'] = I('post.city');
			$data['county'] = I('post.county');
			$data['address'] = I('post.address');
			$data['texts'] = I('post.texts');
			$data['combo']=I('post.combo');
			$this->assign('value',$data);
			$this->display();
		}
		public function add(){
			$data['brand'] = I('post.brand');
			$data['series']= I('post.series');
			$data['combo']= I('post.combo');
			$data['models']= I('post.models');
			$data['date'] = I('post.date');
			$data['keep_time'] = I('post.keep_time');
			$data['ctime'] = date('Y-m-d H:i:s',time());
			$data['price'] = I('post.price');
			$data['phone'] = $_SESSION['phone'];
			$data['LPN'] = I('post.LPN');
			$data['vin'] = I('post.vin');
			$data['texts'] = I('post.texts');
			
			$datc['phone'] = $_SESSION['phone'];
			$datc['combo'] = I('post.combo');
			$datc['city'] = I('post.city');
			$datc['county'] = I('post.county');
			$datc['address'] = I('post.address');
			
			$datb['phone'] = $_SESSION['phone'];
			$datb['date'] = I('post.date');
			$datb['time'] = I('post.keep_time');
			
			$order = M('order');
			if($order->create($data)){
				$res = $order ->add();
				if(!$res){
					$this -> error('失败啦');
				}
			}
			
			$sss = M('servicecar');
			if($sss->create($datb)){
				$res = $sss ->add();
				if(!$res){
					$this -> error('失败啦');
				}
			}
			$address = M('address');
			if($address->create($datc)){
				$res = $address ->add();
				if($res){
					$this -> success('OK',U('Index/index'));
				}else{
					$this -> error('失败');
				}
			}
		}
		
	}	
?>