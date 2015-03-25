<?php

namespace Admin\Controller;

use Think\Controller;

class WechatController extends Controller{
	public function Wechat(){
		$wechat = M("wechat");
		$wechats = $wechat->select();
		$this->assign("wechats",$wechats);
		//dump($wechats);exit;

		$this->display();
	}
	public function insert(){
		$wechat = M("wechat");
		if($wechat ->create()){
			$res = $wechat->add();
			if($res){
				$this->success("添加成功！");
			}else{
				$this->error("添加失败！");

			}

		}else{
			$this->error("添加失败！");
		}


	}
	public function mod(){
		$wechat = M("wechat");
		//dump($_POST);exit;
		if($wechat->create()){
			$res = $wechat->save();
			if($res){
				$this->success("修改成功！","wechat");

			}else{
				$this->error("修改失败！");
			}
		}else{
			$this->error("修改失败！");
		}


	}
	public function add(){
		$imagerely = M("imagerely");
		if($imagerely ->create()){
			$res = $imagerely->add();
			if($res){
				$this->success("添加成功！");
			}else{
				$this->error(" 添加失败！");
			}
		}else{
			$this->error(" 添加失败！");
		}

	}
	public function imageRely(){
		$this->display();
	}
	public function relyList(){
		$imagerely = M("imagerely");
		$images = $imagerely->select();
		$this->assign("images",$images);
		$this->display();

	}
	public function update(){
		$imagerely = M("imagerely");
		if($imagerely->create()){
			$res = $imagerely->save();
			if($res){
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
		}else{
			$this->error("修改失败！");
		}
	}
	public function del(){
		$imagerely = M("imagerely");
		$id = I("get.id");
		$res = $imagerely ->delete($id);
		if($res){
			$this->success("删除成功");
		}else{
			$this ->error("删除失败！");
		}
	}
	public function subscribe(){
		$subscribe = M("subscribe");
		$sub = $subscribe->select();

		$this ->assign("subs",$sub[0]["content"]);
		$this ->assign("id",$sub[0]["id"]);
		$this->display();
	}
	public function modcontent(){
		$subscribe = M("subscribe");
		if($subscribe->create()){
			if($subscribe->save()){
				$this->success("修改成功！");
			}
		}else{
			$this->error("修改失败！");
		}

	}
	public function customer(){

		$wechat = M("uwechat");
		$count = $wechat->count();
		$Page = new \Think\Page($count,5);
		$uwechat = $wechat->limit($Page->firstRow.','.$Page->listRows)->select();
		$show = $Page->show();
		$this->assign("show",$show);
		$this->assign("uwechats",$uwechat);
		$this->display();
	}
	public function crely(){
		$id = I("get.id");
		$wechat = M("uwechat");
		$uwechat = $wechat->where("id=$id")->select();
		$usernum = base64_decode($uwechat[0]['usernum']);
		$this->assign("usernum",$usernum);
		$this->assign("uwechat",$uwechat);

		$this->display();
	}
	public function dorely(){
		$touser = I("post.usernum");
		$content = I("post.content");
		//dump($_POST);
		$data = '{
	    "touser":"'.$touser.'",
	    "msgtype":"text",
	    "text":
	    {
	         "content":"'.$content.'"
	    }
		}';
		define("APPID", "wx0f1620d11eea2b65");
		define("APPSECRET", "79b6a102916f99892480ca59b644ef72");
		$weixin = new \Think\weixin();

		$access_token = $weixin->getAccessToken();
		$url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$access_token;
		$result = $weixin-> https_post($url,$data);
		$final = json_decode($result);
		if($final->errcode == "0"){
        	$this->success('消息回复成功！');
	    }else{
	    	$this->error("消息恢复失败");
	    }
}

	
	
}