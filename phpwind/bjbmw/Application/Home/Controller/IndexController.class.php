<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {	
    public function index(){
       	$configs = $this->config();
    	$this->assign("config",$configs);
		$this->display();
    }
    public function index2(){
    	$configs = $this->config();
    	$this->assign("config",$configs);
    	$this -> display();
    }
	public function order(){
		$configs = $this->config();
    	$this->assign("config",$configs);
		$tel = $_SESSION['tels'];
		$this -> assign('tel',$tel);
		$this->display('order');
	}
	public function city_name(){
		$model=M('city');
		$city=$model->distinct(true)->field('city')->select();
		$str='';
		$str='<option>选择城市</option>';
		dump($city);
		foreach ($city as $k1 => $v1){
			foreach($v1 as $k2 =>$v2){
				$str.="<option value=".$v2.">".$v2."</option>";
			}
		}
		echo $str;
	}
	public function brand(){
		$model=M('brand');
		$brandid=$model->distinct(true)->field('brand')->select();
		$brandid=$brandid;
		$str = '';
		$str = '<option>选择车牌</option>';
		foreach ($brandid as $k1 => $v1){
			foreach ($v1 as $k2 => $v2){
				$str.="<option>".$v2."</option>";
			}
		}
		echo $str;
	}
	
	public function series(){
		$map['b.brand']=I('post.brandname');
		$series=M()->table(array('bmw_brand'=>'b','bmw_series'=>'s'))->where("b.id=s.brandid")->where($map)->select();
		$str='';
		$str='<option>选择车系</option>';
		foreach($series as $k1 => $v1){
			$str.='<option>'.$v1['series'].'</option>';
		}
		echo $str;
	}
	
	public function model(){
		$map['b.brand']=I('post.brandname');
		$map['s.series']=I('post.seriesname');
		$list=M()->table(array('bmw_brand'=>'b','bmw_series'=>'s','bmw_model'=>'m'))->where("b.id=m.brandid AND s.id=m.seriesid")->where($map)->select();
		//dump($list);
		$str='';
		$str.="<option>选择车型</option>";
		foreach($list as $k1 => $v1){
				$str.='<option>'.$v1['model'].'</option>';
		}
		echo $str;
	}
	
	//lws点选服务项目后 下面直接生成价格
	public function serprice(){
		$brand = $_POST['brand'];
		$series = $_POST['series'];
		$model = $_POST['model'];


		//用逗号分隔  去掉最后一个空格 得到所选的服务项
		$services = $_POST['services'];
		$array = explode(',',$services);
		array_pop($array);
		$str = implode(',',$array);
		
		$serprice = M('serprice');//实例化价格表
		$condition['series'] = $series;//组合查询条件
		$condition['model'] = $model;
		if($str && $model){
			$detail = $serprice -> field("$str") -> where($condition) ->find();//得到选择服务的价格

			//dump($detail);

			$low = '';
			$high = '';
			$tolprice = '';//用来记录最终的价格区间
			//如果存在高低价  获得高价跟 低价
			foreach($detail as $values){
				//dump($values);
				if(strrchr($values,'/')){
					$pri = explode('/',$values);
					$lprice = array_shift($pri);
					$hprice = array_pop($pri);
					$low += $lprice;
					$high += $hprice;
				}else{
					$low += $values;
					$high += $values;
				}

				//客户选择的服务价格确定的时候 
				if($low == $high){
					$tolprice = $low ;
				//客户选择的服务价格是一个区间的时候 
				}else{
					$tolprice = $low.'-'.$high;
				}
			
			}
		}elseif(!$model){
			$tolprice = '请选择车型！';
		}else{
			$tolprice = '0';
		}
		
		echo $tolprice;
	}
	//lws服务价格管理功能
	
	
	
	public function check_login(){
		$verify = $_POST['code'];
		$tel = $_POST['tel'];
		if($verify==$_SESSION['vCode']&& $tel==$_SESSION['tel'] &&(!empty($verify))){
			session("tels",md5($_SESSION['tel']));

			echo 1;
			} else {
				session(null);
			echo 0;
			
		}
	}
	
	//显示客户已有的手机号
	public function address(){
		$client = M('client');
		$msg = $client -> where("tel='{$_POST['tel']}'") -> find();
		$tmp = '';
		$str = '';
		if($msg){
			if($msg['address1']){$tmp['address1'] = $msg['address1'];}
			if($msg['address2']){$tmp['address2'] = $msg['address2'];}
			if($msg['address3']){$tmp['address3'] = $msg['address3'];}
			foreach ($tmp as $key => $value) {
				$str .= "<div class='radio'>
						  	<label>
						    <input type='radio' name='address' id='optionsRadios1' value='$value'>
						   	$value
							</label>
							<button value='$key' onclick='del(this)' type='button'>删除</button>
						</div>";
			}
			echo $str;
		}else{
			echo '请添加地址';
		}
	}

	//添加常用地址
	public function add(){
		$client = M('client');
		$msg = $client -> where("tel='{$_POST['tel']}'") -> find();
		$tmp = '';
		$str = '';
		$data['cid'] = $msg['cid'];
		if($msg){
			if($msg['address1'] && $msg['address2'] && $msg['address3']){
				echo '常用地址只能添加3个';
			}else{
				if($msg['address1']){
					$tmp['address1'] = $msg['address1'];

					if($msg['address2']){
						$tmp['address2'] = $msg['address2'];

						if($msg['address3']){
							$tmp['address3'] = $msg['address3'];
						}else{
							$tmp['address3'] = $_POST['address'];
							$data['address3'] = $_POST['address'];
							$client -> create($data);
							$client -> save();
						}
					}else{
						$tmp['address2'] = $_POST['address'];
						$data['address2'] = $_POST['address'];
						$client -> create($data);
						$client -> save();
						
					}
				}else{
					$tmp['address1'] = $_POST['address'];
					$data['address1'] = $_POST['address'];
					$client -> create($data);
					$client -> save();
					
				}
				
				
			}	
			
			foreach ($tmp as $key => $value) {
			$str .= "<div class='radio'>
					  	<label>
					    <input type='radio' name='address' id='optionsRadios1' value='$value'>
					   	$value
						</label>
						<button value='$key' onclick='del(this)' type='button'>删除</button>
					</div>";
			}
			echo $str;
			
		}else{
			$str = "<div class='radio'>
						  	<label>
						    <input type='radio' name='address' id='optionsRadios1' checked value='".$_POST['address']."' >
						   	".$_POST['address']."
							</label>
						</div>";
			echo $str;
		}
	}

	// 删除常用地址
	public function del(){
		$client = M('client');
		$msg = $client -> where("tel='{$_POST['tel']}'") -> find();
		$data['cid'] = $msg['cid'];
		$data[$_POST['filed']] = '';
		$client -> create($data);
		$client -> save();
		$address = $client -> find($data['cid']);
		$tmp = '';
		if($address['address1']){$tmp['address1'] = $address['address1'];}
		if($address['address2']){$tmp['address2'] = $address['address2'];}
		if($address['address3']){$tmp['address3'] = $address['address3'];}
		$str = '';
		foreach ($tmp as $key => $value) {
			$str .= "<div class='radio'>
					  	<label>
					    <input type='radio' name='address' id='optionsRadios1' value='$value'>
					   	$value
						</label>
						<button value='$key' onclick='del(this)' type='button'>删除</button>
					</div>";
			}
			echo $str;
	}

	//判断session
	public function getsession(){
		if($_POST['code'] != $_SESSION['vCode'] || $_POST['tel'] != $_SESSION['tel']){
			echo 1;
		}else{
			echo 0;
		}
	}
	// 完成表单
	public function addorder(){

		$client = M('client');
		$result = $client -> where("tel='{$_POST['tel']}'") -> find();
		if(!$result){
			$data['tel'] = $_POST['tel'];
			$data['address1'] = $_POST['address'];
			$data['clientname'] = $_POST['clientname'];
			$client -> create($data);
			$client -> add();
		}
		$str = $_POST['services'];
		$newstr = substr($str,0,strrpos($str,','));
		$tmp = explode(',',$newstr);
		$sercode = M('sercode');
		foreach ($tmp as $key => $value) {
			$arr[] = $sercode -> where("sercode='{$tmp[$key]}'") -> find();
			$id[] = $arr[$key]['id'];
		}
		$services = implode(',',$id);
		$_POST['services'] = $services;
		$_POST['carid'] = 1;
		$_POST['city'] = '北京';
		$_POST['status'] = 1;
		$order = M('order');
		$order -> create();
		$id = $order -> add();
		$num = M('order');
		$msg['ordernumber'] = time().$id;
		$msg['id'] = $id;
		$num -> create($msg);
		if($num -> save()){
			session('tels',md5($_POST['tel']));
			session('tel',$_POST['tel']);			
			$this -> redirect('index/complete',0);
		}
	}

	public function issession(){
		if($_SESSION['tels']){
			echo 0;
		}else{
			echo 1;
		}
	}
	public function complete(){
		$configs = $this->config();
    	$this->assign("config",$configs);
		$this -> display();
	}
	public function gettel(){
		echo $_SESSION['tel'];
	}
		public function config(){

		$config= M("config");
    	$configs = $config->find();
    	return $configs;

	}

}