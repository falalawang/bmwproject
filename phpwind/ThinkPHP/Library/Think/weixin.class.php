<?php
	namespace Think;
/**
  * wechat php test
  */

//define your token
/*
define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();
$postData = $GLOBALS["HTTP_RAW_POST_DATA"];
		if(!empty($postData)){
			$xmlobj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			$ToUserName = $xmlobj ->ToUserName;
			$FromUserName = $xmlobj ->FromUserName;
			$CreateTime = $xmlobj ->CreateTime;
			$MsgType = $xmlobj ->MsgType;
			$Content = $xmlobj ->Content;
			$MsgId = $xmlobj ->MsgId;
			switch($content){
				case "1":
					$reply ="我的QQ：2409755156";
					break;
				case "2":
					$reply ="我的微博：http://www.weibo.com";
					break;
				case "3":
					$reply ="我的姓名：程立辉";
					break;
			}
			$tpl = "<xml>
									<ToUserName><![CDATA[%s]]></ToUserName>
									<FromUserName><![CDATA[%s]]></FromUserName>
									<CreateTime>%s</CreateTime>
									<MsgType><![CDATA[%s]]></MsgType>
									<Content><![CDATA[%s]]></Content>
								</xml>";
			$touser = $FromUserName;
			$fromuser = $ToUserName;
			$time = time();
			$type = "text";
			$str = sprintf($tpl,$touser,$fromuser,$time,$type,$reply);
				
			if(!$str){
					echo $str;
				}
			
			if($MsgType == "event"){
				$event = $xmlobj->event;
				if($event == "subscribe"){
					$content = "<xml>
									<ToUserName><![CDATA[%s]]></ToUserName>
									<FromUserName><![CDATA[%s]]></FromUserName>
									<CreateTime>%s</CreateTime>
									<MsgType><![CDATA[%s]]></MsgType>
									<Content><![CDATA[%s]]></Content>
								</xml>";
					$touser = $FromUserName;
					$fromuser = $ToUserName;
					$time = time();
					$type = "text";
					$reply = "欢迎关注我的微信公众平台 \n回复1：我的QQ \n回复2：我的微博 \n回复3：我的姓名。";
					$str = sprintf($content,$touser,$fromuser,$time,$type,$reply);
					
				if(!$str){
					echo $str;
				}
				}
			
			}
			
		}
*/
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
				if(!empty( $keyword ) && $type=="text")
                {
              		$msgType = "text";
              		$con = M("wechat");
					$rely = $con->field("content")->where("keyword='$keyword'")->select();
					$contentStr = $rely[0]['content'];
                	//$contentStr = "Welcome to wechat world!";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }elseif(!empty( $keyword ) && $keyword=="图片" && $type=="text"){
                	$img = M("imagerely");
                	$rely = $img->where("keyword='$keyword'")->select();
                	$type = "news";
					$title = $rely[0]['title'];
					$data = date('Y-m-d');
					$desription = $rely[0]['desription'];
					$image = $rely[0]['imageurl'];
					$turl = $rely[0]['url'];
					$resultStr = sprintf($picTpl, $fromUsername, $toUsername, $data, $type, $title,$desription,$image,$turl);
					echo $resultStr;
                }elseif(!empty( $keyword ) && $type=="event"){
                	$event = $postObj->Event;
		
					if($event=="subscribe"){//如果用户发生了一次关注事件
		
			
		
						$time = time();
						$MsgType = "text";
				
						$rely = "欢迎您来关注宝马4s保养！\n我们的网站：http://www.mtzlsf.com\n回复1，预定预定查询！\n回复2，个人网址的查询！\n回复3，查询保养项目! \n回复“图片”，查看文章";
				
						$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $MsgType, $rely);
				
						if(!empty($resultStr)){
				
							echo $resultStr;
				
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
        $re=file_get_contents($url);
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
                    'name'=>urlencode("宇瑞安"),
                    'sub_button'=>array(
                        array(
                            'name'=>urlencode("品牌介绍"),
                            'type'=>'click',
                            'key'=>'XX_ABOUT'
                        ),
                        array(
                            'name'=>urlencode("服务介绍"),
                            'type'=>'click',
                            'key'=>'XX_SERVICE'
                        )
                    )
                ),
                
                array(
                    'name'=>urlencode("我"),
                    'sub_button'=>array(
                        array(
                            'name'=>urlencode("个人中心"),
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
}

?>