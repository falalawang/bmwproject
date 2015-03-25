<?php
namespace Admin\Controller;
use Think\Controller;
class BrandController extends CommonController {
    public function index(){
        $brand = M("brand");
        $count = $brand->count();
        $Page = new \Think\Page($count,10);
        $brands = $brand->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();
       
        
        $this -> assign("brand", $brands);
        $show = $Page -> show();
        $this -> assign("show",$show);  
        $this-> display();
    }
    public function del(){      
        $id = I('get.id');
        $dele = M();
        $brandid =  $dele->table('bmw_series series,bmw_model model')->where("series.brandid={$id} or model.brandid={$id}")->select();
        if(!empty($brandid)){
            $this->error("删除失败,有车系车型子类");
        }
        $brand = M('brand');

        if($brand ->delete($id)){
            $this->success("成功",U('Brand/index'));
        }else{
            $this -> error("删除失败");
        }
    }
    
    public function add(){
        

        $this->display();
    }
    public function inser(){

        $brand  = M("brand");
        $data=$_POST;
        if($brand -> create($data)){
            $res = $brand->add();
            if($res){
                $this->success("成功",'index');
            }else{

               $this->error("失败"); 
            }
        }else{
           $this->error("失败");
        } 
    }
      //修改
    public function edit(){
        //查询内容,以便修改
        $id = I('get.id');
        
        $brand = M("brand");
        $brands = $brand->find($id);
        $this->assign("brand",$brands);
        $this->display();
    }
    //修改方法

    public function updates(){
        $brand = M("brand");
        $data=$_POST; 
        if($brand ->create($data)){//创建成功
            $res = $brand->save();
            if($res){//更新成功
                $this->success("成功",'index');
            }else{//更新失败
                $this->error('失败');
            }
        }else{//失败
           $this->error('失败');
        } 
    }
    
}
