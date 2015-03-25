<?php
namespace Admin\Controller;
use Think\Controller;
class ShopController extends CommonController {

	 // 4S店管理页面 
    public function index(){
    	$shops = M('shop');
        $count = $shops -> count();
        $page = new \Think\Page($count,10);
        $show       = $page -> show();
    	$shop = $shops -> limit($page->firstRow.','.$page->listRows) -> select();
    	$this -> assign('shop',$shop);
        $this -> assign('show',$show);
    	$count = 0 + $page->firstRow;
    	$this -> assign('count,$count');
		$this->display();
    }

    // 添加4S店页面
    public function add(){
    	$citys = M('city');
    	$city = $citys -> select();
    	$this -> assign('city',$city);
    	$this -> display();
    }

     // 添加4S店 
    public function save(){
    	$shop = M('shop');
    	if($shop -> create()){
    		if($shop -> add()){
    			$this -> redirect('shop/index',0);
    		}else{
    			$this -> error('添加失败');
    		}
    	}else{
    		$this -> error('添加失败1');
    	}
    }

    // 修改4S店名和所在地
    public function mod(){
    	$citys = M('city');
    	$city = $citys -> select();
    	$this -> assign('city',$city);
    	$this -> display();
    }

    public function update(){
    	$shop = M('shop');
    	if($shop -> create()){
    		if($shop -> save()){
    			$this->redirect('shop/index',0);
    		}else{
    			$this -> error('修改失败');
    		}
    	}else{
    		$this -> error('修改失败');
    	}
    }

     // 删除4S店 
    public function del(){
    	$shop = M('shop');
    	if($shop -> delete(I('get.id'))){
    		$this->redirect('shop/index',0);
    	}else{
    		$this->redirect('shop/index',0);
    	}
    }
}