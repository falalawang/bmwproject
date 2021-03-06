<?php
namespace Admin\Controller;
use Think\Controller;
class AutoReplyController extends CommonController{
	
	//显示自动回复
	public function index(){
		$autoReply = M('wx_reply');
		$autoReplys = $autoReply -> select();
		$this -> assign('list',$autoReplys);
		$this -> display();	
	}

	//显示修改自动回复的页面
	public function mod(){
		$reply = M('wx_reply');
		$id = $_GET['id'];
		$replys = $reply -> where("id={$id}") -> select();
		$this -> assign('reply',$replys);
		$this -> display();	
	}

	//修改自动回复
	public function domod(){
		$data = $_POST;
		$reply = M('wx_reply');
		$replys = $reply -> select();
		if($replys['content'] != $data['content']){
			if($reply -> save($data)){
                $this -> success('修改成功！','index');
            }else{
                $this -> error('内容已存在！');
                exit();
            }
        }
	}

	//添加的页面
	public function add(){
		$this -> display();
	}

	//添加自动回复的功能
	public function insert(){
		$reply = M('wx_reply');
		//判断输入的关键字是否存在，如果存在就直接返回
		$replys = $reply -> where("replyKey='{$_POST['keyword']}'") -> select();
		if($replys){
			$this -> error('关键字已存在，请重新输入');
			exit();
		}
		//把数据插入数据库
		$data = $_POST;
		if($reply -> create($data)){
			if($reply -> add()){
				$this -> success('添加成功！');
			}else{
				$this -> error('添加失败！');
			}
		}else{
			$this -> error('失败！');
		}
	}

	//删除自动回复
	public function del(){
		$id = $_GET['id'];
		$res = M('wx_reply');
		if($res -> delete($id)){
			$this -> success('删除成功');
		}else{
			$this -> error('删除失败');
		}
	}
}
?>