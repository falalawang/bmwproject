<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {

	 // 用户管理页面
    public function index(){
        $user = M('user'); // 实例化User对象

        if($_GET['userid']){
            $_GET['service'] = trim($_GET['service']);
            $condition['userid'] = array('like','%'.$_GET['userid'].'%');
        }

        $count = $user -> where($condition) -> count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(10)
        $show = $Page->show();// 分页显示输出
        if(!$count){
            $trs = "<tr><td style='text-align:right;background:#eee;' colspan='5'>没有搜索结果 !</td><tr>";
            $this->assign('trs',$trs);
        }

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $user -> where($condition) -> limit($Page->firstRow.','.$Page->listRows) -> select();
        $this->assign('user',$list);// 赋值数据集
        $this->assign('show',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    // 添加用户页面
    public function add(){
    
    	$this -> display();
    }

     // 执行添加用户 
    public function useradd(){
    	$user = M('user');
            $userid = $_GET['userid'];
            $res = $user -> where("userid='$userid'")->find();
            
            //创建要插入的数据
            $data['userid'] = $_GET['userid'];
            $data['password'] = MD5($_GET['password']);
            $data['status'] = $_GET['status'];
            $data['username'] = $_GET['username'];

            //用户名不存在 两次密码一致 不为空时插入数据库
            if(!$res && ($_GET['password']==$_GET['password1'])){

                $res1 = $user ->add($data);
            	
        		if($res1){
        			$this -> redirect('user/index');
        		}else{
        			$this -> error('添加失败！',U('user/add'),1);
        		}
            	
            }elseif($res){
                $this -> error('用户名已存在！',U('user/add'),1);
            }else{
                $this -> error('两次密码不一致！',U('user/add'),1);
            } 
    }

    // 修改用户页面
    public function edit(){
    	$user = M('user');
        $user = $user -> where($_GET) -> find();
        switch($user['status']){
            case '0':$user['statu'] ='超级管理员';
            break;
            case '1':$user['statu'] ='管理员';
            break;
            case '2':$user['statu'] ='客服';
            break;
            case '3':$user['statu'] ='技师';
            break;
        }
        $this -> assign('user',$user);
    	$this -> display();
    }


    //执行修改用户操作
    public function update(){
    	$user = M('user');
        
        $userid = I('post.userid');
        //dump($user -> create());
        
        //如果用户只修改了昵称
        if(!I('post.password')){
            $uid = I('post.userid');
            $res = $user -> where("userid='$uid'") -> setField('username',$_POST['username']);
        
            if($res){
                    $this->redirect('user/index');
                }else{
                    $this -> error('修改失败！',$_SERVER["HTTP_REFERER"],1);
                }
        }else{
            //用户修改了密码
            $userid = $_POST['userid'];
            $data['password'] = md5($_POST['password']);
            $data['username'] = $_POST['username'];

            $res = $user -> where("userid='$userid'") -> save($data);
            if($_POST['password']==$_POST['password1']){
        		if($res){
        			$this->redirect('user/index');
        		}else{
        			$this -> error('修改失败！',$_SERVER["HTTP_REFERER"],1);
        		}
            }else{
                $this -> error('两次密码不一致！',$_SERVER["HTTP_REFERER"],1);
            }
        }
            
        
    }

     // 删除用户 
    public function del(){
    	$user = M('user');
    	if($user -> delete(I('get.id'))){
    		$this->redirect('user/index',0);
    	}else{
    		$this->error('删除失败！',U('user/index'),1);
    	}
    }
}