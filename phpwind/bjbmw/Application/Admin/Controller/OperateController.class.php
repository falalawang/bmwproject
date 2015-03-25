<?php
namespace Admin\Controller;
use Think\Controller;
class OperateController extends CommonController {
    public function index(){
        //实例化operatecord
    	$operatecord = M("operatecord");
        if (isset($_GET['userid'])&& !empty($_GET['userid'])) {
            //实例化user
            $user = M('user');
            $userid['userid'] = array('like',"%".$_GET['userid']."%");
            $users = $user ->field("id")->where($userid)->select();
            foreach ($users as $key => $value) {
                $str .= $value['id'].',';
            }
            $str= rtrim($str,',');
            $map['uid'] = array("in",$str);     
        }
        $var['userid']=$_GET['userid']; 
        // 查询满足要求的总记录数
        $count = $operatecord->where($map)->count();
            //exit;
        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page = new \Think\Page($count,10);
        //分页跳转的时候保证查询条件
        if (isset($_GET['userid'])&& !empty($_GET['userid'])) {
            foreach($var as $key=>$valuer) {
                $Page->parameter[$key]   =   $valuer;
            }
        }
        $operatecords = $operatecord->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr=array();
        foreach ($operatecords as $key => $value) {
            $user = M("user");
            $id['id'] = $value['uid'];
            $value['name'] = $user->where($id)->find();
            $arr[]=$value;
        }

        $show = $Page -> show();// 分页显示输出
        $this -> assign('count',$Page->firstRow);// 赋值数据集
        $this -> assign("operatecord",$arr);// 赋值数据集	
        $this -> assign("show",$show);// 赋值分页输出
        $this-> display();// 输出模板    
    }
    
   
}
