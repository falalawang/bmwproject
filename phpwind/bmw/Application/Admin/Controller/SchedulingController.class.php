<?php

namespace Admin\Controller;

use Think\Controller;

class SchedulingController extends CommonController{

	public function SchedulingList(){
		$model=M();
		$count=$model->table("bmw_order,bmw_servicecar")->where("bmw_order.sid=bmw_servicecar.id")->count();
		$Page  = new \Think\Page($count,2);
		$show = $Page->show();
		$models=$model->table("bmw_order,bmw_servicecar")->field('bmw_order.combo,bmw_order.keep_time,bmw_servicecar.carName,bmw_servicecar.name,bmw_servicecar.id')->where("bmw_order.sid=bmw_servicecar.id")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('models',$models);
        $this -> assign('show',$show);
		$this->display();
	}
	public function Completed(){
		$model=M();
		$count=$model->table("bmw_order,bmw_scheduling")->where("bmw_order.sid=bmw_scheduling.id and bmw_scheduling.status='1'")->count();
		$Page  = new \Think\Page($count,2);
		$show = $Page->show();
		$models=$model->table("bmw_order,bmw_scheduling")->field('bmw_order.combo,bmw_order.keep_time,bmw_scheduling.carName,bmw_scheduling.name,bmw_scheduling.id,bmw_scheduling.status')->where("bmw_order.sid=bmw_scheduling.id and bmw_scheduling.status='1'")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('models',$models);
        $this -> assign('show',$show);
		$this->display();
	}

	public function update(){
		$id=$_GET['id'];
		$data['status']='1';
		$data['id']=$id;
		$model=M('scheduling');
		if($model->create($data)){
			$res=$model->save();
			if($res){
				$this->success('修改成功',U("Scheduling/completed"));
			}
		}
	}
	public function detail(){
		$id=$_GET{'id'};
		dump($id);
		die;
	}
}