<?php
namespace Admin\Controller;
use Think\Controller;
class ModelController extends CommonController {
    public function index(){
        $brand = M("brand");
        $series = M("series");
        $model = M("model");
        if (isset($_GET['model'])&& !empty($_GET['model'])) {
            $map['model']  = array('like',"%".$_GET['model']."%");    
        
            $brandname["brand"] = array("like","%".$_GET["model"]."%");
            $brands = $brand ->field("id") -> where($brandname)->select();
            foreach ($brands as $key => $value) {
            $str .= $value['id'].',';
            }
            $str= rtrim($str,',');
            $map["brandid"] = array("in",$str);
            $map["_logic"] = "OR";
            $seriesname['series']  = array('like',"%".$_GET['model']."%"); 
            $serie = $series->field('id') ->where($seriesname)->select();
            $str=null;
            foreach ($serie as $key => $value) {
            $str .= $value['id'].',';
            }
            $str= rtrim($str,',');
            $map["seriesid"] = array("in",$str);
            $map['_logic'] = "OR";
            $map["model"] = array("like","%".$_GET['model']."%");


        }


        $val["model"] =$_GET['model'];
        $count = $model->where($map)->count();
        $Page = new \Think\Page($count,10);
        $models = $model->where($map)->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();
        if (isset($_GET['model'])&& !empty($_GET['model'])) {
            foreach($val as $key=>$value) {
                $Page->parameter[$key]   =   $value;
            }
        }

        $arr = array();
        foreach ($models as $key => $value) {
            $brand = M("brand");//实例化brand
            $series = M("series");
            $seriesid['id'] = $value["seriesid"];
            $brandid['id'] = $value['brandid'];
            $value["series"] = $series->where($seriesid)->find();
            $value['brand'] = $brand->where($brandid)->find();
            $arr[]=$value;
        }

        $this -> assign("model", $arr);
        $show = $Page -> show();
        $this -> assign("show",$show);  
        $this-> display();
    }
    public function del(){      
        $id = I('get.id');
        $model = M('model');
        if($model ->delete($id)){
            $this->success("成功",U('Model/index'));
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
        $model  = M("model");
        $data=$_POST;    
        if($model->create($data)){
            $res = $model->add();
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
        $model = M('model');
        $brands = $brand -> select();
        $models = $model -> find($id);
        $series = $serie ->where(" brandid = {$models['brandid']} ")-> select() ;
        
        $this->assign("brand",$brands);
        $this->assign("series",$series);
        $this->assign("model",$models);
        $this->display();
    }
    //修改方法

    public function updates(){
        $model = M("model");
        $data=$_POST; 
        if($model ->create($data)){//创建成功
            $res = $model->save();
            if($res){//更新成功
                $this->success("成功",'index');
            }else{//更新失败
                $this->error('失败');
            }
        }else{//失败
           $this->error('失败');
        } 
    }
    public function series(){
            $serie = M("series");
            $brandid['brandid'] = $_POST['id'];
            $series = $serie->where($brandid)->select();
            $str="";
            foreach ($series as $key => $value) {
                $str.="<option value=".$value['id'].">".$value['series']."</option>";
            }
            echo $str;
    }
    
}
