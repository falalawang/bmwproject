<?php
namespace Admin\Controller;
use Think\Controller;
class CityController extends CommonController {

     // 城市管理页面 
    public function index(){
    	$citys = M('city');
    	$count = $citys -> count();
    	$page = new \Think\Page($count,10);
    	$show = $page -> show();
    	$city = $citys -> limit($page->firstRow.','.$page->listRows) -> select();
    	$this -> assign('city',$city);
    	$count = 0 + $page->firstRow;
    	$this -> assign('count',$count);
    	$this -> assign('show',$show);
		$this->display();
    }

     // 修改城市页面 
    public function mod(){
    	$this -> display();
    }

     // 保存修改的城市名 
    public function update(){
    	$city = M('city');
    	if($city -> create()){
    		if($city -> save()){
    			$this->redirect('city/index',0);
    		}else{
    			$this -> error('修改失败');
    		}
    	}else{
    		$this -> error('修改失败');
    	}
    }

     // 添加新的城市页面 
    public function add(){
    	$this -> display();
    }

     // 添加新城市 
    public function save(){
    	$city = M('city');
    	if($city -> create()){
    		if($city -> add()){
    			$this->redirect('city/index',0);
    		}else{
    			$this -> error('添加失败');
    		}
    	}else{
    		$this -> error('添加失败');
    	}
    }

     // 删除城市 
    public function del(){
    	$city = M('city');
    	if($city -> delete(I('get.id'))){
    		$this->redirect('city/index',0);
    	}else{
    		$this->redirect('city/index',0);
    	}
    }
}
