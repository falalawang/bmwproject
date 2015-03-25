<?php
namespace Admin\Controller;
use Think\Controller;
class CarController extends CommonController {
    public function index(){
        $shop = M("shop");
        $car = M("car");
        
        if (isset($_GET['shop'])&& !empty($_GET['shop'])) {

        $shopname['shopname'] =array('like',"%".$_GET['shop']."%") ;
        $shops = $shop ->field('id') -> where($shopname)->select();
        foreach ($shops as $key => $value) {
            $str .= $value['id'].',';
        }
        $str= rtrim($str,',');
        $oshopid['shopid'] = array("in",$str); 
    
        $oshopid["_logic"] = "OR";
        $oshopid['carname|technicians'] =array('like',"%".$_GET['shop']."%") ;
        
        $cars = $car ->field("carid")->where($oshopid)->select();
        $str=null;
        foreach ($cars as $key => $value) {
            $str .= $value['carid'].',';
        }
        $str = rtrim($str,',');
        $map['carid']=array("in",$str);

        }

        //$a =I('get.shop');
       // dump($_GET[shop]);
        $val["shop"]= $_GET["shop"];
        
       // $val['shop'] =iconv("gb2312","utf-8",$a);

        $map['shopid'] = array('gt',0); 
        //分页
        $count = $car->where($map)->count();
        $Page = new \Think\Page($count,10);

  
        if (isset($_GET['shop'])&& !empty($_GET['shop'])) {
            
            foreach($val as $key=>$value) {
               $Page->parameter[$key]   =   $value;
           }
        }
        //查询服务车
        $cars = $car->where($map)->order('shopid')->limit($Page->firstRow.','.$Page->listRows)->select();
        
        $arr=array();
        //联合查询,取得4s店名、城市
        foreach ($cars as $key => $value) {
            $shop = M("shop");
            $id['id'] = $value['shopid'];
            $value['shop'] = $shop->where($id)->find();
            $arr[]=$value;
        }
        
        $show = $Page -> show();
        $this -> assign("show",$show);
        $this -> assign("car",$arr);    
        $this-> display();
    }
    //删除服务车
    public function del(){      
        $id = I('get.id');
        $car = M('car');
        if($car ->delete($id)){
            //删除成功
            $this->success('成功');
        }else{
            $this -> error("删除失败");
        }
    }
    //添加服务车页面
    public function add(){
        //查询城市、品牌
        $shop = M("shop");
        $shops = $shop->order('ofcity desc , shopname')->select();
        $this->assign("shop",$shops);
        $this->display();
    }
    //添加服务车方法
    public function inser(){
        $car = M("car");
        $data=$_POST;
        if($car -> create($data)){//创建成功
            $res = $car->add();
            if($res){//添加成功
                $this->success('成功','index');
            }else{//失败
                $this->error('失败');
            }
        }else{//失败
           $this->error('失败');
        }  
    }
    //修改
    public function edit(){
        //查询内容,以便修改
        $id = I('get.carid');
        
        $car = M("car");
        $cars = $car->find($id);
        $this->assign("car",$cars);
        $this->display();
    }
    //修改方法
    public function updates(){
        $car = M("car");
        $data=$_POST; 
        if($car ->create($data)){//创建成功
            $res = $car->save();
            if($res){//更新成功
                $this->success("成功",'index');
            }else{//更新失败
                $this->error('失败');
            }
        }else{//失败
           $this->error('失败');
        } 
    }
    //服务车排班
    public function carorder(){
        //设置时区
        date_default_timezone_set(‘Asia/Shanghai’);
        //实例化对象
        $order = M("order");
        $shop = M("shop");
        $car = M("car");
        //获取当前日期的时间戳
     


        $time = date("Y/m/d");
        if (isset($_GET['shop'])&& !empty($_GET['shop'])) {
        $shopname['shopname'] =array('like',"%".$_GET['shop']."%") ;
        $shops = $shop ->field('id') -> where($shopname)->select();
        foreach ($shops as $key => $value) {
            $str .= $value['id'].',';
        }
        $str= rtrim($str,',');
        $oshopid['shopid'] = array("in",$str); 

        $oshopid["_logic"] = "OR";
        $oshopid['carname|technicians'] =array('like',"%".$_GET['shop']."%") ;
        
        $cars = $car ->field("carid")->where($oshopid)->select();
        $str=null;
        foreach ($cars as $key => $value) {
            $str .= $value['carid'].',';
        }
        $str = rtrim($str,',');
        $map['carid']=array("in",$str);

        }
        //查询条件
        $val["shop"] = $_GET["shop"];
        $map['hopedata'] = array('egt',$time);
        $map['status'] = array('in','2,3,4,5');
        // 查询满足要求的总记录数
        $count = $order->where($map)->count();

        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page = new \Think\Page($count,10);
        //分页跳转的时候保证查询条件
        if (isset($_GET['shop'])&& !empty($_GET['shop'])) {
            foreach($val as $key=>$value) {
                $Page->parameter[$key]   =   $value;
            }
        }
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $orders = $order->where($map)->order('city,hopedata')->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr=array();

        //关联查询(城市,4s店,品牌,)
        foreach ($orders as $key => $value) {
            $brand = M("brand");//实例化model对象
           
            $carid['carid'] = $value['carid'];
            //$modelid['id'] = $value['groupid'];
            $value['car'] = $car->where($carid)->find();
            //$value['brand'] = $brand->where($modelid)->find();
           
            $shopid['id'] = $value['car']['shopid'];
            $value['shop'] = $shop->where($shopid)->find();
            $arr[]=$value;
        }
        $show = $Page -> show();// 分页显示输出
        $this -> assign("show",$show);// 赋值分页输出
        $this -> assign("carorder",$arr); // 赋值数据集   
        $this-> display();// 输出模板
    }

   
}
