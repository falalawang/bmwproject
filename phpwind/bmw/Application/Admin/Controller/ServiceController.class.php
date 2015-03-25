<?php
namespace Admin\Controller;
use Think\Controller;
class ServiceController extends Controller {
    
    public function carList(){
        import("ORG.Util.AjaxPage");
        $search=$_POST['search'];
        $model=M('');
        $search =empty($search) ? '': "and (bmw_brand.brands like '%{$search}%' or bmw_series.series like '%{$search}%' or bmw_models.model like '%{$search}%')";
        $count = $model->table('bmw_brand,bmw_series,bmw_models') -> field('bmw_brand.brands,bmw_series.series,bmw_models.model')->where("bmw_brand.id=bmw_series.bid and bmw_series.id=bmw_models.sid $search") -> count();
        $page  = new \Think\Page($count,3);
        $limit_value = $page->firstRow . "," . $page->listRows;
        $models=$model -> table('bmw_brand,bmw_series,bmw_models') -> field("bmw_brand.brands,bmw_series.series,bmw_models.model,bmw_models.id,bmw_series.id as sid")->where("bmw_brand.id=bmw_series.bid and bmw_series.id=bmw_models.sid $search") ->limit($limit_value)-> select();
        $show=$page->show();
        $this -> assign("model", $models);
        $this -> assign('show',$show);
        $this -> display();  
    }
 
    public function brandList(){
        $brand=M('brand');
        $brands=$brand->select();
        $this->assign('brands',$brands);
        $this->display();
    }

    public function insert(){
        $data=$_POST;
        $brand=M("brand");
        if($brand -> create($data)){
            $res = $brand->add();
            if($res){
                $this -> success("OK",U("Service/brandList"));
            }else{
                $this -> error("失败");
            }
        }else{
            $this -> error("失败！");
        }
     }


    public function addBrand(){
        $this->display();
     }

    public function aa(){
        $brand=$_GET['brand'];
        $brands=M("brand");
        $res=$brands->where("brands='{$brand}'")->select();
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function bb(){
        $ser=$_GET['series'];
        $series=M("series");
        $res=$series->where("series={$ser}")->select();
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function cc(){
        $mod=$_GET['models'];
        $models=M("models");
        $res=$models->where("model={$mod}")->select();
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function delBrand(){
        $id=I('get.id');
        $brand=M('brand');
        $serie=M('series');
        $model=M('models');
        $series=$serie->field(id)->where("bid={$id}")->select();  
        if($brand -> delete($id)){
            $serie->where("bid=$id")->delete();
            foreach($series as $v){
                foreach($v as $a){
                    $model->where("sid=$a")->delete();         
                }
            }
                $this -> success("删除成功",U('Service/brandList'));
        }else{
                $this -> error("删除失败",U('Service/brandList'));
        }      
     }

    public function delSeries(){
        $sid=I("get.sid");
        $series=M('series');
        $models=M('models');
        if($series->where("id=$sid")->delete() and $models->where("sid=$sid")->delete()){
            $this->success("删除成功",U('Service/carList'));
        }else{
            $this->error("删除失败",U('Service/carList'));
        }
    }
    
    public function delModel(){
        $id=I('get.id');
        $brand=M('models');
        if($brand -> delete($id)){
            $this -> success("删除成功",U('Service/carList'));
        }else{
            $this -> error("删除失败",U('Service/carList'));
        }  
    }

    public function addSeries(){
        $brand=M('brand');
        $brands=$brand->select();
        $this->assign('brands',$brands);
        $this->display();
     }

    
    public function add_Series(){
        $data['bid']=$_POST['brands'];
        $data['series']=$_POST['series'];
        if($data['bid']){
        $series=M('series');
        if($series->create($data)){
            $res=$series->add();
            if($res){
                $this -> success("OK",U("Service/addSeries"));
            }else{
                $this -> error("添加失败");
            }
            }else{
                $this -> error("添加失败");
        }
        }else{
        $this -> error("添加失败");
        }
     }


    public function Models(){
        $brand=M('brand');
        $brands=$brand->select();
        $this->assign('brands',$brands);
        $this->display();
     }

    
    public function addModels(){
        $data['sid']=$_POST['series'];
        $data['model']=$_POST['models'];
        if($data['sid']){
        $model=M('models');
        if($model->create($data)){
            $res=$model->add();
            if($res){
                $this -> success("OK",U("Service/Models"));
            }else{
                $this -> error("添加失败");
            }
            }else{
                $this -> error("添加失败");
        }
        }else{
        $this -> error("添加失败");
        }
     }
    
    public function keepProjectList(){
        $combo=M('price');
        $combos=$combo->field("combo,brand,id")->group(combo)->order(id)->select();
        $this->assign("combo",$combos);
        $this->display();
    }

     public function addservice(){
        $brand=M('brand');
        $brands=$brand->select();
        $this->assign('brands',$brands);
        $this->display();

     }

     public function addprice(){
        $data=$_POST;
        $data['brand']=$_POST['brand'];
        $data['series']=$_POST['series'];
        $data['models']=$_POST['models'];
        $model=M('');
        $models=$model->table('bmw_brand,bmw_series,bmw_models')->field("bmw_brand.brands,bmw_series.series,bmw_models.model")->where("bmw_brand.id={$data['brand']} and bmw_series.id={$data['series']} and bmw_models.id={$data['models']}")->select();
        foreach($models as $v){
            $data['brand']=$v['brands'];
            $data['series']=$v['series'];
            $data['models']=$v['model'];
        }
        if($data['brand'] and $data['series'] and $data['models']){
        $price=M('price');
        if($price->create($data)){
            $res=$price->add();
            if($res){
                $this->success("OK",U('Service/keepProjectList'));
        }else{
                $this->error("添加失败");
        }
        }else{
                $this->error("添加失败");
        }
        }else{
                $this->error("添加失败");
        }

    }


     public function delService(){
        $id=I('get.id');
         $price=M('price');
        if($price -> delete($id)){
            $this -> success("删除成功");
        }else{
            $this -> error("删除失败");
        }  

     }
   
    public function insertService(){
        $data=$_POST;
        $keep=M('keep');
        if($keep->create($data)){
            $res=$keep->add();
            if($res){
                $this->success('OK',U('Service/keepProjectList'));
            }else{
                $this->error('添加失败');
            }
        }else{
                $this->error('添加失败');
        }
     }

     
    public function priceList(){
        $brand=M('brand');
        $brands=$brand->select();
        $this->assign('brand',$brands);
        $price=M('price');
        $count = $price -> count();
        $Page  = new \Think\Page($count,10);
        $show = $Page->show();
        $prices=$price->limit($Page->firstRow.','.$Page->listRows)->select();
        $this -> assign('show',$show);
        $this->assign('price',$prices);
        $this->display();
     }
    
    public function ajaxPrice(){
        $data=$_POST['brand'];
        $model=M('');
        $models=$model->table("bmw_brand,bmw_series")->field("bmw_series.id,bmw_series.series")->where("bmw_brand.id=bmw_series.bid and bmw_brand.id='$data'")->select();
        $str="<option value='0'>请选择车系</option>";
        foreach($models as $k=>$v){
                $aa=$v['id'];
                $bb=$v['series'];
                $str.="<option value='{$aa}'>{$bb}</option>";
        }
        echo $str;
    }
          
    public function ajaxAction(){
        $data=$_POST['series'];
        $model=M('');
        $models=$model->table("bmw_series,bmw_models")->field("bmw_models.id,bmw_models.model")->where("bmw_series.id=bmw_models.sid and bmw_series.id='$data'")->select();       
        $str="<option value='0'>请选择车型</option>";
        foreach($models as $k=>$v){
            $aa=$v['id'];
            $bb=$v['model'];
            $str.="<option value='{$aa}'>{$bb}</option>";
        }
        echo $str;        
     }

    public function search(){
        $data['brand']=$_POST['brand'];
        $data['series']=$_POST['series'];
        $data['models']=$_POST['models'];
        $price=M('');
        $prices=$price->table("bmw_brand,bmw_series,bmw_models,bmw_price")->field('bmw_price.*')->where("bmw_brand.id={$data['brand']} and bmw_series.id={$data['series']} and bmw_models.id={$data['models']} and bmw_price.brand=bmw_brand.brands and bmw_price.series=bmw_series.series and bmw_price.models=bmw_models.model")->select();
        $this->assign('price',$prices);
        $this->display();

    }

    public function updatePrice(){
        $id=$_GET['id'];
        $price=M('price');
        $prices=$price->where("id=$id")->find();
        $this->assign('prices',$prices);
        $this->display();
     }
    
    public function update(){
        $data=$_POST;
        $id=$_GET['id'];
        $price=M('price');
        if($price->create($data)){
            $res=$price->where("id=$id")->save();
            if($res){
                $this->success('修改成功',U("Service/priceList"));
            }else{
                $this->error('修改失败',U("Service/priceList"));
            }
        }else{
                $this->error('失败',U("Service/priceList"));
        }
     }
}