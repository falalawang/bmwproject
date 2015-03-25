<?php
namespace Admin\Controller;
use Think\Controller;
class EvaluationController extends CommonController {
    public function evaluationList(){
        $message=M('user_evaluation');
        $messages=$message->where("status='0'")->select();
        foreach($messages as $k=>$v){
            $str=$v['combo'];
            $a=explode(',',$str);
            $keeps = array();
            foreach($a as $b){
                $keep=M('keep');
                $tmp=$keep->where("id=$b")->find();  
				$keeps[] = $tmp['combo'];                          
            } 
			$keeps = implode('、', $keeps);
            $messages[$k]['combo']=$keeps;
        }
        $this -> assign("message", $messages);
        $this->display();
    }
}
