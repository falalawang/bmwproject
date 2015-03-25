<?PHP

namespace Home\Controller;

use Think\Controller;

use Think\Area;

use Home\Controller\CommonController;

class SettingsController extends CommonController{

	public function setting(){

		$res = M('user_detail');

		$phone = session('phone');


		$result = $res ->where("phone=$phone")->select();

		
		$this -> assign('result',$result);

		$this -> assign("city",Area::city(array("省","市","县")));

		

		$str = M('address');

		$rest = $str ->where("phone=$phone")->select();


			
		$this -> assign('rest',$rest);



		$this -> display();

	}

	public function add(){

		$phone = session('phone');
		$arr['status']='1';
		$arr['phone'] = $phone;
		$arr['city'] = $_POST['province'];
		$arr['county'] = $_POST['city'];	
		$arr['address'] = $_POST['county'];
		$arr['details'] = $_POST['details'];
		//$arr['phone'] = $

		$res = M('address');


		if($res -> create($arr)){



			if($res -> add()){

				$this -> success('添加成功');
			}else{

				$this -> error('添加失败');
			}

		}else{

			$this -> error('创建数据对象失败');
		}

	}


	public function delete(){

		$id = $_GET['id'];

		$res = M('address');

		if($res ->delete($id)){

			$this -> success('删除成功');
		}else{

			$this -> error('删除失败');
		}


	}

	public function def(){

		

		$id = $_GET['id'];

		$arr['status'] = '0';
		
		$res = M('address');

		$arre['status']='1';


		if($res->where("status='0'")->save($arre)){
		
		if($res ->where("id=$id")->save($arr)){


			$this -> success('设置成功');

		}else{

			$this -> error('设置失败');
		}
	}else{



		if($res ->where("id=$id")->save($arr)){


			$this -> success('设置成功');

		}else{

			$this -> error('设置失败');
		}
	}

	}





}