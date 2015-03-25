<?php
namespace Home\Controller;
use Think\Controller;

class ManageController extends Controller{
	public function carTypeManage(){
		$models = M("models");			//得到车型表对象
		$Types = $models -> select();	//查询所有的车型号
		foreach ($Types as $key => $value) {//遍历所有型号,并将其拼接成结构化的数据
			$brand[$key]=$value['brand'];			
			$series[$key]=$value['brand'].",".$value['series'];
			$types[$key]=$value['brand'].",".$value['series'].",".$value['types'];
		}		
		$brands=array_unique($brand);	//得到品牌表
		$serieses=array_unique($series);//得到所有品牌表对应的车系表
		$types=array_unique($types);	//得到所有车系对应的车型表
		foreach ($serieses as $key=> $value) {//将车系表的品牌和车系信息分两个字段存起来,方便模版中使用
			$serieses[$key]=explode(",", $value);
		}
		foreach ($types as $key=> $value) {//将车型表的品牌,车系和车型信息分三个字段存起来.方便模版中使用
			$types[$key]=explode(",", $value);	
		}
		$this->assign('brands',$brands);	//分配变量
		$this->assign('serieses',$serieses);
		$this->assign('types',$types);
		$this -> display();
	}

	//用户在车型选择页面填选的信息通过ajax传来,将其存到session里
	public function addCarType(){			
		$models=M("models");
		$userModels=M("user_model");
		$map['brand']=$_GET['brand']; 
		$map['series']=$_GET['series']; 
		$map['types']=$_GET['type'];
		$model=$models->where($map)->find();
		if(session('uid')){
			$where['uid']=session('uid');					//如果session里存在uid
			$res=$userModels->where($where)->select();	//查询已有的用户车型
			foreach ($res as $value) {					//判断是否有相同的
				if($value['typeId'] != $model['id']){
					$noSame=1;
				}else{
					$noSame=0;break;
				}					
			}
			if($noSame){							//跟已有的车型不同则加进session
				session('typeId',$model['id']);
				session('brand',$_GET['brand']);
				session('series',$_GET['series']);
				session('type',$_GET['type']);
			}else{
				echo "您选的车型已经存在,请核查再选择!";
			}
		}else{										//如果session里不存在uid,存进session里
			session('typeId',$model['id']);
			session('brand',$_GET['brand']);
			session('series',$_GET['series']);
			session('type',$_GET['type']);
		}
				
	}

	public function addressManage(){
		$city=M("city");	//得到地区表对象
		$c=$city->select();	//查询所有地区信息
		
		foreach ($c as $key=> $value) {//遍历所有地区,并将其拼接成结构化的数据
			$provinces[$key]=$value['province'];
			$citys[$key]=$value['province'].",".$value['city'];
			$countys[$key]=$value['city'].",".$value['county'];
		}
		$provinces=array_unique($provinces);//得到省表
		$ccitys=array_unique($citys);		//得到市表
		$ccountys=array_unique($countys);	//得到区表
		
		foreach ($ccitys as $key=> $value) {//将市表的省信息和市信息分成两个字段存起来,方便模版中使用
			$ccitys[$key]=explode(",", $value);			
		}
		foreach ($ccountys as $key=> $value) {//将区表的市信息和区信息分成两个字段存起来,方便模版中使用
			$ccountys[$key]=explode(",", $value);			
		}
		$this->assign("provinces",$provinces);//分配变量
		$this->assign("citys",$ccitys);
		$this->assign("countys",$ccountys);
		$this->display();
	}

	//用户在地址选择页面填选的信息通过ajax传来,将其存到session里
	public function addAddress(){
		$userAddresses=M("user_address");
		$city=$_GET['province']." ".$_GET['city']." ".$_GET['county'];
		$street=trim($_GET['street']);
		if(session('uid')){
			$map['uid']=session('uid');					//如果session里存在uid
			$res=$userAddresses->where($map)->select();	//查询已有的用户地址
			foreach ($res as $value) {					//判断是否有相同的
				if($city != $value['city'] || $street != $value['street']){
					$noSame=1;
				}else{
					$noSame=0;break;
				}					
			}
			if($noSame){							//跟已有的地址不同则加进session
				session('city',$city);
				session('street',$street);
			}else{
				echo "您填写的地址已经存在,请核查再填写!";
			}
		}else{									//如果session里不存在uid,存进session里
			session('city',$city);
			session('street',$street);
		}
	}

}	
?>