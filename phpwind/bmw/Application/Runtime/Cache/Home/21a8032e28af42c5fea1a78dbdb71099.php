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



<!-- 代码 begin -->
	<!-- 代码 开始 -->
	<div class="box">
		<div class="t_news">
			<b style='width:40px'>公告:</b>
			<b style='width:80%'><marquee onMouseOver="this.stop()" onMouseOut="this.start()" scrolldelay ="200">未来三天将会有活动出现,大家注意查看……</marquee></b>
		</div>
	</div>
	
	

<html>

	<head>
		<meta charset="utf-8">
		<title>个人中心</title>
		<link rel="stylesheet" href="/bmw/Public/home/css/gerenzhongxin.css">
		<script src="/bmw/Public/home/js/jquery.js"></script>
		
		<link href="/bmw/Public/home/dfcss/css/lanrenzhijia.css" type="text/css" rel="stylesheet" />


  </head>
<body>

	<div class="container user-info i">

	 	 <div class="row">
	    	<div class="col-md-12 title">
				您当前所在位置：首页&nbsp;->&nbsp;个人信息
	    	</div>
		 </div>

  <div class="row">
	    <div class="col-md-3" >
	  <ul class="menu">
	    <li class="" style="background-color:#28abcc;">
	      <a href="/bmw/index.php/order/order">我的订单</a>
	    </li>
	    
	    <li class="" style="background-color:#28abcc;">
	      <a href="/bmw/index.php/settings/setting">个人信息</a>
	    </li>
	    <li class="" style="background-color:#28abcc;">
	      <a href="/bmw/index.php/order/outlogin">退出登录</a>
	    </li>
	  </ul>
	</div>




<?php if(is_array($result)): foreach($result as $key=>$res): ?><div class="col-md-9 content" style="float:right; margin-bottom:10px;">
      <div class="info" style="background-color:#28abcc;">
        <form accept-charset="UTF-8" action="/users/18989" class="form-horizontal" id="edit_user_18989" method="post"><div style="display:none">

	        <input name="utf8" value="✓" type="hidden">

	        <input name="_method" value="patch" type="hidden">

	        <input name="authenticity_token" value="q588laSmQQNSEgRESgNgjSV/xsAAic0QjGM/ek7W4co=" type="hidden"></div>

          <div class="address">
           
            <div class="form-group addresses">
             <label class="addr col-sm-2 control-label" style="margin-bottom:10px;">
				    订单编号：<?php echo ($res['id']); ?>
				  </label>
				  <label class="addr col-sm-4 control-label" style="margin-bottom:10px;">
				    订单时间：<?php echo ($res[ctime]); ?>
				  </label>
				 
			</div>

          </div>
          <div class="address">
           
            <div class="form-group addresses">
             <label class="addr col-sm-5 control-label" style="margin-bottom:10px;">
				    保养项目：<?php echo ($res['combo']); ?>
			</label>
				  <label class="addr col-sm-3 control-label" style="margin-bottom:10px;">
				    保养价格：<?php echo ($res['price']); ?>
				  </label>
				
				 <label class="addr col-sm-3 control-label" style="margin-bottom:10px;">
				    订单状态：<?php echo ($res['status']); ?>
				  </label><br/>
					

				<?php if($res['status']=='已付款'): ?><label class="addr col-sm-3 control-label" style="margin-bottom:10px;">
				   
               			 <a class="btn btn-default" href="/bmw/index.php/Order/popular/id/<?php echo ($res['id']); ?>">评价订单</a>
             		 
				  </label><?php endif; ?>
				  <label class="addr col-sm-2 control-label" style=" margin-bottom:5%;">
               			 <a class="btn btn-default" href="/bmw/index.php/Order/signconre">快速预约</a>
             		
				  </label>

				</div>

          </div>
          </form>
		</div>

</div><?php endforeach; endif; ?>


  </div>
</div>

 
  </div>
</div>

</body>


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