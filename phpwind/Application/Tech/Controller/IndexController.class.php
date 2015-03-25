<?php
namespace Tech\Controller;
use Think\Controller;
class IndexController extends Controller { //技师类

    public $techId;
    public $telephone;
    //初始化技师数据
    public function _initialize(){
        if(!isset($_SESSION["tech_isLogin"])){
            $this -> redirect('Login/login');
        }else{
            $this->techId = session('tech_id');
            $this->telephone = session('tech_telephone');
        }
    }
    public function getServerCarId(){
        $serCarDB = M("server_car");
        $serCar = $serCarDB -> select();

        $serviceCarDB = M("serviceman_car");
        $serviceCar = $serviceCarDB -> select();

        foreach ($serviceCar as $keys => $values) {
            $serviceArr = explode(',',$values['servicemanId']);
            foreach ($serviceArr as $k => $value) {
                if($value == $this->techId){
                    return $values['carId'];
                }
            }
        }
    }
    //技师页面首页
    public function index(){

        $this -> assign('telephone',$this->telephone);

        if(isset($_GET['date'])){
            $day = $_GET['date'];
        }else{
            $day = date("Y-m-d",time());
        }
        if(strtotime($day) < time()+60*60*24*5){
            $nextDay = date("Y-m-d",strtotime($day) + 60*60*24);
        }else{
            $nextDay = date("Y-m-d",time());
        }
        if(strtotime($day) < time()){
            $prevDay = date("Y-m-d",time()+60*60*24*6);
        }else{
            $prevDay = date("Y-m-d",strtotime($day) - 60*60*24);
        }

        $this -> assign("day",$day);
        $this -> assign("nextDay",$nextDay);
        $this -> assign("prevDay",$prevDay);

        $orderDB = M("order");
        $serverCarId = $this->getServerCarId();
        $order = $orderDB ->where("serverCarId = $serverCarId and orderDate = '$day' and orderStatus != '0' and orderStatus !='1'") ->order("orderDate,orderTime") -> select();
        $count = $orderDB ->where("serverCarId = $serverCarId and orderDate = '$day' and orderStatus != '0' and orderStatus !='1'")-> count();

        $this -> assign("orders",$order);
        $this -> assign("count",$count);

        $this -> display();
    }
    //技师订单页面
    public function order(){
        $orderDB = M("order");
        if (isset($_GET['id']) && $_GET['id'] >= 1) {
            $id = $_GET['id'];
            $serverCarId = $this->getServerCarId();
            $order = $orderDB ->where("id = $id and serverCarId = '$serverCarId'") -> find();
            $this -> assign("order",$order);
            if($order){
                $telephone = session('tech_telephone');
                $this -> assign('telephone',$telephone);
                $evaDB = M("evaluate");
                $evaluate = $evaDB -> where("orderId = $id") -> find();
                $this -> assign("evaluate",$evaluate);
                $this -> display();
            }else{
                $this -> error("没找到相应订单",U("index"));
            }
        }else{
            $this -> success("OK",U("index"));
        }
    }
    //取消订单
    public function closeOrder(){
         if (isset($_GET['id']) && $_GET['id'] >= 1) {
            $id = $_GET['id'];
            $order = M('order');
            $data['orderStatus'] = '0';

            if($order -> where("id = $id") -> save($data)){
                $this -> success("修改成功",U("index/order?id=$id"));
            }else{
                $this -> error("修改失败",U("index/order?id=$id"));
            }
        }
    }
    //修改订单
    public function editOrder(){
        if (isset($_GET['id']) && $_GET['id'] >= 1) {
            $id = $_GET['id'];
            $data['orderStatus'] = $_GET["status"];
            $order = M('order');

            if($order -> where("id = $id") -> save($data)){
                $this -> success("修改成功",U("index/order?id=$id"));
            }else{
                $this -> error("修改失败1",U("index/order?id=$id"));
            }
        }
    }
}