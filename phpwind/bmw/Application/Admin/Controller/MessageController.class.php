<?php
	namespace Admin\Controller;
	use Think\Controller;
	class MessageController extends CommonController{
		public function messageList(){
			$mess = M('prompt');
			$data = $mess -> select();
			$this -> assign('message',$data);
			$this -> display();
		}
		public function update(){
			$id = I('get.id');
			$mess = M('prompt');
			$data = $mess -> where("id = $id") -> select();
			$this -> assign('message',$data[0]);
			$this -> display();
		}
		public function updata(){
			$data['id'] = I('post.id');
			$data['title'] = I('post.title');
			$data['message'] = I('post.message');
			$mess = M('prompt');
			if($mess -> create($data)){
				if($mess -> save()){
					$this->success('OK',U('Message/messageList'));
				}else{
					$this->error('Ê§°Ü');
				}
			}
		}
	}
?>