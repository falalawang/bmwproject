<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta charset='utf-8' />
		<title><?php echo ($result[0]['title']); ?></title>
		<meta name="keywords" content="<?php echo ($result[0]['keywords']); ?>">
		<meta name="description" content="<?php echo ($result[0]['description']); ?>">
		<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
		<meta name="format-detection" content="telephone=no"/>
		<link rel="stylesheet" type="text/css" href="/bmw/Public/home/css/lanrenzhijia.css" />
		<link rel="stylesheet" type="text/css" href="/bmw/Public/home/css/pho.css" />
		<link rel="stylesheet" type="text/css" media="all" href="/bmw/Public/home/css/style.css"/>
		<link rel="stylesheet" href="/bmw/Public/home/css/ary.css"/>
		
		<script src='/bmw/Public/home/js/ajax.js'></script>
		<script src="/bmw/Public/home/My97DatePicker/WdatePicker.js"></script>
		<script src="/bmw/Public/home/js/area.js"></script>
		<script src="/bmw/Public/home/js/jquery-1.9.1.min.js"></script>
  		<script src="/bmw/Public/home/js/jquery.js"></script>
  		<script src="/bmw/Public/home/js/jquery.leanModal.min.js"></script>
		<script src="/bmw/Public/home/js/ary.js"></script>
		<script src="/bmw/Public/home/js/respond.js"></script>
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
		<link rel="stylesheet" href="/bmw/Public/home/css/gerenzhongxin.css">

	    <link rel="stylesheet" href="/bmw/Public/home/bootstrap/css/bootstrap.min.css" media="screen" >
	   	<script src="/bmw/Public/home/bootstrap/js/bootstrap.min.js"></script>

    <style>
		.demo-nav.fixed.fixed-top{z-index:8;background:#fff;width:100%;padding:0;border-bottom:solid 4px #28adcc;-webkit-box-shadow:0 3px 6px rgba(0, 0, 0, .175);box-shadow:0 3px 6px rgba(0, 0, 0, .175);}
    </style>
		
	</head>
<body>

	<div id="loginmodal" style="display:none;">
    <form id="loginform" name="loginform" method="post" action="/bmw/index.php/Sms/check">
	  <p>请登录</p>
      <input placeholder='*手机号' type="text" name="phone" id="username" maxlength="11" class="txtfield" value="" ><span id="sp" style="font-size:12px;color:red"></span>
      <br />
      <input placeholder='*验证码' type="text" name="code" class="txtfiel" id="code" maxlength="4" value="" ><input type="button" id="getcode" class="flatbtn-w" value="获取验证码" >
      <br />
      <input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="确定" tabindex="3">
    </form>
  </div>


<!-- 代码 begin -->
	<!-- 代码 开始 -->
	<div class="box">
		<div class="t_news">
			<b style='width:40px'>公告:</b>
			<b style='width:80%'><marquee onMouseOver="this.stop()" onMouseOut="this.start()" scrolldelay ="200">未来三天将会有活动出现,大家注意查看……</marquee></b>
		</div>
	</div>
	
	
	    <!--banner-->
    <div class="banner" data-style="border-white">
      <div class="carousel">
        <div class="item"><img src="/bmw/Public/home/imgs/banner3.jpg" width="100%" /></div>
        <div class="item"><img src="/bmw/Public/home/imgs/banner2.jpg" width="100%" /></div>
        <div class="item"><img src="/bmw/Public/home/imgs/banner1.jpg" width="100%" /></div>
      </div>
    </div>
  	<br />
    
  	<!--内容-->
    <div class="container" style='background:#fff'>
      <div class="line-small">
      	<div class="xl12 xm6 margin-small-bottom"><a href="#"><img src="/bmw/Public/home/imgs/product1.jpg" width="100%" /></a></div>
      </div>
      <br />

      <div class="line-big">
        <div class="xl12 xm8">
        	<div class="line-small">
                <div class="xs6">
				    <div style='text-align:center'><img style='width:30%;margin:10px auto' src='/bmw/Public/home/imgs/00.png' /></div>
					<img src="/bmw/Public/home/imgs/1.jpg" width="100%" />
                </div>
                <div class="xs6">
					<div style='text-align:center'><img style='width:30%;margin:10px auto' src='/bmw/Public/home/imgs/000.png' /></div>
                    <img src="/bmw/Public/home/imgs/2.jpg" width="100%" />
                </div>
            </div>
        </div>
      </div>
    </div>
    
    <br /><br />  
				<div style="width:100%; margin-left:5%;margin-bottom:20px;">
					友情链接：<br/>
						<?php if(is_array($total)): foreach($total as $key=>$to): ?><a href="http://<?php echo ($to['links']); ?> " style="color:#fff;"><?php echo ($to['links_id']); ?></a>&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
						
            </div>
	
    <!--底部-->
    <br /><br />
    <div class="layout padding-big-top padding-big-bottom border-top bg">
      <div class="container padding">
        <div class="line">
          
          <div class="xl12 xs3 padding-top">
            <div class="media media-x">
              <div class="float-left txt-border radius-circle border-main"><div class="txt radius-circle bg-main icon-phone text-large"></div></div>
              <div class="media-body"><strong class="text-big text-main">400-6666-888</strong>周一至周日8:00-20:00</div>
            </div>
            <div class="media media-x">
              <img src="/bmw/Public/home/imgs/erer.png" height="80px">
			  <div class="media-body" style="float:right;margin-right:3em;margin-top:1em"><strong class="text-big text-main">微博关注我们</strong><a class="button button-little bg-red shake-hover nobor" href="#" style="border:1px solid #f50f30;">点击关注</a></div>
            </div>
			 
          </div>
        </div>
      </div>
    </div>



	<div class='bottom'>
		<img src="/bmw/Public/home/imgs/log.png" />
		<a class="flatbtn" href="/bmw/index.php/Make/index">立即预约</a>
		<?php if($_SESSION['phone'] == ''): ?><a  href="#loginmodal" class="flatbtn" id="modaltrigger">个人中心</a>

			
		<?php else: ?>
		
		<a class="flatbtn"  href="/bmw/index.php/order/order">我的订单</a><?php endif; ?>

		
	</div>

	<script type="text/javascript">

	$(function(){
  	$('#loginform').submit(function(e){
  		var p = $("#username").val();
  		var c = $("#code").val();
  		
  		if(/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/.test(p)){
  			return true;
  		}else{
  			return false;
  		}

    
  	});
  
  	$('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
	});
	
	//p ==""?$("#getcode").attr("disabled", "true"):$("#getcode").removeAttr("disabled");

	$('#getcode').click(function(){
		var p = $("#username").val();
		var curCount=60;
		var len = $("#username").val().length
		if(/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/.test(p)){
			$.get("/bmw/index.php/Sms/sendMessage",{"phone":p},function(data){
			});
		$("#sp").html("");

			function SetRemainTime() {
		        if (curCount == 0) {                  
		            window.clearInterval(InterValObj);//停止计时器  
		            $("#getcode").removeAttr("disabled");//启用按钮  
		            $("#getcode").val("重新获取验证码");  
		           // code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效      
		        }else {  

		            curCount--;  
		            $("#getcode").val(curCount + "秒后重新获取");
		        }  
	    	}
		

			
			$("#getcode").val(curCount + "秒后重新获取");
			$("#getcode").attr("disabled", "true");
			InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次  
	        //向后台发送处理数据
	        
		}else{
			//$("#getcode").attr("disabled", "true");
			$("#sp").html("手机号不正确");
		}

	});
</script>
	<!-- 代码 end -->
	
</body>
</html>