<?php
	function convert($a){
		foreach ($a as $value) {
			if($value == "0"){
				$s['0']="1";
			}else if($value == "1"){
				$s['1']="1";
			}else if($value == "2"){
				$s['2']="1";
			}else if($value == "3"){
				$s['3']="1";
			}
		}	
		if(!isset($s['0'])){
			$s['0']="0";
		}
		if(!isset($s['1'])){
			$s['1']="0";
		}
		if(!isset($s['2'])){
			$s['2']="0";
		}
		if(!isset($s['3'])){
			$s['3']="0";
		}
		return $s;	
	}
?>