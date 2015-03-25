<?php
namespace Admin\Controller;
use Think\Controller;
class SerpriceController extends CommonController {

	 // 服务价格列表 
    public function index(){
        $serprice = M('serprice'); // 实例化serprice对象

        //搜索的时候得到搜索值  去除两边的空白
        if($_GET['model']){
            $_GET['model'] = trim($_GET['model']);
            $condition['model'] = array('like','%'.$_GET['model'].'%');
        }
        

        $count = $serprice -> where($condition) -> count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(10)
        $show = $Page->show();// 分页显示输出 

        if(!$count){
            $trs = "<tr><td style='text-align:right;background:#eee;' colspan='8'>没有搜索结果 !</td><tr>";
            $this->assign('trs',$trs);
        }


        
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $serprice -> where($condition) -> limit($Page->firstRow.','.$Page->listRows)->select();
        
        $this->assign('serprice',$list);// 赋值数据集
        $this->assign('show',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }


    //单条服务价格详细列表页
    public function select(){
        $serprice = M('serprice');


        $sprice = $serprice -> where($_GET) -> find();//得到本条服务价格详细信息  
        $this -> assign('price',$sprice);
        $this -> display();
    }

    // 添加服务价格页面
    public function add(){
        $bra = M('brand');
        $brand = $bra -> select();
        $this -> assign('brand',$brand);//获得所有的品牌
        $this -> assign('bcount',$bcount);//所有品牌的数量
    	$this -> display();
    }

    //动态生成下拉菜单列表
    public function serieslist(){
        
        $ser = M('series');
        $bra = M('brand');
        $ops = '<option>请选择车系</option>';//拼接成html的下拉option标签

        $thisbra = $bra -> where("brand = '{$_GET['brand']}'") ->find();//ajax提交的数据--品牌名  得到品牌数据

        
        $series =  $ser -> where("brandid={$thisbra['id']}") -> select() ;//通过品牌的id找到对应的所有车系
        
        foreach($series as $ser){
          
          $ops.="<option value='".$ser['series']."'>".$ser['series']."</option>";
           
        }
        echo $ops;

    }

    public function modellist(){
        
        $ser = M('series');
        $mod = M('model');
        $ops = '<option>请选择车型</option>';//拼接成html的下拉option标签

        $thisser = $ser -> where("series = '{$_GET['series']}'") ->find();//ajax提交的数据--车系名  得到车系的数据

        
        $models =  $mod -> where("seriesid={$thisser['id']}") -> select() ;//通过车系的id找到对应的所有车型
        
        foreach($models as $mods){
          
          $ops.="<option value='".$mods['model']."'>".$mods['model']."</option>";
           
        }
        echo $ops;

    }

    // 执行添加服务价格 
    public function doadd(){
        
    	$serprice = M('serprice');
        
        if($serprice->create()){

            $res = $serprice -> add();
        	
            
    		if($res){
    			$this -> redirect('Serprice/index');
    		}else{
    			$this -> error('添加失败！',U('Serprice/add'),1);
    		}
        	
        }
    }
    // 修改服务价格页面
    public function edit(){
    	$serprice = M('serprice');

        $sprice = $serprice -> where($_GET) -> find();//得到本条服务价格详细信息
        

        $this -> assign('price',$sprice);
        $this -> display();
    }


    //执行修改服务价格操作
    public function update(){
    	$serprice = M('serprice');

        if($serprice -> create()){//创建数据对象
            
            if($serprice -> save()){
               $this->redirect('serprice/index'); 
            }else{
                $this -> error('修改失败！',$_SERVER["HTTP_REFERER"],1);
            }
        }  
        
    }

     // 删除某个车型的服务价格信息
    public function del(){
    	$serprice = M('serprice');
    	if($serprice -> delete(I('get.id'))){
    		$this->redirect('serprice/index');
    	}else{
    		$this->error('删除失败！',U('serprice/index'),1);
    	}
    }
}