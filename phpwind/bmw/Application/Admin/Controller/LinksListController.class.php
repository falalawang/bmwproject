<?php

namespace Admin\Controller;

use Think\Controller;

class LinksListController extends CommonController{

	public function index(){

		$links = M('links');

		$count = $links -> count();

		$Page = new \Think\Page($count,10);

		$show = $Page -> show();

		$list = $links->limit($Page->firstRow.','.$Page->listRows)->select();

		$this->assign('list',$list);// 赋值数据集

		$this->assign('show',$show);// 赋值分页输出

		$this -> display();

	}
	public function del(){

		$del = M('links');

		$id = I('get.id');
			

		if($del -> delete($id)){

		$this -> success('删除友链成功');

		}else{

			$this -> error('删除失败');

		}

}

	public function mod(){

		$id = I('get.id');

		$lists = M('links');

		$map['id'] = $id;

		$links = $lists -> where($map)-> select();

		$this -> assign('links',$links);

		$this -> display();
	}	

	public function update(){

		if($_POST['links_id']==''||$_POST['links']==''){


			$this -> error('不能有空填项');

		}
		$update = M('links');

		if($update -> create()){

			if($update -> save()){

				$this -> success('修改成功','index');

			}else{

				$this -> error('修改失败');

			}

		}else{

			$this -> error('创建数据对象失败');


		}


	}

}