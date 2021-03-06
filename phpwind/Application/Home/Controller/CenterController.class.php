<?php
namespace Home\Controller;
use Think\Controller;
class CenterController extends Controller
{
    public $uid;

    public function _initialize(){
        if(!isset($_SESSION["uid"])){
            $url = $_SERVER['REQUEST_URI'];
            setcookie("url",$url,time()+3600,'/');//把被拦截页面地址存入cookie 用于登录后跳转
            $this -> redirect('Index/index?islogin=no');
          //  $this -> error('您还没有登录，请先登陆!',U('Index/index'),1);
        }else{
            setcookie('url','',time()-1,'/');
            $this->uid = session('uid');
        }
    }

    //个人中心首页
    public function index(){
        $this -> display();
    }

    //个人中心订单
    public function order(){
        $orderDB = M("order");
        if (isset($_GET['id']) && $_GET['id'] >= 1) {
            $id = $_GET['id'];
            $order = $orderDB ->where("id = $id and uid = $this->uid") -> find();

            if($order){
                $this -> assign("order",$order);
            }else{
                $this->error("没找到相应订单！",U("/Center/order"));
            }

            $evaDB = M("evaluate");
            $id = $order['id'];
            $evaluate = $evaDB -> where("orderId = $id") -> find();
            $this -> assign("evaluate",$evaluate);
            $this -> display();
        }else{
            $order = $orderDB ->where("uid = $this->uid") ->order("id desc") -> select();
            $this -> assign("orders",$order);
            $this -> display();
        }
    }

    //个人中心地址管理
    public function address(){
        $addr = M('user_address');
        $resAddr = $addr->where("uid = $this->uid")->select();
        $this -> assign("address",$resAddr);
        $this -> display();
    }

    //添加用户地址
    public function addAddress()
    {
        $city=M("city");
        $c=$city->select();

        foreach ($c as $key=> $value) {
            $provinces[$key]=$value['province'];
            $citys[$key]=$value['province'].",".$value['city'];
            $countys[$key]=$value['city'].",".$value['county'];
        }
        $provinces=array_unique($provinces);
        $ccitys=array_unique($citys);
        $ccountys=array_unique($countys);


        foreach ($ccitys as $key=> $value) {
            $ccitys[$key]=explode(",", $value);
        }
        foreach ($ccountys as $key=> $value) {
            $ccountys[$key]=explode(",", $value);
        }
        $this->assign("provinces",$provinces);
        $this->assign("citys",$ccitys);
        $this->assign("countys",$ccountys);

        $this -> display();
    }

    //修改用户地址
    public function editAddress()
    {
        //判断是否传递ID参数
        if(isset($_GET['id']) && $_GET['id'] > 0){
            $addr=M("user_address");
            $id = $_GET['id'];
            $address = $addr->where("id = $id and uid = $this->uid")->select();
            $this -> assign('address',$address);
        }else{
            $this -> success('错误操作', U('/Center/address'));
        }

        $city=M("city");
        $c=$city->select();

        foreach ($c as $key=> $value) {
            $provinces[$key]=$value['province'];
            $citys[$key]=$value['province'].",".$value['city'];
            $countys[$key]=$value['city'].",".$value['county'];
        }
        $provinces=array_unique($provinces);
        $ccitys=array_unique($citys);
        $ccountys=array_unique($countys);

        foreach ($ccitys as $key=> $value) {
            $ccitys[$key]=explode(",", $value);
        }
        foreach ($ccountys as $key=> $value) {
            $ccountys[$key]=explode(",", $value);
        }
        $this->assign("provinces",$provinces);
        $this->assign("citys",$ccitys);
        $this->assign("countys",$ccountys);

        $this -> display();
    }

    //添加地址
    public function insert()
    {
        $addr = M("user_address");
        $data = $_POST;
        $data['uid'] = $this->uid;
        if($addr -> create($data)){
            $res = $addr->add();
            if($res){
                $this -> success("OK",U("Center/address"));
            }else{
                $this -> error("faild");
            }
        }else{
            $this -> error("失败！");
        }
    }
    //修改地址
    public function update()
    {
        $addr = M('user_address');
        $data = $_POST;
        $id = $_POST['id'];
        if($addr -> create()){
            if($addr -> where("id = $id")-> save()){
                $this -> success("修改成功");
            }else{
                $this -> success("内容没有修改");
            }
        }else{
            $this -> error("修改失败");
        }
    }
    //删除地址
    public function delAddr()
    {
        $id = I('get.id');
        $addr = M('user_address');
        if($addr -> delete($id)){
            $this -> success("删除成功",U('Center/address'));
        }else{
            $this -> error("删除失败");
        }
    }
    //删除车辆
    public function delCar(){
        $id = I('get.id');
        $car = M('user_model');
        if($car -> delete($id)){
            echo 1;
            // $this -> success("删除成功",U('center/userCar'));
        }else{
            $this -> error("删除失败");
        }
    }
    //添加车辆
    public function insertCar()
    {
        $car = M("user_model");
        $data = $_GET;
        $data['uid'] = $this->uid;
        if($car -> create($data)){
            $res = $car->add();
            if($res){
                echo $res;
            }else{
                $this -> error("faild");
            }
        }else{
            $this -> error("失败！");
        }
    }

    //遍历车辆
    public function userCar()
    {
        $model = M();
        $myCar = $model -> table('xdl_user_model as u,xdl_models as s')
                        -> field("u.id, u.typeId, u.uid, s.id as sid, s.brand, s.series, s.types")
                        -> where("u.uid = $this->uid and u.typeId = s.id")
                        // -> order("a.address desc")
                        -> select();
        $this->assign('mycar',$myCar);
        //遍历车型
        $models = M("models");
        $Types = $models -> select();
        foreach ($Types as $key => $value) {
            $brand[$key]=$value['brand'];
            $series[$key]=$value['brand'].",".$value['series'];
            $types[$key]=$value['brand'].",".$value['series'].",".$value['types'].",".$value['id'];
        }
        $brands=array_unique($brand);
        $serieses=array_unique($series);
        $types=array_unique($types);
        foreach ($serieses as $key=> $value) {
            $serieses[$key]=explode(",", $value);
        }
        foreach ($types as $key=> $value) {
            $types[$key]=explode(",", $value);
        }
        $this->assign('brands',$brands);
        $this->assign('serieses',$serieses);
        $this->assign('types',$types);
        // dump($types);
        $this -> display();
    }
    //添加订单评论
    public function insertEva()
    {
        $eva = M("evaluate");
        $data = $_POST;
        $data['uid'] = $this->uid;
        $data['time'] = time();

        if($eva -> create($data)){
            $res = $eva->add();
            if($res){
                $this -> success("OK",U("Center/order?id=".$data['orderId']));
            }else{
                $this -> error("faild");
            }
        }else{
            $this -> error("失败！");
        }
    }
    //查看订单评论
    public function evaluate()
    {
        if(isset($_GET['id']) && $_GET['id'] > 0){

            $evaDB = M("evaluate");
            $id = I('get.id');
            $evaluate = $evaDB -> where("orderId = $id") -> select();

            if($evaluate){
                redirect(U("Center/order?id=".$id), 0, '页面跳转中...');
            }else{
                $this -> display();
            }
        }else{
            redirect(U("Center/order"), 0, '页面跳转中...');
        }
    }
}
?>