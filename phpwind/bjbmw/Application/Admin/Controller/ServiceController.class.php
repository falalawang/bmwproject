<?php
namespace Admin\Controller;
use Think\Controller;
class ServiceController extends CommonController {

	 // 服务项目列表页 
    public function index(){
        $sercode = M('sercode'); // 实例化sercode对象
        if($_GET['service']){
            $_GET['service'] = trim($_GET['service']);
            $condition['service'] = array('like','%'.$_GET['service'].'%');
        }


        $count = $sercode -> where($condition) -> count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(10)
        $show = $Page->show();// 分页显示输出
        if(!$count){
            $trs = "<tr><td style='text-align:right;background:#eee;' colspan='4'>没有搜索结果 !</td><tr>";
            $this->assign('trs',$trs);
        }
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $sercode -> where($condition) -> limit($Page->firstRow.','.$Page->listRows) -> select();
        $this->assign('sercode',$list);// 赋值数据集
        $this->assign('show',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    // 添加服务项目页面
    public function add(){
    
    	$this -> display();
    }

     // 执行添加服务项目 
    public function sercodeadd(){
    	$sercode = M('sercode');
        $service = $_GET['service'];//得到用户提交的服务项目名
        $res = $sercode -> where("service='$service'")->find();//如果有结果 说明用户添加的项目已存在
        
        //创建要插入的数据
        $data['service'] = $_GET['service'];
        $data['sercode'] = $_GET['sercode'];
       
        //服务名不存在 两次代码一致且不为空时插入数据库
        if(!$res && ($_GET['sercode']==$_GET['sercode1'])){

            $res1 = $sercode ->add($data);//执行插入操作 
        	
    		if($res1){
    			$this -> redirect('Service/index');
    		}else{
    			$this -> error('添加失败！',U('Service/add'),1);
    		}
        	
        }elseif($res){
            $this -> error('服务项已存在！',U('Service/add'),1);
        }else{
            $this -> error('两次输入的服务代码不一致！',U('Service/add'),1);
        } 
    }

    // 修改服务项目页面
    public function edit(){
        
    	$service = M('sercode');
        $sercode = $service -> where($_GET) -> find();//得到在sercode表中的数据 分配到模板中
        $this -> assign('sercode',$sercode);
    	$this -> display();
    }


    //执行修改服务项目操作
    public function update(){
    	$service = M('sercode');
        $sid = $_POST['serid'];//服务项id
        $res = $service -> where("id=$sid") -> find();//查询服务项  在后面判断使用

        //只能修改服务项目名  修改代码无意义  主要在价格表中当字段名
        $ser = I('post.service');
        $res = $service -> where("service=$ser") -> find();//查询服务项  有结果说明已存在 
        
        
        if(!$res){
            $res = $service -> where("id=$sid") -> setField('service',$_POST['service']); //修改服务项目名
            if($res){
                    $this->redirect('Service/index'); //成功后直接跳转
                }else{
                    $this -> error('修改失败！',$_SERVER["HTTP_REFERER"],1);
                }
        }else{
            $this -> error('服务项已存在！',$_SERVER["HTTP_REFERER"],1);
        }
    
    }

     // 删除服务项目 
    public function del(){
    	$sercode = M('sercode');
    	if($sercode -> delete(I('get.id'))){ //用服务项目的id作为条件
    		$this->redirect('Service/index',0);
    	}else{
    		$this->error('删除失败！',U('Service/index'),1);
    	}
    }
}