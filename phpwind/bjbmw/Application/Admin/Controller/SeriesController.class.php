<?php
namespace Admin\Controller;
use Think\Controller;
class SeriesController extends CommonController {
    public function index(){
        $serie = M("series");
        $brand = M("brand");

        if (isset($_GET['series'])&& !empty($_GET['series'])) {
            $brandname["brand"] = array("like","%".$_GET["series"]."%");
            $brands = $brand ->field("id") -> where($brandname)->select();
            foreach ($brands as $key => $value) {
            $str .= $value['id'].',';
            }
            $str= rtrim($str,',');
            $map["brandid"] = array("in",$str);
            $map["_logic"] = "OR";
            $map['series']  = array('like',"%".$_GET['series']."%");    
        }
        $val["series"] = $_GET['series'];
        $count = $serie->where($map)->count();
        $Page = new \Think\Page($count,10);
        $series = $serie->where($map)->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select(); 
        if (isset($_GET['series'])&& !empty($_GET['series'])) {
            foreach($val as $key=>$value) {
                $Page->parameter[$key]   =   $value;
            }
        }
        $arr = array();
        foreach ($series as $key => $value) {
            $brand = M("brand");//实例化brand
            $brandid['id'] = $value['brandid'];
            $value['brand'] = $brand->where($brandid)->find();
            $arr[]=$value;
        }

        $this -> assign("series", $arr);
        $show = $Page -> show();
        $this -> assign("show",$show);  
        $this-> display();
    }
    public function del(){
        $model = M("model");      
        $id = I('get.id');
        $models['seriesid'] = I("get.id");
        $res = $model->field("id")->where($models)->find();
       
        
        if($res){
             $this -> error("删除失败,本系列下有车型");
        } 
        $series = M('series');
        if($series ->delete($id)){
            $this->success("成功",U('Series/index'));
        }else{
            $this -> error("删除失败");
        }
    }
    
    public function add(){
        $brand = M("brand");//实例化brand
        $brands = $brand->select();
        $this -> assign("brand",$brands);
        $this->display();
    }
    public function inser(){

        $brand  = M("series");
        $data=$_POST;
       
        if($brand->create($data)){
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
        $serie = M("series");
        $brands = $brand->select();
        $series = $serie -> find($id);
        $this->assign("brand",$brands);
        $this->assign("series",$series);
        $this->display();
    }
    //修改方法

    public function updates(){
        $series = M("series");
        $data=$_POST; 
        
        //exit;
        if($series ->create($data)){//创建成功
            $res = $series->save();
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
