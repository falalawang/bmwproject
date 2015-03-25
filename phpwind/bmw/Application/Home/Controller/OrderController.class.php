<?php

namespace Home\Controller;

use Think\Controller;

use Home\Controller\CommonController;

class OrderController extends CommonController{

	
  public function order(){

  		$phone = session('phone');

    	$res = M('order');

    	$result = $res ->field('status,combo,brand,series,models,ctime,price,id')->where("phone=$phone")->order('id desc')->select();

		$this -> assign('result',$result);

		$this -> display();	

	

	
	}

	public function popular(){

		$id = $_GET['id'];

		$this -> assign('id',$id);

		$this -> display();
	}	

	public function dopopular(){

		$res = M('order');

		
		$arr['status'] ='已评价';


		$arr['evaluate'] =$_GET['evaluate'];
		
		$id = $_GET['id'];
		

		$star = $_GET['star'];

		if($star == 0){

			$arr['star'] ='无评价';	

		}elseif($star==1){

			$arr['star'] ='非常差';
		}elseif($star==2){

			$arr['star'] ='一般';

		}elseif($star==3){
				
			$arr['star'] ='有待提高';
		}elseif($star==4){
				
			$arr['star'] ='满意';

		}elseif($star==5){
				
			$arr['star'] ='非常满意';
		}
		
		if($res ->where("id=$id")->save($arr)){

				
				echo 'ok';
			}

		

}

	public function signconre(){

		$res = M('order');

		
		$phone = session('phone');

		$result = $res ->where("phone=$phone")->field('brand,message,series,combo,models,keep_time,LPN,vin,price,phone')->select();

		
		$this -> assign('res',$result);

		$att = M('address');

		$attrs = $att ->field('city,county,address')->where("phone=$phone")->select();

		
		$this -> assign('att',$attrs);

		
		$arr['brand'] = $result[0]['brand'];
		$arr['series'] = $result[0]['series'];
		$arr['models'] = $result[0]['models'];

		$pri = M('price');

		$resu = $pri ->field('id,combo,low_price,high_price')->where($arr)->select();

		
		$this -> assign('resu',$resu);

		$this -> display();

	}

	public function dosignconre(){
	
		
		$brand=$_POST['brand'];
		$series=$_POST['series'];
		$models=$_POST['models'];
		$data=$_POST['combo'];
		$combo=implode('/',$data);
		foreach($data as $v){
			$price=M('price');

			$prices=$price->where("brand='$brand' and series='$series' and models='$models' and combo='{$v}'")->select();

			$suml='';
			foreach($prices as $a){

				$suml+=$a['low_price'];

				if($a['high_price']){

					$sum+=$a['high_price'];
				}else{
					$sum+=$a['low_price'];
				}

			}
		}

		$res = M('order');

		$time = time();

		$ctime = date("Y-m-d H:i:s",time()+60);

		$arr['ctime'] = $ctime;
		$arr['brand'] = $_POST['brand'];
		$arr['series'] = $_POST['series'];
		$arr['models'] = $_POST['models'];
		$arr['combo'] = $combo;

		if($sum){

			$arr['price'] = $suml."~".$sum;
		}else{

			$arr['price'] = $suml;
		}
		

		$arr['keep_time'] = $_POST['keep_time'];
		$arr['LPN'] = $_POST['LPN'];
		$arr['message'] = $_POST['message'];
		$arr['vin'] = $_POST['vin'];
		$arr['phone'] = $_POST['phone'];
		$arr['vin'] =$_POST['vin'];
		$arr['date'] =$_POST['date'];
		$arr['price'] = $_POST['price'];
		if($res -> create($arr)){

			if($res -> add()){

				$this ->success('下单成功','order');

			}else{

				echo 'on';
			}


		}else{


			$this -> error('创建数据对象失败');

		}


	}
	public function arr(){
		
		$value = $_GET['value'];
		
		$arr = explode(',',$value);
		
		echo json_encode($arr);
		
		
	}

	public function outlogin(){

		session(null);

		$this -> success('退出成功',U('index/index'));

	}



}