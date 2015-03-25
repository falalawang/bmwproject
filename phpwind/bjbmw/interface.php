<?php

	$signature = $_GET['signature'];
	
	$timestamp = $_GET['timestamp'];
	
	$nonce = $_GET['nonce'];
	
	$echostr = $_GET['echostr'];
	
	$token = "bmwtest";
	
	$arr = array($token,$timestamp,$nonce);
	
	sort($arr);
	
	$result = sha1(join($arr));
	
	if($result==$signature){
	
		echo $echostr;
	
	}

	$poststr = $GLOBALS["HTTP_RAW_POST_DATA"];

    if (!empty($poststr))
    {
		$postObj = simplexml_load_string($poststr, 'SimpleXMLElement', LIBXML_NOCDATA);  
		$FromUserName = $postObj->FromUserName;//发送消息方ID  
		$ToUserName = $postObj->ToUserName;//接收消息方ID  
		$Content = trim($postObj->Content);//用户发送的消息  
		$CreateTime = time();//发送时间  
		$MsgType = $postObj->MsgType;//消息类型  


		if($MsgType=='event')  //判断微信自定义响应事件
		{
	        $MsgEvent = $postObj->Event;//获取事件类型  
	        if ($MsgEvent=='subscribe'){  //订阅事件
	        	$contentstr = '感谢关注宇瑞安,为你的爱车提供便捷、专注、可靠的保养服务。~任何问题请拨打400-000-0000~';
	        	echo send($contentstr);
	        }elseif ($MsgEvent=='CLICK'){  //点击菜单 
	          	$EventKey = $postObj->EventKey;//菜单的自定义的key值，可以根据此值判断用户点击了什么内容，从而推送不同信息  
		        switch($EventKey){
		           	case "introduce" :  
		            	$contentstr = '宇瑞安专业保养30年！';
		            	echo send($contentstr);
		            break;
		            case "serices":
		              	$contentstr = '服务项目.........................................';
		              	echo send($contentstr);
		            break;
		            case "activity":
		              	$contentstr = '敬请期待...........';
		              	echo send($contentstr);
		            break;
		        }
	    	}
        }
        if($MsgType=="text")
        {
		
			if(!empty($Content)){

				$contentstr = '感谢关注宇瑞安,为你的爱车提供便捷、专注、可靠的保养服务。~任何问题请拨打400-000-0000~';
	        	echo send($contentstr);
				
				die();
			}
        }
	}
	
	function send($contentstr){
		global $ToUserName,$FromUserName;
		$str = "<xml>
				 <ToUserName><![CDATA[%s]]></ToUserName>
				 <FromUserName><![CDATA[%s]]></FromUserName>
				 <CreateTime>%s</CreateTime>
				 <MsgType><![CDATA[text]]></MsgType>
				 <Content><![CDATA[%s]]></Content>
				</xml>";
		return $resultstr = sprintf($str,$FromUserName,$ToUserName,time(),$contentstr);
	}
	
