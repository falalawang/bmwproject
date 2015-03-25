<?php
namespace Admin\Controller;
use Think\Controller;
class ComboController extends CommonController{

	//套餐列表
	public function comboList(){
		$combo = M('combo');
		$combos = $combo -> select();
		$this -> assign('combo',$combos);
		$this -> display();
	}

	//删除套餐
	public function delCombo(){
		//套餐的名字
		$name = $_GET['name'];
		//查看价格表是否有此套餐
		$price = M('price');
		$prices = $price -> where("comboName='{$name}'") -> select();
		//价格表中有此套餐
		if($prices){
			if($price -> where("comboName='{$name}'") -> delete()){
				$combo = M('combo');
				$combos = $combo -> where("name='{$name}'") -> delete();
				if($combos){
					$this -> success('删除成功');
				}else{
					$this -> error('删除失败');
				}
			}else{
				$this -> error('删除失败');
			}
		}else{//价格表中没有此套餐
			$combo = M('combo');
			$combos = $combo -> where("name='{$name}'") -> delete();
			if($combos){
				$this -> success('删除成功');
			}else{
				$this -> error('删除失败');
			}
		}	
	}

	//修改套餐
	public function modCombo(){
		$id = $_GET['id'];
		$combo = M('combo');
		$combos = $combo -> where("id={$id}") -> select();
		$this -> assign('combo',$combos);
		$this -> display();
	}

	//修改套餐操作
	public function updateCombo(){
		//修改的name、oldName和id
		$data = $_POST;
		$price = M('price');
		$prices = $price -> where("comboName='{$data['oldName']}'") -> select();
		if($prices){
			if($price -> create($data)){
				if($price -> where("comboName='{$data['oldName']}'") -> setField("comboName",$data['name'])){
					$combo = M('combo');
					if($combo -> create($data)){
						if($combo -> where("name='{$data['oldName']}'") -> save()){
							$this -> success('修改成功');
						}else{
							$this -> error('修改失败');
						}
					}else{
						$this -> error('修改失败');
					}
				}else{
					$this -> error('修改失败');
				}
			}else{
				$this -> error('创建失败');
			}			
		}else{
			$combo = M('combo');
			if($combo -> create($data)){
				if($combo -> where("name='{$data['oldName']}'") -> save()){
					$this -> success('修改成功');
				}else{
					$this -> error('内容无修改');
				}
			}else{
				$this -> error('修改失败');;
			}
		}
	}

	//增加套餐
	public function addCombo(){
		$this -> display();
	}

	//添加套餐的操作
	public function insertCombo(){
		$data = $_POST;
		$combo = M('combo');
		if($combo -> create($data)){
			if($combo -> add()){
				$this -> success('添加成功');
			}else{
				$this -> error('添加失败');
			}
		}else{
			$this -> error('添加失败');
		}
	}

	//价格列表
	public function priceList(){
		$data = M();
		$datas = $data -> table('xdl_price as p,xdl_models as m')
					   -> field("p.id,m.brand,m.series,m.types,p.comboName,p.lowPrice,p.highPrice")
		               -> where("p.typeId=m.id")
		               -> select();
		// dump($datas);die;
		$this -> assign('datas',$datas);
		$this -> display();
	}

	//修改价格
	public function modPrice(){
		$id = $_GET['id'];
		$res = M();
		$data = $res -> table('xdl_price,xdl_models') -> where("xdl_price.id={$id} and xdl_price.typeId=xdl_models.id") -> select();
		$this -> assign('data',$data);
		$this -> display();
	}

	//修改价格更新数据库
	public function updatePrice(){		
		$combo = M('price');
		$data = $_POST;
		if($combo -> create($data)){
			if($combo -> save()){
				$this -> success('修改成功',U('Combo/priceList'));
			}else{
				$this -> error('数据没有变更');
			}
		}else{
			$this -> error('修改失败');
		}
	}
	//添加价格
	public function addPrice(){
		$brand = M('brand');
		$brands = $brand -> select();
		$combo = M('combo');
		$combos = $combo -> select();
		$this -> assign('brands',$brands);
		$this -> assign('combos',$combos);
		$this -> display();
	}
	public function insertPrice(){
		$data = $_POST;
		
		//查询车型的ID
		$model = M('models');
		$models = $model -> where("series='{$data['series']}' and types='{$data['types']}'") -> select();
		$data['typeId'] = $models[0]['id'];
		//查询套餐的名字
		$combo = M('combo');
		$combos = $combo -> where("id={$data['combo']}") -> select();
		$data['comboName'] = $combos[0]['name'];
		//查询价格表，看是否有这条数据
		$price = M('price');
		$check = $price -> field('id') -> where("typeId={$data['typeId']} and comboName='{$data['comboName']}'") -> select();
		$arr['id'] = $check[0]['id'];
		$arr['lowPrice'] = $data['lowPrice'];
		$arr['highPrice'] = $data['highPrice'];
		// dump($check);exit();
		// dump($data);die;
		if($check){
			//如果价格表中存在，则修改
			if($price -> create($arr)){
				if($price -> save()){
					$this -> success('修改成功',U('Combo/priceList'));
				}else{
					$this -> error('内容无修改',U('Combo/priceList'));
				}
			}else{
				$this -> error('修改失败',U('Combo/priceList'));
			}

		}else{
			//如果价格表中不存在，则进行添加
			if($price -> create($data)){
				if($price -> add()){
					if($data['highPrice'] == 0){
						$data['highPrice'] == '';
					}
					$this -> success('添加价格成功');
				}else{
					$this -> error('添加失败');
				}
			}else{
				$this -> error('添加失败');
			}
		}
		
	}

	//查询指定品牌下的所有车系
	public function selectSerie(){
		$brand = $_GET['brand'];
		//查询品牌的ID
		$brandId = M('brand');
		$brandIds = $brandId -> where("brand='{$brand}'") -> select();
		//查询系列的ID、
		$series = M('series');
		$data = $series -> field('series') -> where("brandId={$brandIds[0]['id']}") -> select();
		$str = "<option value='-1'>--请选择车系--</option>";
		foreach($data as $k=>$value){			
			foreach($value as $v){
				$str .="<option value='$v'>$v</option>";
			}	
		}
		echo trim($str);
	}

	//查询指定品牌和车系下的车型
	public function selectType(){
		//获取品牌和系列
		$brand = $_GET['brand'];
		$serie = $_GET['series'];
		$model = M();
		$models = $model ->group("types") -> table("xdl_brand,xdl_series,xdl_models") -> where("xdl_models.brand='$brand' and xdl_models.series='$serie'") -> select();
		$str = "<option value='-1'>--请选择车型--</option>";
		foreach($models  as $v){	
			$str .="<option value=".$v['types'].">".$v['types']."</option>";
		}
		echo trim($str);
	}
}
?>