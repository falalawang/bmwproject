<?php
	namespace Think;
/**
  * wechat php test
  */

//define your token

class weixin
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg($postStr)
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                //libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $type = $postObj->MsgType;
                $keyword = trim($postObj->Content);
                $time = time();
                $uwechat = M("uwechat");
                $data['usernum']=base64_encode($fromUsername);
                $data['content']=$keyword;
                $data['time']=$time;
                
                if($uwechat ->create($data)){
                	$uwechat ->add($data);
            	}
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
				$picTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<ArticleCount>1</ArticleCount>
						<Articles>
						<item>
						<Title><![CDATA[%s]]></Title>
						<Description><![CDATA[%s]]></Description>
						<PicUrl><![CDATA[%s]]></PicUrl>
						<Url><![CDATA[%s]]></Url>
						</item>
						</Articles>
						<FuncFlag>1</FuncFlag>
					  </xml> ";             
				if(!empty( $keyword ) && $type=="text" && $keyword=="图片")
                {
                	$img = M("imagerely");
                	$rely = $img->where("keyword='$keyword'")->select();
                	$mtype = "news";
					$title = $rely[0]['title'];
					$data = date('Y-m-d');
					$desription = $rely[0]['desription'];
					$image = $rely[0]['imageurl'];
					$turl = $rely[0]['url'];
					$resultStr = sprintf($picTpl, $fromUsername, $toUsername, $data, $mtype, $title,$desription,$image,$turl);
					echo $resultStr;
              		
                }elseif(!empty( $keyword ) && $type=="text"){
                	$msgType = "text";                	
                	if(substr($keyword,-1)=="#"){
                		$num = trim($postObj->Content,'#');
                		$order = M("order");
                		$status = $order ->field("status")->where("id=$num")->select();
                		$statu = $status[0]['status'];
                		$contentStr = "您的订单状态为------".$statu;
                		//$contentStr = $fromUsername;
                		$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	}else{
                		$con = M("wechat");
						$rely = $con->field("content")->where("keyword='$keyword'")->select();
						$contentStr = $rely[0]['content'];
	                	//$contentStr = "Welcome to wechat world!";
	                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	}
                	echo $resultStr;

                }elseif($type=="event"){
                	$event = $postObj->Event;
		
					if($event=="subscribe"){//如果用户发生了一次关注事件
		
						$subscribe = M("subscribe");
						$sub = $subscribe->select();
						$rely = $sub[0]['content'];
						$time = time();
						$MsgType = "text";
						$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $MsgType, $rely);
				
						if(!empty($resultStr)){
				
							echo $resultStr;
				
						}
					}elseif($event=="CLICK"){
						$eventKey = $postObj->EventKey;
						switch($eventKey){
							case "XX_BRAND":
								$time = time();
								$MsgType = "text";
				
								$rely = "这是我们的品牌介绍";
				
								$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $MsgType, $rely);
								echo $resultStr;
								break;
							case "XX_SERVICE":
								$time = time();
								$MsgType = "text";
				
								$rely = "这是我们的服务介绍！哈哈哈哈哈";
				
								$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $MsgType, $rely);
								echo $resultStr;
								break;
							case "XX_CONTACT":
								$time = time();
								$MsgType = "text";
				
								$rely = "这是我们的联系电话：400-8888-6666，没事常联系哦！";
				
								$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $MsgType, $rely);
								echo $resultStr;
								break;
						}
					}
                }


	        }else {
	        	echo "";
	        	exit;
	        }
   	}

	public function getAccessToken()
    {

        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
        $re=$this->http_request_json($url);
        $obj = json_decode($re,true);
        $accessToken = $obj['access_token'];
        return $accessToken;
    }
     public function createmenu($access_token)
    {
    	
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
        $arr = array(
            'button' =>array(
                array(
                    'name'=>urlencode("宇瑞安4s"),
                    'sub_button'=>array(
                        array(
                            'name'=>urlencode("品牌介绍"),
                            'type'=>'click',
                            'key'=>'XX_BRAND'
                        ),
                        array(
                            'name'=>urlencode("服务介绍"),
                            'type'=>'click',
                            'key'=>'XX_SERVICE'
                        ),
                        array(
                            'name'=>urlencode("联系我们"),
                            'type'=>'click',
                            'key'=>'XX_CONTACT'
                        )
                    )
                ),
                
                array(
                    'name'=>urlencode("个人中心"),
                    'sub_button'=>array(
                        array(
                            'name'=>urlencode("订单中心"),
                            'type'=>'view',
                            'url'=>'http://121.42.31.5/bmw/index.php/order/order'
                        ),
                        array(
                            'name'=>urlencode("我的订单"),
                            'type'=>'view',
                            'url'=>'http://121.42.31.5/bmw/index.php/settings/setting'
                        ),
                        array(
                            'name'=>urlencode("我要预约"),
                            'type'=>'view',
                            'url'=>'http://121.42.31.5/bmw/index.php/Make/index'
                        )
                    )
                ),
                array(
                    'name'=>urlencode("预约保养"),
                    'type'=>'view',
                    'url' =>'http://121.42.31.5/bmw/index.php/Make/index'
                )
            )
        );
        $jsondata = urldecode(json_encode($arr));

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$jsondata);
        curl_exec($ch);
        curl_close($ch);
        
    }
    public function http_request_json($url){    
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL,$url);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
        $result = curl_exec($ch);  
        curl_close($ch);  
        return $result;    
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
	public function https_post($url,$data)
			{
			    $curl = curl_init();
			    curl_setopt($curl, CURLOPT_URL, $url); 
			    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
			    curl_setopt($curl, CURLOPT_POST, 1);
			    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			    $result = curl_exec($curl);
			    if (curl_errno($curl)) {
			       return 'Errno'.curl_error($curl);
			    }
			    curl_close($curl);
			    return $result;
			}
}

?>