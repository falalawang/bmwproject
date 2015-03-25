<?php
namespace Admin\Controller;
use Think\Controller;
class ConfigController extends CommonController {
    public function index(){
    	$config = M("config");
        $configs = $config->find();
        $this -> assign("config", $configs);	
		$this-> display();
	
    }
    public function updates(){
        if(!empty($_FILES['logo']['name'])){
        

        $upload = new \Think\Upload();// 实例化上传类    
        $upload->maxSize   =    0 ;// 设置附件上传大小   
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
        $upload->rootPath  =     "./Public";
        $upload->savePath  =      './Logo/'; // 设置附件上传目录    // 上传文件    
        $upload->autoSub  = false;  
        $info   =   $upload->upload();
         if(!$info) {// 上传错误提示错误信息       
            $this->error($upload->getError());
        }
        
        $_POST['logo'] = $info['logo']['savepath'].$info['logo']['savename'];
        }else{
            unset($_POST['logo']);
        }
        $config = M("config");
        $data=$_POST;
        
        if($config ->create($data)){
            $res = $config->save();
            if($res){
                $this->success("成功");
            }else{
                $this->error('失败');
            }
        }else{
           $this->error('失败');
        } 
    }
    public function switchs(){
        $config = M("config");
        $configs = $config->field('status,id')->find();
       
        $this -> assign("config", $configs);
        $this->display();

    }
    public function swiupdate(){
        $config=M("config");
        $data = $_POST;
        
       if($config->create($data)){
            $res = $config->save();
            if($res){
                $this->success("成功");
            }else{

                $this->error('已更改');
            }
        }else{
           $this->error('失败');
        }


    }
}
