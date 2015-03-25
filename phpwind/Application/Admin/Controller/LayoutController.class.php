<?php
namespace Admin\Controller;
use Think\Controller;
class LayoutController extends CommonController{
    
    //调用公共模板
	public function layout(){
		$this -> display();	
	}		
}
?>